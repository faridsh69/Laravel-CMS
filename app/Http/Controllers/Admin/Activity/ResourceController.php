<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Services\BaseResourceController;

class ResourceController extends BaseResourceController
{
    public $modelNameSlug = 'activity';

    public function create(){
    	$this->request->session()->flash('alert-danger', $this->modelNameTranslate . __(' create does not exist!'));

    	return $this->redirect();
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
