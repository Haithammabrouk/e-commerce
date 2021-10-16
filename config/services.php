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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'stripe' => [
        'key'   => env('pk_test_51JbDXNIhrzlNwMGPDOEUx8et1Md9IQoL7BdRgG2BqQFbAnapKXEOwhwWVsT4T7pzAoU8DZKaUaduBtUFYnIFmUJF00BZ8eyCY9'),
        'secret' => env('sk_test_51JbDXNIhrzlNwMGPo8aWVx6y1ckEM94guTGaegf6nvTcZGCELh1b4AvmqPtiHlf29slaGwIAsTGZ14lOVWww2opU00quMHi4SN'),
    ],

];
