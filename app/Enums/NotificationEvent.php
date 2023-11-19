<?php

declare(strict_types=1);

namespace App\Enums;

final class NotificationEvent
{
	public const data = [
		'site_notification_sms' => 'Site Notification SMS',
		'site_notification_mail' => 'Site Notification Mail',

		'user_registered_sms' => 'User Registered SMS',
		'user_registered_mail' => 'User Registered Mail',

		'user_logined_sms' => 'User Logined SMS',
		'user_logined_mail' => 'User Logined Mail',

		'password_changed_sms' => 'Password Changed SMS',
		'password_changed_mail' => 'Password Changed Mail',

		'profile_updated_sms' => 'Profile Updated SMS',
		'profile_updated_mail' => 'Profile Updated Mail',

		'document_rejected_sms' => 'Document Rejected SMS',
		'document_rejected_mail' => 'Document Rejected Mail',

		'factor_created_sms' => 'Factor Created SMS',
		'factor_created_mail' => 'Factor Created Mail',

		'form_submitted_sms' => 'Form Submitted SMS',
		'form_submitted_mail' => 'Form Submitted Mail',
	];
}
