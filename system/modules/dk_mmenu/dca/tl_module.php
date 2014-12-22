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
 * Add palettes to tl_module
 */
//$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'dk_mmenuCountersAdd';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'dk_mmenuDragOpenOpen';

$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu'] = '{title_legend},name,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected;{reference_legend:hide},defineRoot;{mmenu_appearance_legend},dk_mmenuPosition,dk_mmenuZposition,dk_mmenuSlidingSubmenus,dk_mmenuTheme,dk_mmenuMoveBackground,dk_mmenuFullscreen,dk_mmenuCountersAdd,dk_mmenuSearchfieldAdd;{mmenu_effects_legend:hide},dk_mmenuEffectSlide,dk_mmenuEffectZoomMenu,dk_mmenuEffectZoomPanels;{mmenu_behaviour_legend},dk_mmenuDragOpenOpen,dk_mmenuOnClickClose,dk_mmenuOnClickBlockUI;{template_legend:hide},navigationTpl,dk_mmenuHtmlTpl,dk_mmenuJsTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['custommmenu'] = '{title_legend},name,type;{nav_legend},pages,showProtected;{mmenu_appearance_legend},dk_mmenuPosition,dk_mmenuZposition,dk_mmenuSlidingSubmenus,dk_mmenuTheme,dk_mmenuMoveBackground,dk_mmenuFullscreen,dk_mmenuCountersAdd,dk_mmenuSearchfieldAdd;{mmenu_effects_legend:hide},dk_mmenuEffectSlide,dk_mmenuEffectZoomMenu,dk_mmenuEffectZoomPanels;{mmenu_behaviour_legend},dk_mmenuDragOpenOpen,dk_mmenuOnClickClose,dk_mmenuOnClickBlockUI;{template_legend:hide},navigationTpl,dk_mmenuHtmlTpl,dk_mmenuJsTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmenu_article'] = '{title_legend},name,headline,type;{mmenu_appearance_legend},dk_mmenuPosition,dk_mmenuZposition;{mmenu_effects_legend:hide},dk_mmenuEffectSlide,dk_mmenuEffectZoomMenu,dk_mmenuEffectZoomPanels;{mmenu_behaviour_legend},dk_mmenuDragOpenOpen,dk_mmenuModal;{mmenu_legend},dk_mmenuArticle,dk_mmenuHtmlTpl,dk_mmenuJsTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

