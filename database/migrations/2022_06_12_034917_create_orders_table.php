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
            $table->integer('users_id');
            $table->string('name');
            $table->string('email');
            $table->string('street_address');
            $table->string('house_address')->nullable();
            $table->integer('provinces_id');
            $table->integer('cities_id');
            $table->integer('districts_id');
            $table->bigInteger('villages_id');
            $table->string('postcode');
            $table->string('phone_number');
            $table->string('note')->nullable();
            $table->string('status')->nullable();
            $table->string('order_id');
            $table->string('transaction_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->bigInteger('gross_amount');
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
