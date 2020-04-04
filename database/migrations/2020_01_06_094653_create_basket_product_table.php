<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('basket_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('count')->unsigned()->default(1);
            $table->unsignedBigInteger('basket_id')->nullable();
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('basket_product');
    }
}
