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
