<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Firebase Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for Firebase services
    | including authentication, messaging, and other Firebase features.
    |
    */

    'api_key' => env('FIREBASE_API_KEY'),
    'auth_domain' => env('FIREBASE_AUTH_DOMAIN'),
    'project_id' => env('FIREBASE_PROJECT_ID'),
    'database_url' => env('FIREBASE_DATABASE_URL'),
    'storage_bucket' => env('FIREBASE_STORAGE_BUCKET'),
    'messaging_sender_id' => env('FIREBASE_MESSAGING_SENDER_ID'),
    'app_id' => env('FIREBASE_APP_ID'),
    'server_key' => env('FIREBASE_SERVER_KEY'),
    'vapid_key' => env('FIREBASE_VAPID_KEY'),
    
    /*
    |--------------------------------------------------------------------------
    | Firebase Service Account Credentials
    |--------------------------------------------------------------------------
    |
    | These values are used to authenticate with Firebase Admin SDK.
    | They can be provided either as environment variables or as a 
    | base64 encoded JSON string in FIREBASE_CREDENTIALS_BASE64.
    |
    */
    'credentials' => [
        'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID'),
        'private_key' => env('FIREBASE_PRIVATE_KEY'),
        'client_email' => env('FIREBASE_CLIENT_EMAIL'),
        'client_id' => env('FIREBASE_CLIENT_ID'),
        'client_x509_cert_url' => env('FIREBASE_CLIENT_X509_CERT_URL'),
        'credentials_base64' => env('FIREBASE_CREDENTIALS_BASE64'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Firebase Messaging Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for Firebase Cloud Messaging.
    |
    */
    'messaging' => [
        'enabled' => env('FIREBASE_MESSAGING_ENABLE', false),
    ],

];