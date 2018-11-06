<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181106220842 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql(' INSERT INTO users (id, name, added) VALUES (nextval(\'users_id_seq\'), \'Hamilton\', CURRENT_TIMESTAMP); ');
        $this->addSql(' INSERT INTO users (id, name, added) VALUES (nextval(\'users_id_seq\'), \'Vettel\', CURRENT_TIMESTAMP); ');
        $this->addSql(' INSERT INTO users (id, name, added) VALUES (nextval(\'users_id_seq\'), \'Bottas\', CURRENT_TIMESTAMP); ');
        $this->addSql(' INSERT INTO users (id, name, added) VALUES (nextval(\'users_id_seq\'), \'Verstappen\', CURRENT_TIMESTAMP); ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
