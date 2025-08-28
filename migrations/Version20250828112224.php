<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250828112224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books CHANGE isbn isbn VARCHAR(20) NOT NULL, CHANGE published_at published_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE books RENAME INDEX idx_cbe5a33112469de2 TO IDX_4A1B2A9212469DE2');
        $this->addSql('ALTER TABLE categories RENAME INDEX uniq_64c19c15e237e06 TO UNIQ_3AF346685E237E06');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books CHANGE isbn isbn VARCHAR(255) NOT NULL, CHANGE published_at published_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE books RENAME INDEX idx_4a1b2a9212469de2 TO IDX_CBE5A33112469DE2');
        $this->addSql('ALTER TABLE categories RENAME INDEX uniq_3af346685e237e06 TO UNIQ_64C19C15E237E06');
    }
}
