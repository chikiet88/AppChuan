<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_banhangs
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Banhangs\Administrator\Field;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\ListField;

/**
 * Bán Hàng List field.
 *
 * @since  1.6
 */
class BanhangsField extends ListField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'Banhangs';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   1.6
	 */
	protected function getOptions()
	{
		$options = array();

		$db    = Factory::getDbo();
		$query = $db->getQuery(true)
			->select(
				[
					$db->quoteName('id', 'value'),
					$db->quoteName('name', 'text'),
				]
			)
			->from($db->quoteName('#__banhangs', 'a'))
			->order($db->quoteName('a.name'));

		// Get the options.
		$db->setQuery($query);

		try
		{
			$options = $db->loadObjectList();
		}
		catch (\RuntimeException $e)
		{
			Factory::getApplication()->enqueueMessage($db->getMessage(), 'error');
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
