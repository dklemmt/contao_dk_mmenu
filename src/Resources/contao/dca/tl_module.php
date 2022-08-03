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

use Contao\CoreBundle\DataContainer\PaletteManipulator;

/*
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPosition'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'left',
    'options' => ['left', 'right', 'top', 'bottom', 'popup'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuZposition'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'back',
    'options' => ['back', 'front'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSlidingSubmenus'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'horizontal',
    'options' => ['horizontal', 'vertical'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuTheme'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'light',
    'options' => ['light', 'dark', 'black', 'white'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuMoveBackground'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMoveBackground'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuFullscreen'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFullscreen'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersAdd'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersUpdate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuColumnsAdd'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuColumnsAdd'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSearchfieldAdd'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPageDim'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPageDim'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['white', 'black'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPageDimOptions'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuMenuEffects'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMenuEffects'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['fade', 'slide', 'zoom'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPanelEffects'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPanelEffects'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['none', 'slide-0', 'slide-100', 'slide-up', 'zoom'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuListEffects'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuListEffects'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['drop', 'fade', 'slide'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenEnable'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenEnable'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenThreshold'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "smallint(5) NOT NULL default '50'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenMaxStartPos'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenMaxStartPos'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "smallint(5) NOT NULL default '100'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPolyfillEnable'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPolyfillEnable'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickClose'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuJsTpl'] = [
    'exclude' => true,
    'inputType' => 'select',
    'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPageSelector'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPageSelector'],
    'exclude' => true,
    'default' => '#wrapper',
    'inputType' => 'text',
    'eval' => ['maxlength' => 255, 'tl_class' => 'clr w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuIconPanels'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuIconPanels'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuShadows'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuShadows'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'options' => ['menu', 'page', 'panels'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuShadowsOptions'],
    'eval' => ['tl_class' => 'clr', 'multiple' => true],
    'sql' => 'blob NULL',
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuKeyboardNavigation'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuKeyboardNavigation'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuKeyboardNavigationEnhance'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuKeyboardNavigationEnhance'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

/*
 * Add palettes to tl_module.
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'dk_mmenuDragOpenEnable';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'dk_mmenuKeyboardNavigation';

$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu'] = $GLOBALS['TL_DCA']['tl_module']['palettes']['navigation'];
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenuCustom'] = $GLOBALS['TL_DCA']['tl_module']['palettes']['customnav'];
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenuHtml'] = '{title_legend},name,headline,type;{html_legend},html;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dk_mmenuDragOpenEnable'] = 'dk_mmenuDragOpenMaxStartPos,dk_mmenuDragOpenThreshold';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dk_mmenuKeyboardNavigation'] = 'dk_mmenuKeyboardNavigationEnhance';

PaletteManipulator::create()
    ->addLegend('mmenu_appearance_legend', 'template_legend', PaletteManipulator::POSITION_BEFORE, true)
    ->addField('dk_mmenuPosition', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuZposition', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuSlidingSubmenus', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuTheme', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuMoveBackground', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuPageDim', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuFullscreen', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuCountersAdd', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuColumnsAdd', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuSearchfieldAdd', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuIconPanels', 'mmenu_appearance_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('mmenu_effects_legend', 'template_legend', PaletteManipulator::POSITION_BEFORE, true)
    ->addField('dk_mmenuMenuEffects', 'mmenu_effects_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuPanelEffects', 'mmenu_effects_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuListEffects', 'mmenu_effects_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuShadows', 'mmenu_effects_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('mmenu_behaviour_legend', 'template_legend', PaletteManipulator::POSITION_BEFORE, true)
    ->addField('dk_mmenuOnClickClose', 'mmenu_behaviour_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuPageSelector', 'mmenu_behaviour_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuDragOpenEnable', 'mmenu_behaviour_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuPolyfillEnable', 'mmenu_behaviour_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('mmenu_keyboard_navigation_legend', 'mmenu_effects_legend', PaletteManipulator::POSITION_AFTER, true)
    ->addField('dk_mmenuKeyboardNavigation', 'mmenu_keyboard_navigation_legend', PaletteManipulator::POSITION_APPEND)

    ->addField('dk_mmenuJsTpl', 'template_legend', PaletteManipulator::POSITION_APPEND)

    ->applyToPalette('mmenu', 'tl_module')
    ->applyToPalette('mmenuCustom', 'tl_module')
    ->applyToPalette('mmenuHtml', 'tl_module')
;
