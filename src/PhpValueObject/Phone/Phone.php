<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\Phone;

use PhpValueObject\Phone\Exception\PhoneLengthNotValidException;

abstract class Phone
{
    const MAX_LENGTH = 10;
    const MIN_LENGTH = 6;

    /**
     * @var int
     */
    protected $number;


    /**
     * @return int
     */
    public function number(): int
    {
        return $this->number;
    }

    /**
     * Check if phone is valid.
     *
     * @param int $number
     * @throws PhoneLengthNotValidException
     */
    protected function changeNumber(int $number): void
    {
        if (strlen($number) < self::MIN_LENGTH || strlen($number) > self::MAX_LENGTH) {
            throw new PhoneLengthNotValidException("CellPhone number length $number not valid");
        }

        $this->number = $number;
    }
}
