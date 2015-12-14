<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\RecipientSubscribe;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * RecipientSubscribe
 */
class RecipientSubscribe
{
    /**
     * @const The HTTP code for a success submit form to Emailbidding recipient subscribe API
     */
    const SUCCESS_HTTP_CODE = 202;

    /**
     * @const The default request timeout in seconds
     */
    const DEFAULT_REQUEST_TIMEOUT = 60;

    /**
     * @const int The default maximum number of recipients to be sent over a single connection
     */
    const DEFAULT_MAX_RECIPIENTS_PER_REQUEST = 200;

    /**
     * @const string The abstract Emailbidding API endpoint
     */
    const EB_API_ENDPOINT =
        'https://api.emailbidding.com/api/p/publishers/%s/lists/%s/recipients-batch?key=%s&secret=%s';

    /**
     * @var string The Emailbidding API key
     */
    protected $apiKey;

    /**
     * @var string The Emailbidding API secret
     */
    protected $apiSecret;

    /**
     * @var Client The guzzle client to make POST HTTP requests
     */
    protected $guzzleClient;

    /**
     * RecipientSubscribe constructor.
     *
     * @param string $apiKey The Emailbidding API key
     * @param string $apiSecret The Emailbidding API secret
     */
    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        $this->guzzleClient = new Client();
    }

    /**
     * @param Recipient [] $recipients
     * @param string       $listExternalId
     * @param string       $publisherId
     *
     * @returns bool
     * @throws \Exception
     */
    public function post(array $recipients, $publisherId, $listExternalId)
    {
        $recipientsCount = count($recipients);
        if ($recipientsCount == 0) {
            throw new \Exception('No recipient found!');
        }

        // Recipient sanity check
        foreach ($recipients as $recipient) {
            try {
                $recipient->hasValidData();
            } catch (\Exception $recipientException) {
                throw new \Exception(sprintf(
                    'The recipient email/hash "%s", has invalid data: %s',
                    $recipient->getEmailAddress() ?: $recipient->getHash(),
                    $recipientException->getMessage()
                ));
            }
        }

        $offset = 0;
        while (true) {
            $subscribe = new Subscribe();
            $subscribe->setRecipients(array_slice($recipients, $offset, self::DEFAULT_MAX_RECIPIENTS_PER_REQUEST));

            $requestContent = [
                'headers' => ['Content-Type' => 'application/json'],
                'body'    => json_encode(array('subscribe' => $subscribe)),
                'timeout' => self::DEFAULT_REQUEST_TIMEOUT
            ];

            $response = null;
            try {
                $response = $this->guzzleClient->post(
                    $this->getApiEndpoint($publisherId, $listExternalId),
                    $requestContent
                );
            } catch (ClientException $guzzleException) {
                if ($guzzleException->getCode() == 400) {
                    throw new \Exception('Some errors found on this recipient submission: ' . $this->processErrors(
                        $guzzleException->getResponse()->getBody()->getContents()
                    ));
                }
                throw new \Exception('An expected error occurred: ' . $guzzleException->getMessage());
            }

            // If we do not have a success response, let us process the error a message and throw it as an error
            if ($response->getStatusCode() != self::SUCCESS_HTTP_CODE) {
                throw new \Exception(
                    'Some errors found on this recipient submission: ' . $this->processErrors($response->getBody())
                );
            }

            // If we already send more all the contacts, we can break the loop
            if ($offset + self::DEFAULT_MAX_RECIPIENTS_PER_REQUEST >= $recipientsCount) {
                break;
            }

            // Increment the offset
            $offset += self::DEFAULT_MAX_RECIPIENTS_PER_REQUEST;
        }

        return true;
    }

    /**
     * @param int    $publisherId The publisher Id
     * @param string $listExternalId The publisher list external Id
     *
     * @return string
     */
    protected function getApiEndpoint($publisherId, $listExternalId)
    {
        return sprintf(self::EB_API_ENDPOINT, $publisherId, $listExternalId, $this->apiKey, $this->apiSecret);
    }

    /**
     * @param string $response
     */
    protected function processErrors($response)
    {
        var_dump($response);
    }
}
