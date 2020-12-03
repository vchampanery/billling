<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWebPortalMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_portal_master', function (Blueprint $table) {
            $table->renameColumn('web_portal_security_qa', 'web_portal_security_q');
               $table->text('web_portal_security_a')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('web_portal_master', function (Blueprint $table) {
            $table->renameColumn('web_portal_security_q', 'web_portal_security_qa');
        });
    }
}
