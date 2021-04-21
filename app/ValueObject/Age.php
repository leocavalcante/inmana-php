<?php declare(strict_types=1);

namespace App\ValueObject;

class Age
{
    public const LEGAL_AGE = 18;

    private int $value;

    public static function from(string $value): self
    {
        return new self((int) $value);
    }

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function underage(): bool
    {
        return $this->value < self::LEGAL_AGE;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string) $this->value();
    }
}