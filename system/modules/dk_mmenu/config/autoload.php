<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2015 Leo Feyer
 * 
 * @package   mmenu
 * @author    Dirk Klemmt
 * @license   MIT/GPL
 * @copyright Dirk Klemmt 2013-2015
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Dirch'
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Dirch\mmenu\Mmenu' => 'system/modules/dk_mmenu/classes/Mmenu.php',

	// Modules
	'Dirch\mmenu\ModuleMmenu' => 'system/modules/dk_mmenu/modules/ModuleMmenu.php',
	'Dirch\mmenu\ModuleCustomMmenu' => 'system/modules/dk_mmenu/modules/ModuleCustomMmenu.php',
	'Dirch\mmenu\ModuleMmenuArticle' => 'system/modules/dk_mmenu/modules/ModuleMmenuArticle.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_mmenu' => 'system/modules/dk_mmenu/templates/modules',
	'js_mmenu' => 'system/modules/dk_mmenu/templates/jquery'
));
