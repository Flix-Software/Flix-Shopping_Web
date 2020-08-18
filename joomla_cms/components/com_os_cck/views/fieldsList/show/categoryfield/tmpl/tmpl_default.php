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

$show_type = (isset($layout_params['fields']['show_type_'.$fName])) ? $layout_params['fields']['show_type_'.$fName] : 'title';

if(stripos($show_type, 'image') !== FALSE){
    $img_width = (isset($layout_params['fields'][$fName]['width'])) ? $layout_params['fields'][$fName]['width'] : '50';
    $img_height = (isset($layout_params['fields'][$fName]['height'])) ? $layout_params['fields'][$fName]['height'] : '50';
    $style = 'height="'.$img_height.'px" width="'.$img_width.'px"';
    
        
}
?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <?php

    $show_count = (isset($layout_params['fields'][$fName.'_show_count'])) ? $layout_params['fields'][$fName.'_show_count'] : '0';
    $max_lenght = (isset($layout_params['fields'][$fName.'_max_lenght'])) ? $layout_params['fields'][$fName.'_max_lenght'] : '250';
    
    if (isset($value[0]->title) && $value[0]->title != ''){
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

        //  print_r($value);
        // exit;
        
        //category output
        if($show_count == 0 || $show_count > count($value)) $show_count = count($value);

        $category_output = '';
        $category_output_lenght = 0;
        for ($icount = 0; $icount < $show_count; $icount++) { 
            if($icount == 0 && strlen($value[$icount]->title) > $max_lenght){
                $category_output_lenght = strlen($value[$icount]->title);
                $value[$icount]->title = substr($value[$icount]->title, 0, $max_lenght)."...";
            }
            if($icount > 0 && $category_output_lenght + strlen($value[$icount]->title) > $max_lenght){
                continue;
            }
            
            if(empty($value[$icount]->image)){
                  $value[$icount]->image = JURI::base().'components/com_os_cck/images/folder.png';
            }else{
                $value[$icount]->image = JURI::root() . '/images/stories/' . $value[$icount]->image;
            }
            
            
            if ($show_type == 'title'){
                if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
                    $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                    $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                            .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                        .'&amp;catid='. $value[$icount]->catid . '&amp;Itemid=' . $Itemid . $modId;
                    $category_output .= '<a href="'.JRoute::_($link).'" style=" display: inline-block;"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' .
                            $value[$icount]->title . '</div></a>';
                    //var_dump($category_output); exit;
                        
                }else{
                    $category_output .= $value[$icount]->title;
                }
                
            }elseif($show_type == 'image-title'){
                if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
                    $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                    $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                                .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                            .'&amp;catid='. $value[$icount]->catid . '&amp;Itemid=' . $Itemid . $modId;
                    $category_output .= '<a href="'.JRoute::_($link).'"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' .
                                '<img ' . $style . 'src="'.$value[$icount]->image.'" alt="?"/></div></a> ';
                  }else{
                    $category_output .= '<div class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' . 
                                '<img '.$style.' src="'.$value[$icount]->image.'" alt="?"/></div> ';
                  }
                  
                if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
                    $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                    $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                            .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                        .'&amp;catid='. $value[$icount]->catid . '&amp;Itemid=' . $Itemid . $modId;
                    $category_output .= '<a href="'.JRoute::_($link).'" style=" display: inline-block;"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' .
                            $value[$icount]->title . '</div></a> ';
                    //var_dump($category_output); exit;
                        
                }else{
                    $category_output .= $value[$icount]->title;
                }
            }elseif ($show_type == 'title-image') {
                if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
                    $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                    $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                            .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                        .'&amp;catid='. $value[$icount]->catid . '&amp;Itemid=' . $Itemid . $modId;
                    $category_output .= '<a href="'.JRoute::_($link).'" style=" display: inline-block;"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' .
                            $value[$icount]->title . '</div></a> ';
                    //var_dump($category_output); exit;
                        
                }else{
                    $category_output .= $value[$icount]->title;
                }
                
                if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
                    $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                    $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                                .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                            .'&amp;catid='. $value[$icount]->catid . '&amp;Itemid=' . $Itemid . $modId;
                    $category_output .= '<a href="'.JRoute::_($link).'"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' .
                                '<img ' . $style . 'src="'.$value[$icount]->image.'" alt="?"/></div></a> ';
                  }else{
                    $category_output .= '<div class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' . 
                                '<img '.$style.' src="'.$value[$icount]->image.'" alt="?"/></div> ';
                  }
            
            }elseif($show_type == 'image'){
              if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
                $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                            .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                        .'&amp;catid='. $value[$icount]->catid . '&amp;Itemid=' . $Itemid . $modId;
                $category_output .= '<a href="'.JRoute::_($link).'"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' .
                            '<img ' . $style . 'src="'.$value[$icount]->image.'" alt="?"/></div></a>';
              }else{
                $category_output .= '<div class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' . 
                            '<img '.$style.' src="'.$value[$icount]->image.'" alt="?"/></div>';
              }
              
            }
            if($icount < ($show_count-1)){
              $category_output .= ", ";
            }
            
            $category_output_lenght += strlen($value[$icount]->title);
        }

        echo $category_output;

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