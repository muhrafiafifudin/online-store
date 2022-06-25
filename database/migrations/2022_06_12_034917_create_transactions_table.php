<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
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
            $table->integer('gross_amount');
            $table->string('order_number');
            $table->string('note')->nullable();
            $table->tinyInteger('process')->default(0)->comment('0 = Order, 1 = Process, 2 = Delivery, 3 = Finish');
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
        Schema::dropIfExists('transactions');
    }
}
