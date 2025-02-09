<?php

namespace App\Tests\Integration\Context\FizzBuzz\Infrastructure\Persistence\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class RepositoryTestCase extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
        $this->truncate();
        parent::setUp();
    }

    abstract protected function truncate(): void;

    abstract protected function repository();

    protected function managerRegistry(): ManagerRegistry
    {
        return static::getContainer()->get(ManagerRegistry::class);
    }

    protected function em(): EntityManagerInterface
    {
        return static::getContainer()->get(EntityManagerInterface::class);
    }

    protected function connection(): Connection
    {
        return static::getContainer()->get(Connection::class);
    }

    protected function truncateTables(array $tables): void
    {
        $connection = $this->em()->getConnection();
        foreach ($tables as $table) {
            $connection->executeStatement('DELETE FROM ' . $table);
        }
    }
}