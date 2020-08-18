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

if(!empty($layout_params['fields'][$fName.'_link_text'])){
    $linkText = $layout_params['fields'][$fName.'_link_text'];
}else{
    $linkText = 'download';
}
$value2 = $value[0]->fid;
$value = (isset($value[0]->data)) ? $value[0]->data : '';
?>



<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <?php
    if ($value != ''){
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
        echo'<a href="'.JURI::root().'index.php?option=com_os_cck&task=fileDownload&fid='.$value2.'&field='.$field->fid.'&eiid='.$entityInstance->eiid.'" >'.$linkText.'</a>';
        //var_dump(JURI::root());

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