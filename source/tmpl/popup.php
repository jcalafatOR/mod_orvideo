<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2019 - 2020 openROOM. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$orVideo_params = $params->get('loop') == 1 ? 'loop ' : '';
$orVideo_params .= $params->get('autoplay') == 1 ? 'autoplay ' : '';
$orVideo_params .= $params->get('navigation') == 1 ? 'controls="true" ' : '';
$orVideoPopUp_files = 'rel-mp4="'.JURI::root(true).'/'.orVideo_dirFilter($params->get('video_data_mp4')).'" ';
$orVideoPopUp_files .= 'rel-webm="'.JURI::root(true).'/'.orVideo_dirFilter($params->get('video_data_webm')).'" ';
$orVideoPopUp_files .= 'rel-ogg="'.JURI::root(true).'/'.orVideo_dirFilter($params->get('video_data_ogg')).'" ';

$orVideoPopUp_activador = $params->get('activador') == 1 ? "openVideoPopUp ": "";

$orTemplate_xml = JFactory::getXML(JPATH_SITE .'/templates/openroom/templateDetails.xml');
$orTemplate_version = orTemplate_v4video((string)$orTemplate_xml->version);


if(!$orTemplate_version){
 ?>
 <script>
if(typeof orVideo_openPopUp === 'undefined' )
{
 function orVideo_openPopUp(e)
 {
   var b=jQuery(e).hasClass('or_video_popup');
   var o=jQuery(e);
   if(!b){o=o.closest('.or_video_popup');}
   var params = o.attr('rel-params');
   var mp4_file = o.attr('rel-mp4');
   var ogg_file = o.attr('rel-ogg');
   var webm_file = o.attr('rel-webm');
   var video_id = o.attr('id');
   
   var body = jQuery('body');
   var modalItem = '<div id="orVideoPopUp" class="or-fullCover">';
   
   modalItem += '<div class="or-modal-container">';
     modalItem += '<div class="or-modal-header"><div class="or-close" rel="#orVideoPopUp" onclick="return orVideoRemove(\'#orVideoPopUp\');"><span class=""><i class="oricon-close"></i></span></div></div>';
     modalItem += '<div class="or-modal-body">';

     modalItem += '<video id="modal_'+video_id+'" class="or_video_tag" '+params+' playsinline preload="metadata">';
      modalItem += '<source src="'+mp4_file+'" type="video/mp4" codecs="avc1.42E01E, mp4a.40.2">';
      modalItem += '<source src="'+webm_file+'" type="video/webm" codecs="vp8, vorbis">';
      modalItem += '<source src="'+ogg_file+'" type="video/ogg" codecs="theora, vorbis">';
      modalItem += 'HTML5 v&iacute;deo no es soportado por este navegador';
     modalItem += '</video>';
     
     modalItem += '</div>';
     modalItem += '<div class="or-modal-footer"></div>';
   modalItem += '</div>';
   
   modalItem += '</div>';
   body.addClass('overflow-hiden');
   body.append(modalItem);
   
 }
}
if(typeof orVideoRemove === 'undefined' ) { function orVideoRemove(e) { be_closeCover(e); jQuery(e).remove(); } }
jQuery(document).ready(function() { jQuery('.openVideoPopUp').on('click', function() { orVideo_openPopUp(this); }); });
 </script>
 <?php } ?>
 
<div class="or_video_popup <?php echo $orVideoPopUp_activador.$moduleclass_sfx; ?>" id="video_<?php echo $module->id; ?>" rel-params="<?php echo $orVideo_params; ?>" <?php echo $orVideoPopUp_files; ?> >

	<div class="or_blockwidth">
		<?php echo $module->content; ?>
	</div>

</div>






	