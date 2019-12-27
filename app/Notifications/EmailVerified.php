<?php

namespace App\Notifications;

use App\Base\BaseNotification;
use App\Notifications\Channels\DatabaseChannel;

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
