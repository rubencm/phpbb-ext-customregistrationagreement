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
	'ENABLE_CUSTOM_AGREEMENT'					=> 'Enable Custom Registration Agreement',
	'ENABLE_CUSTOM_AGREEMENT_EXPLAIN'			=> 'If it is disabled, the default message will be displayed.',

	'CUSTOM_AGREEMENT'							=> 'Custom registration agreement',

	'CUSTOM_AGREEMENT_PREVIEW'					=> 'Custom registration agreement - Preview',
));
