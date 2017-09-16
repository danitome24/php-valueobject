<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\Person\Exception\WeightNotValidException;

final class Kilograms extends Weight
{
    const MIN_KG = 0;
    const MAX_KG = 200;

    /**
     * Kilograms constructor.
     * @param float $weight
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    protected function __construct($weight)
    {
        $this->checkIsValidWeight($weight);
        parent::__construct($weight);
    }

    /**
     * Named constructor
     *
     * @param float $weight
     * @return static
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public static function fromKg(float $weight): self
    {
        return new static($weight);
    }

    /**
     * To Kg
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toKilograms(): self
    {
        return static::fromKg($this->weight());
    }

    /**
     * To pounds
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toPounds(): Pounds
    {
        return Pounds::fromPounds($this->weight() * 2.2046);
    }

    /**
     * To grams
     *
     * @return mixed
     * @throws \PhpValueObject\Person\Exception\WeightNotValidException
     */
    public function toGrams(): Grams
    {
        return Grams::fromGrams($this->weight() * 1000);
    }

    /**
     * @param float $kg
     * @throws WeightNotValidException
     */
    private function checkIsValidWeight(float $kg): void
    {
        if ($kg < self::MIN_KG || $kg > self::MAX_KG) {
            throw new WeightNotValidException('Weight ' . $kg . ' is not valid');
        }
    }
}
