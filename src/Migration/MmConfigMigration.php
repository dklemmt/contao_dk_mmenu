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

final class MmConfigMigration extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->getSchemaManager();

        if ($schemaManager->tablesExist(['tl_dk_mmenu_config'])) {
            return false;
        }

        if (!$schemaManager->tablesExist(['tl_module'])) {
            return false;
        }

        $columns = $schemaManager->listTableColumns('tl_module');

        if (isset($columns['dk_mmenuconfig'])) {
            return false;
        }

        $statement = $this->connection->prepare("SELECT `id` FROM `tl_module` WHERE `type` LIKE 'mmenu%'");

        return $statement->executeStatement() > 0;
    }

    public function run(): MigrationResult
    {
        $this->connection->executeStatement(
            "CREATE TABLE tl_dk_mmenu_config(
                    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                    tstamp INT UNSIGNED DEFAULT 0 NOT NULL,
                    title VARCHAR(255) DEFAULT '' NOT NULL,
                    position VARCHAR(32) DEFAULT '' NOT NULL,
                    zposition VARCHAR(32) DEFAULT '' NOT NULL,
                    slidingSubmenus VARCHAR(32) DEFAULT '' NOT NULL,
                    theme VARCHAR(32) DEFAULT '' NOT NULL,
                    moveBackground TINYINT(1) DEFAULT 1 NOT NULL,
                    fullscreen TINYINT(1) DEFAULT 0 NOT NULL,
                    countersAdd TINYINT(1) DEFAULT 0 NOT NULL,
                    columnsAdd TINYINT(1) DEFAULT 0 NOT NULL,
                    searchfieldAdd TINYINT(1) DEFAULT 0 NOT NULL,
                    pageDim VARCHAR(16) DEFAULT '' NOT NULL,
                    menuEffects VARCHAR(16) DEFAULT '' NOT NULL,
                    panelEffects VARCHAR(16) DEFAULT '' NOT NULL,
                    listEffects VARCHAR(16) DEFAULT '' NOT NULL,
                    dragOpenEnable TINYINT(1) DEFAULT 0 NOT NULL,
                    dragOpenThreshold SMALLINT DEFAULT 50 NOT NULL,
                    dragOpenMaxStartPos SMALLINT DEFAULT 100 NOT NULL,
                    polyfillEnable TINYINT(1) DEFAULT 0 NOT NULL,
                    onClickClose TINYINT(1) DEFAULT 0 NOT NULL,
                    pageSelector VARCHAR(255) DEFAULT '' NOT NULL,
                    iconPanels TINYINT(1) DEFAULT 0 NOT NULL,
                    shadows BLOB DEFAULT NULL,
                    keyboardNavigation TINYINT(1) DEFAULT 0 NOT NULL,
                    keyboardNavigationEnhance TINYINT(1) DEFAULT 0 NOT NULL,
                PRIMARY KEY(id))"
        );
        $this->connection->executeStatement(
            'ALTER TABLE tl_module ADD dk_mmenuConfig INT UNSIGNED DEFAULT 0 NOT NULL'
        );

        $schemaManager = $this->connection->getSchemaManager();

        if ($schemaManager->tablesExist(['tl_dk_mmenu_config', 'tl_module'])) {
            $result = $this->connection->executeQuery("SELECT * FROM `tl_module` WHERE `type` LIKE 'mmenu%'")->fetchAllAssociative();

            if (false !== $result) {
                foreach ($result as $module) {
                    $config = [];
                    $config['title'] = $module['name'];
                    $config['position'] = $module['dk_mmenuPosition'];
                    $config['zposition'] = $module['dk_mmenuZposition'];
                    $config['slidingSubmenus'] = $module['dk_mmenuSlidingSubmenus'];
                    $config['theme'] = $module['dk_mmenuTheme'];
                    $config['moveBackground'] = (int) $module['dk_mmenuMoveBackground'];
                    $config['pageDim'] = ($module['dk_mmenuPageDim'] ?? '');
                    $config['fullscreen'] = (int) $module['dk_mmenuFullscreen'];
                    $config['countersAdd'] = (int) $module['dk_mmenuCountersAdd'];
                    $config['columnsAdd'] = (int) ($module['dk_mmenuColumnsAdd'] ?? 0);
                    $config['searchfieldAdd'] = (int) $module['dk_mmenuSearchfieldAdd'];
                    $config['iconPanels'] = (int) ($module['dk_mmenuIconPanels'] ?? 0);
                    $config['menuEffects'] = ($module['dk_mmenuMenuEffects'] ?? '');
                    $config['panelEffects'] = ($module['dk_mmenuPanelEffects'] ?? '');
                    $config['listEffects'] = ($module['dk_mmenuListEffects'] ?? '');
                    $config['shadows'] = (int) ($module['dk_mmenuShadows'] ?? 0);
                    $config['onClickClose'] = (int) $module['dk_mmenuOnClickClose'];
                    $config['pageSelector'] = ($module['dk_mmenuPageSelector'] ?? '');
                    $config['dragOpenEnable'] = (int) ($module['dk_mmenuDragOpenEnable'] ?? 0);
                    $config['dragOpenMaxStartPos'] = (int) ($module['dk_mmenuDragOpenMaxStartPos'] ?? 0);
                    $config['dragOpenThreshold'] = (int) $module['dk_mmenuDragOpenThreshold'];
                    $config['polyfillEnable'] = (int) ($module['dk_mmenuPolyfillEnable'] ?? 0);
                    $config['keyboardNavigation'] = (int) ($module['dk_mmenuKeyboardNavigation'] ?? 0);
                    $config['keyboardNavigationEnhance'] = (int) ($module['dk_mmenuKeyboardNavigationEnhance'] ?? 0);

                    $stmt = $this->connection->prepare(
                        'INSERT INTO tl_dk_mmenu_config (
                                `title`,
                                `position`,
                                `zposition`,
                                `slidingSubmenus`,
                                `theme`,
                                `moveBackground`,
                                `pageDim`,
                                `fullscreen`,
                                `countersAdd`,
                                `columnsAdd`,
                                `searchfieldAdd`,
                                `iconPanels`,
                                `menuEffects`,
                                `panelEffects`,
                                `listEffects`,
                                `shadows`,
                                `onClickClose`,
                                `pageSelector`,
                                `dragOpenEnable`,
                                `dragOpenMaxStartPos`,
                                `dragOpenThreshold`,
                                `polyfillEnable`,
                                `keyboardNavigation`,
                                `keyboardNavigationEnhance`
                            ) VALUES (
                                :title,
                                :position,
                                :zposition,
                                :slidingSubmenus,
                                :theme,
                                :moveBackground,
                                :pageDim,
                                :fullscreen,
                                :countersAdd,
                                :columnsAdd,
                                :searchfieldAdd,
                                :iconPanels,
                                :menuEffects,
                                :panelEffects,
                                :listEffects,
                                :shadows,
                                :onClickClose,
                                :pageSelector,
                                :dragOpenEnable,
                                :dragOpenMaxStartPos,
                                :dragOpenThreshold,
                                :polyfillEnable,
                                :keyboardNavigation,
                                :keyboardNavigationEnhance
                            )'
                    );
                    $stmt->executeQuery($config);
                    $configId = (int) $this->connection->lastInsertId();

                    $this->connection->executeStatement(
                        'UPDATE `tl_module` SET `dk_mmenuConfig` = ? WHERE id = ?',
                        [$configId, $module['id']]
                    );
                }
            }
        }

        return $this->createResult(true);
    }
}
