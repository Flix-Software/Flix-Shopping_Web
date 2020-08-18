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
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$offset_animation = get_field_offset_animation($field, $layout);
$arr = array();
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
$required = '';

if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
$allowed_values = $params->get("allowed_value");

$allowed_values = urlencode($allowed_values);

if (strpos($allowed_values, '%0D%0A') !== false)
    $allowed_values = explode('%0D%0A', $allowed_values);
else if (strpos($allowed_values, '%0D') !== false)
    $allowed_values = explode('%0D', $allowed_values);
else if (strpos($allowed_values, '%0A') !== false)
    $allowed_values = explode('%0A', $allowed_values);
else 
    $allowed_values = explode('%0A', $allowed_values);
$is_check_box = true;
$k = 1;
$arr[] = JHTML::_('select.option', $k, urldecode($allowed_values[0]), "value", "text");

//for($k = 1; ($k - 1) < count($allowed_values); $k++){
//    
//    $key_value = explode('%7C', $allowed_values[$k - 1]);
    
//    if (isset($key_value[0]) && isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', $k, urldecode($key_value[1]), "value", "text");
//    else if (isset($key_value[0]) && !isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', $k, urldecode($key_value[0]), "value", "text");
//    else if (!isset($key_value[0]) && isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', $k, urldecode($key_value[1]), "value", "text");
//    else
//        return "Bad set 'allow value' for this field!";
//}

//foreach ($allowed_values as $item) {
//    $key_value = explode('%7C', $item);
//    var_dump($key_value);
//    if (isset($key_value[0]) && isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', urldecode($key_value[0]), urldecode($key_value[1]), "value", "text");
//    else if (isset($key_value[0]) && !isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', urldecode($key_value[0]), urldecode($key_value[0]), "value", "text");
//    else if (!isset($key_value[0]) && isset($key_value[1]))
//        $arr[] = JHTML::_('select.option', urldecode($key_value[1]), urldecode($key_value[1]), "value", "text");
//    else
//        return "Bad set 'allow value' for this field!";
//}
$tag_name = "fi_" . $field->db_field_name;
$default_values = (isset($layout_params['fields'][$fName . '_default_value']) && $layout_params['fields'][$fName . '_default_value'] == 1) ? $layout_params['fields'][$fName . '_default_value'] : '';


$value = (isset($checkbox_value) && $checkbox_value !== null)?$checkbox_value:$default_values;

$selected = $value;
$is_checked = true;
$value = $arr[0]->value;


if ($selected != $arr[0]->value) {
    $is_checked = false;
}
//if(isset($layout_params['fields'][$fName . '_default_value']) && $layout_params['fields'][$fName . '_default_value'] == 1){
//    $is_checked = true;
//}

$width_inline_block = get_field_styles_width_only($field, $layout);
//var_dump($width_inline_block);
?>
<span <?php echo $width_inline_block; ?> <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
<input <?php echo $layout_params['field_styling']?> 
        class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?>" 
        <?php echo $offset_animation; ?>
        type="checkbox"
        name="<?php echo $tag_name?>"
        value="<?php echo $value?>" <?php echo $is_checked?' checked ' : ''?>/>
</span>