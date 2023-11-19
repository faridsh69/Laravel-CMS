<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Activity;

use App\Cms\Controllers\Admin\AdminResourceController;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class ResourceController extends AdminResourceController
{
	public string $modelNameSlug = 'activity';

	public function create(): View
	{
		$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' create does not exist!'));

		return view('admin.page.dashboard.index', [
			'meta' => $this->meta,
		]);
	}

	public function edit(int $id): View
	{
		$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' edit does not exist!'));

		return view('admin.page.dashboard.index', [
			'meta' => $this->meta,
		]);
	}

	public function update(int $id): RedirectResponse
	{
		$this->httpRequest->session()->flash('alert-danger', $this->modelNameTranslate . __(' update does not exist!'));

		return $this->redirect();
	}
}
