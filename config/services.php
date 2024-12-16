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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'app_settings'=>[
        'address'=>env('APP_ADDRESS','P.O.Box 7425, Kigali-Rwanda Nyarugenge City MarketDoor NO GF-59'),
        'email'=>env('APP_EMAIL','eliotpharma@gmail.com'),
        'phone_number'=>env('APP_PHONE_NUMBER','+250 788 308 557'),
        'facebook_url'=>env('APP_FACEBOOK_URL','https://www.facebook.com/eliotpharma/'),
        'instagram_url'=>env('APP_INSTAGRAM_URL','https://www.instagram.com/eliotpharma/'),
        'twitter_url'=>env('APP_TWITTER_URL','https://twitter.com/eliotpharma'),
        'youtube_url'=>env('APP_YOUTUBE_URL','https://www.youtube.com/channel/UC-0-3-1-2-3'),
    ]

];
