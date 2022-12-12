<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_documents', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('description')->nullable();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('customer_documents');
    }
}
