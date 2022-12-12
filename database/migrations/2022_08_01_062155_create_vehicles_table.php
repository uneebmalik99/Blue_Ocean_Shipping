<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('vin')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('color')->nullable();
            $table->string('weight')->nullable();
            $table->string('value')->nullable();
            $table->string('auction')->nullable();
            $table->string('buyer_id')->nullable();
            // $table->foreignId('buyer_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('key')->nullable();
            $table->string('note')->nullable();
            $table->string('hat_number')->nullable();
            $table->string('title_type')->nullable();
            $table->string('title')->nullable();
            $table->date('title_rec_date')->nullable();
            // $table->foreignId('title_state')->constrained('locations')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('title_state')->nullable();
            $table->integer('title_number')->nullable();
            $table->string('shipper_name')->nullable();
            $table->foreignId('status')->constrained('vehicle_status')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
            // $table->foreignId('port')->constrained('locations')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('port')->nullable();
            $table->string('vehicle_is_deleted')->nullable();
            $table->foreignId('shipment_id')->constrained('shipments')->nullable()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('inovice_id')->constrained('invoices')->nullable()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('added_by_user')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('vehicles');
    }
}
