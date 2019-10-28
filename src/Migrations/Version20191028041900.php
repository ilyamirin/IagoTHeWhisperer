<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191028041900 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $tariff = $schema->getTable('tariff');
        $tariff->addColumn('free_service', 'string')->setDefault('');
        $tariff->addColumn('year_service', 'string')->setDefault('');
    }

    public function down(Schema $schema) : void
    {
        $tariff = $schema->getTable('tariff');
        $tariff->dropColumn('free_service');
        $tariff->dropColumn('year_service');
    }
}
