<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package   mmenu
 * @author    Dirk Klemmt
 * @license   MIT/GPL
 * @copyright Dirk Klemmt 2013
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__']	[] = 'dk_mmenuDragOpenOpen';

$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu'] = '{title_legend},name,headline,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected;{reference_legend:hide},defineRoot;{mmenu_legend_appearance},dk_mmenuPosition,dk_mmenuSlidingSubmenus,dk_mmenuTheme,dk_mmenuCountersAdd,dk_mmenuSearchfieldAdd;{mmenu_legend_behaviour},dk_mmenuDragOpenOpen,dk_mmenuOnClickClose,dk_mmenuOnClickDelayLocationHref,dk_mmenuOnClickBlockUI;{template_legend:hide},navigationTpl,dk_mmenuTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['custommmenu'] = '{title_legend},name,headline,type;{nav_legend},pages,showProtected;{mmenu_legend_appearance},dk_mmenuPosition,dk_mmenuSlidingSubmenus,dk_mmenuTheme,dk_mmenuCountersAdd,dk_mmenuSearchfieldAdd;{mmenu_legend_behaviour},dk_mmenuDragOpenOpen,dk_mmenuOnClickClose,dk_mmenuOnClickDelayLocationHref,dk_mmenuOnClickBlockUI;{template_legend:hide},navigationTpl,dk_mmenuTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dk_mmenuDragOpenOpen']	= 'dk_mmenuDragOpenThreshold';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPosition'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'default'			=> 'left',
	'options'			=> array('left', 'right', 'top', 'bottom'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSlidingSubmenus'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'default'			=> 'horizontal',
	'options'			=> array('horizontal', 'vertical'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuTheme'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'default'			=> 'default',
	'options'			=> array('default', 'light', 'lighter', 'lightest', 'army', 'bordeaux', 'navy'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersAdd'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'clr w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSearchfieldAdd'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenOpen'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenOpen'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('submitOnChange' => true, 'tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenThreshold'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'],
	'exclude'			=> true,
	'inputType'			=> 'text',
	'eval'				=> array('maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'),
	'sql'				=> "smallint(5) NOT NULL default '50'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickClose'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'clr w50'),
	'sql'				=> "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickDelayLocationHref'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickDelayLocationHref'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickBlockUI'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickBlockUI'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'clr'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuTpl'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTpl'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options_callback'	=> array('tl_module_dk_mmenu', 'getTemplates'),
	'eval'				=> array('maxlength' => 255, 'tl_class' => 'w50'),
	'sql'				=> "varchar(255) NOT NULL default ''"
);


/**
 * Class tl_module_dk_mmenu
 *
 * @copyright  Dirk Klemmt 2013
 * @author     Dirk Klemmt
 * @package    mmenu
 */
class tl_module_dk_mmenu extends tl_module
{

	/**
	 * Return all mmenu templates as array
	 *
	 * @return array
	 */
	public function getTemplates()
	{
		return $this->getTemplateGroup('mod_mmenu');
	}
}
