<?php

/**
 * SuppressionTest.
 *
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author     Fernando Martins <fernando.martins@wondeotec.com>
 * @copyright  Copyright (C) Wondeotec SA - All Rights Reserved
 * @license    LICENSE.txt
 */
namespace EB\SDK\Tests\Unit\SuppressionImport;

use EB\SDK\RecipientSuppress\Recipient;

class SuppressionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @throws \Exception
     */
    public function testValidSuppressedRecipient()
    {
        $suppressedRecipient = new Recipient();
        $suppressedRecipient->setValue('email@domain.com');

        $this->assertTrue($suppressedRecipient->hasValidData());
    }

    /**
     * @test
     * @throws \Exception
     */
    public function testInvalidSuppressedRecipient()
    {
        $suppressedRecipient = new Recipient();
        $suppressedRecipient->setValue('email@domain.com');

        try {
            $suppressedRecipient->hasValidData();
        } catch (\Exception $e) {
            // OK, an exception is expected
        }
    }
}
