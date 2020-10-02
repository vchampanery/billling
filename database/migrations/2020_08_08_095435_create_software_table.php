<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('software_master')){
            Schema::create('software_master', function (Blueprint $table) {
               $table->increments('software_master_id');
               $table->string('software_master_name',100)->index('software_master_idx');
               $table->unique([ 'software_master_id'], "software_master_kpis_unique");
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