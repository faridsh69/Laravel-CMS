<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Services\BaseResourceController;
use Illuminate\View\View;

class ResourceController extends BaseResourceController
{
    public string $modelNameSlug = 'activity';

    public function create() : View
    {
    	$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' create does not exist!'));

    	return $this->redirect();
    }

    public function edit(int $id) : View
    {
    	$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' edit does not exist!'));

    	return $this->redirect();
    }

    public function update(int $id){
    	$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' update does not exist!'));

    	return $this->redirect();
    }
}
