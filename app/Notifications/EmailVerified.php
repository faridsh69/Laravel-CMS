<?php

namespace App\Notifications;

use App\Notifications\Channels\DatabaseChannel;
use App\Services\BaseNotification;

class EmailVerified extends BaseNotification
{
	public function via($notifiable)
    {
        $channel_list = [
            DatabaseChannel::class,
        ];
        $channel_list[] = 'mail';

        return $channel_list;
    }
}
