<?php

namespace App\Http\Controllers\Admin\Setting\Seo;

use App\Base\BaseAdminController;
use App\Models\Blog;

class SeoController extends BaseAdminController
{
	public function getCrowl()
	{
		$this->authorize('index_settingdeveloper');
		$this->meta['title'] = 'Seo Crwol Website';

		return view('admin.setting.seo.crowl', ['meta' => $this->meta]);
	}

	public function getContentRules()
	{
		$this->authorize('index_settingdeveloper');
		$this->meta['title'] = 'Seo Content Rules';

		return view('admin.setting.seo.content-rules', ['meta' => $this->meta]);
	}

	public function getCrowlRun()
	{
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

		$this->authorize('index_settingdeveloper');
		$this->meta['title'] = 'Seo Crwol Website';

		return view('admin.setting.seo.crowl', [
			'meta' => $this->meta,
			'faults' => $faults,
		]);
	}
}
