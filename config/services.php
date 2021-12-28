<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'github' => [
        'client_id' => env('GITHUB_ID'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('GITHUB_CALLBACK'),
    ],

    /*
    'github' => [
      'client_id' => '5484a4deb48d831b466f',
      'client_secret' => '635dcda2554d09bd36543d228726f1b8cbd5c984',
      'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],*/
];
