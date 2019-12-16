<?php

return [
    'driver' => env('MAIL_DRIVER', 'sendmail'),
    'host' => env('MAIL_HOST', 'mail.cms-laravel.com'), // smtp.mailgun.org
    'port' => env('MAIL_PORT', 587),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
    'log_channel' => env('MAIL_LOG_CHANNEL'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'from' => [
        'address' => env('MAIL_USERNAME', 'laravel-cms@gmail.com'),
        'name' => env('APP_NAME', 'Laravel CMS'),
    ],
    'reply_to' => [
        'address' => env('MAIL_USERNAME', 'laravel-cms@gmail.com'),
        'name' => env('APP_NAME', 'Laravel CMS'),
    ],
];
