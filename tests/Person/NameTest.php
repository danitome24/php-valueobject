<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\Person;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Person\Name;

class NameTest extends TestCase
{

    public function testSpecialCharsAreRemoved()
    {
        $name = 'H00ola´ç`´´Q,.<Ase';
        $lastname = 'To´`me¿¿¿¡¡¡';

        $nameInstance = Name::build($name, $lastname);
        $this->assertEquals('H00olaQ.Ase', $nameInstance->name());
        $this->assertEquals('Tome', $nameInstance->surnames());
    }

    /**
     * @dataProvider names()
     * @param Name $name
     * @param Name $nameToCompare
     * @param bool $isEquals
     */
    public function testEqualsMethod(Name $name, Name $nameToCompare, bool $isEquals)
    {
        $this->assertEquals($name->equals($nameToCompare), $isEquals);
    }

    /**
     * @return array
     */
    public function names(): array
    {
        return [
            [Name::build('Daniel'), Name::build('Daniel'), true],
            [Name::build('Daniel'), Name::build('Daniel', 'Tome'), false]
        ];
    }
}
