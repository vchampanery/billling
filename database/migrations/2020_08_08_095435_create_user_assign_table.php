<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAssignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_assign_master')){
            Schema::create('user_assign_master', function (Blueprint $table) {
               $table->increments('user_assign_master_id');
               $table->increments('client_master_id');
               $table->increments('user_master_id');
               $table->unique([ 'user_assign_master_id'], "user_assign_master_kpis_unique");
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