<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\ModuleMaster;
use App\Model\UserAssignMaster;

class UserDashboardController extends Controller
{
    private  $fields = ['module_master_name'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $action = 'add';
        return view('module.create',compact('permission','fields','action'));
        
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
        if($data['action'] == 'edit'){
            unset($data['_token']);
            unset($data['action']);
            ModuleMaster::where('module_master_id', '=', $data['module_master_id'])->update($data);
        } else {
            ModuleMaster::create($data);
        }
        $fields = $this->fields;
        return view('module.show',compact('fields'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
//        $user = auth()->user(); 
        $user = isset(auth()->user()->id)?auth()->user()->id:2; 
         $roles = auth()->user()->roles->pluck('name')->toArray();
         if($roles[0] == 'admin'){
             $list = \App\Model\ClientMaster::get(['client_master_id','client_master_name']);
         } else {
            $list = UserAssignMaster::where('user_master_id',$user)
            ->join('client_master', 'client_master.client_master_id', '=', 'user_assign_master.client_master_id')
            ->get(['user_assign_master.client_master_id','client_master.client_master_name']);
         }
        
             
        return view('userDashboard.show',compact('list'));
    }
    
    public function downloadExcel(){
           
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//$writer->save('hello world.xlsx');
//$writer = new Xlsx($spreadsheet);
//          $name = $name.".xlsx";
$name = 'text.xlsx';
 header('Content-Disposition: attachment;filename="'.$name.'"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        unset($sheet);
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {
        $action = 'Edit';
        $permission = Permission::get();
        $fields = $this->fields;
         $fields[]='module_master_id';
        $billingmaster = ModuleMaster::where('module_master_id',$customer_id)->first($fields)->toArray();
        
        return view('module.create',compact('permission','fields','action','billingmaster'));
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
