<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * SubjectAlternativeName Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class SubjectAlternativeName implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'approver_email' => 'approverEmail',
        'order_id' => 'orderId'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'approver_email' => 'setApproverEmail',
        'order_id' => 'setOrderId'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'approver_email' => 'getApproverEmail',
        'order_id' => 'getOrderId'
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['approver_email'] = isset($data['approver_email']) ? $data['approver_email'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
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
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets approver_email
     * @return string
     */
    public function getApproverEmail()
    {
        return $this->container['approver_email'];
    }

    /**
     * Sets approver_email
     * @param string $approver_email
     * @return $this
     */
    public function setApproverEmail($approver_email)
    {
        $this->container['approver_email'] = $approver_email;

        return $this;
    }

    /**
     * Gets order_id
     * @return string
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     * @param string $order_id
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->container['order_id'] = $order_id;

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


