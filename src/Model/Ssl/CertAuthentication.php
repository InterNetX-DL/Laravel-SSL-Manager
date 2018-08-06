<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * CertAuthentication Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class CertAuthentication implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'method' => 'method',
        'dns' => 'dns',
        'file_name' => 'fileName',
        'file_content' => 'fileContent',
        'approver_emails' => 'approverEmails',
        'provisioning' => 'provisioning'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'method' => 'setMethod',
        'dns' => 'setDns',
        'file_name' => 'setFileName',
        'file_content' => 'setFileContent',
        'approver_emails' => 'setApproverEmails',
        'provisioning' => 'setProvisioning'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'method' => 'getMethod',
        'dns' => 'getDns',
        'file_name' => 'getFileName',
        'file_content' => 'getFileContent',
        'approver_emails' => 'getApproverEmails',
        'provisioning' => 'getProvisioning'
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
        $this->container['method'] = isset($data['method']) ? $data['method'] : null;
        $this->container['dns'] = isset($data['dns']) ? $data['dns'] : null;
        $this->container['file_name'] = isset($data['file_name']) ? $data['file_name'] : null;
        $this->container['file_content'] = isset($data['file_content']) ? $data['file_content'] : null;
        $this->container['approver_emails'] = isset($data['approver_emails']) ? $data['approver_emails'] : null;
        $this->container['provisioning'] = isset($data['provisioning']) ? $data['provisioning'] : null;
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
     * Gets method
     * @return \Swagger\Client\org.domainrobot.json.model\AuthMethodConstants
     */
    public function getMethod()
    {
        return $this->container['method'];
    }

    /**
     * Sets method
     * @param \Swagger\Client\org.domainrobot.json.model\AuthMethodConstants $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->container['method'] = $method;

        return $this;
    }

    /**
     * Gets dns
     * @return string
     */
    public function getDns()
    {
        return $this->container['dns'];
    }

    /**
     * Sets dns
     * @param string $dns
     * @return $this
     */
    public function setDns($dns)
    {
        $this->container['dns'] = $dns;

        return $this;
    }

    /**
     * Gets file_name
     * @return string
     */
    public function getFileName()
    {
        return $this->container['file_name'];
    }

    /**
     * Sets file_name
     * @param string $file_name
     * @return $this
     */
    public function setFileName($file_name)
    {
        $this->container['file_name'] = $file_name;

        return $this;
    }

    /**
     * Gets file_content
     * @return string
     */
    public function getFileContent()
    {
        return $this->container['file_content'];
    }

    /**
     * Sets file_content
     * @param string $file_content
     * @return $this
     */
    public function setFileContent($file_content)
    {
        $this->container['file_content'] = $file_content;

        return $this;
    }

    /**
     * Gets approver_emails
     * @return string[]
     */
    public function getApproverEmails()
    {
        return $this->container['approver_emails'];
    }

    /**
     * Sets approver_emails
     * @param string[] $approver_emails
     * @return $this
     */
    public function setApproverEmails($approver_emails)
    {
        $this->container['approver_emails'] = $approver_emails;

        return $this;
    }

    /**
     * Gets provisioning
     * @return bool
     */
    public function getProvisioning()
    {
        return $this->container['provisioning'];
    }

    /**
     * Sets provisioning
     * @param bool $provisioning
     * @return $this
     */
    public function setProvisioning($provisioning)
    {
        $this->container['provisioning'] = $provisioning;

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


