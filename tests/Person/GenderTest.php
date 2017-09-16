<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace Person;

use PHPUnit\Framework\TestCase;
use PhpValueObject\Person\Female;
use PhpValueObject\Person\Gender;
use PhpValueObject\Person\Male;
use PhpValueObject\Person\Neutral;

class GenderTest extends TestCase
{

    public function testGenderInheritanceInstance()
    {
        $this->assertEquals('Male', Male::fromMale()->gender());
        $this->assertEquals('Female', Female::fromFemale()->gender());
        $this->assertEquals('Neutral', Neutral::fromNeutral()->gender());
    }

    /**
     * @dataProvider genders
     * @param Gender $gender
     * @param Gender $genderToCompare
     * @param bool $isEquals
     */
    public function testEqualsMethod(Gender $gender, Gender $genderToCompare, bool $isEquals)
    {
        $this->assertEquals($isEquals, $gender->equals($genderToCompare));
    }

    /**
     * @return array
     */
    public function genders(): array
    {
        return [
            [Male::fromMale(), Male::fromMale(), true],
            [Male::fromMale(), Female::fromFemale(), false]
        ];
    }
}
