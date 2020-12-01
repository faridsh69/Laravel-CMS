<?php

namespace App\Http\Controllers\Admin\User;

use App\Services\BaseResourceController;
use Carbon\Carbon;

class ResourceController extends BaseResourceController
{
    public function login($id)
	{
        $this->authorize('index', $this->modelNamespace);
        if (\Auth::loginUsingId($id)){
            return redirect('/');
        }

        return back()->withError('Error occurred.');
	}

	public function identify($id)
	{
		$model = $this->modelRepository->findOrFail($id);
        $this->authorize('view', $model);
        $this->meta['title'] = $this->modelNameTranslate . __('identify');

		return view('admin.page.user.identify', ['meta' => $this->meta, 'user' => $model]);
	}

	public function identifyDocument($id, $document_title)
	{
		$model = $this->modelRepository->findOrFail($id);
        $this->authorize('view', $model);

        $document_title_verified_at = $document_title . '_verified_at';
        $model->{$document_title_verified_at} = Carbon::now();
        $model->update();

        $this->request->session()->flash('alert-success', $this->document_title . __('verified_successfully'));

        return redirect()->back();
	}
}
