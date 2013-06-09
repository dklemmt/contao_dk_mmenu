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
 * Class Mmenu
 *
 * @copyright  Dirk Klemmt 2013
 * @author     Dirk Klemmt
 * @package    mmenu
 */
class Mmenu extends \Frontend 
{

	public function createTemplateData($mmenuPk, \Template $objTemplate)
	{
		$objMmenu = \ModuleModel::findByPk($mmenuPk);
		if ($objMmenu === null)
		{
			return;
		}

		// only none default values will be send to template

		// mmenu option 'position': default value is 'left'
		if ($objMmenu->dk_mmenuPosition != 'left')
		{
			$objTemplate->position = 'position: "' . $objMmenu->dk_mmenuPosition . '"';
		}

		// mmenu option 'slidingSubmenus': default value is 'true'
		if (!$objMmenu->dk_mmenuSlidingSubmenus)
		{
			$objTemplate->slidingSubmenus = 'slidingSubmenus: false';
		}

		// mmenu option 'counters.add': default value is 'false'
		if ($objMmenu->dk_mmenuCountersAdd)
		{
			$objTemplate->countersAdd = 'add: true';
		}

		// mmenu option 'searchfield.add': default value is 'false'
		if ($objMmenu->dk_mmenuSearchfieldAdd)
		{
			$objTemplate->searchfieldAdd = 'add: true';
			$objTemplate->searchfieldPlaceholder = 'placeholder: "' . $GLOBALS['TL_LANG']['DK_MMENU']['placeholder'] . '"';
			$objTemplate->searchfieldNoResults = 'noResults: "' . $GLOBALS['TL_LANG']['DK_MMENU']['noresult'] . '"';
		}

		// mmenu option 'onClick.close': default value is 'true'
		if (!$objMmenu->dk_mmenuOnClickClose)
		{
			$objTemplate->onClickClose = 'close: false';
		}

		// mmenu option 'onClick.delayPageload': default value is 'true'
		if (!$objMmenu->dk_mmenuOnClickDelayPageLoad)
		{
			$objTemplate->onClickDelayPageLoad = 'delayPageload: false';
		}

		// mmenu option 'onClick.blockUI': default value is 'false'
		if ($objMmenu->dk_mmenuOnClickBlockUI)
		{
			$objTemplate->onClickBlockUI = 'blockUI: true';
		}

		// ... global css style file
		$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/mmenu.css||static';

		// ... theme css style file
		if ($objMmenu->dk_mmenuTheme != 'default')
		{
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/' . $objTemplate->dk_mmenuTheme . '.css||static';
		}

		// ... the mmenu javascript
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/jquery.mmenu.min.js|static';
	}
}
