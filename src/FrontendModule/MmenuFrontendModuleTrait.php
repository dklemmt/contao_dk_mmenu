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

namespace DirkKlemmt\ContaoMmenuBundle\FrontendModule;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\System;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

trait MmenuFrontendModuleTrait
{
    private function isBackend(): bool
    {
        /** @var RequestStack $requestStack */
        $requestStack = System::getContainer()->get('request_stack');
        $request = $requestStack->getCurrentRequest();

        if (!$request) {
            return false;
        }

        /** @var ScopeMatcher $scopeMatcher */
        $scopeMatcher = System::getContainer()->get('contao.routing.scope_matcher');

        return $scopeMatcher->isBackendRequest($request);
    }

    private function getBackendUrl(): string
    {
        /** @var UrlGeneratorInterface $urlGenerator */
        $urlGenerator = System::getContainer()->get(UrlGeneratorInterface::class);

        return $urlGenerator->generate('contao_backend', [
            'do' => 'themes',
            'table' => 'tl_module',
            'act' => 'edit',
            'id' => $this->id,
        ]);
    }
}
