<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108151145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famille_produit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_promotion (id INT AUTO_INCREMENT NOT NULL, leproduit_id INT DEFAULT NULL, lapromotion_id INT DEFAULT NULL, INDEX IDX_EF872599BB0CB11 (leproduit_id), INDEX IDX_EF87259CCBE53E3 (lapromotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, lafamille_id INT DEFAULT NULL, INDEX IDX_29A5EC27B3FABDEC (lafamille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, lafamille_id INT DEFAULT NULL, INDEX IDX_C11D7DD1B3FABDEC (lafamille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_promotion ADD CONSTRAINT FK_EF872599BB0CB11 FOREIGN KEY (leproduit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_promotion ADD CONSTRAINT FK_EF87259CCBE53E3 FOREIGN KEY (lapromotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B3FABDEC FOREIGN KEY (lafamille_id) REFERENCES famille_produit (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1B3FABDEC FOREIGN KEY (lafamille_id) REFERENCES famille_produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B3FABDEC');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1B3FABDEC');
        $this->addSql('ALTER TABLE ligne_promotion DROP FOREIGN KEY FK_EF872599BB0CB11');
        $this->addSql('ALTER TABLE ligne_promotion DROP FOREIGN KEY FK_EF87259CCBE53E3');
        $this->addSql('DROP TABLE famille_produit');
        $this->addSql('DROP TABLE ligne_promotion');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE promotion');
    }
}
