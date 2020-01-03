<?php

namespace App\Base;

use App\Notifications\Channels\DatabaseChannel;
use App\Notifications\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Str;
use URL;

class BaseNotification extends Notification
{
	use Queueable;

	public $class_name; // user_logined

    public $heading_title; // dear customer

    public $sms_message; // dear customer /n message /n app url

    public $message_template; // __(user_logined_message)

    public $message;

    public $app_url;

    public $app_title;

    public $mail_subject;

    public function __construct()
    {
        $this->app_url = URL::to('/');
        $this->app_title = __(config('app.name'));
        $this->class_name = Str::snake(class_basename($this));
        $this->mail_subject = __($this->class_name . '_subject');
        $this->message_template = __($this->class_name . '_message');
        $this->heading_title = __('dear customer');
        $this->message = sprintf($this->message_template, $this->app_title);
        $this->sms_message = sprintf(" %s \n %s \n %s \n %s", $this->heading_title, $this->message, $this->app_title, $this->app_url);
        $this->editContent();
    }

    public function via($notifiable)
    {
        $channel_list = [
            DatabaseChannel::class,
            // 'slack',
        ];
        if(config('setting-developer.' . $this->class_name . '_sms') !== 0){
            $channel_list[] = SmsChannel::class;
        }
        if(config('setting-developer.' . $this->class_name . '_mail') !== 0){
            $channel_list[] = 'mail';
        }

        return $channel_list;
    }

    public function setMessage($message)
    {
    	$this->message = $message;
        $this->sms_message = sprintf(" %s \n %s \n %s", $this->heading_title, $this->message, $this->app_url);
    }

    public function setCode($code)
    {
        $this->message = sprintf($this->message_template, $code);
        $this->sms_message = sprintf(" %s \n %s \n %s \n %s", $this->heading_title, $this->message, $this->app_title, $this->app_url);
    }

    public function toArray($notifiable)
    {
        return [
            'data' => $this->sms_message,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject($this->mail_subject)
            ->markdown('vendor.mail.general', 
                [
                    'heading_title' => $this->heading_title,
                    'mail_message' => $this->message,
                    'app_url' => $this->app_url,
                    'app_title' => $this->app_title,
                ]
            );
    }

    public function toSlack($notifiable)
	{
	    return (new SlackMessage())
	        ->content('user_id: ' . $notifiable->id . ' - ' . $this->sms_message);
	}

    public function editContent()
    {
        
    }
}
