<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Geography;

use PhpValueObject\Geography\Exception\InvalidLatitudeException;
use PhpValueObject\Geography\Latitude;
use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    public function testInvalidLatitude()
    {
        $this->expectException(InvalidLatitudeException::class);

        Latitude::fromFloat(-100.983942);
    }

    public function testValidLatitude()
    {
        $floatLatitude = 23.9;
        $latitude = Latitude::fromFloat($floatLatitude);

        $this->assertEquals($floatLatitude, $latitude->latitude());
    }

    /**
     * @dataProvider latitudes
     * @param Latitude $latitude
     * @param Latitude $latitudeToCompare
     * @param bool $isEquals
     */
    public function testAssertEquals(Latitude $latitude, Latitude $latitudeToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $latitude->equals($latitudeToCompare));
    }

    public function latitudes()
    {
        return [
            [Latitude::fromFloat(12), Latitude::fromFloat(-12), false],
            [Latitude::fromFloat(12), Latitude::fromFloat(12), true],
        ];
    }
}
