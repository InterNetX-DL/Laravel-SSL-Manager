<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * QueryOrder Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class QueryOrder implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'key' => 'key',
        'ins' => 'ins',
        'type' => 'type'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'key' => 'setKey',
        'ins' => 'setIns',
        'type' => 'setType'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'key' => 'getKey',
        'ins' => 'getIns',
        'type' => 'getType'
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
        $this->container['key'] = isset($data['key']) ? $data['key'] : null;
        $this->container['ins'] = isset($data['ins']) ? $data['ins'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
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
     * Gets key
     * @return string
     */
    public function getKey()
    {
        return $this->container['key'];
    }

    /**
     * Sets key
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->container['key'] = $key;

        return $this;
    }

    /**
     * Gets ins
     * @return string[]
     */
    public function getIns()
    {
        return $this->container['ins'];
    }

    /**
     * Sets ins
     * @param string[] $ins
     * @return $this
     */
    public function setIns($ins)
    {
        $this->container['ins'] = $ins;

        return $this;
    }

    /**
     * Gets type
     * @return \Swagger\Client\org.domainrobot.json.model\OrderTypeConstants
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     * @param \Swagger\Client\org.domainrobot.json.model\OrderTypeConstants $type
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

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


