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

namespace DirkKlemmt\ContaoMmenuBundle\EventListener\DataContainer;

use Contao\Controller;
use Contao\CoreBundle\Framework\FrameworkAwareInterface;
use Contao\CoreBundle\Framework\FrameworkAwareTrait;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;

/**
 * @Callback(table="tl_module", target="fields.dk_mmenuJsTpl.options")
 */
class JsTemplateOptions implements FrameworkAwareInterface
{
    use FrameworkAwareTrait;

    public function __invoke(?DataContainer $dc): array
    {
        $controller = $this->framework->getAdapter(Controller::class);

        return $controller->getTemplateGroup('mmenu_');
    }
}
