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
 * @author     Fritz Michael Gschwantner <fmg@inspiredminds.at>
 * @package    mmenu
 */
class Mmenu extends \Frontend 
{

	public function createTemplateData(\Template $objTemplateHtml, \Template $objTemplateJs)
	{
		$addPositioningCssFile = false;
		$addThemeCssFile = false;
		$arrExtensions = array();

		$objMmenu = \ModuleModel::findByPk($objTemplateHtml->id);
		if ($objMmenu === null)
		{
			return;
		}

		// add main mmenu css style file
		$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/jquery.mmenu.css|static';

		// add main mmenu jquery file
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/jquery.mmenu.js|static';

        // add navbars addon
        $GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/navbars/jquery.mmenu.navbars.css|static';
        $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/navbars/jquery.mmenu.navbars.js|static';

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
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/extensions/positioning/jquery.mmenu.positioning.css|static';
		}

		// mmenu option 'slidingSubmenus': default value is 'true'
		if ($objMmenu->dk_mmenuSlidingSubmenus != 'horizontal')
		{
			$arrExtensions[] = 'fx-panels-slide-up';
		}

		// mmenu extension 'fullscreen'
		if ($objMmenu->dk_mmenuFullscreen)
		{
			$arrExtensions[] = 'fullscreen';

			// add mmenu fullscreen css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/extensions/jquery.mmenu.fullscreen.css|static';
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
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/counters/jquery.mmenu.counters.css|static';

			// add mmenu counters jquery file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/counters/jquery.mmenu.counters.js|static';
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
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/searchfield/jquery.mmenu.searchfield.css|static';

			// add mmenu searchfield jquery file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/searchfield/jquery.mmenu.searchfield.js|static';
		}

		// mmenu extension 'effects'
		if ($objMmenu->dk_mmenuEffectSlide || $objMmenu->dk_mmenuEffectZoomMenu || $objMmenu->dk_mmenuEffectZoomPanels)
		{
			if ($objMmenu->dk_mmenuEffectSlide)
			{
				$arrExtensions[] = 'fx-menu-slide';
				$objMmenu->dk_mmenuZposition = 'back';
			}

			if ($objMmenu->dk_mmenuEffectZoomMenu)
			{
				$arrExtensions[] = 'fx-menu-zoom';
			}

			if ($objMmenu->dk_mmenuEffectZoomPanels)
			{
				$arrExtensions[] = 'fx-panels-zoom';
			}

			// add mmenu fullscreen css style file
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/extensions/effects/jquery.mmenu.effects.css|static';
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
			$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/drag/jquery.mmenu.drag.css|static';

			// add mmenu dragopen jquery file
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/addons/drag/jquery.mmenu.drag.js|static';
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
                case 'dark':
                    $arrExtensions[] = 'theme-dark';
                    $addThemeCssFile = true;
                    break;
				
				case 'black':
					$arrExtensions[] = 'theme-black';
					$addThemeCssFile = true;
					break;

				case 'white':
					$arrExtensions[] = 'theme-white';
					$addThemeCssFile = true;
					break; 
			}

			if ($addThemeCssFile)
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/vendor/mmenu/extensions/themes/jquery.mmenu.themes.css|static';
			}
			elseif (in_array($objMmenu->dk_mmenuTheme, array('army', 'bordeaux', 'light', 'lighter', 'navy')))
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/dk_mmenu/assets/css/themes/' . $objMmenu->dk_mmenuTheme . '.css|static';
			}
		}

		// add extensions
		$objTemplateJs->extensions = $arrExtensions;

		// ... element dependent javascript caller
		$GLOBALS['TL_JQUERY'][] = $objTemplateJs->parse();					
	}
}
