<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * SslContact Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class SslContact implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'owner' => 'owner',
        'updater' => 'updater',
        'created' => 'created',
        'updated' => 'updated',
        'id' => 'id',
        'first' => 'first',
        'last' => 'last',
        'organization' => 'organization',
        'title' => 'title',
        'address' => 'address',
        'postal_code' => 'postalCode',
        'city' => 'city',
        'country' => 'country',
        'state' => 'state',
        'phone' => 'phone',
        'email' => 'email'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'owner' => 'setOwner',
        'updater' => 'setUpdater',
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'id' => 'setId',
        'first' => 'setFirst',
        'last' => 'setLast',
        'organization' => 'setOrganization',
        'title' => 'setTitle',
        'address' => 'setAddress',
        'postal_code' => 'setPostalCode',
        'city' => 'setCity',
        'country' => 'setCountry',
        'state' => 'setState',
        'phone' => 'setPhone',
        'email' => 'setEmail'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'owner' => 'getOwner',
        'updater' => 'getUpdater',
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'id' => 'getId',
        'first' => 'getFirst',
        'last' => 'getLast',
        'organization' => 'getOrganization',
        'title' => 'getTitle',
        'address' => 'getAddress',
        'postal_code' => 'getPostalCode',
        'city' => 'getCity',
        'country' => 'getCountry',
        'state' => 'getState',
        'phone' => 'getPhone',
        'email' => 'getEmail'
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
        $this->container['owner'] = isset($data['owner']) ? $data['owner'] : null;
        $this->container['updater'] = isset($data['updater']) ? $data['updater'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['first'] = isset($data['first']) ? $data['first'] : null;
        $this->container['last'] = isset($data['last']) ? $data['last'] : null;
        $this->container['organization'] = isset($data['organization']) ? $data['organization'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['postal_code'] = isset($data['postal_code']) ? $data['postal_code'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
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
     * Gets owner
     * @return \Swagger\Client\org.domainrobot.json.model\User
     */
    public function getOwner()
    {
        return $this->container['owner'];
    }

    /**
     * Sets owner
     * @param \Swagger\Client\org.domainrobot.json.model\User $owner
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->container['owner'] = $owner;

        return $this;
    }

    /**
     * Gets updater
     * @return \Swagger\Client\org.domainrobot.json.model\User
     */
    public function getUpdater()
    {
        return $this->container['updater'];
    }

    /**
     * Sets updater
     * @param \Swagger\Client\org.domainrobot.json.model\User $updater
     * @return $this
     */
    public function setUpdater($updater)
    {
        $this->container['updater'] = $updater;

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
     * @param \DateTime $created The create date
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
     * @param \DateTime $updated The updated date
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets id
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets first
     * @return string
     */
    public function getFirst()
    {
        return $this->container['first'];
    }

    /**
     * Sets first
     * @param string $first
     * @return $this
     */
    public function setFirst($first)
    {
        $this->container['first'] = $first;

        return $this;
    }

    /**
     * Gets last
     * @return string
     */
    public function getLast()
    {
        return $this->container['last'];
    }

    /**
     * Sets last
     * @param string $last
     * @return $this
     */
    public function setLast($last)
    {
        $this->container['last'] = $last;

        return $this;
    }

    /**
     * Gets organization
     * @return string
     */
    public function getOrganization()
    {
        return $this->container['organization'];
    }

    /**
     * Sets organization
     * @param string $organization
     * @return $this
     */
    public function setOrganization($organization)
    {
        $this->container['organization'] = $organization;

        return $this;
    }

    /**
     * Gets title
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets address
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets postal_code
     * @return string
     */
    public function getPostalCode()
    {
        return $this->container['postal_code'];
    }

    /**
     * Sets postal_code
     * @param string $postal_code
     * @return $this
     */
    public function setPostalCode($postal_code)
    {
        $this->container['postal_code'] = $postal_code;

        return $this;
    }

    /**
     * Gets city
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets country
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets state
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets phone
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets email
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

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


