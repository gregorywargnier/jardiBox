<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416102631 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE all_category ADD universe_id INT NOT NULL');
        $this->addSql('ALTER TABLE all_category ADD CONSTRAINT FK_97B24E065CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id)');
        $this->addSql('CREATE INDEX IDX_97B24E065CD9AF2 ON all_category (universe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE all_category DROP FOREIGN KEY FK_97B24E065CD9AF2');
        $this->addSql('DROP INDEX IDX_97B24E065CD9AF2 ON all_category');
        $this->addSql('ALTER TABLE all_category DROP universe_id');
    }
}
