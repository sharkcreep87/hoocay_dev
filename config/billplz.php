<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sandbox mode
    |--------------------------------------------------------------------------
    |
    | Enable sandbox mode and production configuration will not be apply.
    | Get your sandbox credential at https://billplz-staging.herokuapp.com
    |
    */
    'sandbox_mode' => env('BILLPLZ_ENABLE_SANDBOX', false),

    /*
    |--------------------------------------------------------------------------
    | Api key
    |--------------------------------------------------------------------------
    |
    | Obtains your api key by register account with www.billplz.com
    |
    */
    'api_key'      => [
        'production' => env('BILLPLZ_API_KEY', '9dd9c2e4-0f72-4bea-a974-7c11761b21ad'),
        'sandbox'    => env('BILLPLZ_SANDBOX_API_KEY', '68864bb1-c6ad-4245-bdbf-138394f51afd'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Collection id
    |--------------------------------------------------------------------------
    |
    | Obtains your api key by register account with www.billplz.com
    |
    */

    'collection_id' => [
        'production' => env('BILLPLZ_COLLECTION_ID', 'ddfgj4aj'),
        'sandbox'    => env('BILLPLZ_SANDBOX_COLLECTION_ID', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Reference
    |--------------------------------------------------------------------------
    |
    | Default references to issues a bill
    |
    */

    'references' => [
        [
            'label'     => '', // max 120 characters
            'reference' => '', // max 20 characters
        ],
        [
            'label'     => '', // max 120 characters
            'reference' => '', // max 20 characters
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | The default logo for creating new billplz collection
    | Supported format:  jpg, jpeg, gif and png only
    */
    'logo'       => 'Storage_path("/billplz/logo.png")', // storage_path('/billplz/my-logo.jpg')

    /*
    |--------------------------------------------------------------------------
    | Photo
    |--------------------------------------------------------------------------
    |
    | The default photo for creating a new billplz open collection
    | Supported format:  jpg, jpeg, gif and png only
    */
    'photo'      => '', // storage_path('/billplz/my-photo.jpg')

    /*
    |--------------------------------------------------------------------------
    | Bill generation location
    |--------------------------------------------------------------------------
    |
    | The default bill store location relative to App/
    */
    'directory'  => 'Bills\\',

    /*
    |--------------------------------------------------------------------------
    | Bill generation namespace
    |--------------------------------------------------------------------------
    |
    | The default bill store namespace
    */
    'namespace'  => 'App/Bills',
];
