<?php declare(strict_types=1);

namespace App\ValueObject;

class Name
{
    private string $value;

    public static function from(string $value): self
    {
        return new self(mb_strtolower(trim($value)));
    }

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }
}