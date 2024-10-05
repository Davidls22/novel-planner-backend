<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CORS Paths
    |--------------------------------------------------------------------------
    |
    | Here you may define the routes where CORS should be applied.
    | You can use wildcards like `*` or specific paths like `api/*`.
    |
    */

    'paths' => ['api/*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Specify the methods that are allowed for cross-origin requests.
    | This could be an array of methods like `['GET', 'POST']` or use `['*']` to allow all methods.
    |
    */

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Specify the origins from which the requests are allowed.
    | Use `['*']` to allow any origin or specify the allowed origins explicitly.
    |
    */

    'allowed_origins' => ['http://localhost:3000', 'https://novel-planner-frontend-834t.vercel.app'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Specify the headers that are allowed in requests.
    | Use `['*']` to allow all headers or specify specific headers.
    |
    */

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', '*'], // Add '*' if needed

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Specify the headers that clients can access in the response.
    |
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | This option determines the maximum age (in seconds) that the results of a
    | preflight request can be cached by the browser.
    |
    */

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Whether to allow credentials like cookies, authorization headers, or TLS
    | client certificates with cross-origin requests.
    |
    */

    'supports_credentials' => false,

];
