<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateFactorProductTable extends Migration
{
	public function up(): void
	{
		Schema::create('factor_product', function (Blueprint $table): void {
			$table->increments('id');
			$table->integer('price')->unsigned();
			$table->integer('count')->unsigned();
			$table->integer('discount_price')->unsigned()->nullable();
			$table->unsignedBigInteger('factor_id')->nullable();
			$table->foreign('factor_id')->references('id')->on('factors');
			$table->unsignedBigInteger('product_id')->nullable();
			$table->foreign('product_id')->references('id')->on('products');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('factor_product');
	}
}
