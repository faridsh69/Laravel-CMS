<?php

return [
    'driver' => env('SMS_DRIVER', 'kavenegar'), // raygansms
    'sender' => env('SMS_SENDER', 'sms_sender'),
    'api_key' => env('SMS_API_KEY', 'sms_api_key'),
];
