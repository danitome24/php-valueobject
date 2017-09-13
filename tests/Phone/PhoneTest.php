<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Phone\CellPhone;
use PhpValueObject\Phone\Exception\InvalidCountryCodeException;
use PhpValueObject\Phone\Exception\PhoneLengthNotValidException;
use PhpValueObject\Phone\LandlinePhone;

class PhoneTest extends TestCase
{

    public function testCountryCodeDoesNotExistsExceptionIsThrown()
    {
        $this->expectException(InvalidCountryCodeException::class);
        LandlinePhone::build(88888888, '234');
    }

    public function testCellPhoneInvalidLengthExceptionIfIsLessThanMinimum()
    {
        $this->expectException(PhoneLengthNotValidException::class);
        CellPhone::fromInteger(2);
    }

    public function testCellPhoneIsValid()
    {
        $cellPhone = CellPhone::fromInteger(666666666);
        $this->assertEquals(666666666, $cellPhone->number());
        $this->assertEquals('666666666', $cellPhone->__toString());
    }

    /**
     * @dataProvider cellPhones
     * @param $cellPhone
     * @param $cellPhoneToCompare
     * @param $isEquals
     */
    public function testCellPhoneIsEqualsToAnotherOneOrNot($cellPhone, $cellPhoneToCompare, $isEquals)
    {
        $this->assertEquals($isEquals, $cellPhone->equals($cellPhoneToCompare));
    }

    public function cellPhones()
    {
        return [
            [CellPhone::fromInteger(666666666), CellPhone::fromInteger(555555555), false],
            [CellPhone::fromInteger(666666666), CellPhone::fromInteger(666666666), true]
        ];
    }


    public function testLandlineIsValid()
    {
        $landline = LandlinePhone::build(666666666, '+34');
        $this->assertEquals(666666666, $landline->number());
        $this->assertEquals('+34', $landline->countryCode());
        $this->assertEquals('+34666666666', $landline->__toString());
    }

    /**
     * @dataProvider landLines
     * @param $cellPhone
     * @param $cellPhoneToCompare
     * @param $isEquals
     */
    public function testLandlineIsEqualsToAnotherOneOrNot($cellPhone, $cellPhoneToCompare, $isEquals)
    {
        $this->assertEquals($isEquals, $cellPhone->equals($cellPhoneToCompare));
    }

    public function landLines()
    {
        return [
            [LandlinePhone::build(666666666, '+34'), LandlinePhone::build(555555555, '+34'), false],
            [LandlinePhone::build(666666666, '+34'), LandlinePhone::build(666666666, '+34'), true],
        ];
    }
}
