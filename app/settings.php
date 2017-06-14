<?php

return [
    'settings' => [

        // Showing errors
        'displayErrorDetails' => true,

        // Add a Content-Length header to the response
        'addContentLengthHeader' => false,

        // View engine
        'view' => [
            'template_path' => __DIR__ . '/../views',
            'twig' => [
                'cache' => false
            ],
        ],

        // SMS Gateway
        'sms-gateway'   => [
            'user_key'  => $_ENV['SMS_USER_KEY'],
            'pass_key'  => $_ENV['SMS_PASS_KEY'],
        ],
    ]
];