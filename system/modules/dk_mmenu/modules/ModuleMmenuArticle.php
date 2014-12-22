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
 * Namespace
 */
namespace Dirch\mmenu;


/**
 * Class ModuleMmenu
 *
 * @copyright  Dirk Klemmt 2013-2015
 * @author     Dirk Klemmt
 * @package    mmenu
 */
class ModuleMmenuArticle extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_mmenu';


	/**
	 * Template
	 * @var string
	 */
	protected $strTemplateJs = 'js_mmenu';


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
			// --- create BE template for mmenu module
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['mmenu'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// replace default (HTML) template with chosen one
		if ($this->dk_mmenuHtmlTpl)
		{
			$this->strTemplate = $this->dk_mmenuHtmlTpl;
		}

		// replace default (JS) template with chosen one
		if ($this->dk_mmenuJsTpl)
		{
			$this->strTemplateJs = $this->dk_mmenuJsTpl;
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		// get content of article
		$objElements = \ContentModel::findPublishedByPidAndTable($this->dk_mmenuArticle, 'tl_article');
		if ($objElements !== null)
		{
			while ($objElements->next())
			{
				$arrElements[] = $this->getContentElement($objElements->id);
			}
		}
		$this->Template->elements = $arrElements;

		// --- create FE template for javascript caller
		$objTemplateJs = new \FrontendTemplate($this->strTemplateJs);
		$objTemplateJs->id = $this->id;
		$objTemplateJs->cssIDonly = $this->cssID[0];

		$objMmenu = new Mmenu();
		$objMmenu->createTemplateData($this->Template, $objTemplateJs);
	}
}
