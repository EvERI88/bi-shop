<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersTable extends Migration
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
            $table->integer('address_id');
            $table->integer('products_id');
            $table->integer('users_id');
//            $table->foreignId('address_id');
//            $table->foreign('address_id')->references('id')->on('deleveries');
//            $table->foreignId('products_id');
//            $table->foreign('products_id')->references('id')->on('deleveries');
//            $table->foreignId('users_id');
//            $table->foreign('users_id')->references('id')->on('deleveries');
            $table->integer('price');
            $table->integer('value');
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
        //
    }
}
