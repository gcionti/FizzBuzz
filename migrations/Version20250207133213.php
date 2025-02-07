<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250207133213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE fizz_buzz (id CHAR(36) NOT NULL --(DC2Type:uuid)
        , initial_number INTEGER NOT NULL, final_number INTEGER NOT NULL, result CLOB NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE fizz_buzz');
    }
}
