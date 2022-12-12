<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_parties', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('foreign_passport_number')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('shipping')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('purchased_from')->nullable();
            $table->string('request_pickup')->nullable();
            $table->string('end_use')->nullable();
            $table->string('buyer_number')->nullable();
            $table->foreignId('customer_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
        Schema::dropIfExists('billing_parties');
    }
}
