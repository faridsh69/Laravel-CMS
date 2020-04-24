<?php

namespace App\Http\Controllers\Admin\Report;

use App\Services\BaseAdminController;
use App\Models\Activity;

class ReportController extends BaseAdminController
{
    public function index()
    {
        // @TODO check permission for report here and in route
        $this->meta['title'] = __('report'). __('manager');

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

        return view('admin.page.report.index', [
            'meta' => $this->meta,
            'data' => $data,
            'count' => $count,
            'activities' => $activities,
        ]);
    }
}
