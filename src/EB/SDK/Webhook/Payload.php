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
     * @var string The event IP address
     */
    protected $ipAddress;

    /**
     * @var string The action
     */
    protected $action;

    /**
     * @var int The Emailbidding campaign Id where this event relates to
     */
    protected $campaignId;

    /**
     * @var string The recipient list external Id (publisher's database Id)
     */
    protected $listExternalId;

    /**
     * @var string The reason of the event
     */
    protected $reason;

    /**
     * @var string The recipient email address
     */
    protected $recipientEmailAddress;

    /**
     * @var string The recipient email address hash
     */
    protected $hash;

    /**
     * @var string The recipient external Id (Id in the publisher's database)
     */
    protected $recipientExternalId;

    /**
     * @var \DateTime The event date
     */
    protected $triggerDate;

    /**
     * @var string The event type
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

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
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
     * @return Payload
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
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

        return $this;
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

        return $this;
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
