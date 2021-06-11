<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_banhangs
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Layout\LayoutHelper;

$displayData = [
	'textPrefix' => 'COM_BANHANGS',
	'formURL'    => 'index.php?option=com_banhangs&view=banhangs',
	'helpURL'    => 'https://docs.joomla.org/Special:MyLanguage/Help4.x:News_Feeds',
	'icon'       => 'icon-rss banhangs',
];

$user = Factory::getApplication()->getIdentity();

if ($user->authorise('core.create', 'com_banhangs') || count($user->getAuthorisedCategories('com_banhangs', 'core.create')) > 0)
{
	$displayData['createURL'] = 'index.php?option=com_banhangs&task=banhang.add';
}

echo LayoutHelper::render('joomla.content.emptystate', $displayData);
