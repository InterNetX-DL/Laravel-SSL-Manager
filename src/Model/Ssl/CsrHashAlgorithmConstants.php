<?php

namespace Ephenodrom\Model\Ssl;

/**
 * CsrHashAlgorithmConstants Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class CsrHashAlgorithmConstants
{
    /**
     * Possible values of this enum
     */
    const ECC = 'ECC';
    const RSA = 'RSA';
    const DSA = 'DSA';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ECC,
            self::RSA,
            self::DSA,
        ];
    }
}


