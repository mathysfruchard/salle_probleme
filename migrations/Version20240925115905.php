<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925115905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE signalement (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, materiel_id INT DEFAULT NULL, salles_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, date_signalement DATETIME NOT NULL, INDEX IDX_F4B55114A76ED395 (user_id), INDEX IDX_F4B5511416880AAF (materiel_id), INDEX IDX_F4B55114B11E4946 (salles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE signalement ADD CONSTRAINT FK_F4B55114A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE signalement ADD CONSTRAINT FK_F4B5511416880AAF FOREIGN KEY (materiel_id) REFERENCES materiels (id)');
        $this->addSql('ALTER TABLE signalement ADD CONSTRAINT FK_F4B55114B11E4946 FOREIGN KEY (salles_id) REFERENCES salles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signalement DROP FOREIGN KEY FK_F4B55114A76ED395');
        $this->addSql('ALTER TABLE signalement DROP FOREIGN KEY FK_F4B5511416880AAF');
        $this->addSql('ALTER TABLE signalement DROP FOREIGN KEY FK_F4B55114B11E4946');
        $this->addSql('DROP TABLE signalement');
    }
}
