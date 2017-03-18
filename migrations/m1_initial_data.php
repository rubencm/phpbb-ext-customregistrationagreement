<?php
/**
*
* Custom Registration Agreement extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 Rubén Calvo <rubencm@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace rubencm\customregistrationagreement\migrations;

class m1_initial_data extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\extensions');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('register_agreement_enable', 0)),

			array('config_text.add', array('register_agreement_text', '')),
			array('config_text.add', array('register_agreement_uid', '')),
			array('config_text.add', array('register_agreement_bitfield', '')),
			array('config_text.add', array('register_agreement_options', OPTION_FLAG_BBCODE + OPTION_FLAG_SMILIES + OPTION_FLAG_LINKS)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CUSTOM_REGISTRATION_AGREEMENT_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_CUSTOM_REGISTRATION_AGREEMENT_TITLE',
				array(
					'module_basename'	=> '\rubencm\customregistrationagreement\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
