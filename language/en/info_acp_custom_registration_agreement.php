<?php
/**
*
* Custom Registration Agreement extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 Rubén Calvo <rubencm@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	// ACP Module
	'ACP_CUSTOM_REGISTRATION_AGREEMENT_TITLE'	=> 'Custom Registration Agreement',
	'ACP_SETTINGS'								=> 'Settings',

	'ENABLE_CUSTOM_AGREEMENT'					=> 'Enable Custom Registration Agreement',
	'ENABLE_CUSTOM_AGREEMENT_EXPLAIN'			=> 'If it is disabled, the default message will be displayed.',
	
	'CUSTOM_AGREEMENT'							=> 'Custom registration agreement',
));

