<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('report_master')){
            Schema::create('report_master', function (Blueprint $table) {
               $table->increments('report_master_id');
               $table->integer('client_master_id');
               $table->string('date');
               $table->integer('software_field_master_id');
               $table->string('value');
               $table->integer('updated_by');
               $table->unique([ 'report_master_id'], "report_master_kpis_unique");
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
        Schema::dropIfExists('user_assign_master');
    }
}