<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * CaCertificate Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class CaCertificate implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'ca_type' => 'caType',
        'ca_certificate' => 'caCertificate',
        'created' => 'created',
        'updated' => 'updated'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'ca_type' => 'setCaType',
        'ca_certificate' => 'setCaCertificate',
        'created' => 'setCreated',
        'updated' => 'setUpdated'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'ca_type' => 'getCaType',
        'ca_certificate' => 'getCaCertificate',
        'created' => 'getCreated',
        'updated' => 'getUpdated'
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
        $this->container['ca_type'] = isset($data['ca_type']) ? $data['ca_type'] : null;
        $this->container['ca_certificate'] = isset($data['ca_certificate']) ? $data['ca_certificate'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
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
     * Gets ca_type
     * @return string
     */
    public function getCaType()
    {
        return $this->container['ca_type'];
    }

    /**
     * Sets ca_type
     * @param string $ca_type
     * @return $this
     */
    public function setCaType($ca_type)
    {
        $this->container['ca_type'] = $ca_type;

        return $this;
    }

    /**
     * Gets ca_certificate
     * @return string
     */
    public function getCaCertificate()
    {
        return $this->container['ca_certificate'];
    }

    /**
     * Sets ca_certificate
     * @param string $ca_certificate
     * @return $this
     */
    public function setCaCertificate($ca_certificate)
    {
        $this->container['ca_certificate'] = $ca_certificate;

        return $this;
    }

    /**
     * Gets created
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     * @param \DateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets updated
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     * @param \DateTime $updated
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

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


