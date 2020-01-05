<?php

namespace App\Notifications;

use App\Notifications\Channels\DatabaseChannel;
use App\Notifications\Channels\SmsChannel;
use App\Services\BaseNotification;

class PhoneVerified extends BaseNotification
{
	public function via($notifiable)
    {
        $channel_list = [
            DatabaseChannel::class,
        ];
        $channel_list[] = SmsChannel::class;

        return $channel_list;
    }
}
