<?php
namespace Logicrays\DynamicList\Model;

use Logicrays\DynamicList\Api\Data\DynamicItemInterface;

class DynamicItem extends \Magento\Framework\Model\AbstractModel implements DynamicItemInterface
{
    public const CACHE_TAG = 'logicrays_dynamiclist_dynamic_item';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'dynamic_item';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Logicrays\DynamicList\Model\ResourceModel\DynamicItem::class);
    }

    /**
     * Return a unique id for the model.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve Id data wrapper
     *
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::KEY_ID);
    }

    /**
     * Retrieve name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_getData(self::EMAIL);
    }

    /**
     * Set email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Retrieve date of birth
     *
     * @return string
     */
    public function getDob()
    {
        return $this->_getData(self::DOB);
    }

    /**
     * Set date of birth
     *
     * @param string $dob
     * @return $this
     */
    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * Retrieve gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->_getData(self::GENDER);
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return $this
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }

    /**
     * Retrieve city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->_getData(self::CITY);
    }

    /**
     * Set city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Retrieve languages
     *
     * @return array
     */
    public function getLanguages()
    {
        return $this->_getData(self::LANGUAGES);
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return $this
     */
    public function setLanguages($languages)
    {
        return $this->setData(self::LANGUAGES, $languages);
    }
}
