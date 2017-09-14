<?php
/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\S2SConversion;

class ConversionSubmitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function testConversionSubmit()
    {
        $conversionSubmit = $this->getMockBuilder('EB\SDK\S2SConversion\ConversionSubmit')
            ->setConstructorArgs(['advertiser-id', 'key', 'secret'])
            ->getMock();

        $conversionSubmit->expects($this->once())
            ->method('post')
            ->will($this->returnValue(true));

        $conversion = new Conversion(
            'subid',
            'test conversion',
            new Details(1.23, new \DateTime(), 1)
        );

        $this->assertTrue($conversionSubmit->post($conversion));
    }
}
