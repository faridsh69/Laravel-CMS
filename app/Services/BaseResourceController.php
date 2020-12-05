<?php

namespace App\Services;

use Str;
use Illuminate\View\View;

class BaseResourceController extends BaseAdminController
{
    public function index() : View
    {
        $this->authorize('index', $this->modelNamespace);
        $this->meta['link_route'] = route('admin.' . $this->modelNameSlug . '.list.create');
        $this->meta['link_name'] = __('create_new') . $this->modelNameTranslate;
        $this->meta['title'] = $this->modelNameTranslate . __('manager');
        $this->meta['search'] = 1;
        $columns = [];
        foreach(collect($this->modelColumns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', Str::studly($column['name'])),
            ];
        }

        return view('admin.list.index', ['meta' => $this->meta, 'columns' => $columns]);
    }

    public function create() : View
    {
        $this->authorize('create', $this->modelNamespace);
        $this->meta['title'] = __('create_new') . $this->modelNameTranslate;
        $form = $this->laravelFormBuilder->create($this->modelForm, [
            'method' => 'POST',
            'url' => route('admin.' . $this->modelNameSlug . '.list.store'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'enctype' => 'multipart/form-data',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function store()
    {
        $this->authorize('create', $this->modelNamespace);
        $form = $this->laravelFormBuilder->create($this->modelForm);
        if (! $form->isValid()) {
            if(env('APP_ENV') === 'testing'){
                dd($form->getErrors(), $this->modelName, $form->getFieldValues());
            }
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $model = $this->modelRepository->saveWithRelations($form->getFieldValues());

        if(env('APP_ENV') !== 'testing'){
            activity('Created')->performedOn($model)->causedBy($this->authUser)
                ->log($this->modelName . ' Created');
        }
        $this->httpRequest->session()->flash('alert-success', $this->modelNameTranslate . __('created_successfully'));

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function show($id) : View
    {
        $model = $this->modelRepository->findOrFail($id);
        $this->authorize('view', $model);
        $data = $model;
        $activities = \App\Models\Activity::where('activitiable_type', $this->modelNamespace)
            ->where('activitiable_id', $id)
            ->get();

        $this->meta['title'] = $this->modelNameTranslate . __('show');
        $this->meta['link_route'] = route('admin.' . $this->modelNameSlug . '.list.edit', $model);
        $this->meta['link_name'] = $this->modelNameTranslate . __('edit form');

        return view('admin.list.show', ['data' => $data, 'meta' => $this->meta, 'activities' => $activities]);
    }

    public function edit($id) : View
    {
        $model = $this->modelRepository->findOrFail($id);
        $this->authorize('update', $model);
        $this->meta['title'] = __('edit') . $this->modelNameTranslate . ' - #' . $id;
        $form = $this->laravelFormBuilder->create($this->modelForm, [
            'method' => 'PUT',
            'url' => route('admin.' . $this->modelNameSlug . '.list.update', $model),
            'class' => 'm-form m-form--state',
            'id' => 'admin_form',
            'model' => $model,
            'enctype' => 'multipart/form-data',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function update($id)
    {
        $model = $this->modelRepository->findOrFail($id);
        $this->authorize('update', $model);

        $form = $this->laravelFormBuilder->create($this->modelForm, [
            'model' => $model,
        ]);
        if (! $form->isValid()){
            if(env('APP_ENV') === 'testing'){
                $errors = $form->getErrors();
                if(strpos(json_encode($errors), 'file') === false){
                    dd($errors);
                }
            }else{
                return redirect()->back()->withErrors($form->getErrors())->withInput();
            }
        }
        $this->modelRepository->saveWithRelations($form->getFieldValues(), $model);

        if(env('APP_ENV') !== 'testing'){
            activity('Updated')->performedOn($model)->causedBy($this->authUser)
                ->log($this->modelName . ' Updated');
        }
        $this->httpRequest->session()->flash('alert-success', $this->modelNameTranslate . __('updated_successfully'));

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function destroy($id)
    {
        $model = $this->modelRepository->findOrFail($id);
        $this->authorize('delete', $model);

        $model->delete();

        if(env('APP_ENV') !== 'testing'){
            activity('Deleted')->performedOn($model)->causedBy($this->authUser)
                ->log($this->modelName . ' Deleted');
        }
        $this->httpRequest->session()->flash('alert-success', $this->modelNameTranslate . __('deleted_successfully'));

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function restore($id)
    {
        $model = $this->modelRepository->withTrashed()->findOrFail($id);
        $this->authorize('delete', $model);

        $model->restore();

        if(env('APP_ENV') !== 'testing'){
            activity('Restored')->performedOn($model)->causedBy($this->authUser)
                ->log($this->modelName . ' Restored');
        }
        $this->httpRequest->session()->flash('alert-success', $this->modelNameTranslate . __('restored_successfully'));

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function print() : View
    {
        $this->authorize('index', $this->modelNamespace);
        $list = $this->modelRepository->all();

        return view('admin.common.print', compact('list'));
    }

    public function pdf()
    {
        $this->authorize('index', $this->modelNamespace);
        $list = $this->modelRepository->all();

        return \PDF::loadView('admin.common.print', compact('list'))
            ->setPaper('a4', 'landscape')
            ->download($this->modelName . '.pdf');
    }

    public function export()
    {
        $this->authorize('index', $this->modelNamespace);
        $exportClassName = 'App\Services\BaseExport';
        $exportRepository = new $exportClassName();
        $exportRepository->setModelName($this->modelName);

        return \Maatwebsite\Excel\Facades\Excel::download($exportRepository, $this->modelName . '.xlsx');
    }

    public function import()
    {
        $this->authorize('index', $this->modelNamespace);
        $importClassName = 'App\Services\BaseImport';
        $importRepository = new $importClassName();
        $importRepository->setModelName($this->modelName);

        \Maatwebsite\Excel\Facades\Excel::import($importRepository, storage_path('app/public/import.xlsx'));

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function toggleActivated($id)
    {
        $model = $this->modelRepository->findOrFail($id);
        $this->authorize('update', $model);
        $model->activated = ! $model->activated;
        $model->update();

        return response()->json([
            'data' => ['activated' => $model->activated],
        ]);
    }

    public function redirect()
    {
        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function datatable()
    {
        $this->authorize('index', $this->modelNamespace);
        $list = $this->modelRepository->orderBy('updated_at', 'desc');

        $datatable = datatables()
            ->of($list)
            ->addColumn('show_url', function($model) {
                return route('admin.' . $this->modelNameSlug . '.list.show', $model);
            })
            ->addColumn('edit_url', function($model) {
                return route('admin.' . $this->modelNameSlug . '.list.edit', $model);
            })
            ->addColumn('delete_url', function($model) {
                return route('admin.' . $this->modelNameSlug . '.list.destroy', $model);
            });
        if($this->modelName === 'Notification') {
            $datatable->addColumn('user', function($model) {
                return $model->user->name;
            })->addColumn('type', function($model) {
                return str_replace('App\Notifications\\', '', $model->type);
            })->addColumn('data', function($model) {
                return json_decode($model->data)->data;
            });
        }
        elseif($this->modelName === 'Block') {
            $datatable->addColumn('pages', function($model) {
                $pages = $model->pages()->pluck('title')->toArray();
                $output = 'Only: ';
                if($model->show_all_pages){
                    $output = 'Except: ';
                }
                if($pages){
                    $output.= implode(',<br>', $pages);
                }else{
                    $output.= '-';
                }
                return $output;
            });
        }
        elseif($this->modelName === 'Role') {
            $datatable->addColumn('permissions', function($model) {
                return implode(',<br>', $model->permissions()->pluck('name')->toArray());
            })
                ->addColumn('users', function($model) {
                return implode(',<br>', \App\Models\User::role($model->name)->select('email')->pluck('email')->toArray());
            });
        }
        if(collect($this->modelColumns)->where('name', 'tags')->count() > 0){
            $datatable->addColumn('tags', function($model) {
                return implode(', ', $model->tags->pluck('title')->toArray());
            });
        }
        $datatable->addColumn('user_id', function($model) {
            return $model->user ? $model->user->id . ' ' . $model->user->name : '';
        });
        $datatable->addColumn('category_id', function($model) {
            return $model->category ? $model->category->id . '-' . $model->category->title : '';
        });
        $datatable->addColumn('image', function($model) {
            if (method_exists($model, 'src'))
                return '<img style="width:80%" src="'. $model->src('image'). '">';
            return '';
        });

        return $datatable->rawColumns(['id', 'order', 'image', 'content', 'users', 'permissions'])
            ->toJson();
    }
}
