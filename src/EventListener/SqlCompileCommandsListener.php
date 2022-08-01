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

use Contao\StringUtil;
use Doctrine\DBAL\Connection;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

final class SqlCompileCommandsListener
{
    private Connection $db;
    private string $rootDir;

    public function __construct(Connection $db, string $rootDir)
    {
        $this->db = $db;
        $this->rootDir = $rootDir;
    }

    public function __invoke(array $sql): array
    {
        $this->updateTemplates();
        $this->updateModules();
        $this->updateLayouts();

        return $sql;
    }

    private function updateTemplates(): void
    {
        $finder = (new Finder())->files()->name('js_mmenu*')->in($this->rootDir.'/templates');
        $filesystem = new Filesystem();

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $newPath = str_replace(['js_mmenu_', 'js_mmenu'], ['mmenu_', 'mmenu_default'], $file->getRealPath());
            $filesystem->rename($file->getRealPath(), $newPath);
        }
    }

    private function updateModules(): void
    {
        if ($this->tableExistsInDb('tl_module') && $this->columnExistsInTable('dk_mmenuJsTpl', 'tl_module')) {
            $this->db->executeStatement(
                "UPDATE `tl_module` SET `dk_mmenuJsTpl` = REPLACE(`dk_mmenuJsTpl`, 'js_mmenu_', 'mmenu_')"
            );
            $this->db->executeStatement(
                "UPDATE `tl_module` SET `dk_mmenuJsTpl` = REPLACE(`dk_mmenuJsTpl`, 'js_mmenu', 'mmenu_default')"
            );
        }
    }

    private function updateLayouts(): void
    {
        if ($this->tableExistsInDb('tl_layout') && $this->columnExistsInTable('scripts', 'tl_layout')) {
            $result = $this->db->executeQuery("SELECT `id`, `scripts` FROM `tl_layout` WHERE `scripts` LIKE '%\"js_mmenu%'")->fetchAllAssociative();

            if (false !== $result) {
                foreach ($result as $layout) {
                    $scripts = [];

                    foreach (StringUtil::deserialize($layout['scripts'], true) as $script) {
                        if (0 !== strpos($script, 'js_mmenu')) {
                            $scripts[] = $script;
                        }
                    }

                    $this->db->executeStatement(
                        'UPDATE `tl_layout` SET `scripts` = ? WHERE id = ?',
                        [serialize($scripts), $layout['id']]
                    );
                }
            }
        }
    }

    private function tableExistsInDb(string $table): bool
    {
        return \in_array($table, $this->db->createSchemaManager()->listTableNames(), true);
    }

    private function columnExistsInTable(string $columnName, string $tableName): bool
    {
        $columns = $this->db->createSchemaManager()->listTableColumns($tableName);

        foreach ($columns as $column) {
            if ($column->getName() === $columnName) {
                return true;
            }
        }

        return false;
    }
}
