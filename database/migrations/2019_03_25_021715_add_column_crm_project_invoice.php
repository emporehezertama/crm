<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCrmProjectInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_project_invoice', function (Blueprint $table) {
            $table->date('date_payment')->nullable()->after('remarks');
            $table->integer('total_payment')->nullable()->after('remarks');
            $table->string('remarks_payment')->nullable()->after('remarks');
            $table->smallInteger('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_project_invoice', function (Blueprint $table) {
            //
        });
    }
}
