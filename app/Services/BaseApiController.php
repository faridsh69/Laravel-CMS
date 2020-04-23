<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Route;
use App\Models\Activity;
use View;

class BaseApiController extends Controller
{
    // Blog
    public $model;

    // blog
    public $model_sm;

    // \App\Forms\BlogForm
    public $model_form;

    // App\Models\Blog
    public $model_class;

    public $model_columns;

    public $model_rules;

    public $repository;

    public $request;

    public $form_builder;

    public $message_not_found;

    public $message_list;

    public $message_store;

    public $message_show;

    public $message_update;

    public $message_delete;

    public $message_restore;

    public $response = [
        'status' => 200, // 200, 404,
        'message' => '',
        'data' => '',
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->model_sm = lcfirst($this->model);
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $this->model_class = 'App\\Models\\' . $this->model;
        $this->repository = new $this->model_class();
        $this->model_columns = $this->repository->getColumns();
        $this->model_rules = $this->getRules($this->model_columns);
        $this->request = $request;
        $this->form_builder = $form_builder;
        $this->message_not_found = __($this->model_sm . '_not_found');
        $this->message_list = __($this->model_sm . '_list');
        $this->message_store = __($this->model_sm . '_store');
        $this->message_show = __($this->model_sm . '_show');
        $this->message_update = __($this->model_sm . '_update');
        $this->message_delete = __($this->model_sm . '_delete');
        $this->message_restore = __($this->model_sm . '_restore');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('index', $this->model_class);

        $list = $this->repository->orderBy('updated_at', 'desc')->get(); // orderBy

        $this->response['message'] = $this->message_list;
        $this->response['data'] = $list;

        return response()->json($this->response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // $this->authorize('create', $this->model_class);
        $main_data = $this->request->all();
        $validator = \Validator::make($main_data, $this->model_rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $model_store = $this->repository->create($main_data);

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)
                ->performedOn($model_store)
                ->causedBy(Auth::user())
                ->log($this->model . ' Created');
        }

        $this->response['message'] = $this->message_store;
        $this->response['data'] = $model_store;

        return response()->json($this->response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model_view = $this->repository->where('id', $id)->first();
        if(! $model_view){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        // $this->authorize('view', $model_view);

        $main_data = $model_view->getAttributes();

        $this->response['message'] = $this->message_show;
        $this->response['data'] = $main_data;

        return response()->json($this->response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model_edit = $this->repository
            ->where('id', $id)
            ->first();

        if(! $model_edit){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        // $this->authorize('update', $model_edit);

        $main_data = $model_edit->getAttributes();

        $this->response['message'] = $this->message_show;
        $this->response['data'] = $main_data;

        return response()->json($this->response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $model_update = $this->repository->where('id', $id)->first();
        if(! $model_update){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        // $this->authorize('update', $model_update);

        $main_data = $this->request->all();
        $validator = \Validator::make($main_data, $this->model_rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $model_update->update($main_data);

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)
                ->performedOn($model_update)
                ->causedBy(Auth::user())
                ->log($this->model . ' Updated');
        }

        $this->response['message'] = $this->message_update;
        $this->response['data'] = $model_update;

        return response()->json($this->response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model_delete = $this->repository->where('id', $id)->first();
        if(! $model_delete){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        // $this->authorize('delete', $model_delete);

        $model_delete->delete();

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)
                ->performedOn($model_delete)
                ->causedBy(Auth::user())
                ->log($this->model . ' Deleted');
        }

        $this->response['message'] = $this->message_delete;
        $this->response['data'] = $model_delete;

        return response()->json($this->response);
    }

    public function getRules($columns)
    {
        return collect($columns)->pluck('rule', 'name')->toArray();
    }
}
