<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetReqCtrlNoDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sys_official_nos', function (Blueprint $table) {
            //
            $table->string('requisition_ctrl_no', 25)->default('100000')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sys_official_nos', function (Blueprint $table) {
            //
            $table->string('requisition_ctrl_no', 25)->change();
        });
    }
}
