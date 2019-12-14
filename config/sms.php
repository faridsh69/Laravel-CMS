<?php

return [
    'driver' => env('SMS_DRIVER', 'kavenegar.com'),
    'sender' => env('SMS_SENDER', 'sms_sender_number'),
    'api_key' => env('SMS_API_KEY', 'sms_api_key'),
];
