<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * CertificateData Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class CertificateData implements ArrayAccess
{

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'plain' => 'plain',
        'name' => 'name',
        'san' => 'san',
        'history' => 'history',
        'key_size' => 'keySize',
        'country_code' => 'countryCode',
        'challenge_password' => 'challengePassword',
        'state' => 'state',
        'city' => 'city',
        'organization' => 'organization',
        'organization_unit' => 'organizationUnit',
        'email' => 'email',
        'product' => 'product',
        'authentication' => 'authentication',
        'algorithm' => 'algorithm',
        'signature_hash_algorithm' => 'signatureHashAlgorithm',
        'idn' => 'idn'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'plain' => 'setPlain',
        'name' => 'setName',
        'san' => 'setSan',
        'history' => 'setHistory',
        'key_size' => 'setKeySize',
        'country_code' => 'setCountryCode',
        'challenge_password' => 'setChallengePassword',
        'state' => 'setState',
        'city' => 'setCity',
        'organization' => 'setOrganization',
        'organization_unit' => 'setOrganizationUnit',
        'email' => 'setEmail',
        'product' => 'setProduct',
        'authentication' => 'setAuthentication',
        'algorithm' => 'setAlgorithm',
        'signature_hash_algorithm' => 'setSignatureHashAlgorithm',
        'idn' => 'setIdn'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'plain' => 'getPlain',
        'name' => 'getName',
        'san' => 'getSan',
        'history' => 'getHistory',
        'key_size' => 'getKeySize',
        'country_code' => 'getCountryCode',
        'challenge_password' => 'getChallengePassword',
        'state' => 'getState',
        'city' => 'getCity',
        'organization' => 'getOrganization',
        'organization_unit' => 'getOrganizationUnit',
        'email' => 'getEmail',
        'product' => 'getProduct',
        'authentication' => 'getAuthentication',
        'algorithm' => 'getAlgorithm',
        'signature_hash_algorithm' => 'getSignatureHashAlgorithm',
        'idn' => 'getIdn'
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
        $this->container['plain'] = isset($data['plain']) ? $data['plain'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['san'] = isset($data['san']) ? $data['san'] : null;
        $this->container['history'] = isset($data['history']) ? $data['history'] : null;
        $this->container['key_size'] = isset($data['key_size']) ? $data['key_size'] : null;
        $this->container['country_code'] = isset($data['country_code']) ? $data['country_code'] : null;
        $this->container['challenge_password'] = isset($data['challenge_password']) ? $data['challenge_password'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['organization'] = isset($data['organization']) ? $data['organization'] : null;
        $this->container['organization_unit'] = isset($data['organization_unit']) ? $data['organization_unit'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['product'] = isset($data['product']) ? $data['product'] : null;
        $this->container['authentication'] = isset($data['authentication']) ? $data['authentication'] : null;
        $this->container['algorithm'] = isset($data['algorithm']) ? $data['algorithm'] : null;
        $this->container['signature_hash_algorithm'] = isset($data['signature_hash_algorithm']) ? $data['signature_hash_algorithm'] : null;
        $this->container['idn'] = isset($data['idn']) ? $data['idn'] : null;
    }

    /**
     * Gets plain
     * @return string
     */
    public function getPlain()
    {
        return $this->container['plain'];
    }

    /**
     * Sets plain
     * @param string $plain
     * @return $this
     */
    public function setPlain($plain)
    {
        $this->container['plain'] = $plain;

        return $this;
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
     * Gets san
     * @return string[]
     */
    public function getSan()
    {
        return $this->container['san'];
    }

    /**
     * Sets san
     * @param string[] $san
     * @return $this
     */
    public function setSan($san)
    {
        $this->container['san'] = $san;

        return $this;
    }

    /**
     * Gets history
     * @return \Swagger\Client\org.domainrobot.json.model\CertificateHistory[]
     */
    public function getHistory()
    {
        return $this->container['history'];
    }

    /**
     * Sets history
     * @param \Swagger\Client\org.domainrobot.json.model\CertificateHistory[] $history
     * @return $this
     */
    public function setHistory($history)
    {
        $this->container['history'] = $history;

        return $this;
    }

    /**
     * Gets key_size
     * @return int
     */
    public function getKeySize()
    {
        return $this->container['key_size'];
    }

    /**
     * Sets key_size
     * @param int $key_size
     * @return $this
     */
    public function setKeySize($key_size)
    {
        $this->container['key_size'] = $key_size;

        return $this;
    }

    /**
     * Gets country_code
     * @return string
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     * @param string $country_code
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets challenge_password
     * @return string
     */
    public function getChallengePassword()
    {
        return $this->container['challenge_password'];
    }

    /**
     * Sets challenge_password
     * @param string $challenge_password
     * @return $this
     */
    public function setChallengePassword($challenge_password)
    {
        $this->container['challenge_password'] = $challenge_password;

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
     * Gets organization_unit
     * @return string
     */
    public function getOrganizationUnit()
    {
        return $this->container['organization_unit'];
    }

    /**
     * Sets organization_unit
     * @param string $organization_unit
     * @return $this
     */
    public function setOrganizationUnit($organization_unit)
    {
        $this->container['organization_unit'] = $organization_unit;

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
     * Gets product
     * @return \Swagger\Client\org.domainrobot.json.model\SSLProductConstants
     */
    public function getProduct()
    {
        return $this->container['product'];
    }

    /**
     * Sets product
     * @param \Swagger\Client\org.domainrobot.json.model\SSLProductConstants $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->container['product'] = $product;

        return $this;
    }

    /**
     * Gets authentication
     * @return \Swagger\Client\org.domainrobot.json.model\CertAuthentication[]
     */
    public function getAuthentication()
    {
        return $this->container['authentication'];
    }

    /**
     * Sets authentication
     * @param \Swagger\Client\org.domainrobot.json.model\CertAuthentication[] $authentication
     * @return $this
     */
    public function setAuthentication($authentication)
    {
        $this->container['authentication'] = $authentication;

        return $this;
    }

    /**
     * Gets algorithm
     * @return \Swagger\Client\org.domainrobot.json.model\CsrHashAlgorithmConstants
     */
    public function getAlgorithm()
    {
        return $this->container['algorithm'];
    }

    /**
     * Sets algorithm
     * @param \Swagger\Client\org.domainrobot.json.model\CsrHashAlgorithmConstants $algorithm
     * @return $this
     */
    public function setAlgorithm($algorithm)
    {
        $this->container['algorithm'] = $algorithm;

        return $this;
    }

    /**
     * Gets signature_hash_algorithm
     * @return \Swagger\Client\org.domainrobot.json.model\SignatureHashAlgorithmConstants
     */
    public function getSignatureHashAlgorithm()
    {
        return $this->container['signature_hash_algorithm'];
    }

    /**
     * Sets signature_hash_algorithm
     * @param \Swagger\Client\org.domainrobot.json.model\SignatureHashAlgorithmConstants $signature_hash_algorithm
     * @return $this
     */
    public function setSignatureHashAlgorithm($signature_hash_algorithm)
    {
        $this->container['signature_hash_algorithm'] = $signature_hash_algorithm;

        return $this;
    }

    /**
     * Gets idn
     * @return string
     */
    public function getIdn()
    {
        return $this->container['idn'];
    }

    /**
     * Sets idn
     * @param string $idn
     * @return $this
     */
    public function setIdn($idn)
    {
        $this->container['idn'] = $idn;

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


