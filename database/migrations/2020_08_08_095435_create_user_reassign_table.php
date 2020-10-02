<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReassignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_reassign_master')){
            Schema::create('user_reassign_master', function (Blueprint $table) {
               $table->increments('user_reassign_master_id');
               $table->integer('client_master_id');
               $table->integer('user_master_id');
               $table->string('date');
               $table->unique([ 'user_reassign_master_id'], "uuser_reassign_master_kpis_unique");
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