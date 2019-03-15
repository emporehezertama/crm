<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crm_client_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->smallInteger('pipeline_status')->nullable();
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
        Schema::dropIfExists('crm_projects');
    }
}
