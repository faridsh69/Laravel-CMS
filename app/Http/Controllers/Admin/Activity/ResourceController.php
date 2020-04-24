<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Services\BaseResourceController;

class ResourceController extends BaseResourceController
{
    public $model_slug = 'activity';

    public function create(){
    	$this->request->session()->flash('alert-danger', $this->model_translated. __(' create does not exist!'));

    	return $this->redirect();
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
