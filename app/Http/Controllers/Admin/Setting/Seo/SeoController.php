<?php

namespace App\Http\Controllers\Admin\Setting\Seo;

use App\Models\Blog;
use App\Services\BaseAdminController;

class SeoController extends BaseAdminController
{
	public function __construct()
    {
    	$this->authorize('manage', 'seo');
    }

	public function redirectToCrowl()
	{
		return redirect()->route('admin.setting.seo.crowl');
	}

	public function crowl()
	{
		
		$this->meta['title'] = __('seo crowl site');

		return view('admin.page.setting.seo.crowl', ['meta' => $this->meta]);
	}

	public function contentRules()
	{
		$this->meta['title'] = __('seo content rules');

		return view('admin.page.setting.seo.content-rules', ['meta' => $this->meta]);
	}

	public function crowlRun()
	{
		$this->meta['title'] = 'Seo Crwol Website';

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

		foreach($blogs as $blog)
		{
			if(strlen($blog->title) < $seo_title_min){
				$title_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' title length is ' . strlen($blog->title),
				];
			}
			if(strlen($blog->title) > $seo_title_max){
				$title_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' title length is ' . strlen($blog->title),
				];
			}
			if(false){
				$title_unique[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' title duplicated with ' . 13,
				];
			}
			if(strlen($blog->url) > $seo_url_max){
				$url_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' url length is ' . strlen($blog->url),
				];
			}
			if(false){
				$url_unique[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' url duplicated with ' . 13,
				];
			}
			if(preg_match($seo_url_regex, $blog->url) === false){
				$url_format[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' url format is invalid',
				];
			}
			if(strlen($blog->description) < 20){
				$description_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' description length is ' . strlen($blog->description),
				];
			}
			if(strlen($blog->description) > 170){
				$description_range[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' description length is ' . strlen($blog->description),
				];
			}
			if(false){
				$content_unique[] = [
					'id' => $blog->id,
					'description' => 'blog ' . $blog->id . ' content duplicated with ' . 13,
				];
			}
			if(strpos($blog->content, '<h1') === false){
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
