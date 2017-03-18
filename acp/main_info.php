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

class main_info
{
	public function module()
	{
		return array(
			'filename'	=> '\rubencm\customregistrationagreement\acp\registration_agreement_module',
			'title'		=> 'ACP_CUSTOM_REGISTRATION_AGREEMENT',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_SETTINGS', 'auth' => 'ext_rubencm/customregistrationagreement && acl_a_board', 'cat' => array('ACP_CUSTOM_REGISTRATION_AGREEMENT_TITLE')),
			),
		);
	}
}
