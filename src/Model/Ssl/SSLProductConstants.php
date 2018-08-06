<?php

namespace Ephenodrom\Model\Ssl;

/**
 * SSLProductConstants Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class SSLProductConstants
{
    /**
     * Possible values of this enum
     */
    const SECURESITE = 'SECURESITE';
    const SECURESITEPRO = 'SECURESITEPRO';
    const SECURESITEEV = 'SECURESITEEV';
    const SECURESITEPROEV = 'SECURESITEPROEV';
    const BASIC_SSL = 'BASIC_SSL';
    const BASIC_SSL_WILDCARD = 'BASIC_SSL_WILDCARD';
    const TRUEBIZID = 'TRUEBIZID';
    const TRUEBIZIDWILDCARD = 'TRUEBIZIDWILDCARD';
    const TRUEBIZIDEV = 'TRUEBIZIDEV';
    const QUICKSSLPREMIUM = 'QUICKSSLPREMIUM';
    const SSL123 = 'SSL123';
    const SSL123_WILDCARD = 'SSL123WILDCARD';
    const SSLWEB = 'SSLWEB';
    const SSLWEBSERVEREV = 'SSLWEBSERVEREV';
    const SSLWEBWILDCARD = 'SSLWEBWILDCARD';
    const THAWTECODESIGNING = 'THAWTECODESIGNING';
    const COMODO_SSL_ESSENTIAL = 'COMODO_SSL_ESSENTIAL';
    const COMODO_SSL_ESSENTIAL_WILDCARD = 'COMODO_SSL_ESSENTIAL_WILDCARD';
    const COMODO_SSL = 'COMODO_SSL';
    const COMODO_SSL_PREMIUM = 'COMODO_SSL_PREMIUM';
    const COMODO_SSL_PREMIUM_WILDCARD = 'COMODO_SSL_PREMIUM_WILDCARD';
    const COMODO_SSL_UCC = 'COMODO_SSL_UCC';
    const COMODO_SSL_EV = 'COMODO_SSL_EV';
    const COMODO_SSL_MD_EV = 'COMODO_SSL_MD_EV';
    const RAPID_SSL = 'RAPID_SSL';
    const RAPID_SSL_WILDCARD = 'RAPID_SSL_WILDCARD';
    const GLOBALSIGN_PERSONALSIGN_1 = 'GLOBALSIGN_PERSONALSIGN_1';
    const GLOBALSIGN_PERSONALSIGN_2 = 'GLOBALSIGN_PERSONALSIGN_2';
    const GLOBALSIGN_PERSONALSIGN_2_PRO = 'GLOBALSIGN_PERSONALSIGN_2_PRO';
    const GLOBALSIGN_PERSONALSIGN_2_DEPT = 'GLOBALSIGN_PERSONALSIGN_2_DEPT';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::SECURESITE,
            self::SECURESITEPRO,
            self::SECURESITEEV,
            self::SECURESITEPROEV,
            self::BASIC_SSL,
            self::BASIC_SSL_WILDCARD,
            self::TRUEBIZID,
            self::TRUEBIZIDWILDCARD,
            self::TRUEBIZIDEV,
            self::QUICKSSLPREMIUM,
            self::SSL123,
            self::SSL123_WILDCARD,
            self::SSLWEB,
            self::SSLWEBSERVEREV,
            self::SSLWEBWILDCARD,
            self::THAWTECODESIGNING,
            self::COMODO_SSL_ESSENTIAL,
            self::COMODO_SSL_ESSENTIAL_WILDCARD,
            self::COMODO_SSL,
            self::COMODO_SSL_PREMIUM,
            self::COMODO_SSL_PREMIUM_WILDCARD,
            self::COMODO_SSL_UCC,
            self::COMODO_SSL_EV,
            self::COMODO_SSL_MD_EV,
            self::RAPID_SSL,
            self::RAPID_SSL_WILDCARD,
            self::GLOBALSIGN_PERSONALSIGN_1,
            self::GLOBALSIGN_PERSONALSIGN_2,
            self::GLOBALSIGN_PERSONALSIGN_2_PRO,
            self::GLOBALSIGN_PERSONALSIGN_2_DEPT,
        ];
    }
}


