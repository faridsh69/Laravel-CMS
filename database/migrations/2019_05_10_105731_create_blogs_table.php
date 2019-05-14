<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('url')->uniqe();
            $table->string('short_content')->nullable();
            $table->text('content');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('editor_id')->unsigned();
            $table->foreign('editor_id')->references('id')->on('users');
            $table->boolean('published')->default(true);
            $table->boolean('google_index')->default(true);
            $table->string('meta_description');
            $table->string('keywords')->nullable();
            $table->string('meta_image')->nullable();
            $table->enum('status', ['active', 'deactive']);
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
        Schema::dropIfExists('blogs');
    }
}
