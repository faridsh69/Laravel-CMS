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
    public string $modelName = '';

    // gym-program
    public string $modelNameSlug = '';

    // App\Models\GymProgram
    public string $modelNamespace = 'App\Models\Model';

    // Columns of this model
    public array $modelColumns = [];

    // Gym Program
    public string $modelNameTranslate = '';

    // App\Forms\GymProgramForm
    public string $modelForm = '';

    // A new instance of this model
    public $modelRepository;

    public $httpRequest;

    public $laravelFormBuilder;

    public $authUser;

    public $notFoundMessage;

    public $response = [
        'status' => 200,
        'message' => '',
        'data' => '',
    ];

    public function __construct(Request $httpRequest, FormBuilder $laravelFormBuilder)
    {
        $this->httpRequest = $httpRequest;
        if (!$this->modelNameSlug)
            $this->modelNameSlug = $this->httpRequest->segment(2) ? $this->httpRequest->segment(2) : 'user';
        $this->modelName = Str::studly($this->modelNameSlug);
        $this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;
        $this->modelRepository = new $this->modelNamespace();
        $this->modelColumns = $this->modelRepository->getColumns();
        $this->modelNameTranslate = __(Str::snake($this->modelName));
        $this->modelForm = 'App\Forms\\' . $this->modelName . 'Form';
        if (! file_exists(__DIR__ . '/../../app/Forms/' . $this->modelName . 'Form.php'))
            $this->modelForm = 'App\Forms\Form';
        $this->laravelFormBuilder = $laravelFormBuilder;
        if(Route::has('admin.' . $this->modelNameSlug . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->modelNameSlug . '.list.index');
            $this->meta['link_name'] = $this->modelNameTranslate . __('manager');
        }
        $this->authUser = Auth::user();
        $this->notFoundMessage =$this->modelNameTranslate. ' '. __('not_found');
    }
}
