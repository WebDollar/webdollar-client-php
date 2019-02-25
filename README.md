# WebDollar PHP client for JSON-RPC API 
[![Build Status](https://travis-ci.org/WebDollar/webdollar-client-php.svg?branch=master)](https://travis-ci.org/WebDollar/webdollar-client-php)

## Installation

### With Composer

```
$ composer require webdollar/webdollar-client-php
```

```json
{
    "require": {
        "webdollar/webdollar-client-php": "^1.0"
    }
}
```

## Usage

```php
<?php
require 'vendor/autoload.php';

use WebDollar\Client\WebDollarClient;

$oClient = WebDollarClient::factory([
    'url'   => 'http://localhost:3333',
    'auth'  => ['username', 'password'],
    'debug' => FALSE,
]);

$oClient->clientVersion();

// or async version which will return a promise
$oClient->clientVersionAsync();
