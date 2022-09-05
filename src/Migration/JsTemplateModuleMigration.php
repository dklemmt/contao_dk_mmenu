<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) Dirk Klemmt
 * (c) inspiredminds
 *
 * @license MIT
 */

namespace DirkKlemmt\ContaoMmenuBundle\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;

final class JsTemplateModuleMigration extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function shouldRun(): bool
    {
        $schemaManager = method_exists($this->connection, 'createSchemaManager') ?
            $this->connection->createSchemaManager() :
            $this->connection->getSchemaManager()
        ;

        if (!$schemaManager->tablesExist(['tl_module'])) {
            return false;
        }

        $columns = $schemaManager->listTableColumns('tl_module');

        if (!isset($columns['dk_mmenujstpl'])) {
            return false;
        }

        $statement = $this->connection->prepare("SELECT * FROM tl_module WHERE dk_mmenuJsTpl LIKE 'js_mmenu%'");

        return $statement->executeStatement() > 0;
    }

    public function run(): MigrationResult
    {
        $schemaManager = method_exists($this->connection, 'createSchemaManager') ?
            $this->connection->createSchemaManager() :
            $this->connection->getSchemaManager()
        ;

        if ($schemaManager->tablesExist(['tl_module'])) {
            $this->connection->executeStatement(
                "UPDATE `tl_module` SET `dk_mmenuJsTpl` = REPLACE(`dk_mmenuJsTpl`, 'js_mmenu_', 'mmenu_')"
            );
            $this->connection->executeStatement(
                "UPDATE `tl_module` SET `dk_mmenuJsTpl` = REPLACE(`dk_mmenuJsTpl`, 'js_mmenu', 'mmenu_default')"
            );
        }

        return $this->createResult(true);
    }
}
