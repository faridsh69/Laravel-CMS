<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\BaseListController;

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
