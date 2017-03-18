<?php
/**
*
* Custom Registration Agreement extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 Rubén Calvo <rubencm@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace rubencm\customregistrationagreement\acp;

class main_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string */
	protected $phpbb_root_path;

	/** @var string */
	protected $php_ext;

	/** @var string */
	public $page_title;

	/** @var string */
	public $tpl_name;

	/** @var string */
	public $u_action;

	public function main()
	{
		global $phpbb_container;

		$this->config = $phpbb_container->get('config');
		$this->config_text = $phpbb_container->get('config_text');
		$this->request = $phpbb_container->get('request');
		$this->template = $phpbb_container->get('template');
		$this->user = $phpbb_container->get('user');
		$this->phpbb_root_path = $phpbb_container->getParameter('core.root_path');
		$this->php_ext = $phpbb_container->getParameter('core.php_ext');

		// Add necesary language files
		$this->user->add_lang(array('acp/common', 'posting'));

		// Template from adm/style
		$this->tpl_name = 'acp_custom_registration_agreement';

		// Title for page
		$this->page_title = $this->user->lang('ACP_CUSTOM_REGISTRATION_AGREEMENT_TITLE');

		// Form key
		$form_name = 'acp_registration_agreement';
		add_form_key($form_name);

		// Include files needed for displaying BBCodes
		if (!function_exists('display_custom_bbcodes'))
		{
			include $this->phpbb_root_path . 'includes/functions_display.' . $this->php_ext;
		}

		// Get all agreement data from the config_text table in the database
		$data = $this->config_text->get_array(array(
			'register_agreement_text',
			'register_agreement_uid',
			'register_agreement_bitfield',
			'register_agreement_options',
		));

		$register_agreement_enable = $this->config['register_agreement_enable'];

		// If form is submitted or previewed
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_name))
			{
				trigger_error('FORM_INVALID', E_USER_ERROR);
			}

			$data['register_agreement_text'] = $this->request->variable('register_agreement_text', '', true);
			$register_agreement_enable = $this->request->variable('register_agreement_enable', false);

			// Prepare text for storage
			generate_text_for_storage(
				$data['register_agreement_text'],
				$data['register_agreement_uid'],
				$data['register_agreement_bitfield'],
				$data['register_agreement_options'],
				!$this->request->variable('disable_bbcode', false),
				!$this->request->variable('disable_magic_url', false),
				!$this->request->variable('disable_smilies', false)
			);

			// Store the config enable/disable state
			$this->config->set('register_agreement_enable', $register_agreement_enable);

			// Store settings to the config_table in the database
			$this->config_text->set_array(array(
				'register_agreement_text'			=> $data['register_agreement_text'],
				'register_agreement_uid'			=> $data['register_agreement_uid'],
				'register_agreement_bitfield'		=> $data['register_agreement_bitfield'],
				'register_agreement_options'		=> $data['register_agreement_options'],
			));

			trigger_error($this->user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
		}

		// prepare the text for editing inside the textbox
		$register_agreement_text_edit = generate_text_for_edit($data['register_agreement_text'], $data['register_agreement_uid'], $data['register_agreement_options']);

		// Output data to the template
		$this->template->assign_vars(array(
			'REGISTER_AGREEMENT_ENABLE'		=> $register_agreement_enable,

			'REGISTER_AGREEMENT_TEXT'		=> $register_agreement_text_edit['text'],

			'S_BBCODE_DISABLE_CHECKED'		=> !$register_conditions_text_edit['allow_bbcode'],
			'S_SMILIES_DISABLE_CHECKED'		=> !$register_conditions_text_edit['allow_smilies'],
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$register_conditions_text_edit['allow_urls'],

			'BBCODE_STATUS'					=> $this->user->lang('BBCODE_IS_ON', '<a href="' . append_sid("{$this->phpbb_root_path}faq.{$this->php_ext}", 'mode=bbcode') . '">', '</a>'),
			'SMILIES_STATUS'				=> $this->user->lang('SMILIES_ARE_ON'),
			'IMG_STATUS'					=> $this->user->lang('IMAGES_ARE_ON'),
			'FLASH_STATUS'					=> $this->user->lang('FLASH_IS_ON'),
			'URL_STATUS'					=> $this->user->lang('URL_IS_ON'),

			'S_BBCODE_ALLOWED'				=> true,
			'S_SMILIES_ALLOWED'				=> true,
			'S_BBCODE_IMG'					=> true,
			'S_BBCODE_FLASH'				=> true,
			'S_LINKS_ALLOWED'				=> true,

			'U_ACTION'						=> $this->u_action,
		));

		display_custom_bbcodes();
	}
}
