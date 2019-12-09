<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;
use App\Base\BaseMigration;

class CreateNotificationsTable extends BaseMigration
{
    public $model = 'Notification';
    // public function up()
    // {
    //     Schema::create('notifications', function (Blueprint $table) {
    //         $table->uuid('id')->primary();
    //         $table->string('type');
    //         $table->morphs('notifiable');
    //         $table->text('data');
    //         $table->timestamp('read_at')->nullable();
    //         $table->timestamps();
    //         $table->softDeletes();
    //     });
    // }

    // public function down()
    // {
    //     Schema::dropIfExists('notifications');
    // }
}
