# Redirects Module

*anomaly.module.redirects*

#### Manage redirects from one URL or domain to another.

The Redirects Module provides powerful URL redirection management with support for various redirect types and pattern matching.

## Features

- 301 & 302 redirects
- Pattern-based redirects
- Domain redirects
- Query string handling
- Redirect logging
- Import/export functionality

## Usage

### Creating Redirects

```php
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;

$redirects = app(RedirectRepositoryInterface::class);

$redirects->create([
    'from' => '/old-url',
    'to' => '/new-url',
    'status' => 301
]);
```

### Pattern Redirects

```twig
{# Redirect with wildcard #}
/blog/* => /news/*

{# Domain redirect #}
old-domain.com/* => new-domain.com/*
```

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+

## License

The Redirects Module is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
