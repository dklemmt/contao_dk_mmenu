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

use Contao\BackendTemplate;
use Contao\ModuleHtml;
use DirkKlemmt\ContaoMmenuBundle\Helper\MmenuHelper;

class MmenuHtmlModule extends ModuleHtml
{
    use MmenuFrontendModuleTrait;

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
        if ($this->isBackend()) {
            // --- create BE template for mmenu module
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '### '.mb_strtoupper($GLOBALS['TL_LANG']['FMD']['mmenu'][0]).' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = $this->getBackendUrl();

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
