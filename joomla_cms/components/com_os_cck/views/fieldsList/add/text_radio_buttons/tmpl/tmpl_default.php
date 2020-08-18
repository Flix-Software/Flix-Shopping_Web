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

$params = new JRegistry;
$params->loadString($field->params);
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$offset_animation = get_field_offset_animation($field, $layout);
$required = '';
if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
$arr = array();
$allowed_values = $params->get("allowed_value");
$allowed_values = urlencode($allowed_values);
if (strpos($allowed_values, '%0D%0A') !== false)
    $allowed_values = explode('%0D%0A', $allowed_values);
else if (strpos($allowed_values, '%0D') !== false)
    $allowed_values = explode('%0D', $allowed_values);
else if (strpos($allowed_values, '%0A') !== false)
    $allowed_values = explode('%0A', $allowed_values);
else
    return "Bad set 'allow value' for this field!";

if(isset($layout_params['fields'][$field->db_field_name . '_not_selected']) && ($layout_params['fields'][$field->db_field_name . '_not_selected'] == '1')){
    $arr[] = JHTML::_('select.option', 0, JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PLEASE_SELECT"), "value", "text");
}

for($k = 1; ($k - 1) < count($allowed_values); $k++){
    $key_value = explode('%7C', $allowed_values[$k-1]);
    if (isset($key_value[0]) && isset($key_value[1]))
        $arr[] = JHTML::_('select.option', $k, urldecode($key_value[1]), "value", "text");
    else if (isset($key_value[0]) && !isset($key_value[1]))
        $arr[] = JHTML::_('select.option', $k, urldecode($key_value[0]), "value", "text");
    else if (!isset($key_value[0]) && isset($key_value[1]))
        $arr[] = JHTML::_('select.option', $k, urldecode($key_value[1]), "value", "text");
    else
        return "Bad set 'allow value' for this field!";
}


//foreach ($allowed_values as $item) {
//    $key_value = explode('%7C', $item);
//    if (isset($key_value[0]) && isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', urldecode($key_value[0]), urldecode($key_value[1]), "value", "text");
//    else if (isset($key_value[0]) && !isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', urldecode($key_value[0]), urldecode($key_value[0]), "value", "text");
//    else if (!isset($key_value[0]) && isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', urldecode($key_value[1]), urldecode($key_value[1]), "value", "text");
//    else
//        return "Bad set 'allow value' for this field!";
//}
$tag_name = $field->db_field_name;
$key = 'value';
$text = 'text';
$default_values = '';
//if(isset($layout_params['fields'][$field->db_field_name . '_not_selected']) && $layout_params['fields'][$field->db_field_name . '_not_selected'] == '2'){
//    $default_values[] = 'not_selected';
//}else{
//    $default_values = explode('|',$params->get("default_value"));
//}

if(isset($layout_params['fields'][$field->db_field_name . '_default_value'])){
    
    $default_values = $layout_params['fields'][$field->db_field_name . '_default_value'];
}

$value = (isset($value) && $value != '')?$value:$default_values;
$width_inline_block = get_field_styles_width_only($field, $layout);
?><span <?php echo $width_inline_block; ?> <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> ><?php
echo JHTML::_('select.radiolist', $arr, "fi_".$tag_name, $layout_params['field_styling'].' class="'.$layout_params['custom_class'].$required. $field->db_field_name .'" ' . $offset_animation, $key, $text, $value);
?></span>