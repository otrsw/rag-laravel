# Laravel package to easily interact with your red-amber.green monitors

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ontherocksoftware/rag-laravel.svg?style=flat-square)](https://packagist.org/packages/ontherocksoftware/rag-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ontherocksoftware/rag-laravel/run-tests?label=tests)](https://github.com/ontherocksoftware/rag-laravel/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ontherocksoftware/rag-laravel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ontherocksoftware/rag-laravel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/ontherocksoftware/rag-laravel.svg?style=flat-square)](https://packagist.org/packages/ontherocksoftware/rag-laravel)


Quick and simple way to expose realtime business KPIs of your system or software to your user community.

## Installation

You can install the package via composer:

```bash
composer require ontherocksoftware/rag-laravel
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Ontherocksoftware\RagLaravel\RagLaravelServiceProvider" --tag="rag-laravel-config"
```

This is the contents of the published config file:

```php
return [

    /**
     * Your API token. Obtain from your account at https://red-amber.green 
     */
    'token' => env('RAG_API_TOKEN','YOUR_TOKEN'),

    /**
     * If you prefer to use the service without exception, set this to false
     */

     'exceptions' => env('RAG_WITH_EXCEPTIONS',true)

];
```

## Usage

```php
use Ontherocksoftware\RagLaravel\RagLaravel;

/**
 * Assuming you added a monitor to your account named 'Stock Levels' you can interact with that monitor 
 * using the static methods proivided:
 */ 

//With no additional info simply use the red, amber or green method and pass in the name

//Your code here to check stock levels....

//If all good just set to green
RagLaravel::green('Stock Levels');

//If you want to provide additional info you can pass a short message and a link to more in depth info
RagLaravel::amber('Stock Levels', 'Stock levels dropped significantly in the last 24 hours', 'https://www.mysystem.com/dashboard/stocklevels');


```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Heinz Seldte](https://github.com/otrsw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
