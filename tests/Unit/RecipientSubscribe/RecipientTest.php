<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Tests\Unit\RecipientSubscribe;

use EB\SDK\RecipientSubscribe\Recipient;

/**
 * Recipient
 */
class RecipientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function testValidRecipient()
    {
        $recipient = new Recipient();
        $recipient->setEmailAddress('email@domain.com');
        $recipient->setCountry('FR');

        $this->assertTrue($recipient->hasValidData());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testInvalidRecipient()
    {
        $recipient = new Recipient();
        $recipient->setEmailAddress('email@domain.com');

        try {
            $recipient->hasValidData();
        } catch (\Exception $e) {
            // OK, an exception is expected
        }
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testValidAnonymousRecipient()
    {
        $recipient = new Recipient();
        $recipient->setHash(md5('email@domain.com'));
        $recipient->setProvider('domain.com');
        $recipient->setCountry('FR');

        $this->assertTrue($recipient->hasValidData());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testInvalidAnonymousRecipient()
    {
        $recipient = new Recipient();
        $recipient->setHash(md5('email@domain.com'));

        try {
            $recipient->hasValidData();
        } catch (\Exception $e) {
            // OK, an exception is expected
        }
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testUnsubcribedRecipient()
    {
        $recipient = new Recipient();
        $recipient->setEmailAddress('email@domain.com');
        $recipient->setCountry('FR');
        $recipient->setAsUnsubscribed(new \DateTime(), '12.34.56.78');

        $this->assertTrue($recipient->hasValidData());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testComplainedRecipient()
    {
        $recipient = new Recipient();
        $recipient->setEmailAddress('email@domain.com');
        $recipient->setCountry('FR');
        $recipient->setAsComplaint(new \DateTime());

        $this->assertTrue($recipient->hasValidData());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testBounceRecipient()
    {
        $recipient = new Recipient();
        $recipient->setEmailAddress('email@domain.com');
        $recipient->setCountry('FR');
        $recipient->setAsBounce(new \DateTime());

        $this->assertTrue($recipient->hasValidData());
    }
}
