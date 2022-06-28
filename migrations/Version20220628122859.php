<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220628122859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bus (id INT AUTO_INCREMENT NOT NULL, bus_line_id INT DEFAULT NULL, first_stop_id INT DEFAULT NULL, last_stop_id INT DEFAULT NULL, registration_number VARCHAR(255) NOT NULL, INDEX IDX_2F566B69E660648F (bus_line_id), UNIQUE INDEX UNIQ_2F566B692A8E6AC1 (first_stop_id), UNIQUE INDEX UNIQ_2F566B695F8E3A75 (last_stop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus_lines (id INT AUTO_INCREMENT NOT NULL, line_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus_transferts (id INT AUTO_INCREMENT NOT NULL, bus_id INT DEFAULT NULL, new_line_id INT DEFAULT NULL, first_stop_id INT DEFAULT NULL, last_stop_id INT DEFAULT NULL, travel_time TIME NOT NULL, INDEX IDX_76804E72546731D (bus_id), UNIQUE INDEX UNIQ_76804E7963826AC (new_line_id), UNIQUE INDEX UNIQ_76804E72A8E6AC1 (first_stop_id), UNIQUE INDEX UNIQ_76804E75F8E3A75 (last_stop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stops (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69E660648F FOREIGN KEY (bus_line_id) REFERENCES bus_lines (id)');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B692A8E6AC1 FOREIGN KEY (first_stop_id) REFERENCES stops (id)');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B695F8E3A75 FOREIGN KEY (last_stop_id) REFERENCES stops (id)');
        $this->addSql('ALTER TABLE bus_transferts ADD CONSTRAINT FK_76804E72546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE bus_transferts ADD CONSTRAINT FK_76804E7963826AC FOREIGN KEY (new_line_id) REFERENCES bus_lines (id)');
        $this->addSql('ALTER TABLE bus_transferts ADD CONSTRAINT FK_76804E72A8E6AC1 FOREIGN KEY (first_stop_id) REFERENCES stops (id)');
        $this->addSql('ALTER TABLE bus_transferts ADD CONSTRAINT FK_76804E75F8E3A75 FOREIGN KEY (last_stop_id) REFERENCES stops (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus_transferts DROP FOREIGN KEY FK_76804E72546731D');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69E660648F');
        $this->addSql('ALTER TABLE bus_transferts DROP FOREIGN KEY FK_76804E7963826AC');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B692A8E6AC1');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B695F8E3A75');
        $this->addSql('ALTER TABLE bus_transferts DROP FOREIGN KEY FK_76804E72A8E6AC1');
        $this->addSql('ALTER TABLE bus_transferts DROP FOREIGN KEY FK_76804E75F8E3A75');
        $this->addSql('DROP TABLE bus');
        $this->addSql('DROP TABLE bus_lines');
        $this->addSql('DROP TABLE bus_transferts');
        $this->addSql('DROP TABLE stops');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
