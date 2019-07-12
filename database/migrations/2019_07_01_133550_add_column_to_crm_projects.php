<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCrmProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_projects', function (Blueprint $table) {
            //
            $table->integer('project_type')->nullable();
            $table->integer('durataion')->nullable();
            $table->string('license_number')->nullable();
            $table->date('expired_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_projects', function (Blueprint $table) {
            //
        });
    }
}
