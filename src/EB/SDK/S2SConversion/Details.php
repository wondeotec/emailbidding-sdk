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

use EB\SDK\Enumerable\ConversionTypeEnumerable;
use EB\SDK\Exception\DataValidationException;

class Details implements \JsonSerializable
{
    /**
     * @var float $revenue
     */
    private $revenue;

    /**
     * @var \DateTime $conversionDate
     */
    private $conversionDate;

    /**
     * @var string $ipAddress
     */
    private $ipAddress;

    /**
     * @var string $conversionType
     */
    private $conversionType;

    /**
     * @var int $linkPosition
     */
    private $linkPosition;

    /**
     * @var int $totalConversions
     */
    private $totalConversions;

    /**
     * Details constructor.
     * @param float     $revenue
     * @param \DateTime $conversionDate
     * @param int       $totalConversions
     */
    public function __construct($revenue, \DateTime $conversionDate, $totalConversions)
    {
        $this->revenue          = $revenue;
        $this->conversionDate   = $conversionDate;
        $this->totalConversions = $totalConversions;
    }

    /**
     * @return float
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * @param float $revenue
     * @return Details
     */
    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getConversionDate()
    {
        return $this->conversionDate;
    }

    /**
     * @param \DateTime $conversionDate
     * @return Details
     */
    public function setConversionDate($conversionDate)
    {
        $this->conversionDate = $conversionDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Details
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getConversionType()
    {
        return $this->conversionType;
    }

    /**
     * @param string $conversionType
     * @return Details
     * @throws DataValidationException
     */
    public function setConversionType($conversionType)
    {
        if (! ConversionTypeEnumerable::isValidConversionType($conversionType)) {
            DataValidationException::throwInvalidConversionTypeException($conversionType);
        }

        $this->conversionType = $conversionType;

        return $this;
    }

    /**
     * @return int
     */
    public function getLinkPosition()
    {
        return $this->linkPosition;
    }

    /**
     * @param int $linkPosition
     * @return Details
     */
    public function setLinkPosition($linkPosition)
    {
        $this->linkPosition = $linkPosition;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalConversions()
    {
        return $this->totalConversions;
    }

    /**
     * @param int $totalConversions
     * @return Details
     */
    public function setTotalConversions($totalConversions)
    {
        $this->totalConversions = $totalConversions;

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        $jsonDetails = [];

        if ($this->getConversionDate() != null) {
            $jsonDetails['conversion_date'] = $this->getConversionDate()->format('Y-m-d');
        }

        if ($this->getRevenue() != null) {
            $jsonDetails['revenue'] = $this->getRevenue();
        }

        if ($this->getTotalConversions() != null) {
            $jsonDetails['total_conversions'] = $this->getTotalConversions();
        }

        if ($this->getIpAddress() != null) {
            $jsonDetails['ip_address'] = $this->getIpAddress();
        }

        if ($this->getConversionType() != null) {
            $jsonDetails['conversion_type'] = $this->getConversionType();
        }

        if ($this->getLinkPosition() != null) {
            $jsonDetails['link_position'] = $this->getLinkPosition();
        }

        return $jsonDetails;
    }
}
