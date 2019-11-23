<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191123023210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $tariff = $schema->getTable('tariff');
        $tariff->addColumn('free_errands_amount', Type::INTEGER)->setDefault(0);
        $tariff->addColumn('errand_cost', Type::FLOAT)->setDefault(0);
    }

    public function down(Schema $schema) : void
    {
        $tariff = $schema->getTable('tariff');
        $tariff->dropColumn('free_errands_amount');
        $tariff->dropColumn('errand_cost');
    }
}
