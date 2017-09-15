<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\ValueObject;

abstract class Gender implements ValueObject
{
    /**
     * @var string
     */
    private $gender;

    /**
     * Gender constructor.
     * @param string $gender
     */
    protected function __construct(string $gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function gender(): string
    {
        return $this->gender;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->gender() === $valueObjectToCompare->gender());
    }
}
