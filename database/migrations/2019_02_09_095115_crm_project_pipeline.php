<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmProjectPipeline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_project_pipeline', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crm_project_id')->nullable();
            $table->integer('status_card')->nullable();
            $table->integer('status_pipeline')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_project_pipeline');
    }
}
