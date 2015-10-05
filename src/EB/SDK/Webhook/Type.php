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
 * Holds the distinct Emailbidding webhook types
 */
class Type
{
    /**
     * @const string The open Emailbidding webhook
     */
    const OPEN = 'open';

    /**
     * @const string The click Emailbidding webhook
     */
    const CLICK = 'click';

    /**
     * @const string The unsubscription Emailbidding webhook
     */
    const UNSUBSCRIPTION = 'unsubscription';

    /**
     * @const string The spam complaint Emailbidding webhook
     */
    const SPAM_COMPLAINT = 'fbl';

    /**
     * @const string The hard bounce Emailbidding webhook
     */
    const HARD_BOUNCE = 'hardBounce';

    /**
     * @const string The soft bounce Emailbidding webhook
     */
    const SOFT_BOUNCE = 'softBounce';

    /**
     * @var string
     */
    const REASON_USER_REQUEST = 'user_request';

    /**
     * @var string
     */
    const REASON_SYSTEM_AUTOMATIC = 'system';

    /**
     * @var array All Emailbidding webhook types
     */
    protected static $webhookTypes = array(
        self::OPEN,
        self::CLICK,
        self::UNSUBSCRIPTION,
        self::SPAM_COMPLAINT,
        self::HARD_BOUNCE,
        self::SOFT_BOUNCE
    );

    /**
     * @param string $webhookType The webhook type
     *
     * @return bool Returns true if the webhook type is valid, false otherwise
     */
    public static function isValidWebhookType($webhookType)
    {
        return in_array($webhookType, self::$webhookTypes);
    }
}
