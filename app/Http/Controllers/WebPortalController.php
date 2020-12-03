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

class WebPortalController extends Controller
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
        $user = auth()->user()?auth()->user()->id:null;
       
        $list = \App\Model\ClientMaster::get(['client_master_id','client_master_name','software_master_id']);
          return view('webPortal.index',compact('list','user'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
       $web_portal_client_id = $request->id;
       $list = \App\Model\WebPortalMaster::where('web_portal_client_id',$web_portal_client_id)
           ->get();
       $clientDetails = \App\Model\ClientMaster::where('client_master_id',$request->id)
           ->first(['client_master_id','client_master_name','software_master_id'])->toArray();
       
       return view('webPortal.show',compact('list','web_portal_client_id','clientDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $permission = Permission::get();
        $action = 'add';
        $question = config('constants.question');
        return view('webPortal.create',compact('permission','action','id','question'));
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
//       dd($data);
        if($data['action'] == 'Edit'){
            unset($data['_token']);
            unset($data['token']);
            unset($data['action']);
            \App\Model\WebPortalMaster::where('user_reassign_master_id',$data['user_reassign_master_id'])->update($data);
        } else {
            unset($data['_token']);
            unset($data['action']);
            unset($data['token']);
            \App\Model\WebPortalMaster::create($data);
        }
        return redirect()->route('webportal.show',['id'=>$data['web_portal_client_id']]);
    }
    
      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = 'Edit';
        $permission = Permission::get();
        
        $list = \App\Model\WebPortalMaster::where('user_reassign_master_id',$id)
            ->first();
//        dd($list);
        $id = $list->web_portal_client_id;
        return view('webPortal.create',compact('permission','action','list','id'));
    }
     public function download($id){

        $list = \App\Model\WebPortalMaster::where('web_portal_client_id',$id)
            ->get();
        $clientDetails = \App\Model\ClientMaster::where('client_master_id',$id)
           ->first(['client_master_id','client_master_name','software_master_id'])->toArray();
         $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
         $styleArray = array(
            'font'  => array(
                'bold'  => true,
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
        $sheet->getStyle("C2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("D2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("E2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("F2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("G2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("H2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("I2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle("J2")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('C2', 'Sr.');
        $sheet->setCellValue('D2', 'Insurance, PMS');
        $sheet->setCellValue('E2', 'Username');
        $sheet->setCellValue('F2', 'Password');
        $sheet->setCellValue('G2', 'Weblink');
        $sheet->setCellValue('H2', 'Registered Email / Assigned to');
        $sheet->setCellValue('I2', 'Registered Phone#');
        $sheet->setCellValue('J2', 'Security Question');
        $i = 3;
        $srno = 1;
        $styleArray = array(
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
        foreach($list as $key=>$value){
            $sheet->getStyle("C$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("D$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("E$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("F$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("G$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("H$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("I$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle("J$i")->applyFromArray($styleArray)->getAlignment()
->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)->setWrapText(true);;
            $sheet->setCellValue("C$i", $srno);
            $sheet->setCellValue("D$i", $value->web_portal_insurance_pms);
            $sheet->setCellValue("E$i", $value->web_portal_username);
            $sheet->setCellValue("F$i", $value->web_portal_password);
            $sheet->setCellValue("G$i", $value->web_portal_weblink);
            $sheet->setCellValue("H$i", $value->web_portal_register_email);
            $sheet->setCellValue("I$i", $value->web_portal_registered_phone);
            $sheet->setCellValue("J$i", $value->web_portal_security_q);
           
            ++$i;
            ++$srno;
        }
         $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//        $name = $data.'.xlsx';
        $name = $clientDetails['client_master_name'].'.xlsx';
//        dd($name);
        header('Content-Disposition: attachment;filename="'.$name.'"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        unset($sheet);
        exit;
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
