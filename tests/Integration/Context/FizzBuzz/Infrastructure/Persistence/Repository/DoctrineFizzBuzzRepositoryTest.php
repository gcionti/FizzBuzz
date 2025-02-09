<?php

namespace App\Tests\Integration\Context\FizzBuzz\Infrastructure\Persistence\Repository;

use App\Context\FizzBuzz\Domain\FizzBuzz;
use App\Context\FizzBuzz\Infrastructure\Persistence\Repository\DoctrineFizzBuzzRepository;
use Ramsey\Uuid\Uuid;

final class DoctrineFizzBuzzRepositoryTest extends RepositoryTestCase
{
    public function testSave(): void
    {
        $fizzBuzz = new FizzBuzz(
            Uuid::fromString('550e8400-e29b-41d4-a716-446655440000'),
            1,
            20,
            new \DateTime
        );

        $this->repository()->save($fizzBuzz);

        $fizzBuzzFound = $this->repository()->ofId($fizzBuzz->id());

        $this->assertEquals($fizzBuzzFound->id(), $fizzBuzz->id());
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