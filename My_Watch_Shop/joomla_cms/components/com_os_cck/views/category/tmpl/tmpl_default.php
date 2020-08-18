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


?>
<div class="cck-body" cid="<?php echo $category->cid; ?>" eid="<?php echo $category->fk_eid; ?>">

    <script type="text/javascript">
    if(typeof(bitches) === 'undefined'){
        var bitches = new Array();
    }
      function order_field_submitbutton(moduleId){ 
        if (moduleId) {
          var form = document.getElementById('orderForm_cckmod_'+moduleId);
        }else{
          var form = document.orderForm;
        }
        form.submit();
      }

    function allreordering(moduleId){ 
        
       if (moduleId) { 
          if(document.getElementById('order_direction_cckmod_'+moduleId).value == 'ASC'){
            document.getElementById('order_direction_cckmod_'+moduleId).value = 'DESC';
          }else{
            document.getElementById('order_direction_cckmod_'+moduleId).value = 'ASC';
          }
          var form = document.getElementById('orderForm_cckmod_'+moduleId);
       }else{ 
          if(document.orderForm.order_direction.value == 'ASC'){ 
            document.orderForm.order_direction.value = 'DESC';
          }else{ 
            document.orderForm.order_direction.value = 'ASC';
          }
          var form = document.orderForm;
       }

      form.submit();
    }
    </script>
  <?php
  $os_cck_rand = rand();
      if(isset($layout_params['views']['show_layout_title']) && $layout_params['views']['show_layout_title'])
    {   
          echo "<h3>";
            echo $layout_params['views']['layout_title'];
          echo "</h3>";
    }
    $layout_fields = $layout_params['fields'];
    $fields = array();
    $show_fields = array();
    ?>
  <div>
  <?php 
    //for ($i = 0;$i < count($instancies);$i++) {
        //$entity_type_url = ($entity_type) ? '&entity_type=' . $entity_type : '';
        //$modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
        //$instance = $instancies[$i];
        //$link = 'index.php?option=com_os_cck&amp;view=instance&amp;id=' . $instance->eiid . '&amp;catid=' . $catid . '&amp;Itemid=' . $Itemid . $entity_type_url.$modId;
      $field = new stdClass();
      $field->db_field_name = 'form-'.$layout->lid;
      $form_styling = get_field_styles($field, $layout);
      $form_custom_class = get_field_custom_class($field, $layout);
      $form_offset_animation = get_field_offset_animation($field, $layout);
      $form_hover_animation = get_field_hover_animation($field, $layout);
      ?>
      <div class="<?php echo $form_custom_class; ?> cat_fields" <?php echo $form_offset_animation; ?> <?php echo $form_hover_animation; ?> <?php echo $form_styling; ?> >
      <?php
      $layout_html = urldecode($layout->layout_html);
      $layout_html = cut_params($layout_html);
      $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
      
      if(isset($layout_params['views']['show_request_layout'])){
        foreach ($layout_params['views']['show_request_layout'] as $key => $value) {
            
           $php_if = isset($layout_params['views']['request_layout_php_show'][$key][0]) ? $layout_params['views']['request_layout_php_show'][$key][0] : '';

           $php_result = true;
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
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
                  
                $field->db_field_name = $key;
                if(isset($layout_params['views']['show_request_layout'][$key])
                    && $layout_params['views']['show_request_layout'][$key] != '1'){
                  $user = JFactory::getUser();
                  if(!checkAccess_cck($layout_params['views']['show_request_layout'][$key], $user->groups, $layout->fk_eid, 'fields')){
                    $layout_html = str_replace("{|l-".$key."|}", '', $layout_html);
                    continue;
                  }else{
                    $layout_html = str_replace($key.'-label-hidden', '', $layout_html);
                  }
                }
                
                if(isset($layout_params['views']['show_request_layout_name'][$key]) &&
                    isset($layout_params['views']['show_request_layout_name'][$key][0]) &&
                    $layout_params['views']['show_request_layout_name'][$key][0] == 'on'){
                  $layout_html = str_replace($key.'-label-hidden', '', $layout_html);
                }
                
                $field_styling = get_field_styles($field, $layout);
                $custom_class = get_field_custom_class($field, $layout);
                $offset_animation = get_field_offset_animation($field, $layout);
                //get tag
                $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
                //end
                //if below fn works , that this is add_instance view

                if(isset($layout_params["views"]["instance_grid"]) && $layout_params["views"]["instance_grid"] == 1){ ?>

                <script>

                   jQuerOs(document).ready(function(){

                    jQuerOs(".instance_body").parent().addClass('flex-block');

                   });

                </script>

                <?php  }


                $cck_wrapper_instance = (isset($layout_params["views"]["instance_grid"]) && $layout_params["views"]["instance_grid"] == 1)?"cck-wrapper-instance":"";

                $resolutions = ($cck_wrapper_instance != "" && isset($layout_params["views"]["auto_custom"]) && $layout_params["views"]["auto_custom"] == "custom")?"instance-col-lg-".$layout_params["views"]["resolition_one"]." "."instance-col-md-".$layout_params["views"]["resolition_two"]." "."instance-col-sm-".$layout_params["views"]["resolition_three"]." "."instance-col-xs-".$layout_params["views"]["resolition_four"]." ":'';

                if($cck_wrapper_instance != "" &&  $resolutions == ""){

                  $count_inst_columns = (isset($layout_params["views"]["count_inst_columns"]))?$layout_params["views"]["count_inst_columns"]:"";
                  $min_width = (isset($layout_params["views"]["lay_min_width"]))?$layout_params["views"]["lay_min_width"]:"";
                  $space_between = (isset($layout_params["views"]["space_between"]))?$layout_params["views"]["space_between"]:"";

                  ?>
                    <script type="text/javascript">

                    jQuerOs( document ).ready(function() {

                        var cckGridLayout1 = function (container, params) {

                            if (!(this instanceof cckGridLayout1)) return new cckGridLayout1(container, params);

                            var defaults = {
                                minImgEnable : 1,
                                spaceBetween: 0,
                                minImgSize: 200,
                                numColumns: 4,
                            };

                            for (var param in defaults) {
                                if (!params[param]){
                                params[param] = defaults[param];
                                }
                            }
                            // gallery settings
                            var cckGrid = this;
                            // Params
                            cckGrid.params = params || defaults;

                                cckGrid.getImgBlockWidth = function (numColumns){
                                    if(typeof(numColumns) == 'undefined')numColumns = cckGrid.params.numColumns;
                                    spaceBetween = cckGrid.params.spaceBetween;
                                    mainBlockW = jQuerOs(container).width();
                                    imgBlockW = ((((mainBlockW-(spaceBetween*numColumns))/numColumns)-1)*100)/mainBlockW;

                                    if(cckGrid.params.minImgEnable){

                                        if(((imgBlockW*mainBlockW)/100) < cckGrid.params.minImgSize){
                                        numColumns--;
                                        cckGrid.getImgBlockWidth(numColumns);
                                        }
                                    }

                                    return imgBlockW;
                                }

                            //initialize function
                                cckGrid.init = function (){
                                imgBlockW = cckGrid.getImgBlockWidth();

                            // jQuerOs(container+" .item").css("width",imgBlockW+"%");


                                jQuerOs(container+">.instance_body").css({
                                'width': imgBlockW+"%",
                                'margin':  cckGrid.params.spaceBetween / 2 
                                });

                                cckGrid.resizeGallery = function (){
                                    imgBlockW = cckGrid.getImgBlockWidth();
                                    jQuerOs(container+">.instance_body").css("width",imgBlockW+"%");
                                }

                                jQuerOs(window).resize(function(event) {
                                cckGrid.resizeGallery();
                                });
                            }

                            cckGrid.init();
                        }


                    window.cckGridLayout1 = cckGridLayout1;

                     });


                    jQuerOs(document).ready(function() {

                        var gallery = new cckGridLayout1(".<?php echo $cck_wrapper_instance; ?>",{
                            minImgEnable : 1,
                            spaceBetween: <?php echo $space_between; ?>,
                            minImgSize: <?php echo $min_width; ?>,
                            numColumns: <?php echo $count_inst_columns; ?>,
                        });



                      });

                    </script>
                  <?php

                }

                ob_start();

                echo '<'.$shell_tag.' class="'.$cck_wrapper_instance.' '.$resolutions.' '.$custom_class.'" ' . $offset_animation . ' ' .$field_styling.'>';

                Category::show_attached_layout($option, $key, $layout->fk_eid, $layout_params, $show_type,$button_name , $catid, $instancies, $button_style);
                
                echo '</'.$shell_tag.'>';
                $layout_html = str_replace("{|l-".$key."|}", ob_get_contents(), $layout_html);
                ob_end_clean();
              }
          }else{
                $layout_html = str_replace("{|l-".$key."|}", '', $layout_html);
          }
        }
      }
      
      $field = new stdClass();
      if(strpos($layout_html,"{|f-joom_instance_count|}")){
          $field->db_field_name = 'joom_instance_count';
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
          $php_result = true;
          if($php_if != ''){
               $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
          }

          if(!$php_result){
              $layout_html = str_replace("{|f-joom_instance_count|}", '', $layout_html);
          }
      }
      //check access
      if(isset($layout_params['fields']['access_joom_instance_count'])
          && $layout_params['fields']['access_joom_instance_count'] != '1'){
        $user = JFactory::getUser();
        if(!checkAccess_cck($layout_params['fields']['access_joom_instance_count'], $user->groups, $layout->fk_eid, 'fields')){
          $layout_html = str_replace("{|f-joom_instance_count|}", '', $layout_html);
        }
      }

      //category_instance_count
      if(strpos($layout_html,"{|f-joom_instance_count|}")){
        if(isset($currentcat->title)){
            
          $field->db_field_name = 'joom_instance_count';
          $field_styling = get_field_styles($field, $layout);
          $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
          $hover_styling = get_hover_css_style($field, $layout_params);
          echo $hover_styling;
          $custom_class = get_field_custom_class($field, $layout);
          $offset_animation = get_field_offset_animation($field, $layout);
          $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
          
          if(isset($layout_params['fields'][$field->db_field_name.'_tooltip']) && isset($layout_params['fields']['description_'.$field->db_field_name]) && $layout_params['fields']['description_'.$field->db_field_name]=='on'){
            $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title="'.$layout_params['fields'][$field->db_field_name.'_tooltip'].'"';           
          }else{
            $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title=""';
          }

          $prefix = '';
          if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'])){
            $prefix .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_prefix'].'"></span>';
          }
          if(isset($layout_params['fields'][$field->db_field_name.'_prefix'])){
            $prefix .= '<span class="cck-prefix">'.$layout_params['fields'][$field->db_field_name.'_prefix'].'</span>';
          }
          if(isset($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'])){
            $prefix .= '<span class="fa '.$layout_params['fields'][$field->db_field_name.'_add_icon_prefix_suffix'].'"></span>';
          }

          $suffix = '';
          if(isset($field_from_params[$field->db_field_name.'_add_icon_suffix_prefix']) && !empty($field_from_params[$field->db_field_name.'_add_icon_suffix_prefix'])){
              $suffix .= '<span class="fa '.$field_from_params[$field->db_field_name.'_add_icon_suffix_prefix'].'"></span>';
          }
          if(isset($layout_params['fields'][$field->db_field_name.'_suffix'])){
              $suffix .= '<span class="cck-suffix">'.$layout_params['fields'][$field->db_field_name.'_suffix'].'</span>';
          }
          if(isset($field_from_params[$field->db_field_name.'_add_icon_suffix_suffix']) && !empty($field_from_params[$field->db_field_name.'_add_icon_suffix_suffix'])){
              $suffix .= '<span class="fa '.$field_from_params[$field->db_field_name.'_add_icon_suffix_suffix'].'"></span>';
          }
          
          if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
            $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
            $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                        .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                    .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
            
            $cat_title = '<a '.$tooltip.' class="'.$custom_class. ' '. $field->db_field_name . '" ' . $offset_animation . ' ' .$field_styling.' href="'.JRoute::_($link).'">'.$prefix.$currentcat->inst_count.$suffix.'</a>';
            $layout_html = str_replace("{|f-joom_instance_count|}", $cat_title, $layout_html);
          }else{
            $cat_title = '<'.$shell_tag.' '.$tooltip.' class="'.$custom_class. ' ' . $field->db_field_name . '" '. $offset_animation . ' '.$field_styling.'>'.$prefix.$currentcat->inst_count.$suffix.'</'.$shell_tag.'>';
            $layout_html = str_replace("{|f-joom_instance_count|}", $cat_title, $layout_html);
          }
        }else{
          $layout_html = str_replace("{|f-joom_instance_count|}", '', $layout_html);
        }
      }











      if(strpos($layout_html,"{|f-category_title|}")){
          $field->db_field_name = 'category_title';
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
          $php_result = true;
          if($php_if != ''){
               $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
          }

          if(!$php_result){
              $layout_html = str_replace("{|f-category_title|}", '', $layout_html);
          }
      }
      //check access
      if(isset($layout_params['fields']['access_category_title'])
          && $layout_params['fields']['access_category_title'] != '1'){
        $user = JFactory::getUser();
        if(!checkAccess_cck($layout_params['fields']['access_category_title'], $user->groups, $layout->fk_eid, 'fields')){
          $layout_html = str_replace("{|f-category_title|}", '', $layout_html);
        }
      }
      //category_title
      if(strpos($layout_html,"{|f-category_title|}")){
        if(isset($currentcat->title)){
          $field->db_field_name = 'category_title';
          $field_styling = get_field_styles($field, $layout);
          $custom_class = get_field_custom_class($field, $layout);
          $offset_animation = get_field_offset_animation($field, $layout);
          $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
          $hover_styling = get_hover_css_style($field, $layout_params);
          echo $hover_styling;
          $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
          
          if(isset($layout_params['fields'][$field->db_field_name.'_tooltip']) && isset($layout_params['fields']['description_'.$field->db_field_name]) && $layout_params['fields']['description_'.$field->db_field_name]=='on'){
            $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title="'.$layout_params['fields'][$field->db_field_name.'_tooltip'].'"';           
          }else{
            $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title=""';
          }

          if(isset($layout_params['fields'][$field->db_field_name.'_prefix'])){
            $prefix = '<span class="cck-prefix">'.$layout_params['fields'][$field->db_field_name.'_prefix'].'</span>';
          }else{
            $prefix = '';
          }

          if(isset($layout_params['fields'][$field->db_field_name.'_suffix'])){
            $suffix = '<span class="cck-suffix">'.$layout_params['fields'][$field->db_field_name.'_suffix'].'</span>';
          }else{
            $suffix = '';
          }

          $max_lenght = (isset($layout_params['fields'][$field->db_field_name.'_max_lenght'])) ? $layout_params['fields'][$field->db_field_name.'_max_lenght'] : '250';

          if(strlen($currentcat->title) > $max_lenght){
              $currentcat->title = substr($currentcat->title, 0, $max_lenght)."...";
            } 
            //var_dump($layout_params['fields'][$field->db_field_name.'_category_layout']);
//          if((isset($layout_params['parent_layout_params']['views']['link_field'])
//                  && (array_search ( "cat_title" , $layout_params['parent_layout_params']['views']['link_field']) > 0
//                  || array_search ( "cat_title" , $layout_params['parent_layout_params']['views']['link_field']) === 0))
//                  || (isset($layout_params['parent_layout_params']['views']['subcat_link_field'])
//                  && (array_search ( "cat_title" , $layout_params['parent_layout_params']['views']['subcat_link_field']) > 0
//                  || array_search ( "cat_title" , $layout_params['parent_layout_params']['views']['subcat_link_field']) === 0))){
            if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
            $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
            $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                        .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                    .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
//            if(isset($layout_params['parent_layout_params']['views']['category_layout'])){
//                $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
//                        .'&amp;lid='.$layout_params['parent_layout_params']['views']['category_layout']
//                    .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
//            }elseif (isset($layout_params['parent_layout_params']['views']['subcategories_layout'])) {
//                $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
//                        .'&amp;lid='.$lid
//                    .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
//            }
            $cat_title = '<a '.$tooltip.' class="'.$custom_class.'" ' . $offset_animation . ' ' .$field_styling.' href="'.JRoute::_($link).'">'. $prefix. '<span>' . $currentcat->title . '</span>' .$suffix.'</a>';
            $layout_html = str_replace("{|f-category_title|}", $cat_title, $layout_html);
          }else{
            $cat_title = '<'.$shell_tag.' '.$tooltip.' class="'.$custom_class. ' '. $field->db_field_name . '" '. $offset_animation . ' ' .$field_styling.'>'.$prefix. '<span>' . $currentcat->title . '</span>' . $suffix.'</'.$shell_tag.'>';
            $layout_html = str_replace("{|f-category_title|}", $cat_title, $layout_html);
          }
        }else{
          $layout_html = str_replace("{|f-category_title|}", '', $layout_html);
        }
      }

      if(strpos($layout_html,"{|f-category_description|}")){
          $field->db_field_name = 'category_description';
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
          $php_result = true;
          if($php_if != ''){
               $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
          }

          if(!$php_result){
              $layout_html = str_replace("{|f-category_description|}", '', $layout_html);
          }
      }
      //check access
      if(isset($layout_params['fields']['access_category_description'])
          && $layout_params['fields']['access_category_description'] != '1'){
        $user = JFactory::getUser();
        if(!checkAccess_cck($layout_params['fields']['access_category_description'], $user->groups, $layout->fk_eid, 'fields')){
          $layout_html = str_replace("{|f-category_description|}", '', $layout_html);
        }
      }
      //category_description
      if(strpos($layout_html,"{|f-category_description|}")){
        if(isset($currentcat->descrip)){
          $field->db_field_name = 'category_description';
          $field_styling = get_field_styles($field, $layout);
          $custom_class = get_field_custom_class($field, $layout);
          $offset_animation = get_field_offset_animation($field, $layout);
          $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
          $hover_styling = get_hover_css_style($field, $layout_params);
          echo $hover_styling;
        
          //get tag
          $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
          //end
          if(isset($layout_params['fields'][$field->db_field_name.'_tooltip']) && isset($layout_params['fields']['description_'.$field->db_field_name]) && $layout_params['fields']['description_'.$field->db_field_name]=='on'){
            $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title="'.$layout_params['fields'][$field->db_field_name.'_tooltip'].'"';           
          }else{
            $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title=""';
          }

          if(isset($layout_params['fields'][$field->db_field_name.'_prefix'])){
            $prefix = '<span class="cck-prefix">'.$layout_params['fields'][$field->db_field_name.'_prefix'].'</span>';
          }else{
            $prefix = '';
          }

          if(isset($layout_params['fields'][$field->db_field_name.'_suffix'])){
            $suffix = '<span class="cck-suffix">'.$layout_params['fields'][$field->db_field_name.'_suffix'].'</span>';
          }else{
            $suffix = '';
          }

          $max_lenght = (isset($layout_params['fields'][$field->db_field_name.'_max_lenght'])) ? $layout_params['fields'][$field->db_field_name.'_max_lenght'] : '250';

           if(strlen($currentcat->descrip) > $max_lenght){
              $currentcat->descrip = substr($currentcat->descrip, 0, $max_lenght)."...";
            } 

          if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
            $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
//            $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
//                    .'&amp;lid='.$layout_params['parent_layout_params']['views']['category_layout']
//                .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
            $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                        .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                    .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
            $cat_description = '<a '.$tooltip.' class="'.$custom_class.'" '. $offset_animation . ' ' .$field_styling.' href="'.JRoute::_($link).'">'.$prefix.$currentcat->descrip.$suffix.'</a>';
            $layout_html = str_replace("{|f-category_description|}", $cat_description, $layout_html);
          }else{
            $cat_description = '<'.$shell_tag.' '.$tooltip.' class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' .$field_styling.'>'.$prefix.$currentcat->descrip.$suffix.'</'.$shell_tag.'>';
            $layout_html = str_replace("{|f-category_description|}", $cat_description, $layout_html);
          }
        }else{
          $layout_html = str_replace("{|f-category_description|}", '', $layout_html);
        }
      }

      if(strpos($layout_html,"{|f-category_image|}")){
          $field->db_field_name = 'category_image';
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
          $php_result = true;
          if($php_if != ''){
               $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
          }

          if(!$php_result){
              $layout_html = str_replace("{|f-category_image|}", '', $layout_html);
          }
      }
      //check access
      if(isset($layout_params['fields']['access_category_image'])
          && $layout_params['fields']['access_category_image'] != '1'){
        $user = JFactory::getUser();
        if(!checkAccess_cck($layout_params['fields']['access_category_image'], $user->groups, $layout->fk_eid, 'fields')){
          $layout_html = str_replace("{|f-category_image|}", '', $layout_html);
        }
      }
      //category_image
      if(strpos($layout_html,"{|f-category_image|}")){
        $html = '';
        $field->db_field_name = 'category_image';
        $field_styling = get_field_styles($field, $layout);
        $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
        $hover_styling = get_hover_css_style($field, $layout_params);
        echo $hover_styling;
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        if(isset($layout_params['fields'][$field->db_field_name.'_tooltip']) && isset($layout_params['fields']['description_'.$field->db_field_name]) && $layout_params['fields']['description_'.$field->db_field_name]=='on'){
          $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title="'.$layout_params['fields'][$field->db_field_name.'_tooltip'].'"';           
        }else{
          $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title=""';
        }

        if(isset($layout_params['fields'][$field->db_field_name.'_prefix'])){
          $prefix = '<span class="cck-prefix">'.$layout_params['fields'][$field->db_field_name.'_prefix'].'</span>';
        }else{
          $prefix = '';
        }

        if(isset($layout_params['fields'][$field->db_field_name.'_suffix'])){
          $suffix = '<span class="cck-suffix">'.$layout_params['fields'][$field->db_field_name.'_suffix'].'</span>';
        }else{
          $suffix = '';
        }

        if(empty($currentcat->img))
          $currentcat->img = JURI::base().'components/com_os_cck/images/folder.png';
        if(isset($currentcat->img) && !empty($currentcat->img)){
          $img_width = $layout_params['fields']['category_image']['width'];
          $img_height = $layout_params['fields']['category_image']['height'];
          $style = 'height="'.$img_height.'px" width="'.$img_width.'px"';
          if(isset($layout_params['fields'][$field->db_field_name.'_category_layout']) 
                    && $layout_params['fields'][$field->db_field_name.'_category_layout'] > -1){
            $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
            $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
                        .'&amp;lid='.$layout_params['fields'][$field->db_field_name.'_category_layout']
                    .'&amp;catid='. $layout_params['catid'] . '&amp;Itemid=' . $Itemid . $modId;
            $html .= '<a '.$tooltip.' href="'.JRoute::_($link).'"><div  class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>'. $prefix .
                        '<img ' . $style . 'src="'.$currentcat->img.'" alt="?"/>'.
                    $suffix . '</div></a>';
          }else{
            $html .= '<div '.$tooltip.' class="'.$custom_class. ' ' . $field->db_field_name .'" '. $offset_animation . ' ' . $field_styling.'>' . $prefix .
                        '<img '.$style.' src="'.$currentcat->img.'" alt="?"/>' .
                    $suffix . '</div>';
          }
        }
        $layout_html = str_replace("{|f-category_image|}", $html, $layout_html);
      }

      if(strpos($layout_html,"{|f-category_map|}")){
          $field->db_field_name = 'category_map';
          $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
          $php_result = true;
          if($php_if != ''){
               $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
          }

          if(!$php_result){
              $layout_html = str_replace("{|f-category_map|}", '', $layout_html);
          }
      }
      //check access
      if(isset($layout_params['fields']['access_category_map'])
          && $layout_params['fields']['access_category_map'] != '1'){
        $user = JFactory::getUser();
        if(!checkAccess_cck($layout_params['fields']['access_category_map'], $user->groups, $layout->fk_eid, 'fields')){
          $layout_html = str_replace("{|f-category_map|}", '', $layout_html);
        }
      }
      //category_map
      if(strpos($layout_html,"{|f-category_map|}")){ 
        // $key = 'key='.$os_cck_configuration->get("google_map_key",'');
        // if(checkJavaScriptIncludedCCK("maps.googleapis.com") === false ) {
        //     $doc->addScript('//maps.googleapis.com/maps/api/js?'.$key);
        // }
        $field->db_field_name = 'category_map';
          require getSiteUniqueFiledViewPath('com_os_cck', 'group_map');
        
      }



      //pagination
    if($mod_type == 0){
      if(strpos($layout_html,"{|f-joom_pagination|}")){
        $field->db_field_name = 'joom_pagination';
        $field_styling = get_field_styles_without_Style($field, $layout);
        
        $field_styling .= 'display:block;' ;
        $hover_styling = get_hover_css_style($field, $layout_params);
        echo $hover_styling;
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        $shell_tag = isset($layout_params['cat_layout_params']['fields']['field_tag_joom_pagination'])?$layout_params['cat_layout_params']['fields']['field_tag_joom_pagination']:'span';
        ob_start();
            if (!empty($pageNav) && ($pageNav->total > $pageNav->limit)) {
              ?>
              <script type="text/javascript">
                   jQuerOs(document).ready(function() {
                    jQuerOs('#pagination').attr('style','<?php echo $field_styling;?>');
                  });
              </script>
              <?php
              echo '<'.$shell_tag.' id="pagination" class="' . $custom_class . ' ' . $field->db_field_name . '" ' . $offset_animation . '>';
                echo $pageNav->getPagesLinks();
              echo '</'.$shell_tag.'>';

            }
        $layout_html = str_replace("{|f-joom_pagination|}", ob_get_contents(), $layout_html);
        ob_end_clean();
      }
    }
     else {
         $layout_html = str_replace("{|f-joom_pagination|}", '', $layout_html);
    }


      //alphabetical
    if($mod_type == 0){
      if(strpos($layout_html,"{|f-joom_alphabetical|}")){
        
        $field->db_field_name = 'joom_alphabetical';
        $field_styling = get_field_styles_without_Style($field, $layout);
        $field_styling .= 'display:block;' ;
        $hover_styling = get_hover_css_style($field, $layout_params);
        echo $hover_styling;
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        $shell_tag = isset($layout_params['all_instance_layout_params']['fields']['label_tag_joom_alphabetical'])?$layout_params['all_instance_layout_params']['fields']['label_tag_joom_alphabetical']:'span';

        ob_start();
        ?>
          <script type="text/javascript">
                     jQuerOs(document).ready(function() {
                      jQuerOs('#alphabetical').attr('style','<?php echo $field_styling;?>');
                    });
          </script>
        <?php
        if(isset($list_str)){
          echo '<'.$shell_tag.' id="alphabetical"  class="' . $custom_class . ' ' . $field->db_field_name . '" ' . $offset_animation . '>';
          
              foreach($list_str as $a){
                    echo $a;
              }
            
          echo '</'.$shell_tag.'>';
        }
        $layout_html = str_replace("{|f-joom_alphabetical|}", ob_get_contents(), $layout_html);
        ob_end_clean();
      }
    }
     else {
         $layout_html = str_replace("{|f-joom_alphabetical|}", '', $layout_html);
    }

      
    
      //start render order by
    if($mod_type == 0 && $task != 'all_categories' && !empty($instancies)){
      if(strpos($layout_html,"{|f-category_order_by|}")){
        $field->db_field_name = 'category_order_by';
        $field_styling = get_field_styles($field, $layout);
        $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
        $hover_styling = get_hover_css_style($field, $layout_params);
        echo $hover_styling;
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        //check access
        $order_by_params = $layout_params['cat_layout_params'];
        
        if(isset($order_by_params['fields']['access_category_order_by'])
            && $order_by_params['fields']['access_category_order_by'] != '1'){
          $user = JFactory::getUser();
          if(!checkAccess_cck($order_by_params['fields']['access_category_order_by'], $user->groups, $layout->fk_eid, 'fields')){
            $layout_html = str_replace("{|f-category_order_by|}", '', $layout_html);
          }
        }
        
        ob_start();
        if(isset($order_by_params['fields']['category_order_by_published']) 
          && $order_by_params['fields']['category_order_by_published'] == 'on'){
            
        if(count($instancies) > 0 && isset($order_by_params['views']['sortField'])
                            && !empty($order_by_params['views']['sortField'])
                            && count($order_by_params['views']['sortField']) > 1){
            $sort_arr['sortField'] = $order_by_params['views']['sortField'];
            if(isset($order_by_params['views']['sortType_category_order_by'])){
                $sort_arr['order_direction'] = $order_by_params['views']['sortType_category_order_by'];
            }elseif (isset($order_by_params['fields']['sortType_category_order_by'])) {
                    $sort_arr['order_direction'] = $order_by_params['fields']['sortType_category_order_by'];
            }
            //$sort_arr['order_direction'] = $order_by_params['views']['sortType_category_order_by'];
            
            $selected = (isset($order_by_params['views']['selected'])) ? $order_by_params['views']['selected'] : '' ;
            $session->set('order_direction', $sort_arr['order_direction']);
            $session->set('selected', $selected);
            
            ?>
          
            <div id="CckOrderBy <?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" class="orderTable <?php echo $custom_class;?> <?php echo $field->db_field_name; ?>" <?php echo $offset_animation; ?> <?php echo $field_styling; ?>>
                <form id="orderForm<?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" method="POST" action="<?php echo JRoute::_($_SERVER["REQUEST_URI"]); ?>" name="orderForm<?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>">
                    <input type="hidden" id="order_direction<?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" name="order_direction" value="<?php echo $sort_arr['order_direction']; ?>" >
                    <a title="Click to sort by this column." onclick="javascript:allreordering(<?php echo ($moduleId) ? $moduleId : 0 ;?>);return false;" href="#">
                        <img alt="" src="<?php echo JURI::root() ?>/components/com_os_cck/images/sort_<?php echo strtolower($sort_arr['order_direction']); ?>.png" />
                    </a>
                    <?php
                    echo JText::_("COM_OS_CCK_LABEL_ORDER_BY"); ?>
                    <select size="1" class="inputbox" onchange="order_field_submitbutton(<?php echo ($moduleId) ? $moduleId : 0 ;?>);" id="order_field" name="order_field">
                    <?php

                    foreach($sort_arr['sortField'] as $key){
                        
                      if(!isset($key['value'])){?>
                        <option  value="ceid" <?php if ($selected == 'ceid')echo 'selected="selected"'; ?> >Index</option>
                    <?php
                      }else{ ?>
                        <option  value="<?php echo $key['value'] ?>" <?php if ($selected == $key['value'])echo 'selected="selected"'; ?> >  <?php echo $key['text']; ?> </option>
                        <?php
                      }
                    } ?>
                    </select>
                </form>
            </div>
            <?php 
        }//else{
//          JFactory::getApplication()->enqueueMessage(JText::_('COM_OS_CCK_LAYOUT_ORDER_BY_FIELDS_TOOLTIP'), 'notice');
//        }
      }
        $layout_html = str_replace("{|f-category_order_by|}", ob_get_contents(), $layout_html);
        ob_end_clean();
      } 
    }
     else {
         $layout_html = str_replace("{|f-category_order_by|}", '', $layout_html);
    }
    //end render order by
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
              $html = '<div class="'.$custom_class.'" '. $offset_animation . ' ' .$field_styling.'>'.JModuleHelper::renderModule($module,$options).'</div>';
              $layout_html = str_replace("{|m-".$attachedModule->id."|}", $html, $layout_html);
            }
          }
        }
      }
      echo $layout_html;
      
    ?>
    <?php
        if (false && $layout_params['views']['cat_hits'] == 1) {
            ?>
        <div class="cat_hits">
            <div class="col_inline">
                <?php echo JText::_("COM_OS_CCK_LABEL_HITS"); ?>
            </div>z
            <div class="col_inline">
                <?php echo $instance->hits; ?>
            </div>
        </div>
            <?php
        }
    ?>
    </div>
    <div>
       <input class="inputbox" type="hidden" name="bid[]" size="0" maxlength="0"
           value="<?php if(isset($instance))echo $instance->eiid; ?>"/>
    </div>
  </div>
  <?php 
            
    //var_dump($layout_params['catid']);
  if ($is_exist_sub_categories) {
    if($layout_params['views']['sub_category_level'] > 0){
      if(!function_exists('showCategorySubCat')){
//        function showCategorySubCat($id, $cat_all, $params, $Itemid, $deep,$layout,$layout_params, $currentcat) {
//          global $moduleId;
//          $deep+=25;
//          for ($i = 0; $i < count($cat_all); $i++) {
//            if (($id == $cat_all[$i]->parent_id) && ($cat_all[$i]->display == 1)) {
//               // var_dump($cat_all);
//              if($layout_params['views']['sub_category_level'] < ($deep/25))break;
//              $layout_html = urldecode($layout->layout_html);
//              $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
//              if(strpos($layout_html,"{|f-category_image|}")){//category layout has image
//                $path = JURI::root() . '/images/stories/';
//                $cat_image = (isset($cat_all[$i]->image) && !empty($cat_all[$i]->image))?
//                              $path.$cat_all[$i]->image :
//                              JURI::root().'/components/com_os_cck/images/folder.png';
//                $img_width = '30';
//                $img_height = '30';
//                $style = 'style="height:'.$img_height.'px;width:'.$img_width.'px;margin-left:'.$deep.'px"';
//                $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
//                $lid = isset($layout_params['parent_layout_params']['views']['category_layout'])?
//                            $layout_params['parent_layout_params']['views']['category_layout'] :
//                            $layout->lid;
//                $link = 'index.php?option=com_os_cck&amp;view=category&amp;&amp;lid='.$lid
//                        .'&amp;catid='. $cat_all[$i]->cid . '&amp;Itemid=' . $Itemid . $modId;
//
//                
//                if(strpos($layout_html,"{|f-joom_instance_count|}")){
//                    $inst_count = getInstanceCountInCategory($cat_all[$i]->cid);
//                    echo '<div  class="cat_pic">
//                        <img  '.$style.' src="'. $cat_image.'" alt="?"/>
//                        <a href="'.JRoute::_($link).'">
//                          <span>'.$cat_all[$i]->title.'</span>
//                        </a>
//                        <span>&nbsp&nbsp&nbsp&nbsp&nbsp' . $inst_count . '</span>
//                      </div>';
//                    
//                }else{
//                    echo '<div  class="cat_pic">
//                        <img  '.$style.' src="'. $cat_image.'" alt="?"/>
//                        <a href="'.JRoute::_($link).'">
//                          <span>'.$cat_all[$i]->title.'</span>
//                        </a>
//                      </div>';
//                }
//              }else{//category layout don't has image
//                $modId = ($moduleId) ? '&moduleId=' . $moduleId : '';
//                $lid = isset($layout_params['parent_layout_params']['views']['category_layout'])?
//                            $layout_params['parent_layout_params']['views']['category_layout'] :
//                            $layout->lid;
//                $link = 'index.php?option=com_os_cck&amp;view=category&amp;'
//                        .'&amp;lid='.$lid
//                    .'&amp;catid='. $cat_all[$i]->cid . '&amp;Itemid=' . $Itemid . $modId;
//                $style = 'style="margin-left:'.$deep.'px"';
//
//                
//                if(strpos($layout_html,"{|f-joom_instance_count|}")){
//                    $inst_count = getInstanceCountInCategory($cat_all[$i]->cid);
//                    echo '<div  class="cat_pic">
//                        <a '.$style.' href="'.JRoute::_($link).'">
//                          <span>'.$cat_all[$i]->title.'</span>
//                        </a>
//                        <span>&nbsp&nbsp&nbsp&nbsp&nbsp' . $inst_count . '</span>
//                      </div>';
//                    
//                }else{
//                    echo '<div  class="cat_pic">
//                        <a '.$style.' href="'.JRoute::_($link).'">
//                          <span>'.$cat_all[$i]->title.'</span>
//                        </a>
//                      </div>';
//                }
//              }
//              showCategorySubCat($cat_all[$i]->cid, $cat_all, $params, $Itemid, $deep,$layout,$layout_params, $currentcat);
//            }//end if
//          }//end for
//        }//end fn
          function showCategorySubCat($id, $cat_all, $params, $Itemid, $layout,$layout_params, $option, $lid, $layoum_mardgin = 0) {
          
          
              
          $layoum_mardgin+=25;
          for ($i = 0; $i < count($cat_all); $i++) { 
              
              
              
            if (($id == $cat_all[$i]->parent_id) && ($cat_all[$i]->display == 1) && $layout_params['catid'] == $cat_all[$i]->parent_id) {


                $field = new stdClass();
                $field->db_field_name = "l".$layout_params['views']['subcategories_layout'];
                $field_styling = get_field_styles($field, $layout);
                $custom_class = get_field_custom_class($field, $layout);
                $offset_animation = get_field_offset_animation($field, $layout);
                $button_style = array('field_styling'=>$field_styling,'custom_class'=>$custom_class,'offset_animation'=>$offset_animation);
                $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
                //pass the layout to display the subcategories when going to the category
                //var_dump($layout_params['views']['subcategories_layout']);
                if(!isset($layout_params['parent_layout_params']['views']['category_layout']) || $layout_params['parent_layout_params']['views']['category_layout'] == NULL){
                    $layout_params['views']['category_layout'] = $lid;
                } else {
                    $layout_params['views']['category_layout'] = $layout_params['parent_layout_params']['views']['category_layout'];
                }
                
                $style = 'style="margin-left:'.$layoum_mardgin.'px"';
                
                if($layout_params['views']['subcategories_layout'] > -1){
                    echo '<'.$shell_tag.' class="cat_instance_body_child'.$custom_class.'" '. $offset_animation . ' ' .$style.'>';

                    Category::show_attached_layout($option, $layout_params['views']['subcategories_layout'], $layout->fk_eid, $layout_params,
                                           1,'',$cat_all[$i]->cid, $cat_all, $button_style);
                    echo '</'.$shell_tag.'>';
                }
              
              showCategorySubCat($cat_all[$i]->cid, $cat_all, $params, $Itemid, $layout,$layout_params, $option, $lid, $layoum_mardgin);
              
            }else{
                
            }//end if
          }//end for
        }
      }

      showCategorySubCat($layout_params['catid'], $categories, $params, $Itemid, $layout,$layout_params, $option, $lid);
      //Category::showCategory($option, $catid,$lid,$category_params);
    }
  } ?>
  <script>
    jQuerOs("div[class *='cck-row-'], div[id *='cck_col-']").each(function(index, el) {
      jQuerOs(el).attr("style",jQuerOs(el).data("block-styling"))
    });
    jQuerOs("div[class *='cck-row-']").addClass('row');
    // jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row, .delete-layout").remove();
    jQuerOs(".delete-field, .delete-row, .delete-layout").remove();
    jQuerOs(".content-row[class*='cck-row-']").each(function(index, el) {
      if(!jQuerOs(el).find(".drop-item").length){
        jQuerOs(el).remove();
      }
    });
    //jQuerOs("span.cck-help-string").remove();
    jQuerOs(function () {
      jQuerOs('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</div>
 <noscript>Javascript is required to use OrdaSoft Content Construction Kit for Joomla<a href="https://ordasoft.com/cck-content-construction-kit-for-joomla.html" title="OS Content Construction Kit">OS Content Construction Kit</a> OS CCK is easy yet powerful Content Construction Kit for Joomla that helps to create various kinds of product catalogs, classifieds and listings. 
        Tags: <a
         href="https://ordasoft.com/cck-content-construction-kit-for-joomla.html">OS Content Construction Kit</a>. OS CCK is easy yet powerful Content Construction Kit for Joomla that helps to create various kinds of product catalogs, classifieds and listings.
        </noscript>