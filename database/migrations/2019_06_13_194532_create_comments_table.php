<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{
    public function up(): void
    {
        Schema::defaultStringLength(191);
        Schema::create($this->commentsTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('commentable_id')->nullable();
            $table->string('commentable_type')->nullable();
            $table->index(['commentable_id', 'commentable_type']);
            $table->string('commented_id')->nullable();
            $table->string('commented_type')->nullable();
            $table->index(['commented_id', 'commented_type']);
            $table->longText('comment');
            $table->boolean('approved')->default(true);
            $table->double('rate', 15, 8)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::drop($this->commentsTable());
    }

    private function commentsTable(): string
    {
        $model = config('comment.model');

        return (new $model())->getTable();
    }
}
