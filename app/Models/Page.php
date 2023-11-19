<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Page extends CmsModel
{
	public $columns = [
		[
			'name' => 'title',
		],
		[
			'name' => 'url',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'unique:pages,url,',
			'help' => 'Url should be unique, contain [a-z, 0-9, -], required for seo',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'description',
		],
		[
			'name' => 'content',
		],
		[
			'name' => 'keywords',
		],
		[
			'name' => 'image',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'google_index',
		],
		[
			'name' => 'canonical_url',
		],
		[
			'name' => 'view_code_url',
			'type' => 'text',
			'database' => 'nullable',
			'rule' => 'nullable',
			'help' => 'It will used for rendering blade file. for example for products page you can add blade and use it. "front.components.products" ',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'tags',
		],
		[
			'name' => 'relateds',
		],
		[
			'name' => 'language',
		],
	];

	public function blocks()
	{
		return $this->hasMany(Block::class, 'page_id', 'id');
	}

	public function related_pages()
	{
		return $this->belongsToMany(self::class, 'related_pages', 'page_id', 'related_page_id');
	}
}
