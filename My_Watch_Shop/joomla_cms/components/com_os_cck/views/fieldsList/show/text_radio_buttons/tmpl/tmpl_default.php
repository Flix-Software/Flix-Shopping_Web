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
$value = (isset($value[0]->data))?$value[0]->data : '';
$return = '';
$arr = array();
$allowed_values = urlencode($params->get('allowed_value'));

if (strpos($allowed_values, '%0D%0A') !== false) $allowed_values = explode('%0D%0A', $allowed_values);
else if (strpos($allowed_values, '%0D') !== false) $allowed_values = explode('%0D', $allowed_values);
else if (strpos($allowed_values, '%0A') !== false) $allowed_values = explode('%0A', $allowed_values);
else return "Bad set 'allow value' for this field!";

for ($k = 0; $k < count($allowed_values); $k++) {
    $key_value = explode('%7C', $allowed_values[$k]);
    
    if ($k+1 == $value) $return = (isset($key_value[1]))?urldecode($key_value[1]):urldecode($key_value[0]);
}

//foreach ($allowed_values as $item) {
//    $key_value = explode('%7C', $item);
//    if ($key_value[0] == urlencode($value)) $return = (isset($key_value[1]))?urldecode($key_value[1]):urldecode($key_value[0]);
//}
?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <?php
    if ($return){
        if(isset($field_from_params[$fName.'_add_icon_prefix_prefix']) && !empty($field_from_params[$fName.'_add_icon_prefix_prefix'])){
            echo '<span class="fa '.$field_from_params[$fName.'_add_icon_prefix_prefix'].'"></span>';
        }
        if(!empty($layout_params['fields'][$fName.'_prefix'])){
            echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
        }
        if(isset($field_from_params[$fName.'_add_icon_prefix_suffix']) && !empty($field_from_params[$fName.'_add_icon_prefix_suffix'])){
            echo '<span class="fa '.$field_from_params[$fName.'_add_icon_prefix_suffix'].'"></span>';
        }

        if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
            $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
            $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
        }
        echo urldecode($return);
    
        if(isset($field_from_params[$fName.'_add_icon_suffix_prefix']) && !empty($field_from_params[$fName.'_add_icon_suffix_prefix'])){
            echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_prefix'].'"></span>';
        }
        if(!empty($layout_params['fields'][$fName.'_suffix'])){
            echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
        }
        if(isset($field_from_params[$fName.'_add_icon_suffix_suffix']) && !empty($field_from_params[$fName.'_add_icon_suffix_suffix'])){
            echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_suffix'].'"></span>';
        }
    }?>
</span>
<script type="text/javascript">
    var field_value = '<?php echo $return; ?>';
    if (field_value == ''){
        jQuerOs('[fid*=<?php echo $field-> fid; ?>]').parent().remove()
    }
    //console.log('value', jQuerOs('[fid*=<?php echo $field-> fid; ?>]'));
    
</script>