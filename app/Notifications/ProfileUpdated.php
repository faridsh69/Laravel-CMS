<?php

namespace App\Notifications;

use App\Base\BaseNotification;

class ProfileUpdated extends BaseNotification
{
	public function editContent()
	{
        $this->message = sprintf($this->message_template, \Auth::id());
        $this->sms_message = sprintf(" %s \n %s \n %s \n %s", $this->heading_title, $this->message, $this->app_title, $this->app_url);
	}
}
