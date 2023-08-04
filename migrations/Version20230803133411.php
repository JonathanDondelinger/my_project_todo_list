<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803133411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD986C83C3CE');
        $this->addSql('DROP INDEX IDX_3BF2CD986C83C3CE ON taches');
        $this->addSql('ALTER TABLE taches ADD createur_id INT NOT NULL, ADD priorite INT NOT NULL, DROP créateur_id, DROP priorité, CHANGE date_échéance date_echeance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD9873A201E5 FOREIGN KEY (createur_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_3BF2CD9873A201E5 ON taches (createur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD9873A201E5');
        $this->addSql('DROP INDEX IDX_3BF2CD9873A201E5 ON taches');
        $this->addSql('ALTER TABLE taches ADD créateur_id INT NOT NULL, ADD priorité INT NOT NULL, DROP createur_id, DROP priorite, CHANGE date_echeance date_échéance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD986C83C3CE FOREIGN KEY (créateur_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_3BF2CD986C83C3CE ON taches (créateur_id)');
    }
}
