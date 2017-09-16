<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\Person\Exception\WeightNotValidException;
use PhpValueObject\ValueObject;

abstract class Weight implements ValueObject
{

    /**
     * Weight in kg
     *
     * @var float
     */
    protected $weight;

    /**
     * Weight constructor.
     * @param float $weight
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    protected function __construct(float $weight)
    {
        $this->weight = $weight;
    }

    /**
     * To Kg
     *
     * @return mixed
     */
    abstract public function toKilograms(): Kilograms;

    /**
     * To pounds
     *
     * @return mixed
     */
    abstract public function toPounds(): Pounds;

    /**
     * To grams
     *
     * @return mixed
     */
    abstract public function toGrams(): Grams;

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->weight() === $valueObjectToCompare->weight());
    }

    /**
     * @return float
     */
    public function weight(): float
    {
        return $this->weight;
    }
}
