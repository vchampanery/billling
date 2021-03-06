<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\ModuleMaster;
use App\Model\UserAssignMaster;
use App\Model\ClientMaster;
use App\Model\SoftwareFieldMaster;
use App\Model\ReportMaster;
use App\Http\Traits\GeneralTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ClientDashboardController extends Controller
{
    use GeneralTrait;
    private  $fields = ['module_master_name'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $fields = $this->fields;
//        $action = 'add';
        $action = 'edit';
        return view('clientDashboard.create',compact('permission','fields','action'));
        
//        return view('patient.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        if($data['action'] == 'Edit'){
            unset($data['_token']);
            unset($data['action']);
            $data['software_field_master_id'] = $this->updateAutofill($data);
            foreach($data['software_field_master_id'] as $key=>$value){
                $value = $value?$value:0;
                $rwi = ReportMaster::where('client_master_id',$data['client_master_id'])
                ->where('date',$data['date'])->where('software_field_master_id',$key)->update(['value'=>$value]);
            }
        } else {
            ModuleMaster::create($data);
        }
        $fields = $this->fields;
        return redirect()->route('clientdashboard.show',['id'=>$data['client_master_id']]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $client = isset($request->id)?$request->id:null;
        if(!$client){
            return redirect()->route('userdashboard.show');
        }
        $list = ClientMaster::where('client_master_id',$client)
            ->first();
        $clientName = $list->client_master_name;
        $swMstrId = $list['software_master_id'];
        $fileMst = SoftwareFieldMaster::where('software_master_id',$swMstrId)
                ->join('module_master', 'module_master.module_master_id', '=', 'software_field_master.module_master_id')
                ->join('field_master', 'field_master.field_master_id', '=', 'software_field_master.field_master_id')
            ->select(['software_field_master.software_field_master_id','module_master.module_master_name','field_master.field_master_name'])
            ->get()->toArray();
        //update
        $range = null;
        if(isset($request->search_date)){
            $range = $request->search_date;
            $dateData = explode('-', $request->search_date);
            $sdate = date($dateData[0].'-01-'.$dateData[1]);
            $edate = date($dateData[0].'-31-'.$dateData[1]);
        }else{
            $range = date('m-Y');
            $sdate = date('m-01-Y');
            $edate = date('m-31-Y');
        }
       
        $list = ReportMaster::where('client_master_id',$client)
            ->select(['report_master.date','report_master.value','report_master.report_master_id'])
            ->whereBetween('report_master.date',[$sdate,$edate])
            ->get()->toArray();
        $newFA =[];
        $newFA['module'] =[];
        $newFA['module1'] =[];
        $newFA['fields'] =[];
        $newFA['value'] =[];
        $newFA['diff'] =[];
        $newFA['module']['Date'] = ['name'=>'Date','rowspan'=>'2','colspan'=>'1'];
        $newFA['module']['Day'] = ['name'=>'Date','rowspan'=>'2','colspan'=>'1'];
        $s=[
            'Date'=>'',
            'Day'=>'',
            'Visits / Units'=>'antiquewhite',
            'Billed Charges'=>'aqua',
            'Insurance  AR Information'=>'aliceblue',
            'Patient AR Information'=>'beige',
            'Insurance + Patient AR Total'=>'azure',
            'Daily Collection Details'=>'burlywood',
            'Medicare Financial'=>'bisque',
            'Daily Obtained Referra'=>'thistle',
            'Denied Charges'=>'tan',
            ];
         $newFA['module2'][] = '';
         $newFA['module2'][] = '';
        foreach($fileMst as $key => $value){
            if(isset($newFA['module'][$value['module_master_name']])){
                $colsCnt = $newFA['module'][$value['module_master_name']]['colspan'];
                $newFA['module'][$value['module_master_name']] =['name'=>$value['module_master_name'],'rowspan'=>1,'colspan'=>++$colsCnt]; 
            } else{
                $newFA['module'][$value['module_master_name']] =['name'=>$value['module_master_name'],'rowspan'=>1,'colspan'=>1]; 
            }
            if(array_key_exists($value['module_master_name'], $s)){
                 $newFA['module2'][] = $s[$value['module_master_name']];
            }
           
            $newFA['module1'][] = $value['module_master_name'];
            
            if(!isset($newFA['module'][$value['field_master_name']])){
                $newFA['fields'][] =$value['field_master_name']; 
            } 
        }
        
//        dd($newFA);
//        $newFA['module']['Action'] = ['name'=>'Action','rowspan'=>'2','colspan'=>'1'];
        $current = strtotime(date("Y-m-d"));
        //get reassign data
        $user = auth()->user()->id;
        $roles = auth()->user()->roles->pluck('name')->toArray();
        \App\User::where('email', '<>','vt@gmail.com')->with('roles')->get();
        $res = \App\Model\UserReassignMaster::where('user_master_id',$user)->get(['date','created_at'])->toArray();
        $reassign = [];
        foreach($res as $key=>$value){
            $end_date = strtotime($value['created_at']);
            $diff = ($current - $end_date)/60/60/24;
            if($diff < 4){ //assign permission will staye till 3 days.. only
                $reassign[] = $value['date'];
            }
        }
        foreach($list as $key => $value){
            $date = date_create_from_format('m-d-Y', $value['date']);
            $end_date = strtotime(date_format($date, 'Y-m-d'));
            $diff = ($current - $end_date)/60/60/24;
            $newFA['diff'][$value['date']] = ($diff>-1 && $diff<4) || (in_array($value['date'], $reassign)) || ($roles[0] == 'admin')?true:false;
            $newFA['value'][$value['date']][] =$value['value'];
        }
        //client list 
        $clientList = ClientMaster::all()->toArray();
        $fieldsArray = $newFA;
       
        return view('clientDashboard.show',compact('list','fieldsArray','clientList','client','range','clientName'));
    }
    
    
    public function generateentry (Request $request) {

        ini_set('max_execution_time', 6000);

        $data  = $request->toArray();
        $action = 'Generate entry';
        if(isset( $data['date'])){
            $date  = explode('-', $data['date']);
            $month = $date[0];
            $year  = $date[1];

            $list = array();
            for ($d = 1; $d <= 31; $d++) {
                $time   = mktime(12, 0, 0, $month, $d, $year);
                if (date('m', $time) == $month)
                    $list[] = date('m-d-Y', $time);
            }
            $user = auth()->user()->id;
            
            $softObj = ClientMaster::whereIn('client_master_id', $data['client_master_ids'])->get(['client_master_id','software_master_id'])->toArray();

//            $softId  = $softObj['software_master_id'];
            $newdata = [];
            foreach($softObj as $key=>$value){
//                dump($value);
                $newdata[$value['client_master_id']] = $value['software_master_id'];
            }
            foreach($newdata as $clientId=>$softId){
//                echo "client id : ".$clientId." softwareid : ".$softId."<br>";
                $softFieldObj = SoftwareFieldMaster::where('software_master_id', $softId)->pluck('software_field_master_id')->toArray();
                
//                dd($softFieldObj);
                foreach ($list as $listkey => $listvalue) {
                    $reportAry= [];
                    foreach ($softFieldObj as $sfkey => $sfvalue) {
//                        if (!ReportMaster::where('client_master_id', $clientId)
//                            ->where('date', $listvalue)
//                            ->where('software_field_master_id', $sfvalue)
//                            ->exists()) {
//                            $reportCreat                           = new ReportMaster();
                            
                            $reportAry[$sfkey]['client_master_id']         = $clientId;
                            $reportAry[$sfkey]['date']                     = $listvalue;
                            $reportAry[$sfkey]['software_field_master_id'] = $sfvalue;
                            $reportAry[$sfkey]['value']                    = 0;
                            $reportAry[$sfkey]['updated_by']               = $user;
//                            ReportMaster::Create($reportAry);
//                        }
                    }
//                    ReportMaster::Create($reportAry);
//                    dump($reportAry);
                    ReportMaster::insert($reportAry);
//                    echo $listkey." ".$listvalue."<br>";
                }
            }
//            dd();
            
            
            /*foreach ($data['client_master_ids'] as $clientKey => $clientVlu) {

//                $softObj = ClientMaster::where('client_master_id', $clientVlu)->first(['software_master_id']);
//                $softId  = $softObj['software_master_id'];

                $softFieldObj = SoftwareFieldMaster::where('software_master_id', $softId)->get(['software_field_master_id'])->toArray();
                //date array
                foreach ($list as $listkey => $listvalue) {
                    foreach ($softFieldObj as $sfkey => $sfvalue) {
                        //insert into report master
                            $reportCreat                           = new ReportMaster();
                            $reportAry                             = [];
                            $reportAry['client_master_id']         = $clientVlu;
                            $reportAry['date']                     = $listvalue;
                            $reportAry['software_field_master_id'] = $sfvalue['software_field_master_id'];
                            $reportAry['value']                    = 0;
                            $reportAry['updated_by']               = $user;
                        
                        if (!ReportMaster::where('client_master_id', $clientVlu)
                            ->where('date', $listvalue)
                            ->where('software_field_master_id', $sfvalue['software_field_master_id'])
                            ->exists()) {
                            ReportMaster::Create($reportAry);
                        }
                        
                    }
                }
            }*/
            return redirect()->route('clientdashboard.show')->with('success','Entry Generated successfully');
        }   else {
            $clientList = ClientMaster::all()->toArray();
             return view('clientDashboard.generateentry',compact('action','clientList'));
        }
    }
    
    public function downloadExcel(Request $request){
        
        $data  = $request->toArray();
        
        $client = $data['id'];
        $list = ClientMaster::where('client_master_id',$client)
            ->first();
        $swMstrId = $list['software_master_id'];
        
        $fileMst = SoftwareFieldMaster::where('software_master_id',$swMstrId)
                ->join('module_master', 'module_master.module_master_id', '=', 'software_field_master.module_master_id')
                ->join('field_master', 'field_master.field_master_id', '=', 'software_field_master.field_master_id')
            ->select(['software_field_master.software_field_master_id','module_master.module_master_name','field_master.field_master_name'])
            ->get()->toArray();
        //update
       
        if(isset($request->range)){
            $dateData = explode('-', $request->range);
            $sdate = date($dateData[0].'-01-'.$dateData[1]);
            $edate = date($dateData[0].'-31-'.$dateData[1]);
        }else {
            $sdate = date('m-01-Y');
            $edate = date('m-31-Y');
        }
        $list = ReportMaster::where('client_master_id',$client)
             ->join('software_field_master', 'software_field_master.software_field_master_id', '=', 'report_master.software_field_master_id')
             ->join('field_master', 'field_master.field_master_id', '=', 'software_field_master.field_master_id')
           ->select(['report_master.date','report_master.value',
                    'report_master.report_master_id','report_master.software_field_master_id',
               'field_master.type'])
//           ->where('report_master.date','>','09-02-2020')
           ->whereBetween('report_master.date',[$sdate,$edate])
            ->get()->toArray();
       
        $newFA =[];
        $newFA['module'] =[];
        $newFA['fields'] =[];
        $newFA['value'] =[];
        foreach($fileMst as $key => $value){
                if(isset($newFA['module'][$value['module_master_name']])){
                    $colsCnt = $newFA['module'][$value['module_master_name']]['colspan'];
                    $newFA['module'][$value['module_master_name']] =['name'=>$value['module_master_name'],'rowspan'=>1,'colspan'=>++$colsCnt]; 
                } else{
                    $newFA['module'][$value['module_master_name']] =['name'=>$value['module_master_name'],'rowspan'=>1,'colspan'=>1]; 
                }
                if(!isset($newFA['module'][$value['field_master_name']])){
                    $newFA['fields'][] =$value['field_master_name']; 
                } 
        }
        $fieldcout = count($newFA['fields']);
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        
//         foreach(range('A','AA') as $columnID) {
//             dump($columnID);
////        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
////        ->setAutoSize(true);
//        }
//        dd();
//        $spreadsheet->getActiveSheet()->getCell('A1')->setColor('red');
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Day');
        $sheet->setCellValue('C1', '');
        $sheet->setCellValue('A2', 'Date');
        $sheet->setCellValue('B2', 'Day');
        $sheet->setCellValue('C2', '');
        $headerColor = '58668E';
        $headerColor1 = '95B0F9';
//        $sheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f48024');
//        $sheet->getStyle('B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f48024');
//        $styleArray = array(
//            'borders' => array(
//                'outline' => array(
//                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
//                    'color' => array('argb' => '0a0a0a'),
//                ),
//            ),
//        );
        $styleArray = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
                'name'  => 'Calibri'
            ),
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '0a0a0a'),
                ),
            ),
        );
        $styleArray1 = array(
            'font'  => array(
//                'bold'  => true,
//                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
                'name'  => 'Calibri'
            ),
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '0a0a0a'),
                ),
            ),
        );
        $sheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor);
