<?php

namespace App\Context\FizzBuzz\Domain;

use DateTime;
use Ramsey\Uuid\UuidInterface;

final readonly class FizzBuzz
{
    private string $result;

    public function __construct(
        private UuidInterface $id,
        private int $initialNumber,
        private int $finalNumber,
        private Datetime $createdAt,
    ) {
        $this->result = self::calculateRange($initialNumber, $finalNumber);
    }

    public static function calculate(int $number): string
    {
        if ($number % 15 === 0) {
            return 'FizzBuzz';
        }

        if ($number % 3 === 0) {
            return 'Fizz';
        }

        if ($number % 5 === 0) {
            return 'Buzz';
        }

        return (string)$number;
    }

    public static function calculateRange(int $initialNumber, int $finalNumber): string
    {
        $result = [];
        for ($i = $initialNumber; $i <= $finalNumber; $i++) {
            $result[] = self::calculate($i);
        }

        return implode(",", $result);
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function initialNumber(): int
    {
        return $this->initialNumber;
    }

    public function finalNumber(): int
    {
        return $this->finalNumber;
    }

    public function result(): string
    {
        return $this->result;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }
}