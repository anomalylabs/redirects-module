<?php

return [
    'from'   => [
        'name'         => 'From',
        'instructions' => 'Enter an exact path or regex pattern. For example <strong>/(foo\/bar\/)(.+)([1-9])/</strong> or <strong>foo/bar</strong>.'
    ],
    'to'     => [
        'name'         => 'To',
        'instructions' => 'Enter an exact path or regex replacement to redirect to. For example <strong>bar/baz/$1</strong> or <strong>bar/baz</strong>.'
    ],
    'status' => [
        'name'         => 'Status',
        'instructions' => 'What kind of redirect is this?',
        'option'       => [
            '301' => '301 Permanent Redirect',
            '302' => '302 Temporary Redirect'
        ]
    ],
    'secure' => [
        'name'         => 'Secure',
        'text'         => 'Yes, redirect to a secure URL.',
        'instructions' => 'Do you want to force a secure connection when redirecting?'
    ],
];
