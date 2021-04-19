<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416102444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE universe DROP FOREIGN KEY FK_613538352959093E');
        $this->addSql('DROP INDEX IDX_613538352959093E ON universe');
        $this->addSql('ALTER TABLE universe DROP all_category_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE universe ADD all_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE universe ADD CONSTRAINT FK_613538352959093E FOREIGN KEY (all_category_id) REFERENCES all_category (id)');
        $this->addSql('CREATE INDEX IDX_613538352959093E ON universe (all_category_id)');
    }
}
