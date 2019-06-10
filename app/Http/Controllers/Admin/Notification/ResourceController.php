<?php

namespace App\Http\Controllers\Admin\Notification;

use Auth;
use App\Base\BaseListController;
use App\Models\User;
use App\Notifications\News;
use Notification;

class ResourceController extends BaseListController
{
    public $model = 'Notification';

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
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Sended');

        $this->request->session()->flash('alert-success', $this->model . ' Sent Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function edit($id){abort(404);}
    public function update($id){abort(404);}
}
