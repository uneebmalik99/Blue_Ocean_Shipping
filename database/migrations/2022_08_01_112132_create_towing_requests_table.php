<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTowingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('condition')->nullable();
            $table->integer('damaged')->nullable();
            $table->boolean('pictures')->nullable();
            $table->boolean('towed')->nullable();
            $table->boolean('title_recieved')->nullable();
            $table->date('title_recieved_date')->nullable();
            $table->string('title_number')->nullable();
            $table->string('title_state')->nullable();
            $table->date('towing_request_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->date('deliver_date')->nullable();
            $table->string('note')->nullable();
            $table->integer('title_type')->default(0)->nullable();
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
        Schema::dropIfExists('towing_requests');
    }
}
