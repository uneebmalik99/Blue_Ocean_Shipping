<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice__payments', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('export_id');
            $table->integer('customer_id');
            $table->double('paid_amount');
            $table->double('remaining_amount');
            $table->timestamps();
            $table->string('note');
            $table->string('added_by_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice__payments');
    }
}
