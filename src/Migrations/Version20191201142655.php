<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20191201142655 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create table user';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE SEQUENCE sn_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE sn_user (id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP SEQUENCE sn_user_id_seq CASCADE');
        $this->addSql('DROP TABLE sn_user');
    }
}
