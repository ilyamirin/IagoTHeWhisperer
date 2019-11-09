<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191109060104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $checkRange = $schema->createTable('check_range');
        $checkRange->addColumn('id', Type::INTEGER)
            ->setAutoincrement(true)
            ->setUnsigned(true)
        ;
        $checkRange->addColumn('min', Type::FLOAT)->setNotnull(false);
        $checkRange->addColumn('max', Type::FLOAT)->setNotnull(false);
        $checkRange->addColumn('value', Type::FLOAT);
        $checkRange->addColumn('tariff_id', Type::INTEGER);

        $checkRange->setPrimaryKey(['id']);
        $checkRange->addForeignKeyConstraint($schema->getTable('tariff'), ['tariff_id'], ['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('check_range');
    }
}
