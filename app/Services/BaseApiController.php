<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Route;
use App\Models\Activity;
use View;
use Str;

class BaseApiController extends Controller
{
    // FoodProgram
    public $model_name;

    // food-program
    public $model_slug;

    // Food Program
    public $model_translated;

    // '\App\Forms\FoodProgramForm'
    public $model_form;

    // App\Models\FoodProgram
    public $model_namespace;

    // Columns of this model
    public $model_columns;

    // A new instance of this model
    public $model_repository;

    public $request;

    public $form_builder;

    public $model_rules;

    public $message_not_found;

    public $response = [
        'status' => 200, // 200, 404,
        'message' => '',
        'data' => '',
    ];
    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->form_builder = $form_builder;
        $this->request = $request;
        if(!$this->model_slug){
            $this->model_slug = $this->request->segment(2);
        }
        $this->model_name = Str::studly($this->model_slug);
        $this->model_translated = __(Str::snake($this->model_name));
        $this->model_namespace = config('cms.config.models_namespace'). $this->model_name;
        $this->model_repository = new $this->model_namespace;
        $this->model_columns = $this->model_repository->getColumns();
        $this->model_rules = collect($this->model_columns)->pluck('rule', 'name')->toArray();
        $this->model_form = 'App\Forms\\'. $this->model_name. 'Form';
        if(!file_exists(__DIR__. '/../../'. $this->model_form. '.php')){
            $this->model_form = 'App\Forms\Form';
        }
        $this->message_not_found = __('not_found');
    }

    public function index()
    {
        $this->authorize('index', $this->model_namespace);
        $list = $this->model_repository->orderBy('updated_at', 'desc')->get(); // orderBy

        $this->response['message'] = __('list_successfully');
        $this->response['data'] = $list;

        return response()->json($this->response);
    }

    public function create()
    {
        abort(404);
    }

    public function store()
    {
        $this->authorize('create', $this->model_namespace);
        $main_data = $this->request->all();
        $validator = \Validator::make($main_data, $this->model_rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $model_store = $this->model_repository->create($main_data);

        if(env('APP_ENV') !== 'testing'){
            activity($this->model_name)
                ->performedOn($model_store)
                ->causedBy(Auth::user())
                ->log($this->model_name. ' Created');
        }

        $this->response['message'] = $this->model_translated. __('created_successfully');
        $this->response['data'] = $model_store;

        return response()->json($this->response);
    }

    public function show($id)
    {
        $model_view = $this->model_repository->where('id', $id)->first();
        if(! $model_view){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        $this->authorize('view', $model_view);

        $main_data = $model_view->getAttributes();

        $this->response['message'] = __('show_successfully');
        $this->response['data'] = $main_data;

        return response()->json($this->response);
    }

    public function edit($id)
    {
        $model_edit = $this->model_repository
            ->where('id', $id)
            ->first();

        if(! $model_edit){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        $this->authorize('update', $model_edit);

        $main_data = $model_edit->getAttributes();

        $this->response['message'] = $this->message_show;
        $this->response['data'] = $main_data;

        return response()->json($this->response);
    }

    public function update($id)
    {
        $model_update = $this->model_repository->where('id', $id)->first();
        if(! $model_update){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        $this->authorize('update', $model_update);

        $main_data = $this->request->all();
        $validator = \Validator::make($main_data, $this->model_rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $model_update->update($main_data);

        if(env('APP_ENV') !== 'testing'){
            activity($this->model_name)
                ->performedOn($model_update)
                ->causedBy(Auth::user())
                ->log($this->model_name. ' Updated');
        }

        $this->response['message'] = $this->model_translated. __('updated_successfully');
        $this->response['data'] = $model_update;

        return response()->json($this->response);
    }

    public function destroy($id)
    {
        $model_delete = $this->model_repository->where('id', $id)->first();
        if(! $model_delete){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        $this->authorize('delete', $model_delete);

        $model_delete->delete();

        if(env('APP_ENV') !== 'testing'){
            activity($this->model_name)
                ->performedOn($model_delete)
                ->causedBy(Auth::user())
                ->log($this->model_name. ' Deleted');
        }

        $this->response['message'] = $this->model_translated. __('deleted_successfully');
        $this->response['data'] = $model_delete;

        return response()->json($this->response);
    }
}
