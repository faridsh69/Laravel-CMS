<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Cms\Notification;
use App\Notifications\Channels\DatabaseChannel;

final class EmailVerified extends Notification
{
	public function via($notifiable)
	{
		return [DatabaseChannel::class, 'mail'];
	}
}
