<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exports', function (Blueprint $table) {
            $table->id();
            $table->date('export_date');
            $table->date('loading_date');
            $table->string('broker_name');
            $table->string('booking_number');
            $table->date('eta');
            $table->string('ar_number');
            $table->string('xtn_number');
            $table->string('seal_number');
            $table->string('container_number');
            $table->date('cutt_off');
            $table->string('vessel');
            $table->string('voyage');
            $table->string('terminal');
            $table->string('streamline_ship');
            $table->string('destination');
            $table->string('itn');
            $table->string('contact_details');
            $table->string('special_instruction');
            $table->string('container_type');
            $table->string('port_of_loading');
            $table->string('port_of_discharge');
            $table->string('export_invoice');
            $table->string('note');
            $table->boolean('export_is_deleted')->default(0);
            $table->foreignId('added_by_role')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_user_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('notes_status');
            $table->integer('oti_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exports');
    }
}
