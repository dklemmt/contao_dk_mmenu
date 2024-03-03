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

use Contao\ArrayUtil;
use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuCustomModule;
use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuHtmlModule;
use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuModule;
use DirkKlemmt\ContaoMmenuBundle\Model\MmenuConfigModel;

ArrayUtil::arrayInsert(
    $GLOBALS['BE_MOD']['system'],
    0,
    [
        'mmenu_config' => [
            'tables' => ['tl_dk_mmenu_config'],
        ],
    ]
);

ArrayUtil::arrayInsert($GLOBALS['FE_MOD'], 3, [
    'navigationMenu' => [
        'mmenu' => MmenuModule::class,
        'mmenuCustom' => MmenuCustomModule::class,
    ],
    'miscellaneous' => [
        'mmenuHtml' => MmenuHtmlModule::class,
    ],
]);

$GLOBALS['TL_MODELS']['tl_dk_mmenu_config'] = MmenuConfigModel::class;
