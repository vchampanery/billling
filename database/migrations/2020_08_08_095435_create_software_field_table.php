<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('software_field_master')){
            Schema::create('software_field_master', function (Blueprint $table) {
               $table->increments('software_field_master_id');
               $table->integer('software_master_id');
               $table->integer('module_master_id');
               $table->integer('field_master_id');
               $table->unique([ 'software_field_master_id'], "software_field_master_kpis_unique");
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
        Schema::dropIfExists('software_master');
    }
}