//$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dk_mmenuCountersAdd'] = 'dk_mmenuCountersUpdate';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['dk_mmenuDragOpenOpen'] = 'dk_mmenuDragOpenThreshold';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuPosition'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'default'			=> 'left',
	'options'			=> array('left', 'right', 'top', 'bottom'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuPosition'],
	'eval'				=> array('submitOnChange' => true, 'tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuZposition'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options_callback'	=> array('tl_module_dk_mmenu', 'getZpositionOptions'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuZposition'],
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSlidingSubmenus'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'default'			=> 'horizontal',
	'options'			=> array('horizontal', 'vertical'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSlidingSubmenus'],
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuTheme'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'default'			=> 'standard',
	'options'			=> array('black', 'standard', 'light', 'lighter', 'lightest', 'white', 'army', 'bordeaux', 'navy'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTheme'],
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuMoveBackground'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuMoveBackground'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuFullscreen'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuFullscreen'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersAdd'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersAdd'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array(/*'submitOnChange' => true,*/ 'tl_class' => 'clr w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuCountersUpdate'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuCountersUpdate'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuSearchfieldAdd'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuSearchfieldAdd'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuEffectSlide'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectSlide'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuEffectZoomMenu'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectZoomMenu'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuEffectZoomPanels'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuEffectZoomPanels'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenOpen'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenOpen'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('submitOnChange' => true),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenThreshold'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenThreshold'],
	'exclude'			=> true,
	'inputType'			=> 'text',
	'eval'				=> array('maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'),
	'sql'				=> "smallint(5) NOT NULL default '50'"
);

/*$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuDragOpenMaxStartPos'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuDragOpenMaxStartPos'],
	'exclude'			=> true,
	'inputType'			=> 'text',
	'eval'				=> array('maxlength' => 3, 'rgxp' => 'digit', 'tl_class' => 'w50'),
	'sql'				=> "smallint(5) NOT NULL default '100'"
);*/

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickClose'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickClose'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'clr w50'),
	'sql'				=> "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuOnClickBlockUI'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuOnClickBlockUI'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuModal'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuModal'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class' => 'clr'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuArticle'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuArticle'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options_callback'	=> array('tl_module_dk_mmenu', 'getArticles'),
	'eval'				=> array('includeBlankOption' => true, 'mandatory' => true, 'chosen' => true, 'submitOnChange' => true, 'tl_class' => 'w50'),
	'wizard'			=> array(array('tl_module_dk_mmenu', 'editArticle')),
	'sql'				=> "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuTpl'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuTpl'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options_callback'	=> array('tl_module_dk_mmenu', 'getTemplates'),
	'eval'				=> array('maxlength' => 255, 'tl_class' => 'w50'),
	'sql'				=> "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuHtmlTpl'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuHtmlTpl'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options_callback'	=> array('tl_module_dk_mmenu', 'getHtmlTemplates'),
	'eval'				=> array('maxlength' => 255, 'tl_class' => 'w50 clr'),
	'sql'				=> "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dk_mmenuJsTpl'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['dk_mmenuJsTpl'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options_callback'	=> array('tl_module_dk_mmenu', 'getJsTemplates'),
	'eval'				=> array('maxlength' => 255, 'tl_class' => 'w50'),
	'sql'				=> "varchar(255) NOT NULL default ''"
);


/**
 * Class tl_module_dk_mmenu
 *
 * @copyright  Dirk Klemmt 2013-2015
 * @author     Dirk Klemmt
 * @package    mmenu
 */
class tl_module_dk_mmenu extends tl_module
{

	/**
	 * Get all articles and return them as array (article teaser)
	 * @param \DataContainer
	 * @return array
	 */
	public function getArticles(DataContainer $dc)
	{
		$arrPids = array();
		$arrArticle = array();
		$arrRoot = array();
		$intPid = $dc->activeRecord->pid;

		if (Input::get('act') == 'overrideAll')
		{
			$intPid = Input::get('id');
		}

		// Limit pages to the website root
		$objArticle = $this->Database->prepare("SELECT pid FROM tl_article WHERE id=?")
									 ->limit(1)
									 ->execute($intPid);

		if ($objArticle->numRows)
		{
			$objPage = PageModel::findWithDetails($objArticle->pid);
			$arrRoot = $this->Database->getChildRecords($objPage->rootId, 'tl_page');
			array_unshift($arrRoot, $objPage->rootId);
		}

		unset($objArticle);

		// Limit pages to the user's pagemounts
		if ($this->User->isAdmin)
		{
			$objArticle = $this->Database->execute("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid" . (!empty($arrRoot) ? " WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrRoot))) .")" : "") . " ORDER BY parent, a.sorting");
		}
		else
		{
			foreach ($this->User->pagemounts as $id)
			{
				if (!in_array($id, $arrRoot))
				{
					continue;
				}

				$arrPids[] = $id;
				$arrPids = array_merge($arrPids, $this->Database->getChildRecords($id, 'tl_page'));
			}

			if (empty($arrPids))
			{
				return $arrArticle;
			}

			$objArticle = $this->Database->execute("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrPids))) .") ORDER BY parent, a.sorting");
		}

		// Edit the result
		if ($objArticle->numRows)
		{
			System::loadLanguageFile('tl_article');

			while ($objArticle->next())
			{
				$key = $objArticle->parent . ' (ID ' . $objArticle->pid . ')';
				$arrArticle[$key][$objArticle->id] = $objArticle->title . ' (' . ($GLOBALS['TL_LANG']['tl_article'][$objArticle->inColumn] ?: $objArticle->inColumn) . ', ID ' . $objArticle->id . ')';
			}
		}

		return $arrArticle;
	}


	/**
	 * Return the edit mmenu wizard
	 *
	 * @param \DataContainer
	 * @return string
	 */
	public function editArticle(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=article&amp;table=tl_content&amp;id=' . $dc->value . '&amp;rt=' . REQUEST_TOKEN . '" title="'.sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value).'" style="padding-left:3px">' . $this->generateImage('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"') . '</a>';
	}


	/**
	 * Return all mmenu module templates as array
	 *
	 * @return array
	 */
	public function getHtmlTemplates()
	{
		return $this->getTemplateGroup('mod_mmenu');
	}


	/**
	 * Return all mmenu JavaScript templates as array
	 *
	 * @return array
	 */
	public function getJsTemplates()
	{
		return $this->getTemplateGroup('js_mmenu');
	}
	
	
	/**
	 * Return all possible z-position options for selected menu position as array
	 *
	 * @param \DataContainer
	 * @return array
	 */
	public function getZpositionOptions(DataContainer $dc)
	{
		$zpositionOptions = array('front');

		// check if menu position is 'top' or 'bottom'...
		$obj = $this->Database
				->prepare("SELECT dk_mmenuPosition
						   FROM   tl_module
						   WHERE  id = ?
						   AND    dk_mmenuPosition = 'top' or dk_mmenuPosition = 'bottom'")
				->limit(1)
				->execute($dc->id);

		// ...if not every position is allowed
		if (!$obj->numRows)
		{
			$zpositionOptions = array('back', 'front', 'next');
		}

		return $zpositionOptions;
	}
}
