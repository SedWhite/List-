<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220614133042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task ADD list_task_id INT DEFAULT NULL, ADD task VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2551F9DC8B FOREIGN KEY (list_task_id) REFERENCES todo_list (id)');
        $this->addSql('CREATE INDEX IDX_527EDB2551F9DC8B ON task (list_task_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2551F9DC8B');
        $this->addSql('DROP INDEX IDX_527EDB2551F9DC8B ON task');
        $this->addSql('ALTER TABLE task DROP list_task_id, DROP task');
    }
}
