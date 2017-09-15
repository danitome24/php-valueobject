<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\Person;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Person\Exception\WeightNotValidException;
use PhpValueObject\Person\Weight;

class WeightTest extends TestCase
{
    public function testWeightNotValidExceptionIsThrown()
    {
        $this->expectException(WeightNotValidException::class);

        Weight::fromKg(2.34);
    }

    public function testWeightIsValidInstance()
    {
        $weightInKg = 90.5;
        $weightInPounds = $weightInKg * 2.2046;
        $weight = Weight::fromKg($weightInKg);
        $this->assertEquals($weightInKg, $weight->inKilograms());
        $this->assertEquals($weightInKg * 1000, $weight->inGrams());
        $this->assertEquals($weightInPounds, $weight->inPounds());
    }

    /**
     * @dataProvider weights
     * @param Weight $weight
     * @param Weight $otherWeight
     * @param bool $isEquals
     */
    public function testEqualsMethod(Weight $weight, Weight $otherWeight, bool $isEquals)
    {
        $this->assertEquals($weight->equals($otherWeight), $isEquals);
    }

    /**
     * @return array
     */
    public function weights(): array
    {
        return [
            [Weight::fromKg(25.98), Weight::fromKg(23.2), false],
            [Weight::fromKg(25.98), Weight::fromKg(25.98), true]
        ];
    }
}
