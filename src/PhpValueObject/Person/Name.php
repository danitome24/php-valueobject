<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Person;

use PhpValueObject\ValueObject;

final class Name implements ValueObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surnames;

    /**
     * Name constructor.
     * @param string $name
     * @param string $surnames
     */
    private function __construct(string $name, ?string $surnames)
    {
        $this->name = $this->cleaStringFromSpecialChars($name);
        if (null !== $surnames) {
            $this->surnames = $this->cleaStringFromSpecialChars($surnames);
        }
    }

    /**
     * Named constructor
     *
     * @param string $name
     * @param null|string $surnames
     * @return static
     */
    public static function build(string $name, ?string $surnames = null)
    {
        return new static($name, $surnames);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function surnames(): ?string
    {
        return $this->surnames;
    }

    /**
     * Compare a value object with another one.
     *
     * @param Name|ValueObject $valueObjectToCompare
     * @return bool
     */
    public function equals(ValueObject $valueObjectToCompare): bool
    {
        return ($this->name() === $valueObjectToCompare->name() &&
            $this->surnames() === $valueObjectToCompare->surnames());
    }

    /**
     * Clean string from special chars
     *
     * @param string $stringToClean
     * @return string
     */
    private function cleaStringFromSpecialChars(string $stringToClean): string
    {
        return preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/', '', $stringToClean);
    }
}
