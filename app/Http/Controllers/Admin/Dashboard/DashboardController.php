<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Activity;
use App\Models\Address;
use App\Notifications\EmailVerified;
use App\Notifications\PhoneVerified;
use App\Notifications\ProfileUpdated;
use App\Services\BaseResourceController;
use Auth;
use Carbon\Carbon;
use Illuminate\View\View;
use Route;

class DashboardController extends BaseResourceController
{
    public string $modelNameSlug = 'user';

    public function index() : view
    {
        $this->meta['title'] = __('dashboard');
        return view('admin.page.dashboard.index', ['meta' => $this->meta]);
    }

    public function redirect()
    {
        return redirect()->route('admin.dashboard.index');
    }

    public function postAddress()
    {
        $data = $this->httpRequest->all();
        $data['user_id'] = Auth::id();
        Address::create($data);

        return redirect()->back();
    }

    public function profile() : view
    {
        $this->meta['title'] = __('profile');
        $this->meta['link_name'] = __('dashboard');
        $this->meta['link_route'] = route('admin.dashboard.index');

        $form = $this->laravelFormBuilder->create($this->modelForm, [
            'method' => 'PUT',
            'url' => route('admin.dashboard.update-profile'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'model' => Auth::user(),
            'enctype' => 'multipart/form-data',
        ]);

    	return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function updateProfile()
    {
        $model = Auth::user();

        $form = $this->laravelFormBuilder->create($this->modelForm, [
            'model' => $model,
        ]);

        if(! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

        $model->saveWithRelations($data, $model);

        activity('Updated')
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log('User Profile Updated');
        $this->httpRequest->session()->flash('alert-success', 'Profile Updated Successfully!');

        return redirect()->route('admin.dashboard.profile');
    }

    public function activity() : view
    {
        $this->meta['title'] = __('activity');
        $this->meta['alert'] = '';
    	$activities = Activity::where('user_id', Auth::id())
    	    ->orderBy('id', 'desc')
    	    ->get();

    	return view('admin.page.dashboard.activity', ['activities' => $activities, 'meta' => $this->meta]);
    }

    public function identify() : view
    {
        $this->meta['title'] = __('identify');

        return view('admin.page.dashboard.identify', ['meta' => $this->meta]);
    }

    public function identifyEmail()
    {
        $authUser = Auth::user();
        if($authUser->email_verified_at){
            return redirect()->back();
        }
        if(! $authUser->activation_code){
            $code = rand(1000, 9999);
            $authUser->activation_code = $code;
            $email_verified =  new EmailVerified();
            $email_verified->setCode($code);
            $authUser->notify($email_verified);
            $authUser->update();
        }
        $this->meta['title'] = __('identify email');

        return view('admin.dashboard.identify-email', ['meta' => $this->meta]);
    }

    public function postIdentifyEmail()
    {
        $authUser = Auth::user();
        if($authUser->email_verified_at){
            return redirect()->back();
        }
        $activation_code = $this->httpRequest->input('activation_code');
        if($authUser->activation_code === $activation_code)
        {
            $authUser->email_verified_at = Carbon::now();
            $authUser->activation_code = null;
            $authUser->update();

            $this->httpRequest->session()->flash('alert-success', __('email_verified'));
            return redirect()->route('admin.dashboard.identify');
        }
        $this->httpRequest->session()->flash('alert-danger', __('wrong_activation_code'));
        return redirect()->back();

    }

    public function identifyPhone() : view
    {
        $authUser = Auth::user();
        if($authUser->phone_verified_at){
            return redirect()->back();
        }
        if(! $authUser->activation_code){
            $code = rand(1000, 9999);
            $authUser->activation_code = $code;
            $phone_verified =  new PhoneVerified();
            $phone_verified->setCode($code);
            $authUser->notify($phone_verified);
            $authUser->update();
        }
        $this->meta['title'] = __('identify phone');

        return view('admin.dashboard.identify-phone', ['meta' => $this->meta]);
    }

    public function postIdentifyPhone()
    {
        $authUser = Auth::user();
        if($authUser->phone_verified_at){
            return redirect()->back();
        }
        $activation_code = $this->httpRequest->input('activation_code');
        if($authUser->activation_code === $activation_code)
        {
            $authUser->phone_verified_at = Carbon::now();
            $authUser->activation_code = null;
            $authUser->update();

            $this->httpRequest->session()->flash('alert-success', __('phone_verified'));
            return redirect()->route('admin.dashboard.identify');
        }
        $this->httpRequest->session()->flash('alert-danger', __('wrong_activation_code'));
        return redirect()->back();
    }

    public function postIdentifyDocument($document_title = 'national_card')
    {
        $authUser = Auth::user();
        $file_service = new \App\Services\BaseFileService();
        $file_service->save($this->httpRequest->file($document_title), $authUser, $document_title);

        $profile_updated = new ProfileUpdated();
        $profile_updated->setCode($authUser->id);
        $admin_users = $this->modelRepository->getAdminUsers();
        foreach($admin_users as $admin){
            $admin->notify($profile_updated);
        }

        $this->httpRequest->session()->flash('alert-success', __($document_title) . __('uploaded'));
        return redirect()->back();
    }

    public function iconsList() : view
    {
        $this->meta['title'] = __('icons');

        return view('admin.page.dashboard.icons', ['meta' => $this->meta]);
    }
}
