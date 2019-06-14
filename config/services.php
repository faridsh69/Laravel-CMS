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
            'blog', // 1 +
            'page', // 2 +
            'category', // 3 +
            'tag', // 4  
            'user', // 8 
            'menu', // 16
            'comment', // 6
            'form', // 13
            // 'block', // 10
            // 'widget', // 11
            // 'theme', // 9 
            // // 'media', // 5  
            // // 'setting', // 7 + 
            // // 'seo' // 12 
            // // 'report', // 14
            // // 'notification', // 15
        ],
        'seeder' => [
            'blog', // 1 +
            'page', // 2 +
            'tag', // 4  
            'menu', // 16
            // 'comment', // 6
            // 'form', // 13
            // 'block', // 10
            // 'widget', // 11
            // // 'media', // 5  
            // // 'setting', // 7 + 
            // // 'seo' // 12 
            // // 'user', // 8 
            // // 'report', // 14
            // // 'notification', // 15
            // // 'theme', // 9 
        ],
        'admin_routes' => [
            'blog', // 1 +
            'page', // 2 +
            'category', // 3 +
            'tag', // 4  
            'media', // 5  
            'user', // 8 
            'notification', // 15
            'form', // 13
            'menu', // 16
            'comment', // 6
            'block', // 10
            'widget', // 11
            'theme', // 9 
            // // 'setting', // 7 + 
            // // 'seo' // 12 
            //  // 'report', // 14
        ],
        // 'blog', // 1 +
        // 'page', // 2 +
        // 'category', // 3 +
        // 'tag', // 4  
        // 'media', // 5  
        // 'comment', // 6
        // 'setting', // 7 + 
        // 'user', // 8 
        // 'theme', // 9 
        // 'block', // 10
        // 'widget', // 11
        // //'seo' // 12 
        // 'form', // 13
        // 'report', // 14
        // 'notification', // 15
        // 'menu', // 16
    ],
];
foreach($output['social_companies'] as $social_company){
    $output[ strtolower($social_company) ] = [
        'client_id' => env($social_company . '_CLIENT_ID'),
        'client_secret' => env($social_company . '_CLIENT_SECRET'),
        'redirect' => env($social_company . '_CLIENT_CALLBACK'),
    ];
}

return $output;