<?php

namespace App\Service;

final readonly class FizzBuzz
{
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
}