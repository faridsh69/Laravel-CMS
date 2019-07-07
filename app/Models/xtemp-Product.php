<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tempProduct extends Model
{
    // we dont need this table for version
    // Schema::create('products', function (Blueprint $table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->integer('price');
    //     $table->integer('inventory')->nullable();
    //     $table->integer('discount_price')->nullable();
    //     $table->text('description')->nullable();
    //     $table->string('meta_title')->nullable();
    //     $table->string('meta_description')->nullable();
    //     $table->string('keywords')->nullable();
    //     $table->integer('order')->nullable();
    //     $table->integer('minimum_inventory')->unsigned()->nullable();
    //     $table->string('group_id')->nullable();
    //     $table->tinyInteger('status')->default(1); // availabel - ended - ...
    //     $table->integer('brand_id')->unsigned()->nullable();
    //     $table->foreign('brand_id')->references('id')->on('brands');
    //     $table->integer('category_id')->unsigned()->nullable();
    //     $table->foreign('category_id')->references('id')->on('categories');
    //     $table->integer('user_id')->unsigned()->nullable();
    //     $table->foreign('user_id')->references('id')->on('users');
    //     $table->timestamps();
    //     $table->softDeletes();
    // });
}
