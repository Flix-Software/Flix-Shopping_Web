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

$icon_alias_prefix = (isset($layout_params['fields'][$fName.'_add_icon_alias_prefix'])) ? $layout_params['fields'][$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($layout_params['fields'][$fName.'_add_icon_alias_suffix'])) ? $layout_params['fields'][$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$value = (isset($value[0]->data))?$value[0]->data : '';

//var_dump($layout_params["fields"]['cck_image_object_fit_'.$fName]);
$width_heigth = (!empty($layout_params["fields"][$fName]["options"]["width"]))? 'width:'.$layout_params["fields"][$fName]["options"]["width"].'px;' : 'width:100px;';
$width_heigth .= (!empty($layout_params["fields"][$fName]["options"]["height"]))? ' height:'.$layout_params["fields"][$fName]["options"]["height"].'px;' : 'height:100px;';

$cck_image_object_fit  = (isset($layout_params["fields"]['cck_image_object_fit_'.$fName])) ? $layout_params["fields"]['cck_image_object_fit_'.$fName] : "cover";
?>

<span class="cck-image-box" <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php 
    if(isset($layout_params['fields'][$fName.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_prefix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_prefix'].'"></span>';
    }
    if(!empty($layout_params['fields'][$fName.'_prefix'])){
      echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
    }
    if(isset($layout_params['fields'][$fName.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_suffix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_suffix'].'"></span>';
    }
    if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
        $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
        $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
    }
    
if ($value && file_exists(JPATH_BASE. $value)){
    
    if(isset($field->options['width']) && $field->options['width'] != '' && $field->options['height'] != ''){
        $image = show_image_cck($value, $field->options['width'], $field->options['height']);
    }else{
        $image = $value;
    }
    
    if($image[0] == '/'){
        $image = substr($image, 1);
    }
    
      if(!isset($title)) $title = "";
    
    $width = (isset($field->options['width']) && $field->options['width'] != '')?"width:".$field->options['width']."px;":'width:100%;';
    $height = (isset($field->options['height']) && $field->options['height'] != '')?"height:".$field->options['height']."px;":'height:100%;';
    
    
    echo '<img style="'.$width.$height.' object-fit:'.$cck_image_object_fit. '" src="'.JURI::root(). $image .'" alt="' . $title . '" />';
    if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
    }
    if(!empty($layout_params['fields'][$fName.'_suffix'])){
      echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
    }
    if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
    }
  } elseif(isset ($layout_params['fields'][$fName.'_def_img']) && $layout_params['fields'][$fName.'_def_img'] != '') {
      if(!isset($title)) $title = "";
    
    $width = isset($field->options['width'])?"width:".$field->options['width']."px;":'';
    $height = isset($field->options['height'])?"height:".$field->options['height']."px;":'';
    echo '<img style="'.$width.$height.' object-fit:'.$cck_image_object_fit. '" src="'.JURI::root().'/images/stories/'.$layout_params['fields'][$fName.'_def_img'].'" alt="' . $title . '" />';
    if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
    }
    if(!empty($layout_params['fields'][$fName.'_suffix'])){
      echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
    }
    if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
    }
}
  ?>
</span>