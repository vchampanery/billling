<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillingMaster extends Model
{
     public $table = 'billing_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['biiling_date','units_visits_billed','charges_billed'
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
    
 

}
