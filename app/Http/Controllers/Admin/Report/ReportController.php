<?php

namespace App\Http\Controllers\Admin\Report;

use App\Base\BaseAdminController;
use Spatie\Activitylog\Models\Activity;

class ReportController extends BaseAdminController
{
    public function index()
    {
    	$this->authorize('index_settingdeveloper');
    	$this->meta['title'] = 'Report Manager';

        $yesterday_time = \Carbon\Carbon::now()->subdays(1);
        $last_week_time = \Carbon\Carbon::now()->subdays(7);
        $count = [
            'tags' => \App\Models\Tag::count(),
            'blogs' => \App\Models\Blog::count(),
            'pages' =>  \App\Models\Page::count(),
            'users' =>   \App\Models\User::count(),
            'comments' => \App\Models\Comment::count(),
            'new_users' => \App\Models\User::where('created_at', '>', $yesterday_time)->count(),
            'categories' => \App\Models\Category::count(),
        ];
        $data = [
            'last_comments' => \App\Models\Comment::orderBy('id', 'desc')->take(2)->get(),
        ];
        $activities = Activity::orderBy('id', 'desc')->take(5)->get();

        return view('admin.report', [
            'meta' => $this->meta,
            'data' => $data,
            'count' => $count,
            'activities' => $activities,
        ]);
    }
}
