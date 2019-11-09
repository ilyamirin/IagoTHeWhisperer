<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104021714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $transferRange = $schema->createTable('transfer_range');
        $transferRange->addColumn('id', Type::INTEGER)
            ->setAutoincrement(true)
            ->setUnsigned(true)
        ;
        $transferRange->addColumn('min', Type::FLOAT)->setNotnull(false);
        $transferRange->addColumn('max', Type::FLOAT)->setNotnull(false);
        $transferRange->addColumn('value', Type::FLOAT);
        $transferRange->addColumn('tariff_id', Type::INTEGER);

        $transferRange->setPrimaryKey(['id']);
        $transferRange->addForeignKeyConstraint($schema->getTable('tariff'), ['tariff_id'], ['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('transfer_range');
    }
}
