<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

final class Female extends Gender
{
    private const NAME = 'Female';

    /**
     * Build Female instance
     *
     * @return static
     */
    public static function fromFemale()
    {
        return new static(self::NAME);
    }
}
