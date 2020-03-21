<?php

namespace App\Notifications;

use App\Notifications\Channels\DatabaseChannel;
use App\Notifications\Channels\SmsChannel;
use App\Services\BaseNotification;

class PasswordChanged extends BaseNotification
{
	public function via($notifiable)
    {
        $channel_list = [
            DatabaseChannel::class,
            SmsChannel::class,
            'mail',
        ];

        return $channel_list;
    }
}
