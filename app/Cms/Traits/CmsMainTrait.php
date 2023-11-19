<?php

declare(strict_types=1);

namespace App\Cms\Traits;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Route;
use Str;

trait CmsMainTrait
{
	// This is for recognising model name like: GymProgram
	public string $modelName = '';

	// for using model names in route or in config files: gym-program
	public string $modelNameSlug = '';

	// App\Models\GymProgram
	public string $modelNamespace = 'App\Models\User';

	// Key idea in this cms is Columns:
	public array $modelColumns = [];

	// Translation used for this model name: Gym Program
	public string $modelNameTranslate = '';

	// App\Forms\GymProgramForm
	public string $modelForm = '';

	// A new instance of this model
	public $modelRepository;

	public Request $httpRequest;

	public FormBuilder $laravelFormBuilder;

	public $response = [];

	public function __construct(Request $httpRequest, FormBuilder $laravelFormBuilder)
	{
		$this->httpRequest = $httpRequest;
		if (!$this->modelNameSlug) {
			$this->modelNameSlug = $this->httpRequest->segment(2) ?? 'User';
		}
		$this->modelName = Str::studly($this->modelNameSlug);
		$this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;
		$this->modelRepository = app($this->modelNamespace);
		$this->modelColumns = $this->modelRepository->getColumns();
		$this->modelNameTranslate = __(Str::snake($this->modelName));
		// Check to get form class
		$this->modelForm = 'App\Forms\\' . $this->modelName . 'Form';
		if (!file_exists(__DIR__ . '/../../../app/Forms/' . $this->modelName . 'Form.php')) {
			$this->modelForm = 'App\Forms\Form';
		}
		$this->laravelFormBuilder = $laravelFormBuilder;
		if (Route::has('admin.' . $this->modelNameSlug . '.list.index')) {
			$this->meta['link_route'] = route('admin.' . $this->modelNameSlug . '.list.index');
			$this->meta['link_name'] = $this->modelNameTranslate . __('manager');
		}
	}
}
