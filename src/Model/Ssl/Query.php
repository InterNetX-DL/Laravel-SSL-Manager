<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * Query Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class Query implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'filters' => 'filters',
        'keys' => 'keys',
        'view' => 'view',
        'orders' => 'orders'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'filters' => 'setFilters',
        'keys' => 'setKeys',
        'view' => 'setView',
        'orders' => 'setOrders'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'filters' => 'getFilters',
        'keys' => 'getKeys',
        'view' => 'getView',
        'orders' => 'getOrders'
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
        $this->container['filters'] = isset($data['filters']) ? $data['filters'] : null;
        $this->container['keys'] = isset($data['keys']) ? $data['keys'] : null;
        $this->container['view'] = isset($data['view']) ? $data['view'] : null;
        $this->container['orders'] = isset($data['orders']) ? $data['orders'] : null;
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
     * Gets keys
     * @return string[]
     */
    public function getKeys()
    {
        return $this->container['keys'];
    }

    /**
     * Sets keys
     * @param string[] $keys
     * @return $this
     */
    public function setKeys($keys)
    {
        $this->container['keys'] = $keys;

        return $this;
    }

    /**
     * Gets view
     * @return \Swagger\Client\org.domainrobot.json.model\QueryView
     */
    public function getView()
    {
        return $this->container['view'];
    }

    /**
     * Sets view
     * @param \Swagger\Client\org.domainrobot.json.model\QueryView $view
     * @return $this
     */
    public function setView($view)
    {
        $this->container['view'] = $view;

        return $this;
    }

    /**
     * Gets orders
     * @return \Swagger\Client\org.domainrobot.json.model\QueryOrder[]
     */
    public function getOrders()
    {
        return $this->container['orders'];
    }

    /**
     * Sets orders
     * @param \Swagger\Client\org.domainrobot.json.model\QueryOrder[] $orders
     * @return $this
     */
    public function setOrders($orders)
    {
        $this->container['orders'] = $orders;

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


