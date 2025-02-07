<?php

namespace App\Repository;

use App\Entity\FizzBuzz;
use App\Entity\FizzBuzzRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineFizzBuzzRepository extends ServiceEntityRepository implements FizzBuzzRepository
{
    private \Doctrine\Persistence\ObjectManager $em;

    public function __construct(ManagerRegistry $registry)
    {
        $this->em = $registry->getManager();

        parent::__construct($registry, FizzBuzz::class);
    }

    public function save(FizzBuzz $fizzBuzz): void
    {
        $this->em->persist($fizzBuzz);
        $this->em->flush();
    }

    public function ofId(string $id): ?FizzBuzz
    {
        return $this->em->find(FizzBuzz::class, $id);
    }
}