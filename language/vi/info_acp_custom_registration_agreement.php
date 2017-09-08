<?php
/**
*
* Custom Registration Agreement extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 Rubén Calvo <rubencm@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* Vietnamese language pack <giaminhteam@gmail.com>
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
	'ACP_CUSTOM_REGISTRATION_AGREEMENT_TITLE'	=> 'Tùy chỉnh điều khoản đăng ký',
	'ACP_SETTINGS'								=> 'Cấu hình',
));
