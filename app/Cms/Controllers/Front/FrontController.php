<?php

declare(strict_types=1);

namespace App\Cms\Controllers\Front;

use App\Cms\Traits\CmsMainTrait;
use App\Http\Controllers\Controller;
use App\Models\{Category, Tag};
use Auth;
use Cache;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;
use App\Models\Like;

abstract class FrontController extends Controller
{
	use CmsMainTrait;

	public array $meta = [
		'keywords' => '',
	];

	public function __construct(Request $httpRequest)
	{
		$this->httpRequest = $httpRequest;
		if (!$this->modelNameSlug) {
			$this->modelNameSlug = $this->httpRequest->segment(1) ?: 'user';
		}
		$this->modelName = Str::studly($this->modelNameSlug);
		$this->modelNameTranslate = __(Str::snake($this->modelName));
		$this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;
		$this->modelRepository = new $this->modelNamespace();
		$this->meta = [
			'title' => config('setting-general.default_meta_title') . ' | ' . $this->modelNameTranslate,
			'description' => __('List of all ' . $this->modelNameTranslate . ' in this site is ready for you that is paginated and you can search between them.'),
			'keywords' => '',
			'image' => config('setting-general.default_meta_image'),
			'google_index' => config('setting-general.google_index'),
			'canonical_url' => url()->current(),
		];
	}

	public function index(): View
	{
		$list = $this->modelRepository->active()
			->orderBy('updated_at', 'desc')
			->paginate(config('setting-general.pagination_number'));

		$CategoryAndTags = $this->getCategoryAndTags();

		return view('front.list.index', [
			'meta' => $this->meta,
			'list' => $list,
			'categories' => $CategoryAndTags['categories'],
			'tags' => $CategoryAndTags['tags'],
		]);
	}

	public function show(string $url): View
	{
		$item = $this->modelRepository->where('url', $url)->firstOrFail();

		$this->meta['title'] = $this->modelNameTranslate . ' | ' . $item->title;
		$this->meta['description'] = $item->description;
		$this->meta['google_index'] = $item->google_index;
		$this->meta['image'] = $item->image;
		if ($item->canonical_url) {
			$this->meta['canonical_url'] = $item->canonical_url;
		}

		return view('front.list.show', [
			'item' => $item,
			'meta' => $this->meta,
		]);
	}

	public function getCategory($url)
	{
		$category = Category::where('url', $url)->firstOrFail();

		$this->meta['title'] = $this->modelNameTranslate . ' | Category | ' . $category->title;
		$this->meta['description'] = $category->description;

		$list = $category->modelsWithThisType()->active()
			->orderBy('updated_at', 'desc')
			->paginate(config('setting-general.pagination_number'));

		return view('front.list.index', [
			'meta' => $this->meta,
			'list' => $list,
			'category' => $category,
		]);
	}

	public function getCategories()
	{
		$categories = Category::ofType($this->modelName)->active()
			->orderBy('updated_at', 'desc')
			->get();

		$list = $this->modelRepository->active()
			->orderBy('updated_at', 'desc')
			->paginate(config('setting-general.pagination_number'));

		$this->meta['title'] = $this->modelNameTranslate . ' | Category';
		$this->meta['canonical_url'] = route('front.' . $this->modelNameSlug . '.index');

		return view('front.list.index', [
			'meta' => $this->meta,
			'list' => $list,
			'categories' => $categories,
		]);
	}

	public function getTag($url)
	{
		$tag = Tag::where('url', $url)->firstOrFail();

		$this->meta['title'] = $this->modelNameTranslate . ' | Tag | ' . $tag->title;
		$this->meta['description'] = $tag->description;
		$list = $tag->modelsWithThisType()->active()
			->orderBy('updated_at', 'desc')
			->paginate(config('setting-general.pagination_number'));

		return view('front.list.index', [
			'meta' => $this->meta,
			'list' => $list,
			'tag' => $tag,
		]);
	}

	public function getTags()
	{
		$tags = Tag::ofType($this->modelName)->active()
			->orderBy('updated_at', 'desc')
			->get();

		$list = $this->modelRepository->active()
			->orderBy('updated_at', 'desc')
			->paginate(config('setting-general.pagination_number'));

		$this->meta['title'] = $this->modelNameTranslate . ' | Tag';
		$this->meta['canonical_url'] = route('front.' . $this->modelNameSlug . '.index');

		return view('front.list.index', [
			'meta' => $this->meta,
			'list' => $list,
			'tags' => $tags,
		]);
	}

	public function comment(string $url, \App\Models\Comment $commentModel)
	{
		$item = $this->modelRepository->where('url', $url)->firstOrFail();

		$commentModel->user_id = Auth::id();
		$commentModel->commentable_type = $this->modelNamespace;
		$commentModel->commentable_id = $item->id;
		$commentModel->activated = 1; // This line should change and get config
		$commentModel->content = $this->httpRequest->input('comment');

		$commentModel->save();

		$this->httpRequest->session()->flash('alert-success', __('commented_successfully'));

		return redirect()->route('front.' . $this->modelNameSlug . '.show', $item->url);
	}

	public function likeCount(string $url)
	{
		$item = $this->modelRepository->where('url', $url)->firstOrFail();

		$this->response['userLiked'] = $item->likes()->authUser()->first() ? 1 : 0;
		$this->response['likesCount'] = $item->likes()->count();

		return response()->json($this->response);
	}

	public function like(string $url, Like $likeModel)
	{
		$item = $this->modelRepository->where('url', $url)->firstOrFail();

		if ($item->likes()->authUser()->first()) {
			$item->likes()->authUser()->delete();
		} else {
			$likeModel->user_id = Auth::id();
			$likeModel->likeable_type = $this->modelNamespace;
			$likeModel->likeable_id = $item->id;

			$likeModel->save();
		}

		return response()->json();
	}

	private function getCategoryAndTags(): array
	{
		$categories = Cache::remember('category.' . $this->modelNameSlug, config('cms.config.cache_time'), function () {
			return Category::ofType($this->modelName)->active()
				->orderBy('updated_at', 'desc')
				->get();
		});

		$tags = Cache::remember('tag.' . $this->modelNameSlug, config('cms.config.cache_time'), function () {
			return Tag::ofType($this->modelName)->active()
				->orderBy('updated_at', 'desc')
				->get();
		});

		return [
			'categories' => $categories,
			'tags' => $tags,
		];
	}
}
