<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191028063722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $tariff = $schema->getTable('tariff');
        $tariff->addColumn('adapter', 'string')->setDefault('');
    }

    public function down(Schema $schema) : void
    {
        $tariff = $schema->getTable('tariff');
        $tariff->dropColumn('adapter');
    }
}
