<?php

namespace App\Http\Controllers\Admin\Report;

use App\Base\BaseAdminController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Spatie\Activitylog\Models\Activity;
use Auth;
use Route;

class ReportController extends BaseAdminController
{
    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->model_class = 'App\\Models\\User';
        $this->model_form = 'App\\Forms\\UserForm';
        $this->repository = new $this->model_class();
        $this->request = $request;
        $this->form_builder = $form_builder;
        $this->model_columns = $this->repository->getColumns();
        $this->meta['title'] = __('Profile');
    }

    public function index()
    {
        if(Route::currentRouteName() === 'admin.report.index'){
            $this->meta['title'] = __('Report');
        }else{
            $this->meta['title'] = __('Dashboard');
        }

        $this->meta['alert'] = '';

        // $yesterday_time = \Carbon\Carbon::now()->subdays(1);
        $last_week_time = \Carbon\Carbon::now()->subdays(7);
        $count = [
            'tags' => \App\Models\Tag::count(),
            'blogs' => \App\Models\Blog::count(),
            'pages' =>  \App\Models\Page::count(),
            'users' =>   \App\Models\User::count(),
            'comments' => \App\Models\Comment::count(),
            'new_users' => \App\Models\User::where('created_at', '>', $last_week_time)->count(),
            'new_blogs' =>   \App\Models\Blog::where('created_at', '>', $last_week_time)->count(),
            'user_views' =>   431,
            'categories' =>    \App\Models\Category::count(),
        ];
        $data = [
            'last_comments' => \App\Models\Comment::where('created_at', '>', $last_week_time)->orderBy('id', 'desc')->take(2)->get(),
        ];

        $activities = Activity::orderBy('id', 'desc')->take(5)->get();

        return view('admin.report.index', [
            'meta' => $this->meta,
            'data' => $data,
            'count' => $count,
            'activities' => $activities,
        ]);
    }
}
