<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Base\BaseListController;
use App\Models\User;
use App\Notifications\SiteNotification;
use Auth;
use Notification;
use Route;

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
        $site_notification =  new SiteNotification(); 
        $site_notification->setData($data['data']);
    	Notification::send($users, $site_notification);

    	$model = \App\Models\Notification::orderBy('id', 'desc')->first();

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Sended');

        $this->request->session()->flash('alert-success', $this->model . ' Sent Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function edit($id){return $this->getRedirect(); }

    public function update($id){return $this->getRedirect(); }

    public function destroy($id){return $this->getRedirect(); }
}
