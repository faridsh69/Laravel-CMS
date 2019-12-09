<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Log;

class UserRegistered extends Notification
{
    use Queueable;

    public $message = 'ثبت نام شما در سامانه منیو تکمیل شد.';

    public $data;
    
    public function __construct()
    {
        $heading_title = 'کاربر گرامی';
        $new_line = "\n";
        $app_title = 'منیو';
        $app_url = 'http://www.menew.ir';

        $this->data = __($heading_title).
            $new_line.
            __($this->message).
            $new_line.
            __($app_title).
            $new_line.
            $app_url;
    }

    public function via($notifiable)
    {
        Log::info([
            'user_id' => $notifiable->id,
            'data' => $this->data, 
        ]);
        $via_list = [DatabaseChannel::class];
        if(config('setting-developer.user_registered_sms')){
            // $via_list[] = 'sms';
        }
        if(config('setting-developer.user_registered_mail')){
            $via_list[] = 'mail';
        }

        return $via_list;
    }

    public function toArray($notifiable)
    {
        return [
            'data' => $this->data,
        ];
    }

    public function toMail($notifiable)
    {
        dd(123);
    }
}
