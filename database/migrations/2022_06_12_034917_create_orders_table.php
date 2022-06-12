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
            $table->string('full_name');
            $table->string('email');
            $table->string('street_address');
            $table->string('house_address')->nullable();
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('village');
            $table->string('post_code');
            $table->string('phone_number');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('traking_no');
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
