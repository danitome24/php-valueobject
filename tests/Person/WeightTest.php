<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\Person;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Person\Exception\WeightNotValidException;
use PhpValueObject\Person\Grams;
use PhpValueObject\Person\Kilograms;
use PhpValueObject\Person\Pounds;
use PhpValueObject\Person\Weight;

class WeightTest extends TestCase
{
    public function testPoundsIsBuild()
    {
        $pounds = 4.5;
        $poundsInstance = Pounds::fromPounds($pounds);
        $this->assertEquals($pounds, $poundsInstance->weight());
        $this->assertEquals(Grams::fromGrams(2041.164), $poundsInstance->toGrams());
        $this->assertEquals(Kilograms::fromKg(2.041164), $poundsInstance->toKilograms());
        $this->assertEquals(Pounds::fromPounds($pounds), $poundsInstance->toPounds());
    }

    public function testKilogramsIsBuild()
    {
        $kg = 87.7;
        $kilograms = Kilograms::fromKg($kg);
        $this->assertEquals($kg, $kilograms->weight());
        $this->assertEquals(Grams::fromGrams($kg * 1000), $kilograms->toGrams());
        $this->assertEquals(Pounds::fromPounds(193.34342), $kilograms->toPounds());
        $this->assertEquals(Kilograms::fromKg($kg), $kilograms->toKilograms());
    }

    public function testNotValidKilogramsException()
    {
        $this->expectException(WeightNotValidException::class);
        Kilograms::fromKg(-4.1);
    }

    public function testGramsIsBuild()
    {
        $grams = 87700;
        $grms = Grams::fromGrams($grams);
        $this->assertEquals(Kilograms::fromKg(87.7), $grms->toKilograms());
        $this->assertEquals(Pounds::fromPounds(192.94), $grms->toPounds());
        $this->assertEquals(Grams::fromGrams($grams), $grms->toGrams());
    }

    /**
     * @dataProvider weights
     * @param Weight $weight
     * @param Weight $weightToCompare
     * @param bool $isEquals
     */
    public function testEqualsMethod(Weight $weight, Weight $weightToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $weight->equals($weightToCompare));
    }

    public function weights()
    {
        return [
            [Grams::fromGrams(123), Grams::fromGrams(123), true],
            [Grams::fromGrams(111), Grams::fromGrams(123), false]
        ];
    }
}
