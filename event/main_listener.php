<?php
/**
*
* @package D120.de Extended Site Description
* @copyright (c) 2015 Claudius Kleemann <claudius.kleemann@fachschaft.informatik.tu-darmstadt.de>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace d120de\extendedSiteDescription\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after' => 'override_site_description',
		);
	}

	/* @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\template			$template	Template object
	*/
	public function __construct(\phpbb\template\template $template)
	{
		$this->template = $template;
	}

	public function override_site_description($event)
	{
		$this->template->assign_var(
			'SITE_DESCRIPTION', 
			'<a href="https://www.fachschaft.informatik.tu-darmstadt.de">'
			.'Fachschaft Informatik</a><br>'
			.'<a href="https://www.informatik.tu-darmstadt.de">'
			.'FB Informatik</a><br>'
			.'<a href="https://www.tu-darmstadt.de">TU Darmstadt</a>'
		);
	}
}
