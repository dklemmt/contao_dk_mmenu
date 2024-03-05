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

namespace DirkKlemmt\ContaoMmenuBundle\Helper;

use Contao\Controller;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\StringUtil;
use DirkKlemmt\ContaoMmenuBundle\Model\MmenuConfigModel;

class MmenuHelper
{
    /**
     * Process the mmenu module's settings and adds the JavaScript to TL_BODY.
     */
    public static function processModuleSettings(Module $module, string $jsTemplateName): void
    {
        // Load the config
        if (empty($module->dk_mmenuConfig) || !($config = MmenuConfigModel::findByPk($module->dk_mmenuConfig)) instanceof MmenuConfigModel) {
            return;
        }

        // Check for a valid CSS ID
        $cssID = $module->cssID;

        if (empty($cssID[0])) {
            $cssID[0] = $module->type.'-'.substr(md5($module->type.$module->id), 0, 8);
            $module->cssID = $cssID;
        }

        // Create the JavaScript template
        $jsTemplate = new FrontendTemplate($jsTemplateName);
        $jsTemplate->elementId = $cssID[0];

        // Prepare the options and configuration for mmenu
        $options = [];
        $configuration = [
            'classNames' => [
                'selected' => 'active',
            ],
        ];

        if (!empty($config->navbarTitle)) {
            $options['navbar']['title'] = $config->navbarTitle;
        } elseif ('en' !== $GLOBALS['TL_LANGUAGE']) {
            $options['navbar']['title'] = $GLOBALS['TL_LANG']['DK_MMENU']['title'];
        }

        // https://mmenujs.com/docs/core/off-canvas.html
        if ($config->pageSelector) {
            $configuration['offCanvas']['page']['selector'] = StringUtil::decodeEntities($config->pageSelector);
        }

        if (\in_array($config->position, ['left', 'right', 'top', 'bottom'], true)) {
            $options['offCanvas']['position'] = $config->position;
        }

        if ('back' !== $config->zposition && \in_array($config->position, ['left', 'right'], true)) {
            $options['offCanvas']['position'] = $config->position.'-'.$config->zposition;
        }

        // https://mmenujs.com/docs/core/options.html
        if ('vertical' === $config->slidingSubmenus) {
            $options['slidingSubmenus'] = false;
        }

        // https://mmenujs.com/docs/core/theme.html
        if (\in_array($config->theme, ['light', 'dark', 'white', 'black'], true)) {
            $options['theme'] = $config->theme;

            if ($config->themeHighContrast) {
                $options['theme'] = $config->theme.'-contrast';
            }
        }

        // https://mmenujs.com/docs/addons/counters.html
        if ($config->countersAdd) {
            $options['counters']['add'] = true;
        }

        // https://mmenujs.com/docs/addons/searchfield.html
        if ($config->searchfieldAdd) {
            $options['navbars'] = [
                [
                    'position' => 'top',
                    'content' => [
                        'searchfield',
                    ],
                ],
            ];

            if ('en' !== $GLOBALS['TL_LANGUAGE']) {
                $options['searchfield']['noResults'] = $GLOBALS['TL_LANG']['DK_MMENU']['noResult'];
                $options['searchfield']['placeholder'] = $GLOBALS['TL_LANG']['DK_MMENU']['placeholder'];
            }
        }

        // https://mmenujs.com/docs/addons/icon-panels.html
        if ($config->iconPanels) {
            $options['iconPanels'] = [
                'add' => true,
                'visible' => 1,
            ];
        }

        // Add options and configuration to JavaScript template
        $jsTemplate->options = $options;
        $jsTemplate->configuration = $configuration;

        // Add module JavaScript (and replace insert tags, see #66)
        //Revert to the original without inserttags
        $GLOBALS['TL_BODY'][] = $jsTemplate->parse();
    }
}
