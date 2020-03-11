<?php

return [
    'secret' => env('NOCAPTCHA_SECRET', 'secret'),
    'sitekey' => env('NOCAPTCHA_SITEKEY', 'sitekey'),
    'options' => [
        'timeout' => 30,
    ],
];
