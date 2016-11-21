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

use GuzzleHttp\Client;

/**
 * Webhook
 */
class Webhook
{
    /**
     * The default max request timeout in seconds
     */
    const DEFAULT_REQUEST_TIMEOUT = 60;

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
     * Makes a request identical to the Emailbidding webhook event
     *
     * @param Payload $payload The Emailbidding payload
     * @param string  $endpoint The endpoint where to the Emailbidding payload should be sent
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception An exception if the payload has errors
     */
    public function post(Payload $payload, $endpoint)
    {
        if (! Type::isValidWebhookType($payload->getAction())) {
            throw new \Exception(sprintf('Webhook "%s" isn\'t valid', $payload->getAction()));
        }

        $requestContent = [
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => json_encode($payload),
            'timeout' => self::DEFAULT_REQUEST_TIMEOUT
        ];

        return $this->guzzleClient->post($endpoint, $requestContent);
    }
}
