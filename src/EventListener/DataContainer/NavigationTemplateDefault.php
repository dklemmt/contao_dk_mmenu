<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) Dirk Klemmt
 * (c) INSPIRED MINDS
 *
 * @license MIT
 */

namespace DirkKlemmt\ContaoMmenuBundle\EventListener\DataContainer;

use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;

/**
 * @Callback(table="tl_module", target="fields.navigationTpl.load")
 */
class NavigationTemplateDefault
{
    public function __invoke(?string $value, DataContainer $dc): string|null
    {
        switch ($dc->activeRecord->type) {
            case 'mmenu':
            case 'mmenuCustom':
            case 'mmenuHtml':
                if (!$value) {
                    return 'nav_mmenu';
                }
                break;
        }

        return $value;
    }
}
