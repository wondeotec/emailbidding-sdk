<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Webhook;

use Guzzle\Http\Client;

/**
 * Webhook
 */
class Webhook
{
    /**
     * @var Client The guzzle client to make POST HTTP requests
     */
    protected $guzzleClient;

    /**
     *
     */
    public function __construct()
    {
        $this->guzzleClient = new Client();
    }

    /**
     * @param Payload $payload
     * @param string  $endpoint
     *
     * @throws \Exception
     */
    public function post(Payload $payload, $endpoint)
    {
        if (! Type::isValidWebhookType($payload->getAction())) {
            throw new \Exception(sprintf('Webhook "%s" isn\'t valid', $payload->getAction()));
        }

        $requestContent = [
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => json_encode($payload)
        ];

        var_dump(json_encode($payload));die;

        $this->guzzleClient->post($endpoint, $requestContent);
    }
}
