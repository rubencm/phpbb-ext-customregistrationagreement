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
	'ENABLE_CUSTOM_AGREEMENT'					=> 'Bật Tùy chỉnh điều khoản đăng ký',
	'ENABLE_CUSTOM_AGREEMENT_EXPLAIN'			=> 'Nếu tắc, nội dung mặc định của hệ thống sẽ được sử dụng.',

	'CUSTOM_AGREEMENT'							=> 'Điều khoản đăng ký',

	'CUSTOM_AGREEMENT_PREVIEW'					=> 'Xem trước',
));
