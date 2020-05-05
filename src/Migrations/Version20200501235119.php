<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200501235119 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album ADD imagens_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43AFB5B7E4 FOREIGN KEY (imagens_id) REFERENCES imagen (id)');
        $this->addSql('CREATE INDEX IDX_39986E43AFB5B7E4 ON album (imagens_id)');
        $this->addSql('ALTER TABLE imagen ADD albumes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE imagen ADD CONSTRAINT FK_8319D2B34E54DA2B FOREIGN KEY (albumes_id) REFERENCES album (id)');
        $this->addSql('CREATE INDEX IDX_8319D2B34E54DA2B ON imagen (albumes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43AFB5B7E4');
        $this->addSql('DROP INDEX IDX_39986E43AFB5B7E4 ON album');
        $this->addSql('ALTER TABLE album DROP imagens_id');
        $this->addSql('ALTER TABLE imagen DROP FOREIGN KEY FK_8319D2B34E54DA2B');
        $this->addSql('DROP INDEX IDX_8319D2B34E54DA2B ON imagen');
        $this->addSql('ALTER TABLE imagen DROP albumes_id');
    }
}
