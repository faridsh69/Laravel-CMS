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

	public $class_name;

    public $sms_message;

    public $heading_title;

    public $message;

    public $app_url;

    public $app_title;

    public function __construct()
    {
    	$this->class_name = Str::snake(class_basename($this));
        $this->subject = __($this->class_name . '_subject');
    	$message_template = __($this->class_name . '_message');
        $this->app_title = __(config('setting-general.app_title'));
        $this->message = sprintf($message_template, $this->app_title);
        $this->heading_title = __('dear_customer');
        $this->app_url = URL::to('/');
        $this->sms_message = sprintf(" %s \n %s \n %s", $this->heading_title, $this->message, $this->app_url);
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

    public function toArray($notifiable)
    {
        return [
            'data' => $this->sms_message,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject($this->subject)
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
}
