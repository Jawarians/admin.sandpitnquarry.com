<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Payment Gateway Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for various payment gateways
    | used in the application. All sensitive credentials are stored in
    | environment variables for security.
    |
    */

    'paypal' => [
        'mode' => env('PAYPAL_MODE', 'sandbox'), // Can be 'sandbox' or 'live'
        'sandbox' => [
            'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
            'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
        ],
        'live' => [
            'client_id' => env('PAYPAL_LIVE_CLIENT_ID'),
            'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET'),
        ],
        'currency' => env('PAYPAL_CURRENCY', 'USD'),
        'settings' => [
            'return_url' => env('APP_URL') . '/payment/paypal/success',
            'cancel_url' => env('APP_URL') . '/payment/paypal/cancel',
        ],
    ],

    'razorpay' => [
        'mode' => env('RAZORPAY_MODE', 'sandbox'), // Can be 'sandbox' or 'live'
        'sandbox' => [
            'key_id' => env('RAZORPAY_SANDBOX_KEY_ID'),
            'key_secret' => env('RAZORPAY_SANDBOX_KEY_SECRET'),
        ],
        'live' => [
            'key_id' => env('RAZORPAY_LIVE_KEY_ID'),
            'key_secret' => env('RAZORPAY_LIVE_KEY_SECRET'),
        ],
        'currency' => env('RAZORPAY_CURRENCY', 'USD'),
    ],

];