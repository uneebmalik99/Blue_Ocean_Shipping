<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('status',['0', '1' ])->default('1');
            $table->timestamps();
            // name
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_types');
    }
}
