<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925115248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materiels (id INT AUTO_INCREMENT NOT NULL, salles_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_9C1EBE69B11E4946 (salles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE materiels ADD CONSTRAINT FK_9C1EBE69B11E4946 FOREIGN KEY (salles_id) REFERENCES salles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiels DROP FOREIGN KEY FK_9C1EBE69B11E4946');
        $this->addSql('DROP TABLE materiels');
    }
}
