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

use EB\SDK\RecipientSubscribe\RecipientSubscribe;

/**
 * Recipient
 */
class RecipientSubscribeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function testRecipientSubscribe()
    {
        $recipientSubscribe = $this->getMockBuilder('EB\SDK\RecipientSubscribe\RecipientSubscribe')
            ->setConstructorArgs(array('key', 'secret'))
            ->getMock();

        $recipientSubscribe->expects($this->once())
            ->method('post')
            ->will($this->returnValue(true));

        $this->assertTrue($recipientSubscribe->post(array(), 'publisher-id', 'list-external-id'));
    }
}
