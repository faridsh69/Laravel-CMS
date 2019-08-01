<?php

$output = [
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'social_companies' => [
        'GOOGLE',
        'TWITTER',
        'FACEBOOK',
        'LINKEDIN',
        // 'GITHUB',
        // 'GITLAB',
        // 'BITBUCKET',
    ],
    'models' => [
        'factory' => [
            'blog',
            'page',
            'category',
            'tag',
            'user',
            'menu',
            'comment',
            'block',
            'widget',
            'theme',
            'feedback',
            'counting',
            'feature',
            'team',
            'partner',
            'slider',
            'pricing',
            'service',
            'form',
            'field',
        ],
        'seeder' => [
            'blog',
            'page',
            'tag',
            'menu',
            'comment',
            'theme',
            'block',
            'widget',
            'feedback',
            'feature',
            'field',
            'form',
        ],
        'admin_routes' => [
            'blog',
            'page',
            'category',
            'tag',
            'media',
            'user',
            'notification',
            'form',
            'field',
            'menu',
            'comment',
            'block',
            'widget',
            'theme',
            'feedback',
            'counting',
            'feature',
            'team',
            'partner',
            'slider',
            'pricing',
            'service',
            'activity',
        ],
        'permissions' => [
            'blog',
            'page',
            'category',
            'user',
            'settinggeneral',
            'settingcontact',
            'settingdeveloper',
            'tag',
            'media',
            'report',
            'notification',
            'menu',
            'comment',
            'form',
            'field',
            'block',
            'widget',
            'theme',
            'feedback',
            'counting',
            'feature',
            'team',
            'partner',
            'slider',
            'pricing',
            'service',
            'activity',
        ],
    ],
];

if(env('APP_NAME') === 'menew'){
    $output['models']['factory'][] = 'shop';
    $output['models']['factory'][] = 'product';

    $output['models']['seeder'][] = 'shop';
    $output['models']['seeder'][] = 'product';

    $output['models']['admin_routes'][] = 'shop';
    $output['models']['admin_routes'][] = 'product';

    $output['models']['permissions'][] = 'shop';
    $output['models']['permissions'][] = 'product';

    $output['models']['platform'] = 'shop';
}
// 'blog', // 1 +
// 'page', // 2 +
// 'category', // 3 +
// 'tag', // 4  +
// 'media', // 5 +
// 'comment', // 6 +
// 'setting', // 7 +
// 'user', // 8 +
// 'theme', // 9 +
// 'block', // 10 +
// 'widget', // 11
// //'seo' // 12  +
// 'form', // 13
// 'report', // 14 +
// 'notification', // 15 +
// 'menu', // 16 +

foreach($output['social_companies'] as $social_company){
    $output[strtolower($social_company)] = [
        'client_id' => env($social_company . '_CLIENT_ID'),
        'client_secret' => env($social_company . '_CLIENT_SECRET'),
        'redirect' => env($social_company . '_CLIENT_CALLBACK'),
    ];
}

return $output;
