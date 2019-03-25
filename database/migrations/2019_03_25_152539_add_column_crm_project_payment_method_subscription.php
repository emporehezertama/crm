<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCrmProjectPaymentMethodSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_project_payment_method_subscription', function (Blueprint $table) {
            $table->date('due_date')->nullable()->after('status');
            $table->string('terms')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_project_payment_method_subscription', function (Blueprint $table) {
            //
        });
    }
}
