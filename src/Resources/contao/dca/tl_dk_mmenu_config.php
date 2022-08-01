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

use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_dk_mmenu_config'] = [
    'config' => [
        'dataContainer' => DC_Table::class,
        'switchToEdit' => true,
        'enableVersioning' => true,
        'markAsCopy' => 'title',
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],

    'list' => [
        'sorting' => [
            'mode' => 2,
            'fields' => ['title'],
            'flag' => 1,
            'panelLayout' => 'sort,search,limit',
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s',
        ],
        'global_operations' => [
            'all' => [
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ],
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ],
            'copy' => [
                'href' => 'act=copy',
                'icon' => 'copy.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\''.($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null).'\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg',
            ],
        ],
    ],

    'palettes' => [
        '__selector__' => ['dragOpenEnable', 'keyboardNavigation'],
        'default' => '{title_legend},title;
            {appearance_legend},position,zposition,slidingSubmenus,theme,moveBackground,pageDim,fullscreen,countersAdd,columnsAdd,searchfieldAdd,iconPanels;
            {effects_legend},menuEffects,panelEffects,listEffects,shadows;
            {behaviour_legend},onClickClose,pageSelector,dragOpenEnable,polyfillEnable;
            {keyboard_navigation_legend},keyboardNavigation',
    ],

    'subpalettes' => [
        'dragOpenEnable' => 'dragOpenMaxStartPos,dragOpenThreshold',
        'keyboardNavigation' => 'keyboardNavigationEnhance',
    ],

    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true],
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
        ],
        'title' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'position' => [
            'exclude' => true,
            'inputType' => 'select',
            'default' => 'left',
            'options' => ['left', 'right', 'top', 'bottom', 'popup'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dk_mmenu_config']['position'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
        ],
        'zposition' => [
            'exclude' => true,
            'inputType' => 'select',
            'default' => 'back',
            'options' => ['back', 'front'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dk_mmenu_config']['zposition'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
        ],
        'slidingSubmenus' => [
            'exclude' => true,
            'inputType' => 'select',
            'default' => 'horizontal',
            'options' => ['horizontal', 'vertical'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dk_mmenu_config']['slidingSubmenus'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
        ],
        'theme' => [
            'exclude' => true,
            'inputType' => 'select',
            'default' => 'light',
            'options' => ['light', 'dark', 'black', 'white'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dk_mmenu_config']['theme'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
        ],
        'moveBackground' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => true],
        ],
        'fullscreen' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'clr w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'countersAdd' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'countersUpdate' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'columnsAdd' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'searchfieldAdd' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'pageDim' => [
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['white', 'black'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dk_mmenu_config']['pageDimOptions'],
            'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
            'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
        ],
        'menuEffects' => [
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['fade', 'slide', 'zoom'],
            'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
            'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
        ],
        'panelEffects' => [
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['none', 'slide-0', 'slide-100', 'slide-up', 'zoom'],
            'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
            'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
        ],
        'listEffects' => [
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['drop', 'fade', 'slide'],
            'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
            'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
        ],
        'dragOpenEnable' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'dragOpenThreshold' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'],
            'sql' => ['type' => 'smallint', 'default' => 50],
        ],
        'dragOpenMaxStartPos' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'],
            'sql' => ['type' => 'smallint', 'default' => 100],
        ],
        'polyfillEnable' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'clr'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'onClickClose' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'clr w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'pageSelector' => [
            'exclude' => true,
            'default' => '#wrapper',
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'tl_class' => 'clr w50'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'iconPanels' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'shadows' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'options' => ['menu', 'page', 'panels'],
            'eval' => ['tl_class' => 'clr', 'multiple' => true],
            'sql' => ['type' => 'blob', 'length' => '65535', 'notnull' => false],
        ],
        'keyboardNavigation' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['submitOnChange' => true, 'tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
        'keyboardNavigationEnhance' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'boolean', 'default' => false],
        ],
    ],
];
