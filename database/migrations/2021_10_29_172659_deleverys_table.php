<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleverysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreignId('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreignId('users_id');
            $table->foreign('users_id')->references('id')->on('users');
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
