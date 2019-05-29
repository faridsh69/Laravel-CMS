<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    // we dont need this table for version
    // Schema::create('features', function (Blueprint $table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->string('group')->nullable();
    //     $table->string('unit')->nullable();
    //     $table->boolean('price_affected')->default(0);
    //     $table->boolean('filter')->default(1);
    //     $table->string('type')->nullable();
    //     $table->text('options')->nullable();
    //     $table->tinyInteger('order')->nullable();
    //     $table->tinyInteger('status')->default(1);
    //     $table->integer('category_id')->unsigned()->nullable();
    //     $table->foreign('category_id')->references('id')->on('categories');
    //     $table->integer('user_id')->unsigned()->nullable();
    //     $table->foreign('user_id')->references('id')->on('users');
    //     $table->timestamps();
    //     $table->softDeletes();
    // });
}
