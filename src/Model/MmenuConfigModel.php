<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) Dirk Klemmt
 * (c) INSPIRED MINDS
 *
 * @license MIT
 */

namespace DirkKlemmt\ContaoMmenuBundle\Model;

use Contao\Model;
use Contao\Model\Collection;

/**
 * @property int id
 * @property int tstamp
 * @property string title
 * @property string navbarTitle
 * @property string position
 * @property string zposition
 * @property string slidingSubmenus
 * @property string theme
 * @property bool themeHighContrast
 * @property bool countersAdd
 * @property bool searchfieldAdd
 * @property string pageSelector
 * @property bool iconPanels
 *
 * @method static MmenuConfigModel|null                                    findById($id, array $opt=[])
 * @method static MmenuConfigModel|null                                    findByPk($id, array $opt=[])
 * @method static Collection|array<MmenuConfigModel>|MmenuConfigModel|null findAll(array $opt = [])
 */
class MmenuConfigModel extends Model
{
    protected static $strTable = 'tl_dk_mmenu_config';
}
