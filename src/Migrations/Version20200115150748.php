<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115150748 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE instance ADD salle_id INT DEFAULT NULL, ADD animateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE instance ADD CONSTRAINT FK_4230B1DEDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE instance ADD CONSTRAINT FK_4230B1DE7F05C301 FOREIGN KEY (animateur_id) REFERENCES animateur (id)');
        $this->addSql('CREATE INDEX IDX_4230B1DEDC304035 ON instance (salle_id)');
        $this->addSql('CREATE INDEX IDX_4230B1DE7F05C301 ON instance (animateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE instance DROP FOREIGN KEY FK_4230B1DEDC304035');
        $this->addSql('ALTER TABLE instance DROP FOREIGN KEY FK_4230B1DE7F05C301');
        $this->addSql('DROP INDEX IDX_4230B1DEDC304035 ON instance');
        $this->addSql('DROP INDEX IDX_4230B1DE7F05C301 ON instance');
        $this->addSql('ALTER TABLE instance DROP salle_id, DROP animateur_id');
    }
}
