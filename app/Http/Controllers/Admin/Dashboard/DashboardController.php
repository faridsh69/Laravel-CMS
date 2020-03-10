<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Address;
use App\Notifications\EmailVerified;
use App\Notifications\PhoneVerified;
use App\Notifications\ProfileUpdated;
use App\Services\BaseAdminController;
use Auth;
use Carbon\Carbon;
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
        $this->meta['title'] = __('profile');
        $this->meta['link_name'] = __('dashboard');
    }

    public function index()
    {
        $this->meta['title'] = __('dashboard');
        return view('admin.dashboard.index', ['meta' => $this->meta]);
    }

    public function redirect()
    {
        return redirect()->route('admin.dashboard.list.index');
    }

    public function postAddress()
    {
        $data = $this->request->all();
        $data['user_id'] = Auth::id();
        Address::create($data);

        return redirect()->back();
    }

    public function getProfile()
    {
    	$form = $this->form_builder->create($this->model_form, [
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

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if(! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $main_data = $data;
        $data = $this->_changeDataBeforeCreate('User', $data, $model);

        $model->update($data);
        $this->_saveRelatedDataAfterCreate($this->model, $main_data, $model);
        activity('User')
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log('User Profile Updated');
        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        return redirect()->route('admin.dashboard.profile');        
    }

    public function getActivity()
    {
        $this->meta['title'] = __('activity');
        $this->meta['alert'] = '';
    	$activities = Activity::where('causer_id', Auth::id())
    	    ->orderBy('id', 'desc')
    	    ->get();

    	return view('admin.dashboard.activity', ['activities' => $activities, 'meta' => $this->meta]);
    }

    public function getIdentify()
    {
        $this->meta['title'] = __('identify');

        return view('admin.dashboard.identify', ['meta' => $this->meta]);
    }

    public function getIdentifyEmail()
    {
        $auth_user = Auth::user();
        if($auth_user->email_verified_at){
            return redirect()->back();
        }
        if(! $auth_user->activation_code){
            $code = rand(1000, 9999);
            $auth_user->activation_code = $code;
            $email_verified =  new EmailVerified();
            $email_verified->setCode($code);
            $auth_user->notify($email_verified);
            $auth_user->update();
        }
        $this->meta['title'] = __('identify email');

        return view('admin.dashboard.identify-email', ['meta' => $this->meta]);
    }

    public function postIdentifyEmail()
    {
        $auth_user = Auth::user();
        if($auth_user->email_verified_at){
            return redirect()->back();
        }
        $activation_code = $this->request->input('activation_code');
        if($auth_user->activation_code === $activation_code)
        {
            $auth_user->email_verified_at = Carbon::now();
            $auth_user->activation_code = null;
            $auth_user->update();

            $this->request->session()->flash('alert-success', __('email_verified'));
            return redirect()->route('admin.dashboard.identify');
        }

            $this->request->session()->flash('alert-danger', __('wrong_activation_code'));
            return redirect()->back();

    }

    public function getIdentifyPhone()
    {
        $auth_user = Auth::user();
        if($auth_user->phone_verified_at){
            return redirect()->back();
        }
        if(! $auth_user->activation_code){
            $code = rand(1000, 9999);
            $auth_user->activation_code = $code;
            $phone_verified =  new PhoneVerified();
            $phone_verified->setCode($code);
            $auth_user->notify($phone_verified);
            $auth_user->update();
        }
        $this->meta['title'] = __('identify phone');

        return view('admin.dashboard.identify-phone', ['meta' => $this->meta]);
    }

    public function postIdentifyPhone()
    {
        $auth_user = Auth::user();
        if($auth_user->phone_verified_at){
            return redirect()->back();
        }
        $activation_code = $this->request->input('activation_code');
        if($auth_user->activation_code === $activation_code)
        {
            $auth_user->phone_verified_at = Carbon::now();
            $auth_user->activation_code = null;
            $auth_user->update();

            $this->request->session()->flash('alert-success', __('phone_verified'));
            return redirect()->route('admin.dashboard.identify');
        }

            $this->request->session()->flash('alert-danger', __('wrong_activation_code'));
            return redirect()->back();

    }

    public function postIdentifyNationalCard()
    {
        $auth_user = Auth::user();
        $image_service = new ImageService();
        $national_card_image = $this->request->file('national_card');
        $image_service->save($national_card_image, $auth_user, 'national_card');

        $profile_updated = new ProfileUpdated();
        $profile_updated->setCode($auth_user->id);
        $admin = $this->repository->getAdminUser();
        $admin->notify($profile_updated);

        $this->request->session()->flash('alert-success', __('national card uploaded'));
        return redirect()->back();
    }

    Public function postIdentifyBankCard()
    {
        $auth_user = Auth::user();
        $image_service = new ImageService();
        $bank_card_image = $this->request->file('bank_card');
        $image_service->save($bank_card_image, $auth_user, 'bank_card');

        $profile_updated = new ProfileUpdated();
        $profile_updated->setCode($auth_user->id);
        $admin = $this->repository->getAdminUser();
        $admin->notify($profile_updated);

        $this->request->session()->flash('alert-success', __('bank card uploaded'));
        return redirect()->back();
    }

    Public function postIdentifyCertificateCard()
    {
        $auth_user = Auth::user();
        $image_service = new ImageService();
        $certificate_card_image = $this->request->file('certificate_card');
        $image_service->save($certificate_card_image, $auth_user, 'certificate_card');

        $profile_updated = new ProfileUpdated();
        $profile_updated->setCode($auth_user->id);
        $admin = $this->repository->getAdminUser();
        $admin->notify($profile_updated);

        $this->request->session()->flash('alert-success', __('certificate card uploaded'));

        return redirect()->back();
    }
}
