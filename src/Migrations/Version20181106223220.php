<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181106223220 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE users_fruits (user_id INT NOT NULL, fruit_id INT NOT NULL, PRIMARY KEY(user_id, fruit_id))');
        $this->addSql('CREATE INDEX IDX_7A224CAEA76ED395 ON users_fruits (user_id)');
        $this->addSql('CREATE INDEX IDX_7A224CAEBAC115F0 ON users_fruits (fruit_id)');
        $this->addSql('ALTER TABLE users_fruits ADD CONSTRAINT FK_7A224CAEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_fruits ADD CONSTRAINT FK_7A224CAEBAC115F0 FOREIGN KEY (fruit_id) REFERENCES fruits (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE users_fruits');
    }
}
