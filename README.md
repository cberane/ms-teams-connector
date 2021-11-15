# MS Teams Connector

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cberane/ms-teams-incoming-webhooks.svg?style=flat-square)](https://packagist.org/packages/cberane/ms-teams-connector)
[![Total Downloads](https://img.shields.io/packagist/dt/cberane/ms-teams-incoming-webhooks.svg?style=flat-square)](https://packagist.org/packages/cberane/ms-teams-connector)

Simple php package to be able to push some messages/cards into Microsoft Teams.

## Installation

You can install the package via composer:

```bash
composer require cberane/ms-teams-incoming-webhooks
```

## Usage

```php
// Usage description here
```

### Testing

Copy `phpunit.xml.dist` to `phpunit.xml` and insert your valid webhook endpoint url.

Afterwards you can run the tests with

```bash
composer test
```

To send some cards to the endpoint you can use
```bash
composer test-webhooks
```

You will get a demo card like the one from Microsofts technet [article](https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/connectors-using?tabs=cURL#example-of-connector-message) 
(as soon as it is implemented): 
![](https://docs.microsoft.com/en-us/microsoftteams/platform/assets/images/connectorcard.png)

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email cristoph@berane.eu instead of using the issue tracker.

## Credits

-   [Cristoph Berane](https://github.com/cberane)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com) by [Beyond Code](http://beyondco.de/).
