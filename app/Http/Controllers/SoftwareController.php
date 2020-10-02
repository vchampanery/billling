<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\SoftwareMaster;

class SoftwareController extends Controller
{
    private  $fields = ['software_master_name'];
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
        return view('software.create',compact('permission','fields','action'));
        
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
            SoftwareMaster::where('software_master_id', '=', $data['software_master_id'])->update($data);
        } else {
            SoftwareMaster::create($data);
        }
        $fields = $this->fields;
        return view('software.show',compact('fields'));
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
            $fields[]='software_master_id';
           
            $data = SoftwareMaster::latest()->get($fields);
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('software.show',compact('fields'));
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
         $fields[]='software_master_id';
        $billingmaster = SoftwareMaster::where('software_master_id',$customer_id)->first($fields)->toArray();
        
        return view('software.create',compact('permission','fields','action','billingmaster'));
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
