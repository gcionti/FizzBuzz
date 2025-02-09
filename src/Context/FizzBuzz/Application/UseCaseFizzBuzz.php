<?php

namespace App\Context\FizzBuzz\Application;

use App\Context\FizzBuzz\Domain\FizzBuzz;
use App\Context\FizzBuzz\Domain\FizzBuzzRepository;
use Ramsey\Uuid\Uuid;

final readonly class UseCaseFizzBuzz
{
    public function __construct(private FizzBuzzRepository $fizzBuzzRepository)
    {
    }

    public function __invoke(int $initialNumber, int $finalNumber): string
    {
        $fizzBuzz = new FizzBuzz(
            id: Uuid::uuid4(),
            initialNumber: $initialNumber,
            finalNumber: $finalNumber,
            createdAt: new \DateTime()
        );
        $this->fizzBuzzRepository->save($fizzBuzz);

        return $fizzBuzz->result();
    }
}