<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Person;

use PhpValueObject\Person\Age;
use PHPUnit\Framework\TestCase;
use PhpValueObject\Person\Exception\InvalidAgeException;

class AgeTest extends TestCase
{
    public function testAgeIsValid()
    {
        $this->assertEquals(5, Age::from(5)->age());
    }

    public function testInvalidAgeExceptionIsThrown()
    {
        $this->expectException(InvalidAgeException::class);
        Age::from(-5);
    }

    /**
     * @dataProvider ages
     * @param Age $age
     * @param Age $ageToCompare
     * @param bool $isEquals
     */
    public function testEqualsMethod(Age $age, Age $ageToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $age->equals($ageToCompare));
    }

    public function ages()
    {
        return [
            [Age::from(14), Age::from(14), true],
            [Age::from(12), Age::from(11), false]
        ];
    }
}
