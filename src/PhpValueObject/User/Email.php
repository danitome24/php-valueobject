<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\User;

use PhpValueObject\User\Exception\InvalidEmailException;
use PhpValueObject\ValueObject;

final class Email implements ValueObject
{
    /**
     * @var string
     */
    private $email;

    /**
     * Email constructor.
     * @param string $email
     * @throws \PhpValueObject\User\Exception\InvalidEmailException
     */
    private function __construct(string $email)
    {
        $this->changeEmail($email);
    }

    /**
     * @param string $email
     * @return static
     * @throws \PhpValueObject\User\Exception\InvalidEmailException
     */
    public static function build(string $email)
    {
        return new static($email);
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->email() === $valueObjectToCompare->email());
    }

    /**
     * Change email
     *
     * @param string $email
     * @throws InvalidEmailException
     */
    private function changeEmail(string $email)
    {
        $this->checkIsValidEmail($email);
        $this->email = $email;
    }

    /**
     * Check if email is valid
     *
     * @param string $email
     * @throws InvalidEmailException
     */
    private function checkIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException('Email ' . $email . ' is not valid');
        }
    }
}
