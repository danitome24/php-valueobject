<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace User;

use PhpValueObject\User\Exception\InvalidUsernameException;
use PhpValueObject\User\Username;
use PHPUnit\Framework\TestCase;

class UsernameTest extends TestCase
{

    public function testIsInvalidUsername()
    {
        $this->expectException(InvalidUsernameException::class);

        Username::fromString('dtom');
    }

    public function testUserIsValid()
    {
        $usernameString = 'dtome23';
        $username = Username::fromString($usernameString);
        $this->assertEquals($usernameString, $username->username());
    }

    /**
     * @dataProvider usernames
     * @param Username $username
     * @param Username $usernameToTest
     * @param bool $isEquals
     */
    public function testEqualsMethodIsValid(Username $username, Username $usernameToTest, bool $isEquals)
    {
        $this->assertEquals($isEquals, $username->equals($usernameToTest));
    }

    public function usernames()
    {
        return [
            [Username::fromString('dtome'), Username::fromString('dtome'), true],
            [Username::fromString('dfernandez'), Username::fromString('tests'), false]
        ];
    }

    public function testToStringMagicMethod()
    {
        $username = Username::fromString('username');
        $this->assertEquals('username', $username);
    }
}
