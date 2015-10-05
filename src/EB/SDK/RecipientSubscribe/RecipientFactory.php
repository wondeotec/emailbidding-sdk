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
     * @param string $emailAddress The recipient email address to be converted into an hash
     * @param string $countryCode The recipient 2 letters country code
     *
     * @return Recipient
     */
    public static function createSimpleAnonymousRecipient($emailAddress, $countryCode)
    {
        return (new Recipient())->setHash(md5($emailAddress))
            ->setCountry($countryCode);
    }
}
