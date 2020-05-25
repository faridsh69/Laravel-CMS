<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use Route;
use Str;
use View;
use App\Models\Activity;

class BaseFrontController extends Controller
{
    // FoodProgram
    public $model_name;

    // food-program
    public $model_slug;

    // Food Program
    public $model_translated;

    // App\Models\FoodProgram
    public $model_namespace;

    // Columns of this model
    public $model_columns;

    // A new instance of this model
    public $model_repository;

    public $request;

    // meta title, description and other used in header
    public $meta;

    public function __construct(Request $request)
    {
        $this->request = $request;
        if(!$this->model_slug){
            $this->model_slug = $this->request->segment(1);
        }
        $this->model_name = Str::studly($this->model_slug);
        $this->model_translatedlated = __(Str::snake($this->model_name));
        $this->model_namespace = config('cms.config.models_namespace'). $this->model_name;
        $this->model_repository = new $this->model_namespace;
        $this->model_columns = $this->model_repository->getColumns();
        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $this->model_translated,
            'description' => __('List of all '.$this->model_translated.' in this site is ready for you that is paginated and you can search between them.'),
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
        $list = $this->model_repository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $categories = Category::ofType($this->model_slug)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $item = $this->model_repository->where('url', $url)->firstOrFail();

        if(env('APP_ENV') !== 'testing'){
            activity($this->model_name)->performedOn($item)->causedBy(Auth::user())
                ->log($this->model_name . ' View');
        }

        $this->meta['title'] = $this->model_translated. ' | '. $item->title;
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
        $this->meta['title'] = $this->model_translated. ' | Category | '. $category->title;
        $this->meta['description'] = $category->description;

        $list = $category->models()->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        if($list->count() == 0){
            return redirect()->route('front.'. $this->model_slug. '.index');
        }

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'category' => $category]);
    }

    public function getCategories () 
    {
        $categories = Category::ofType($this->model_slug)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        $list = $this->model_repository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta['title'] = $this->model_translated. ' | Category';
        $this->meta['canonical_url'] = route('front.'. $this->model_slug. '.index');

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'categories' => $categories]);
    }

    public function getTag($url)
    {
        $tag = Tag::where('url', $url)->firstOrFail();

        if(env('APP_ENV') !== 'testing'){
            activity('Tag')->performedOn($tag)->causedBy(Auth::user())
                ->log('Tag View');
        }

        $this->meta['title'] = $this->model_translated. ' | Tag | '. $tag->title;
        $this->meta['description'] = $tag->description;

        $list = $tag->models()->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        if($list->count() == 0){
            return redirect()->route('front.'. $this->model_slug. '.index');
        }

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'tag' => $tag]);
    }

    public function getTags () 
    {
        $tags = Tag::ofType($this->model_slug)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        $list = $this->model_repository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta['title'] = $this->model_translated. ' | Tag';
        $this->meta['canonical_url'] = route('front.'. $this->model_slug. '.index');

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'tags' => $tags]);
    }
}
