<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216070855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responses_client DROP FOREIGN KEY FK_3B14D2B15BA17805');
        $this->addSql('DROP INDEX IDX_3B14D2B15BA17805 ON responses_client');
        $this->addSql('ALTER TABLE responses_client DROP id_quiz_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responses_client ADD id_quiz_id INT NOT NULL');
        $this->addSql('ALTER TABLE responses_client ADD CONSTRAINT FK_3B14D2B15BA17805 FOREIGN KEY (id_quiz_id) REFERENCES quiz (id)');
        $this->addSql('CREATE INDEX IDX_3B14D2B15BA17805 ON responses_client (id_quiz_id)');
    }
}
