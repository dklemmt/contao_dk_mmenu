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
$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuConfig'] = [
    'exclude' => true,
    'inputType' => 'select',
    'eval' => ['mandatory' => true, 'tl_class' => 'w50'],
    'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
];
$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuJsTpl'] = [
    'exclude' => true,
    'inputType' => 'select',
    'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

/*
 * Add palettes to tl_module.
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu'] = $GLOBALS['TL_DCA']['tl_module']['palettes']['navigation'];
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenuCustom'] = $GLOBALS['TL_DCA']['tl_module']['palettes']['customnav'];
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenuHtml'] = '{title_legend},name,headline,type;{html_legend},html;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';

PaletteManipulator::create()
    ->addLegend('config_legend', 'nav_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('dk_mmenuConfig', 'config_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('dk_mmenuJsTpl', 'template_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('mmenu', 'tl_module')
    ->applyToPalette('mmenuCustom', 'tl_module')
    ->applyToPalette('mmenuHtml', 'tl_module')
;
