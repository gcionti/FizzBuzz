<?php

namespace App\Service;

use App\Entity\FizzBuzz as FizzBuzzEntity;
use App\Entity\FizzBuzzRepository;
use Ramsey\Uuid\Uuid;

final readonly class UseCaseFizzBuzz
{
    public function __construct(private FizzBuzzRepository $fizzBuzzRepository)
    {
    }

    public function __invoke(int $initialNumber, int $finalNumber): string
    {
        $result = FizzBuzz::calculateRange($initialNumber, $finalNumber);
        $fizzBuzz = new FizzBuzzEntity(
            id: Uuid::uuid4(),
            initialNumber: $initialNumber,
            finalNumber: $finalNumber,
            result: $result,
            createdAt: new \DateTime()
        );
        $this->fizzBuzzRepository->save($fizzBuzz);

        return $result;
    }
}