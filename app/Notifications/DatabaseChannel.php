<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class DatabaseChannel
{
	public function send($notifiable, Notification $notification)
	{
		$notifiable->routeNotificationFor('database')->create([
			'type' => get_class($notification),
			'data' => $notification->toArray($notifiable),
		]);
	}
}
