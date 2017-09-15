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
	'ENABLE_CUSTOM_AGREEMENT'					=> 'Activar Condiciones de Registro Personalizadas',
	'ENABLE_CUSTOM_AGREEMENT_EXPLAIN'			=> 'Si se desactiva, se mostrará el mensaje por defecto.',

	'CUSTOM_AGREEMENT'							=> 'Condiciones de Registro Personalizadas',
	'CUSTOM_AGREEMENT_EXPLAIN'					=> '',

	'CUSTOM_AGREEMENT_PREVIEW'					=> 'Condiciones de Registro Personalizadas - Previsualizar',
));
