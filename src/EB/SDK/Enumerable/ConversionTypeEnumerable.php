<?php
/**
 * Created by PhpStorm.
 * User: jtorres
 * Date: 9/14/17
 * Time: 4:25 PM
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