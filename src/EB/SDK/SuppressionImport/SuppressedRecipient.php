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
    protected $emailAddress;

    /**
     * @var string The email address hash
     */
    protected $hash;

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     *
     * @return SuppressedRecipient
     *
     * @throws \Exception
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return SuppressedRecipient
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

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
        if ($this->getEmailAddress() == null && $this->getHash() == null) {
            throw new \Exception('Email address or email address hash is mandatory!');
        }

        if ($this->emailAddress != null && ! DataValidator::isEmailValid($this->emailAddress)) {
            throw new \Exception(sprintf('The email address "%s" isn\'t valid!', $this->emailAddress));
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

        if ($this->getEmailAddress() != null) {
            $jsonRecipient['email_address'] = $this->getEmailAddress();
        }

        if ($this->getHash() != null) {
            $jsonRecipient['hash'] = $this->getHash();
        }

        return $jsonRecipient;
    }
}
