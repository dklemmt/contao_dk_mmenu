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
 * Namespace
 */
namespace Dirch\mmenu;


/**
 * Class ModuleCustomMmenu
 *
 * @copyright  Dirk Klemmt 2013
 * @author     Dirk Klemmt
 * @package    mmenu
 */
class ModuleCustomMmenu extends \ModuleCustomnav
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_mmenu';


	/**
	 * Display a wildcard in the back end
	 *
	 * @param boolean
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			// --- create BE template for custommmenu module
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['custommmenu'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// replace default template with chosen one
		if ($this->dk_mmenuTpl)
		{
			$this->strTemplate = $this->dk_mmenuTpl;
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		parent::compile();

		$this->Template->cssIDonly = $this->cssID[0];
		$objMmenu = new Mmenu();
		$objMmenu->createTemplateData($this->id, $this->Template);
	}
}
