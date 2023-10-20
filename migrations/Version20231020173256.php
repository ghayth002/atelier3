<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020173256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author ADD nb_books INT NOT NULL, CHANGE username username VARCHAR(20) NOT NULL, CHANGE email email VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331F675F31B');
        $this->addSql('DROP INDEX IDX_CBE5A331F675F31B ON book');
        $this->addSql('ALTER TABLE book ADD id_author_id INT DEFAULT NULL, DROP author_id, CHANGE title title VARCHAR(100) NOT NULL, CHANGE published published TINYINT(1) DEFAULT NULL, CHANGE category category VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33176404F3C FOREIGN KEY (id_author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A33176404F3C ON book (id_author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author DROP nb_books, CHANGE username username VARCHAR(30) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33176404F3C');
        $this->addSql('DROP INDEX IDX_CBE5A33176404F3C ON book');
        $this->addSql('ALTER TABLE book ADD author_id INT NOT NULL, DROP id_author_id, CHANGE title title VARCHAR(100) DEFAULT NULL, CHANGE category category VARCHAR(30) NOT NULL, CHANGE published published TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
    }
}
