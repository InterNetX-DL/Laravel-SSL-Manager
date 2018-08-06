<?php

namespace Ephenodrom\Model\Ssl;

use \ArrayAccess;

/**
 * Certificate Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class Certificate implements ArrayAccess
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
        'order_id' => 'orderId',
        'admin_contact' => 'adminContact',
        'technical_contact' => 'technicalContact',
        'name' => 'name',
        'approver_email' => 'approverEmail',
        'life_time' => 'lifeTime',
        'software' => 'software',
        'product' => 'product',
        'csr' => 'csr',
        'comment' => 'comment',
        'server' => 'server',
        'serial_number' => 'serialNumber',
        'subject_alternative_names' => 'subjectAlternativeNames',
        'expire' => 'expire',
        'certificate_authority' => 'certificateAuthority',
        'authentication' => 'authentication',
        'certificate_transparency' => 'certificateTransparency',
        'certificate_transparency_privacy' => 'certificateTransparencyPrivacy',
        'domain' => 'domain',
        'firstname' => 'firstname',
        'lastname' => 'lastname',
        'organisation_unit_name' => 'organisationUnitName',
        'has_csr' => 'hasCsr',
        'password' => 'password'
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
        'order_id' => 'setOrderId',
        'admin_contact' => 'setAdminContact',
        'technical_contact' => 'setTechnicalContact',
        'name' => 'setName',
        'approver_email' => 'setApproverEmail',
        'life_time' => 'setLifeTime',
        'software' => 'setSoftware',
        'product' => 'setProduct',
        'csr' => 'setCsr',
        'comment' => 'setComment',
        'server' => 'setServer',
        'serial_number' => 'setSerialNumber',
        'subject_alternative_names' => 'setSubjectAlternativeNames',
        'expire' => 'setExpire',
        'certificate_authority' => 'setCertificateAuthority',
        'authentication' => 'setAuthentication',
        'certificate_transparency' => 'setCertificateTransparency',
        'certificate_transparency_privacy' => 'setCertificateTransparencyPrivacy',
        'domain' => 'setDomain',
        'firstname' => 'setFirstname',
        'lastname' => 'setLastname',
        'organisation_unit_name' => 'setOrganisationUnitName',
        'has_csr' => 'setHasCsr',
        'password' => 'setPassword'
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
        'order_id' => 'getOrderId',
        'admin_contact' => 'getAdminContact',
        'technical_contact' => 'getTechnicalContact',
        'name' => 'getName',
        'approver_email' => 'getApproverEmail',
        'life_time' => 'getLifeTime',
        'software' => 'getSoftware',
        'product' => 'getProduct',
        'csr' => 'getCsr',
        'comment' => 'getComment',
        'server' => 'getServer',
        'serial_number' => 'getSerialNumber',
        'subject_alternative_names' => 'getSubjectAlternativeNames',
        'expire' => 'getExpire',
        'certificate_authority' => 'getCertificateAuthority',
        'authentication' => 'getAuthentication',
        'certificate_transparency' => 'getCertificateTransparency',
        'certificate_transparency_privacy' => 'getCertificateTransparencyPrivacy',
        'domain' => 'getDomain',
        'firstname' => 'getFirstname',
        'lastname' => 'getLastname',
        'organisation_unit_name' => 'getOrganisationUnitName',
        'has_csr' => 'getHasCsr',
        'password' => 'getPassword'
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
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['admin_contact'] = isset($data['admin_contact']) ? $data['admin_contact'] : null;
        $this->container['technical_contact'] = isset($data['technical_contact']) ? $data['technical_contact'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['approver_email'] = isset($data['approver_email']) ? $data['approver_email'] : null;
        $this->container['life_time'] = isset($data['life_time']) ? $data['life_time'] : null;
        $this->container['software'] = isset($data['software']) ? $data['software'] : null;
        $this->container['product'] = isset($data['product']) ? $data['product'] : null;
        $this->container['csr'] = isset($data['csr']) ? $data['csr'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['server'] = isset($data['server']) ? $data['server'] : null;
        $this->container['serial_number'] = isset($data['serial_number']) ? $data['serial_number'] : null;
        $this->container['subject_alternative_names'] = isset($data['subject_alternative_names']) ? $data['subject_alternative_names'] : null;
        $this->container['expire'] = isset($data['expire']) ? $data['expire'] : null;
        $this->container['certificate_authority'] = isset($data['certificate_authority']) ? $data['certificate_authority'] : null;
        $this->container['authentication'] = isset($data['authentication']) ? $data['authentication'] : null;
        $this->container['certificate_transparency'] = isset($data['certificate_transparency']) ? $data['certificate_transparency'] : null;
        $this->container['certificate_transparency_privacy'] = isset($data['certificate_transparency_privacy']) ? $data['certificate_transparency_privacy'] : null;
        $this->container['domain'] = isset($data['domain']) ? $data['domain'] : null;
        $this->container['firstname'] = isset($data['firstname']) ? $data['firstname'] : null;
        $this->container['lastname'] = isset($data['lastname']) ? $data['lastname'] : null;
        $this->container['organisation_unit_name'] = isset($data['organisation_unit_name']) ? $data['organisation_unit_name'] : null;
        $this->container['has_csr'] = isset($data['has_csr']) ? $data['has_csr'] : null;
        $this->container['password'] = isset($data['password']) ? $data['password'] : null;
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
     * Gets admin_contact
     * @return \Swagger\Client\org.domainrobot.json.model\SslContact
     */
    public function getAdminContact()
    {
        return $this->container['admin_contact'];
    }

    /**
     * Sets admin_contact
     * @param \Swagger\Client\org.domainrobot.json.model\SslContact $admin_contact
     * @return $this
     */
    public function setAdminContact($admin_contact)
    {
        $this->container['admin_contact'] = $admin_contact;

        return $this;
    }

    /**
     * Gets technical_contact
     * @return \Swagger\Client\org.domainrobot.json.model\SslContact
     */
    public function getTechnicalContact()
    {
        return $this->container['technical_contact'];
    }

    /**
     * Sets technical_contact
     * @param \Swagger\Client\org.domainrobot.json.model\SslContact $technical_contact
     * @return $this
     */
    public function setTechnicalContact($technical_contact)
    {
        $this->container['technical_contact'] = $technical_contact;

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
     * Gets life_time
     * @return \Swagger\Client\org.domainrobot.json.model\TimePeriod
     */
    public function getLifeTime()
    {
        return $this->container['life_time'];
    }

    /**
     * Sets life_time
     * @param \Swagger\Client\org.domainrobot.json.model\TimePeriod $life_time
     * @return $this
     */
    public function setLifeTime($life_time)
    {
        $this->container['life_time'] = $life_time;

        return $this;
    }

    /**
     * Gets software
     * @return \Swagger\Client\org.domainrobot.json.model\ServerSoftwareTypeConstants
     */
    public function getSoftware()
    {
        return $this->container['software'];
    }

    /**
     * Sets software
     * @param \Swagger\Client\org.domainrobot.json.model\ServerSoftwareTypeConstants $software
     * @return $this
     */
    public function setSoftware($software)
    {
        $this->container['software'] = $software;

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
     * Gets csr
     * @return string
     */
    public function getCsr()
    {
        return $this->container['csr'];
    }

    /**
     * Sets csr
     * @param string $csr
     * @return $this
     */
    public function setCsr($csr)
    {
        $this->container['csr'] = $csr;

        return $this;
    }

    /**
     * Gets comment
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets server
     * @return string
     */
    public function getServer()
    {
        return $this->container['server'];
    }

    /**
     * Sets server
     * @param string $server
     * @return $this
     */
    public function setServer($server)
    {
        $this->container['server'] = $server;

        return $this;
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
     * Gets subject_alternative_names
     * @return \Swagger\Client\org.domainrobot.json.model\SubjectAlternativeName[]
     */
    public function getSubjectAlternativeNames()
    {
        return $this->container['subject_alternative_names'];
    }

    /**
     * Sets subject_alternative_names
     * @param \Swagger\Client\org.domainrobot.json.model\SubjectAlternativeName[] $subject_alternative_names
     * @return $this
     */
    public function setSubjectAlternativeNames($subject_alternative_names)
    {
        $this->container['subject_alternative_names'] = $subject_alternative_names;

        return $this;
    }

    /**
     * Gets expire
     * @return \DateTime
     */
    public function getExpire()
    {
        return $this->container['expire'];
    }

    /**
     * Sets expire
     * @param \DateTime $expire
     * @return $this
     */
    public function setExpire($expire)
    {
        $this->container['expire'] = $expire;

        return $this;
    }

    /**
     * Gets certificate_authority
     * @return \Swagger\Client\org.domainrobot.json.model\CaCertificate[]
     */
    public function getCertificateAuthority()
    {
        return $this->container['certificate_authority'];
    }

    /**
     * Sets certificate_authority
     * @param \Swagger\Client\org.domainrobot.json.model\CaCertificate[] $certificate_authority
     * @return $this
     */
    public function setCertificateAuthority($certificate_authority)
    {
        $this->container['certificate_authority'] = $certificate_authority;

        return $this;
    }

    /**
     * Gets authentication
     * @return \Swagger\Client\org.domainrobot.json.model\CertAuthentication
     */
    public function getAuthentication()
    {
        return $this->container['authentication'];
    }

    /**
     * Sets authentication
     * @param \Swagger\Client\org.domainrobot.json.model\CertAuthentication $authentication
     * @return $this
     */
    public function setAuthentication($authentication)
    {
        $this->container['authentication'] = $authentication;

        return $this;
    }

    /**
     * Gets certificate_transparency
     * @return bool
     */
    public function getCertificateTransparency()
    {
        return $this->container['certificate_transparency'];
    }

    /**
     * Sets certificate_transparency
     * @param bool $certificate_transparency
     * @return $this
     */
    public function setCertificateTransparency($certificate_transparency)
    {
        $this->container['certificate_transparency'] = $certificate_transparency;

        return $this;
    }

    /**
     * Gets certificate_transparency_privacy
     * @return \Swagger\Client\org.domainrobot.json.model\CertificateTransparencyPrivacyConstants
     */
    public function getCertificateTransparencyPrivacy()
    {
        return $this->container['certificate_transparency_privacy'];
    }

    /**
     * Sets certificate_transparency_privacy
     * @param \Swagger\Client\org.domainrobot.json.model\CertificateTransparencyPrivacyConstants $certificate_transparency_privacy
     * @return $this
     */
    public function setCertificateTransparencyPrivacy($certificate_transparency_privacy)
    {
        $this->container['certificate_transparency_privacy'] = $certificate_transparency_privacy;

        return $this;
    }

    /**
     * Gets domain
     * @return string
     */
    public function getDomain()
    {
        return $this->container['domain'];
    }

    /**
     * Sets domain
     * @param string $domain
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->container['domain'] = $domain;

        return $this;
    }

    /**
     * Gets firstname
     * @return string
     */
    public function getFirstname()
    {
        return $this->container['firstname'];
    }

    /**
     * Sets firstname
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->container['firstname'] = $firstname;

        return $this;
    }

    /**
     * Gets lastname
     * @return string
     */
    public function getLastname()
    {
        return $this->container['lastname'];
    }

    /**
     * Sets lastname
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname)
    {
        $this->container['lastname'] = $lastname;

        return $this;
    }

    /**
     * Gets organisation_unit_name
     * @return string
     */
    public function getOrganisationUnitName()
    {
        return $this->container['organisation_unit_name'];
    }

    /**
     * Sets organisation_unit_name
     * @param string $organisation_unit_name
     * @return $this
     */
    public function setOrganisationUnitName($organisation_unit_name)
    {
        $this->container['organisation_unit_name'] = $organisation_unit_name;

        return $this;
    }

    /**
     * Gets has_csr
     * @return bool
     */
    public function getHasCsr()
    {
        return $this->container['has_csr'];
    }

    /**
     * Sets has_csr
     * @param bool $has_csr
     * @return $this
     */
    public function setHasCsr($has_csr)
    {
        $this->container['has_csr'] = $has_csr;

        return $this;
    }

    /**
     * Gets password
     * @return string
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /**
     * Sets password
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->container['password'] = $password;

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


