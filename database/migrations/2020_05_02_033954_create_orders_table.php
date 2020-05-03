<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id');
            $table->bigInteger('seller_id');
            $table->bigInteger('product_id');
            $table->string('buyer_phone');
            $table->string('delivery_address');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->string('vehicle_name');
            $table->string('vehicle_number');
            $table->string('vehicle_capacity');
            $table->string('payment_method');
            $table->string('approved')->default("No");
            $table->string('approval_time')->nullable();
            $table->string('status')->default("The order is waiting for seller approval.");
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
        Schema::dropIfExists('orders');
    }
}
