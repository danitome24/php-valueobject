<?php
/**
 * This software was built by:
 * Daniel Tomé Fernández <danieltomefer@gmail.com>
 * GitHub: danitome24
 */

namespace PhpValueObject\User\Exception;

use Throwable;

class InvalidUsernameException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
