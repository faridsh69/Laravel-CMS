<?php

namespace App\Services;

use App\Notifications\Channels\DatabaseChannel;
use App\Notifications\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Str;
use URL;

class BaseNotification extends Notification
{
	use Queueable;

	public $model_snake_class_name; // user_logined

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
        $this->model_snake_class_name = Str::snake(class_basename($this));
        $this->mail_subject = __($this->model_snake_class_name . '_subject');
        $this->message_template = __($this->model_snake_class_name . '_message');
        $this->heading_title = __('dear_user');
        $this->message = sprintf($this->message_template, $this->app_title);
        $this->sms_message = sprintf(" %s \n %s \n %s", $this->heading_title, $this->message, $this->app_title);
        $this->editContent();
    }

    public function via($notifiable)
    {
        if(! $notifiable->subscribe){
            return [];
        }

        $channel_list = [
            DatabaseChannel::class,
        ];
        if($notifiable->phone && strpos(config('setting-developer.notification_events'), $this->model_snake_class_name . '_sms') !== false){
            $channel_list[] = SmsChannel::class;
        }
        if($notifiable->email && strpos(config('setting-developer.notification_events'), $this->model_snake_class_name . '_mail') !== false){
            $channel_list[] = 'mail';
        }

        return $channel_list;
    }

    public function setMessage($message)
    {
    	$this->message = $message;
        $this->sms_message = sprintf(" %s \n %s \n %s", $this->heading_title, $this->message, $this->app_title);
    }

    public function setCode($code)
    {
        $this->message = sprintf($this->message_template, $code);
        $this->sms_message = sprintf(" %s \n %s \n %s", $this->heading_title, $this->message, $this->app_title);
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
            ->greeting($this->heading_title)
            ->line($this->message)
            ->action($this->app_title, $this->app_url);
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
