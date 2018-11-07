<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181107082532 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE currencies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE currency_exchange_rates_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE currencies (id INT NOT NULL, code VARCHAR(25) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_37C4469377153098 ON currencies (code)');
        $this->addSql('CREATE TABLE currency_exchange_rates (id INT NOT NULL, currency_id INT DEFAULT NULL, rate DOUBLE PRECISION NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B20B975638248176 ON currency_exchange_rates (currency_id)');
        $this->addSql('ALTER TABLE currency_exchange_rates ADD CONSTRAINT FK_B20B975638248176 FOREIGN KEY (currency_id) REFERENCES currencies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE currency_exchange_rates DROP CONSTRAINT FK_B20B975638248176');
        $this->addSql('DROP SEQUENCE currencies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE currency_exchange_rates_id_seq CASCADE');
        $this->addSql('DROP TABLE currencies');
        $this->addSql('DROP TABLE currency_exchange_rates');
        $this->addSql('ALTER TABLE users_fruits DROP CONSTRAINT fk_7a224caebac115f0');
        $this->addSql('ALTER TABLE users_fruits DROP CONSTRAINT fk_7a224caea76ed395');
        $this->addSql('DROP INDEX users_fruits_pkey');
        $this->addSql('ALTER TABLE users_fruits ADD CONSTRAINT fk_7a224caebac115f0 FOREIGN KEY (fruit_id) REFERENCES fruits (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_fruits ADD CONSTRAINT fk_7a224caea76ed395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_fruits ADD PRIMARY KEY (user_id, fruit_id)');
    }
}
