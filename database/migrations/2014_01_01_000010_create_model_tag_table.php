<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTagTable extends Migration
{
    public function up()
    {
        Schema::create('model_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('model_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_tag');
    }
}
