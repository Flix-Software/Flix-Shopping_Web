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

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root() . "/components/com_os_cck/assets/css/front_end_style.css");


$rand = rand();
?>
<!--*************************************************************START Search Layout*******************************************************************-->
<div class="cck-body">
  <?php
  $buttonText = (isset($layout_params["button_name"]) && $layout_params["button_name"] != '') ? $layout_params["button_name"] : JText::_("COM_OS_CCK_LABEL_SEARCH_BUTTON");
  //var_dump($buttonText); exit;
  if(isset($layout_params['show_type']) && $layout_params['show_type'] == 3){
    $Itemid  = intval(JRequest::getVar('Itemid'));
    $link_catid = '';
    if(isset($layout_params['catid'])){
      $link_catid = "&amp;catid=".$layout_params['catid'];
    }
    $link = "index.php?option=com_os_cck&amp;task=show_search&amp;lid=".$layout->lid.$link_catid."&amp;Itemid=$Itemid";
    ?>
  <div <?php echo $button_style['div_styling']; ?>><?php
    echo '<a '.$button_style['field_styling'].' class="button '.$button_style['custom_class'].'" '. $button_style['offset_animation'] . 'href="'.JRoute::_($link).'">'.$buttonText.'</a>';
    ?> </div> <?php

    echo "</div>"; //close <div class="cck-body">
    return;
  }
  
  if(isset($layout_params['show_type']) && $layout_params['show_type'] == 2){ 
    ?>
  <div <?php echo $button_style['div_styling']; ?>>
    <input <?php echo $button_style['field_styling'];?> type="button" class="button btn btn-info <?php echo $button_style['custom_class'];?>" <?php echo $button_style['offset_animation']; ?> value="<?php echo $buttonText; ?>"
        onclick="jQuerOs('#request_wrapper_<?php echo $layout->type?><?php echo $rand; ?><?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>').stop().fadeToggle();"/>
  </div>
    <div class="search_request_wrapper" id="request_wrapper_<?php echo $layout->type?><?php echo $rand; ?><?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" style="display: none;">
    <?php
  }

  if(isset($layout_params['views']['show_layout_title']) && $layout_params['views']['show_layout_title'])
  {
    echo "<h3>";
      echo $layout_params['views']['layout_title'];
    echo "</h3>";
  }

  $field = new stdClass();
  $field->db_field_name = 'form-'.$layout->lid;
  $form_styling = get_field_styles($field, $layout);
  $form_custom_class = get_field_custom_class($field, $layout);
  $form_offset_animation = get_field_offset_animation($field, $layout);
  $form_hover_animation = get_field_hover_animation($field, $layout);
  $child_entities = (isset($layout_params['child_entities'])) ? $layout_params['child_entities'] : '';
  //var_dump($form_offset_animation);
  $entityInstance = new os_cckEntityInstance($db);
  $entityInstance->fk_eid = $layout->fk_eid;
  
  ?>
  <form class="<?php echo $form_custom_class; ?>" <?php echo $form_offset_animation; ?> <?php echo $form_hover_animation; ?> <?php echo $form_styling; ?> action="<?php echo JRoute::_('index.php'); ?>" method="GET" name="serchForm" id="searchForm">
    <div class="adminlist cck_search">

      <div class="search_checkbox">
        <?php
        $layout_html = urldecode($layout->layout_html);
        $layout_html = cut_params($layout_html);
        $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
        $fields_from_params = $layout_params["fields"];
        if(!isset($fields)) $fields = $layout->field_list;
        
        $fields_list = $fields;
        
        
        //add child selects to layout
        $addChildSelectToLayout = addChildSelectToLayout($fields_list, $entityInstance, $layout_params, $layout_html, $layout);
        $layout_html = $addChildSelectToLayout['layout_html'];
        $layout_params = $addChildSelectToLayout['layout_params'];
        $parent = $addChildSelectToLayout['select_parent'];
        $layout->params = serialize($layout_params);
        //add child selects to layout



   if(strpos($layout_html,"{|f-price_search|}") 
    && isset($layout_params['fields']['price_search_published']) 
    && $layout_params['fields']['price_search_published'] == 'on'){
        $field_styling = get_field_styles('price_search', $layout);
        $div_styling = get_align_styles('price_search', $layout);
        
        $field = new stdClass();
        $field->db_field_name = 'price_search';
        //$layout_params['fields']['Params_cck_send_button']
        $params_price_search = json_decode($layout_params['fields']['Params_price_search']);
        
        $custom_class = $params_price_search->customClass;
        $animation = ($params_price_search->animated) ? $params_price_search->animated : '';
        if($animation != ''){
            $animation_class = 'wow animated ' . $animation;
        }
        $offset_animation = ($params_price_search->offsetAnimated) ? $params_price_search->offsetAnimated : '';
        //var_dump($params_search_field);
        //$offset_animation = get_field_offset_animation($field, $layout);
    ob_start();

    ?>
  
      <div <?php echo $div_styling; ?>>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'])){
                echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
            }?>
          <span>
              <?php if(!empty($layout_params['fields']['price_search_prefix'])){
                echo $layout_params['fields']['price_search_prefix'].' ';
              } ?>
            
          </span>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'])){
                echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
            } ?>
          <?php require getSiteUniqueFiledViewPath('com_os_cck', 'price_search'); ?>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'])){
              echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
          } ?>
          <span>
              <?php if(!empty($layout_params['fields']['price_search_suffix'])){
                echo $layout_params['fields']['price_search_suffix'].' ';
              } ?>
          </span>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'])){
              echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
          } ?>
      </div>

    <?php 
      $layout_html = str_replace("{|f-price_search|}", ob_get_contents(), $layout_html);
      ob_end_clean();
    }else{
      $layout_html = str_replace("{|f-price_search|}", '', $layout_html);
    }
    
    if(strpos($layout_html,"{|f-cck_search_field|}") 
    && isset($layout_params['fields']['cck_search_field_published']) 
    && $layout_params['fields']['cck_search_field_published'] == 'on'){
        $input_styling = get_field_styles('cck_search_field', $layout);
        $div_styling = get_align_styles('cck_search_field', $layout);
        
        //$layout_params['fields']['Params_cck_send_button']
        $params_search_field = json_decode($layout_params['fields']['Params_cck_search_field']);
        
        $custom_class = isset($params_search_field->customClass) ? $params_search_field->customClass : '';
        $animation = isset($params_search_field->animated) ? $params_search_field->animated : '';
        $animation_class = '';
        if($animation != ''){
            $animation_class = 'wow animated ' . $animation;
        }
        $offset_animation = isset($params_search_field->offsetAnimated) ? $params_search_field->offsetAnimated : '';
        //var_dump($params_search_field);
        //$offset_animation = get_field_offset_animation($field, $layout);
    ob_start();

    ?>
  
      <div <?php echo $div_styling; ?>>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'])){
                echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
            }?>
          <span>
              <?php if(!empty($layout_params['fields']['cck_search_field_prefix'])){
                echo $layout_params['fields']['cck_search_field_prefix'].' ';
              } ?>
            
          </span>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'])){
                echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
            } ?>
          <span>
              <input type="text" name="search" value="" class="<?php echo $custom_class . ' ' . $animation_class; ?> inputbox" data-wow-offset="<?php echo $offset_animation; ?>"
              placeholder="<?php echo $layout_params['fields']['cck_search_field_placeholder'];?>" <?php echo $input_styling; ?>/>
          </span>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'])){
              echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
          } ?>
          <span>
              <?php if(!empty($layout_params['fields']['cck_search_field_suffix'])){
                echo $layout_params['fields']['cck_search_field_suffix'].' ';
              } ?>
          </span>
          <?php if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'])){
              echo '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
          } ?>
      </div>

    <?php 
      $layout_html = str_replace("{|f-cck_search_field|}", ob_get_contents(), $layout_html);
      ob_end_clean();
    }else{
      $layout_html = str_replace("{|f-cck_search_field|}", '', $layout_html);
    }


        foreach ($fields as $field){
          $html = '';
          if(strpos($layout_html,"{|f-".$field->fid."|}")){
            $field_styling = get_field_styles($field, $layout);
            $custom_class = get_field_custom_class($field, $layout);
            $offset_animation = get_field_offset_animation($field, $layout);
            $layout_params['field_styling'] = $field_styling;

            //start render custom code
            if(count($layout_params['custom_fields'])){
              foreach ($layout_params['custom_fields'] as $cust_key => $custom_field) {
                if(strpos($layout_html,"{|f-custom_code_field_".$cust_key."|}")){
                  //check access
                  if(isset($custom_field['custom_code_field_'.$cust_key.'_access'])
                      && $custom_field['custom_code_field_'.$cust_key.'_access'] != '1'){
                    $user = JFactory::getUser();
                    if(!checkAccess_cck($custom_field['custom_code_field_'.$cust_key.'_access'], $user->groups, $layout->fk_eid, 'fields')){
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
                    ob_start();
                    $custom_code = eval($custom_field['custom_code_field_'.$cust_key.'_custom_code']);
                    $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", ob_get_contents(), $layout_html);
                    ob_end_clean();
                  }elseif($code_type == 'CSS'){
                    $custom_css = '<style>'.$custom_field['custom_code_field_'.$cust_key.'_custom_code'].'</style>';
                    $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_css, $layout_html);
                  }else{
                    $custom_code = $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
                    $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_code, $layout_html);
                  }
                }
              }
            }
            //end render

            if(isset($layout_params['fields']['access_'.$field->db_field_name])
                && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
              $user = JFactory::getUser();
              if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields')){
                $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
                continue;
              }
            }
            if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'])){
                $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
            }
            if(!empty($layout_params['fields'][$field->db_field_name.'_prefix'])){
              $html .= $layout_params['fields'][$field->db_field_name.'_prefix'].' ';
            }
            if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'])){
                $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
            }
            ob_start();
              require getSiteSearchFiledViewPath('com_os_cck', $field->field_type);
              $html .= ob_get_contents();
            ob_end_clean();
            if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'])){
              $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
            }
            if(!empty($layout_params['fields'][$field->db_field_name.'_suffix'])){
              $html.= ' '.$layout_params['fields'][$field->db_field_name.'_suffix'];
            }
            if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'])){
              $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
            }
            if(isset($layout_params['fields'][$field->db_field_name.'_published']) && 
              $layout_params['fields'][$field->db_field_name.'_published'] == 'on')
            {
              $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
            }else{
              $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
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
                $html = '<div class="'.$custom_class.'" ' . $offset_animation . ' ' . $field_styling.'>'.JModuleHelper::renderModule($module,$options).'</div>';
                $layout_html = str_replace("{|m-".$attachedModule->id."|}", $html, $layout_html);
              }
            }
          }
        }
        //var_dump($child_entities);
        if(isset($child_entities) && is_array($child_entities) && !empty($child_entities)){
          foreach($child_entities as $temp_child_entity){
              if(strpos($layout_html,"{|".$temp_child_entity->data_field_name."|}")){
                  $html = '';
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
                  //$value = $child_instance->getFieldValue($field);

                  $field->db_field_name = $temp_child_entity->data_field_name;
                  if(isset($layout_params['fields']['access_'.$field->db_field_name])
                        && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
                      $user = JFactory::getUser();
                      if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields')){
                        $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
                        continue;
                      }
                    }
                    if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'])){
                        $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
                    }
                    if(!empty($layout_params['fields'][$field->db_field_name.'_prefix'])){
                      $html .= $layout_params['fields'][$field->db_field_name.'_prefix'].' ';
                    }
                    if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'])){
                        $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
                    }
                    ob_start();
                      require getSiteSearchFiledViewPath('com_os_cck', $field->field_type);
                      $html .= ob_get_contents();
                    ob_end_clean();
                    if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'])){
                      $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
                    }
                    if(!empty($layout_params['fields'][$field->db_field_name.'_suffix'])){
                      $html.= ' '.$layout_params['fields'][$field->db_field_name.'_suffix'];
                    }
                    if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'])){
                      $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
                    }
                    if(isset($layout_params['fields'][$field->db_field_name.'_published']) && 
                      $layout_params['fields'][$field->db_field_name.'_published'] == 'on')
                    {
                      $layout_html = str_replace("{|".$temp_child_entity->data_field_name."|}", $html, $layout_html);
                    }else{
                      $layout_html = str_replace("{|".$temp_child_entity->data_field_name."|}", '', $layout_html);
                    }
              }
              
          }
      }

        $div_styling = get_field_styles('cck_send_button', $layout);
        //$layout_params['fields']['Params_cck_send_button']
        $params_send_button = json_decode($layout_params['fields']['Params_cck_send_button']);
        $custom_class = isset($params_send_button->customClass) ? $params_send_button->customClass : '';
        $offset_animation = get_field_offset_animation($field, $layout);
        ob_start(); 
        $buttonText = isset($layout_params["views"]["layout_button_text"])
                    && !empty($layout_params["views"]["layout_button_text"])?$layout_params["views"]["layout_button_text"]:JText::_('COM_OS_CCK_SEARCH_BUTTON');
        
        ?>
          <div <?php echo $div_styling; ?> display:block;>
            <input class="<?php echo $custom_class; ?>  button btn btn-primary" <?php echo $offset_animation; ?> type="submit" value="<?php echo $buttonText;?>">
          </div>
        <?php
        $layout_html = str_replace("{|f-cck_send_button|}", ob_get_contents(), $layout_html);
        ob_end_clean();

        echo $layout_html;
        ?>
      </div>
    </div>
    <input type="hidden" value="search" name="task">
    <input type="hidden" name="lid" value="<?php echo $layout->lid; ?>">
    <?php if($moduleId)echo'<input type="hidden" value="'.$moduleId.'" name="moduleId">';?>
    <input type="hidden" value="com_os_cck" name="option">
    <input type="hidden" value="<?php echo isset($Itemid) ? $Itemid : ''; ?>" name="Itemid">
  </form>

  <?php if(isset($layout_params['show_type']) && $layout_params['show_type'] == 2) echo '</div>'; ?>
  
  <script>
    //jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row, .delete-layout").remove();
    jQuerOs(".delete-field, .delete-row, .delete-layout").remove();

    jQuerOs("input.f-params").remove();

    jQuerOs("div[class *='cck-row-'], div[id *='cck_col-']").each(function(index, el) {
      jQuerOs(el).attr("style",jQuerOs(el).data("block-styling"))
    });
    jQuerOs("div[class *='cck-row-']").addClass('row');
    //jQuerOs("span.cck-help-string").remove();
    jQuerOs(function () {
      jQuerOs('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</div>
