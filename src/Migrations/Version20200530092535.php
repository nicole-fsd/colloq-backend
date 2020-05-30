<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200530092535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD city_id INT NOT NULL, ADD meetup_city_id INT NOT NULL, ADD avail_start_date DATE NOT NULL, ADD avail_end_date DATE NOT NULL, ADD is_tourist TINYINT(1) NOT NULL, ADD is_tutor TINYINT(1) NOT NULL, ADD meetup_type VARCHAR(255) NOT NULL, ADD public_message LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497D4F0423 FOREIGN KEY (meetup_city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498BAC62AF ON user (city_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6497D4F0423 ON user (meetup_city_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497D4F0423');
        $this->addSql('DROP INDEX IDX_8D93D6498BAC62AF ON user');
        $this->addSql('DROP INDEX IDX_8D93D6497D4F0423 ON user');
        $this->addSql('ALTER TABLE user DROP city_id, DROP meetup_city_id, DROP avail_start_date, DROP avail_end_date, DROP is_tourist, DROP is_tutor, DROP meetup_type, DROP public_message');
    }
}
