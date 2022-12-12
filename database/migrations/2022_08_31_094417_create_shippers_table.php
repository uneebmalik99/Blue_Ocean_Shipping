<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();
            $table->string('shipper_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('consignee')->nullable();
            $table->string('consolidate')->nullable();
            $table->string('original_shipping_documents')->nullable();
            $table->string('insurance')->nullable();
            $table->string('destination_port')->nullable();
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
        Schema::dropIfExists('shippers');
    }
}
