<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCrmProjectInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_project_invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crm_project_id')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('date')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('tax_price')->nullable();
            $table->string('total')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('crm_project_invoice');
    }
}
