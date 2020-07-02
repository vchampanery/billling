<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('patient_master')){
            Schema::create('patient_master', function (Blueprint $table) {
               $table->increments('patient_master_id');
               $table->string('patient_master_name',100)->index('patient_master_idx');
               $table->string('patient_master_email')->nullable();
               $table->string('patient_master_mobile_number')->nullable();
               $table->string('patient_master_phone_number')->nullable();
               $table->unique([ 'patient_master_id'], "patient_master_kpis_unique");
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
