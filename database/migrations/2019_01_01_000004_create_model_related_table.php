<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateModelRelatedTable extends Migration
{
	public function up(): void
	{
		Schema::create('model_related', function (Blueprint $table): void {
			$table->unsignedBigInteger('model_id');
			$table->unsignedBigInteger('related_id');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('model_related');
	}
}
