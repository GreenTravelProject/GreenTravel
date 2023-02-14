<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_id')->references('id')->on('delivery');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('shopping_cart_id')->references('id')->on('shopping_carts'); //? DUDA
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
        Schema::dropIfExists('delivery_product');
    }
};
