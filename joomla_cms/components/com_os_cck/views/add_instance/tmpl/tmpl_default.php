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
$doc->addStyleSheet(JURI::root() . "components/com_os_cck/assets/css/front_end_style.css");

if(isset($params) && $params->get('show_type','')){
  $show_type = $params->get('show_type');
}elseif(isset($layout_params['show_type'])){
  $show_type = $layout_params['show_type'];
}else{
  $show_type = 1;
}
$count = 0;
?>
<div class="cck-body">

  <script>
    var checkExpr = [];
  </script>

  <?php
  $hidden = '';

  if(!$layout) {
    echo "</div>"; //close <div class="cck-body">
    return;
  }

  if(isset($layout_params['views']['show_layout_title']) 
    && $layout_params['views']['show_layout_title']){
    echo "<h3>";
      echo $layout_params['views']['layout_title'];
    echo "</h3>";
  }

  $fields_list = $layout->field_list;
  $layout_type = $layout->type;
  $unique_form_id = $layout_type.'_Form_'.$layout->parent_eiid.$moduleId.rand();
  $field_from_params = $layout_params['fields'];
  $from = false;
  $to = false;
  //var_dump($show_type); exit;
  if($show_type == 3){
    $Itemid  = JRequest::getVar('Itemid');
    if(isset($layout->fk_eid)){
      $link_eiid = "&eiid=$layout->parent_eiid";
    }
    $link = JRoute::_(JURI::root()."index.php?option=com_os_cck&task=show_request_layout$link_eiid&lid=".$layout->lid."&Itemid=$Itemid");
    $div_styling = isset($button_style['div_styling']) ? $button_style['div_styling'] : ''; 
     $field_styling = isset($button_style['field_styling']) ? $button_style['field_styling'] : '';
     $custom_class = isset($button_style['custom_class']) ? $button_style['custom_class'] : '';
     $offset_animation = isset($button_style['offset_animation']) ? $button_style['offset_animation'] : '';
    ?>
  <div <?php echo $div_styling; ?>>
      <a <?php echo $field_styling;?>  class="button <?php echo $custom_class;?>" <?php echo $offset_animation; ?> href="<?php echo $link ?>">
        <?php echo ($layout_params['button_name'])?$layout_params['button_name'] : JText::_('COM_OS_CCK_BUTTON_SHOW_FORM_SAVE'); ?>
      </a>
  </div>
    <?php
    echo "</div>"; //close <div class="cck-body">
    return;
  }



  if($show_type == 2){
     $div_styling = isset($button_style['div_styling']) ? $button_style['div_styling'] : ''; 
     $field_styling = isset($button_style['field_styling']) ? $button_style['field_styling'] : '';
     $custom_class = isset($button_style['custom_class']) ? $button_style['custom_class'] : '';
     $offset_animation = isset($button_style['offset_animation']) ? $button_style['offset_animation'] : '';?>
  <div <?php echo $div_styling; ?>>
    <input <?php echo $field_styling;?>  type="button" class="button btn btn-info <?php echo $custom_class;?>" <?php echo $offset_animation; ?> value="<?php echo ($layout_params['button_name'])?$layout_params['button_name'] : JText::_('COM_OS_CCK_BUTTON_SHOW_FORM_SAVE'); ?>"
          onclick="jQuerOs('#request_wrapper_<?php echo $layout_type?><?php echo $unique_form_id; ?><?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>').stop().fadeToggle();"/>
  </div>
    <div class="rent_request_wrapper" id="request_wrapper_<?php echo $layout_type?><?php echo $unique_form_id; ?><?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" style="display: none;">
    <?php
  }

  $field = new stdClass();
  $field->db_field_name = 'form-'.$layout->lid;
  $form_styling = get_field_styles($field, $layout);
  $form_custom_class = get_field_custom_class($field, $layout);
  $form_offset_animation = get_field_offset_animation($field, $layout);
  $form_hover_animation = get_field_hover_animation($field, $layout);
  $layout_html = urldecode($layout->layout_html);
  $layout_html = cut_params($layout_html);
  $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
  
  //add child selects to layout
  $addChildSelectToLayout = addChildSelectToLayout($fields_list, $entityInstance, $layout_params, $layout_html, $layout);
  $layout_html = $addChildSelectToLayout['layout_html'];
  $layout_params = $addChildSelectToLayout['layout_params'];
  $parent = $addChildSelectToLayout['select_parent'];
  $layout->params = serialize($layout_params);
  $child_entities = (isset($layout_params['child_entities'])) ? $layout_params['child_entities'] : '';
  //add child selects to layout
  
  ?>
  <form class="<?php echo $form_custom_class; ?>" <?php echo $form_offset_animation; ?> <?php echo $form_hover_animation; ?> <?php echo $form_styling; ?> action="index.php" method="post" name="<?php echo $unique_form_id?>" id="<?php echo $unique_form_id?>" enctype="multipart/form-data">
    
    <?php
    if(isset($layout_params['title'])){
      echo '<input type="hidden" name="title" value="'.$layout_params['title'].'">';
    }

    for ($i = 0, $nnn = count($fields_list); $i < $nnn; $i++) {
      
      $html = '';
      $value = '';
      $field = $fields_list[$i];
      $field_styling = get_field_styles($field, $layout);
      $params_field = isset($field_from_params['Params_'.$field->db_field_name]) ? $field_from_params['Params_'.$field->db_field_name] : '';
        $params_field = json_decode($params_field);
        
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
      $custom_class = get_field_custom_class($field, $layout);
      $offset_animation = get_field_offset_animation($field, $layout);
      $layout_params['field_styling'] = $field_styling;
      $layout_params['custom_class'] = $custom_class;

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
      //end render custom code
    
      //delete inappropriate short cods
      if(strpos($layout_html,"{|f-cck_mail|}")){
        $layout_html = str_replace("{|f-cck_mail|}",'', $layout_html);
      }
      //delete inappropriate short cods

      if(strpos($layout_html,"{|f-".$field->fid."|}")){
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
           $php_result = true;
           
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
           }
           
          if($php_result){

            //publish\unpublish check
            if((!isset($field_from_params[$field->db_field_name.'_published']) 
                || $field_from_params[$field->db_field_name.'_published'] != 'on')){
              $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
              continue;
            }
            //publish\unpublish check

            //check access
            if(isset($field_from_params['access_'.$field->db_field_name])
                && $field_from_params['access_'.$field->db_field_name] != '1'){
              $user = JFactory::getUser();
              if(!checkAccess_cck($field_from_params['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields')){
                $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
                continue;
              }
            }
            //check access

            //regular expression
            if(isset($field_from_params[$field->db_field_name.'_check_expression'])){
              ?>
              <script>
                checkExpr[checkExpr.length] = ["<?php echo $field->db_field_name;?>",
                                               encodeURI(<?php echo $field_from_params[$field->db_field_name.'_check_expression']?>),
                                               "<?php echo $field_from_params[$field->db_field_name.'_error_text'];?>"];
              </script>
              <?php
            }
            //regular expression
//            if(isset($layout_params['field_styling'])){
//                $html .= '<div ' . $layout_params['field_styling'] . '>';
//            }
            
            //add prefix_
            if(isset($field_from_params[$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($field_from_params[$field->db_field_name.'_add_icon_prefix_prefix'])){
                $html .= '<span class="fa '.$field_from_params[$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
            }
            if(!empty($field_from_params[$field->db_field_name.'_prefix'])){
              $html .= '<span ' . $layout_params['field_styling'] . 'class="'.$field->db_field_name.'_prefix'.'">'.$field_from_params[$field->db_field_name.'_prefix'].'</span>';
            }
            if(isset($field_from_params[$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($field_from_params[$field->db_field_name.'_add_icon_prefix_suffix'])){
                $html .= '<span class="fa '.$field_from_params[$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
            }
            //add prefix_

            $data = (isset($value[0]->data)) ? $value[0]->data : '';
            $hidden = '';

            if($field->field_type == 'decimal_textfield'
                && ($layout_type == 'rent_request_instance' 
                || $layout_type == 'buy_request_instance')){
              $entityInstance = new os_cckEntityInstance($db);
              $entityInstance->load(intval($layout->parent_eiid));
              $value = $entityInstance->getFieldValue($field);
              $instance_price = (isset($value[0]->data)) ? $value[0]->data : '';
              $hidden = '<input type="hidden" name="fi_' . $field->db_field_name. '" value="' . $instance_price . '"   /> ';
              if(strpos($layout_html,"{|f-".$field->fid."|}"))
                $html.= $instance_price;
            }else{
              $fromSearch = 0;
              $field_from_params['ceid'] = $layout->fk_eid;
              $field_from_params['eiid'] = $layout->parent_eiid;
              $field_from_params['lay_type'] = $layout_type;
              $field_from_params['form_id'] =  $unique_form_id;
              $field_from_params['field_styling'] = $field_styling;

              $field_from_params['custom_class'] = $custom_class;
                //attach field

                ob_start();

                require getSiteAddFiledViewPath('com_os_cck', $field->field_type);

                $html .= ob_get_contents();
                ob_end_clean();
                //attach field
            }

          //add _suffix  
          if(isset($field_from_params[$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($field_from_params[$field->db_field_name.'_add_icon_suffix_prefix'])){
              $html .= '<span class="fa '.$field_from_params[$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
          }
          if(!empty($field_from_params[$field->db_field_name.'_suffix'])){
            $html.= '<span ' . $layout_params['field_styling'] . 'class="'.$field->db_field_name.'_suffix'.'">'.$field_from_params[$field->db_field_name.'_suffix'].'</span>';
          }
          if(isset($field_from_params[$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($field_from_params[$field->db_field_name.'_add_icon_suffix_suffix'])){
              $html .= '<span class="fa '.$field_from_params[$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
          }
          //add _suffix
//          if(isset($layout_params['field_styling'])){
//                $html .= '</div>';
//          }
          }
      //add field to layout / replace shortcode
      $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
      
      }
    }
   
    if(isset($layout_params['attachedModule'])){
      foreach ($layout_params['attachedModule'] as $attachedModule) {
        if($attachedModule && is_object($attachedModule)){
          if(strpos($layout_html,"{|m-".$attachedModule->id."|}")){
            $field->field_name = 'm_'.$attachedModule->id;
            $field_styling = get_field_styles($field, $layout);
            $custom_class = isset($layout_params['fields'][$field->field_name.'_custom_class'])?$layout_params['fields'][$field->field_name.'_custom_class']:'';
            $offset_animation = get_field_offset_animation($field, $layout);
            $module = JModuleHelper::getModule($attachedModule->type,$attachedModule->title);
            $options  = array('style' => 'xhtml');
            $html = '<div class="'.$custom_class.'" ' . $offset_animation . ' ' .$field_styling.'>'.JModuleHelper::renderModule($module,$options).'</div>';
            $layout_html = str_replace("{|m-".$attachedModule->id."|}", $html, $layout_html);
          }
        }
      }
    }
    
    if(is_array($child_entities) && count($child_entities) > 0){
      
      foreach($child_entities as $child_entity){
          
          $child_enteties_html = '';
          if(strpos($layout_html,"{|".$child_entity->data_field_name."|}")){
              $php_if = isset($layout_params['fields'][$child_entity->data_field_name.'_php_show']) ? $layout_params['fields'][$child_entity->data_field_name.'_php_show'] : '';
               $php_result = true;

               if($php_if != ''){
                    $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
               }
               if(!$php_result){
                   $layout_html = str_replace("{|".$child_entity->data_field_name."|}", '', $layout_html);
                    continue;
               }
              
              //publish\unpublish check
              if((!isset($field_from_params[$child_entity->data_field_name.'_published']) 
                  || $field_from_params[$child_entity->data_field_name.'_published'] != 'on')){
                $layout_html = str_replace("{|".$child_entity->data_field_name."|}", '', $layout_html);
                continue;
              }
              //publish\unpublish check

              //check access
                if(isset($field_from_params['access_'.$child_entity->data_field_name])
                    && $field_from_params['access_'.$child_entity->data_field_name] != '1'){
                  $user = JFactory::getUser();
                  if(!checkAccess_cck($field_from_params['access_'.$child_entity->data_field_name], $user->groups, $child_entity->childEntityId, 'fields')){
                    $layout_html = str_replace("{|".$child_entity->data_field_name."|}", $child_enteties_html, $layout_html);
                    continue;
                  }
                }
              //check access
                
                if(!empty($field_from_params[$child_entity->data_field_name.'_prefix'])){
                    $child_enteties_html .= '<span class="'.$child_entity->data_field_name.'_prefix'.'">'.$field_from_params[$child_entity->data_field_name . '_prefix'].'</span>';
                  }
              ob_start();
                require getSiteAddFiledViewPath('com_os_cck', 'child_select');
              $child_enteties_html .= ob_get_contents();
              ob_end_clean();

              //add _suffix  
              if(!empty($field_from_params[$child_entity->data_field_name.'_suffix'])){
                $child_enteties_html.= '<span class="'.$child_entity->data_field_name.'_suffix'.'">'.$field_from_params[$child_entity->data_field_name.'_suffix'].'</span>';
              }
              
              $layout_html = str_replace("{|".$child_entity->data_field_name."|}", $child_enteties_html, $layout_html);
              //var_dump($child_entity);
          }
          
      }
  }

    //send button
    $field->db_field_name = 'cck_send_button';
       $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
       $php_result = true;

       if($php_if != ''){
            $php_result = processing_php_show($php_if, $entityInstance, $layout_params, $layout_html, $layout);
       }

      if($php_result){
        $field_styling = get_field_styles($field, $layout);
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        $div_styling = get_align_styles($field, $layout);

        ob_start();
        echo '<div '.$div_styling.'>';
          $form_styling = get_field_styles($field, $layout);
          $form_custom_class = get_field_custom_class($field, $layout);
          $buttonText = isset($layout_params["views"]["layout_button_text"]) && !empty($layout_params["views"]["layout_button_text"]) ? $layout_params["views"]["layout_button_text"] : JText::_('COM_OS_CCK_BUTTON_FORM_SAVE');
        ?>
          <input <?php echo $form_styling; ?> type="button" name="save_button" value="<?php echo $buttonText; ?>" class="button <?php echo $custom_class; ?>" <?php echo $offset_animation; ?> onclick="javascript:sendRequest<?php echo $layout->type?>('save_instance', <?php echo $unique_form_id?>);">
        <?php
        echo '</div>';
        //add field to layout / replace shortcode (button)
          $layout_html = str_replace("{|f-cck_send_button|}", ob_get_contents(), $layout_html);
        ob_end_clean();
        //send button
      }else{
          $layout_html = str_replace("{|f-cck_send_button|}", '', $layout_html);
      }
    //render layout
    echo $layout_html; 

    ?>

    <div class="message-here"></div>
    <input type="hidden" id ="calculated_price" name="calculated_price" value="">
    <input type="hidden" id ="rent_from" name="rent_from" value="">
    <input type="hidden" id ="rent_until" name="rent_until" value="">
    <input type="hidden" name="option" value="com_os_cck"/>
    <input type="hidden" name="lay_type" value="<?php echo $layout->lid?>"/>
    <input id="task" type="hidden" name="task" value="save_instance"/>
    <input type="hidden" name="Itemid" value="<?php echo JRequest::getVar('Itemid')?>"/>
    <input type="hidden" name="moduleId" value="<?php echo $moduleId ?>"/>
    <input type="hidden" name="catid" value="<?php echo JRequest::getVar('catid',''); ?>"/>
    <input type="hidden" name="fk_eiid" value="<?php echo (isset($layout->parent_eiid) && !empty($layout->parent_eiid))? $layout->parent_eiid : '' ?>"/>
    <input type="hidden" name="lid" value="<?php echo (JRequest::getVar('lid',''))?JRequest::getVar('lid'):$layout->lid ; ?>"/>
    
  </form>

  <?php if($show_type == 2) echo "</div>";?>

   <script>
    loadAddLayout();
    var send_request = null;
    var send_buy_request = null;
    var review_captcha_request = null;
    var check_captcha_request_<?php echo $layout->type?> = null;
    (function ($) {
      check_captcha_request_<?php echo $layout->type?> = function (moduleId,form,type) {
        var status = "";
        if(moduleId){
          form=form+'_'+moduleId;
        }
        $.post("index.php?option=com_os_cck&captcha_type="+type+"&task=checkCaptcha&format=raw", $(form.keyguest).serialize(),
        function (data) {
          if (data.status == '<?php echo JText::_("COM_OS_CCK_SUCCESS"); ?>') {
            form.submit();
          }else{
            reload_captcha_<?php echo $layout->type?>(moduleId,type);
            jQuerOs("[name='keyguest']").val('');
            alert("<?php echo JText::_("COM_OS_CCK_INFOTEXT_JS_WRONG_CAPTCHA");?>");
          }
        } , 'json' );
      }
    })(jQuerOs);

  //*****************   begin add for show/hiden button "Add review" ********************
    

    function sendRequest<?php echo $layout->type?> (task,form_name){
    
      var form = form_name; 
      checkUploadedFiles(form, <?php echo return_bytes(ini_get('post_max_size')) ?>, <?php echo return_bytes(ini_get('upload_max_filesize')) ?>, <?php echo ini_get('file_uploads') ?>,
        "<?php echo JText::_('COM_OS_CCK_SETTINGS_VIDEO_ERROR_UPLOAD_OFF'); ?>", "<?php echo JText::_('COM_OS_CCK_SETTINGS_VIDEO_ERROR_POST_MAX_SIZE'); ?>", "<?php echo JText::_('COM_OS_CCK_SETTINGS_VIDEO_ERROR_UPLOAD_MAX_SIZE'); ?>",
        "<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_TRACK_KIND'); ?>", "<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_TRACK_LANGUAGE'); ?>", "<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_TRACK_TITLE'); ?>")
      var required_fields = form.getElementsByClassName("required");
      
        ret = false;

        checkRequireFields(required_fields);
        
        checkStepNumberFields();

        if(ret){
          return;
        }

        check_reg_expr();

        type = 'add_instance';
        

        if(form.querySelector('div[id^="captcha-block"]')){
          check_captcha_request_<?php echo $layout->type?>(0,form,type);
        }else{
          form.submit();
        }
    }
    jQuerOs(".delete-field, .delete-row").remove();
    //jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row").remove();
    //jQuerOs("span.cck-help-string").remove();
    jQuerOs(function () {
      jQuerOs('[data-toggle="tooltip"]').tooltip();
      jQuerOs(['id^=cck_col']).removeClass('resizable');
      jQuerOs('.ui-resizable-handle').remove();
    })

  </script>
</div>
