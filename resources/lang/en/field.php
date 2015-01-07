<?php

return [
    'from'   => [
        'name'         => 'From',
        'instructions' => 'Enter the path or pattern to match.'
    ],
    'to'     => [
        'name'         => 'To',
        'instructions' => 'Enter the path to redirect to.'
    ],
    'status' => [
        'name'         => 'Status',
        'instructions' => 'The redirect status.',
        'option'       => [
            '301' => '301 Permanent Redirect',
            '302' => '302 Temporary Redirect'
        ]
    ],
    'secure' => [
        'name'         => 'Secure',
        'instructions' => 'Do you want to force a secure connection when redirecting?'
    ],
];
