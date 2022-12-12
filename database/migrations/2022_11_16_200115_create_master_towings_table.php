<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_towings', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('auction')->nullable();
            $table->string('rate');
            $table->string('new_jersery')->nullable();
            $table->string('georgia')->nullable();
            $table->string('teses')->nullable();
            $table->string('california')->nullable();
            $table->string('seattle')->nullable();
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
        Schema::dropIfExists('master_towings');
    }
}
