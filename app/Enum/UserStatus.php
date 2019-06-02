<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const Verified = 1;
    const Pending = 2;
    const Blocked = 3;
}
