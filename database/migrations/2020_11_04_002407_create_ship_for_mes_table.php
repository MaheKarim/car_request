<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipForMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_for_mes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id');
            $table->string('product_name');
            $table->string('product_link')->nullable();
            $table->dateTime('journey_start_date')->nullable();
            $table->dateTime('journey_end_date')->nullable();
            $table->string('pickup_point');
            $table->longText('reason_for_booking');
            $table->string('recvr_phn_number1')->nullable();
            $table->string('recvr_mail')->nullable();
            $table->longText('recvr_address');
            $table->string('recvr_destination');
            $table->string('track_id');
            $table->string('comment')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('user_id');
            $table->foreignId('payment_status')->default(1);
            $table->string('payble_money')->nullable();
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
        Schema::dropIfExists('ship_for_mes');
    }
}
