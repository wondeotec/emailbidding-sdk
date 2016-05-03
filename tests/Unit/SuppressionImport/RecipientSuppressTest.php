<?php

/**
 * SuppressedRecipientSuppressionTest.
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author     Fernando Martins <fernando.martins@wondeotec.com>
 * @copyright  Copyright (C) Wondeotec SA - All Rights Reserved
 * @license    LICENSE.txt
 */
namespace EB\SDK\Tests\Unit\SuppressionImport;
use EB\SDK\SuppressionImport\Suppression;
use EB\SDK\SuppressionImport\SuppressedRecipientSuppression;

class SuppressedRecipientSuppressionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function testRecipientSubscribeForEmailSuppressionType()
    {
        $suppressedRecipientSuppression = $this->getMockBuilder(
            'EB\SDK\RecipientSuppress\RecipientSuppress'
        )
            ->setConstructorArgs(array('key', 'secret'))
            ->getMock();

        $suppressedRecipientSuppression->expects($this->once())
            ->method('post')
            ->will($this->returnValue(true));

        $this->assertTrue($suppressedRecipientSuppression->post(array(), 'publisher-id', 'list-external-id','email'));
    }
}
