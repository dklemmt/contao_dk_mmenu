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

use Contao\Controller;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;

/**
 * @Callback(table="tl_module", target="fields.dk_mmenuJsTpl.options")
 */
class JsTemplateOptions
{
    private ContaoFramework $framework;

    public function __construct(ContaoFramework $framework)
    {
        $this->framework = $framework;
    }

    public function __invoke(?DataContainer $dc): array
    {
        $controller = $this->framework->getAdapter(Controller::class);

        return $controller->getTemplateGroup('mmenu_');
    }
}
