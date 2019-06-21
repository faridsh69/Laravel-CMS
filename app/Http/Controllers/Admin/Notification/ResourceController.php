<?php

namespace App\Http\Controllers\Admin\Notification;

use Auth;
use App\Base\BaseListController;
use App\Models\User;
use App\Notifications\News;
use Notification;
use Route;

class ResourceController extends BaseListController
{
    public $model = 'Notification';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __($this->model . ' Manager');
        $this->meta['alert'] = '';
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.create');
        $this->meta['link_name'] = __('Create New ' . $this->model);
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s','$1 $2', \Str::studly($column['name']))
            ];
        }

        return view('admin.list.special-table', ['meta' => $this->meta, 'columns' => $columns, 'model_sm' => $this->model_sm]);
    }

    // public function getDatatable()
    // {
    //     $model = $this->repository->orderBy('updated_at', 'desc')->get();

    //     return datatables()
    //         ->of($model)
    //         ->addColumn('show_url', function($model) {
    //             return route('admin.' . $this->model_sm . '.list.show', $model);
    //         })
    //         ->addColumn('users', function($model) {
    //             return $model->user->email;
    //         })
    //         // ->addColumn('delete_url', function($model) {
    //         //     return route('admin.' . $this->model_sm . '.list.destroy', $model);
    //         // })
    //         // ->rawColumns(['id', 'content'])
    //         ->toJson();
    // }

    public function store()
    {
        $this->authorize('create', $this->model_class);
        $form = $this->form_builder->create($this->model_form);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

    	$users = User::where('id', $data['users'])->get();  	
    	Notification::send($users, new News($data['data']));

    	$model = \App\Models\Notification::orderBy('id', 'desc')->first();

        activity($this->model)
            ->withProperties(['notification_id' => $model->id])
            ->causedBy(Auth::user())
            ->log($this->model . ' Sended');

        $this->request->session()->flash('alert-success', $this->model . ' Sent Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function edit($id){return $this->getRedirect();}
    public function update($id){return $this->getRedirect();}
    public function destroy($id){return $this->getRedirect();}

    public function getRedirect()
    {
        return redirect()->route('admin.notification.list.index');
    }
}
