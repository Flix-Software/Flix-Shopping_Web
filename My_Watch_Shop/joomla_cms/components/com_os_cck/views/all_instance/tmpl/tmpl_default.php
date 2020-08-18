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


?>
<div class="cck-body">
  <script type="text/javascript">
    var bitches = new Array();
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
  
  if (isset($instancies[0])) { ?>

<!--     <h1 class="componentheading<?php echo $params->get('pageclass_sfx'); ?>">
        <?php echo $params->get('header'); ?>
    </h1> -->
    
    <?php
    $layout_fields = $layout_params['fields'];
    $fields = array();
    $show_fields = array();
  }


  if(isset($layout_params['views']['show_layout_title']) && $layout_params['views']['show_layout_title']){
          echo "<h3>";
            echo $layout_params['views']['layout_title'];
          echo "</h3>";
    }


  //if(count($instancies) > 0){



    $field = new stdClass();
    $field->db_field_name = 'form-'.$layout->lid;
    if(!isset($entityInstance)){
        $entityInstance = new os_cckEntityInstance($db);
    }
    if(!isset($instance)){
        $instance = $entityInstance;
    }
    
    $form_styling = get_field_styles($field, $layout);
    $form_custom_class = get_field_custom_class($field, $layout);
    $form_offset_animation = get_field_offset_animation($field, $layout);
    $form_hover_animation = get_field_hover_animation($field, $layout);
    ?>
    <div>

        <div class="<?php echo $form_custom_class; ?> cat_fields" <?php echo $form_offset_animation; ?> <?php echo $form_hover_animation; ?> <?php echo $form_styling; ?> >
        <?php
        $layout_html = urldecode($layout->layout_html);
        $layout_html = cut_params($layout_html);
        $layout_html = str_replace('data-label-styling', 'style',  $layout_html);


          
        if(isset($fields)){
            //var_dump($layout_params['fields']);
          foreach ($fields as $field) {


            if(is_array($field)){
                $field = (object)$field;
                if(!isset($field->fid)){
                    $field->fid = substr($field->db_field_name, (strripos($field->db_field_name, '_'))+1);
                }
            }
            
          $html = '';
          $field_styling = get_field_styles($field, $layout);
          $layout_params['field_styling'] = $field_styling;
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
          //get tag
          $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
          //end


          
          if(strpos($layout_html,"{|f-".$field->fid."|}")){
              
           $php_if = isset($layout_params['fields'][$field->db_field_name.'_php_show']) ? $layout_params['fields'][$field->db_field_name.'_php_show'] : '';
           $php_result = true;
           if($php_if != ''){
                $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
           }
           
          if($php_result){
            //check access
            $value = $entityInstance->getFieldValue($field);
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
            if(empty($value)){
              $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
              continue;
            }
            if(isset($layout_params['fields']['access_'.$field->db_field_name])
                && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
              $user = JFactory::getUser();
              if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $layout->fk_eid, 'fields')){
                $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
                continue;
              }
            }
            if(isset($layout_params['fields'][$field->db_field_name]['options'])){
              $field->options = $layout_params['fields'][$field->db_field_name]['options'];
            }
            // $global_settings = unserialize($field->global_settings);
            // if(isset($global_settings['title_field']) && $global_settings['title_field']){
            //   if(isset($value[0]->data) && !empty($value[0]->data))$title = $value[0]->data;
            //   else $title = $entityInstance->eiid;
            //   $layout_params['title'] = $title;
            // }
            $image_css = ($field->field_type=='imagefield' && isset($field->options['width'])
                          && isset($field->options['height']))?
                          'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':
                          '';
            $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
            $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';
            $field_styling = substr_replace($field_styling, ' display:block;'.$image_css.'"', strlen($field_styling)-1, strlen($field_styling));
            $a_styling = $field_styling;
            if(isset($layout_params['views']['link_field']))$field_styling = '';
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

              $button_name = isset($layout_params['views']['show_request_layout_button_name'][$key][0])?$layout_params['views']['show_request_layout_button_name'][$key][0]:'';
              if(strpos($layout_html,"{|l-".$key."|}")){
                //if below fn works , that this is add_instance view
                $field = new stdClass();
                $field->db_field_name = $key;
                if(isset($layout_params['views']['show_request_layout'][$key])
                    && $layout_params['views']['show_request_layout'][$key] != '1'){
                  $user = JFactory::getUser();
                  if(!checkAccess_cck($layout_params['views']['show_request_layout'][$key], $user->groups, $layout->fk_eid, 'fields')){
                    $layout_html = str_replace("{|l-".$key."|}", '', $layout_html);
                    continue;
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


                if(isset($layout_params["views"]["instance_grid"]) && $layout_params["views"]["instance_grid"] == 1){ ?>

                <script>

                   jQuerOs(document).ready(function(){

                    jQuerOs(".instance_body").parent().addClass('flex-block');

                   });

                </script>

                <?php  }

                $unique_class = 'all_instance_unique_class_'.$layout->lid;

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

                        var gallery = new cckGridLayout1(".<?php echo $unique_class; ?>",{
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
                echo '<div class="'.$cck_wrapper_instance.' '.$unique_class.' '.$resolutions.' '.$custom_class.'
                  " '. $offset_animation . ' ' .$field_styling.'>';

                Category::show_attached_layout($option, $key, $layout->fk_eid, $layout_params, $show_type, $button_name, 0, $instancies, $button_style);
                echo '</div>';
                $layout_html = str_replace("{|l-".$key."|}", ob_get_contents(), $layout_html);
                ob_end_clean();
              }
          }else{
                $layout_html = str_replace("{|l-".$key."|}", '', $layout_html);
          }
        }
      }
      
      $php_if = isset($layout_params['fields']['all_instance_map_php_show']) ? $layout_params['fields']['all_instance_map_php_show'] : '';
      $php_result = true;
      
      if($php_if != ''){
           $php_result = processing_php_show($php_if, $instance, $layout_params, $layout_html, $layout);
      }

      if(!$php_result){
          $layout_html = str_replace("{|f-all_instance_map|}", '', $layout_html);
      }
      //check access
      if(isset($layout_params['fields']['access_all_instance_map'])
          && $layout_params['fields']['access_all_instance_map'] != '1'){
        $user = JFactory::getUser();
        if(!checkAccess_cck($layout_params['fields']['access_all_instance_map'], $user->groups, $layout->fk_eid, 'fields')){
          $layout_html = str_replace("{|f-all_instance_map|}", '', $layout_html);
        }
      }
         
      //map
      if(strpos($layout_html,"{|f-all_instance_map|}")){
//        $key = 'key='.$os_cck_configuration->get("google_map_key",'');
//        if(checkJavaScriptIncludedCCK("maps.googleapis.com") === false ) {
//            $doc->addScript('//maps.googleapis.com/maps/api/js?'.$key);
//        }
        
        $field->db_field_name = 'all_instance_map';

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
        $shell_tag = isset($layout_params['all_instance_layout_params']['fields']['label_tag_joom_pagination'])?$layout_params['all_instance_layout_params']['fields']['label_tag_joom_pagination']:'span';

        ob_start();
        ?>
          <script type="text/javascript">
                     jQuerOs(document).ready(function() {
                      jQuerOs('#pagination').attr('style','<?php echo $field_styling;?>');
                    });
          </script>
        <?php
          echo '<'.$shell_tag.' id="pagination" class="' . $custom_class . ' ' . $field->db_field_name . '" ' . $offset_animation . '>';
            if (!empty($pageNav) && ($pageNav->total > $pageNav->limit)) {
              echo $pageNav->getPagesLinks();
            }
          echo '</'.$shell_tag.'>';
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
    if($mod_type == 0 && !empty($instancies)){
        
      if(strpos($layout_html,"{|f-all_instance_order_by|}")){
        //check access

        $field->db_field_name = 'all_instance_order_by';
        $field_styling = get_field_styles($field, $layout);
        $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
        $hover_styling = get_hover_css_style($field, $layout_params);
        echo $hover_styling;
        $custom_class = get_field_custom_class($field, $layout);
        $offset_animation = get_field_offset_animation($field, $layout);
        $shell_tag = isset($layout_params['all_instance_layout_params']['fields']['label_tag_all_instance_order_by'])?$layout_params['all_instance_layout_params']['fields']['label_tag_all_instance_order_by']:'span';

        $order_by_params = $layout_params['all_instance_layout_params'];

        if(isset($order_by_params['fields']['access_all_instance_order_by'])
            && $order_by_params['fields']['access_all_instance_order_by'] != '1'){
          $user = JFactory::getUser();

          if(!checkAccess_cck($order_by_params['fields']['access_all_instance_order_by'], $user->groups, $layout->fk_eid, 'fields')){
            $layout_html = str_replace("{|f-all_instance_order_by|}", '', $layout_html);
          }
        }


        ob_start();


      if(isset($order_by_params['fields']['all_instance_order_by_published']) 
          && $order_by_params['fields']['all_instance_order_by_published'] == 'on'){

          
            if(count($instancies) > 0 && isset($order_by_params['views']['sortField'])
                            && !empty($order_by_params['views']['sortField'])
                            && count($order_by_params['views']['sortField']) > 1){

            $sort_arr['sortField'] = $order_by_params['views']['sortField'];
            $sort_arr['order_direction'] = isset($order_by_params['fields']['sortType_all_instance_order_by'])?$order_by_params['fields']['sortType_all_instance_order_by']:'ASC';


            $selected = (isset($order_by_params['views']['selected'])) ? $order_by_params['views']['selected'] : '' ;
            $session = JFactory::getSession();
            $session->set('order_direction', $sort_arr['order_direction']);
            $session->set('selected', $selected); ?>

            <div id="CckOrderBy<?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" class="orderTable <?php echo $custom_class;?> <?php echo $field->db_field_name; ?>" <?php echo $offset_animation; ?> >
                <form class="<?php echo $field->db_field_name; ?>" <?php echo $field_styling;?> id="orderForm<?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>" method="POST" action="<?php echo JRoute::_($_SERVER["REQUEST_URI"]); ?>" name="orderForm<?php echo ($moduleId) ? '_cckmod_'.$moduleId : '' ;?>">
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
                        <option  value="ceid" 'selected=selected'>Index</option>
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
        $layout_html = str_replace("{|f-all_instance_order_by|}", ob_get_contents(), $layout_html);
        ob_end_clean();

      }
    }
     else {
         $layout_html = str_replace("{|f-all_instance_order_by|}", '', $layout_html);
    }
    //end render order by

    
//ar_dump($layout->custom_fields);
        if(!isset($layout_params['custom_fields']) && isset($layout->custom_fields)){
            $layout_params['custom_fields'] =  unserialize($layout->custom_fields);
        }
      //start render custom code
      if(isset($layout_params['custom_fields']) && count($layout_params['custom_fields'])){
          
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



      if (false && $layout_params['views']['cat_hits'] == 1) {
          ?>
      <div class="cat_hits">
          <div class="col_inline sectiontableheader<?php echo $params->get('pageclass_sfx'); ?>">
              <?php echo JText::_("COM_OS_CCK_LABEL_HITS"); ?>
          </div>
          <div class="col_inline">
              <?php echo $instance->hits; ?>
          </div>
      </div>
          <?php
      }
    ?>
    </div>
    <?php
  //}
  ?>
    <div>
       <input class="inputbox" type="hidden" name="bid[]" size="0" maxlength="0"
           value="<?php echo (isset($instance->eiid)) ? $instance->eiid : ''; ?>"/>
    </div>
  </div> <!-- end class="cat_block" -->
  <script>
    jQuerOs("div[class *='cck-row-'], div[id *='cck_col-']").each(function(index, el) {
      jQuerOs(el).attr("style",jQuerOs(el).data("block-styling"))
    });
    jQuerOs("div[class *='cck-row-']").addClass('row');
    jQuerOs(".delete-field, .delete-row, .delete-layout").remove();
    //jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row, .delete-layout").remove();
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