<?php

namespace App\Http\Controllers\Admin\User;

use App\Services\BaseListController;
use Carbon\Carbon;

class ResourceController extends BaseListController
{
    public $model = 'User';

    public function getLogin($id)
	{
        if (\Auth::loginUsingId($id)){
            return redirect('/');
        }

        return back()->withError('Error occurred.');
	}

	public function getIdentify($id)
	{
		$model = $this->repository->findOrFail($id);
        $this->authorize('view', $model);
        $this->meta['title'] = $this->model_trans . __('identify');

		return view('admin.list.user-identify', ['meta' => $this->meta, 'user' => $model]);
	}

	public function getIdentifyDocument($id, $document_title)
	{
		$model = $this->repository->findOrFail($id);
        $this->authorize('view', $model);

        $document_title_verified_at = $document_title . '_verified_at';
        $model->{$document_title_verified_at} = Carbon::now();
        $model->update();

        return redirect()->back();
	}
}
