# Emailbidding SDK

This SDK serves to help Emailbiddings's publishers to integrate their systems with Emailbidding platform.

## Webhhoks

Emailbidding platform allows publishers to listen events from their sends. Currently, we support six types of events: 
clicks, opens, unsubscriptions, soft bounces, hard bounces and spam complaints.

Emailbidding's platform sends an HTTP POST to the publisher's endpoint with a JSON payload like the following:

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

To help you testing your integration, you easily build a PHP composer project
