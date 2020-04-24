<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Models\User;
use App\Notifications\SiteNotification;
use App\Services\BaseResourceController;
use Auth;

class ResourceController extends BaseResourceController
{
    public $model_slug = 'notification';

    public function store()
    {
        $this->authorize('create', $this->model_namespace);
        $form = $this->form_builder->create($this->model_form);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

    	$users = User::where('id', $data['users'])->get();
        $site_notification = new SiteNotification();
        $site_notification->setMessage($data['data']);
        foreach($users as $user){
            $user->notify($site_notification);
        }

    	$model = $this->model_repository->orderBy('id', 'desc')->first();
        activity($this->model_name)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model_name. ' Sended');

        $this->request->session()->flash('alert-success', $this->model_name. ' Sent Successfully!');

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    public function edit($id){
        $this->request->session()->flash('alert-danger', $this->model_translated. __(' edit does not exist!'));

        return $this->redirect(); 
    }

    public function update($id){
        $this->request->session()->flash('alert-danger', $this->model_translated. __(' update does not exist!'));

        return $this->redirect(); 
    }
}
