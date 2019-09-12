<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) Dirk Klemmt
 * (c) inspiredminds
 *
 * @license MIT
 */

/*
 * Legends.
 */
$GLOBALS['TL_LANG']['tl_module']['mmenu_appearance_legend'] = 'mmenu appearance';
$GLOBALS['TL_LANG']['tl_module']['mmenu_behaviour_legend'] = 'mmenu behaviour';
$GLOBALS['TL_LANG']['tl_module']['mmenu_effects_legend'] = 'mmenu effects';
$GLOBALS['TL_LANG']['tl_module']['mmenu_legend'] = 'mmenu settings';

/*
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
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'][0] = 'Update submenu counter';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'][1] = 'Determines whether or not to automatically count the number of items in the submenu, updates when typing in the search field.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuColumnsAdd'][0] = 'Show submenu columns';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuColumnsAdd'][1] = 'Determines whether the panels should be split up into multiple columns.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'][0] = 'Show searchfield';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'][1] = 'Determines whether or not to automatically prepend a searchfield to the menu.';

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenEnable'][0] = 'Drag page to open menu';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenEnable'][1] = 'Determines whether or not the menu should open when dragging the page.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'][0] = 'Amount of pixels to drag';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'][1] = 'Determines the minimum amount of pixels to drag before actually opening the menu, less than 50 is not advised.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPolyfillEnable'][0] = 'Add JavaScript Polyfill';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPolyfillEnable'][1] = 'Determines whether or not the IE10 and IE11 JavaScript Polyfill should be available.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'][0] = 'Menu closes after click';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'][1] = 'Determines whether or not the menu should close after clicking a link inside it.';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFixedElementAdd'][0] = 'Support fixed and sticky elements';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFixedElementAdd'][1] = 'Adds support elements with position: fixed and position: sticky, so they don\'t disappear when opening the menu.';

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuJsTpl'][0] = 'JavaScript template';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuJsTpl'][1] = 'Choose the JavaScript template.';

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMenuEffects'] = ['Menu effects', 'Available effects for the menu.'];
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPanelEffects'] = ['Panel effects', 'Available effects for the panels.'];
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuListEffects'] = ['List items effects', 'Available effects for the list items.'];
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuShadows'] = ['Shadows', 'You can choose which elements get a shadow.'];

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPageSelector'] = ['Wrapper selector', 'Custom defined page wrapper CSS selector (e.g. "#wrapper").'];
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenMaxStartPos'] = ['Maximum start position', 'Maximum horizontal start position for dragging.'];
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPageDim'] = ['Page dim', 'Enables page dimming.'];

$GLOBALS['TL_LANG']['tl_module']['dk_mmenuIconPanels'] = ['Show small part of parent panel', 'When enabled, this will show a small part of the parent panel, when opening a sub-panel.'];

/*
 * References
 */
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['left'] = 'left';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['right'] = 'right';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['top'] = 'top';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition']['bottom'] = 'bottom';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition']['back'] = 'back';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition']['front'] = 'front';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition']['next'] = 'next';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus']['horizontal'] = 'horizontal';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus']['vertical'] = 'vertical';
$GLOBALS['TL_LANG']['tl_module']['dk_mmenuShadowsOptions'] = [
    'menu' => 'Menu',
    'page' => 'Page',
    'panels' => 'Panels',
];
