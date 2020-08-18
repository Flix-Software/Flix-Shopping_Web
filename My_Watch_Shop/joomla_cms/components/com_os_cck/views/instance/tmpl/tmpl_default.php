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


$field = new stdClass();
$field->db_field_name = 'form-'.$layout->lid;
$form_hover_animation = get_field_hover_animation($field, $layout);

?>

<div class="cck-body instance_body" eiid="<?php echo $entityInstance->eiid; ?>" eid="<?php echo $entityInstance->fk_eid; ?>" cid="<?php echo isset($category->cid) ? $category->cid : ''; ?>" <?php echo $form_hover_animation; ?>>
  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
  <?php

  JPluginHelper::importPlugin('content');
  $dispatcher = JDispatcher::getInstance();

  $Itemid .= ($moduleId) ? '&moduleId=' . $moduleId : '';
  $layout_html = urldecode($layout->layout_html);
  $layout_html = cut_params($layout_html);
  $layout_html = remove_admin_classes($layout_html);
  if(isset($layout_params['views']['show_layout_title']) && $layout_params['views']['show_layout_title'])
  {
    echo "<h3>";
      echo $layout_params['views']['layout_title'];
    echo "</h3>";
  }

  $field = new stdClass();
  $field->db_field_name = 'form-'.$layout->lid;
  $form_styling = get_field_styles($field, $layout);
  $field_from_params = $layout_params["fields"];
  //var_dump($field_from_params);
  $form_custom_class = get_field_custom_class($field, $layout);
  $form_offset_animation = get_field_offset_animation($field, $layout);
  
  
  $fields_list = $layout->field_list;
  
  //add child selects to layout
  $addChildSelectToLayout = addChildSelectToLayout($fields_list, $entityInstance, $layout_params, $layout_html, $layout);
  $layout_html = $addChildSelectToLayout['layout_html'];
  $layout_params = $addChildSelectToLayout['layout_params'];
  $parent = $addChildSelectToLayout['select_parent'];
  $layout->params = serialize($layout_params);
  $hover_animated = array();
  //add child selects to layout
  $child_entities = (isset($layout_params['child_entities'])) ? $layout_params['child_entities'] : '';
  //var_dump($child_entities);
  ?>
  <!--Начало табов-->
  <div class="<?php echo $form_custom_class; ?> instance_block" <?php echo $form_offset_animation; ?> <?php echo $form_hover_animation; ?> <?php echo $form_styling; ?> >
      <?php
        
      for ($i = 0, $hover_item = 0, $nnn = count($fields_list); $i < $nnn; $i++) {
          //var_dump($i); var_dump($fields_list[$i]);
        $html = '';
        $field = $fields_list[$i]; 
        $field_styling = get_field_styles($field, $layout);
        $params_field = isset($field_from_params['Params_'.$field->db_field_name]) ? $field_from_params['Params_'.$field->db_field_name] : '';
        $params_field = json_decode($params_field);
        if(isset($params_field->hoverAnimated) && $params_field->hoverAnimated){
            
            $hover_animated[$hover_item][] = ($params_field->hoverAnimated);
            $hover_animated[$hover_item][] = ($field->db_field_name);
            $hover_item++;
        }
        
        $hover_border_collor = (isset($params_field->hover_border_collor)) ? $params_field->hover_border_collor : '';
        $hover_background_color = (isset($params_field->hover_background_collor)) ? $params_field->hover_background_collor : '';
        $hover_text_color = (isset($params_field->hover_text_collor)) ? $params_field->hover_text_collor : '';
        
        if($hover_border_collor != '' || $hover_background_color != ''
                                      || $hover_text_color != ''){
            ?>
      <style type="text/css"> .<?php echo $field->db_field_name; ?>:hover{
            color: <?php echo $hover_text_color ?> !important;
            border-color: <?php echo $hover_border_collor ?> !important;
            background-color: <?php echo $hover_background_color ?> !important;

        }
        </style>
        <?php } 

        
        $layout_params['field_styling'] = $field_styling;
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
        
        //start render custom code
        if(count($layout_params['custom_fields'])){
          foreach ($layout_params['custom_fields'] as $cust_key => $custom_field) {
            if(strpos($layout_html,"{|f-custom_code_field_".$cust_key."|}")){
              if(isset($custom_field['custom_code_field_'.$cust_key.'_access'])
                  && $custom_field['custom_code_field_'.$cust_key.'_access'] != '1'){
                $user = JFactory::getUser();
                if(!checkAccess_cck($custom_field['custom_code_field_'.$cust_key.'_access'], $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
                  $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", '', $layout_html);
                  continue;
                }
              }
              $dispatcher = JDispatcher::getInstance();
              JPluginHelper::importPlugin('content');
              $plug_row = new stdClass();
              $plug_row->text = $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
              $dispatcher->trigger('onContentPrepare', array('com_os_cck', &$plug_row, &$plug_params, 0));
              $custom_field['custom_code_field_'.$cust_key.'_custom_code'] = $plug_row->text;
              //if below fn works , that this is add_instance view
              $code_type = $custom_field['custom_code_field_'.$cust_key.'_custom_code_type'];
              if($code_type == 'SCRIPT'){
                $custom_code = '<script type="text/javascript">';
                $custom_code .= $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
                $custom_code .= '</script>';
                $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_code, $layout_html);
              }elseif($code_type == 'PHP'){
                  //replace mask like {|decimal_textfield_31|}
                  
                $func_result = replaceMaskCustomCodePHP($entityInstance,$plug_row->text, $layout_params, $layout_html, $layout);
                //get custom field content
                //var_dump($func_result); exit;
                //$custom_field['custom_code_field_'.$cust_key.'_custom_code'] = isset($func_result['custom_code_str']) ? $func_result['custom_code_str'] : '';
                $custom_field['custom_code_field_'.$cust_key.'_custom_code'] = $func_result['custom_code_str'];
                //get variables for custom code
                //if(isset($func_result['variables_arr'])){
                    extract($func_result['variables_arr']);
                    
                //}
                
                ob_start();
                $custom_code = eval($custom_field['custom_code_field_'.$cust_key.'_custom_code']);
                
                $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", ob_get_contents(), $layout_html);
                ob_end_clean();
              }elseif($code_type == 'CSS'){
                $custom_css = '<style>'.$custom_field['custom_code_field_'.$cust_key.'_custom_code'].'</style>';
                $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_css, $layout_html);
              }else{
                $func_result = addChildSelectToCustomCode($entityInstance,$plug_row->text, $layout_params, $layout_html, $layout);
                $custom_field['custom_code_field_'.$cust_key.'_custom_code'] = $func_result['custom_code_str'];
                $custom_code = $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
                $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_code, $layout_html);
              }
            }
          }
        }
        //end render custom 


        if(strpos($layout_html,"{|f-".$field->fid."|}")){
           $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
           $php_result = true;
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
                
           }
           
          if($php_result){
          //check access
          //if()
          $value = $entityInstance->getFieldValue($field);
//var_dump($value);
          if($field->field_type == 'rating_field' && isset($layout_params['fields'][$field->db_field_name.'_average'])
              && $layout_params['fields'][$field->db_field_name.'_average'] == 'on'){
              $value = get_average_rating($field, $layout, $entityInstance);
              
              if(isset($layout_params['fields']['display_'.$field->db_field_name]) && $layout_params['fields']['display_'.$field->db_field_name] == 'stars'){
                  $value[0]->data = round($value[0]->data) / 2;
              }elseif(isset($layout_params['fields']['display_'.$field->db_field_name]) && $layout_params['fields']['display_'.$field->db_field_name] == 'nuber'){
                  $value[0]->data = round($value[0]->data, 1);
              }else{
                  $value[0]->data = round($value[0]->data) / 2;
              }
            
            
          }
          
          if(isset($layout_params['fields'][$field->db_field_name]['options']['strlen']) &&
            $layout_params['fields'][$field->db_field_name]['options']['strlen'])
          {
            $field->len = $layout_params['fields'][$field->db_field_name]['options']['strlen'];
          }

          if(isset($field->len) && strlen($value[0]->data) > $field->len)
          {
              $value[0]->data = substr($value[0]->data,0,$field->len);
          }
             
          if(isset($layout_params['fields'][$field->db_field_name.'_published'])){
            $field->published = true;
          }else{
            $field->published = false;
          }
          
          if($field->field_type == 'datetime_popup' && $value[0]->data == '0000-00-00 00:00:00'){
              $datetimevalue = false;
          }else{
              $datetimevalue = true;
          }

          if(empty($value) || !$field->published || !$datetimevalue){
            $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
            continue;
          }

          if(isset($layout_params['fields']['access_'.$field->db_field_name])
              && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
            $user = JFactory::getUser();
            
            if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
              $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
              continue;
            }
          }
          
          if(isset($layout_params['fields'][$field->db_field_name]['options'])){
            $field->options = $layout_params['fields'][$field->db_field_name]['options'];
          }

          if(isset($layout_params['fields'][$field->db_field_name.'_title_field']) 
              && $layout_params['fields'][$field->db_field_name.'_title_field']){
            if(isset($value[0]->data) && !empty($value[0]->data))$title = $value[0]->data;
            else $title = $entityInstance->eiid;
            $layout_params['title'] = $title;
          } 
          
          $image_css = ($field->field_type=='imagefield' && isset($field->options['width'])
                        && isset($field->options['height']) && $value[0]->data != '')?
                        'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':
                        '';
          if($field->field_type=='imagefield'){
              $width_heigth = (isset($field->options['width']) && $value[0]->data != '') ? ' width="' . $field->options['width'] . 'px" ' : '';
              $width_heigth .= (isset($field->options['height']) && $value[0]->data != '') ? ' height="' . $field->options['height'] . 'px" ' : '';
          } else{
              $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
              $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';
          }
          //$field_styling = substr_replace($field_styling, ' display:block;'.$image_css.'"', strlen($field_styling)-1, strlen($field_styling));
          if($field->field_type == 'text_single_checkbox_onoff' && $value[0]->data == 0){
              
          }else{
            $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
          }
          $a_styling = $field_styling;

          //for calendar schedule view
          if(isset($category_params['calendar_layout_params']['fields']['calendar_view_calendar_table'])
            && $category_params['calendar_layout_params']['fields']['calendar_view_calendar_table'] == 'schedule'){

            $layout_params['views']['link_field'] = 
                      (isset($category_params['calendar_layout_params']['fields']['calendar_table_link_field'])) ? 
                      $category_params['calendar_layout_params']['fields']['calendar_table_link_field'] : 
                      array();
          }
          if($field->field_type == 'text_select_list') $shell_tag = 'span';
          $hidden_class = '';
          if(stripos($field->field_type, 'pricefield_number') === 0 && $value[0]->price_value == '0.00'){
              $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
              continue;
          }
          if(!isset($value[0]->data) || $value[0]->data == '' || $value[0]->data == '[]'){
              if(($field->field_type == 'categoryfield' && $value[0]->catid != '') 
                      || $field->field_type == 'locationfield' 
                      || ($field->field_type == 'videofield' && isset($value[0][0]) && $value[0][0]->id != '')
                      || stripos($field->field_type, 'pricefield') === 0
                      || ($field->field_type == 'text_textfield' && $layout_params['fields'][$field->db_field_name.'_default_text'] != '')){
                  
              }else{
                  $hidden_class = ' hidden_field ';
              }
          }

          $html .='<'.$shell_tag.$width_heigth.' '.$field_styling.' class="col_box '.$custom_class. $hidden_class .' ' .$field->db_field_name . '"' . $offset_animation . '>';
