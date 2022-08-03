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
            $table->integer('provinces_id');
            $table->integer('cities_id');
            $table->string('address');
            $table->string('postcode');
            $table->string('phone_number');
            $table->decimal('shipping', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total', 15, 2);
            $table->string('order_number');
            $table->tinyInteger('process')->default(0)->comment('0 = Order, 1 = Process, 2 = Delivery, 3 = Finish');
            $table->string('resi')->nullable();
            $table->string('courier');
            $table->decimal('weight', 10, 2);
            $table->string('estimate');
            $table->string('note')->nullable();
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
