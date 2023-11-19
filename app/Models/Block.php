<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Block extends CmsModel
{
	public $columns = [
		[
			'name' => 'type',
			'type' => 'string',
			'database' => '',
			'rule' => 'required',
			'help' => '',
			'form_type' => 'enum',
			'form_enum_class' => 'BlockType',
			'table' => true,
		],
		[
			'name' => 'title',
		],
		[
			'name' => 'order',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'show_all_pages',
			'type' => 'boolean',
			'database' => 'default',
			'rule' => 'boolean',
			'help' => 'If this ckecked this block will show in all pages except below pages list',
			'form_type' => 'checkbox-m',
			'table' => false,
		],
		[
			'name' => 'pages',
			'type' => 'array',
			'database' => 'none',
			'rule' => 'nullable',
			'help' => '',
			'form_type' => 'entity',
			'class' => 'App\Models\Page',
			'property' => 'title',
			'property_key' => 'id',
			'multiple' => true,
			'table' => true,
		],
	];

	public function pages()
	{
		return $this->belongsToMany(Page::class, 'block_page', 'block_id', 'page_id');
	}

	public static function getPageBlocks($page_id)
	{
		$blocks = self::active()
			->with('pages')
			->orderBy('order', 'asc')
			->get();

		$output_blocks = [];
		foreach ($blocks as $block) {
			$block_pages = $block->pages;
			if ($block_pages === null) {
				continue;
			}
			if ($block->show_all_pages && array_search($page_id, $block_pages->pluck('id')->toArray(), true) === false) {
				$output_blocks[] = $block;
			}

			if (!$block->show_all_pages && array_search($page_id, $block_pages->pluck('id')->toArray(), true) !== false) {
				$output_blocks[] = $block;
			}
		}

		return $output_blocks;
	}
}
