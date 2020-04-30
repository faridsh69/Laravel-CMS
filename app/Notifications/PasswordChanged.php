<?php

namespace App\Notifications;

use App\Notifications\Channels\DatabaseChannel;
use App\Notifications\Channels\SmsChannel;
use App\Services\BaseNotification;

class PasswordChanged extends BaseNotification {}
