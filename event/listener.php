<?php
/**
*
* Custom Registration Agreement extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 Rubén Calvo <rubencm@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace rubencm\customregistrationagreement\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config        $config             Config object
	 * @param \phpbb\config\db_text       $config_text        DB text object
	 * @param \phpbb\template\template    $template           Template object
	 * @access public
	 */
	public function __construct(\phpbb\cache\driver\driver_interface $cache, \phpbb\config\config $config, \phpbb\config\db_text $config_text, \phpbb\template\template $template)
	{
		$this->cache = $cache;
		$this->config = $config;
		$this->config_text = $config_text;
		$this->template = $template;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.ucp_register_agreement'	=> 'add_registration_agreement',
		);
	}

	/**
	 * Replace registration agreement
	 *
	 * @param \phpbb\event\data $event The event object
	 * @return void
	 * @access public
	 */
	public function add_registration_agreement($event)
	{
		// Stop if custom agreement is disabled
		if (!$this->config['register_agreement_enable'])
		{
			return;
		}

		$register_agreement_data = $this->cache->get('_register_agreement_data');

		if ($register_agreement_data === false)
		{
			// Get board data from the config_text object
			$register_agreement_data = $this->config_text->get_array(array(
				'register_agreement_text',
				'register_agreement_uid',
				'register_agreement_bitfield',
				'register_agreement_options',
			));

			$this->cache->put('_register_agreement_data', $register_agreement_data);
		}

		// Prepare message for display
		$register_agreement_message = generate_text_for_display(
			$register_agreement_data['register_agreement_text'],
			$register_agreement_data['register_agreement_uid'],
			$register_agreement_data['register_agreement_bitfield'],
			$register_agreement_data['register_agreement_options']
		);

		// Output registration agreement to the template
		$this->template->assign_vars(array(
			'L_TERMS_OF_USE'	=> $register_agreement_message,
		));
	}
}
