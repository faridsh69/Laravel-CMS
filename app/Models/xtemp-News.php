<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // we dont need this table for version
    // Schema::create('news', function (Blueprint $table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->string('top_title')->nullable();
    //     $table->string('sub_title')->nullable();
    //     $table->text('content');
    //     $table->string('meta_title')->nullable();
    //     $table->string('meta_description')->nullable();
    //     $table->tinyInteger('status')->default(1);
    //     $table->integer('category_id')->unsigned()->nullable();
    //     $table->foreign('category_id')->references('id')->on('categories');
    //     $table->integer('image_id')->unsigned()->nullable();
    //     $table->foreign('image_id')->references('id')->on('images');
    //     $table->integer('user_id')->unsigned()->nullable();
    //     $table->foreign('user_id')->references('id')->on('users');
    //     $table->timestamps();
    // });
}
