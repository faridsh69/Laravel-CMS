<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use Route;
use View;
use Spatie\Activitylog\Models\Activity;

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

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $model = $this->repository->language()->where('url', $url)->first();
        $data = $model;

        foreach($this->model_columns as $column){
            if($column['form_type'] === 'file' && $column['file_manager'] === false){
                $data[$column['name']] = $data->files_src($column['name']);
            }
        }

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' View');
        }

        $this->meta['title'] = config('setting-general.default_meta_title'). ' | '. $this->model_trans. ' | '. $data->title;
        $this->meta['description'] = $data->description;
        $this->meta['google_index'] = $data->google_index;
        $this->meta['image'] = $data->image;

        return view('front.list.show', ['data' => $data, 'meta' => $this->meta]);
    }

    public function getCategories () 
    {
        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . __('blog categories'),
            'description' => __('blog categories description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        // $list = Category::ofType('blog')->active()->language()
        $list = Category::active()->language()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        return view('front.list.index', ['meta' => $this->meta, 'list' => $list]);
    }
}
