<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateFieldFormTable extends Migration
{
	public function up(): void
	{
		Schema::create('field_form', function (Blueprint $table): void {
			$table->unsignedBigInteger('form_id');
			$table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
			$table->unsignedBigInteger('field_id');
			$table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('field_form');
	}
}
