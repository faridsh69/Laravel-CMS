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

	public $modelSnakeClassName; // user_logined

    public $headingTitle; // dear customer

    public $smsMessage; // dear customer /n message /n app url

    public $messageTemplate; // __(user_logined_message)

    public $message;

    public $appUrl;

    public $appTitle;

    public $mailSubject;

    public function __construct()
    {
        $this->appUrl = URL::to('/');
        $this->appTitle = __(config('app.name'));
        $this->modelSnakeClassName = Str::snake(class_basename($this));
        $this->mailSubject = __($this->modelSnakeClassName . '_subject');
        $this->messageTemplate = __($this->modelSnakeClassName . '_message');
        $this->headingTitle = __('dear_user');
        $this->message = sprintf($this->messageTemplate, $this->appTitle);
        $this->smsMessage = sprintf(" %s \n %s \n %s", $this->headingTitle, $this->message, $this->appTitle);
        $this->editContent();
    }

    public function via($notifiable)
    {
        if(! $notifiable->subscribe){
            return [];
        }

        $channelList = [
            DatabaseChannel::class,
        ];
        if ($notifiable->phone && array_search($this->modelSnakeClassName. '_sms', config('setting-developer.notification_events')) !== false){
            $channelList[] = SmsChannel::class;
        }
        if($notifiable->email && array_search($this->modelSnakeClassName. '_mail', config('setting-developer.notification_events')) !== false){
            $channelList[] = 'mail';
        }

        return $channelList;
    }

    public function setMessage($message)
    {
    	$this->message = $message;
        $this->smsMessage = sprintf(" %s \n %s \n %s", $this->headingTitle, $this->message, $this->appTitle);
    }

    public function setCode($code)
    {
        $this->message = sprintf($this->messageTemplate, $code);
        $this->smsMessage = sprintf(" %s \n %s \n %s", $this->headingTitle, $this->message, $this->appTitle);
    }

    public function toArray($notifiable)
    {
        return [
            'data' => $this->smsMessage,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject($this->mailSubject)
            ->greeting($this->headingTitle)
            ->line($this->message)
            ->action($this->appTitle, $this->appUrl);
    }

    public function toSlack($notifiable)
	{
	    return (new SlackMessage())
	        ->content('user_id: ' . $notifiable->id . ' - ' . $this->smsMessage);
	}

    public function editContent()
    {
    }
}
