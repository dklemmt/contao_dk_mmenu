<?php

namespace DirkKlemmt\ContaoMmenuBundle\DataContainer;

use Contao\DataContainer;
use Contao\Controller;

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
     * tl_module.dk_mmenuJsTpl options_callback
     */
    public function onMmenuJsTplOptionsCallback(): array
    {
        return Controller::getTemplateGroup('js_mmenu');
    }
}
