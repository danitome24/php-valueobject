<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Geography;

use PhpValueObject\Geography\Exception\InvalidLatitudeException;
use PhpValueObject\ValueObject;

class Latitude implements ValueObject
{

    const MAX_LATITUDE = 90;
    const MIN_LATITUDE = -90;

    /**
     * @var float
     */
    private $latitude;

    /**
     * Latitude constructor.
     * @param float $latitude
     * @throws \PhpValueObject\Geography\Exception\InvalidLatitudeException
     */
    private function __construct(float $latitude)
    {
        $this->checkValidLatitude($latitude);
        $this->latitude = $latitude;
    }

    /**
     * Named constructor
     *
     * @param float $latitude
     * @return Latitude
     * @throws \PhpValueObject\Geography\Exception\InvalidLatitudeException
     */
    public static function fromFloat(float $latitude): self
    {
        return new static($latitude);
    }

    /**
     * @return float
     */
    public function latitude(): float
    {
        return $this->latitude;
    }

    /**
     * Check if is a valid latitude
     *
     * @param float $latitude
     * @throws InvalidLatitudeException
     */
    private function checkValidLatitude(float $latitude): void
    {
        if ($latitude > static::MAX_LATITUDE || $latitude < static::MIN_LATITUDE) {
            throw new InvalidLatitudeException("Latitude value $latitude is invalid");
        }
    }

    /**
     * Compare a value object with another one.
     *
     * @param ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->latitude() === $valueObjectToCompare->latitude());
    }
}
