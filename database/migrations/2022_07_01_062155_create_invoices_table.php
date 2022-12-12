<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('ar_number');
            $table->string('company_name')->nullable();
            $table->string('port_of_loading')->nullable;
            $table->string('destination_port')->nullable();
            $table->string('container_size')->nullable();
            $table->integer("invoice_no")->nullable();
            $table->integer("invoice_amount")->nullable();
            $table->integer("invoice_date")->nullable();
            $table->string("due_date")->nullable();
            $table->string("payment_date")->nullable();
            $table->integer("received_amount")->nullable();
            $table->integer("balance")->nullable();
            $table->string("invoice_document")->nullable();
            $table->foreignId('added_by_role')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
