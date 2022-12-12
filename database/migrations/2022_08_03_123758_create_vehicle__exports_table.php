<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle__exports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('export_id')->constrained('exports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_user_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->double('custom_duty')->nullable();
            $table->double('clearance')->nullable();
            $table->double('towing')->nullable();
            $table->double('shipping')->nullable();
            $table->double('storage')->nullable();
            $table->double('local')->nullable();
            $table->double('others')->nullable();
            $table->double('additional')->nullable();
            $table->double('vat')->nullable();
            $table->string('remarks')->nullable();
            $table->double('title')->nullable();
            $table->double('discount')->nullable();
            $table->boolean('vehicle_export_is_deleted')->default(0)->nullable();
            $table->integer('note_status')->default(0)->nullable();
            $table->boolean('exchange_rate')->nullable();
            $table->boolean('ocean_charges')->default(0)->nullable();

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
        Schema::dropIfExists('vehicle__exports');
    }
}
