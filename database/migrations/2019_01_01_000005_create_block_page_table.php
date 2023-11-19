<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateBlockPageTable extends Migration
{
	public function up(): void
	{
		Schema::create('block_page', function (Blueprint $table): void {
			$table->unsignedBigInteger('block_id');
			$table->foreign('block_id')->references('id')->on('blocks')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('page_id');
			$table->foreign('page_id')->references('id')->on('pages')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('block_page');
	}
}
