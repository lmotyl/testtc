<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181106223250 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql(' INSERT INTO users_fruits (user_id, fruit_id) VALUES (1, 1); ');
        $this->addSql(' INSERT INTO users_fruits (user_id, fruit_id) VALUES (1, 2); ');
        $this->addSql(' INSERT INTO users_fruits (user_id, fruit_id) VALUES (3, 1); ');
        $this->addSql(' INSERT INTO users_fruits (user_id, fruit_id) VALUES (3, 3); ');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
