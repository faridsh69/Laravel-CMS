<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorTagendTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('factor_tagend', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');
            $table->unsignedBigInteger('factor_id')->nullable();
            $table->foreign('factor_id')->references('id')->on('factors');
            $table->unsignedBigInteger('tagend_id')->nullable();
            $table->foreign('tagend_id')->references('id')->on('tagends');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('factor_tagend');
    }
}
