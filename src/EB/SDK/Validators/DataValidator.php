<?php

/**
 * Unauthorized copying or dissemination of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author    Jorge Torres <jorge.torres@wondeotec.com>
 * @copyright Copyright (C) Wondeotec SA - All Rights Reserved
 * @license   LICENSE.txt
 */

namespace EB\SDK\Validators;

use Symfony\Component\Yaml\Yaml;

/**
 * DataValidator
 */
trait DataValidator
{
    /**
     * @var array
     */
    protected $availableGenders;

    /**
     * @var array
     */
    protected $availableCountries;

    /**
     * @var array
     */
    protected $availableLanguages;

    /**
     * @var array
     */
    protected $availableSubscriptionStatus;

    /**
     * @var array
     */
    protected $availableCategories;

    /**
     * DataValidator constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $data = Yaml::parse(file_get_contents(__DIR__ . '/../Resources/data.yml'));

        if (! isset($data['gender'])
            || ! isset($data['country'])
            || ! isset($data['language'])
            || ! isset($data['categories'])
            || ! isset($data['subscription_status'])
        ) {
            throw new \Exception('Issue detected on resources!');
        }

        $this->availableGenders = array_keys($data['gender']);
        $this->availableCountries = array_keys($data['country']);
        $this->availableLanguages = array_keys($data['language']);
        $this->availableCategories = array_keys($data['categories']);
        $this->availableSubscriptionStatus = array_keys($data['subscription_status']);
    }

    /**
     * @param string $emailAddress
     *
     * @return bool
     */
    public function isEmailValid($emailAddress)
    {

        return ! empty($emailAddress) && filter_var($emailAddress, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    /**
     * @param string $hash MD5 hash
     * @return bool
     */
    public function isHashValid($hash)
    {

        return ! empty($hash) && strlen($hash) == 32;
    }

    /**
     * @param string $subscriptionSource
     * @return bool
     */
    public function isSubscriptionSourceValid($subscriptionSource)
    {

        return ! empty($subscriptionSource) && strlen($subscriptionSource) <= 150;
    }

    /**
     * @param string $ipAddress
     *
     * @return bool
     */
    public function isIpAddressValid($ipAddress)
    {

        return filter_var($ipAddress, FILTER_VALIDATE_IP) ? true : false;
    }

    /**
     * @param string $gender
     *
     * @return bool
     */
    public function isGenderValid($gender)
    {

        return in_array($gender, $this->availableGenders);
    }

    /**
     * @param string $countryCode
     *
     * @return bool
     */
    public function isCountryValid($countryCode)
    {

        return ! empty($countryCode) && in_array($countryCode, $this->availableCountries);
    }

    /**
     * @param string $languageCode
     *
     * @return bool
     */
    public function isLanguageValid($languageCode)
    {

        return in_array($languageCode, $this->availableLanguages);
    }

    /**
     * @param array $categoriesCode
     *
     * @return bool
     */
    public function isCategoriesValid(array $categoriesCode)
    {
        foreach ($categoriesCode as $category) {
            if (! in_array($category, $this->availableCategories)) {

                return false;
            }
        }

        return true;
    }

    /**
     * @param string $subscriptionStatus
     *
     * @return bool
     */
    public function isSubscriptionStatusValid($subscriptionStatus)
    {
        return in_array($subscriptionStatus, $this->availableSubscriptionStatus);
    }

    /**
     * @param string $firstName
     * @return bool
     */
    public function isFirstNameValid($firstName)
    {

        return $this->isNameValid($firstName);
    }

    /**
     * @param string $lastName
     * @return bool
     */
    public function isLastNameValid($lastName)
    {

        return $this->isNameValid($lastName);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isNameValid($name)
    {
        $nameLength = strlen($name);

        return ! empty($name) && $nameLength >= 2 && $nameLength <= 64;
    }

    /**
     * @param string $address
     * @return bool
     */
    public function isAddressValid($address)
    {

        return ! empty($address) && strlen($address) <= 150;
    }

    /**
     * @param string $zipCode
     * @return bool
     */
    public function isZipCodeValid($zipCode)
    {

        return ! empty($zipCode) && strlen($zipCode) <= 10;
    }

    /**
     * @param string $phone
     * @return bool
     */
    public function isPhoneValid($phone)
    {

        return ! empty($phone) && strlen($phone) <= 20;
    }

    /**
     * @param string $title
     * @return bool
     */
    public function isTitleValid($title)
    {

        return ! empty($title) && strlen($title) <= 20;
    }
}
