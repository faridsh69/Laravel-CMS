<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelRelatedTable extends Migration
{
    public function up()
    {
        Schema::create('model_related', function (Blueprint $table) {
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('related_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_related');
    }
}
