<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308111727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(20) NOT NULL, model VARCHAR(20) NOT NULL, type SMALLINT NOT NULL, year_of_production SMALLINT NOT NULL, mileage INT NOT NULL, no_of_seats SMALLINT NOT NULL, no_of_door SMALLINT NOT NULL, active TINYINT(1) NOT NULL, rented TINYINT(1) NOT NULL, notice LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('ALTER TABLE person CHANGE id id BIGINT AUTO_INCREMENT NOT NULL');
    }
}
