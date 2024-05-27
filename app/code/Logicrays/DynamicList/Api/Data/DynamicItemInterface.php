<?php
namespace Logicrays\DynamicList\Api\Data;

interface DynamicItemInterface
{
    /**#@+
     * Constants defined for keys of  data array
     */
    public const KEY_ID = 'entity_id';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const DOB = 'dob';
    public const GENDER = 'gender';
    public const CITY = 'city';
    public const LANGUAGES = 'languages';

    /**
     * Get Id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get date of birth
     *
     * @return string|null
     */
    public function getDob();

    /**
     * Set date of birth
     *
     * @param string $dob
     * @return $this
     */
    public function setDob($dob);

    /**
     * Get gender
     *
     * @return string|null
     */
    public function getGender();

    /**
     * Set gender
     *
     * @param string $gender
     * @return $this
     */
    public function setGender($gender);

    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * Get languages
     *
     * @return array
     */
    public function getLanguages();

    /**
     * Set languages
     *
     * @param array $languages
     * @return $this
     */
    public function setLanguages($languages);
}
