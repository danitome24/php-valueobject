<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Geography;

use PhpValueObject\Geography\Exception\InvalidLongitudeException;
use PhpValueObject\Geography\Longitude;
use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    public function testInvalidLatitude()
    {
        $this->expectException(InvalidLongitudeException::class);

        Longitude::fromFloat(-200.234);
    }

    public function testValidLongitude()
    {
        $floatLongitude = 23.9;
        $longitude = Longitude::fromFloat($floatLongitude);

        $this->assertEquals($floatLongitude, $longitude->longitude());
    }

    /**
     * @dataProvider longitudes
     * @param Longitude $longitude
     * @param Longitude $longitudeToCompare
     * @param bool $isEquals
     */
    public function testAssertEquals(Longitude $longitude, Longitude $longitudeToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $longitude->equals($longitudeToCompare));
    }

    public function longitudes()
    {
        return [
            [Longitude::fromFloat(12), Longitude::fromFloat(-12), false],
            [Longitude::fromFloat(12), Longitude::fromFloat(12), true],
        ];
    }
}
