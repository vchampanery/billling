<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('client_master')){
            Schema::create('client_master', function (Blueprint $table) {
               $table->increments('client_master_id');
               $table->string('client_master_name',100)->index('client_master_idx');
               $table->integer('software_master_id');
               $table->unique([ 'client_master_id'], "client_master_kpis_unique");
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
        Schema::dropIfExists('client_master');
    }
}