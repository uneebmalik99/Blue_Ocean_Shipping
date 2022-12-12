<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippmentRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippment_rates', function (Blueprint $table) {
            $table->id();
            $table->string('container_size')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('loading_port')->nullable();
            $table->string('destination')->nullable();
            $table->string('shipping_line')->nullable();
            $table->string('rate')->nullable();
            $table->enum('status',['0', '1' ])->default('1');
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
        Schema::dropIfExists('shippment_rates');
    }
}
