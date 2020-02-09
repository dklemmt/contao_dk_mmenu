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

namespace DirkKlemmt\ContaoMmenuBundle\EventListener;

use Doctrine\DBAL\Connection;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

final class SqlCompileCommandsListener
{
    private $db;
    private $rootDir;

    public function __construct(Connection $db, string $rootDir)
    {
        $this->db = $db;
        $this->rootDir = $rootDir;
    }

    public function __invoke(array $sql): array
    {
        $this->updateTemplates();
        $this->updateModules();

        return $sql;
    }

    private function updateTemplates(): void
    {
        $filesystem = new Filesystem();
        $finder = new Finder();
        $finder->files()->name('js_mmenu*')->in($this->rootDir.'/templates');

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $newPath = str_replace('js_mmenu_', 'mmenu_', $file->getRealPath());
            $newPath = str_replace('js_mmenu', 'mmenu_default', $newPath);
            $filesystem->rename($file->getRealPath(), $newPath);
        }
    }

    private function updateModules(): void
    {
        if ($this->tableExistsInDb('tl_module') && $this->columnExistsInTable('dk_mmenuJsTpl', 'tl_module')) {
            $this->db->executeUpdate("UPDATE `tl_module` SET `dk_mmenuJsTpl` = REPLACE(`dk_mmenuJsTpl`, 'js_mmenu_', 'mmenu_')");
            $this->db->executeUpdate("UPDATE `tl_module` SET `dk_mmenuJsTpl` = REPLACE(`dk_mmenuJsTpl`, 'js_mmenu', 'mmenu_default')");
        }
    }

    private function tableExistsInDb(string $table): bool
    {
        return \in_array($table, $this->db->getSchemaManager()->listTableNames(), true);
    }

    private function columnExistsInTable(string $columnName, string $tableName): bool
    {
        $columns = $this->db->getSchemaManager()->listTableColumns($tableName);

        foreach ($columns as $column) {
            if ($column->getName() === $columnName) {
                return true;
            }
        }

        return false;
    }
}
