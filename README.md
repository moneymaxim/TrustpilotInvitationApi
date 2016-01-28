# Trustpilot Invitation API Client

[![Latest Stable Version](https://poser.pugx.org/moneymaxim/trustpilot-invitation-api/v/stable)](https://packagist.org/packages/moneymaxim/trustpilot-invitation-api)
[![Total Downloads](https://poser.pugx.org/moneymaxim/trustpilot-invitation-api/downloads)](https://packagist.org/packages/moneymaxim/trustpilot-invitation-api)
[![License](https://poser.pugx.org/moneymaxim/trustpilot-invitation-api/license)](https://packagist.org/packages/moneymaxim/trustpilot-invitation-api)

A PHP library for accessing the [Trustpilot Invitation API](https://developers.trustpilot.com/invitation-api).

This library has been developed and open sourced by [moneymaxim](https://www.moneymaxim.co.uk).

We are currently on the look out for PHP programming talent, so please [get in touch](mailto:andrew.carter@moneymaxim.co.uk) if you are interested.

## Install

Install using [composer](https://getcomposer.org/):

```sh
composer install moneymaxim/trustpilot-invitation-api
```

## Usage

```php
use Trustpilot\Api\Authenticator\Authenticator;
use Trustpilot\Api\Invitation\Client;
use Trustpilot\Api\Invitation\Recipient;
use Trustpilot\Api\Invitation\Sender;
use Trustpilot\Api\Invitation\Context;

$authenticator = new Authenticator();
$accessToken = $authenticator->getAccessToken($apiKey, $apiToken, $username, $password);

$client = new Client($accessToken);

$context = new Context($businessUnitId, $templateId, $redirectUri);
// The last two arguments to the Context constructor ($tags and $locale) are optional
// $context = new Context($templateId, $redirectUri, $tags = array(), $locale = 'en-US');

$recipient = new Recipient($recipientEmail, $recipientName);
$sender    = new Sender($senderEmail, $senderName, $replyTo);

$client->invite($context, $recipient, $sender, $reference) /* : array */
```
