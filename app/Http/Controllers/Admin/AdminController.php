<?php

namespace App\Http\Controllers\Admin;

use App\Services\BaseListController;
use Kris\LaravelFormBuilder\FormBuilder;

$model_name = ucfirst(\Request::segment(2));
$controller_file = __DIR__ . '/' . $model_name . '/ResourceController.php';
class AdminResourceController extends BaseListController{}
if (file_exists($controller_file)) {
	$model_controller = 'App\\Http\\Controllers\\Admin\\' . $model_name . '\\ResourceController';
	$code =<<<EOF
  		class AdminResourceController extends $model_controller {}
EOF;
	eval( $code );
}

class AdminController extends AdminResourceController
{
	// public function __construct(Request $request, FormBuilder $form_builder)
 //    {
 //        $model_name = ucfirst($request->segment(2));
        

 //        $controller_file = __DIR__ . '/' . $model_name . '/ResourceController.php';
 //        if(file_exists($controller_file)){
 //            $controller = new $model_controller($request, $form_builder);
 //        } else{
 //        	$controller = new BaseListController($request, $form_builder);
 //        }

 //        $action = \Route::currentRouteAction();
 //        list($route_controller, $method) = explode('@', $action);

 //        return $controller->{$method}();
 //    }
}
