<?php

namespace App\Http\Controllers;

use  App\Model\BillingMaster;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BillingController extends Controller
{
    private  $fields = ['biiling_date','units_visits_billed','charges_billed'
    ,'denied_count'                             
    ,'rejection_count'                          
    ,'insurance_unbilled_amount_unbillied'      
    ,'insurance_unbilled_amount_unbillied_per'  
    ,'insurance_unbilled_amount_thirty'         
    ,'insurance_unbilled_amount_thirty_per'     
    ,'insurance_unbilled_amount_sixty'          
    ,'insurance_unbilled_amount_sixty_per'      
    ,'insurance_unbilled_amount_ninety'         
    ,'insurance_unbilled_amount_ninety_per'     
    ,'insurance_unbilled_amount_onetwenty'      
    ,'insurance_unbilled_amount_onetwenty_per'  
    ,'insurance_unbilled_amount_onetwentyone'   
    ,'insurance_unbilled_amount_onetwentyone_per'
    ,'insurance_unbilled_amount_total'          
    ,'insurance_unbilled_amount_total_per'      
    ,'patient_unbilled_amount_unbillied'        
    ,'patient_unbilled_amount_unbillied_per'    
    ,'patient_unbilled_amount_thirty'           
    ,'patient_unbilled_amount_thirty_per'       
    ,'patient_unbilled_amount_sixty'            
    ,'patient_unbilled_amount_sixty_per'        
    ,'patient_unbilled_amount_ninety'           
    ,'patient_unbilled_amount_ninety_per'       
    ,'patient_unbilled_amount_onetwenty'        
    ,'patient_unbilled_amount_onetwenty_per'    
    ,'patient_unbilled_amount_onetwentyone'     
    ,'patient_unbilled_amount_onetwentyone_per' 
    ,'patient_unbilled_amount_total'            
    ,'patient_unbilled_amount_total_per'        
    ,'insurance_patient_unbilled_thirty'        
    ,'insurance_patient_unbilled_sixty'         
    ,'insurance_patient_unbilled_ninety'        
    ,'insurance_patient_unbilled_onetwenty'     
    ,'insurance_patient_unbilled_onetwentyone'  
    ,'insurance_patient_unbilled_onetwentyone'  	
    ,'insurance_patient_unbilled_onetwentyone'  
    ,'insurance_patient_unbilled_onetwentyone'
    ,'daily_insurance_collection' 
    ,'daily_patient_collection' 
    ,'daily_total_collection' 
    ,'master_day'                               
    ,'master_claims'                            
    ,'master_pending'                           
    ,'master_month_to_date'                     
    ,'master_app_to_pay'                        
    ,'master_year_to_date'                      
    ];
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
        $action = 'add';
        $permission = Permission::get();
        $fields = $this->fields;
        return view('billing.create',compact('permission','fields','action'));
        
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
            BillingMaster::where('billing_master_id', '=', $data['billing_master_id'])->update($data);
        } else {
            BillingMaster::create($data);
        }
        $fields = $this->fields;
        return view('billing.show',compact('fields'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
         $fields = $this->fields;
//         dd("tes");
        if ($request->ajax()) {
            $fields[]='billing_master_id';
            $data = BillingMaster::latest()->get($fields);
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('billing.show',compact('fields'));
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
         $fields[]='billing_master_id';
        $billingmaster = BillingMaster::where('billing_master_id',$customer_id)->first($fields)->toArray();
       
        return view('billing.create',compact('permission','fields','billingmaster','action'));

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
