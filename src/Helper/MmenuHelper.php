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

use Contao\FrontendTemplate;
use Contao\Module;
use Contao\StringUtil;

class MmenuHelper
{
    /**
     * Process the mmenu module's settings and adds the JavaScript to TL_BODY.
     */
    public static function processModuleSettings(Module $module, string $jsTemplateName): void
    {
        // Create the JavaScript template
        $jsTemplate = new FrontendTemplate($jsTemplateName);
        $jsTemplate->elementId = $module->cssID[0];

        // Prepare the options and configuration for mmenu
        $options = [];
        $configuration = [
            'classNames' => [
                'selected' => 'active',
            ],
        ];

        // https://mmenujs.com/documentation/extensions/positioning.html
        if ($module->dk_mmenuPageSelector) {
            $configuration['offCanvas']['page']['selector'] = StringUtil::decodeEntities($module->dk_mmenuPageSelector);
        }

        if ('left' !== $module->dk_mmenuPosition) {
            if ('popup' === $module->dk_mmenuPosition) {
                // https://mmenujs.com/documentation/extensions/popup.html
                $options['extensions'][] = 'popup';
            } else {
                $options['extensions'][] = 'position-'.$module->dk_mmenuPosition;
            }
        }

        if ('back' !== $module->dk_mmenuZposition) {
            $options['extensions'][] = 'position-'.$module->dk_mmenuZposition;
        }

        // https://mmenujs.com/documentation/extensions/page-dim.html
        if ($module->dk_mmenuPageDim) {
            $options['extensions'][] = 'pagedim-'.$module->dk_mmenuPageDim;
        }

        // https://mmenujs.com/documentation/core/options.html
        if ('vertical' === $module->dk_mmenuSlidingSubmenus) {
            $options['slidingSubmenus'] = false;
        }

        if ($module->dk_mmenuOnClickClose) {
            $options['onClick']['close'] = true;
        }

        // https://mmenujs.com/documentation/core/off-canvas.html
        if (!$module->dk_mmenuMoveBackground) {
            $options['offCanvas']['moveBackground'] = false;
        }

        // https://mmenujs.com/documentation/extensions/themes.html
        if ('light' !== $module->dk_mmenuTheme) {
            $options['extensions'][] = 'theme-'.$module->dk_mmenuTheme;
        }

        // https://mmenujs.com/documentation/extensions/fullscreen.html
        if ($module->dk_mmenuFullscreen) {
            $options['extensions'][] = 'fullscreen';
        }

        // https://mmenujs.com/documentation/addons/counters.html
        if ($module->dk_mmenuCountersAdd) {
            $options['counters'] = true;
        }

        // https://mmenujs.com/documentation/addons/searchfield.html
        if ($module->dk_mmenuSearchfieldAdd) {
            $options['navbars'] = [
                [
                    'position' => 'top',
                    'content' => [
                        'searchfield',
                    ],
                ],
            ];

            $options['searchfield']['noResults'] = $GLOBALS['TL_LANG']['DK_MMENU']['noresult'];
            $options['searchfield']['placeholder'] = $GLOBALS['TL_LANG']['DK_MMENU']['placeholder'];
        }

        // https://mmenujs.com/documentation/extensions/effects.html
        if ($module->dk_mmenuMenuEffects) {
            $options['extensions'][] = 'fx-menu-'.$module->dk_mmenuMenuEffects;
        }

        if ($module->dk_mmenuPanelEffects) {
            $options['extensions'][] = 'fx-panels-'.$module->dk_mmenuPanelEffects;
        }

        if ($module->dk_mmenuListEffects) {
            $options['extensions'][] = 'fx-listitems-'.$module->dk_mmenuListEffects;
        }

        // https://mmenujs.com/documentation/addons/drag.html
        if ($module->dk_mmenuDragOpenEnable) {
            $options['drag']['menu']['open'] = true;

            if ($module->dk_mmenuDragOpenMaxStartPos && 100 !== (int) $module->dk_mmenuDragOpenMaxStartPos) {
                $options['drag']['menu']['maxStartPos'] = (int) $module->dk_mmenuDragOpenMaxStartPos;
            }

            if ($module->dk_mmenuDragOpenThreshold && 50 !== (int) $module->dk_mmenuDragOpenThreshold) {
                $options['drag']['menu']['threshold'] = (int) $module->dk_mmenuDragOpenThreshold;
            }
        }

        // https://mmenujs.com/documentation/addons/icon-panels.html
        if ($module->dk_mmenuIconPanels) {
            $options['iconPanels'] = true;
        }

        // https://mmenujs.com/documentation/extensions/shadows.html
        if ($module->dk_mmenuShadows) {
            $shadows = array_filter(StringUtil::deserialize($module->dk_mmenuShadows, true));
            foreach ($shadows as $shadow) {
                $options['extensions'][] = 'shadow-'.$shadow;
            }
        }

        // Add options and configuration to JavaScript template
        $jsTemplate->options = $options;
        $jsTemplate->configuration = $configuration;

        // Add module JavaScript
        $GLOBALS['TL_BODY'][] = $jsTemplate->parse();
    }
}
