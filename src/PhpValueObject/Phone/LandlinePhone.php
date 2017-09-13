<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Phone;

use PhpValueObject\Phone\Exception\InvalidCountryCodeException;
use PhpValueObject\ValueObject;

final class LandlinePhone extends Phone implements ValueObject
{
    /**
     * Available country codes
     *
     * @var array
     */
    private $availableCountryCode = [
        '+34',
        '+376'
    ];

    /**
     * @var int
     */
    private $countryCode;

    /**
     * LandlinePhone constructor.
     * @param int $number
     * @param string $countryCode
     * @throws \PhpValueObject\Phone\Exception\PhoneLengthNotValidException
     * @throws \PhpValueObject\Phone\Exception\InvalidCountryCodeException
     */
    private function __construct(int $number, string $countryCode = '+34')
    {
        $this->changeNumber(trim($number));
        $this->changeCountryCode($countryCode);
    }

    /**
     * Named constructor
     *
     * @param int $number
     * @param string $countryCode
     * @return LandlinePhone
     * @throws \PhpValueObject\Phone\Exception\PhoneLengthNotValidException
     * @throws \PhpValueObject\Phone\Exception\InvalidCountryCodeException
     */
    public static function build(int $number, string $countryCode): self
    {
        return new static($number, $countryCode);
    }

    /**
     * @return string
     */
    public function countryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->countryCode() . $this->number();
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->countryCode() === $valueObjectToCompare->countryCode() &&
            $this->number() === $valueObjectToCompare->number());
    }

    /**
     * @param string $countryCode
     * @throws InvalidCountryCodeException
     */
    private function changeCountryCode(string $countryCode)
    {
        if (!in_array($countryCode, $this->availableCountryCode, true)) {
            throw new InvalidCountryCodeException('Country code ' . $countryCode . ' not valid!');
        }

        $this->countryCode = $countryCode;
    }
}
