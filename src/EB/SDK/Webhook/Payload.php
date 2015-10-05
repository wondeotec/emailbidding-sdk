<?php

/**
 * Payload description
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Webhook;

/**
 * Payload
 */
class Payload
{
    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var int
     */
    protected $campaignId;

    /**
     * @var string
     */
    protected $listExternalId;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var string
     */
    protected $recipientEmailAddress;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var string
     */
    protected $recipientExternalId;

    /**
     * @var \DateTime
     */
    protected $triggerDate;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     *
     * @return Payload
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return Payload
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param int $campaignId
     *
     * @return Payload
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @return string
     */
    public function getListExternalId()
    {
        return $this->listExternalId;
    }

    /**
     * @param string $listExternalId
     *
     * @return Payload
     */
    public function setListExternalId($listExternalId)
    {
        $this->listExternalId = $listExternalId;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return Payload
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getRecipientEmailAddress()
    {
        return $this->recipientEmailAddress;
    }

    /**
     * @param string $recipientEmailAddress
     *
     * @return Payload
     */
    public function setRecipientEmailAddress($recipientEmailAddress)
    {
        $this->recipientEmailAddress = $recipientEmailAddress;
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
     * @return Payload
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getRecipientExternalId()
    {
        return $this->recipientExternalId;
    }

    /**
     * @param string $recipientExternalId
     *
     * @return Payload
     */
    public function setRecipientExternalId($recipientExternalId)
    {
        $this->recipientExternalId = $recipientExternalId;
    }

    /**
     * @return \DateTime
     */
    public function getTriggerDate()
    {
        return $this->triggerDate;
    }

    /**
     * @param \DateTime $triggerDate
     *
     * @return Payload
     */
    public function setTriggerDate(\DateTime $triggerDate)
    {
        $this->triggerDate = $triggerDate;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Payload
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return [
            'ip_address' => $this->getIpAddress(),
            'action'  => $this->getAction(),
            'campaign_id' => $this->getCampaignId(),
            'list_external_id' => $this->getListExternalId(),
            'reason' => $this->getReason(),
            'recipient_email_address' => $this->getRecipientEmailAddress(),
            'hash' => $this->getHash(),
            'recipient_external_id' => $this->getRecipientExternalId(),
            'trigger_date' => $this->getTriggerDate()->format('Y-m-d h:i:s'),
            'type' => $this->getType()
        ];
    }
}