//                if(isset($layout_params['views']['link_field'])
//                    && (array_search ( $field->fid , $layout_params['views']['link_field']) > 0
//                    || array_search ( $field->fid , $layout_params['views']['link_field']) === 0)){
//                    var_dump($layout_params['views']['instance_layout']);
                if(isset($layout_params['fields'][$field->db_field_name . '_instance_layout'])
                    && $layout_params['fields'][$field->db_field_name . '_instance_layout'] != '-1'){
                  $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                  $layout_for_link = new os_cckLayout($db);
                  $layout_for_link->load($layout_params['fields'][$field->db_field_name . '_instance_layout']);
                  //var_dump($layout_for_link->type);
                  $cat_id = (isset($category->cid))?'&amp;catid='.$category->cid : '&amp;catid=0';
                  $link = 'index.php?option=com_os_cck&amp;view='.$layout_for_link->type.'&amp;eiid[]='
                  . $entityInstance->eiid .'&amp;lid='.$layout_params['fields'][$field->db_field_name . '_instance_layout']
                  . $cat_id . '&amp;Itemid=' . $Itemid . $modId;

                  ob_start();
                    $html .= "<a href='".JRoute::_($link)."'>";
                    require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                    $html .= ob_get_contents();
                    $html.="</a>";
                  ob_end_clean();
                }else{
                  $layout_params['instance_currency'] = $entityInstance->instance_currency;
                  ob_start();
                    require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                    $html .= ob_get_contents();
                  ob_end_clean();
                }


          $html .='</'.$shell_tag.'>';
        }
        }
          
        $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
        $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
          
        
        
      }
      
      
      $hover_animated = json_encode($hover_animated);
      
      if(isset($layout_params['calculated_price_fields']) && count($layout_params['calculated_price_fields'])){
          foreach($layout_params['calculated_price_fields'] as $key=>$val){
            $field = new stdClass();
            $field->db_field_name = 'cck_calculated_price_' . $key;
            $calculated_price_html = '';
            ob_start();
            require getSiteUniqueFiledViewPath('com_os_cck', 'calculated_price');
            $calculated_price_html .= ob_get_contents();
            ob_end_clean();
            $layout_html = str_replace("{|f-cck_calculated_price_$key|}", $calculated_price_html, $layout_html);
          }
      }
      
      if(isset($layout_params['views']['show_request_layout'])){
          
          foreach ($layout_params['views']['show_request_layout'] as $key => $value) {
               $php_if = isset($layout_params['views']['request_layout_php_show'][$key][0]) ? $layout_params['views']['request_layout_php_show'][$key][0] : '';

               $php_result = true;
               if($php_if != ''){
                    $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
               }
               if($php_result){
                  if(isset($layout_params['views']['show_type_request_layout'][$key][0])){
                    $show_type = $layout_params['views']['show_type_request_layout'][$key][0];
                  }else{
                    $show_type = 1;
                  }

                  $field->db_field_name = "l".$key;
                  $field_styling = get_field_styles($field, $layout);
                  $custom_class = get_field_custom_class($field, $layout);
                  $offset_animation = get_field_offset_animation($field, $layout);
                  $div_styling = get_align_styles($field, $layout);
                  $button_style = array('field_styling'=>$field_styling,'custom_class'=>$custom_class,'offset_animation'=>$offset_animation,'div_styling'=>$div_styling);
                  
                  $button_name = isset($layout_params['views']['show_request_layout_button_name'][$key])?$layout_params['views']['show_request_layout_button_name'][$key][0]:'';
                  if(strpos($layout_html,"{|l-".$key."|}")){
                    $field = new stdClass();
                    $field->db_field_name = $key;
                    if(isset($layout_params['views']['show_request_layout_name'][$key]) &&
                        isset($layout_params['views']['show_request_layout_name'][$key][0]) &&
                        $layout_params['views']['show_request_layout_name'][$key][0] == 'on'){
                      $layout_html = str_replace($key.'-label-hidden', '', $layout_html);
                    }

                    //var_dump($div_styling);
                    $custom_class = get_field_custom_class($field, $layout);
                    //if below fn works , that this is add_instance view
                    $layout_params['title'] = isset($layout_params['title'])?$layout_params['title']:'';

                    ob_start();
                    //echo '<div class="'.$custom_class.'" ' . $offset_animation . ' ' .$div_styling.'>';
                    echo '<div class="'.$custom_class.'" ' . $offset_animation . '>';
                    Instance::show_request_layout($option, $key, $entityInstance->eiid, $show_type,$button_name , $layout_params['has_price'],$layout_params['title'], $button_style);
                    echo '</div>';  
                    $user = JFactory::getUser();
                    if( $value != '1' && !checkAccess_cck($value, $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
                        $layout_html = str_replace("{|l-".$key."|}", '', $layout_html);
                    } else {
                        $layout_html = str_replace("{|l-".$key."|}", ob_get_contents(), $layout_html);
                    }

                    ob_end_clean();
                  }
                }else{
                    $layout_html = str_replace("{|l-".$key."|}", '', $layout_html);
                }
           }
      }

      
      if(isset($layout_params['attachedModule'])){
        
        foreach ($layout_params['attachedModule'] as $attachedModule) {
          if($attachedModule){
            if(strpos($layout_html,"{|m-".$attachedModule->id."|}")){
              $field->db_field_name = 'm_'.$attachedModule->id;
              $field_styling = get_field_styles($field, $layout);
              $custom_class = get_field_custom_class($field, $layout);
              $offset_animation = get_field_offset_animation($field, $layout);
              $module = JModuleHelper::getModule($attachedModule->type,$attachedModule->title);
              $options  = array('style' => 'xhtml');
              $html = '<div class="'.$custom_class.'" ' . $offset_animation . ' ' .$field_styling.'>'.JModuleHelper::renderModule($module,$options).'</div>';
              $layout_html = str_replace("{|m-".$attachedModule->id."|}", $html, $layout_html);
            }
          }
        }
      }
      
      if(isset($child_entities) && is_array($child_entities) && !empty($child_entities)){
          foreach($child_entities as $temp_child_entity){
              if(strpos($layout_html,"{|".$temp_child_entity->data_field_name."|}")){
                  
                  $child_instance_id = getChildInstance($temp_child_entity, $entityInstance->eiid);
                  $child_instance = new os_cckEntityInstance($db);
                  $child_instance->load($child_instance_id);
                  
                  $field = new os_cckEntityField($db);
                  $field->load($temp_child_entity->childEntityFields);
                  $field_styling = get_field_styles($temp_child_entity->data_field_name, $layout);
                  $offset_animation = get_field_offset_animation($temp_child_entity->data_field_name, $layout);
                  $custom_class = get_field_custom_class($temp_child_entity->data_field_name, $layout);
                  //var_dump($offset_animation);
                  //var_dump($field_styling);
                  $value = $child_instance->getFieldValue($field);

                  $field->db_field_name = $temp_child_entity->data_field_name;
                  $html = '';
                  if($field->field_type == 'rating_field' && isset($layout_params['fields'][$field->db_field_name.'_average'])
                      && $layout_params['fields'][$field->db_field_name.'_average'] == 'on'){
                      $value = get_average_rating($field, $layout, $entityInstance);

                      if(isset($layout_params['fields']['display_'.$field->db_field_name]) && $layout_params['fields']['display_'.$field->db_field_name] == 'stars'){
                          $value[0]->data = round($value[0]->data) / 2;
                      }elseif(isset($layout_params['fields']['display_'.$field->db_field_name]) && $layout_params['fields']['display_'.$field->db_field_name] == 'nuber'){
                          $value[0]->data = round($value[0]->data, 1);
                      }else{
                          $value[0]->data = round($value[0]->data) / 2;
                      }


                  }

                  if(isset($layout_params['fields'][$field->db_field_name]['options']['strlen']) &&
                    $layout_params['fields'][$field->db_field_name]['options']['strlen'])
                  {
                    $field->len = $layout_params['fields'][$field->db_field_name]['options']['strlen'];
                  }
                  
                  if($value != '' && isset($field->len) && strlen($value[0]->data) > $field->len)
                  {
                      $value[0]->data = substr($value[0]->data,0,$field->len);
                  }

                  $field->published = true;
                  

                  if($field->field_type == 'datetime_popup' && $value[0]->data == '0000-00-00 00:00:00'){
                      $datetimevalue = false;
                  }else{
                      $datetimevalue = true;
                  }

                  if(empty($value) || $value == '' || !$field->published || !$datetimevalue){
                    $layout_html = str_replace("{|".$field->db_field_name."|}", '<span class="delete_empty_child_entity"></span>', $layout_html);
                    continue;
                  }

                  if(isset($layout_params['fields']['access_'.$field->db_field_name])
                      && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
                    $user = JFactory::getUser();
                    if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
                      $layout_html = str_replace("{|".$field->db_field_name."|}", $html, $layout_html);
                      continue;
                    }
                  }

                  if(isset($layout_params['fields'][$field->db_field_name]['options'])){
                    $field->options = $layout_params['fields'][$field->db_field_name]['options'];
                  }

                  if(isset($layout_params['fields'][$field->db_field_name.'_title_field']) 
                      && $layout_params['fields'][$field->db_field_name.'_title_field']){
                    if(isset($value[0]->data) && !empty($value[0]->data))$title = $value[0]->data;
                    else $title = $entityInstance->eiid;
                    $layout_params['title'] = $title;
                  }

                  $image_css = ($field->field_type=='imagefield' && isset($field->options['width'])
                                && isset($field->options['height']) && $value[0]->data != '')?
                                'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':
                                '';
                  if($field->field_type=='imagefield'){
                      $width_heigth = (isset($field->options['width']) && $value[0]->data != '') ? ' width="' . $field->options['width'] . 'px" ' : '';
                      $width_heigth .= (isset($field->options['height']) && $value[0]->data != '') ? ' height="' . $field->options['height'] . 'px" ' : '';
                  } else{
                      $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
                      $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';
                  }
                  //$field_styling = substr_replace($field_styling, ' display:block;'.$image_css.'"', strlen($field_styling)-1, strlen($field_styling));
                  if($field->field_type == 'text_single_checkbox_onoff' && $value[0]->data == 0){

                  }else{
                    $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
                  }
                  $a_styling = $field_styling;

                  //for calendar schedule view
                  if(isset($category_params['calendar_layout_params']['fields']['calendar_view_calendar_table'])
                    && $category_params['calendar_layout_params']['fields']['calendar_view_calendar_table'] == 'schedule'){

                    $layout_params['views']['link_field'] = 
                              (isset($category_params['calendar_layout_params']['fields']['calendar_table_link_field'])) ? 
                              $category_params['calendar_layout_params']['fields']['calendar_table_link_field'] : 
                              array();
                  }
                  if($field->field_type == 'text_select_list') $shell_tag = 'span';
    
                  $html .='<'.$shell_tag.$width_heigth.' '.$field_styling.' class="col_box '.$custom_class. ' ' .$field->db_field_name . '"' . $offset_animation . '>';
//                        if(isset($layout_params['views']['link_field'])
//                            && (array_search ( $field->fid , $layout_params['views']['link_field']) > 0
//                            || array_search ( $field->fid , $layout_params['views']['link_field']) === 0)){
                          if(isset($layout_params['fields'][$field->db_field_name . '_instance_layout'])
                            && $layout_params['fields'][$field->db_field_name . '_instance_layout'] != '-1'){
                          $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';

                          $layout_for_link = new os_cckLayout($db);
                          $layout_for_link->load($layout_params['fields'][$field->db_field_name . '_instance_layout']);
                          //var_dump($layout_for_link->type);
                          $cat_id = (isset($category->cid))?'&amp;catid='.$category->cid : '&amp;catid=0';
                          $link = 'index.php?option=com_os_cck&amp;view='.$layout_for_link->type.'&amp;eiid[]='
                          . $child_instance_id .'&amp;lid='.$layout_params['fields'][$field->db_field_name . '_instance_layout']
                          . $cat_id . '&amp;Itemid=' . $Itemid . $modId;

                          ob_start();
                            $html .= "<a href='".JRoute::_($link)."'>";
                            require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                            $html .= ob_get_contents();
                            $html.="</a>";
                          ob_end_clean();
                        }else{
                          $layout_params['instance_currency'] = $entityInstance->instance_currency;
                          ob_start();
                            require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                            $html .= ob_get_contents();
                          ob_end_clean();
                        }


                  $html .='</'.$shell_tag.'>';
                  //var_dump($value);
                  $layout_html = str_replace("{|".$temp_child_entity->data_field_name."|}", $html, $layout_html);
              }
              
          }
      }
      
      //var_dump(strpos($layout_html, "{|f-cck_add_to_cart_button|}"));
      //send button
      if(strpos($layout_html, "{|f-cck_add_to_cart_button|}") !== FALSE){
        $field->db_field_name = 'cck_add_to_cart_button';
        $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
       $php_result = true;
       if($php_if != ''){
            $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
       }
       if(!$php_result){
           $layout_html = str_replace("{|f-".$field->db_field_name."|}", '', $layout_html);
       }
        $onclick_event = (isset($layout_params['fields'][$field->db_field_name.'_onclick_event'])) ? $layout_params['fields'][$field->db_field_name.'_onclick_event'] : 0;
        if($onclick_event == 0){
            $onclick_event_value = (isset($layout_params['fields'][$field->db_field_name.'_add_effect'])) ? $layout_params['fields'][$field->db_field_name.'_add_effect'] : '';
        }else{
            $cart_layout = (isset($layout_params['fields'][$field->db_field_name.'_cart_layout'])) ? $layout_params['fields'][$field->db_field_name.'_cart_layout'] : '';
            $link = 'index.php?option=com_os_cck&amp;view=cart&amp;lid='.$cart_layout;
            $onclick_event_value = JRoute::_($link);
        }
        
        $field_styling = get_field_styles($field, $layout);
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        $div_styling = get_align_styles($field, $layout);
        ob_start();
        echo '<div '.$div_styling.'>';
          $buttonText = isset($layout_params["views"]["layout_button_text"])
                        && !empty($layout_params["views"]["layout_button_text"])?$layout_params["views"]["layout_button_text"]:JText::_('COM_OS_CCK_BUTTON_FORM_SEND_REQUEST');
          ?>
          <input <?php echo $field_styling; ?> type="button" name="request_button" value="<?php echo $buttonText; ?>"
                       class="button <?php echo $custom_class; ?>" <?php echo $offset_animation; ?> onclick="javascript:CckAddToCart('<?php echo $entityInstance->eiid; ?>', '<?php echo $onclick_event; ?>', '<?php echo $onclick_event_value; ?>', this, '<?php echo JURI::root(); ?>');">
        <?php
        echo '</div>';
        $layout_html = str_replace("{|f-cck_add_to_cart_button|}", ob_get_contents(), $layout_html);
        ob_end_clean();
      }
        //send button
      
      if(isset($layout_params['fields']['cck_booking_cal_published']) 
              && $layout_params['fields']['cck_booking_cal_published'] 
              && strpos($layout_html, "{|f-cck_booking_cal|}") !== false){
          $field->db_field_name = 'cck_booking_cal';
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
           $php_result = true;
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
           }
           if(!$php_result){
               $layout_html = str_replace("{|f-".$field->db_field_name."|}", '', $layout_html);
           }
           $user = JFactory::getUser();
            if(isset($layout_params['fields']['access_'.$field->db_field_name])
                && $layout_params['fields']['access_'.$field->db_field_name] != '1' 
                && !checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
                $layout_html = str_replace("{|f-".$field->db_field_name."|}", '', $layout_html);
            }
            
            //get contents
            $field_styling = get_field_styles($field, $layout);
            $custom_class = get_field_custom_class($field, $layout);
            $offset_animation = get_field_offset_animation($field, $layout);
            $shell_tag = isset($layout_params['fields']['label_tag_'.$field->db_field_name])?$layout_params['fields']['label_tag_'.$field->db_field_name]:'span';
            
            $month = $jinput->get('month_selected', date('n'), 'INT');;
            $year = $jinput->get('year_selected', date('Y'), 'INT');;
            //var_dump($jinput); exit;
            $show_month = $layout_params['fields']['months_'.$field->db_field_name];
            $show_details = $layout_params['fields'][$field->db_field_name.'_show_day_details'];
            //var_dump($layout_params['fields'][$field->db_field_name.'_show_month_year']);
            ob_start();
            echo '<'.$shell_tag .' '. $field_styling.' class="cck_booking_calendar ' . $custom_class . '">';
            $calendar = new booking_calendar();
            if($layout_params['fields'][$field->db_field_name.'_show_month_year']){
                $month_year_html = $calendar->getMonthYearSelect($layout_params['fields'][$field->db_field_name.'_initial_year'], $layout_params['fields'][$field->db_field_name.'_final_year']);
                echo $month_year_html;
            }
            $calendar_html = $calendar::getCalendar($month,$year,$entityInstance->eiid,$show_details);
            if(in_array('last', $show_month)) echo $calendar_html->tab1;
            if(in_array('current', $show_month)) echo $calendar_html->tab2;
            if(in_array('next1', $show_month)) echo $calendar_html->tab3;
            if(in_array('next2', $show_month)) echo $calendar_html->tab4;
            
            if($layout_params['fields'][$field->db_field_name.'_show_nav_butt']){
                $nav_buttons_html = $calendar->getNavButtons();
                echo $nav_buttons_html;
            }
            echo '</'.$shell_tag.'>';
            $layout_html = str_replace("{|f-".$field->db_field_name."|}", ob_get_contents(), $layout_html);
            ob_end_clean();
      }
      if(isset($layout_params['fields']['cck_cal_import_published']) 
              && $layout_params['fields']['cck_cal_import_published'] 
              && strpos($layout_html, "{|f-cck_cal_import|}") !== false){
          
        $field->db_field_name = 'cck_cal_import';
        $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
           $php_result = true;
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
           }
           
          if($php_result){
        //access
            $user = JFactory::getUser();
            if(isset($layout_params['fields']['access_'.$field->db_field_name])
                && $layout_params['fields']['access_'.$field->db_field_name] != '1' 
                && !checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
            $layout_html = str_replace("{|f-".$field->db_field_name."|}", '', $layout_html);
            }

            //get contents

            //get calendar list
            $calendars_list = $layout_params['fields']['cck_cal_import_calendars_list'];

            //get field names
            $event_title = $layout_params['fields']['cck_cal_import_event_title'];
            $event_date_start = $layout_params['fields']['cck_cal_import_event_date_start'];
            $event_date_end = $layout_params['fields']['cck_cal_import_event_date_end'];
            $event_description = $layout_params['fields']['cck_cal_import_event_description'];
            $event_location = $layout_params['fields']['cck_cal_import_event_location'];
            $event_items_location = $layout_params['fields']['cck_cal_import_event_items_location'];

            //get field values
            $event_title = $entityInstance->getFieldValueCalImport($event_title);
            $event_date_start = $entityInstance->getFieldValueCalImport($event_date_start);
            $event_date_end = $entityInstance->getFieldValueCalImport($event_date_end);
            $event_description = $entityInstance->getFieldValueCalImport($event_description);
            $event_location_db = $entityInstance->getFieldValueCalImport($event_location, true);

            $event_location_string = '';
            if($event_location != '-1' && count($event_items_location) > 0){
              foreach ($event_items_location as $key => $value) {
                $event_location_string .= $event_location_db->$value;
                if(count($event_items_location)-1 != $key) $event_location_string .= ", ";
              }
            }

            $calendarConstruct = new CalendarUrlConstruct($event_title->data, 
                                                          $event_date_start->data,
                                                          $event_date_end->data,
                                                          $event_description->data,
                                                          $event_location_string); 

            $googleUrl = $calendarConstruct->get("Url","Google");
            $yahooUrl = $calendarConstruct->get("Url","Yahoo");
            $icsUrl = $calendarConstruct->get("Url","ICS");

            //get contents
            $field_styling = get_field_styles($field, $layout);
            $custom_class = get_field_custom_class($field, $layout);
            $offset_animation = get_field_offset_animation($field, $layout);
            $shell_tag = isset($layout_params['fields']['label_tag_'.$field->db_field_name])?$layout_params['fields']['label_tag_'.$field->db_field_name]:'span';

            ob_start();
              echo '<'.$shell_tag .' '. $field_styling.'  >';

            ?>

              <div class="btn-group <?php echo $custom_class;?>" <?php echo $offset_animation; ?> style="z-index: 999;">
                <div class="btn dropdown_os-toggle dropdown-toggle" align="center" data-toggle="dropdown_os">
                <?php echo JHtml::_('image', 'components/com_os_cck/assets/images/cal_icons/addthis_16.png','', array());?> 
                <?php echo JText::_('COM_OS_CCK_LAYOUT_CALENDAR_IMPORT');?> <span class="caret"></span></div>
                <ul class="dropdown_os-menu dropdown-menu" >
                <?php if(in_array('google', $calendars_list)): ?>
                  <li><a href="<?php echo $googleUrl;?>">
                  <?php echo JHtml::_('image', 'components/com_os_cck/assets/images/cal_icons/google_cal-16.png','', array());?> 
                  Google Calendar</a></li>
                <?php endif;?>
                <?php if(in_array('ical', $calendars_list)): ?>
                  <li><a href="<?php echo JRoute::_($icsUrl);?>">
                  <?php echo JHtml::_('image', 'components/com_os_cck/assets/images/cal_icons/apple_ical-16.png','', array());?> 
                  ICal Calendar</a></li>
                <?php endif;?>
                <?php if(in_array('outlook', $calendars_list)): ?>
                  <li><a href="<?php echo JRoute::_($icsUrl);?>">
                  <?php echo JHtml::_('image', 'components/com_os_cck/assets/images/cal_icons/outlook_cal-16.png','', array());?> 
                  Outlook Calendar</a></li>
                <?php endif;?>
                <?php if(in_array('yahoo', $calendars_list)): ?>
                  <li><a href="<?php echo $yahooUrl;?>">
                  <?php echo JHtml::_('image', 'components/com_os_cck/assets/images/cal_icons/yahoo_cal-16.png','', array());?> 
                  Yahoo Calendar</a></li>
                <?php endif;?>
                </ul>
              </div>
          <script type="text/javascript">
              jQuerOs(document).ready(function(){
                jQuerOs('[data-field-name=cck_cal_import]').parents('.drop-item').css('z-index', '71999');
              })
              
          </script>

            <?php

            echo '</'.$shell_tag.'>';
            $layout_html = str_replace("{|f-".$field->db_field_name."|}", ob_get_contents(), $layout_html);
            ob_end_clean();
          }else{
              $layout_html = str_replace("{|f-".$field->db_field_name."|}", '', $layout_html);
          }
      }


       if(isset($layout_params['fields']['cck_instance_navigation_published']) 
        && $layout_params['fields']['cck_instance_navigation_published']){
           $field->db_field_name = 'cck_instance_navigation';
           $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
           $php_result = true;
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
           }
           
          if($php_result){
        //access
        
            $user = JFactory::getUser();
            
            if(isset($layout_params['fields']['access_cck_instance_navigation'])
                  && $layout_params['fields']['access_cck_instance_navigation'] != '1' 
                  && !checkAccess_cck($layout_params['fields']['access_cck_instance_navigation'], $user->groups, $layout->fk_eid, 'fields', $entityInstance->eiid)){
                
              $layout_html = str_replace("{|f-cck_instance_navigation|}", '', $layout_html);
            }
            
            $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
            $catId = isset($category->cid)?'&amp;catid='.$category->cid:'';
            $link = 'index.php?option=com_os_cck&amp;view=instance&amp;lid='.$layout->lid. $catId. '&amp;Itemid=' . $Itemid . $modId;
            $prev = '&amp;eiid[0]='.$layout_params['prevInstId'];
            $next = '&amp;eiid[0]='.$layout_params['nextInstId'];
            $custom_class = get_field_custom_class($field, $layout);
            $shell_tag = isset($layout_params['fields']['label_tag_'.$field->db_field_name])?$layout_params['fields']['label_tag_'.$field->db_field_name]:'span';
            $field_styling = get_field_styles($field, $layout);

            ob_start();
            ?>
            <div id="os_navigation" class="<?php echo $custom_class; ?>">
              <?php
              if($layout_params['prevInstId']){
                ?>
                <<?php echo $shell_tag; ?> class="os_navigation_prev">
                  <a <?php echo $field_styling?> href="<?php echo $link.$prev;?>">
                      Prev
                  </a>
                </<?php echo $shell_tag; ?>>
                <?php
              }
              if($layout_params['nextInstId']){
                ?>
                <<?php echo $shell_tag; ?> class="os_navigation_next">
                  <a <?php echo $field_styling?> href="<?php echo $link.$next?>">
                      Next
                  </a>
                </<?php echo $shell_tag; ?>>
                <?php
              } ?>
            </div>
            <?php
            $html = ob_get_contents();
            
            ob_end_clean();

              $layout_html = str_replace("{|f-cck_instance_navigation|}", $html, $layout_html);
          }else{
              $layout_html = str_replace("{|f-cck_instance_navigation|}", $html, $layout_html);
          }
          echo $layout_html; 
        }
      ?>
  </div>
</div>
<script type="text/javascript">
  loadInstance();

</script>
