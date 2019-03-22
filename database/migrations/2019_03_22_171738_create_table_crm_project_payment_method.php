<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCrmProjectPaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_project_payment_method_perpetual_license', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crm_project_id')->nullable();
            $table->string('terms')->nullable();
            $table->string('milestone')->nullable();
            $table->smallInteger('persen')->nullable();
            $table->integer('value')->nullable();
            $table->smallInteger('status')->nullable();
            $table->integer('crm_project_invoice_id')->nullable();
            $table->timestamps();
        });

        Schema::create('crm_project_payment_method_subscription', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crm_project_id')->nullable();
            $table->integer('value')->nullable();
            $table->string('type', 50)->nullable();
            $table->smallInteger('status')->nullable();
            $table->integer('crm_project_invoice_id')->nullable();
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
        Schema::dropIfExists('crm_project_payment_method_perpetual_license');
    }
}
