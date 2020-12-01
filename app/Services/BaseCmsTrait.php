<?php

namespace App\Services;

use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Route;
use Str;

trait BaseCmsTrait
{
    // GymProgram
    public $modelName;

    // gym-program
    public $modelNameSlug;

    // App\Models\GymProgram
    public $modelNamespace;

    // Columns of this model
    public $modelColumns;

    // Gym Program
    public $modelNameTranslate;

    // App\Forms\GymProgramForm
    public $modelForm;

    // A new instance of this model
    public $modelRepository;

    public $request;

    public $formBuilder;

    public $authUser;

    public $notFoundMessage;

    public $response = [
        'status' => 200,
        'message' => '',
        'data' => '',
    ];

    public function __construct(Request $request, FormBuilder $formBuilder)
    {
        $this->request = $request;
        $this->modelNameSlug = $this->request->segment(2);
        $this->modelName = Str::studly($this->modelNameSlug);
        $this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;
        $this->modelRepository = new $this->modelNamespace();
        $this->modelColumns = $this->modelRepository->getColumns();
        $this->modelNameTranslated = __(Str::snake($this->modelName));
        $this->modelForm = 'App\Forms\\' . $this->modelName . 'Form';
        if (! file_exists(__DIR__ . '/../../app/Forms/' . $this->modelName . 'Form.php'))
            $this->modelForm = 'App\Forms\Form';
        $this->formBuilder = $formBuilder;
        if(Route::has('admin.' . $this->modelNameSlug . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->modelNameSlug . '.list.index');
            $this->meta['link_name'] = $this->modelNameTranslated . __('manager');
        }
        $this->authUser = Auth::user();
    }
}
