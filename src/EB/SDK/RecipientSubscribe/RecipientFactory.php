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

/**
 * RecipientFactory
 */
class RecipientFactory
{
    /**
     * Creates a recipient with the mandatory information.
     *
     * @param string $emailAddress The recipient email address
     * @param string $countryCode The recipient 2 letters country code
     *
     * @return Recipient
     */
    public static function createSimpleRecipient($emailAddress, $countryCode)
    {
        return (new Recipient())->setEmailAddress($emailAddress)
            ->setCountry($countryCode);
    }

    /**
     * Creates an anonymous recipient with the mandatory information.
     *
     * @param string $emailAddress The recipient email address to be converted into an hash
     * @param string $countryCode The recipient 2 letters country code
     *
     * @return Recipient
     */
    public static function createSimpleAnonymousRecipient($emailAddress, $countryCode)
    {
        return (new Recipient())->setHash(self::getEmailAddressHash($emailAddress))
            ->setCountry($countryCode)
            ->setProvider(self::getDomainFromEmail($emailAddress));
    }

    /**
     * Gets the domain name from an email address.
     *
     * @param string $emailAddress
     *
     * @return string
     */
    public static function getDomainFromEmail($emailAddress)
    {
        return substr(strrchr($emailAddress, "@"), 1);
    }

    /**
     * Gets the email address hash.
     *
     * @param string $emailAddress
     *
     * @return string
     */
    public static function getEmailAddressHash($emailAddress)
    {
        return md5($emailAddress);
    }
}
