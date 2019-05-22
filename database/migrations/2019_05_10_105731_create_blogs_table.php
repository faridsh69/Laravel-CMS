<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->unique();
            $table->string('title')->unique();
            $table->string('short_content')->nullable();
            $table->text('content');
            $table->string('meta_description');
            $table->string('keywords')->nullable();
            $table->string('meta_image')->nullable();
            $table->boolean('published')->default(true);
            $table->boolean('google_index')->default(true);
            $table->string('canonical_url')->nullable();
            // $table->string('related_blogs')->nullable();
            // $table->integer('category_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('editor_id')->unsigned();
            $table->foreign('editor_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
