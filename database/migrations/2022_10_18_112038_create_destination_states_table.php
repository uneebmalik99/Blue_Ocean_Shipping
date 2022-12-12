<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_states', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('abbrevation')->nullable();
            $table->enum('status',['0', '1' ])->default('1');
            $table->foreignId('country_id')->constrained('destination_countries')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('destination_states');
    }
}
