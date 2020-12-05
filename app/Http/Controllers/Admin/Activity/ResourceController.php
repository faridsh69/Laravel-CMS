<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Services\BaseResourceController;

class ResourceController extends BaseResourceController
{
    public string $modelNameSlug = 'activity';

    public function create(){
    	$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' create does not exist!'));

    	return $this->redirect();
    }

    public function edit($id){
    	$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' edit does not exist!'));

    	return $this->redirect();
    }

    public function update($id){
    	$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' update does not exist!'));

    	return $this->redirect();
    }
}
