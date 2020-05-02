<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200501220543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album ADD nombre VARCHAR(40) NOT NULL, ADD descripcion VARCHAR(300) DEFAULT NULL, ADD created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE comentario_album ADD descripcion VARCHAR(300) NOT NULL, ADD created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE comentario_imagen ADD descripcion VARCHAR(300) NOT NULL, ADD created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE imagen ADD nombre VARCHAR(40) NOT NULL, ADD descripcion VARCHAR(300) NOT NULL, ADD foto VARCHAR(300) NOT NULL, ADD created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE persona ADD nombre VARCHAR(40) NOT NULL, ADD apellido VARCHAR(40) NOT NULL, ADD email VARCHAR(220) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album DROP nombre, DROP descripcion, DROP created_at');
        $this->addSql('ALTER TABLE comentario_album DROP descripcion, DROP created_at');
        $this->addSql('ALTER TABLE comentario_imagen DROP descripcion, DROP created_at');
        $this->addSql('ALTER TABLE imagen DROP nombre, DROP descripcion, DROP foto, DROP created_at');
        $this->addSql('ALTER TABLE persona DROP nombre, DROP apellido, DROP email');
    }
}
