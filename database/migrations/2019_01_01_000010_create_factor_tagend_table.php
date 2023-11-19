<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateFactorTagendTable extends Migration
{
	public function up(): void
	{
		Schema::create('factor_tagend', function (Blueprint $table): void {
			$table->unsignedBigInteger('id');
			$table->integer('value');
			$table->unsignedBigInteger('factor_id')->nullable();
			$table->foreign('factor_id')->references('id')->on('factors');
			$table->unsignedBigInteger('tagend_id');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('factor_tagend');
	}
}
