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

namespace DirkKlemmt\ContaoMmenuBundle\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

final class JsTemplateFileMigration extends AbstractMigration
{
    private ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function shouldRun(): bool
    {
        $finder = (new Finder())->files()->name('js_mmenu*')->in($this->params->get('kernel.project_dir').'/templates');

        return $finder->count() > 0;
    }

    public function run(): MigrationResult
    {
        $finder = (new Finder())->files()->name('js_mmenu*')->in($this->params->get('kernel.project_dir').'/templates');
        $filesystem = new Filesystem();
        $count = 0;

        /** @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $newPath = str_replace(['js_mmenu_', 'js_mmenu'], ['mmenu_', 'mmenu_default'], $file->getRealPath());
            $filesystem->rename($file->getRealPath(), $newPath);
            ++$count;
        }

        return $this->createResult(true, 'Renamed '.$count.' mmenu templates.');
    }
}
