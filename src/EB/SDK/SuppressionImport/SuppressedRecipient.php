<?php

/**
 * SuppressedRecipient.
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author     Fernando Martins <fernando.martins@wondeotec.com>
 * @copyright  Copyright (C) Wondeotec SA - All Rights Reserved
 * @license    LICENSE.txt
 */
namespace EB\SDK\SuppressionImport;

use EB\SDK\Validators\DataValidator;

/**
 *  EB\SDK\SuppressionImport\SuppressedRecipient
 */
class SuppressedRecipient implements \JsonSerializable
{
    use DataValidator;

    /**
     * @var string A valid email address
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return SuppressedRecipient
     *
     * @throws \Exception
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    /**
     * Validates the recipient data
     *
     * @return bool Returns true if the recipient's data was valid, false otherwise
     *
     * @throws \Exception
     */
    public function hasValidData()
    {
        // Email address or hash are mandatory
        if ($this->getValue() == null ) {
            throw new \Exception('Value is mandatory!');
        }

        return true;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        $jsonRecipient = array();

        if ($this->getValue() != null) {
            $jsonRecipient['value'] = $this->getValue();
        }

        return $jsonRecipient;
    }
}
