<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\User;

use PHPUnit\Framework\TestCase;
use PhpValueObject\User\Password;

class PasswordTest extends TestCase
{

    public function testPasswordIsValid()
    {
        $passwd = 'somepassword';
        $pwd = Password::build($passwd);
        $this->assertEquals($passwd, $pwd->pwd());
    }

    /**
     * @dataProvider passwords
     * @param Password $pwd
     * @param Password $pwdToCompare
     * @param bool $isEquals
     */
    public function testPasswordIsEqualsMethod(Password $pwd, Password $pwdToCompare, bool $isEquals)
    {
        $this->assertEquals($pwd->equals($pwdToCompare), $isEquals);
    }

    public function passwords()
    {
        return [
            [Password::build('somepwd'), Password::build('somepwd'), true],
            [Password::build('somepwd'), Password::build('somepwddif'), false]
        ];
    }
}
