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
	'ENABLE_CUSTOM_AGREEMENT'					=> 'Activer les conditions d’enregistrement personnalisées',
	'ENABLE_CUSTOM_AGREEMENT_EXPLAIN'			=> 'Si ce réglage est désactivé, le message par défaut sera affiché.',
	
	'CUSTOM_AGREEMENT'							=> 'Conditions d’enregistrement personnalisées',
	'CUSTOM_AGREEMENT_EXPLAIN'					=> '',

	'CUSTOM_AGREEMENT_PREVIEW'					=> 'Conditions d’enregistrement personnalisées - Aperçu',
));
