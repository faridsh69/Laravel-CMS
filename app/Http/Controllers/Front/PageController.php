<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex($page_url = '')
    {
        $page = Page::where('url', $page_url)->active()->first();
        abort_if(! $page, 404);
        if(config('app.name') === 'map'){
            return view('front.test.map.offline-city');
        }

        return view('front.page', ['page' => $page]);
    }

    public function postSubscribe(Request $request, \App\Models\Answer $answer)
    {
        $form = \FormBuilder::create(\App\Forms\CustomeForm::class);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

        $main_data = $data;
        $files = [];
        foreach($main_data as $key => $item){
            if(is_object($item)){
                $files[] = [ $key => $item ];
                unset($data[$key]);
            }
        }
        
        $answer->activated = 1;
        $answer->user_id = \Auth::id();
        $answer->form_id = 1;
        $answer->answers = serialize($data);
        $answer->save();

        // upload files
        foreach($files as $column => $file) {
            $file_service = new \App\Services\FileService;
            $file_service->save($file, $answer, $column);
        }
        
        $request->session()->flash('alert-success', __('created successfully'));

        // $date = Carbon::now()->format('Y/d/m');
        // $time = Carbon::now()->format('H:i');
        // $phone = $request->input('phone');
        // $message = $request->input('message');

        // if(! User::where('phone', $phone)->first()){
        //     User::create([
        //         'first_name' => $date,
        //         'last_name' => $time,
        //         'phone' => $phone,
        //         'bio' => $message,
        //         'status' => 0,
        //         'password' => 'Password-' . rand(100, 999),
        //     ]);
        // }

        $request->session()->flash('alert-success', 'Congratulation, Your answer saved successfully!');

        return redirect()->back();
    }
}
