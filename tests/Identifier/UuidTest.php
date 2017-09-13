<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Test\Identifier;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Identifier\Uuid;

class UuidTest extends TestCase
{
    public function testUuidIsDifferentEachTime()
    {
        $this->assertNotEquals(Uuid::generate(), Uuid::generate());
        $this->assertNotEquals(Uuid::generate()->id(), Uuid::generate()->id());
    }

}
