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

$required = '';
$offset_animation = get_field_offset_animation($field, $layout);
$params = new JRegistry;
$params->loadString($field->params);

$allowed_values = $params->get("allowed_value", '');

if((isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on') || $allowed_values == 'on')
    $required = ' required ';
$type = array();
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$span_style = get_align_styles($field, $layout);
?>
<span <?php echo $span_style; ?><?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <?php  ?>
<input <?php echo $layout_params['field_styling']?> 
        class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> text_area"
        <?php echo $offset_animation; ?> 
        type="file"
        name="fi_<?php echo $field->db_field_name?>"
        value="<?php echo $value?>"/>
    <?php  ?>
</span>
<?php
if(FALSE){
if ($value != '' && $required) {?>
    <input <?php echo $layout_params['field_styling']?> 
        class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> text_area"
        <?php echo $offset_animation; ?> 
        type="text"
        name="fi_<?php echo $field->db_field_name?>"
        value="<?php echo $value?>"/>
    <input class="text_area <?php echo $field->db_field_name; ?>" type="file" name="fi_<?php echo $fName?>" value=""/>
    <?php
}
}
//var_dump($value); var_dump($required);

if ($value != '' ) {?>
    <input <?php echo $layout_params['field_styling']?> 
        class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> text_area"
        <?php echo $offset_animation; ?> 
        type="text"
        name="fi_<?php echo $field->db_field_name?>"
        value="<?php echo $value?>"/>
    <?php if(!$required){ ?>
    <label>Delete<input type="checkbox" name="delete_fi_<?php echo $fName?>" value="delete_file"></label>
    <?php
    }
}