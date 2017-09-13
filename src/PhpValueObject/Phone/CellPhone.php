<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Phone;

use PhpValueObject\ValueObject;

final class CellPhone extends Phone implements ValueObject
{
    /**
     * Phone constructor.
     * @param int $number
     * @throws \PhpValueObject\Phone\Exception\PhoneLengthNotValidException
     */
    private function __construct(int $number)
    {
        $this->changeNumber(trim($number));
    }

    /**
     * Create Phone instance from form
     *
     * @param int $number
     * @return static
     * @throws \PhpValueObject\Phone\Exception\PhoneLengthNotValidException
     */
    public static function fromInteger(int $number): self
    {
        return new self($number);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->number;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->number() === $valueObjectToCompare->number());
    }
}
