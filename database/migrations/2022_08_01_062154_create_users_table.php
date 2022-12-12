<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('authkey')->nullable();
            $table->string('password');
            $table->string('password_reset_token')->nullable();
            $table->string('email')->unique();
            $table->string('company_name');
            $table->string('company_email');
            $table->enum('status',['0', '1' ])->default('1');
            $table->string('role_id')->nullable();
            $table->string('user_is_detected')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('level')->nullable();
            $table->string('industry')->nullable();
            $table->string('source')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('sales_type')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('inside_person')->nullable();
            $table->string('lead')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('price_code')->nullable();
            $table->string('location_number')->nullable();
            $table->string('added_by_user')->nullable();
            $table->string('user_image')->nullable();
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
        Schema::dropIfExists('users');
    }
}
