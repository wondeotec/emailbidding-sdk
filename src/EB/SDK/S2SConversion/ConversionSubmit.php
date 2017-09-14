<?php
/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\S2SConversion;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ConversionSubmit
{
    /**
     * @const The HTTP code for a success submit form to Emailbidding recipient subscribe API
     */
    const SUCCESS_HTTP_CODE = 201;

    /**
     * @const string The abstract Emailbidding API endpoint
     */
    const EB_API_ENDPOINT = 'https://api.emailbidding.com/api/p/advertisers/%s/campaigns/conversions?key=%s&secret=%s';

    /**
     * @const The default request timeout in seconds
     */
    const DEFAULT_REQUEST_TIMEOUT = 60;

    /**
     * @var int $advertiserId
     */
    private $advertiserId;

    /**
     * @var string $apiKey
     */
    private $apiKey;

    /**
     * @var string $apiSecret
     */
    private $apiSecret;

    /**
     * @var Client $guzzleClient
     */
    private $guzzleClient;

    /**
     * ConversionSubmit constructor.
     * @param int    $advertiserId The EB advertiser Id
     * @param string $apiKey The EB S2S conversion API key
     * @param string $apiSecret The EB S2S conversion API secret
     */
    public function __construct($advertiserId, $apiKey, $apiSecret)
    {
        $this->advertiserId = $advertiserId;
        $this->apiKey       = $apiKey;
        $this->apiSecret    = $apiSecret;
        $this->guzzleClient = new Client();
    }

    /**
     * @param Conversion $conversions
     * @return boolean
     * @throws \Exception
     */
    public function post(Conversion $conversions)
    {
        $requestContent = [
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => json_encode(['conversion' => $conversions]),
            'timeout' => self::DEFAULT_REQUEST_TIMEOUT
        ];

        var_dump(json_encode(['conversion' => $conversions]));

        try {
            $response = $this->guzzleClient->post($this->getApiEndpoint(), $requestContent);
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

        return true;
    }

    /**
     * @return string
     */
    protected function getApiEndpoint()
    {
        return sprintf(self::EB_API_ENDPOINT, $this->advertiserId, $this->apiKey, $this->apiSecret);
    }

    /**
     * @param string $response
     */
    protected function processErrors($response)
    {
        var_dump($response);
    }
}