<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * CertificateHistory Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class CertificateHistory implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'serial_number' => 'serialNumber',
        'revoked' => 'revoked'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'serial_number' => 'setSerialNumber',
        'revoked' => 'setRevoked'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'serial_number' => 'getSerialNumber',
        'revoked' => 'getRevoked'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    public $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['serial_number'] = isset($data['serial_number']) ? $data['serial_number'] : null;
        $this->container['revoked'] = isset($data['revoked']) ? $data['revoked'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets serial_number
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->container['serial_number'];
    }

    /**
     * Sets serial_number
     * @param string $serial_number
     * @return $this
     */
    public function setSerialNumber($serial_number)
    {
        $this->container['serial_number'] = $serial_number;

        return $this;
    }

    /**
     * Gets revoked
     * @return \DateTime
     */
    public function getRevoked()
    {
        return $this->container['revoked'];
    }

    /**
     * Sets revoked
     * @param \DateTime $revoked
     * @return $this
     */
    public function setRevoked($revoked)
    {
        $this->container['revoked'] = $revoked;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function toJson()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode($this->container, JSON_PRETTY_PRINT);
        }
        return json_encode($this->container);
    }
}


