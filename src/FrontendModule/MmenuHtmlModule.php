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

namespace DirkKlemmt\ContaoMmenuBundle\FrontendModule;

use Contao\BackendTemplate;
use Contao\ModuleHtml;
use Contao\System;
use DirkKlemmt\ContaoMmenuBundle\Helper\MmenuHelper;
use Symfony\Component\HttpFoundation\Request;

class MmenuHtmlModule extends ModuleHtml
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_mmenuHtml';

    /**
     * Template.
     */
    protected string $strTemplateJs = 'mmenu_default';

    /**
     * Display a wildcard in the back end.
     */
    public function generate(): string
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            // --- create BE template for mmenu module
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '### ' . mb_strtoupper($GLOBALS['TL_LANG']['FMD']['mmenu'][0]) . ' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $template->parse();
        }

        // replace default (HTML) template with chosen one
        if ($this->customTpl) {
            $this->strTemplate = $this->customTpl;
        }

        // replace default (JS) template with chosen one
        if ($this->dk_mmenuJsTpl) {
            $this->strTemplateJs = $this->dk_mmenuJsTpl;
        }

        return parent::generate();
    }

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        // Compile via the parent class
        parent::compile();

        // Add the JavaScript to TL_BODY
        MmenuHelper::processModuleSettings($this, $this->strTemplateJs);
    }
}
