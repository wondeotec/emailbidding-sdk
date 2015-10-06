<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\RecipientSubscribe;

use EB\SDK\Validators\DataValidator;

/**
 * Recipient
 */
class Recipient implements \JsonSerializable
{
    use DataValidator;

    /**
     * @var string A valid email address
     */
    protected $emailAddress;

    /**
     * @var string The email address hash
     */
    protected $hash;

    /**
     * @var string The email service provider (if your email is email@domain.com, then the provider is domain.com)
     */
    protected $provider;

    /**
     * @var string The recipient identification on your system
     */
    protected $externalId;

    /**
     * @var string The site URL that recipient was subscribed
     */
    protected $subscriptionSource;

    /**
     * @var string A valid IPV6 address
     */
    protected $ipAddress;

    /**
     * @var \DateTime The recipient subscription date
     */
    protected $subscriptionDate;

    /**
     * @var string The ISO 3166-2 format (e.g: PT, ES, etc)
     */
    protected $country;

    /**
     * @var string The contact gender (Allowed values: "M", "F", "NA")
     */
    protected $gender;

    /**
     * @var string The recipient first name
     */
    protected $firstName;

    /**
     * @var string The recipient last name
     */
    protected $lastName;

    /**
     * @var \DateTime The recipient birth date
     */
    protected $birthDate;

    /**
     * @var string The recipient address
     */
    protected $address;

    /**
     * @var string The recipient zip code
     */
    protected $zipCode;

    /**
     * @var string The first recipient phone
     */
    protected $phone1;

    /**
     * @var string The second recipient phone
     */
    protected $phone2;

    /**
     * @var string The recipient title in the format that you want (ex.: "Mr.", "Mrs.", "Miss", etc)
     */
    protected $title;

    /**
     * @var \DateTime The recipient last activity date
     */
    protected $lastActivityDate;

    /**
     * @var string The recipient subscription date
     */
    protected $subscriptionStatus;

    /**
     * @var string The recipient unsubscription IP address
     */
    protected $unsubscriptionIp;

    /**
     * @var \DateTime The recipient unsubscription date
     */
    protected $unsubscriptionDate;

    /**
     * @var bool The recipient complaint status
     */
    protected $complaint;

    /**
     * @var \DateTime The complaint date
     */
    protected $complaintDate;

    /**
     * @var bool The recipient bounce status
     */
    protected $bounce;

    /**
     * @var \DateTime The bounce date
     */
    protected $bounceDate;

