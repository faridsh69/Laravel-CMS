<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorTagendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factor_tagend');
    }
}
