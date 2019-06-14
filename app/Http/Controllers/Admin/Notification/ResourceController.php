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

    // public function index() {}
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

    public function create(){return $this->getRedirect();}
    public function show($id){return $this->getRedirect();}
    public function edit($id){return $this->getRedirect();}
    public function update($id){return $this->getRedirect();}
    public function destroy($id){return $this->getRedirect();}

    public function getRedirect()
    {
        return redirect()->route('admin.notification.list.index');
    }
}
