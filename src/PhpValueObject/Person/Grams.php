<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

final class Grams extends Weight
{
    /**
     * Named constructor
     *
     * @param float $weight
     * @return static
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public static function fromGrams(float $weight)
    {
        return new static($weight);
    }

    /**
     * To Kg
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toKilograms(): Kilograms
    {
        return Kilograms::fromKg($this->weight() / 1000);
    }

    /**
     * To pounds
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toPounds(): Pounds
    {
        return Pounds::fromPounds($this->weight() * 0.0022);
    }

    /**
     * To grams
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toGrams(): self
    {
        return new static($this->weight());
    }
}
