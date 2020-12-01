<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Models\User;
use App\Notifications\SiteNotification;
use App\Services\BaseResourceController;
use Auth;

class ResourceController extends BaseResourceController
{
    public $modelNameSlug = 'notification';

    public function store()
    {
        $this->authorize('create', $this->modelNamespace);
        $form = $this->laravelFormBuilder->create($this->modelForm);

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

    	$model = $this->modelRepository->orderBy('id', 'desc')->first();
        activity($this->modelName)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->modelName . ' Sended');

        $this->request->session()->flash('alert-success', $this->modelName . ' Sent Successfully!');

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    public function edit($id){
        $this->request->session()->flash('alert-danger', $this->modelNameTranslate . __(' edit does not exist!'));

        return $this->redirect();
    }

    public function update($id){
        $this->request->session()->flash('alert-danger', $this->modelNameTranslate . __(' update does not exist!'));

        return $this->redirect();
    }
}
