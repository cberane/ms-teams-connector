# MS Teams Connector

![Latest Version on GitHub](https://img.shields.io/github/v/release/cberane/ms-teams-connector)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/cberane/ms-teams-connector)](https://packagist.org/packages/cberane/ms-teams-connector)
[![Total Downloads](https://img.shields.io/packagist/dt/cberane/ms-teams-connector)](https://packagist.org/packages/cberane/ms-teams-connector)
[![Tests](https://github.com/cberane/ms-teams-connector/actions/workflows/main.yml/badge.svg)](https://github.com/cberane/ms-teams-connector/actions/workflows/main.yml)
[![Tests](https://github.com/cberane/ms-teams-connector/actions/workflows/php.yml/badge.svg)](https://github.com/cberane/ms-teams-connector/actions/workflows/php.yml)

Simple php package to be able to push some messages/cards into Microsoft Teams.

## Installation

You can install the package via composer:

```bash
composer require cberane/ms-teams-connector
```

## Usage

```php
use Cberane\MsTeamsConnector\TeamsConnector;
use Cberane\MsTeamsConnector\Cards\TextCard;

...
$connector = new TeamsConnector("https://tenant.webhook.office.com/webhookb2/your/url");
$card = new TextCard('Hello World (from TextCard)');
$connector->sendCard($card);
```

### Testing

Copy `phpunit.xml.dist` to `phpunit.xml` and insert your valid webhook endpoint url.

Afterwards you can run the tests with

```bash
composer test
```

To send some cards to the endpoint you can use
```bash
composer test-interactive
```

You will get a demo card, similar to the one from Microsofts technet 
[article](https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/connectors-using?tabs=cURL#example-of-connector-message): 
![](https://docs.microsoft.com/en-us/microsoftteams/platform/assets/images/connectorcard.png)

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email cberane@gmail.com instead of using the issue tracker.

## Credits

-   [Cristoph Berane](https://github.com/cberane)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com) by [Beyond Code](http://beyondco.de/).
