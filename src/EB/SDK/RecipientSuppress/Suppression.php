<?php

/**
 * Suppression.
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
 * EB\SDK\SuppressionImport\Suppression
 */
class Suppression implements \JsonSerializable
{

    const EMAIL_SUPPRESSION_TYPE = 'email';

    /**
     * @var Recipient [] $suppressedRecipients An list of recipients
     */
    protected $suppressedRecipients;

    /**
     * @var string $suppressionType
     */
    protected $suppressionType;

    /**
     * @return mixed
     */
    public function getSuppressionType()
    {
        return $this->suppressionType;
    }

    /**
     * @param mixed $suppressionType
     */
    public function setSuppressionType($suppressionType)
    {
        $this->suppressionType = $suppressionType;
    }

    /**
     * @return Recipient[]
     */
    public function getRecipient()
    {
        return $this->suppressedRecipients;
    }


    /**
     * @param $suppressedRecipients [] $recipients
     *
     * @return Suppression
     */
    public function setRecipients(array $suppressedRecipients)
    {
        $this->suppressedRecipients = $suppressedRecipients;

        return $this;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function hasValidData()
    {
        if($this->suppressionType == self::EMAIL_SUPPRESSION_TYPE)
            return true;
        else
            throw new \Exception('Invalid suppression type');
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *       which is a value of any type other than a resource.
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        if (count($this->getRecipient()) == 0) {
            throw new \Exception('No recipient added!');
        }

        if (count($this->getSuppressionType()) == 0) {
            throw new \Exception('No suppression type added!');
        }

        return ['recipients' => $this->getRecipient(),
                'suppression_type' =>$this->getSuppressionType()];
    }

}