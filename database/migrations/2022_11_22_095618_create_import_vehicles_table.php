<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('vin');
            $table->string('year');
            $table->string('make');
            $table->string('model');
            $table->string('vehicle_type');
            $table->string('color');
            $table->string('weight');
            $table->string('value');
            $table->string('auction');
            $table->string('buyer_id');
            $table->string('key');
            $table->string('note')->nullable();
            $table->string('hat_number')->nullable();
            $table->string('title_type')->nullable();
            $table->string('title')->nullable();
            $table->date('title_rec_date')->nullable();
            $table->string('title_state')->nullable();
            $table->integer('title_number')->nullable();
            $table->string('shipper_name')->nullable();
            $table->string('status');
            $table->date('sale_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->integer('days')->nullable();
            $table->date('posted_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->string('delivered')->nullable();
            $table->date('delivered_date')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('site')->nullable();
            $table->string('dealer_fee')->nullable();
            $table->string('late_fee')->nullable();
            $table->string('auction_storage')->nullable();
            $table->string('towing_charges')->nullable();
            $table->string('warehouse_storage')->nullable();
            $table->string('title_fee')->nullable();
            $table->string('port_detention_fee')->nullable();
            $table->string('custom_inspection')->nullable();
            $table->string('additional_fee')->nullable();
            $table->string('insurance')->nullable();
            $table->string('fee')->nullable();
            $table->string('customer_paying_fee')->nullable();
            $table->string('profit')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('bidder')->nullable();
            $table->string('lot')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('age')->nullable();
            $table->date('assign_date')->nullable();
            $table->longText('description')->nullable();
            $table->date('dispatch_date')->nullable();
            $table->string('port')->nullable();
            $table->string('vehicle_is_deleted')->nullable();
            $table->string('shipment_id')->nullable();
            $table->string('added_by_user')->nullable();
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
        Schema::dropIfExists('import_vehicles');
    }
}
