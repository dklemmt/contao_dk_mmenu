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
use Contao\StringUtil;
use Doctrine\DBAL\Connection;

final class JsTemplateLayoutMigration extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_layout'])) {
            return false;
        }

        $columns = $schemaManager->listTableColumns('tl_layout');

        if (!isset($columns['scripts'])) {
            return false;
        }

        $statement = $this->connection->prepare("SELECT `id`, `scripts` FROM `tl_layout` WHERE `scripts` LIKE '%\"js_mmenu%'");

        return $statement->executeStatement() > 0;
    }

    public function run(): MigrationResult
    {
        $schemaManager = $this->connection->createSchemaManager();

        if ($schemaManager->tablesExist(['tl_layout'])) {
            $result = $this->connection->executeQuery("SELECT `id`, `scripts` FROM `tl_layout` WHERE `scripts` LIKE '%\"js_mmenu%'")->fetchAllAssociative();

            if (false !== $result) {
                foreach ($result as $layout) {
                    $scripts = [];

                    foreach (StringUtil::deserialize($layout['scripts'], true) as $script) {
                        if (!str_starts_with($script, 'js_mmenu')) {
                            $scripts[] = $script;
                        }
                    }

                    $this->connection->executeStatement(
                        'UPDATE `tl_layout` SET `scripts` = ? WHERE id = ?',
                        [serialize($scripts), $layout['id']]
                    );
                }
            }
        }

        return $this->createResult(true);
    }
}