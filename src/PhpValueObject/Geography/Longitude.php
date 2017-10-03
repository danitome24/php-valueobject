<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Geography;

use PhpValueObject\Geography\Exception\InvalidLongitudeException;
use PhpValueObject\ValueObject;

class Longitude implements ValueObject
{

    const MAX_LONGITUDE = 180;
    const MIN_LONGITUDE = -180;

    /**
     * @var float
     */
    private $longitude;

    /**
     * Latitude constructor.
     * @param float $longitude
     * @throws \PhpValueObject\Geography\Exception\InvalidLongitudeException
     */
    private function __construct(float $longitude)
    {
        $this->checkValidLongitude($longitude);
        $this->longitude = $longitude;
    }

    /**
     * Named constructor
     *
     * @param float $longitude
     * @return static
     * @throws \PhpValueObject\Geography\Exception\InvalidLongitudeException
     */
    public static function fromFloat(float $longitude): self
    {
        return new static($longitude);
    }

    /**
     * @return float
     */
    public function longitude(): float
    {
        return $this->longitude;
    }

    /**
     * Check if is a valid latitude
     *
     * @param float $longitude
     * @throws InvalidLongitudeException
     */
    private function checkValidLongitude(float $longitude): void
    {
        if ($longitude > static::MAX_LONGITUDE || $longitude < static::MIN_LONGITUDE) {
            throw new InvalidLongitudeException("Longitude value $longitude is invalid");
        }
    }

    /**
     * Compare a value object with another one.
     *
     * @param self|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->longitude() === $valueObjectToCompare->longitude());
    }
}
