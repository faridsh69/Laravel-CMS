<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Notification;

use App\Cms\Controllers\Admin\AdminResourceController;
use App\Models\User;
use App\Notifications\SiteNotification;
use Auth;
use Illuminate\Http\RedirectResponse;

final class ResourceController extends AdminResourceController
{
	public string $modelNameSlug = 'notification';

	public function store(): RedirectResponse
	{
		$this->authorize('create', $this->modelNamespace);
		$form = $this->laravelFormBuilder->create($this->modelForm);

		if (!$form->isValid()) {
			return redirect()->back()->withErrors($form->getErrors())->withInput();
		}
		$data = $form->getFieldValues();

		$users = User::where('id', $data['users'])->get();
		$site_notification = new SiteNotification();
		$site_notification->setMessage($data['data']);

		foreach ($users as $user) {
			$user->notify($site_notification);
		}

		$this->httpRequest->session()->flash('alert-success', $this->modelName . ' Sent Successfully!');

		return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
	}

	public function edit(int $id)
	{
		$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' edit does not exist!'));

		return $this->redirect();
	}

	public function update(int $id): RedirectResponse
	{
		$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' update does not exist!'));

		return $this->redirect();
	}
}
