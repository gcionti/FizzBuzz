<?php

namespace App\Tests\Unit\Context\FizzBuzz\Domain;

use App\Context\FizzBuzz\Domain\FizzBuzz;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    public function testCalculateNumber1(): void
    {
        $this->assertEquals('1', FizzBuzz::calculate(1));
    }

    public function testCalculateReturnsFizzForMultipleOfThree(): void
    {
        $this->assertSame('Fizz', FizzBuzz::calculate(3));
        $this->assertSame('Fizz', FizzBuzz::calculate(6));
        $this->assertSame('Fizz', FizzBuzz::calculate(9));
    }

    public function testCalculateReturnsBuzzForMultipleOfFive(): void
    {
        $this->assertSame('Buzz', FizzBuzz::calculate(5));
        $this->assertSame('Buzz', FizzBuzz::calculate(10));
        $this->assertSame('Buzz', FizzBuzz::calculate(20));
    }

    public function testCalculateMultipleOfThreeAndFive(): void
    {
        $this->assertEquals('FizzBuzz', FizzBuzz::calculate(15));
        $this->assertEquals('FizzBuzz', FizzBuzz::calculate(30));
        $this->assertEquals('FizzBuzz', FizzBuzz::calculate(45));
    }

    public function testCalculateRange(): void
    {
        $this->assertEquals(
            'FizzBuzz,31,32,Fizz,34,Buzz,Fizz,37,38,Fizz,Buzz,41,Fizz,43,44,FizzBuzz,46,47,Fizz,49,Buzz,Fizz,52,53,Fizz,Buzz,56,Fizz,58,59,FizzBuzz,61,62,Fizz,64,Buzz,Fizz,67',
            FizzBuzz::calculateRange(30, 67)
        );
        $this->assertEquals('FizzBuzz', FizzBuzz::calculateRange(15, 15));
        $this->assertEquals('Fizz,Buzz,11,Fizz,13,14,FizzBuzz', FizzBuzz::calculateRange(9, 15));
    }
}