<?php

namespace App\Context\FizzBuzz\Infrastructure\Persistence\Repository;

use App\Context\FizzBuzz\Domain\FizzBuzz;
use App\Context\FizzBuzz\Domain\FizzBuzzRepository;
use App\Context\FizzBuzz\Infrastructure\Persistence\Entity\FizzBuzz as FizzBuzzEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

final class DoctrineFizzBuzzRepository extends ServiceEntityRepository implements FizzBuzzRepository
{
    private ObjectManager $em;

    public function __construct(ManagerRegistry $registry)
    {
        $this->em = $registry->getManager();

        parent::__construct($registry, FizzBuzzEntity::class);
    }

    public function save(FizzBuzz $fizzBuzz): void
    {
        $fizzBuzzEntity = new FizzBuzzEntity(
            $fizzBuzz->id(),
            $fizzBuzz->initialNumber(),
            $fizzBuzz->finalNumber(),
            $fizzBuzz->result(),
            $fizzBuzz->createdAt()
        );

        $this->em->persist($fizzBuzzEntity);
        $this->em->flush();
    }

    public function ofId(string $id): ?FizzBuzz
    {
        $fizzBuzzEntity = $this->em->find(FizzBuzzEntity::class, Uuid::fromString($id));

        if (null === $fizzBuzzEntity) {
            return null;
        }

        return new FizzBuzz(
            Uuid::fromString($fizzBuzzEntity->id()),
            $fizzBuzzEntity->initialNumber(),
            $fizzBuzzEntity->finalNumber(),
            $fizzBuzzEntity->createdAt(),
        );
    }
}