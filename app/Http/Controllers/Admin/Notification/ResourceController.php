<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Base\BaseListController;
use App\Notifications\News;
use Notification;
use App\Models\User;

class ResourceController extends BaseListController
{
    public $model = 'Notification';

    // public function index()
    // {
    // 	$data = 'sagtole';
    // 	$users = User::where('id', '<', 100)->get();  	
    // 	Notification::send($users, new News($data));

    // 	dd(1);
    // }
}
