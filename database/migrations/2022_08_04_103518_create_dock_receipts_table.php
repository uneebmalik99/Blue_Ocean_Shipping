<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDockReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dock_receipts', function (Blueprint $table) {
            $table->foreignId('export_id')->constrained('exports')->onUpdate('cascade')->onDelete('cascade');
            $table->primary('export_id');
            $table->string('awb_number');
            $table->string('export_reference');
            $table->text('forwarding_agent');
            $table->text('domestic_routing_insctructions');
            $table->string('pre_carriage_by');
            $table->string('place_of_receipt_by_pre_carrier');
            $table->string('exporting_carrier');
            $table->string('final_destination');
            $table->string('loading_terminal');
            $table->string('container_type');
            $table->string('number_of_packages');
            $table->string('by');
            $table->date('date');
            $table->date('auto_recieving_date');
            $table->date('auto_cut_off');
            $table->date('vessel_cut_off');
            $table->date('sale_date');
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
        Schema::dropIfExists('dock_receipts');
    }
}
