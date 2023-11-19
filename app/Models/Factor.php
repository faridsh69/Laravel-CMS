<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;
use Auth;

final class Factor extends CmsModel
{
	public const STATUS_INITIAL = 1;

	public const STATUS_PAYMENT = 2;

	public const STATUS_PROCCESSING = 3;

	public const STATUS_PREPARING = 4;

	public const STATUS_DELIVERING = 5;

	public const STATUS_CANCELED = 6;

	public const STATUS_SUCCEED = 7;

	public const PAYMENT_LOCAL = 'پرداخت در محل';

	public const PAYMENT_CART = 'پرداخت کارت به کارت';

	public const PAYMENT_ONLINE = 'پرداخت آنلاین';

	public $columns = [
		[
			'name' => 'type',
			'type' => 'string',
			'database' => '',
			'rule' => 'required',
			'help' => '',
			'form_type' => 'enum',
			'form_enum_class' => 'FactorStatus',
			'table' => true,
		],
		[
			'name' => 'price',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => 'nullable|numeric',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'factor_title',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'customer_info',
			'type' => 'text',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => 'textarea',
			'table' => false,
		],
		[
			'name' => 'bank_cart_number',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'order_status',
			'type' => 'boolean',
			'database' => 'default',
			'rule' => 'boolean',
			'help' => '',
			'form_type' => 'checkbox-m',
			'table' => false,
		],
		[
			'name' => 'payment_description',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => 'textarea',
			'table' => false,
		],
		[
			'name' => 'total_price',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'shipping',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'payment',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'user_description',
			'type' => 'text',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => 'textarea',
			'table' => false,
		],
		[
			'name' => 'admin_description',
			'type' => 'text',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => 'textarea',
			'table' => false,
		],
		[
			'name' => 'admin_seen',
			'type' => 'boolean',
			'database' => 'default',
			'rule' => '',
			'help' => '',
			'form_type' => 'checkbox-m',
			'table' => true,
		],
		[
			'name' => 'status',
			'type' => 'unsignedTinyInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => 'enum',
			'form_enum_class' => 'FactorStatus',
			'table' => true,
		],
		[
			'name' => 'address_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'relation' => 'addresses',
			'rule' => 'nullable|exists:addresses,id',
			'help' => '',
			'form_type' => 'entity',
			'class' => 'App\Models\Address',
			'property' => 'address',
			'property_key' => 'id',
			'multiple' => false,
			'table' => false,
		],
		[
			'name' => 'user_id',
		],
		[
			'name' => 'activated',
		],
	];

	public function scopeCurrentFactor($query)
	{
		return $query->where('user_id', Auth::id())
			->where('status', '<', 3)
			// ->where('admin_seen', 0)
			// ->where('created_at', '>', carbon::now()->subHour() )
			->orderBy('id', 'desc');
	}

	public function products()
	{
		return $this->belongsToMany('App\Models\Product')->withPivot('count')->withPivot('price')->withPivot(
			'discount_price'
		);
	}

	public function address()
	{
		return $this->belongsTo(Address::class, 'address_id', 'id');
	}

	public function tagends()
	{
		return $this->belongsToMany(Tagend::class)->withPivot('value');
	}

	public function fillFactorProducts()
	{
		$this->products()->sync([]);
		$basket = FactorService::_getUserBasket();

		foreach ($basket->products as $product) {
			if ($product->activated !== 1) {
				continue;
			}
			$count = $product->pivot->count;
			$this->products()->syncWithoutDetaching([
				$product->id => [
					'count' => $count,
					'price' => $product->price,
					'discount_price' => $product->discount_price,
				],
			]);
		}

		return $this;
	}

	public function fillFactorTagends()
	{
		$tagends = Tagend::forced()
			->get();

		foreach ($tagends as $tagend) {
			$this->addTagendToFactor($tagend);
		}

		return $this;
	}

	public function calculateTotalPriceWithTagends()
	{
		$total_price = $this->total_price_products();

		foreach ($this->tagends as $tagend) {
			$total_price += $tagend->pivot->value;
		}
		if ($total_price < 0) {
			$total_price = 0;
		}

		return $total_price;
	}

	public function total_price_products()
	{
		$factor_product = $this->products()->get();
		$total_price = 0;
		foreach ($factor_product as $item) {
			if ($item->pivot->discount_price) {
				$total_price += $item->pivot->count * $item->pivot->discount_price;
			} else {
				$total_price += $item->pivot->count * $item->pivot->price;
			}
		}

		return $total_price;
	}

	public function detachShippings()
	{
		$tagends = Tagend::shipping()
			->get();

		foreach ($tagends as $tagend) {
			$this->tagends()->detach([$tagend->id]);
		}

		return $this;
	}

	public function addTagendToFactor($tagend): void
	{
		if ($tagend->type === 0) { // absolute
			if ($tagend->sign === 1) {
				$value = $tagend->value;
			} else {
				$value = (-1) * $tagend->value;
			}
		} else { // percent
			if ($tagend->sign === 1) {
				$value = $tagend->value * $this->total_price / 100;
			} else {
				$value = ((-1) * $tagend->value * $this->total_price) / 100;
			}
		}
		$this->tagends()->syncWithoutDetaching([
			$tagend->id => [
				'value' => $value,
			],
		]);
	}
}
