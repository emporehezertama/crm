<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_client', function (Blueprint $table) {
            $table->string('pic_name', 100)->nullable();
            $table->string('pic_telepon', 100)->nullable();
            $table->string('pic_email', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_client', function (Blueprint $table) {
            //
        });
    }
}
