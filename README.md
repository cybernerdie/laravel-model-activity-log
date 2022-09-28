# A simple package to log model activities inside your laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cybernerdie/laravel-model-activity-log.svg?style=flat-square)](https://packagist.org/packages/cybernerdie/laravel-model-activity-log)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/cybernerdie/laravel-model-activity-log/run-tests?label=tests)](https://github.com/cybernerdie/laravel-model-activity-log/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/cybernerdie/laravel-model-activity-log/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/cybernerdie/laravel-model-activity-log/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cybernerdie/laravel-model-activity-log.svg?style=flat-square)](https://packagist.org/packages/cybernerdie/laravel-model-activity-log)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require cybernerdie/laravel-model-activity-log
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Cybernerdie\\ModelActivityLog\\ModelActivityLogServiceProvider"
php artisan migrate
```

## Usage

```php
$modelActivityLog = new Cybernerdie\ModelActivityLog();
echo $modelActivityLog->echoPhrase('Hello, Cybernerdie!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Joshua Paul](https://github.com/cybernerdie)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
