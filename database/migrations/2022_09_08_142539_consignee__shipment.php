<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConsigneeShipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignee_shipment', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('consignee_id');

            $table->unsignedBigInteger('shipment_id');
            $table->foreign('consignee_id')->references('id')->on('consignees')->onDelete('cascade')->onUpdate('cascade')->nullable();

            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consignee_shipment', function (Blueprint $table) {
            //
        });
    }
}
