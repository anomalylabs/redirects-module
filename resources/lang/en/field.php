<?php

return [
    'from'   => [
        'name'         => 'From',
        'label'        => 'Redirect from',
        'placeholder'  => 'foo/bar/{var}',
        'instructions' => 'Enter an exact path or pattern. For example <strong>foo/bar/{var}</strong> or <strong>foo/bar</strong>.'
    ],
    'to'     => [
        'name'         => 'To',
        'label'        => 'Redirect to',
        'placeholder'  => 'bar/{var}',
        'instructions' => 'Enter an exact path, pattern replacement or URL to redirect to. For example <strong>bar/{var}</strong> or <strong>bar/baz</strong>.'
    ],
    'status' => [
        'name'         => 'Status',
        'instructions' => 'What kind of redirect is this?',
        'option'       => [
            '301' => '301 - Permanent Redirect',
            '302' => '302 - Temporary Redirect'
        ]
    ],
    'secure' => [
        'name'         => 'Secure',
        'label'        => 'Redirect to a secure URL?',
        'instructions' => 'Do you want to force a secure connection when redirecting?'
    ],
];
