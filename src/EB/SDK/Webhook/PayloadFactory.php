<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Webhook;

/**
 * Set of functions to help you on Emailbidding webhook creations
 */
class PayloadFactory
{
    /**
     * Creates a new Emailbidding webhook payload of hard bounce type
     *
     * @param string $recipientEmailAddress
     * @param string $recipientExternalId
     * @param string $listExternalId
     * @param string $ipAddress
     *
     * @return Payload
     */
    public static function createHardBounce(
        $recipientEmailAddress,
        $listExternalId,
        $recipientExternalId = null,
        $ipAddress = '127.0.0.1'
    ) {
        if ($recipientExternalId == null) {
            $recipientExternalId = rand(1, 99999);
        }

        return (new Payload())->setIpAddress($ipAddress)
            ->setAction(Type::HARD_BOUNCE)
            ->setCampaignId(rand(1, 99999))
            ->setListExternalId($listExternalId)
            ->setReason(Type::REASON_SYSTEM_AUTOMATIC)
            ->setRecipientEmailAddress($recipientEmailAddress)
            ->setHash(md5($recipientEmailAddress))
            ->setRecipientExternalId($recipientExternalId)
            ->setTriggerDate(new \DateTime())
            ->setType(Type::HARD_BOUNCE);
    }

    /**
     * Creates a new Emailbidding webhook payload of soft bounce type
     *
     * @param string $recipientEmailAddress
     * @param string $recipientExternalId
     * @param string $listExternalId
     * @param string $ipAddress
     *
     * @return Payload
     */
    public static function createSoftBounce(
        $recipientEmailAddress,
        $listExternalId,
        $recipientExternalId = null,
        $ipAddress = '127.0.0.1'
    ) {
        if ($recipientExternalId == null) {
            $recipientExternalId = rand(1, 99999);
        }

        return (new Payload())->setIpAddress($ipAddress)
            ->setAction(Type::SOFT_BOUNCE)
            ->setCampaignId(rand(1, 99999))
            ->setListExternalId($listExternalId)
            ->setReason(Type::REASON_SYSTEM_AUTOMATIC)
            ->setRecipientEmailAddress($recipientEmailAddress)
            ->setHash(md5($recipientEmailAddress))
            ->setRecipientExternalId($recipientExternalId)
            ->setTriggerDate(new \DateTime())
            ->setType(Type::SOFT_BOUNCE);
    }

    /**
     * Creates a new Emailbidding webhook payload of spam complaint type
     *
     * @param string $recipientEmailAddress
     * @param string $recipientExternalId
     * @param string $listExternalId
     * @param string $ipAddress
     *
     * @return Payload
     */
    public static function createSpamComplaint(
        $recipientEmailAddress,
        $listExternalId,
        $recipientExternalId = null,
        $ipAddress = '127.0.0.1'
    ) {
        if ($recipientExternalId == null) {
            $recipientExternalId = rand(1, 99999);
        }

        return (new Payload())->setIpAddress($ipAddress)
            ->setAction(Type::SPAM_COMPLAINT)
            ->setCampaignId(rand(1, 99999))
            ->setListExternalId($listExternalId)
            ->setReason(Type::REASON_USER_REQUEST)
            ->setRecipientEmailAddress($recipientEmailAddress)
            ->setHash(md5($recipientEmailAddress))
            ->setRecipientExternalId($recipientExternalId)
            ->setTriggerDate(new \DateTime())
            ->setType(Type::SPAM_COMPLAINT);
    }

    /**
     * Creates a new Emailbidding webhook payload of unsubscription type
     *
     * @param string $recipientEmailAddress
     * @param string $recipientExternalId
     * @param string $listExternalId
     * @param string $ipAddress
     *
     * @return Payload
     */
    public static function createUnsubscription(
        $recipientEmailAddress,
        $listExternalId,
        $recipientExternalId = null,
        $ipAddress = '127.0.0.1'
    ) {
        if ($recipientExternalId == null) {
            $recipientExternalId = rand(1, 99999);
        }

        return (new Payload())->setIpAddress($ipAddress)
            ->setAction(Type::UNSUBSCRIPTION)
            ->setCampaignId(rand(1, 99999))
            ->setListExternalId($listExternalId)
            ->setReason(Type::REASON_USER_REQUEST)
            ->setRecipientEmailAddress($recipientEmailAddress)
            ->setHash(md5($recipientEmailAddress))
            ->setRecipientExternalId($recipientExternalId)
            ->setTriggerDate(new \DateTime())
            ->setType(Type::UNSUBSCRIPTION);
    }

    /**
     * Creates a new Emailbidding webhook payload of click type
     *
     * @param string $recipientEmailAddress
     * @param string $recipientExternalId
     * @param string $listExternalId
     * @param string $ipAddress
     *
     * @return Payload
     */
    public static function createClick(
        $recipientEmailAddress,
        $listExternalId,
        $recipientExternalId = null,
        $ipAddress = '127.0.0.1'
    ) {
        if ($recipientExternalId == null) {
            $recipientExternalId = rand(1, 99999);
        }

        return (new Payload())->setIpAddress($ipAddress)
            ->setAction(Type::CLICK)
            ->setCampaignId(rand(1, 99999))
            ->setListExternalId($listExternalId)
            ->setReason(Type::REASON_USER_REQUEST)
            ->setRecipientEmailAddress($recipientEmailAddress)
            ->setHash(md5($recipientEmailAddress))
            ->setRecipientExternalId($recipientExternalId)
            ->setTriggerDate(new \DateTime())
            ->setType(Type::CLICK);
    }

    /**
     * Creates a new Emailbidding webhook payload of open type
     *
     * @param string $recipientEmailAddress
     * @param string $recipientExternalId
     * @param string $listExternalId
     * @param string $ipAddress
     *
     * @return Payload
     */
    public static function createOpen(
        $recipientEmailAddress,
        $listExternalId,
        $recipientExternalId = null,
        $ipAddress = '127.0.0.1'
    ) {
        if ($recipientExternalId == null) {
            $recipientExternalId = rand(1, 99999);
        }

        return (new Payload())->setIpAddress($ipAddress)
            ->setAction(Type::OPEN)
            ->setCampaignId(rand(1, 99999))
            ->setListExternalId($listExternalId)
            ->setReason(Type::REASON_USER_REQUEST)
            ->setRecipientEmailAddress($recipientEmailAddress)
            ->setHash(md5($recipientEmailAddress))
            ->setRecipientExternalId($recipientExternalId)
            ->setTriggerDate(new \DateTime())
            ->setType(Type::OPEN);
    }
}
