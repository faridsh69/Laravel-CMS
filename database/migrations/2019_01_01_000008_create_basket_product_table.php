<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateBasketProductTable extends Migration
{
	public function up(): void
	{
		Schema::create('basket_product', function (Blueprint $table): void {
			$table->integer('count')->unsigned()->default(1);
			$table->unsignedBigInteger('basket_id')->nullable();
			$table->foreign('basket_id')->references('id')->on('baskets');
			$table->unsignedBigInteger('product_id')->nullable();
			$table->foreign('product_id')->references('id')->on('products');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('basket_product');
	}
}
