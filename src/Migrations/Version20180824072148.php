<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180824072148 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, code_classe VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, specialite VARCHAR(255) DEFAULT NULL, capacite BIGINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, code_classe_id INT NOT NULL, code_eleve VARCHAR(255) NOT NULL, noms VARCHAR(255) NOT NULL, prenoms VARCHAR(255) DEFAULT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, parent VARCHAR(255) DEFAULT NULL, profession_parent VARCHAR(255) DEFAULT NULL, contact_parent VARCHAR(255) DEFAULT NULL, sante LONGTEXT DEFAULT NULL, region_origine VARCHAR(255) DEFAULT NULL, INDEX IDX_ECA105F7231BDD31 (code_classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, code_eleve_id INT DEFAULT NULL, frais_paiement BIGINT NOT NULL, date_paiement DATE NOT NULL, motif_paiement LONGTEXT DEFAULT NULL, moratoire_paiement DATE DEFAULT NULL, INDEX IDX_B1DC7A1EF3EDBF99 (code_eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7231BDD31 FOREIGN KEY (code_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EF3EDBF99 FOREIGN KEY (code_eleve_id) REFERENCES eleve (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7231BDD31');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1EF3EDBF99');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE paiement');
    }
}
