<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\User;

use PhpValueObject\ValueObject;

final class Password implements ValueObject
{
    /**
     * @var string
     */
    private $pwd;

    /**
     * Password constructor.
     * @param string $pwd
     */
    private function __construct(string $pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * Named constructor
     *
     * @param string $pwd
     * @return static
     */
    public static function build(string $pwd)
    {
        return new static($pwd);
    }

    /**
     * @return string
     */
    public function pwd(): string
    {
        return $this->pwd;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->pwd() === $valueObjectToCompare->pwd());
    }
}
