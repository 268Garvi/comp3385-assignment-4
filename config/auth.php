<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option sets the default authentication "guard" and password
    | reset "broker" for your application. Change these as necessary.
    |
    */
    'defaults' => [
        'guard' => 'api',  // Changed to 'api' to make it the default for authentication
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Here you define every authentication guard for the application.
    | The 'api' guard is set up to use JWT for stateless authentication.
    |
    | Supported: "session", "token", "jwt"
    |
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',  // Using JWT driver for the 'api' guard
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | User providers define how users are retrieved from your database.
    | This configuration remains unchanged but ensures users are fetched using Eloquent.
    |
    | Supported: "database", "eloquent"
    |
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configurations for resetting passwords, including the table for token storage
    | and the expiry time for reset tokens.
    |
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',  // Typically 'password_resets' is used
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Duration in seconds before a password confirmation expires.
    |
    */
    'password_timeout' => 10800,  // 3 hours

];
