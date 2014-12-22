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
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['mmenu_appearance_legend'] = 'mmenu appearance';
$GLOBALS['TL_LANG']['tl_module']['mmenu_behaviour_legend'] = 'mmenu behaviour';
$GLOBALS['TL_LANG']['tl_module']['mmenu_effects_legend'] = 'mmenu effects';
$GLOBALS['TL_LANG']['tl_module']['mmenu_legend'] = 'mmenu settings';


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'][0] = 'Position of menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'][1] = 'Choose the position of the menu.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'][0] = 'Z-position of menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'][1] = 'Choose the z-position of the menu.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'][0] = 'Kind of menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'][1] = 'Determines whether submenus should come sliding in from the right or to expand below.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'][0] = 'Theme of menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'][1] = 'Choose a theme for the menu.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMoveBackground'][0] = 'Move background';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMoveBackground'][1] = 'Determines whether or not the page should inherit the background of the body when the menu opens.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFullscreen'][0] = 'Fullscreen';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFullscreen'][1] = 'Determines whether the menu will fill up 80% (default) of the available width/height or 100% (fullscreen).';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'][0] = 'Show submenu counter';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'][1] = 'Determines whether or not to append a counter to each menu item if it has a submenu and automatically counting the number of items inside.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'][0] = 'Show submenu counter';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'][1] = 'Determines whether or not to append a counter to each menu item if it has a submenu and automatically counting the number of items inside.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'][0] = 'Update submenu counter';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'][1] = 'Determines whether or not to automatically count the number of items in the submenu, updates when typing in the search field.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'][0] = 'Show searchfield';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'][1] = 'Determines whether or not to automatically prepend a searchfield to the menu.';

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectSlide'][0] = 'Slide in';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectSlide'][1] = 'Makes the menu slide in from the side.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectZoomMenu'][0] = 'Zoom menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectZoomMenu'][1] = 'Makes the menu zoom in.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectZoomPanels'][0] = 'Zoom panels';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectZoomPanels'][1] = 'Makes the panels zoom out while opening a submenu.';

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenOpen'][0] = 'Drag page to open menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenOpen'][1] = 'Determines whether or not the menu should open when dragging the page.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'][0] = 'Amount of pixels to drag';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'][1] = 'Determines the minimum amount of pixels to drag before actually opening the menu, less than 50 is not advised.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'][0] = 'Menu closes after click';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'][1] = 'Determines whether or not the menu should close after clicking a link inside it.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickBlockUI'][0] = 'Block user interface';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickBlockUI'][1] = 'Determines whether or not to block the user interface while loading the new page.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuModal'][0] = 'modal menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuModal'][1] = 'Determines whether or not the menu should be modal. A close button has to be provided.';

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuArticle'][0] = 'mmenu article';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuArticle'][1] = 'Choose the article.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuHtmlTpl'][0] = 'HTML template';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuHtmlTpl'][1] = 'Choose the HTML template.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuJsTpl'][0] = 'JavaScript template';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuJsTpl'][1] = 'Choose the JavaScript template.';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['left'] = 'left';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['right'] = 'right';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['top'] = 'top';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['bottom'] = 'bottom';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition']['back'] = 'back';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition']['front'] = 'front';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition']['next'] = 'next';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['black'] = 'black';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['standard'] = 'dark';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['light'] = 'medium grey (light)';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['lighter'] = 'light grey (light)';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['lightest'] = 'light';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['white'] = 'white';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['army'] = 'army (dark)';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['bordeaux'] = 'bordeaux (dark)';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme']['navy'] = 'navy (dark)';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus']['horizontal'] = 'horizontal';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus']['vertical'] = 'vertical';
