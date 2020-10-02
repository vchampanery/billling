<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\ModuleMaster;
use App\Model\UserAssignMaster;
use App\Model\ClientMaster;
use App\User;
use App\Model\UserReassignMaster;

class UserAssignController extends Controller
{
    private  $fields = ['user_assign_master_id','client_master_id','user_master_id'];
    
    public function __construct () {
    }
    
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
        $userList = User::where('email', '<>','vt@gmail.com')->get()->toArray();
        $clientList = ClientMaster::all()->toArray();
        return view('userassign.create',compact('permission','fields','action','userList','clientList'));
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
            UserAssignMaster::where('module_master_id', '=', $data['module_master_id'])->update($data);
        } else {
            UserAssignMaster::create($data);
        }
        
        $fields = $this->fields;
        return view('userassign.show',compact('fields'));
    }
    
    public function reassign(){
        $userList = User::where('email', '<>','vt@gmail.com')->get()->toArray();
        $data = [];
        $action = 'reassign';
        
        return view('userAssign.reassign',compact('userList','action'));
    }

    public function getclient(Request $request) {
//        dd($request->toArray());
        $userId = $request->get('userId');
//        $userIdArray = explode(',', $userId);
        $userAssignMaster = UserAssignMaster::whereIn('user_master_id',$userId)
            ->join('client_master', 'client_master.client_master_id', '=', 'user_assign_master.client_master_id')
            ->get(['user_assign_master.client_master_id','client_master.client_master_name'])
            ->groupBy(['client_master.client_master_id']);
//        dd($userAssignMaster);
         return response()->json( array( 'status' =>'success', 'data'=>$userAssignMaster) );
    }
     public function reassignstore(Request $request) {
        $reqData = $request->toArray();
        $userId = $reqData['user_master_id'];
        $clientId = $reqData['client_master_id'];
        $date = $reqData['date'];
        foreach ($userId as $userK=>$userV){
            foreach ($clientId as $clientK=>$clientV){
                $uUserReassignMaster =[];
                $uUserReassignMaster['client_master_id']  =$clientV;
                $uUserReassignMaster['user_master_id']  =$userV;
                $uUserReassignMaster['date']  =$date;
                UserReassignMaster::create($uUserReassignMaster);
            }
        }
         return redirect()->route('clientdashboard.show');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
         $fields = $this->fields;
        if ($request->ajax()) {
            $data = UserAssignMaster::latest()->get($fields);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('userassign.show',compact('fields'));
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
        
        return view('userassign.create',compact('permission','fields','action','billingmaster'));
//        return view('userassign.create',compact('permission','fields','billingmaster','action'));

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
