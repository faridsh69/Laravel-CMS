<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Setting\Seo;

use App\Cms\Controllers\Admin\AdminController;
use App\Models\Blog;

final class SeoController extends AdminController
{
	public string $modelNameSlug = 'setting-general';

	public function redirectToCrowl()
	{
		return redirect()->route('admin.setting.seo.crowl');
	}

	public function crowl()
	{
		$this->authorize('manage', 'seo');
		$this->meta['title'] = __('seo_crowl_site');

		return view('admin.page.setting.seo.crowl', [
			'meta' => $this->meta,
		]);
	}

	public function contentRules()
	{
		$this->authorize('manage', 'seo');
		$this->meta['title'] = __('seo_content_rules');

		return view('admin.page.setting.seo.content-rules', [
			'meta' => $this->meta,
		]);
	}

	public function crowlRun()
	{
		$this->authorize('manage', 'seo');
		$this->meta['title'] = __('seo_crwol_website');

		$blogs = Blog::get();
		$title_range = [];
		$title_unique = [];
		$url_range = [];
		$url_unique = [];
		$url_format = [];
		$description_range = [];
		$content_unique = [];
		$content_header = [];

		$seo_title_min = config('setting-developer.seo_title_min');
		$seo_title_max = config('setting-developer.seo_title_max');
		$seo_url_max = config('setting-developer.seo_url_max');
		$seo_url_regex = '/^[a-z0-9-]+$/';

		foreach ($blogs as $blog) {
			if (mb_strlen($blog->title) < $seo_title_min) {
				$title_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' title length is ' . mb_strlen($blog->title),
				];
			}
			if (mb_strlen($blog->title) > $seo_title_max) {
				$title_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' title length is ' . mb_strlen($blog->title),
				];
			}
			if (false) {
				$title_unique[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' title duplicated with ' . 13,
				];
			}
			if (mb_strlen($blog->url) > $seo_url_max) {
				$url_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' url length is ' . mb_strlen($blog->url),
				];
			}
			if (false) {
				$url_unique[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' url duplicated with ' . 13,
				];
			}
			if (preg_match($seo_url_regex, $blog->url) === false) {
				$url_format[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' url format is invalid',
				];
			}
			if (mb_strlen($blog->description) < 20) {
				$description_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' description length is ' . mb_strlen($blog->description),
				];
			}
			if (mb_strlen($blog->description) > 170) {
				$description_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' description length is ' . mb_strlen($blog->description),
				];
			}
			if (false) {
				$content_unique[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' content duplicated with ' . 13,
				];
			}
			if (mb_strpos($blog->content, '<h1') === false) {
				$content_header[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' content has not H1',
				];
			}
		}

		$faults = [
			'title range' => $title_range,
			'title unique' => $title_unique,
			'url range' => $url_range,
			'url unique' => $url_unique,
			'url format' => $url_format,
			'description range' => $description_range,
			'content unique' => $content_unique,
			'content header' => $content_header,
		];

		return view('admin.page.setting.seo.crowl', [
			'meta' => $this->meta,
			'faults' => $faults,
		]);
	}
}
