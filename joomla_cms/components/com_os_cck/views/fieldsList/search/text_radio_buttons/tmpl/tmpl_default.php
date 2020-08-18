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
$rand = rand();

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$fParams['type'] = isset($layout_params['fields']['search_'.$fName])?$layout_params['fields']['search_'.$fName]:'';
$params = new JRegistry;
$params->loadString($field->params);
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$radio_value = JRequest::getVar('os_cck_search_'.$field->db_field_name, '');
$task = (isset($task)) ? $task : JRequest::getVar('task', '');
if($fParams['type'] == 2){?>
    <input <?php echo $field_styling?> class="<?php echo $custom_class?>" <?php echo $offset_animation; ?> type="hidden" name="os_cck_search_<?php echo $fName?>" value="on">
    <?php
    return;
}
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


if(isset($layout_params['fields'][$field->db_field_name . '_any_value']) && ($layout_params['fields'][$field->db_field_name . '_any_value'] == '1')){
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

$key = 'value';
$text = 'text';
$default_values = '';
if($task == 'search'){
    $default_values = '';
}else{
    if(isset($layout_params['fields'][$field->db_field_name . '_default_value'])){
    
        $default_values = $layout_params['fields'][$field->db_field_name . '_default_value'];
    }
}

$radio_value = (isset($radio_value) && $radio_value != '') ? $radio_value : $default_values;
//var_dump($value);
?><span class="radiobutton" <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> ><?php

echo JHTML::_('select.radiolist', $arr, "os_cck_search_".$fName.'_'.$rand, $field_styling.' class="'.$custom_class.$required.'" ' . $offset_animation, $key, $text, $radio_value);

?></span>