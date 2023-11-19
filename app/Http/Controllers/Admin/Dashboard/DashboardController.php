<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Dashboard;

use App\Cms\Controllers\Admin\AdminResourceController;
use App\Cms\Services\FileService;
use App\Models\{Activity, Address};
use App\Notifications\{EmailVerified, PhoneVerified, ProfileUpdated};
use Auth;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class DashboardController extends AdminResourceController
{
	public string $modelNameSlug = 'user';

	public function index(): view
	{
		$this->meta['title'] = __('dashboard');

		$last_week_time = \Carbon\Carbon::now()->subdays(7);
		$count = [
			'tags' => \App\Models\Tag::count(),
			'blogs' => \App\Models\Blog::count(),
			'pages' => \App\Models\Page::count(),
			'users' => \App\Models\User::count(),
			'comments' => \App\Models\Comment::count(),
			'new_users' => \App\Models\User::where('created_at', '>', $last_week_time)->count(),
			'new_blogs' => \App\Models\Blog::where('created_at', '>', $last_week_time)->count(),
			'user_views' => 431,
			'categories' => \App\Models\Category::count(),
		];
		$data = [
			'last_comments' => \App\Models\Comment::where('created_at', '>', $last_week_time)->orderBy(
				'id',
				'desc'
			)->take(2)->get(),
		];

		$activities = Activity::orderBy('id', 'desc')->take(5)->get();

		return view('admin.page.dashboard.index', [
			'meta' => $this->meta,
			'data' => $data,
			'count' => $count,
			'activities' => $activities,
		]);
	}

	public function redirect(): RedirectResponse
	{
		return redirect()->route('admin.dashboard.index');
	}

	public function postAddress(): RedirectResponse
	{
		$data = $this->httpRequest->all();
		$data['user_id'] = Auth::id();
		Address::create($data);

		return redirect()->back();
	}

	public function profile(): view
	{
		$this->meta['title'] = __('profile');
		$this->meta['link_name'] = __('dashboard');
		$this->meta['link_route'] = route('admin.dashboard.index');

		$form = $this->laravelFormBuilder->create($this->modelForm, [
			'method' => 'PUT',
			'url' => route('admin.dashboard.update-profile'),
			'class' => 'm-form m-form--state',
			'id' => 'admin_form',
			'model' => Auth::user(),
			'enctype' => 'multipart/form-data',
		]);

		return view('admin.list.form', [
			'form' => $form, 'meta' => $this->meta,
		]);
	}

	public function updateProfile(): RedirectResponse
	{
		$model = Auth::user();

		$form = $this->laravelFormBuilder->create($this->modelForm, [
			'model' => $model,
		]);

		if (!$form->isValid()) {
			return redirect()->back()->withErrors($form->getErrors())->withInput();
		}
		$data = $form->getFieldValues();

		$model->saveWithRelations($data, $model);

		$this->httpRequest->session()->flash('alert-success', 'Profile Updated Successfully!');

		return redirect()->route('admin.dashboard.profile');
	}

	public function activity(): view
	{
		$this->meta['title'] = __('activity');
		$this->meta['alert'] = '';
		$activities = Activity::where('user_id', Auth::id())
			->orderBy('id', 'desc')
			->get();

		return view('admin.page.dashboard.activity', [
			'activities' => $activities, 'meta' => $this->meta,
		]);
	}

	public function identify(): view
	{
		$this->meta['title'] = __('identify');

		return view('admin.page.dashboard.identify', [
			'meta' => $this->meta,
		]);
	}

	public function identifyEmail(): view
	{
		$authUser = Auth::user();
		if ($authUser->email_verified_at) {
			return redirect()->back();
		}
		if (!$authUser->activation_code) {
			$code = mt_rand(1000, 9999);
			$authUser->activation_code = $code;
			$emailVerifiedNotification = new EmailVerified();
			$emailVerifiedNotification->setCode($code);
			$authUser->notify($emailVerifiedNotification);
			$authUser->update();
		}
		$this->meta['title'] = __('identify email');

		return view('admin.page.dashboard.identify-email', [
			'meta' => $this->meta,
		]);
	}

	public function postIdentifyEmail(): RedirectResponse
	{
		$authUser = Auth::user();
		if ($authUser->email_verified_at) {
			return redirect()->back();
		}
		$activation_code = $this->httpRequest->input('activation_code');
		if ($authUser->activation_code === $activation_code) {
			$authUser->email_verified_at = Carbon::now();
			$authUser->activation_code = null;
			$authUser->update();

			$this->httpRequest->session()->flash('alert-success', __('email_verified'));

			return redirect()->route('admin.dashboard.identify');
		}
		$this->httpRequest->session()->flash('alert-danger', __('wrong_activation_code'));

		return redirect()->back();
	}

	public function identifyPhone(): view
	{
		$authUser = Auth::user();
		if ($authUser->phone_verified_at) {
			return redirect()->back();
		}
		if (!$authUser->activation_code) {
			$code = mt_rand(1000, 9999);
			$authUser->activation_code = $code;
			$phoneVerifiedNotification = new PhoneVerified();
			$phoneVerifiedNotification->setCode($code);
			$authUser->notify($phoneVerifiedNotification);
			$authUser->update();
		}
		$this->meta['title'] = __('identify phone');

		return view('admin.dashboard.identify-phone', [
			'meta' => $this->meta,
		]);
	}

	public function postIdentifyPhone(): RedirectResponse
	{
		$authUser = Auth::user();
		if ($authUser->phone_verified_at) {
			return redirect()->back();
		}
		$activation_code = $this->httpRequest->input('activation_code');
		if ($authUser->activation_code === $activation_code) {
			$authUser->phone_verified_at = Carbon::now();
			$authUser->activation_code = null;
			$authUser->update();

			$this->httpRequest->session()->flash('alert-success', __('phone_verified'));

			return redirect()->route('admin.dashboard.identify');
		}
		$this->httpRequest->session()->flash('alert-danger', __('wrong_activation_code'));

		return redirect()->back();
	}

	public function postIdentifyDocument($documentTitle = 'national_card'): RedirectResponse
	{
		$authUser = Auth::user();
		$fileService = new FileService();
		$fileService->save($this->httpRequest->file($documentTitle), $authUser, $documentTitle);

		$profileUpdatedNotification = new ProfileUpdated();
		$profileUpdatedNotification->setCode($authUser->id);
		$admin_users = $this->modelRepository->getAdminUsers();
		foreach ($admin_users as $admin) {
			$admin->notify($profileUpdatedNotification);
		}

		$this->httpRequest->session()->flash('alert-success', __($documentTitle) . __('uploaded'));

		return redirect()->back();
	}

	public function iconsList(): view
	{
		$this->meta['title'] = __('icons');

		return view('admin.page.dashboard.icons', [
			'meta' => $this->meta,
		]);
	}
}
