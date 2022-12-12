<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export__images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->foreignId('export_id')->constrained('exports')->onDelete('cascade')->onUpdate('cascade');
            $table->string('baseurl')->nullable();
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
        Schema::dropIfExists('export__images');
    }
}
