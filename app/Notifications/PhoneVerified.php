<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Cms\Services\NotificationService;
use App\Notifications\Channels\{DatabaseChannel, SmsChannel};

final class PhoneVerified extends NotificationService
{
	public function via($notifiable)
	{
		return [DatabaseChannel::class, SmsChannel::class];
	}
}
