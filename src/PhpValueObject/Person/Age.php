<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\Person\Exception\InvalidAgeException;
use PhpValueObject\ValueObject;

final class Age implements ValueObject
{
    private const MIN_AGE = 0;
    private const MAX_AGE = 150;

    /**
     * @var int
     */
    private $age;

    /**
     * Age constructor.
     * @param int $age
     */
    private function __construct(int $age)
    {
        $this->checkIsValidAge($age);
        $this->age = $age;
    }

    /**
     * @param int $age
     * @return static
     */
    public static function from(int $age)
    {
        return new static($age);
    }

    /**
     * @return int
     */
    public function age(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @throws \PhpValueObject\Person\Exception\InvalidAgeException
     */
    private function checkIsValidAge(int $age)
    {
        if ($age < self::MIN_AGE || $age > self::MAX_AGE) {
            throw new InvalidAgeException('Age ' . $age . ' is invalid');
        }
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->age() === $valueObjectToCompare->age());
    }
}
