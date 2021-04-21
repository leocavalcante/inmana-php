<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\WelcomeException;
use App\ValueObject\Age;
use App\ValueObject\Name;

class WelcomeService
{
    public const SPECIAL_NAME = 'banana';
    public const SPECIAL_AGE = 42;

    /**
     * @throws WelcomeException
     */
    public function welcome(array $params): string
    {
        $name = Name::from($params['name']);
        $age = Age::from($params['age']);

        if ($this->special($name, $age)) {
            return 'You are special';
        }

        if (!$age->underage()) {
            return 'You are ok';
        }

        throw WelcomeException::underage();
    }

    private function special(Name $name, Age $age): bool
    {
        return $name->value() === self::SPECIAL_NAME && $age->value() === self::SPECIAL_AGE;
    }
}