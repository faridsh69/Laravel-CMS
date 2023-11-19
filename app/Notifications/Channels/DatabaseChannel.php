<?php

declare(strict_types=1);

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

final class DatabaseChannel
{
	public function send($notifiable, Notification $notification): void
	{
		$notifiable->routeNotificationFor('database')->create([
			'type' => \get_class($notification),
			'data' => $notification->toArray($notifiable),
		]);
	}
}
