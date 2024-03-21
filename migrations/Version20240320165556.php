<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320165556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD plain_password VARCHAR(255) NOT NULL, ADD description LONGTEXT DEFAULT NULL, ADD position VARCHAR(255) DEFAULT NULL, ADD testing_systems VARCHAR(255) DEFAULT NULL, ADD reporting_systems VARCHAR(255) DEFAULT NULL, ADD knows_selenium TINYINT(1) NOT NULL, ADD ide_environments VARCHAR(255) DEFAULT NULL, ADD programming_languages VARCHAR(255) DEFAULT NULL, ADD knows_my_sql TINYINT(1) NOT NULL, ADD project_management_methodologies VARCHAR(255) DEFAULT NULL, ADD knows_scrum TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP plain_password, DROP description, DROP position, DROP testing_systems, DROP reporting_systems, DROP knows_selenium, DROP ide_environments, DROP programming_languages, DROP knows_my_sql, DROP project_management_methodologies, DROP knows_scrum');
    }
}
