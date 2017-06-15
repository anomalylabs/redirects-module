<?php

return [
    'from'   => [
        'name'         => 'From',
        'label'        => 'Redirect From',
        'placeholder'  => 'foo/bar/{var}',
        'instructions' => 'Specify an exact path or pattern to redirect. For example <strong>foo/bar/{var}</strong> or <strong>foo/bar</strong> or <strong>http://{account}.old.com/{path}</strong>.',
        'warning'      => 'Do not include locale hints like <strong>en</strong>/foo/bar/{var}',
    ],
    'to'     => [
        'name'         => 'To',
        'label'        => 'Redirect To',
        'placeholder'  => 'bar/{var}',
        'instructions' => 'Specify an exact path, pattern replacement or URL to redirect to. For example <strong>bar/{var}</strong> or <strong>bar/baz</strong> or <strong>https://new.com/account/{account}/{path}</strong>.',
    ],
    'status' => [
        'name'         => 'Status',
        'instructions' => 'What kind of redirect is this?',
        'option'       => [
            '301' => '301 - Permanent Redirect',
            '302' => '302 - Temporary Redirect',
        ],
    ],
    'secure' => [
        'name'         => 'Secure',
        'label'        => 'Redirect to a secure URL?',
        'instructions' => 'Do you want to force a secure connection when redirecting?',
        'warning'      => 'This option is ignored if a protocol is included in the <strong>Redirect To</strong> value.',
    ],
];
