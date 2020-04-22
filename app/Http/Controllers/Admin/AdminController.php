<?php

namespace App\Http\Controllers\Admin;

use App\Services\BaseListController;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class AdminController
{
	public function __construct(Request $request, FormBuilder $form_builder)
    {
        $model_name = ucfirst($request->segment(2));
        $model_controller = 'App\\Http\\Controllers\\Admin\\' . $model_name . '\\ResourceController';

        $controller_file = __DIR__ . '/' . $model_name . '/ResourceController.php';
        if(file_exists($controller_file)){
            $controller = new $model_controller($request, $form_builder);
        } else{
        	$controller = new BaseListController($request, $form_builder);
        }

        $action = \Route::currentRouteAction();
        list($route_controller, $method) = explode('@', $action);

        return $controller->{$method}();
    }
}
