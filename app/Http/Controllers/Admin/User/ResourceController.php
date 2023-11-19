<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Cms\Controllers\Admin\AdminResourceController;
use Auth;
use Carbon\Carbon;

final class ResourceController extends AdminResourceController
{
	public function login(int $id)
	{
		$this->authorize('index', $this->modelNamespace);
		if (Auth::loginUsingId($id)) {
			return redirect('/');
		}

		return back()->withError('Error occurred.');
	}

	public function identify(int $id)
	{
		$user = $this->modelRepository->findOrFail($id);
		$this->authorize('view', $user);
		$this->meta['title'] = $this->modelNameTranslate . ' ' . __('identify');

		return view('admin.page.user.identify', [
			'meta' => $this->meta,
			'user' => $user,
		]);
	}

	public function identifyDocument(int $id, string $documentTitle = 'national_card')
	{
		$user = $this->modelRepository->findOrFail($id);
		$this->authorize('view', $user);

		$document_title_verified_at = $documentTitle . '_verified_at';
		$user->{$document_title_verified_at} = Carbon::now();
		$user->update();

		$this->httpRequest->session()->flash('alert-success', __($documentTitle) . __('verified_successfully'));

		return redirect()->back();
	}
}
