<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_items', function (Blueprint $table) {
            $table->string('name');
            $table->primary('name');
            $table->smallInteger('type');
            $table->string('description')->nullable();
            $table->string('rule_name')->nullable();
            $table->binary('data')->nullable();
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
        Schema::dropIfExists('auth_items');
    }
}
