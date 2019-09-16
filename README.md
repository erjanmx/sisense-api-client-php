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
- DataSources
- ElastiCubes
- Geo
- Groups
- Palettes
- Reporting
- Roles
- Settings
- Users

#### v1.0
- Account
- Admin
- Application
- Authentication
- Groups
- Users


## Run tests

```bash
composer test
```

## Check with phpcs
```bash
composer check
```
