<?php 

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2014 Leo Feyer
 * 
 * @package   mmenu
 * @author    Dirk Klemmt
 * @license   MIT/GPL
 * @copyright Dirk Klemmt 2013-2014
 */


/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 3, array
(
	'navigationMenu' => array
	(
		'mmenu'			=> 'mmenu\ModuleMmenu',
		'custommmenu'	=> 'mmenu\ModuleCustomMmenu'
	),
	'miscellaneous' => array
	(
		'mmenu_article'	=> 'mmenu\ModuleMmenuArticle'
	)
));
