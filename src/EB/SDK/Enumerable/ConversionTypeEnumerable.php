<?php
/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Enumerable;

class ConversionTypeEnumerable
{
    const EVENT_TYPE_CLICK = 'click';
    const EVENT_TYPE_OPEN = 'open';
    public static $CONVERSION_TYPES = [self::EVENT_TYPE_CLICK, self::EVENT_TYPE_OPEN];

    /**
     * @param string $conversionType
     * @return bool
     */
    public static function isValidConversionType($conversionType)
    {
        return in_array($conversionType, self::$CONVERSION_TYPES);
    }
}