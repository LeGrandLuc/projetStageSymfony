<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200726180340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD joue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872EFC205F6 FOREIGN KEY (joue_id) REFERENCES joue (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8EE3872EFC205F6 ON club (joue_id)');
        $this->addSql('ALTER TABLE joueur ADD joue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5EFC205F6 FOREIGN KEY (joue_id) REFERENCES joue (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD71A9C5EFC205F6 ON joueur (joue_id)');
        $this->addSql('ALTER TABLE logo ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE logo ADD CONSTRAINT FK_E48E9A1361190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_E48E9A1361190A32 ON logo (club_id)');
        $this->addSql('ALTER TABLE saison ADD joue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586EFC205F6 FOREIGN KEY (joue_id) REFERENCES joue (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0D0D586EFC205F6 ON saison (joue_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872EFC205F6');
        $this->addSql('DROP INDEX UNIQ_B8EE3872EFC205F6 ON club');
        $this->addSql('ALTER TABLE club DROP joue_id');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5EFC205F6');
        $this->addSql('DROP INDEX UNIQ_FD71A9C5EFC205F6 ON joueur');
        $this->addSql('ALTER TABLE joueur DROP joue_id');
        $this->addSql('ALTER TABLE logo DROP FOREIGN KEY FK_E48E9A1361190A32');
        $this->addSql('DROP INDEX IDX_E48E9A1361190A32 ON logo');
        $this->addSql('ALTER TABLE logo DROP club_id');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586EFC205F6');
        $this->addSql('DROP INDEX UNIQ_C0D0D586EFC205F6 ON saison');
        $this->addSql('ALTER TABLE saison DROP joue_id');
    }
}
