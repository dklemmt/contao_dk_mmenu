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

namespace DirkKlemmt\ContaoMmenuBundle\DataContainer;

use Contao\Controller;
use Contao\DataContainer;

class ModuleCallbacks
{
    /**
     * Sets nav_mmenu as the default template.
     */
    public function onNavigationTplLoadCallback(?string $value, DataContainer $dc): ?string
    {
        if (!$value) {
            $value = 'nav_mmenu';
        }

        return $value;
    }

    /**
     * tl_module.dk_mmenuJsTpl options_callback.
     */
    public function onMmenuJsTplOptionsCallback(): array
    {
        return Controller::getTemplateGroup('mmenu_');
    }
}
