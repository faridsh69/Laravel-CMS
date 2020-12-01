<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Str;

class BaseApiController extends Controller
{
    use BaseCmsTrait;

    public function index()
    {
        $this->authorize('index', $this->modelNamespace);
        $list = $this->modelRepository->orderBy('updated_at', 'desc')->get(); // orderBy

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
        $this->authorize('create', $this->modelNamespace);
        $main_data = $this->request->all();
        $validator = \Validator::make($main_data, $this->model_rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $model_store = $this->modelRepository->create($main_data);

        if(env('APP_ENV') !== 'testing'){
            activity($this->modelName)
                ->performedOn($model_store)
                ->causedBy(Auth::user())
                ->log($this->modelName . ' Created');
        }

        $this->response['message'] = $this->modelNameTranslate . __('created_successfully');
        $this->response['data'] = $model_store;

        return response()->json($this->response);
    }

    public function show($id)
    {
        $model_view = $this->modelRepository->where('id', $id)->first();
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
        $model_edit = $this->modelRepository
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
        $model_update = $this->modelRepository->where('id', $id)->first();
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
            activity($this->modelName)
                ->performedOn($model_update)
                ->causedBy(Auth::user())
                ->log($this->modelName . ' Updated');
        }

        $this->response['message'] = $this->modelNameTranslate . __('updated_successfully');
        $this->response['data'] = $model_update;

        return response()->json($this->response);
    }

    public function destroy($id)
    {
        $model_delete = $this->modelRepository->where('id', $id)->first();
        if(! $model_delete){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        $this->authorize('delete', $model_delete);

        $model_delete->delete();

        if(env('APP_ENV') !== 'testing'){
            activity($this->modelName)
                ->performedOn($model_delete)
                ->causedBy(Auth::user())
                ->log($this->modelName . ' Deleted');
        }

        $this->response['message'] = $this->modelNameTranslate . __('deleted_successfully');
        $this->response['data'] = $model_delete;

        return response()->json($this->response);
    }
}
