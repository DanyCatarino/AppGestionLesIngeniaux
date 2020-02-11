<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200131131506 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE age_atelier');
        $this->addSql('ALTER TABLE canal ADD nom_du_contact VARCHAR(50) NOT NULL, ADD email_du_contact VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE age_atelier (age_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_2FC305C1CC80CD12 (age_id), INDEX IDX_2FC305C182E2CF35 (atelier_id), PRIMARY KEY(age_id, atelier_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE age_atelier ADD CONSTRAINT FK_2FC305C182E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE age_atelier ADD CONSTRAINT FK_2FC305C1CC80CD12 FOREIGN KEY (age_id) REFERENCES age (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE canal DROP nom_du_contact, DROP email_du_contact');
    }
}
