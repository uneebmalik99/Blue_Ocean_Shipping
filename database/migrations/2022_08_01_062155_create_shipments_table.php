<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('shipment_type')->nullable();
            $table->date('loading_date')->nullable();
            $table->date('cut_off_date')->nullable();
            $table->date('export_date')->nullable();
            $table->date('ship_date')->nullable();
            $table->date('sale_date')->nullable();
            $table->date('est_arrival_date')->nullable();
            $table->string('booking_number')->nullable();
            $table->string('container_no')->nullable();
            $table->string('container_size')->nullable();
            $table->string('container_type')->nullable();
            $table->string('shipping_reference')->nullable();
            $table->string('ase-itn_number')->nullable();
            $table->string('xtn_number')->nullable();
            $table->string('oti_number')->nullable();
            // $table->foreignId('select_consignee')->nullable()->constrained('user')->onUpdate('cascade')->onDelete('cascade');
            $table->string('select_consignee')->nullable();
            $table->string('shipper')->nullable();
            $table->string('loading_terminal')->nullable();
            $table->string('loading_port')->nullable();
            // $table->foreignId('loading_port')->nullable()->constrained('locations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('loading_state')->nullable();
            $table->string('discharge_port')->nullable();
            $table->string('loading_country')->nullable();
            $table->string('destination_terminal')->nullable();
            $table->string('destination_port')->nullable();
            // $table->foreignId('destination_port')->nullable()->constrained('locations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('destination_state')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('hand_over_to')->nullable();
            $table->date('hand_over_date')->nullable();
            $table->string('shipping_line')->nullable();
            $table->string('vessel')->nullable();
            $table->string('seal_number')->nullable();
            $table->string('voyage')->nullable();
            $table->string('units')->nullable();
            $table->string('types')->nullable();
            $table->string('insurance')->nullable();
            $table->string('fmc_license_number')->nullable();
            $table->string('select_notify_party')->nullable();
            $table->foreignId('status')->nullable()->constrained('shipment_statuses')->onUpdate('cascade')->onDelete('cascade');
            // $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
