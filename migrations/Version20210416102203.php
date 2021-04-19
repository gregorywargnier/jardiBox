<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416102203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE all_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, image_name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universe (id INT AUTO_INCREMENT NOT NULL, all_category_id INT NOT NULL, title VARCHAR(100) NOT NULL, image_name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_613538352959093E (all_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE universe ADD CONSTRAINT FK_613538352959093E FOREIGN KEY (all_category_id) REFERENCES all_category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE universe DROP FOREIGN KEY FK_613538352959093E');
        $this->addSql('DROP TABLE all_category');
        $this->addSql('DROP TABLE universe');
    }
}
