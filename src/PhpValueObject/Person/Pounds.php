<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

final class Pounds extends Weight
{
    /**
     * Named constructor
     *
     * @param float $weight
     * @return static
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public static function fromPounds(float $weight): self
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
        return Kilograms::fromKg($this->weight() * 0.453592);
    }

    /**
     * To pounds
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toPounds(): self
    {
        return new static($this->weight());
    }

    /**
     * To grams
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toGrams(): Grams
    {
        return Grams::fromGrams($this->weight() * 453.592);
    }
}
