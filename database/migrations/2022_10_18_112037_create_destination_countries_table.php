<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrevation')->nullable();
            $table->enum('status',['0', '1' ])->default('1');
            $table->timestamps();
            // destination
            // status
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destination_countries');
    }
}
