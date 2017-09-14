<?php
/**
 * Created by PhpStorm.
 * User: jtorres
 * Date: 9/14/17
 * Time: 10:08 AM
 */

namespace EB\SDK\S2SConversion;

class Conversion implements \JsonSerializable
{
    /**
     * @var string $subId
     */
    private $subId;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var Details $details
     */
    private $details;

    /**
     * Conversion constructor.
     * @param string  $subId
     * @param string  $description
     * @param Details $details
     */
    public function __construct($subId, $description, Details $details)
    {
        $this->subId       = $subId;
        $this->description = $description;
        $this->details     = $details;
    }

    /**
     * @return string
     */
    public function getSubId()
    {
        return $this->subId;
    }

    /**
     * @param string $subId
     * @return Conversion
     */
    public function setSubId($subId)
    {
        $this->subId = $subId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Conversion
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Details
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param Details $details
     * @return Conversion
     */
    public function setDetails($details)
    {
        $this->details = $details;

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
        $jsonConversion = [];

        if ($this->getSubId() != null) {
            $jsonConversion['subid'] = $this->getSubId();
        }

        if ($this->getDescription() != null) {
            $jsonConversion['description'] = $this->getDescription();
        }

        if ($this->getDetails() != null) {
            $jsonConversion['details'] = $this->getDetails();
        }

        return $jsonConversion;
    }
}