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
use View;
use App\Models\Activity;

class BaseFrontController extends Controller
{
    // ModelName
    public $model;

    // modelname
    public $model_sm;

    // Model name
    public $model_trans;

    // App\Models\ModelName
    public $model_class;

    // an array of columns
    public $model_columns;

    // an instance of this model
    public $repository;

    // an instance of Illuminate\Http\Request
    public $request;

    // meta title, description and other used in header
    public $meta;

    public function __construct(Request $request)
    {
        $this->model_sm = strtolower($this->model);
        $this->model_trans = __($this->model_sm);
        $this->model_class = 'App\\Models\\' . $this->model;
        $this->repository = new $this->model_class();
        $this->request = $request;
        $this->model_columns = $this->repository->getColumns();
        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $this->model_trans,
            'description' => __('List of all '.$this->model_trans.' in this site is ready for you that is paginated and you can search between them.'),
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
        $list = $this->repository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $categories = Category::ofType($this->model_sm)->active()->language()
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
        $item = $this->repository->where('url', $url)->firstOrFail();

        foreach($this->model_columns as $column){
            if($column['form_type'] === 'file' && $column['file_manager'] === false){
                $item[$column['name']] = $item->files_src($column['name']);
            }
        }

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)->performedOn($item)->causedBy(Auth::user())
                ->log($this->model . ' View');
        }

        $this->meta['title'] = $this->model_trans. ' | '. $item->title;
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

        $this->meta['title'] = $this->model_trans. ' | Category | '. $category->title;
        $this->meta['description'] = $category->description;

        $list = $category->models()->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        if($list->count() == 0){
            return redirect()->route('front.'. $this->model_sm. '.index');
        }

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'category' => $category]);
    }

    public function getCategories () 
    {
        $categories = Category::ofType($this->model_sm)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        $list = $this->repository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta['title'] = $this->model_trans. ' | Category';
        $this->meta['canonical_url'] = route('front.'. $this->model_sm. '.index');

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'categories' => $categories]);
    }

    public function getTag($url)
    {
        $tag = Tag::where('url', $url)->firstOrFail();

        if(env('APP_ENV') !== 'testing'){
            activity('Tag')->performedOn($tag)->causedBy(Auth::user())
                ->log('Tag View');
        }

        $this->meta['title'] = $this->model_trans. ' | Tag | '. $tag->title;
        $this->meta['description'] = $tag->description;

        $list = $tag->models()->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        if($list->count() == 0){
            return redirect()->route('front.'. $this->model_sm. '.index');
        }

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'tag' => $tag]);
    }

    public function getTags () 
    {
        $tags = Tag::ofType($this->model_sm)->active()->language()
            ->orderBy('updated_at', 'desc')
            ->get();

        $list = $this->repository->active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta['title'] = $this->model_trans. ' | Tag';
        $this->meta['canonical_url'] = route('front.'. $this->model_sm. '.index');

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list, 'tags' => $tags]);
    }
}
