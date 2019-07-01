<?php

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
