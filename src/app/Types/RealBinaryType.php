<?php

namespace Real\Binary\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * My RealBinary datatype.
 */
class RealBinaryType extends Type
{
    const REALBINARYTYPE = 'realbinary';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        dump($fieldDeclaration);
        return "binary({$column->length})";
        // return the SQL used to create your column type.
        // To create a portable column type, use the $platform.
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return 'test';
        // This is executed when the value is read from the database.
        // Make your conversions here, optionally using the $platform.
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        // This is executed when the value is written to the database.
        // Make your conversions here, optionally using the $platform.
    }

    public function getName()
    {
        return self::REALBINARYTYPE;
    }
}
