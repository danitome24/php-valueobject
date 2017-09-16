<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Geography;

use PhpValueObject\Geography\PostalCode;
use PHPUnit\Framework\TestCase;

class PostalCodeTest extends TestCase
{
    public function testPostalCodeIsBuilt()
    {
        $pc = 'CE-1234';
        $postalCode = PostalCode::fromCode('CE-1234');
        $this->assertEquals($pc, $postalCode->code());
    }

    /**
     * @dataProvider postalCodes
     * @param PostalCode $postalCode
     * @param PostalCode $postalCodeToCompare
     * @param bool $isEquals
     */
    public function testEqualsMethod(PostalCode $postalCode, PostalCode $postalCodeToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $postalCode->equals($postalCodeToCompare));
    }

    public function postalCodes()
    {
        return [
            [PostalCode::fromCode(1231), PostalCode::fromCode('CE-123'), false],
            [PostalCode::fromCode('CE-123'), PostalCode::fromCode('CE-123'), true]
        ];
    }
}
