<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_form', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->bigInteger('field_id')->unsigned()->nullable();
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_form');
    }
}
