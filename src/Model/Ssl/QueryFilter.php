<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * QueryFilter Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class QueryFilter implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'key' => 'key',
        'value' => 'value',
        'operator' => 'operator',
        'link' => 'link',
        'filters' => 'filters'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'key' => 'setKey',
        'value' => 'setValue',
        'operator' => 'setOperator',
        'link' => 'setLink',
        'filters' => 'setFilters'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'key' => 'getKey',
        'value' => 'getValue',
        'operator' => 'getOperator',
        'link' => 'getLink',
        'filters' => 'getFilters'
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
        $this->container['value'] = isset($data['value']) ? $data['value'] : null;
        $this->container['operator'] = isset($data['operator']) ? $data['operator'] : null;
        $this->container['link'] = isset($data['link']) ? $data['link'] : null;
        $this->container['filters'] = isset($data['filters']) ? $data['filters'] : null;
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
     * Gets value
     * @return string
     */
    public function getValue()
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->container['value'] = $value;

        return $this;
    }

    /**
     * Gets operator
     * @return \Swagger\Client\org.domainrobot.json.model\FilterOperatorConstants
     */
    public function getOperator()
    {
        return $this->container['operator'];
    }

    /**
     * Sets operator
     * @param \Swagger\Client\org.domainrobot.json.model\FilterOperatorConstants $operator
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->container['operator'] = $operator;

        return $this;
    }

    /**
     * Gets link
     * @return \Swagger\Client\org.domainrobot.json.model\FilterLinkConstants
     */
    public function getLink()
    {
        return $this->container['link'];
    }

    /**
     * Sets link
     * @param \Swagger\Client\org.domainrobot.json.model\FilterLinkConstants $link
     * @return $this
     */
    public function setLink($link)
    {
        $this->container['link'] = $link;

        return $this;
    }

    /**
     * Gets filters
     * @return \Swagger\Client\org.domainrobot.json.model\QueryFilter[]
     */
    public function getFilters()
    {
        return $this->container['filters'];
    }

    /**
     * Sets filters
     * @param \Swagger\Client\org.domainrobot.json.model\QueryFilter[] $filters
     * @return $this
     */
    public function setFilters($filters)
    {
        $this->container['filters'] = $filters;

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


