<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

final class Male extends Gender
{
    private const NAME = 'Male';

    /**
     * Build Male instance
     *
     * @return static
     */
    public static function fromMale()
    {
        return new static(self::NAME);
    }
}
