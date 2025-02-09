<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
class FizzBuzz
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: 'uuid', unique: true)]
        #[ORM\GeneratedValue(strategy: 'NONE')]
        private UuidInterface $id,
        #[ORM\Column(type: 'integer')]
        private int $initialNumber,
        #[ORM\Column(type: 'integer')]
        private int $finalNumber,
        #[ORM\Column(type: 'text')]
        private string $result,
        #[ORM\Column(type: 'datetime')]
        private Datetime $createdAt,
    ) {
    }

    public function id(): string
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

    public function result(): int
    {
        return $this->result;
    }

    public function createdAt(): Datetime
    {
        return $this->createdAt;
    }
}