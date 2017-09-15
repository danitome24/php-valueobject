<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\User;

use PHPUnit\Framework\TestCase;
use PhpValueObject\User\Email;
use PhpValueObject\User\Exception\InvalidEmailException;

class EmailTest extends TestCase
{
    public function testEmailIsNotValidException()
    {
        $this->expectException(InvalidEmailException::class);
        Email::build('aninvalidEmail.com');
    }

    public function testEmailIsValidInstance()
    {
        $emailText = 'thebestproject@email.com';
        $email = Email::build($emailText);
        $this->assertEquals($emailText, $email->email());
    }

    /**
     * @dataProvider emails
     * @param Email $email
     * @param Email $emailToCompare
     * @param bool $isEquals
     */
    public function testEmailIsEquals(Email $email, Email $emailToCompare, bool $isEquals)
    {
        $this->assertEquals($email->equals($emailToCompare), $isEquals);
    }

    /**
     * @return array
     */
    public function emails(): array
    {
        return [
            [Email::build('thebestproject@email.com'), Email::build('thebestproject@email.com'), true],
            [Email::build('thebestproject@email.com'), Email::build('thebestproject2@email.com'), false]
        ];
    }
}
