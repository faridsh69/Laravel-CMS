<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // we dont need this table for version
    // Schema::create('menus', function (Blueprint $table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->string('url')->nullable();
    //     $table->integer('order')->unsigned()->nullable();
    //     $table->tinyInteger('location')->default(1);
    //     $table->tinyInteger('status')->default(1);
    //     $table->integer('menu_id')->unsigned()->nullable();
    //     $table->foreign('menu_id')->references('id')->on('menus');
    //     $table->integer('user_id')->unsigned()->nullable();
    //     $table->foreign('user_id')->references('id')->on('users');
    //     $table->timestamps();
    //     $table->softDeletes();
    // });
}
