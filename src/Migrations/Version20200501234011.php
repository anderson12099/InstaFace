<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200501234011 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_39986E43DB38439E ON album (usuario_id)');
        $this->addSql('ALTER TABLE comentario_album ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comentario_album ADD CONSTRAINT FK_1DAFDCFBDB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1DAFDCFBDB38439E ON comentario_album (usuario_id)');
        $this->addSql('ALTER TABLE comentario_imagen ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comentario_imagen ADD CONSTRAINT FK_4687DEBFDB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4687DEBFDB38439E ON comentario_imagen (usuario_id)');
        $this->addSql('ALTER TABLE imagen ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE imagen ADD CONSTRAINT FK_8319D2B3DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8319D2B3DB38439E ON imagen (usuario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43DB38439E');
        $this->addSql('DROP INDEX IDX_39986E43DB38439E ON album');
        $this->addSql('ALTER TABLE album DROP usuario_id');
        $this->addSql('ALTER TABLE comentario_album DROP FOREIGN KEY FK_1DAFDCFBDB38439E');
        $this->addSql('DROP INDEX IDX_1DAFDCFBDB38439E ON comentario_album');
        $this->addSql('ALTER TABLE comentario_album DROP usuario_id');
        $this->addSql('ALTER TABLE comentario_imagen DROP FOREIGN KEY FK_4687DEBFDB38439E');
        $this->addSql('DROP INDEX IDX_4687DEBFDB38439E ON comentario_imagen');
        $this->addSql('ALTER TABLE comentario_imagen DROP usuario_id');
        $this->addSql('ALTER TABLE imagen DROP FOREIGN KEY FK_8319D2B3DB38439E');
        $this->addSql('DROP INDEX IDX_8319D2B3DB38439E ON imagen');
        $this->addSql('ALTER TABLE imagen DROP usuario_id');
    }
}
