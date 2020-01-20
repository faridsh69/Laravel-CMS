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

		return view('admin.list.user-details', ['meta' => $this->meta, 'user' => $model]);
	}

	public function getIdentifyNationalCard($id)
	{
		$model = $this->repository->findOrFail($id);
        $this->authorize('view', $model);

        $model->national_card_verified_at = Carbon::now();
        $model->update();

        return redirect()->back();
	}

	public function getIdentifyBankCard($id)
	{
		$model = $this->repository->findOrFail($id);
        $this->authorize('view', $model);

        $model->bank_card_verified_at = Carbon::now();
        $model->update();

        return redirect()->back();
	}

	public function getIdentifyCertificateCard($id)
	{
		$model = $this->repository->findOrFail($id);
        $this->authorize('view', $model);

        $model->certificate_card_verified_at = Carbon::now();
        $model->update();

        return redirect()->back();
	}
}
