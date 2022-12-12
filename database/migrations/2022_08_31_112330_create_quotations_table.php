<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('destination_port')->nullable();
            $table->string('valid_from')->nullable();
            $table->string('valid_till')->nullable();
            $table->string('container_size')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('loading_port')->nullable();
            $table->string('shipping_line')->nullable();
            $table->string('default')->nullable();
            $table->string('special_rate')->nullable();
            $table->foreignId('customer_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
