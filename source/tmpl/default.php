<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_orvideo
 *
 * @copyright   Copyright (C) 2019 - 2020 openROOM. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$orVideo_loop = $params->get('loop') == 1 ? 'loop' : '';
$orVideo_autoplay = $params->get('autoplay') == 1 ? 'autoplay' : '';
$orVideo_navigation = $params->get('navigation') == 1 ? 'controls' : false;
?>
<div class="or_video <?php echo $moduleclass_sfx; ?>"  >
	<video id="video_<?php echo $module->id; ?>" class="or_video_tag" <?php echo $orVideo_autoplay; ?> <?php echo $orVideo_navigation; ?> preload="metadata" muted <?php echo $orVideo_loop; ?> playsinline>
		<source src="<?php echo $params->get('video_data_mp4'); ?>" type="video/mp4" codecs="avc1.42E01E, mp4a.40.2">
		<source src="<?php echo $params->get('video_data_webm'); ?>" type="video/webm" codecs="vp8, vorbis">
		<source src="<?php echo $params->get('video_data_ogg'); ?>" type="video/ogg" codecs="theora, vorbis">
		HTML5 vídeo no es soportado por este navegador
	</video>


	<?php if(!empty($module->content)){ ?>
	<div class="or_blockwidth">
		<?php echo $module->content; ?>
	</div>
	<?php } ?>

</div>