<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_assignments', function (Blueprint $table) {
            $table->string('item_name');
            $table->string('user_id');
            //SETTING THE PRIMARY KEYS
            $table->primary(['item_name','user_id']);
            $table->foreignId('auth_user_id')->constrained('user')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('auth_assignments');
    }
}