    /**
     * @var string The recipient language (Allowed ISO 639x, ex.: en-US, fr-CA, etc)
     */
    protected $language;

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     *
     * @return Recipient
     *
     * @throws \Exception
     */
    public function setEmailAddress($emailAddress)
    {
        if (! DataValidator::isEmailValid($emailAddress)) {
            throw new \Exception(sprintf('The email address "%s" isn\'t valid!', $emailAddress));
        }

        $this->emailAddress = $emailAddress;

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
     * @return Recipient
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     *
     * @return Recipient
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     *
     * @return Recipient
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionSource()
    {
        return $this->subscriptionSource;
    }

    /**
     * @param string $subscriptionSource
     *
     * @return Recipient
     */
    public function setSubscriptionSource($subscriptionSource)
    {
        $this->subscriptionSource = $subscriptionSource;

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
     *
     * @return Recipient
     *
     * @throws \Exception
     */
    public function setIpAddress($ipAddress)
    {
        if (! DataValidator::isIPAddressValid($ipAddress)) {
            throw new \Exception(sprintf('The IP address "%" is not valid!', $ipAddress));
        }

        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSubscriptionDate()
    {
        return $this->subscriptionDate;
    }

    /**
     * @param \DateTime $subscriptionDate
     *
     * @return Recipient
     */
    public function setSubscriptionDate($subscriptionDate)
    {
        $this->subscriptionDate = $subscriptionDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return Recipient
     *
     * @throws \Exception
     */
    public function setCountry($country)
    {
        if (! $this->isValidCountry($country)) {
            throw new \Exception('The country code "%s" isn\'t valid!');
        }

        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     *
     * @return Recipient
     *
     * @throws \Exception
     */
    public function setGender($gender)
    {
        if ($this->isValidGender($gender)) {
            throw new \Exception(sprintf('The gender "%s" is not valid!', $gender));
        }

        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Recipient
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Recipient
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     *
     * @return Recipient
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Recipient
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return Recipient
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * @param string $phone1
     *
     * @return Recipient
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @param string $phone2
     *
     * @return Recipient
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Recipient
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastActivityDate()
    {
        return $this->lastActivityDate;
    }

    /**
     * @param \DateTime $lastActivityDate
     *
     * @return Recipient
     */
    public function setLastActivityDate($lastActivityDate)
    {
        $this->lastActivityDate = $lastActivityDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }

    /**
     * @param string $subscriptionStatus
     *
     * @return Recipient
     */
    public function setSubscriptionStatus($subscriptionStatus)
    {
        $this->subscriptionStatus = $subscriptionStatus;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnsubscriptionIp()
    {
        return $this->unsubscriptionIp;
    }

    /**
     * @param string $unsubscriptionIp
     *
     * @return Recipient
     *
     * @throws \Exception
     */
    public function setUnsubscriptionIp($unsubscriptionIp)
    {

        if (! DataValidator::isIPAddressValid($unsubscriptionIp)) {
            throw new \Exception(sprintf('The IP address "%" is not valid!', $unsubscriptionIp));
        }

        $this->unsubscriptionIp = $unsubscriptionIp;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUnsubscriptionDate()
    {
        return $this->unsubscriptionDate;
    }

    /**
     * @param \DateTime $unsubscriptionDate
     *
     * @return Recipient
     */
    public function setUnsubscriptionDate($unsubscriptionDate)
    {
        $this->unsubscriptionDate = $unsubscriptionDate;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isComplaint()
    {
        return $this->complaint;
    }

    /**
     * @param boolean $complaint
     *
     * @return Recipient
     */
    public function setComplaint($complaint)
    {
        $this->complaint = $complaint;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getComplaintDate()
    {
        return $this->complaintDate;
    }

    /**
     * @param \DateTime $complaintDate
     *
     * @return Recipient
     */
    public function setComplaintDate($complaintDate)
    {
        $this->complaintDate = $complaintDate;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isBounce()
    {
        return $this->bounce;
    }

    /**
     * @param boolean $bounce
     *
     * @return Recipient
     */
    public function setBounce($bounce)
    {
        $this->bounce = $bounce;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBounceDate()
    {
        return $this->bounceDate;
    }

    /**
     * @param \DateTime $bounceDate
     *
     * @return Recipient
     */
    public function setBounceDate($bounceDate)
    {
        $this->bounceDate = $bounceDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return Recipient
     *
     * @throws \Exception
     */
    public function setLanguage($language)
    {
        if (! $this->isValidLanguage($language)) {
            throw new \Exception('The language code "%s" isn\'t valid!');
        }

        $this->language = $language;

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
        $jsonRecipient = array(
            'email_address' => $this->getEmailAddress(),
            'country' => $this->getCountry()
        );

        if ($this->getHash() != null) {
            $jsonRecipient['hash'] = $this->getHash();
        }

        if ($this->getProvider() != null) {
            $jsonRecipient['provider'] = $this->getProvider();
        }

        if ($this->getExternalId() != null) {
            $jsonRecipient['external_id'] = $this->getExternalId();
        }

        if ($this->getIpAddress() != null) {
            $jsonRecipient['ip_address'] = $this->getIpAddress();
        }

        if ($this->getSubscriptionSource() != null) {
            $jsonRecipient['subscription_source'] = $this->getSubscriptionSource();
        }

        if ($this->getSubscriptionDate() != null) {
            $jsonRecipient['subscription_date'] = $this->getSubscriptionDate();
        }

        if ($this->getGender() != null) {
            $jsonRecipient['gender'] = $this->getGender();
        }

        if ($this->getFirstName() != null) {
            $jsonRecipient['first_name'] = $this->getFirstName();
        }

        if ($this->getLanguage() != null) {
            $jsonRecipient['last_name'] = $this->getLastName();
        }

        if ($this->getBirthDate() != null) {
            $jsonRecipient['birthdate'] = $this->getBirthDate();
        }

        if ($this->getAddress() != null) {
            $jsonRecipient['address'] = $this->getAddress();
        }

        if ($this->getZipCode() != null) {
            $jsonRecipient['zipcode'] = $this->getZipCode();
        }

        if ($this->getPhone1() != null) {
            $jsonRecipient['phone1'] = $this->getPhone1();
        }

        if ($this->getPhone2() != null) {
            $jsonRecipient['phone2'] = $this->getPhone2();
        }

        if ($this->getTitle() != null) {
            $jsonRecipient['title'] = $this->getTitle();
        }

        if ($this->getLastActivityDate() != null) {
            $jsonRecipient['last_activity_date'] = $this->getLastActivityDate();
        }

        if ($this->getSubscriptionStatus() != null) {
            $jsonRecipient['subscription_status'] = $this->getSubscriptionStatus();
        }

        if ($this->getUnsubscriptionIp() != null) {
            $jsonRecipient['unsubscription_ip'] = $this->getUnsubscriptionIp();
        }

        if ($this->getUnsubscriptionDate() != null) {
            $jsonRecipient['unsubscription_date'] = $this->getUnsubscriptionDate();
        }

        if ($this->getComplaintDate() != null) {
            $jsonRecipient['complaint_date'] = $this->getComplaintDate();
        }

        if ($this->getBounceDate() != null) {
            $jsonRecipient['bounce_date'] = $this->getBounceDate();
        }

        if ($this->getLanguage() != null) {
            $jsonRecipient['language'] = $this->getLanguage();
        }

        return $jsonRecipient;
    }
}
