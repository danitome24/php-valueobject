<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Geography;

use PhpValueObject\Geography\Address;
use PHPUnit\Framework\TestCase;
use PhpValueObject\Geography\Exception\InvalidAddressNumberException;

class AddressTest extends TestCase
{
    public function testAddressInstanceIsBuild()
    {
        $street = 'c/pastelon';
        $city = 'Lerico';
        $number = 22;

        $address = Address::build($street, $city, $number);
        $this->assertEquals($street, $address->street());
        $this->assertEquals($city, $address->city());
        $this->assertEquals($number, $address->number());
    }

    public function testNumberIsInvalid()
    {
        $this->expectException(InvalidAddressNumberException::class);
        Address::build('Av. perico', 'San Fiz do Seo', -3);
    }

    /**
     * @dataProvider addresses
     * @param Address $address
     * @param Address $addressToCompare
     * @param bool $isEquals
     */
    public function testEqualsMethod(Address $address, Address $addressToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $address->equals($addressToCompare));
    }

    public function addresses()
    {
        return [
            [Address::build('a', 'b', 22), Address::build('a', 'b', 22), true],
            [Address::build('a', 'b', 22), Address::build('a2', 'b2', 22), false]
        ];
    }
}
