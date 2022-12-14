<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214103152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, id_quiz_id INT NOT NULL, question VARCHAR(255) DEFAULT NULL, INDEX IDX_8ADC54D55BA17805 (id_quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, id_professionel_id INT NOT NULL, INDEX IDX_A412FA921169154B (id_professionel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponses (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, reponses VARCHAR(255) DEFAULT NULL, INDEX IDX_1E512EC66353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responses_client (id INT AUTO_INCREMENT NOT NULL, id_reponse_id INT NOT NULL, id_quiz_id INT NOT NULL, INDEX IDX_3B14D2B16A923B55 (id_reponse_id), INDEX IDX_3B14D2B15BA17805 (id_quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D55BA17805 FOREIGN KEY (id_quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA921169154B FOREIGN KEY (id_professionel_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC66353B48 FOREIGN KEY (id_question_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE responses_client ADD CONSTRAINT FK_3B14D2B16A923B55 FOREIGN KEY (id_reponse_id) REFERENCES reponses (id)');
        $this->addSql('ALTER TABLE responses_client ADD CONSTRAINT FK_3B14D2B15BA17805 FOREIGN KEY (id_quiz_id) REFERENCES quiz (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D55BA17805');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA921169154B');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC66353B48');
        $this->addSql('ALTER TABLE responses_client DROP FOREIGN KEY FK_3B14D2B16A923B55');
        $this->addSql('ALTER TABLE responses_client DROP FOREIGN KEY FK_3B14D2B15BA17805');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE reponses');
        $this->addSql('DROP TABLE responses_client');
    }
}
