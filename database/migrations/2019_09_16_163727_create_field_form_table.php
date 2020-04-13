<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldFormTable extends Migration
{
    public function up()
    {
        Schema::create('field_form', function (Blueprint $table) {
            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('field_form');
    }
}
