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
namespace EB\SDK\RecipientSuppress;

/**
 * EB\SDK\SuppressionImport\RecipientFactory
 */
class RecipientFactory
{
    /**
     * Creates a recipient with the mandatory information.
     *
     * @param string $value The recipient email address
     *
     * @return Recipient
     */
    public static function createSimpleSuppressedRecipient($value)
    {
        return (new Recipient())->setValue($value);
    }

}
