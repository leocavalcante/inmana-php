<?php declare(strict_types=1);

namespace App\Exception;

use Exception;

class WelcomeException extends Exception
{
    public static function underage(): self
    {
        return new self('You shall not pass');
    }
}