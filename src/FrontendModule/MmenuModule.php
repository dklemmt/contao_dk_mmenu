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
use Contao\ModuleNavigation;
use DirkKlemmt\ContaoMmenuBundle\Helper\MmenuHelper;

class MmenuModule extends ModuleNavigation
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_mmenu';

    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplateJs = 'mmenu_default';

    /**
     * Display a wildcard in the back end.
     */
    public function generate(): string
    {
        if (TL_MODE === 'BE') {
            // --- create BE template for mmenu module
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '### '.utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['mmenu'][0]).' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;

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
        // Navigation template fallback
        if ('' === $this->navigationTpl) {
            $this->navigationTpl = 'nav_mmenu';
        }

        // Build the navigation items
        parent::compile();

        // Add the JavaScript to TL_BODY
        MmenuHelper::processModuleSettings($this, $this->strTemplateJs);
    }
}
