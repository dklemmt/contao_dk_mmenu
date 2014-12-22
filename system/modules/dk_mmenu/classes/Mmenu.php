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
 * Class Mmenu
 *
 * @copyright  Dirk Klemmt 2013-2015
 * @author     Dirk Klemmt
 * @package    mmenu
 */
class Mmenu extends \Frontend 
{

	public function createTemplateData(\Template $objTemplateHtml, \Template $objTemplateJs)
	{
		$addPositioningCssFile = false;
		$addThemeCssFile = false;
		$objTemplateJs->classes = '';

		$objMmenu = \ModuleModel::findByPk($objTemplateHtml->id);
		if ($objMmenu === null)
		{
			return;
		}

		// add main mmenu css style file
		$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/jquery.mmenu.css||static';

		// add main mmenu jquery file
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/jquery.mmenu.min.js|static';

		$objTemplateJs->isMenu = 'isMenu: ' . ($objMmenu->type != 'mmenu_article' ? 'true' : 'false');

		// mmenu offCanvas add-on
		$objTemplateJs->offCanvas = true;

		// offCanvas option 'offCanvas.modal': default value is 'false'
		if ($objMmenu->dk_mmenuModal)
		{
			$objTemplateJs->offCanvasModal = 'modal: true';
		}

		// offCanvas option 'offCanvas.moveBackground': default value is 'true'
		if ($objMmenu->dk_mmenuMoveBackground)
		{
			$objTemplateJs->offCanvasMoveBackground = 'moveBackground: false';
		}
	
		// offCanvas option 'offCanvas.position': default value is 'left'
		if ($objMmenu->dk_mmenuPosition != 'left')
		{
			$objTemplateJs->offCanvasPosition = 'position: "' . $objMmenu->dk_mmenuPosition . '"';
			$addPositioningCssFile = true;
		}

		// offCanvas option 'offCanvas.zposition': default value is 'back'
		if ($objMmenu->dk_mmenuZposition != 'back')
		{
			$objTemplateJs->offCanvasZposition = 'zposition: "' . $objMmenu->dk_mmenuZposition . '"';
			$addPositioningCssFile = true;
		}

		// add mmenu positioning css style file
		if ($addPositioningCssFile)
		{
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/extensions/jquery.mmenu.positioning.css||static';
		}

		// mmenu option 'slidingSubmenus': default value is 'true'
		if ($objMmenu->dk_mmenuSlidingSubmenus != 'horizontal')
		{
			$objTemplateJs->slidingSubmenus = 'slidingSubmenus: false';
		}

		// mmenu extension 'fullscreen'
		if ($objMmenu->dk_mmenuFullscreen)
		{
			$objTemplateJs->classes .= 'mm-fullscreen ';

			// add mmenu fullscreen css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/extensions/jquery.mmenu.fullscreen.css||static';
		}

		// mmenu counters add-on
		// counters option 'counters.add': default value is 'false'
		if ($objMmenu->dk_mmenuCountersAdd)
		{
			$objTemplateJs->countersAdd = 'add: true';

			// counters option 'counters.update': default value is 'false'
			if ($objMmenu->dk_mmenuCountersUpdate)
			{
				$objTemplateJs->countersUpdate = 'update: true';
			}

			// add mmenu counters css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/addons/jquery.mmenu.counters.css||static';

			// add mmenu counters jquery file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/addons/jquery.mmenu.counters.min.js|static';
		}

		// mmenu searchfield add-on
		// mmenu option 'searchfield.add': default value is 'false'
		if ($objMmenu->dk_mmenuSearchfieldAdd)
		{
			$objTemplateJs->searchfieldAdd = 'add: true';
			$objTemplateJs->searchfieldSearch = 'search: true';
			$objTemplateJs->searchfieldPlaceholder = 'placeholder: "' . $GLOBALS['TL_LANG']['DK_MMENU']['placeholder'] . '"';
			$objTemplateJs->searchfieldNoResults = 'noResults: "' . $GLOBALS['TL_LANG']['DK_MMENU']['noresult'] . '"';
			$objTemplateJs->searchfieldShowLinksOnly = 'showLinksOnly: true';

			// add mmenu searchfield css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/addons/jquery.mmenu.searchfield.css||static';

			// add mmenu searchfield jquery file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/addons/jquery.mmenu.searchfield.min.js|static';
		}

		// mmenu extension 'effects'
		if ($objMmenu->dk_mmenuEffectSlide || $objMmenu->dk_mmenuEffectZoomMenu || $objMmenu->dk_mmenuEffectZoomPanels)
		{
			if ($objMmenu->dk_mmenuEffectSlide)
			{
				$objTemplateJs->classes .= 'mm-slide ';
			}

			if ($objMmenu->dk_mmenuEffectZoomMenu)
			{
				$objTemplateJs->classes .= 'mm-zoom-menu ';
			}

			if ($objMmenu->dk_mmenuEffectZoomPanels)
			{
				$objTemplateJs->classes .= 'mm-zoom-panels ';
			}

			// add mmenu fullscreen css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/extensions/jquery.mmenu.effects.css||static';
		}

		// mmenu dragOpen add-on
		// dragOpen option 'dragOpen.open': default value is 'false'
		if ($objMmenu->dk_mmenuDragOpenOpen)
		{
			$objTemplateJs->dragOpenOpen = 'open: true';

			// dragOpen option 'dragOpen.threshold': default value is '50'
			if (isset($objMmenu->dk_mmenuDragOpenThreshold) && $objMmenu->dk_mmenuDragOpenThreshold != '50')
			{
				$objTemplateJs->dragOpenThreshold = 'threshold: ' . $objMmenu->dk_mmenuDragOpenThreshold;
			}

			// dragOpen option 'dragOpen.maxStartPos': default value is '100'
			if (isset($objMmenu->dk_mmenuDragOpenMaxStartPos) && $objMmenu->dk_mmenuDragOpenMaxStartPos != '100')
			{
				$objTemplateJs->dragOpenMaxStartPos = 'maxStartPos: ' . $objMmenu->dk_mmenuDragOpenMaxStartPos;
			}

			// add mmenu dragopen css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/addons/jquery.mmenu.dragopen.css||static';

			// add hammer library file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/hammer.min.js|static';

			// add mmenu dragopen jquery file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/js/addons/jquery.mmenu.dragopen.min.js|static';
		}

		// mmenu option 'onClick.close': default value is 'true'
		if (!$objMmenu->dk_mmenuOnClickClose)
		{
			$objTemplateJs->onClickClose = 'close: false';
		}

		// mmenu option 'onClick.blockUI': default value is 'false'
		if ($objMmenu->dk_mmenuOnClickBlockUI)
		{
			$objTemplateJs->onClickBlockUI = 'blockUI: true';
		}

		// mmenu extension 'themes'
		if ($objMmenu->dk_mmenuTheme != 'standard')
		{
			switch ($objMmenu->dk_mmenuTheme)
			{
				case 'light':
				case 'lighter':
				case 'lightest':
					$objTemplateJs->classes .= 'mm-light ';
					$addThemeCssFile = true;
					break;
				
				case 'black':
					$objTemplateJs->classes .= 'mm-black ';
					$addThemeCssFile = true;
					break;

				case 'white':
					$objTemplateJs->classes .= 'mm-white ';
					$addThemeCssFile = true;
					break; 
			}

			if ($addThemeCssFile)
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/extensions/jquery.mmenu.themes.css||static';
			}

			if ($objMmenu->dk_mmenuTheme != 'lightest' && $objMmenu->dk_mmenuTheme != 'black' && $objMmenu->dk_mmenuTheme != 'white')
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/themes/' . $objMmenu->dk_mmenuTheme . '.css||static';
			}
		}

		// ... element dependent javascript caller
		$GLOBALS['TL_JQUERY'][] = $objTemplateJs->parse();					
	}
}
