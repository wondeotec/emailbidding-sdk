<?php
/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Exception;


use Exception;

class DataValidationException extends \Exception
{
    const INVALID_COUNTRY                 = 0;
    const INVALID_EMAIL_ADDRESS           = 1;
    const INVALID_HASH                    = 2;
    const EMAIL_ADDRESS_OR_HASH_MANDATORY = 3;
    const PROVIDER_MANDATORY              = 4;
    const INVALID_SUBSCRIPTION_SOURCE     = 5;
    const INVALID_IP_ADDRESS              = 6;
    const INVALID_GENDER                  = 7;
    const INVALID_FIRST_NAME              = 8;
    const INVALID_LAST_NAME               = 9;
    const INVALID_ADDRESS                 = 10;
    const INVALID_ZIP_CODE                = 11;
    const INVALID_PHONE1                  = 12;
    const INVALID_PHONE2                  = 13;
    const INVALID_TITLE                   = 14;
    const INVALID_SUBSCRIPTION_STATUS     = 15;
    const INVALID_UNSUBSCRIPTION_IP       = 16;
    const INVALID_LANGUAGE                = 17;

    /**
     * @var string $type
     */
    private $type;

    /**
     * DataValidationException constructor.
     * @param string    $type
     * @param int       $message
     */
    public function __construct($type, $message)
    {
        parent::__construct($message);

        $this->type = $type;
    }

    /**
     *
     */
    public static function throwInvalidCountryException()
    {

        throw new static(self::INVALID_COUNTRY, 'Country is mandatory!');
    }

    /**
     * @param string $emailAddress
     */
    public static function throwInvalidEmailAddressException($emailAddress)
    {

        throw new static(self::INVALID_EMAIL_ADDRESS, sprintf('The email address "%s" isn\'t valid!', $emailAddress));
    }

    /**
     *
     */
    public static function throwEmailAddressOrHashMandatoryException()
    {

        throw new static(self::EMAIL_ADDRESS_OR_HASH_MANDATORY, 'Email address or email address hash is mandatory!');
    }


    public static function throwProviderMandatoryException()
    {

        throw new static(
            self::PROVIDER_MANDATORY,
            'On an anonymous integration, email address hash and provider are mandatory!'
        );
    }

    /**
     *
     */
    public static function throwInvalidSubscriptionSourceException()
    {

        throw new static(self::INVALID_SUBSCRIPTION_SOURCE, 'Subscription source must have less than 150 characters!');
    }

    /**
     * @param string $ipAddress
     */
    public static function throwInvalidIpAddressException($ipAddress)
    {

        throw new static(self::INVALID_IP_ADDRESS, sprintf('The IP address "%" is not valid!', $ipAddress));
    }

    /**
     * @param string $gender
     */
    public static function throwInvalidGenderException($gender)
    {

        throw new static(self::INVALID_GENDER, sprintf('The gender "%s" is not valid!', $gender));
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    public static function throwInvalidFirstNameException($firstName)
    {
        throw new static(
            self::INVALID_FIRST_NAME,
            sprintf('First name "%s" is invalid: it length must be between 2 and 64 characters!', $firstName)
        );
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    public static function throwInvalidLastNameException($lastName)
    {
        throw new static(
            self::INVALID_LAST_NAME,
            sprintf('Last name "%s" is invalid: it length must be between 2 and 64 characters!', $lastName)
        );
    }

    /**
     * @param string $address
     * @throws Exception
     */
    public static function throwInvalidAddressException($address)
    {
        throw new static(
            self::INVALID_LAST_NAME,
            sprintf('Address "%s" is invalid: It must have less than 150 characters long!', $address)
        );
    }

    /**
     * @param string $zipCode
     * @throws Exception
     */
    public static function throwInvalidZipCodeException($zipCode)
    {
        throw new static(
            self::INVALID_ZIP_CODE,
            sprintf('Zip code "%s" is invalid: It must have less than 10 characters long!', $zipCode)
        );
    }

    /**
     * @param string $phone
     * @throws Exception
     */
    public static function throwInvalidPhone1Exception($phone)
    {
        throw new static(
            self::INVALID_PHONE1,
            sprintf('Phone 1 "%s" is invalid: It must have less than 20 characters long!', $phone)
        );
    }

    /**
     * @param string $phone
     * @throws Exception
     */
    public static function throwInvalidPhone2Exception($phone)
    {
        throw new static(
            self::INVALID_PHONE2,
            sprintf('Phone 2 "%s" is invalid: It must have less than 20 characters long!', $phone)
        );
    }

    /**
     * @param string $title
     * @throws Exception
     */
    public static function throwInvalidTitleException($title)
    {
        throw new static(
            self::INVALID_TITLE,
            sprintf('Title "%s" is invalid: It must have less than 20 characters long!', $title)
        );
    }

    /**
     * @param string $subscriptionStatus
     * @throws Exception
     */
    public static function throwInvalidSubscriptionStatusException($subscriptionStatus)
    {

        throw new static(
            self::INVALID_SUBSCRIPTION_STATUS,
            sprintf('The subscription status "%s" isn\'t valid!', $subscriptionStatus)
        );
    }

    /**
     * @param string $unsubscriptionIp
     * @throws Exception
     */
    public static function throwInvalidUnsubscriptionIpException($unsubscriptionIp)
    {

        throw new static(
            self::INVALID_UNSUBSCRIPTION_IP,
            sprintf('The unsubscription IP address "%" is not valid!', $unsubscriptionIp)
        );
    }

    /**
     * @param string $language
     * @throws Exception
     */
    public static function throwInvalidLanguageException($language)
    {

        throw new static(
            self::INVALID_LANGUAGE,
            sprintf('The language code "%s" isn\'t valid!', $language)
        );
    }
}