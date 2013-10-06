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

		$objTemplate->isMenu = 'isMenu: ' . ($objMmenu->type != 'mmenu_article' ? 'true' : 'false');

		// mmenu option 'modal': default value is 'false'
		if ($objMmenu->dk_mmenuModal)
		{
			$objTemplate->modal = 'modal: true';
		}

		// mmenu option 'position': default value is 'left'
		if ($objMmenu->dk_mmenuPosition != 'left')
		{
			$objTemplate->position = 'position: "' . $objMmenu->dk_mmenuPosition . '"';
		}

		// mmenu option 'zposition': default value is 'back'
		if ($objMmenu->dk_mmenuZposition != 'back')
		{
			$objTemplate->zposition = 'zposition: "' . $objMmenu->dk_mmenuZposition . '"';
		}

		// mmenu option 'slidingSubmenus': default value is 'true'
		if ($objMmenu->dk_mmenuSlidingSubmenus != 'horizontal')
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

		// mmenu option 'dragOpen.open': default value is 'false'
		if ($objMmenu->dk_mmenuDragOpenOpen)
		{
			$objTemplate->dragOpenOpen = 'open: true';
			if (isset($objMmenu->dk_mmenuDragOpenThreshold) && $objMmenu->dk_mmenuDragOpenThreshold != '50')
			{
				$objTemplate->dragOpenThreshold = 'threshold: ' . $objMmenu->dk_mmenuDragOpenThreshold;
			}
		}

		// mmenu option 'onClick.close': default value is 'true'
		if (!$objMmenu->dk_mmenuOnClickClose)
		{
			$objTemplate->onClickClose = 'close: false';
		}

		// mmenu option 'onClick.delayLocationHref': default value is 'true'
		if (!$objMmenu->dk_mmenuOnClickDelayLocationHref)
		{
			$objTemplate->onClickDelayLocationHref = 'delayLocationHref: false';
		}

		// mmenu option 'onClick.blockUI': default value is 'false'
		if ($objMmenu->dk_mmenuOnClickBlockUI)
		{
			$objTemplate->onClickBlockUI = 'blockUI: true';
		}

		// ... global css style file
		$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/mmenu.css||static';

		// ... positioning css style file
		$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/mmenu-positioning.css||static';

		// ... theme css style file
		if ($objMmenu->dk_mmenuTheme != 'standard')
		{
			if ($objMmenu->dk_mmenuTheme == 'light' || $objMmenu->dk_mmenuTheme == 'lighter' || $objMmenu->dk_mmenuTheme == 'lightest')
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/mmenu-theme-light.css||static';
			}
			if ($objMmenu->dk_mmenuTheme != 'lightest')
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/' . $objTemplate->dk_mmenuTheme . '.css||static';
			}
		}

		// ... fix for 'contao mobile viewport' css style file
		$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/dk_mmenu.css||static';

		// ... the mmenu javascript
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/jquery.mmenu.min.js|static';
		if ($objMmenu->dk_mmenuDragOpenOpen)
		{
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/jquery.hammer.min.js|static';
		}
	}
}
