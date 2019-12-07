<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Base\BaseAdminController;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Route;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends BaseAdminController
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

    public function redirect()
    {
        return redirect()->route('admin.dashboard.index');
    }

    public function getProfile()
    {
    	$form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.dashboard.update-profile'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'model' => Auth::user(),
        ]);

    	return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function updateProfile()
    {
        $model = Auth::user();

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

        foreach(collect($this->model_columns)->where('type', 'boolean')->pluck('name') as $boolean_column)
        {
            if(! isset($data[$boolean_column]))
            {
                $data[$boolean_column] = 0;
            }
        }

        if(isset($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        }
        else{
            $data['password'] = $model->password;
        }

        unset($data['password_confirmation']);
        $model->update($data);

        activity('User')
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log('User Profile Updated');
        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        return redirect()->route('admin.dashboard.profile');
    }

    public function getActivity()
    {
        $this->meta['title'] = __('My Activity');
        $this->meta['alert'] = '';
    	$activities = Activity::where('causer_id', Auth::id())
    	    ->orderBy('id', 'desc')
    	    ->get();

    	return view('admin.dashboard.activity', ['activities' => $activities, 'meta' => $this->meta]);
    }
}
