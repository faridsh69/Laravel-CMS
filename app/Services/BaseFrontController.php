<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Route;
use Str;
use View;
use Cache;

class BaseFrontController extends Controller
{
    // FoodProgram
    public $modelName;

    // food-program
    public $modelNameSlug;

    // Food Program
    public $modelNameTranslate;

    // App\Models\FoodProgram
    public $modelNamespace;

    // A new instance of this model
    public $modelRepository;

    public $request;

    // meta title, description and other used in header
    public $meta;

    public function __construct(Request $request)
    {
        $this->request = $request;
        if(! $this->modelSlug){
            $this->modelSlug = $this->request->segment(1) ?: 'user';
        }
        $this->modelName = Str::studly($this->modelSlug);
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->modelRepository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $CategoryAndTags = $this->getCategoryAndTags();
        return view('front.list.index', [
            'meta' => $this->meta, 
            'list' => $list, 
            'categories' => $CategoryAndTags['categories'], 
            'tags' => $CategoryAndTags['tags']
        ]);
    }

    private function getCategoryAndTags()
    {
        $categories = Cache::remember('category.'. $this->modelSlug, 10, function () {
            return Category::ofType($this->modelName)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();
        });

        $tags = Cache::remember('tag.'. $this->modelSlug, 10, function () {
            return Tag::ofType($this->modelName)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();
        });

        return [
            'categories' => $categories,
            'tags' => $tags,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $item = $this->modelRepository->where('url', $url)->firstOrFail();

        if(env('APP_ENV') !== 'testing'){
            activity($this->modelName)->performedOn($item)->causedBy(Auth::user())
                ->log($this->modelName . ' View');
        }

        $this->meta['title'] = $this->modelNameTranslate . ' | ' . $item->title;
        $this->meta['description'] = $item->description;
        $this->meta['google_index'] = $item->google_index;
        $this->meta['image'] = $item->image;
        if($item->canonical_url){ $this->meta['canonical_url'] = $item->canonical_url; }

        return view('front.list.show', ['item' => $item, 'meta' => $this->meta]);
    }

    public function getCategory($url)
    {
        $category = Category::where('url', $url)->firstOrFail();

        if(env('APP_ENV') !== 'testing'){
            activity('Category')->performedOn($category)->causedBy(Auth::user())
                ->log('Category View');
        }
        $this->meta['title'] = $this->modelNameTranslate . ' | Category | ' . $category->title;
        $this->meta['description'] = $category->description;

        $list = $category->models()->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        return view('front.list.index', [
            'meta' => $this->meta, 
            'list' => $list, 
            'category' => $category, 
        ]);
    }

    public function getCategories ()
    {
        $categories = Category::ofType($this->modelName)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        $list = $this->modelRepository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta['title'] = $this->modelNameTranslate . ' | Category';
        $this->meta['canonical_url'] = route('front.' . $this->modelSlug . '.index');

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'categories' => $categories]);
    }

    public function getTag($url)
    {
        $tag = Tag::where('url', $url)->firstOrFail();
        if(env('APP_ENV') !== 'testing'){
            activity('Tag')->performedOn($tag)->causedBy(Auth::user())
                ->log('Tag View');
        }

        $this->meta['title'] = $this->modelNameTranslate . ' | Tag | ' . $tag->title;
        $this->meta['description'] = $tag->description;

        $list = $tag->models()->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'tag' => $tag]);
    }

    public function getTags ()
    {
        $tags = Tag::ofType($this->modelName)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        $list = $this->modelRepository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta['title'] = $this->modelNameTranslate . ' | Tag';
        $this->meta['canonical_url'] = route('front.' . $this->modelSlug . '.index');

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'tags' => $tags]);
    }
}
