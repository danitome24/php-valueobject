<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Geography;

use PhpValueObject\Geography\Exception\InvalidAddressNumberException;
use PhpValueObject\ValueObject;

final class Address implements ValueObject
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $city;

    /**
     * @var int
     */
    private $number;

    /**
     * Address constructor.
     * @param string $street
     * @param string $city
     * @param int $number
     */
    private function __construct(string $street, string $city, int $number)
    {
        $this->street = $street;
        $this->city = $city;
        $this->changeNumber($number);
    }

    /**
     * @param string $street
     * @param string $city
     * @param int $number
     * @return static
     */
    public static function build(string $street, string $city, int $number)
    {
        return new static($street, $city, $number);
    }

    /**
     * @return string
     */
    public function street(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function city(): string
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function number(): int
    {
        return $this->number;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->street() === $valueObjectToCompare->street()
            && $this->city() === $valueObjectToCompare->city()
            && $this->number() === $valueObjectToCompare->number());
    }

    /**
     * @param int $number
     * @throws \PhpValueObject\Geography\Exception\InvalidAddressNumberException
     */
    private function changeNumber(int $number)
    {
        $this->checkIsValidNumber($number);
        $this->number = $number;
    }

    /**
     * Check if address number is valid
     *
     * @param int $number
     * @throws \PhpValueObject\Geography\Exception\InvalidAddressNumberException
     */
    private function checkIsValidNumber(int $number): void
    {
        if ($number <= 0) {
            throw new InvalidAddressNumberException('Address number ' . $number . ' is not valid');
        }
    }
}
