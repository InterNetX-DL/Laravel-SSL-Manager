<?php

namespace Ephenodrom\Model\Ssl;

/**
 * CertificateTransparencyPrivacyConstants Class Doc Comment
 *
 * @category    Class
 * @package     Ephenodrom\Model\Ssl;
 * @author      Daniel Linsenmeier
 * @link        ?
 */
class CertificateTransparencyPrivacyConstants
{
    /**
     * Possible values of this enum
     */
    const REDACTED = 'REDACTED';
    const _PUBLIC = 'PUBLIC';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::REDACTED,
            self::_PUBLIC,
        ];
    }
}


