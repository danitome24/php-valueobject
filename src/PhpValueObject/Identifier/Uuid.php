<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Identifier;

final class Uuid
{
    /**
     * @var string
     */
    private $id;

    /**
     * Uuid constructor.
     */
    private function __construct()
    {
        $this->id = \Ramsey\Uuid\Uuid::uuid4()->toString();
    }

    /**
     * Generate Uuid identifier
     *
     * @return static
     */
    public static function generate()
    {
        return new static();
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
