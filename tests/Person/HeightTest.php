<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\Person;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Person\Exception\HeightLengthWrongException;
use PhpValueObject\Person\Height;

class HeightTest extends TestCase
{
    public function testHeightIsLessThanMinimumException()
    {
        $this->expectException(HeightLengthWrongException::class);

        $height = Height::build(2);
    }

    public function testHeightIsMoreThanMinimumException()
    {
        $this->expectException(HeightLengthWrongException::class);

        $height = Height::build(25000);
    }

    public function testHeightInstanceValues()
    {
        $height = Height::build(193);
        $this->assertEquals(1.93, $height->inMeters());
        $this->assertEquals(193, $height->inCentimeters());
    }

    /**
     * @dataProvider heights
     * @param Height $height
     * @param Height $heightToCompare
     * @param bool $isEquals
     */
    public function testHeightEqualsMethod(Height $height, Height $heightToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $height->equals($heightToCompare));
    }

    /**
     * @return array
     */
    public function heights(): array
    {
        return [
            [Height::build(190), Height::build(180), false],
            [Height::build(190), Height::build(190), true]
        ];
    }
}
