<?php

namespace App\Http\Controllers\Admin\User;

use App\Services\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'User';

    public function getLogin($id)
	{
        if (\Auth::loginUsingId($id)){
            return redirect('/');
        }

        return back()->withError('Error occurred.');
	}
}
