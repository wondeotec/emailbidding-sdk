<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Validators;

/**
 * DataValidator
 */
class DataValidator
{
    /**
     * @param $emailAddress
     *
     * @return bool
     */
    public static function isEmailValid($emailAddress)
    {
        return filter_var($emailAddress, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    /**
     * @param $ipAddress
     *
     * @return bool
     */
    public static function isIPAddressValid($ipAddress)
    {
        return filter_var($ipAddress, FILTER_VALIDATE_IP) ? true : false;
    }
}
