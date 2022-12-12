<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignees', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_user_id');
            $table->string('consignee_name');
            $table->string('consignee_address_1');
            $table->string('consignee_address_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip_code');
            $table->string('phone');
            $table->string('cargo_details');
            $table->foreignId('added_by_role')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('consignees');
    }
}
