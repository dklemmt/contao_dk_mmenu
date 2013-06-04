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
	'Dirch\mmenu\Mmenu'				=> 'system/modules/dk_mmenu/classes/Mmenu.php',

	// Modules
	'Dirch\mmenu\ModuleMmenu'		=> 'system/modules/dk_mmenu/modules/ModuleMmenu.php',
	'Dirch\mmenu\ModuleCustomMmenu'	=> 'system/modules/dk_mmenu/modules/ModuleCustomMmenu.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_mmenu'	=> 'system/modules/dk_mmenu/templates/modules'
));
