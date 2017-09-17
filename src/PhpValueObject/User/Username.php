<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\User;

use PhpValueObject\User\Exception\InvalidUsernameException;
use PhpValueObject\ValueObject;

final class Username implements ValueObject
{
    private const USERNAME_REGEX = '/^([A-Za-z0-9]{5,31})$/';

    /**
     * @var string
     */
    private $username;

    /**
     * Username constructor.
     * @param string $username
     * @throws \PhpValueObject\User\Exception\InvalidUsernameException
     */
    private function __construct(string $username)
    {
        $this->checkIfIsValid($username);
        $this->username = $username;
    }

    /**
     * Named constructor
     *
     * @param string $username
     * @return Username
     * @throws \PhpValueObject\User\Exception\InvalidUsernameException
     */
    public static function fromString(string $username): Username
    {
        return new self($username);
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return $this->username() === $valueObjectToCompare->username();
    }

    /**
     * Check if username is valid
     *
     * @param $username
     * @throws InvalidUsernameException
     */
    private function checkIfIsValid($username)
    {
        if (!preg_match(self::USERNAME_REGEX, $username)) {
            throw new InvalidUsernameException('Username must contain only letters and numbers anb must be from 5 to 31 length');
        }
    }
}