//        $sheet->getStyle('A1')->getFont()->setColor();
        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor);
        $sheet->getStyle('B1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
//        $sheet ->getStyle('A1')->applyFromArray($styleArray);
//        $sheet ->getStyle('A2')->applyFromArray($styleArray);
//        $sheet ->getStyle('B1')->applyFromArray($styleArray);
//        $sheet ->getStyle('B2')->applyFromArray($styleArray);
        $alphbt = 'D';
        $totalColSpan = 0;
        $black_alph = [];
       
        foreach($newFA['module'] as $modk => $modv){
             $spreadsheet->getActiveSheet()->getColumnDimension($alphbt)->setAutoSize(true);
            $sheet->setCellValue($alphbt.'1', $modk);
            $sheet->getStyle($alphbt.'1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor);
            $sheet->getStyle($alphbt.'1')->applyFromArray($styleArray);
            $mergeNum = (int)$modv['colspan'] - 1;
            $e= (int)$modv['colspan'];
            $mergeNum = $e -1;
            $oldAplh = $alphbt;
            if($mergeNum>0){
                $i=0;
                $sheet->setCellValue($oldAplh.'2',$newFA['fields'][$totalColSpan++]);
                $sheet->getStyle($oldAplh.'2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor);
                $sheet->getStyle($oldAplh.'2')->applyFromArray($styleArray);
                 while($i<$mergeNum){
                    $alphbt++;
                    $sheet->setCellValue($alphbt.'2',$newFA['fields'][$totalColSpan++]);
                    $sheet->getStyle($alphbt.'2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor);
                    $sheet->getStyle($alphbt.'2')->applyFromArray($styleArray);
//                    $sheet->getStyle($alphbt.'2')->setAutoSize(true);
                    ++$i;
                }
                $sheet->mergeCells($oldAplh.'1:'.$alphbt.'1');
            }else{
                $sheet->setCellValue($alphbt.'2',$newFA['fields'][$totalColSpan++]);
                $sheet->getStyle($alphbt.'2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor);
                $sheet->getStyle($alphbt.'2')->applyFromArray($styleArray);
//                $sheet->getStyle($alphbt.'2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f48024');
//                $sheet->getStyle($alphbt.'2')->applyFromArray($styleArray);
//                $sheet->getStyle($alphbt.'2')->setAutoSize(true);
            }
            ++$alphbt;
            $black_alph[]= $alphbt;
            $sheet->setCellValue($alphbt.'1', '');
            ++$alphbt;
        }
        foreach(range('A',$alphbt) as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
       $spreadsheet->getActiveSheet()->getStyle("A4")->getNumberFormat()->setFormatCode('0.00'); 
        }
        
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $alphbt1 = 'A';
        $Rownumber=3;
//        dd($list);
        $countArray = [];
         foreach ($list as $k => $v){
             $amount = number_format((float)$v['value'], 2, '.', '');
             $value = ($v['type']==2)?('$'.$amount):(($v['type']==3)?($amount."%"):($amount));
             $valueRow = $amount;
              $day= date('l', strtotime(str_replace('-', '/', $v['date'])));
              if(($k % $fieldcout) == 0){
                  ++$Rownumber;
                  $alphbt1 = 'A';
                  
                 
                  
                  $spreadsheet->getActiveSheet()->getColumnDimension($alphbt1)->setAutoSize(true);
                  //value
                  $sheet->setCellValue($alphbt1.$Rownumber, $v['date']);
                  //style
                  if(($day == 'Sunday') || ($day == 'Saturday')){
                    $sheet->getStyle($alphbt1.$Rownumber)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor1);
                  }
                  $sheet->getStyle($alphbt1.$Rownumber)->applyFromArray($styleArray1);
                  
                  //value
                  $sheet->setCellValue(++$alphbt1.$Rownumber, $day);
                  
                  //style
                  if(($day == 'Sunday') || ($day == 'Saturday')){
                    $sheet->getStyle($alphbt1.$Rownumber)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor1);
                  }
//                  $sheet->getStyle($alphbt1.$Rownumber)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor1);
                  $sheet->getStyle($alphbt1.$Rownumber)->applyFromArray($styleArray1);
                  
                  
                  $sheet->setCellValue(++$alphbt1.$Rownumber, '');
              }
              if(in_array(++$alphbt1, $black_alph)){
                  $sheet->setCellValue($alphbt1.$Rownumber, '');
                  
                    $sheet->setCellValue(++$alphbt1.$Rownumber, $value);
                     $countArray[$alphbt1][$Rownumber] = $valueRow;
                    $spreadsheet->getActiveSheet()->getColumnDimension($alphbt1)->setAutoSize(true);
                     //style
                    if(($day == 'Sunday') || ($day == 'Saturday')){
                    $sheet->getStyle($alphbt1.$Rownumber)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor1);
                    }
                    $sheet->getStyle($alphbt1.$Rownumber)->applyFromArray($styleArray1);
              }else{
                  $sheet->setCellValue($alphbt1.$Rownumber, $value);
                  $countArray[$alphbt1][$Rownumber] = $valueRow;
                  
                   //style
                  if(($day == 'Sunday') || ($day == 'Saturday')){
                    $sheet->getStyle($alphbt1.$Rownumber)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($headerColor1);
                  }
                    $sheet->getStyle($alphbt1.$Rownumber)->applyFromArray($styleArray1);
                  $spreadsheet->getActiveSheet()->getColumnDimension($alphbt1)->setAutoSize(true);
              }
        }
        $Rownumber = ++$Rownumber;
        $sheet->setCellValue('A'.$Rownumber, "Total");
        $sheet->getStyle('A'.$Rownumber)->applyFromArray($styleArray1);
        $sheet->getStyle('B'.$Rownumber)->applyFromArray($styleArray1);
        foreach($countArray as $key=>$value){
            $Total = number_format(array_sum($value),'2');
            $sheet->setCellValue($key.$Rownumber, $Total);
            $sheet->getStyle($key.$Rownumber)->applyFromArray($styleArray1);
        }
        
        $spreadsheet->getActiveSheet()->getStyle("A1:".$alphbt."1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2:".$alphbt."2")->getFont()->setBold( true );
        $data = date('m-d-Y');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//        $name = $data.'.xlsx';
        $name = $request->clientname.'_'.$request->range.'.xlsx';
//        dd($name);
        header('Content-Disposition: attachment;filename="'.$name.'"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        unset($sheet);
        exit;
        
//        //origin
//        //test start
//        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
//$sheet = $spreadsheet->getActiveSheet();
//$sheet->setCellValue('A1', 'Date');
//$sheet->setCellValue('B1', 'Department');
//$sheet->mergeCells('A1:A2');
//$sheet->mergeCells('B1:B2');
//$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
////$writer->save('hello world.xlsx');
////$writer = new Xlsx($spreadsheet);
////          $name = $name.".xlsx";
//$name = 'text.xlsx';
//// header('Content-Disposition: attachment;filename="'.$name.'"');
////        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
////        header('Cache-Control: max-age=0');
//        $writer->save('php://output');
//        unset($sheet);
//        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$date)
    {
        
        $action = 'Edit';
        $clientId = $id;
        $fields = $this->fields;
        $fields[]='module_master_id';
        $list = ClientMaster::where('client_master_id',$id)
            ->first();
        $swMstrId = $list['software_master_id'];
        $fileMst = SoftwareFieldMaster::where('software_master_id',$swMstrId)
             ->join('module_master', 'module_master.module_master_id', '=', 'software_field_master.module_master_id')
             ->join('field_master', 'field_master.field_master_id', '=', 'software_field_master.field_master_id')
         ->select(['software_field_master.software_field_master_id','module_master.module_master_name','field_master.field_master_name'])
         ->get()->toArray();
        $newFA =[];
        $newFA['module'] =[];
        $newFA['fields'] =[];
        $newFA['value'] =[];
        foreach($fileMst as $key => $value){
                if(isset($newFA['module'][$value['module_master_name']])){
                    $colsCnt = $newFA['module'][$value['module_master_name']]['colspan'];
                    $newFA['module'][$value['module_master_name']] =['name'=>$value['module_master_name'],'rowspan'=>1,'colspan'=>++$colsCnt]; 
                } else{
                    $newFA['module'][$value['module_master_name']] =['name'=>$value['module_master_name'],'rowspan'=>1,'colspan'=>1]; 
                }
                if(!isset($newFA['module'][$value['field_master_name']])){
                    $newFA['fields'][] =$value['field_master_name']; 
                    $newFA['fieldsIds'][$value['software_field_master_id']] =$value['field_master_name']; 
                }
        }
//       dd($newFA);
      
        $data =  ReportMaster::where('client_master_id',$clientId)->where('date',$date)->get()->toArray();
        
        $software_field_master_id = [];
        $software_field_master_id['client_id'] = $clientId;
        $software_field_master_id['date'] = $date;
        foreach($data as $key=>$val){
            $software_field_master_id[$val['software_field_master_id']] = $val['value'];
        }
//        dump($software_field_master_id);
//        $clientId = 1;
//        dd();
        
//        dd($software_field_master_id);
//        $list = ClientMaster::where('client_master_id',$id)
//            ->first();
//        $swMstrId = $list['software_master_id'];
//        $fileMst = SoftwareFieldMaster::where('software_master_id',$swMstrId)
//                ->join('module_master', 'module_master.module_master_id', '=', 'software_field_master.module_master_id')
//                ->join('field_master', 'field_master.field_master_id', '=', 'software_field_master.field_master_id')
//            ->select(['software_field_master.software_field_master_id','module_master.module_master_name','field_master.field_master_name'])
//            ->get()->toArray();
//        dd($fileMst);
//        $billingmaster = ModuleMaster::where('module_master_id',$customer_id)->first($fields)->toArray();
        
//        return view('clientdashboard.create',compact('permission','fields','action','billingmaster'));
        return view('clientDashboard.create',compact('action','software_field_master_id','swMstrId','newFA','clientId'));
//        return view('module.create',compact('permission','fields','billingmaster','action'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientMaster $patientMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientMaster $patientMaster)
    {
        //
    }
}
