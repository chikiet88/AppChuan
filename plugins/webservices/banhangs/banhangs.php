<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Webservices.Banhangs
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Router\ApiRouter;

/**
 * Web Services adapter for com_banhangs.
 *
 * @since  4.0.0
 */
class PlgWebservicesBanhangs extends CMSPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  4.0.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * Registers com_banhangs's API's routes in the application
	 *
	 * @param   ApiRouter  &$router  The API Routing object
	 *
	 * @return  void
	 *
	 * @since   4.0.0
	 */
	public function onBeforeApiRoute(&$router)
	{
		$router->createCRUDRoutes(
			'v1/banhangs/banhangs',
			'banhangs',
			['component' => 'com_banhangs']
		);

		$router->createCRUDRoutes(
			'v1/banhangs/categories',
			'categories',
			['component' => 'com_categories', 'extension' => 'com_banhangs']
		);
	}
}
