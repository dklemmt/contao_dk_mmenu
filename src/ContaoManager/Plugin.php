<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

namespace DirkKlemmt\ContaoMmenuBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use DirkKlemmt\ContaoMmenuBundle\ContaoMmenuBundle;

/**
 * Plugin for the Contao Manager.
 */
class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoMmenuBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
