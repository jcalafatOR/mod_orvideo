<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_orslider
 *
 * @copyright   Copyright (C) 2019 - 2020 openROOM. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_orvideo.content');
}


if (!function_exists('orVideo_dirFilter')) {
	function orVideo_dirFilter($url)
	{
		$tmp_dir = explode('/', $url);
		array_filter($tmp_dir);
		return implode('/', $tmp_dir);
	}
}
if (!function_exists('orTemplate_v4video')) {
	function orTemplate_v4video($version)
	{
		$rs = false; 
		$checkVersion = explode(".",$version);
		if($checkVersion[0] >= 1 &&
		   $checkVersion[1] >= 16 &&
		   ( (isset($checkVersion[2]) && $checkVersion[2] >= 1) || (!isset($checkVersion[2]) && $checkVersion[1] >= 17)  ) )
		{ $rs = true; }
		return $rs;
	}
}
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_orvideo', $params->get('layout', 'default'));
