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

$document = JFactory::getDocument();


if(isset($params) && $params->get('show_type','')){
  $show_type = $params->get('show_type');
}elseif(isset($layout_params['show_type'])){
  $show_type = $layout_params['show_type'];
}else{
  $show_type = 1;
}

$layout_type = $layout->type;
?>
<div class="cck-body">
  <script type="text/javascript">
    function button_hidden(is_hide,moduleId) {
      var moduleSuffix = '';
      if (moduleId){
        moduleSuffix = '_cckmod_'+moduleId;
      }
      if (moduleId) {
        var el = document.getElementById('button_hidden_review'+moduleSuffix);
        var el2 = document.getElementById('hidden_review'+moduleSuffix);
      }else{
        var el = document.getElementById('button_hidden_review');
        var el2 = document.getElementById('hidden_review');
      }
      if (is_hide) {
        el.style.display = 'none';
        el2.style.display = 'block';
      } else {
        el.style.display = 'block';
        el2.style.display = 'none';
      }
    }
  </script>
  <?php

  //for attach module
  JPluginHelper::importPlugin('content');
  $dispatcher = JDispatcher::getInstance();
  //for attach module

  if($show_type == 2){ ?>
  <div <?php echo $button_style['div_styling']; ?>>
    <input <?php echo $button_style['field_styling'];?> type="button" class="button btn btn-info <?php echo $button_style['custom_class'];?>" <?php echo $button_style['offset_animation']; ?> value="<?php echo ($layout_params['button_name'])?$layout_params['button_name'] : JText::_('COM_OS_CCK_BUTTON_SHOW_REVIEW'); ?>"
          onclick="jQuerOs('#review_wrapper_<?php echo $layout_type?><?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>').stop().fadeToggle();"/>
  </div>
    <div class="review_wrapper_" id="review_wrapper_<?php echo $layout_type?><?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" style="display: none;">
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
  $layout_html = urldecode($layout->layout_html);
  $layout_html = cut_params($layout_html);
  $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
  $fields_list = $layout->field_list;

  //add child selects to layout
  $addChildSelectToLayout = addChildSelectToLayout($fields_list, $entityInstance, $layout_params, $layout_html, $layout);
  $layout_html = $addChildSelectToLayout['layout_html'];
  $layout_params = $addChildSelectToLayout['layout_params'];
  $parent = $addChildSelectToLayout['select_parent'];
  $layout->params = serialize($layout_params);
  //add child selects to layout

  ?>

  <div class="<?php echo $form_custom_class; ?> review_block" <?php echo $form_offset_animation; ?> <?php echo $form_hover_animation; ?> <?php echo $form_styling; ?> >
    <?php

    for ($i = 0, $nnn = count($layout->field_list); $i < $nnn; $i++) {

      $html = '';
      $field = $layout->field_list[$i];
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
                  //replace mask like {|decimal_textfield_31|}
                $func_result = replaceMaskCustomCodePHP($entityInstance,$plug_row->text, $layout_params, $layout_html, $layout);
                  //get custom field content
                $custom_field['custom_code_field_'.$cust_key.'_custom_code'] = $func_result['custom_code_str'];
                  //get variables for custom code
                extract($func_result['variables_arr']);
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
            $value = $entityInstance->getFieldValue($field);

            if($field->field_type == 'rating_field' 
              && isset($layout_params['fields'][$field->db_field_name.'_average'])
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

            if(empty($value) || !$field->published){
              $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
              continue;
            }


            if(isset($layout_params['fields']['access_'.$field->db_field_name])
                && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
              $user = JFactory::getUser();
              if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $field->fk_eid, 'fields')){
                $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
                continue;
              }
            }

            if(isset($layout_params['fields'][$field->db_field_name]['options'])){
              $field->options = $layout_params['fields'][$field->db_field_name]['options'];
            }

            $image_css = ($field->field_type=='imagefield' && isset($field->options['width'])
                          && isset($field->options['height']))?
                          'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':
                          '';
            $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
            $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';
            $field_styling = substr_replace($field_styling, ' display:block;'.$image_css.'"', strlen($field_styling)-1, strlen($field_styling));
            $a_styling = $field_styling;

            if(isset($layout_params['views']['link_field'])) $field_styling = '';

                $html .='<'.$shell_tag.$width_heigth.' '.$field_styling.' class="col_box '.$custom_class. $field->db_field_name .'" ' . $offset_animation . '>';
                if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'])){
                    $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
                }
                if(!empty($layout_params['fields'][$field->db_field_name.'_prefix'])){
                  $html .= $layout_params['fields'][$field->db_field_name.'_prefix'].' ';
                }
                if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'])){
                    $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
                }

                if(isset($layout_params['views']['link_field'])
                    && (array_search ( $field->fid , $layout_params['views']['link_field']) > 0
                    || array_search ( $field->fid , $layout_params['views']['link_field']) === 0)){
                  $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
                  $cat_id = (isset($category->cid))?'&amp;catid='.$category->cid : '&amp;catid=0';
                  $link = 'index.php?option=com_os_cck&amp;view=instance&amp;id='
                  . $entityInstance->eiid .'&amp;lid='.$layout_params['views']['instance_layout']
                  . $cat_id . '&amp;Itemid=' . $Itemid . $modId;
                  $html .= "<a ".$a_styling." href='".JRoute::_($link)."'>".os_cck_site_controller::prepere_field_for_show($field, $value[0],$layout, $layout_params). "</a>";
                }else{
                  $layout_params['instance_currency'] = $entityInstance->instance_currency;
                  ob_start();
                    require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                    $html .= ob_get_contents();
                  ob_end_clean();
                }
                if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'])){
                  $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
                }
                if(!empty($layout_params['fields'][$field->db_field_name.'_suffix'])){
                  $html.= ' '.$layout_params['fields'][$field->db_field_name.'_suffix'];
                }
                if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'])){
                  $html .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
                }
                  $html .='</'.$shell_tag.'>';
          }
      }
      $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
      $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);

    }


    if(isset($layout_params['attachedModule'])){
      foreach ($layout_params['attachedModule'] as $attachedModule) {
        if($attachedModule){
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

    echo $layout_html; 

    ?>

    <script type="text/javascript">
      //jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row, .delete-layout").remove();
      jQuerOs(".delete-field, .delete-row, .delete-layout").remove();
    </script>

  </div>

    <?php if($show_type == 2) echo "</div>"; ?>
    
  <script>
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
