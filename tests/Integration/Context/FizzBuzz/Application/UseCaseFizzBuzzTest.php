<?php

namespace App\Tests\Integration\Context\FizzBuzz\Application;

use App\Context\FizzBuzz\Application\UseCaseFizzBuzz;
use App\Context\FizzBuzz\Infrastructure\Persistence\Repository\DoctrineFizzBuzzRepository;
use App\Tests\Integration\Context\FizzBuzz\Infrastructure\Persistence\Repository\RepositoryTestCase;

final class UseCaseFizzBuzzTest extends RepositoryTestCase
{
    private UseCaseFizzBuzz $sut;

    protected function setUp(): void
    {
        $this->sut = new UseCaseFizzBuzz($this->repository());

        parent::setUp();
    }

    public function testShouldCalculateUseCaseFizzBuzz(): void
    {
        $result = $this->sut->__invoke(30, 67);

        $this->assertEquals(
            'FizzBuzz,31,32,Fizz,34,Buzz,Fizz,37,38,Fizz,Buzz,41,Fizz,43,44,FizzBuzz,46,47,Fizz,49,Buzz,Fizz,52,53,Fizz,Buzz,56,Fizz,58,59,FizzBuzz,61,62,Fizz,64,Buzz,Fizz,67',
            $result
        );
    }

    protected function truncate(): void
    {
        $this->truncateTables(['fizz_buzz']);
    }

    public function repository(): DoctrineFizzBuzzRepository
    {
        return new DoctrineFizzBuzzRepository($this->managerRegistry());
    }
}