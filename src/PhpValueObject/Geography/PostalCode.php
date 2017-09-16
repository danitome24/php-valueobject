<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Geography;

use PhpValueObject\ValueObject;

final class PostalCode implements ValueObject
{
    /**
     * @var string
     */
    private $code;

    /**
     * PostalCode constructor.
     * @param string $code
     */
    private function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param string $code
     * @return static
     */
    public static function fromCode(string $code)
    {
        return new static($code);
    }

    /**
     * @return string
     */
    public function code(): string
    {
        return $this->code;
    }

    /**
     * Compare a value object with another one.
     *
     * @param static|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->code() === $valueObjectToCompare->code());
    }
}
