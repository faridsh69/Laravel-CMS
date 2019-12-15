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

class BaseNotification extends Notification implements ShouldQueue
{
	use Queueable;

	public $class_name;
    public $data;
    public $heading_title;
    public $message;
    public $app_url;
    
    public function __construct()
    {
    	$this->class_name = Str::snake(class_basename($this));
    	$message_template = __($this->class_name . '_message');
        $app_title = __(config('setting-general.app_title'));
        $this->message = sprintf($message_template, $app_title);
        $this->heading_title = __('dear_customer');
        $this->app_url = 'http://www.menew.ir';
        $this->data = sprintf(" %s \n %s \n %s", $this->heading_title, $this->message, $this->app_url);
    }

    public function via($notifiable)
    {
        $channel_list = [
            DatabaseChannel::class, 
            'slack',
        ];
        if(config('setting-developer.' . $this->class_name . '_sms') !== 0){
            $channel_list[] = SmsChannel::class;
        }
        if(config('setting-developer.' . $this->class_name . '_mail') !== 0){
            $channel_list[] = 'mail';
        }

        return $channel_list;
    }

    public function setData($data)
    {
    	$this->data = $data;
    }

    public function toArray($notifiable)
    {
        return [
            'data' => $this->data,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting($this->heading_title)
            ->line($this->message);
            // ->action('Visit site', $this->app_url);
    }

    public function toSlack($notifiable)
	{
	    return (new SlackMessage)
            ->content('user_id: ' . $notifiable->id . ' - ' . $this->data);
	}
}
