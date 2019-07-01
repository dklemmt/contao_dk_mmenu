<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) inspiredminds
 *
 * @license MIT
 */

use DirkKlemmt\ContaoMmenuBundle\DataContainer\ModuleCallbacks;

/*
 * Add palettes to tl_module.
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'dk_mmenuDragOpenOpen';

$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu'] = '{title_legend},name,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected,showHidden;{reference_legend:hide},defineRoot;{mmenu_appearance_legend},dk_mmenuPosition,dk_mmenuZposition,dk_mmenuSlidingSubmenus,dk_mmenuTheme,dk_mmenuMoveBackground,dk_mmenuFullscreen,dk_mmenuCountersAdd,dk_mmenuSearchfieldAdd;{mmenu_effects_legend:hide},dk_mmenuMenuEffects,dk_mmenuPanelEffects,dk_mmenuListEffects;{mmenu_behaviour_legend:hide},dk_mmenuDragOpenOpen,dk_mmenuOnClickClose,dk_mmenuOnClickBlockUI,dk_mmenuFixedElementAdd;{template_legend:hide},navigationTpl,customTpl,dk_mmenuJsTpl,dk_mmenuPageSelector;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['custommmenu'] = '{title_legend},name,type;{nav_legend},pages,showProtected;{mmenu_appearance_legend},dk_mmenuPosition,dk_mmenuZposition,dk_mmenuSlidingSubmenus,dk_mmenuTheme,dk_mmenuMoveBackground,dk_mmenuFullscreen,dk_mmenuCountersAdd,dk_mmenuSearchfieldAdd;{mmenu_effects_legend:hide},dk_mmenuMenuEffects,dk_mmenuPanelEffects,dk_mmenuListEffects;{mmenu_behaviour_legend:hide},dk_mmenuDragOpenOpen,dk_mmenuOnClickClose,dk_mmenuOnClickBlockUI,dk_mmenuFixedElementAdd;{template_legend:hide},navigationTpl,customTpl,dk_mmenuJsTpl,dk_mmenuPageSelector;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu_article'] = '{title_legend},name,headline,type;{mmenu_appearance_legend},dk_mmenuPosition,dk_mmenuZposition;{mmenu_effects_legend:hide},dk_mmenuMenuEffects,dk_mmenuPanelEffects,dk_mmenuListEffects;{mmenu_behaviour_legend:hide},dk_mmenuDragOpenOpen,dk_mmenuModal,dk_mmenuFixedElementAdd;{mmenu_legend},dk_mmenuArticle,customTpl,dk_mmenuJsTpl,dk_mmenuPageSelector;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dk_mmenuDragOpenOpen'] = 'dk_mmenuDragOpenThreshold';

/*
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPosition'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'left',
    'options' => ['left', 'right', 'top', 'bottom'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
    'eval' => ['submitOnChange' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuZposition'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'back',
    'options' => ['back', 'front'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSlidingSubmenus'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'horizontal',
    'options' => ['horizontal', 'vertical'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuTheme'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'light',
    'options' => ['light', 'dark', 'black', 'white'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuMoveBackground'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMoveBackground'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuFullscreen'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFullscreen'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersAdd'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => [/*'submitOnChange' => true,*/ 'tl_class' => 'clr w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersUpdate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSearchfieldAdd'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuMenuEffects'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMenuEffects'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['fade', 'slide', 'zoom'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPanelEffects'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPanelEffects'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['none', 'slide-0', 'slide-100', 'slide-up', 'zoom'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuListEffects'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuListEffects'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['drop', 'fade', 'slide'],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenOpen'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenOpen'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenThreshold'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "smallint(5) NOT NULL default '50'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickClose'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50'],
    'sql' => "char(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickBlockUI'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickBlockUI'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuFixedElementAdd'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFixedElementAdd'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuModal'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuModal'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuArticle'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuArticle'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_module_dk_mmenu', 'getArticles'],
    'eval' => ['includeBlankOption' => true, 'mandatory' => true, 'chosen' => true, 'submitOnChange' => true, 'tl_class' => 'w50'],
    'wizard' => [['tl_module_dk_mmenu', 'editArticle']],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuJsTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuJsTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => [ModuleCallbacks::class, 'onMmenuJsTplOptionsCallback'],
    'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPageSelector'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPageSelector'],
    'exclude' => true,
    'default' => '#wrapper',
    'inputType' => 'text',
    'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

/*
 * Set navigationTpl to nav_mmenu
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['navigationTpl']['load_callback'][] = [ModuleCallbacks::class, 'onNavigationTplLoadCallback'];

/**
 * Class tl_module_dk_mmenu.
 *
 * @copyright  Dirk Klemmt 2013-2015
 */
class tl_module_dk_mmenu extends tl_module
{
    /**
     * Get all articles and return them as array (article teaser).
     *
     * @param \DataContainer
     *
     * @return array
     */
    public function getArticles(DataContainer $dc)
    {
        $arrPids = [];
        $arrArticle = [];
        $arrRoot = [];
        $intPid = $dc->activeRecord->pid;

        if ('overrideAll' === Input::get('act')) {
            $intPid = Input::get('id');
        }

        // Limit pages to the website root
        $objArticle = $this->Database->prepare('SELECT pid FROM tl_article WHERE id=?')
                                     ->limit(1)
                                     ->execute($intPid)
        ;

        if ($objArticle->numRows) {
            $objPage = PageModel::findWithDetails($objArticle->pid);
            $arrRoot = $this->Database->getChildRecords($objPage->rootId, 'tl_page');
            array_unshift($arrRoot, $objPage->rootId);
        }

        unset($objArticle);

        // Limit pages to the user's pagemounts
        if ($this->User->isAdmin) {
            $objArticle = $this->Database->execute('SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid'.(!empty($arrRoot) ? ' WHERE a.pid IN('.implode(',', array_map('intval', array_unique($arrRoot))).')' : '').' ORDER BY parent, a.sorting');
        } else {
            foreach ($this->User->pagemounts as $id) {
                if (!\in_array($id, $arrRoot, true)) {
                    continue;
                }

                $arrPids[] = $id;
                $arrPids = array_merge($arrPids, $this->Database->getChildRecords($id, 'tl_page'));
            }

            if (empty($arrPids)) {
                return $arrArticle;
            }

            $objArticle = $this->Database->execute('SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.pid IN('.implode(',', array_map('intval', array_unique($arrPids))).') ORDER BY parent, a.sorting');
        }

        // Edit the result
        if ($objArticle->numRows) {
            System::loadLanguageFile('tl_article');

            while ($objArticle->next()) {
                $key = $objArticle->parent.' (ID '.$objArticle->pid.')';
                $arrArticle[$key][$objArticle->id] = $objArticle->title.' ('.($GLOBALS['TL_LANG']['tl_article'][$objArticle->inColumn] ?: $objArticle->inColumn).', ID '.$objArticle->id.')';
            }
        }

        return $arrArticle;
    }

    /**
     * Return the edit mmenu wizard.
     *
     * @param \DataContainer
     *
     * @return string
     */
    public function editArticle(DataContainer $dc)
    {
        return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=article&amp;table=tl_content&amp;id='.$dc->value.'&amp;rt='.REQUEST_TOKEN.'" title="'.sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value).'" style="padding-left:3px">'.$this->generateImage('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"').'</a>';
    }
}
