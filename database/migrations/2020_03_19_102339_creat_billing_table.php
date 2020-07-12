<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('billing_master')){
            Schema::create('billing_master', function (Blueprint $table) {
                $table->increments('billing_master_id');
                $table->string('biiling_date')->nullable();
                $table->string('units_visits_billed')->nullable();
                $table->string('charges_billed')->nullable();
                $table->string('denied_count')->nullable();                             
                $table->string('rejection_count')->nullable();                          
                $table->string('insurance_unbilled_amount_unbillied')->nullable();       
                $table->string('insurance_unbilled_amount_unbillied_per')->nullable();   
                $table->string('insurance_unbilled_amount_thirty')->nullable();          
                $table->string('insurance_unbilled_amount_thirty_per')->nullable();      
                $table->string('insurance_unbilled_amount_sixty')->nullable();           
                $table->string('insurance_unbilled_amount_sixty_per')->nullable();       
                $table->string('insurance_unbilled_amount_ninety')->nullable();          
                $table->string('insurance_unbilled_amount_ninety_per')->nullable();      
                $table->string('insurance_unbilled_amount_onetwenty')->nullable();       
                $table->string('insurance_unbilled_amount_onetwenty_per')->nullable();   
                $table->string('insurance_unbilled_amount_onetwentyone')->nullable();    
                $table->string('insurance_unbilled_amount_onetwentyone_per')->nullable(); 
                $table->string('insurance_unbilled_amount_total')->nullable();           
                $table->string('insurance_unbilled_amount_total_per')->nullable();
                $table->string('patient_unbilled_amount_unbillied')->nullable(); 
                $table->string('patient_unbilled_amount_unbillied_per')->nullable(); 
                $table->string('patient_unbilled_amount_thirty')->nullable();
                $table->string('patient_unbilled_amount_thirty_per')->nullable();
                $table->string('patient_unbilled_amount_sixty')->nullable();
                $table->string('patient_unbilled_amount_sixty_per')->nullable();
                $table->string('patient_unbilled_amount_ninety')->nullable();
                $table->string('patient_unbilled_amount_ninety_per')->nullable();
                $table->string('patient_unbilled_amount_onetwenty')->nullable(); 
                $table->string('patient_unbilled_amount_onetwenty_per')->nullable();
                $table->string('patient_unbilled_amount_onetwentyone')->nullable();
                $table->string('patient_unbilled_amount_onetwentyone_per')->nullable();
                $table->string('patient_unbilled_amount_total')->nullable();
                $table->string('patient_unbilled_amount_total_per')->nullable();
                $table->string('insurance_patient_unbilled_thirty')->nullable();
                $table->string('insurance_patient_unbilled_sixty')->nullable();
                $table->string('insurance_patient_unbilled_ninety')->nullable();
                $table->string('insurance_patient_unbilled_onetwenty')->nullable();
                $table->string('insurance_patient_unbilled_onetwentyone')->nullable();
                $table->string('daily_insurance_collection')->nullable(); 
                $table->string('daily_patient_collection')->nullable(); 
                $table->string('daily_total_collection')->nullable();  
                $table->string('master_day')->nullable();                                
                $table->string('master_claims')->nullable();                             
                $table->string('master_pending')->nullable();                            
                $table->string('master_month_to_date')->nullable();                      
                $table->string('master_app_to_pay')->nullable();                         
                $table->string('master_year_to_date')->nullable();
                $table->timestamps();
                $table->softDeletes();
           });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
