##WebDollar PHP client for JSON-RPC API 

## Installation

### With Composer

```
$ composer require webdollar/webdollar-client-php
```

```json
{
    "require": {
        "webdollar/webdollar-client-php": "^1.0.0"
    }
}
```

## Usage

```php
<?php
require 'vendor/autoload.php';

use WebDollar\Client\WebDollar;

$oClient = Webdollar::factory('http://localhost:3333');

$oClient->clientVersion();

// or async version which will return a promise
$oClient->clientVersionAsync();
