<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadingPortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loading_ports', function (Blueprint $table) {
            $table->id();
            $table->string('destination')->nullable();
            $table->enum('status',['0', '1' ])->default('1');
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('loading_ports');
    }
}
