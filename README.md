[![Build Status](https://travis-ci.org/erjanmx/sisense-api-client-php.svg?branch=master)](https://travis-ci.org/erjanmx/sisense-api-client-php)

# sisense-api-client-php

https://developers.sisense.com/display/API2/REST+API+Reference+-+v0.9
https://developers.sisense.com/display/API2/REST+API+Reference+-+v1.0

## Sample usage

```php
  $config = [
    'username' => 'u',
    'password' => 'p',
    'default_version' => 'v1.0',
  ];
  $client = new \Sisense\Client('https://sisense-host/api/', $config);
  
  $client->authenticate();
  
  $status = $client->application->status(); 
```

## Available categories

#### v0.9
- Authorization
- Branding
- ElastiCubes
- Palettes
- Reporting
- Users
- Groups
- Settings
- Roles

#### v1.0
- Users
- Groups
- Application
- Authentication


## Run tests

```bash
composer test
```

## Check with phpcs
```bash
composer check
```
