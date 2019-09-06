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
- ElastiCubes

#### v1
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
