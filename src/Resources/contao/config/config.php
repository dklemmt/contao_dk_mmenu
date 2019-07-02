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

use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuCustomModule;
use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuHtmlModule;
use DirkKlemmt\ContaoMmenuBundle\FrontendModule\MmenuModule;

array_insert($GLOBALS['FE_MOD'], 3, [
    'navigationMenu' => [
        'mmenu' => MmenuModule::class,
        'mmenuCustom' => MmenuCustomModule::class,
    ],
    'miscellaneous' => [
        'mmenuHtml' => MmenuHtmlModule::class,
    ],
]);
