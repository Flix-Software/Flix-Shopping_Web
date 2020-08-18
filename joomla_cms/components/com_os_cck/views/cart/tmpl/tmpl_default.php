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


$field = new stdClass();
$field->db_field_name = 'form-'.$layout->lid;
$form_hover_animation = get_field_hover_animation($field, $layout);
?>
<div class="cck-body" <?php echo $form_hover_animation; ?>>

    
  <?php
  $os_cck_rand = rand();
      if(isset($layout_params['views']['show_layout_title']) && $layout_params['views']['show_layout_title'])
    {   
          echo "<h3>";
            echo $layout_params['views']['layout_title'];
          echo "</h3>";
    }
    //$layout_fields = $layout_params['fields'];
    $fields = array();
    $show_fields = array();
    ?>
  <div>
  <?php 
    
      
      $form_styling = get_field_styles($field, $layout);
      $form_custom_class = get_field_custom_class($field, $layout);
      $form_offset_animation = get_field_offset_animation($field, $layout);
      
      ?>
      <div class="<?php echo $form_custom_class; ?> cart_fields" <?php echo $form_offset_animation; ?> <?php echo $form_styling; ?> >
      <?php
      $layout_html = urldecode($layout->layout_html);
      $layout_html = cut_params($layout_html);
      $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
      
      
      $field = new stdClass();



      //category_instance_count
      if(strpos($layout_html,"{|f-product_for_cart|}")){
          $html = '';
          $field->db_field_name = 'product_for_cart';
          $field_styling = get_field_styles($field, $layout);
          $hover_styling = get_hover_css_style($field, $layout_params);
          echo $hover_styling;
          $custom_class = get_field_custom_class($field, $layout);
          $offset_animation = get_field_offset_animation($field, $layout);
          
          //$layout_html = str_replace("{|f-cck_calculated_price_$key|}", $calculated_price_html, $layout_html);
          
          if(isset($cart) && !empty($cart)){
            ob_start();
            require getSiteUniqueFiledViewPath('com_os_cck', 'product_for_cart');
            $html .= ob_get_contents();
            ob_end_clean();
            
            $layout_html = str_replace("{|f-product_for_cart|}", $html, $layout_html);
          }else{
              $layout_html = str_replace("{|f-product_for_cart|}", '', $layout_html);
          }
      }
          
          if(strpos($layout_html,"{|f-total_price|}")){
              $field->db_field_name = 'total_price';
              
              $layout_html = str_replace($field->db_field_name."-label-hidden", '', $layout_html);
              $field_styling = get_field_styles($field, $layout); 
              
              $icon_alias_prefix = (isset($layout_params['fields'][$field->db_field_name.'_add_icon_alias_prefix'])) ? $layout_params['fields'][$field->db_field_name.'_add_icon_alias_prefix'] : '';
              if($icon_alias_prefix != ''){
                  $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
              }
              $icon_alias_suffix = (isset($layout_params['fields'][$field->db_field_name.'_add_icon_alias_suffix'])) ? $layout_params['fields'][$field->db_field_name.'_add_icon_alias_suffix'] : '';
              if($icon_alias_suffix != ''){
                  $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
              }
              
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

              $total_price = $prefix.'<'.$shell_tag.' '.$tooltip.' class="'.$custom_class. ' ' . $field->db_field_name . '" '. $offset_animation . ' '.$field_styling.'></'.$shell_tag.'>'.$suffix;
              $layout_html = str_replace("{|f-total_price|}", $total_price, $layout_html);
              
              ?>
              <script type="text/javascript">
                  
                  
                  jQuerOs(window).on('load', function(){
                      get_total_price('<?php echo $os_cck_configuration->get("currency_position", "0"); ?>', '<?php echo getProductCurrency(); ?>');
                  })
                  
              </script>
          
              <?php
          }
          
          if(strpos($layout_html,"{|f-button_continue_shopping|}")){
              $field->db_field_name = 'button_continue_shopping';
              
              $layout_html = str_replace($field->db_field_name."-label-hidden", '', $layout_html);
              $field_styling = get_field_styles($field, $layout);
              
              $hover_styling = get_hover_css_style($field, $layout_params);
              echo $hover_styling;
              $custom_class = get_field_custom_class($field, $layout);
              $offset_animation = get_field_offset_animation($field, $layout);
              
              $button_text = (isset($layout_params['fields'][$field->db_field_name.'_button_text']) && $layout_params['fields'][$field->db_field_name.'_button_text'] != '') ? $layout_params['fields'][$field->db_field_name.'_button_text'] : 'Continue Shopping';
              $redirect_type = (isset($layout_params['fields']['redirect_' . $field->db_field_name])) ? $layout_params['fields']['redirect_'.$field->db_field_name] : 'return';
              
              if($redirect_type == 'return'){
                  $onclick = 'onclick="history.back();"';
              }else{
                  $redirect_link = (isset($layout_params['fields']['redirect_link_' . $field->db_field_name])) ? $layout_params['fields']['redirect_link_'.$field->db_field_name] : '';
                  if($redirect_link != ''){
                      $onclick = 'onclick="window.location=\''.$redirect_link.'\'"';
                  }else{
                      $onclick = 'onclick="alert(\'Please specify the redirect page in the field settings!\')"';
                  }
              }
              
              $total_price = '<button  class="button btn '.$custom_class. ' ' . $field->db_field_name . '" '. $offset_animation . ' '.$field_styling.' ' . $onclick . '>'.$button_text.'</button>';
              $layout_html = str_replace("{|f-button_continue_shopping|}", $total_price, $layout_html);
              
          }
          
          if(strpos($layout_html,"{|f-coupon|}")){
              $field->db_field_name = 'coupon';
              $html = '';
              $layout_html = str_replace($field->db_field_name."-label-hidden", '', $layout_html);
              $field_styling = get_field_styles($field, $layout);
              
              $hover_styling = get_hover_css_style($field, $layout_params);
              echo $hover_styling;
              $custom_class = get_field_custom_class($field, $layout);
              $offset_animation = get_field_offset_animation($field, $layout);
              
              ob_start();
              require getSiteUniqueFiledViewPath('com_os_cck', $field->db_field_name);
              $html .= ob_get_contents();
              ob_end_clean();
            
              $layout_html = str_replace("{|f-coupon|}", $html, $layout_html);
              
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
                    $eiids = array();
                    if(isset($cart) && !empty($cart)){
                        foreach ($cart as $product){
                            $eiids[] = $product['eiid'];
                        }
                    }
                    
                    ob_start();
                    
                    //echo '<div class="'.$custom_class.'" ' . $offset_animation . ' ' .$div_styling.'>';
                    echo '<div class="'.$custom_class.'" ' . $offset_animation . '>';
                    Instance::show_request_layout($option, $key, $eiids, $show_type,$button_name , 1,$layout_params['title'], $button_style);
                    echo '</div>';  
                    
                    $user = JFactory::getUser();
                    
                    if( $value != '1' && !checkAccess_cck($value, $user->groups, $layout->fk_eid, 'fields')){
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
      
    ?>
    
    </div>
    
  </div>
  
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
    
    function remove_product_from_cart(key){
        
        
        
        jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "removeProductFromCart",
                keyProduct: key,
            },
            success: function(data){ 
                jQuerOs('#product-'+key).remove();
                get_total_price('<?php echo $os_cck_configuration->get("currency_position", "0"); ?>', '<?php echo getProductCurrency(); ?>');
                
                var small_carts = jQuerOs('.small_cart');
            
                for(var index=0; index < small_carts.length; ++index){

                    var change_effect = jQuerOs(small_carts[index]).attr('change_effect');
                    var html = '<div>'+data.cart_count+'</div>';
                    jQuerOs(small_carts[index]).find('.small_cart_count').html(html);


                    if(cart_count > 0 && data.cart_count == 0){
                        var text_empty_cart = jQuerOs(small_carts[index]).attr('empty_text');
                        var img_empty_cart = jQuerOs(small_carts[index]).attr('img_empty');
                        if(img_empty_cart.indexOf('img') == 0 && img_empty_cart.length > 4){
                            var img_empty_cart_value = '<img src="<?php echo JURI::root();?>images/stories/'+img_full_cart.substr(img_full_cart.indexOf(' ')+1)+'">';
                        }else if(img_empty_cart.indexOf('icon') == 0 && img_empty_cart.length > 5){
                            var img_empty_cart_value = '<div class="fa '+img_empty_cart.substr(img_empty_cart.indexOf(' ')+1)+'"></div>'
                        }else{
                            var img_empty_cart_value = '<div class="fa fa-shopping-basket"></div>'
                        }
//                        if(img_empty_cart.indexOf('img') == 0){
//                            var img_empty_cart_value = '<img src="<?php echo JURI::root();?>images/stories/'+img_empty_cart.substr(img_empty_cart.indexOf(' ')+1)+'">';
//                        }else{
//                            var img_empty_cart_value = '<div class="fa '+img_empty_cart.substr(img_empty_cart.indexOf(' ')+1)+'"></div>'
//                        } 

                        jQuerOs(small_carts[index]).find('.text_cart').html(text_empty_cart);
                        jQuerOs(small_carts[index]).find('.small_cart_img').html(img_empty_cart_value);
                    }

                    jQuerOs(small_carts[index]).find('a').addClass(change_effect);
                    jQuerOs(small_carts[index]).find('a').addClass('animated');
                    
                    
                    setTimeout(function(){
                        removeAnimateClass(jQuerOs(small_carts[index]).find('a'),change_effect);
                    },1000); 
                }


                cart_count = data.cart_count;
            }

        });
        
    }
    
    function changeProductQuantity(key, price_fields, eiid, getTotalPrice, coupon_type){
    
        var quantity = jQuerOs('#product-'+key+' .cart_input_product_quantity').val()
        console.log('11111111111', quantity)
        var instance_currency = jQuerOs('#product-'+key+' .cart_input_product_quantity').attr('instance_currency')
        //apply_coupon_value = 0;
        if(price_fields.coupon != undefined){
            var coupon = price_fields.coupon;
        }else if(jQuerOs('#os_cck_coupon') != undefined){
            var coupon = jQuerOs('#os_cck_coupon').attr('coup_id');
        }else{
            var coupon = '';
        }

        for(var price_field in price_fields){

            //if(price_fields[price_field].quantity !== undefined){
                price_fields[price_field].quantity = quantity;
            //}
        }
        //console.log('44444444444444', price_fields.coupon)
        price_fields = JSON.stringify(price_fields);
        
        var apply_coupon_value = jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "ajaxCalculatedPrice",
                jsonPriceFields: price_fields,
                eiid: eiid,
                orderingCalculateField: '51',
                coupon: coupon,
            },
            global: false,
            async:false,
            success: function(data){

                jQuerOs('#product-'+key+' .calculated_price').text('Total: ' + data.print_value);
                jQuerOs('#product-'+key+' .hidden_calculated_price').val(data.not_currency_value);
                if(getTotalPrice){
                    get_total_price('<?php echo $os_cck_configuration->get("currency_position", "0"); ?>', '<?php echo getProductCurrency(); ?>');
                }
                
                return apply_coupon_value;
            }

        }).responseText;

        jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "getAjaxPriceDetails",
                jsonPriceFields: price_fields,
                instance_currency: instance_currency,
                eiid: eiid,
                coupon: coupon,
            },
            success: function(data){ 
                jQuerOs('#product-'+key+' .price_detail').html(data.html);
            }

        });
        
        
        apply_coupon_value = JSON.parse(apply_coupon_value)
        //console.log('7777777777', apply_coupon_value)
        if(coupon_type == 'value' && apply_coupon_value.coupon_discount > 0){
            return true;
        }else{
            return false;
        }
        

    }
    
    function removeAnimateClass(element, className){
        jQuerOs(element).removeClass('animated');
        jQuerOs(element).removeClass(className);
    }
    
    
  </script>
</div>
 <noscript>Javascript is required to use OrdaSoft Content Construction Kit for Joomla<a href="https://ordasoft.com/cck-content-construction-kit-for-joomla.html" title="OS Content Construction Kit">OS Content Construction Kit</a> OS CCK is easy yet powerful Content Construction Kit for Joomla that helps to create various kinds of product catalogs, classifieds and listings. 
        Tags: <a
         href="https://ordasoft.com/cck-content-construction-kit-for-joomla.html">OS Content Construction Kit</a>. OS CCK is easy yet powerful Content Construction Kit for Joomla that helps to create various kinds of product catalogs, classifieds and listings.
        </noscript>