<?php

namespace App\Base;

use App\Notifications\Channels\SmsChannel;
use App\Notifications\Channels\DatabaseChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Str;
use Illuminate\Notifications\Messages\SlackMessage;

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
        $channel_list = [
            // DatabaseChannel::class, 
            // 'slack'
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
        $url = 'hi';
        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('One of your invoices has been paid!')
                    ->action('View Invoice', $url)
                    ->line('Thank you for using our application!');
    }

    public function toSlack($notifiable)
	{
	    return (new SlackMessage)
            ->content('user_id: ' . $notifiable->id . ' - ' . $this->data);
	}
}
