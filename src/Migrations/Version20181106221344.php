<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181106221344 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql(' INSERT INTO fruits (id, name) VALUES (nextval(\'fruits_id_seq\'), \'Apple\'); ');
        $this->addSql(' INSERT INTO fruits (id, name) VALUES (nextval(\'fruits_id_seq\'),\'Orange\'); ');
        $this->addSql(' INSERT INTO fruits (id, name) VALUES (nextval(\'fruits_id_seq\'),\'Banana\'); ');
        $this->addSql(' INSERT INTO fruits (id, name) VALUES (nextval(\'fruits_id_seq\'),\'Strewberry\'); ');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
