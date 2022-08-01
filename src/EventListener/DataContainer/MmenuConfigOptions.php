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

use Contao\CoreBundle\Framework\FrameworkAwareInterface;
use Contao\CoreBundle\Framework\FrameworkAwareTrait;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;
use DirkKlemmt\ContaoMmenuBundle\Model\MmenuConfigModel;

/**
 * @Callback(table="tl_module", target="fields.dk_mmenuConfig.options")
 */
class MmenuConfigOptions implements FrameworkAwareInterface
{
    use FrameworkAwareTrait;

    public function __invoke(?DataContainer $dc): array
    {
        $configModel = $this->framework->getAdapter(MmenuConfigModel::class);
        $configs = $configModel->findAll();

        if (null === $configs) {
            return [];
        }

        $options = [];

        foreach ($configs as $config) {
            $options[$config->id] = $config->title;
        }

        return $options;
    }
}
