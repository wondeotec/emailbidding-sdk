<?php

/**
 * RecipientFactory.
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author     Fernando Martins <fernando.martins@wondeotec.com>
 * @copyright  Copyright (C) Wondeotec SA - All Rights Reserved
 * @license    LICENSE.txt
 */
namespace EB\SDK\SuppressionImport;

/**
 * EB\SDK\SuppressionImport\RecipientFactory
 */
class SuppressedRecipientFactory
{
    /**
     * Creates a recipient with the mandatory information.
     *
     * @param string $value The recipient email address
     *
     * @return SuppressedRecipient
     */
    public static function createSimpleSuppressedRecipient($value)
    {
        return (new SuppressedRecipient())->setValue($value);
    }

    /**
     * Creates an anonymous recipient with the mandatory information.
     *
     * @param string $value The recipient email address to be converted into an hash
     *
     *
     * @return SuppressedRecipient
     */
    public static function createSimpleAnonymousSuppressedRecipient($value)
    {
        return (new SuppressedRecipient())->setValue(self::getEmailAddressHash($value));
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
