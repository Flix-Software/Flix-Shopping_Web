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
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on' && isset($layout_html)){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$fName = $field->db_field_name;

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


if (strpos($allowed_values, '\sprt') !== false){
    $allowed_values = explode('\sprt', $allowed_values);
}else{
    return "Bad set 'allow value' for this field!";
}

foreach ($allowed_values as $key => $allow_value) {
    $allowed_values[$key] = trim(urldecode($allow_value));
}


// if(!$allowed_values)
$arr[] = JHTML::_('select.option', 0, 'Select value', "value", "text");

foreach ($allowed_values as $item) {
    $key_value = explode('|', $item);
    if(!isset($key_value[0]) && isset($key_value[1])){
      $key_value[0] =$key_value[1];
    }
    
    if (isset($key_value[0]) && isset($key_value[1]))
        $arr[] = JHTML::_('select.option', $key_value[0], $key_value[1], "value", "text");
    else if (isset($key_value[0]) && !isset($key_value[1]))
        $arr[] = JHTML::_('select.option', $key_value[0], $key_value[0], "value", "text");
    else if (!isset($key_value[0]) && isset($key_value[1]))
        $arr[] = JHTML::_('select.option', $key_value[1], $key_value[1], "value", "text");
    else 
        return "Bad set 'allow value' for this field!";
}


$tag_name = "fi_".$field->db_field_name;
$key = 'value';
$text = 'text';
$value_arr = array();

if($value != '' && is_array(json_decode($value))) {
    $value_arr = json_decode($value);
}elseif($value != '' && !is_array(json_decode($value))){
    $value_arr[] = $value;
}else{
    $value_arr[] = $layout_params['fields'][$fName.'_default_value'];
}       

$value_tmp = $entityInstance->getFieldValue($field);
$field_json = json_encode($field);

?>
<span   

<?php if(isset($layout_params['fields']['description_'.$fName]) 
            && $layout_params['fields']['description_'.$fName]=='on' 
            && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
    rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
        <?php } ?> ><?php

//select type
$select_type = '';
 $select_type_value = isset($layout_params['fields']['select_type_'.$fName]) ? $layout_params['fields']['select_type_'.$fName] : 1;
 
 if($select_type_value > 1){
   $arr[0]->disable = TRUE;
   $select_type  = 'multiple="multiple" size="'.$select_type_value.'"';
 }

 
echo JHTML::_('select.genericlist', $arr, $tag_name . '[]', $layout_params['field_styling'].' class="'.$layout_params['custom_class']. ' ' . $required. ' ' . $field->db_field_name .'" ' . $select_type . ' ' . $offset_animation, $key, $text, $value_arr);

    if(isset($parent)){
      $unique_parent_id = $parent;
    }else{
      $unique_parent_id = '';
    }
    
    
?>
   
    <span class="select-params" data-select-params='<?php echo $field_json;?>' style="display: none" ></span>    
</span>
<!-- select-params -->

<script>
 var select_type_value = '<?php echo $select_type_value; ?>';
 
 if(select_type_value == 1){
    addChildSelect(<?php echo $field_json;?>, "<?php echo $layout->lid;?>", "<?php if(isset($value_arr[0]) && $value_arr[0] != '""'){echo $value_arr[0];}?>", "<?php echo JURI::root()?>","<?php echo $field->fid;?>","<?php echo $unique_parent_id;?>");
}
</script>

