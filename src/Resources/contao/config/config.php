<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) inspiredminds
 *
 * @license MIT
 */

use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuModule;

array_insert($GLOBALS['FE_MOD'], 3, [
    'navigationMenu' => [
        'mmenu' => MmenuModule::class,
        'custommmenu' => 'mmenu\ModuleCustomMmenu',
    ],
    'miscellaneous' => [
        'mmenu_article' => 'mmenu\ModuleMmenuArticle',
    ],
]);
