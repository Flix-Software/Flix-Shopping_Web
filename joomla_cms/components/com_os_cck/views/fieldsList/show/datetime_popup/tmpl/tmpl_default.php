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

$value = (isset($value[0]->data))?$value[0]->data : '';

// $format_date=(isset($layout_params["fields"][$fName.'_input_format']) && $layout_params["fields"][$fName.'_input_format']!="")?$layout_params["fields"][$fName.'_input_format'] : "Y-m-d";
// $format_time=(isset($layout_params["fields"][$fName.'_input_time_format']) && $layout_params["fields"][$fName.'_input_time_format']!="")?$layout_params["fields"][$fName.'_input_time_format'] : "H:i:s";

// $value = date($format_date." ".$format_time, strtotime($value));
if(isset($recursive) && $recursive = 1 && isset($os_cck_configuration) && $os_cck_configuration->get('rent_type') == 2){
    $format_date = "Y-m-d H:i:s";
}else{
  $format_date=(isset($layout_params["fields"][$fName.'_output_format']) && $layout_params["fields"][$fName.'_output_format']!="")?$layout_params["fields"][$fName.'_output_format'] : "Y-m-d H:i:s";
}

$format_array = str_split($format_date);


  //$value = date($format_date, strtotime(data_transform_cck($value, $format_date)));
?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <?php
    if ($value){
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
        //echo $value;
        foreach ($format_array as $single_format){
            if(preg_match('%[a-zA-Z]%', $single_format) == 1){
                if(preg_match('%[dDjlNSwz]%', $single_format)){
                    echo '<span class="day_' . $fName . '">';
                }elseif(preg_match('%W%', $single_format)){
                    echo '<span class="week_' . $fName . '">';
                }elseif(preg_match('%[FmMnt]%', $single_format)){
                    echo '<span class="month_' . $fName . '">';
                }elseif(preg_match('%[LoYy]%', $single_format)){
                    echo '<span class="year_' . $fName . '">';
                }elseif(preg_match('%[aABgGhHisuv]%', $single_format)){
                    echo '<span class="time_' . $fName . '">';
                }elseif(preg_match('%[eIOPTZ]%', $single_format)){
                    echo '<span class="time_zone_' . $fName . '">';
                }elseif(preg_match('%[crU]%', $single_format)){
                    echo '<span class="full_data_time_' . $fName . '">';
                }
                echo date($single_format, strtotime(data_transform_cck($value, $single_format)));
                echo '</span>';
            }else{
                echo '<span class="separator_' . $fName . '">';
                //var_dump($single_format);
                echo $single_format;
                echo '</span>';
            }

        }
        if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
            echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
        }
        if(!empty($layout_params['fields'][$fName.'_suffix'])){
            echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
        }
        if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
            echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
        }
    }?>
</span>