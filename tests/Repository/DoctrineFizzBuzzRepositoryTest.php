<?php

namespace App\Tests\Repository;

use App\Entity\FizzBuzz;
use App\Repository\DoctrineFizzBuzzRepository;
use Ramsey\Uuid\Uuid;

final class DoctrineFizzBuzzRepositoryTest extends RepositoryTestCase
{
    public function testSave(): void
    {
        $fizzBuzz = new FizzBuzz(
            Uuid::fromString('550e8400-e29b-41d4-a716-446655440000'),
            1,
            20,
            'test',
            new \DateTime
        );

        $this->repository()->save($fizzBuzz);

        $fizzBuzzFound = $this->repository()->ofId($fizzBuzz->id());

        $this->assertEquals($fizzBuzz->id(), $fizzBuzzFound->id());
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