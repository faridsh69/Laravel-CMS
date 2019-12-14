<?php

namespace App\Base;

use App\Notifications\Channels\SmsChannel;
use App\Notifications\Channels\DatabaseChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Str;

class BaseNotification extends Notification
{
	use Queueable;

	public $class_name;

    public $data;
    
    public function __construct()
    {
    	$this->class_name = Str::snake(class_basename($this));
    	$message_template = __($this->class_name . '_message');
        $app_title = __(config('setting-general.app_title'));
        $message = sprintf($message_template, $app_title);
        $heading_title = __('dear_customer');
        $app_url = 'http://www.menew.ir';
        $this->data = sprintf(" %s \n %s \n %s", $heading_title, $message, $app_url);
    }

    public function via($notifiable)
    {
        $via_list = [DatabaseChannel::class];
        if(config('setting-developer.' . $this->class_name . '_sms') !== 0){
            $via_list[] = SmsChannel::class;
        }
        if(config('setting-developer.' . $this->class_name . '_mail') !== 0){
            $via_list[] = 'mail';
        }
        dd($via_list, $this->data);
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
        dump('mail');
        die();
    }
}
