<?php

namespace App\Services;

// use App\Http\Controllers\Controller;
// use App\Models\Activity;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Route;
use Str;

trait BaseCmsTrait
{
    // FoodProgram
    public $modelName;

    // food-program
    public $modelNameSlug;

    // Food Program
    public $modelNameTranslate;

    // '\App\Forms\FoodProgramForm'
    public $modelForm;

    // App\Models\FoodProgram
    public $modelNamespace;

    // Columns of this model
    public $modelColumns;

    // A new instance of this model
    public $modelRepository;

    public $request;

    public $formBuilder;

    public $authUser;

    public $notFoundMessage;

    public $response = [
        'status' => 200, // 200, 404,
        'message' => '',
        'data' => '',
    ];

    public function __construct(Request $request, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->request = $request;
        if (! $this->modelSlug)
            $this->modelSlug = $this->request->segment(2) ?: 'user';

        $this->modelName = Str::studly($this->modelSlug);
        $this->modelNameTranslated = __(Str::snake($this->modelName));
        $this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;
        $this->modelRepository = new $this->modelNamespace();
        $this->modelColumns = $this->modelRepository->getColumns();
        $this->modelForm = 'App\Forms\\' . $this->modelName . 'Form';
        if(! file_exists(__DIR__ . '/../../app/Forms/' . $this->modelName . 'Form.php')){
            $this->modelForm = 'App\Forms\Form';
        }
        if(Route::has('admin.' . $this->modelSlug . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->modelSlug . '.list.index');
            $this->meta['link_name'] = $this->modelNameTranslated . __('manager');
        }
        $this->authUser = Auth::user();
    }



    // public function __construct(Request $request, FormBuilder $formBuilder)
    // {
    //     $this->formBuilder = $formBuilder;
    //     $this->request = $request;
    //     if(! $this->modelSlug){
    //         $this->modelSlug = $this->request->segment(2) ?: 'user';
    //     }
    //     $this->modelName = Str::studly($this->modelSlug);
    //     $this->modelNameTranslated = __(Str::snake($this->modelName));
    //     $this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;
    //     $this->modelRepository = new $this->modelNamespace();
    //     $this->modelColumns = $this->modelRepository->getColumns();
    //     $this->model_rules = collect($this->modelColumns)->pluck('rule', 'name')->toArray();
    //     $this->modelForm = 'App\Forms\\' . $this->modelName . 'Form';
    //     if(! file_exists(__DIR__ . '/../../' . $this->modelForm . '.php')){
    //         $this->modelForm = 'App\Forms\Form';
    //     }
    //     $this->message_not_found = __('not_found');
    // }


}