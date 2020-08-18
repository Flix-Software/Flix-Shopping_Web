<?php
if (!defined('_VALID_MOS') && !defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');
/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/

$fName = $field->db_field_name;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$video_with = (isset($layout_params["fields"][$fName]["options"]["width"]))?$layout_params["fields"][$fName]["options"]["width"]:'420';
$video_height = (isset($layout_params["fields"][$fName]["options"]["height"]))?$layout_params["fields"][$fName]["options"]["height"]:'315';
$youtubeCode = "";
$videoSrc = array();
$videoSrcHttp = "";
$videoType = array();
$videos = isset($value[0])?$value[0]:[];

foreach($videos as $video){
  if ($video->youtube){
    $youtubeCode = $video->youtube;
  }else if($video->src){
    $videoSrc[] = $video->src;
    if($video->type)
      $videoType[] = $video->type;
  }
}

if(count($videoSrc) || $youtubeCode){
  if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
      $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
      $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
  }
}
?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php
  if(isset($field_from_params[$fName.'_add_icon_prefix_prefix']) && !empty($field_from_params[$fName.'_add_icon_prefix_prefix'])){
      echo '<span class="fa '.$field_from_params[$fName.'_add_icon_prefix_prefix'].'"></span>';
  }
  if(!empty($layout_params['fields'][$fName.'_prefix'])){
    echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
  }
  if(isset($field_from_params[$fName.'_add_icon_prefix_suffix']) && !empty($field_from_params[$fName.'_add_icon_prefix_suffix'])){
      echo '<span class="fa '.$field_from_params[$fName.'_add_icon_prefix_suffix'].'"></span>';
  }
    if (!empty($youtubeCode)) { ?>
      <iframe width="420" height="315" frameborder="0" 
        src="//www.youtube.com/embed/<?php echo $youtubeCode ?>"></iframe> 
      <?php
    } else if (!empty($videoSrc) && empty($youtubeCode)) { ?>
  <video width="<?php echo $video_with?>" height="<?php echo $video_height?>" controls>
    <?php
    for ($j = 0;$j < count($videoSrc);$j++) {
        if(!strstr($videoSrc[$j], "http") && $videoType) {
          echo '<source src="'.JURI::root().$videoSrc[$j].'" type="'.$videoType[$j].'">';
        }else{
          echo '<source src="'.$videoSrc[$j].'" type="'.$videoType[$j].'">';
       }
    }
    if (isset($value[1]) && !empty($value[1])) {
      $tracks = $value[1];
      for ($j = 0;$j < count($tracks);$j++) {
        ($j==0)?$default='default="default"':$default='';
        if (!strstr($tracks[$j]->src, "http")) {
          $html .= '<track src="' . JURI::root().$tracks[$j]->src . '"'.
                  ' kind="' . $tracks[$j]->kind .'"'.
                  ' srclang="' . $tracks[$j]->scrlang .'"'.
                  ' label="' . $tracks[$j]->label . '" '.$default.'>';
        }else{
          $html .= '<track src="' .$src . '"'.
                  ' kind="' . $tracks[$j]->kind .'"'.
                  ' srclang="' . $tracks[$j]->scrlang .'"'.
                  ' label="'.$tracks[$j]->label.'" '.$default.'>';
        }
      }
    }?>
  </video>
    <?php } ?>

  <?php
  if(isset($field_from_params[$fName.'_add_icon_suffix_prefix']) && !empty($field_from_params[$fName.'_add_icon_suffix_prefix'])){
    echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_prefix'].'"></span>';
  }
  if(!empty($layout_params['fields'][$fName.'_suffix'])){
    echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
  }
  if(isset($field_from_params[$fName.'_add_icon_suffix_suffix']) && !empty($field_from_params[$fName.'_add_icon_suffix_suffix'])){
    echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_suffix'].'"></span>';
  }?>
</span>