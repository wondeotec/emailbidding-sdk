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
     * DataValidator constructor.
     */
    public function __construct()
    {
        $data = Yaml::parse(file_get_contents(__DIR__ . '../Resources/data.yml'));

        if (! isset($data['gender']) || ! isset($data['country']) || ! isset($data['language'])) {
            throw new \Exception('Issue detected on resources!');
        }

        $this->availableGenders = $data['gender'];
        $this->availableCountries = $data['country'];
        $this->availableLanguages = $data['language'];
    }

    /**
     * @param $emailAddress
     *
     * @return bool
     */
    public static function isEmailValid($emailAddress)
    {
        return filter_var($emailAddress, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    /**
     * @param $ipAddress
     *
     * @return bool
     */
    public static function isIPAddressValid($ipAddress)
    {
        return filter_var($ipAddress, FILTER_VALIDATE_IP) ? true : false;
    }

    /**
     * @param string $gender
     *
     * @return bool
     */
    public function isValidGender($gender)
    {
        return in_array($gender, $this->availableGenders);
    }

    /**
     * @param string $countryCode
     *
     * @return bool
     */
    public function isValidCountry($countryCode)
    {
        return in_array($countryCode, $this->availableCountries);
    }

    /**
     * @param string $languageCode
     *
     * @return bool
     */
    public function isValidLanguage($languageCode)
    {
        return in_array($languageCode, $this->availableLanguages);
    }
}
