<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('handphone', 25)->nullable();
            $table->string('fax', 25)->nullable();
            $table->text('address', 25)->nullable();
            $table->string('email')->nullable();
            $table->smallInteger('type_customer')->nullable();
            $table->string('company')->nullable();
            $table->integer('sales_id')->nullable();
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
        Schema::dropIfExists('client');
    }
}
