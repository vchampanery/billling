<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebPortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('web_portal_master')){
            Schema::create('web_portal_master', function (Blueprint $table) {
                 $table->increments('user_reassign_master_id');
                 $table->integer('web_portal_client_id');
                 $table->text('web_portal_insurance_pms')->nullable();
                 $table->text('web_portal_username')->nullable();
                 $table->text('web_portal_password')->nullable();
                 $table->text('web_portal_weblink')->nullable();
                 $table->text('web_portal_register_email')->nullable();
                 $table->text('web_portal_registered_phone')->nullable();
                 $table->text('web_portal_security_qa')->nullable();
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
        Schema::dropIfExists('web_portal');
    }
}
