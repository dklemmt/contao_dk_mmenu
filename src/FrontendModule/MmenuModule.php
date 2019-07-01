<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) inspiredminds
 *
 * @license MIT
 */

namespace DirkKlemmt\ContaoMmenuBundle\FrontendModule;

use Contao\BackendTemplate;
use Contao\FrontendTemplate;
use Contao\StringUtil;

class MmenuModule extends \Contao\ModuleNavigation
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
    protected $strTemplateJs = 'js_mmenu';

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
        \Symfony\Component\VarDumper\VarDumper::dump($this->navigationTpl);

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

        // Create the JavaScript template
        $jsTemplate = new FrontendTemplate($this->strTemplateJs);
        $jsTemplate->elementId = $this->cssID[0];

        // Prepare the options and configuration for mmenu
        $options = [];
        $configuration = [
            'classNames' => [
                'selected' => 'active',
            ],
        ];

        // https://mmenujs.com/documentation/extensions/positioning.html
        if ($this->dk_mmenuPageSelector) {
            $configuration['offCanvas']['page']['selector'] = StringUtil::decodeEntities($this->dk_mmenuPageSelector);
        }

        if ('left' !== $this->dk_mmenuPosition) {
            $options['extensions'][] = 'position-'.$this->dk_mmenuPosition;
        }

        if ('back' !== $this->dk_mmenuZposition) {
            $options['extensions'][] = 'position-'.$this->dk_mmenuZposition;
        }

        // https://mmenujs.com/documentation/core/options.html
        if ('vertical' === $this->dk_mmenuSlidingSubmenus) {
            $options['slidingSubmenus'] = false;
        }

        // https://mmenujs.com/documentation/core/off-canvas.html
        if (!$this->dk_mmenuMoveBackground) {
            $options['offCanvas']['moveBackground'] = false;
        }

        // https://mmenujs.com/documentation/extensions/themes.html
        if ('light' !== $this->dk_mmenuTheme) {
            $options['extensions'][] = 'theme-'.$this->dk_mmenuTheme;
        }

        // https://mmenujs.com/documentation/extensions/fullscreen.html
        if ($this->dk_mmenuFullscreen) {
            $options['extensions'][] = 'fullscreen';
        }

        // https://mmenujs.com/documentation/addons/counters.html
        if ($this->dk_mmenuCountersAdd) {
            $options['counters'] = true;
        }

        // https://mmenujs.com/documentation/addons/searchfield.html
        if ($this->dk_mmenuSearchfieldAdd) {
            $options['navbars'] = [
                [
                    'position' => 'top',
                    'content' => [
                        'searchfield',
                    ],
                ],
            ];
        }

        // https://mmenujs.com/documentation/extensions/effects.html
        if ($this->dk_mmenuMenuEffects) {
            $options['extensions'][] = 'fx-menu-'.$this->dk_mmenuMenuEffects;
        }

        if ($this->dk_mmenuPanelEffects) {
            $options['extensions'][] = 'fx-panels-'.$this->dk_mmenuPanelEffects;
        }

        if ($this->dk_mmenuListEffects) {
            $options['extensions'][] = 'fx-listitems-'.$this->dk_mmenuListEffects;
        }

        // Add options and configuration to JavaScript template
        $jsTemplate->options = json_encode($options);
        $jsTemplate->configuration = json_encode($configuration);

        // Add CSS
        $GLOBALS['TL_CSS'][] = 'bundles/contaommenu/mmenu/mmenu.css|static';

        // Add JavaScript
        $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/contaommenu/mmenu/mmenu.js|static';

        // Add module JavaScript
        $GLOBALS['TL_BODY'][] = $jsTemplate->parse();
    }
}
