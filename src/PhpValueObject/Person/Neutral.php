<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

final class Neutral extends Gender
{
    private const NAME = 'Neutral';

    /**
     * Build Neutral instance
     *
     * @return static
     */
    public static function fromNeutral()
    {
        return new static(self::NAME);
    }
}
