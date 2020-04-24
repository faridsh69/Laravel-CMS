<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorTagendTable extends Migration
{
    public function up()
    {
        Schema::create('factor_tagend', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->integer('value');
            $table->unsignedBigInteger('factor_id')->nullable();
            $table->foreign('factor_id')->references('id')->on('factors');
            $table->unsignedBigInteger('tagend_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('factor_tagend');
    }
}
