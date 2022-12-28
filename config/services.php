<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook'=>[
      'client_id'=>env('FACEBOOK_APP_ID'),
        'client_secret'=>env('FACEBOOK_APP_SECRET'),
        'redirect'=>env('FACEBOOK_APP_CALLBACK_URL')
    ], 'google' => [
        'client_id' => '712009279529-167mfge1lgqsgo6udm7s3llg9phen438.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/google/callback',
    ],

];
