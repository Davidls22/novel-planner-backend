<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web', // Set the default guard to 'web'
        'passwords' => 'users', // Set the default password broker to 'users'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | A default configuration has been defined for you here which uses
    | session storage and the Eloquent user provider.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session', // Use the 'session' driver for the 'web' guard
            'provider' => 'users', // Use the 'users' provider
        ],

        'api' => [
            'driver' => 'token', // Use the 'token' driver for the 'api' guard
            'provider' => 'users', // Use the 'users' provider
            'hash' => false, // Set to false if you don't want to hash API tokens
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved from your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models, you may configure multiple
    | sources representing each model/table. These sources may then be assigned
    | to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // Use the Eloquent user provider
            'model' => App\Models\User::class, // Specify your User model
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Settings
    |--------------------------------------------------------------------------
    |
    | Here you may set the options for resetting passwords, including the view
    | that is your password reset e-mail. You may also set the name of the
    | table that maintains all of the reset tokens for your application.
    |
    | The expire time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users', // Use the 'users' provider
            'table' => 'password_resets', // Specify the password resets table
            'expire' => 60, // Tokens expire after 60 minutes
            'throttle' => 60, // Users can request a reset every 60 seconds
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the number of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800, // Password confirmation timeout in seconds (3 hours)

];
