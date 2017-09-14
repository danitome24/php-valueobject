<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\Person\Exception\HeightLengthWrongException;
use PhpValueObject\ValueObject;

final class Height implements ValueObject
{
    const MAX_HEIGHT = 210;
    const MIN_HEIGHT = 10;

    /**
     * Height in cm
     *
     * @var int
     */
    private $height;

    /**
     * Height constructor.
     * @param int $height
     * @throws \PhpValueObject\Person\Exception\HeightLengthWrongException
     */
    private function __construct(int $height)
    {
        $this->changeHeight($height);
    }

    /**
     * @param int $height
     * @return Height
     * @throws \PhpValueObject\Person\Exception\HeightLengthWrongException
     */
    public static function build(int $height): self
    {
        return new static($height);
    }

    /**
     * Height in centimeters
     *
     * @return int
     */
    public function inCentimeters(): int
    {
        return $this->height;
    }

    /**
     * Height in meters
     *
     * @return float
     */
    public function inMeters(): float
    {
        return $this->height / 100;
    }

    /**
     * Compare a value object with another one.
     *
     * @param self|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->inMeters() === $valueObjectToCompare->inMeters());
    }

    /**
     * Change height and check if is valid before is added
     *
     * @param int $height
     * @throws HeightLengthWrongException
     */
    private function changeHeight(int $height)
    {
        if ($height > self::MAX_HEIGHT || $height < self::MIN_HEIGHT) {
            throw new HeightLengthWrongException();
        }

        $this->height = $height;
    }
}
