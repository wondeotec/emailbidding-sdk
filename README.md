# Emailbidding SDK

This SDK serves to help Emailbiddings's publishers to integrate their systems with Emailbidding platform.

## Requirements
You'll need to be install on your server the PHP 5.4 version or higher and add the package 'wondeotec/emailbidding-sdk' 
to you [composer](https://getcomposer.org/) dependencies.

## Webhooks

If you are an Emailbidding publisher, then you can subscribe an endpoint and listen Emailbidding's events such 
as unsubscriptions, soft bounces, hard bounces, clicks or even opens.

This SDK helps you on testing your test to be able to receive an webhook event. Emailbidding system always send 
an HTTP POST request to the given endpoint with an JSON object on body identical to the following:

```json
{
  "ip_address":"127.0.0.1",
  "action":"unsubscription",
  "campaign_id":6368,
  "list_external_id":"my_list",
  "reason":"user_request",
  "recipient_email_address":"email@domain.com",
  "hash":"8d4ba2b6fc195d3f95039377ac7208e6",
  "recipient_external_id":"5556664",
  "trigger_date":"2015-09-03 11:13:34",
  "type":"unsubscription"
}
```

This SDK provides you an object to send webhooks to your endpoint in the same way as the Emailbidding system 
will send to you on the production environment.

The object 'EB\SDK\Webhook\Webhook' has a single method that accepts a payload and and endpoint. You can create 
an object of type 'EB\SDK\Webhook\Payload', or you just can 'ask' to 'EB\SDK\Webhook\Payload' to create an simple 
object to you. See the following example:

```php
<?php

(...)
use EB\SDK\Webhook\PayloadFactory;
use EB\SDK\Webhook\Webhook;
(...)

$webhook = new Webhook();
$success = $webhook->post(
    PayloadFactory::createOpen('email@domain.com', 'my_list'),
    'https://your.secure.server/endpoint'
));
```

## Recipient subscribe
Emailbidding recipient subscribe API allow you to upload your database to Emailbidding platform. You have to 
distinct methods to submit your recipients: simple and anonymous integration.
This SDK helps you on the integration providing you an 'EB\SDK\RecipientSubscribe\RecipientSubscribe' object 
that you can instantiate with 'EB\SDK\RecipientSubscribe\Recipient' objects and then you just need to post the 
recipients data to Emailbidding.
Take the following example in consideration:

```php
<?php
(...)
use EB\SDK\RecipientSubscribe\RecipientSubscribe;
use EB\SDK\RecipientSubscribe\RecipientFactory;
(...)

// ** RECIPIENT SUBSCRIBE ** //
// Creating a recipient subscribe object with my credentials
$recipientSubscribe = new RecipientSubscribe('YOUR_PUBLISHER_API_KEY', 'YOUR_PUBLISHER_API_SECRET');

// Posting an simple recipient (minimal information) to Emailbidding API and dumping the result
var_dump($recipientSubscribe->post(
    array(RecipientFactory::createSimpleRecipient('email@domain.com', 'FR')),
    YOUR_PUBLISHER_ID,
    'my_best_database'
));

// Posting an anonymous recipient to Emailbidding (NOTE: the email address WILL NOT be sent to Emailbidding)
// The email address 'email@domain.com' will be transformed in '7328fddefd53de471baeb6e2b764f78a'
var_dump($recipientSubscribe->post(
    array(RecipientFactory::createSimpleAnonymousRecipient('email@domain.com', 'FR')),
    YOUR_PUBLISHER_ID,
    'my_best_database'
));
```

For more examples you can clone the following project from github:
https://github.com/wondeotec/sample-emailbidding-sdk
