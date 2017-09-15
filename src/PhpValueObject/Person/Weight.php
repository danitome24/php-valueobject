<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\Person\Exception\WeightNotValidException;
use PhpValueObject\ValueObject;

final class Weight implements ValueObject
{
    const MIN_KG = 10;
    const MAX_KG = 200;

    /**
     * Weight in kg
     *
     * @var float
     */
    private $weight;

    /**
     * Weight constructor.
     * @param float $weight
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    private function __construct(float $weight)
    {
        $this->changeWeight($weight);
    }

    /**
     * Named constructor
     *
     * @param float $weight
     * @return Weight
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public static function fromKg(float $weight): self
    {
        return new static($weight);
    }

    /**
     * @return float
     */
    public function inKilograms(): float
    {
        return $this->weight;
    }

    /**
     * @return float
     */
    public function inGrams(): float
    {
        return $this->weight * 1000;
    }

    /**
     * @return float
     */
    public function inPounds(): float
    {
        return $this->weight * 2.2046;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->inKilograms() === $valueObjectToCompare->inKilograms());
    }

    /**
     * @param float $kg
     * @throws WeightNotValidException
     */
    private function changeWeight(float $kg)
    {
        if ($kg < self::MIN_KG || $kg > self::MAX_KG) {
            throw new WeightNotValidException('Weight ' . $kg . ' is not valid');
        }

        $this->weight = $kg;
    }
}
