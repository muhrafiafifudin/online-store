<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('street_address')->nullable();
            $table->integer('provinces_id')->nullable();
            $table->integer('cities_id')->nullable();
            $table->integer('districts_id')->nullable();
            $table->bigInteger('villages_id')->nullable();
            $table->string('postcode')->nullable();
            $table->string('maps')->comment('With maps embed')->nullable();
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
        Schema::dropIfExists('store_profiles');
    }
}
