<?php

return [
    'driver' => env('SMS_DRIVER', 'kavenegar.com'),
    'api_key' => env('SMS_API_KEY', 'api_key'),
    'sender' => env('SMS_SENDER', '10002839889399'),
    'activation_code_message' => 'Your Activation Code Is:\\n ',
    'forget_password' => '',
    'success_payment' => '',
    'success_register' => 'کاربر گرامی',
];
