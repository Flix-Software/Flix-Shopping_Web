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

$price_details_show = (isset($layout_params['fields']['price_details_'.$fName]) && $layout_params['fields']['price_details_'.$fName]=='on') ? true : false;
$delete_button_show = (isset($layout_params['fields']['delete_button_'.$fName]) && $layout_params['fields']['delete_button_'.$fName]=='on') ? true : false;
$edit_quantity = (isset($layout_params['fields']['edit_quantity_'.$fName]) && $layout_params['fields']['edit_quantity_'.$fName]=='on') ? true : false;
$quantity_prefix = (isset($layout_params['fields'][$fName.'_quantity_prefix'])) ? $layout_params['fields'][$fName.'_quantity_prefix'] : '';
$quantity_suffix = (isset($layout_params['fields'][$fName.'_quantity_suffix'])) ? $layout_params['fields'][$fName.'_quantity_suffix'] : '';
?>
<div class="all_products <?php echo $custom_class; ?>" <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> <?php echo $field_styling; ?> <?php echo $offset_animation;?>>
<?php               
  foreach($cart as $key => $product){
      $instance = new os_cckEntityInstance($db);
      $instance->load($product['eiid']);
      if($instance->meta_title == ''){
          $instance->meta_title = getInstanceTitle($instance);
      }
?>
      <div class="single_product" id="product-<?php echo $key; ?>"><div class="product_title"><?php echo $instance->meta_title; ?></div>
          <?php
      $price_fields = json_decode($product['price_fields']);
      $price_fields_json = $product['price_fields'];
      $calculated_price = getCalculatedPrice($price_fields, $instance->eiid)['calculated_price'];
      $calculated_currency = calculatedCurrency($instance, $calculated_price);
      ?>
      
      <?php
      $price_details = get_price_details($price_fields, $instance->eiid);
      $quantity = $price_details['quantity'];
      if($price_details_show){
          echo $price_details['html'];
      }
      ?>
      <div class="calculated_price">Total: <?php echo $calculated_currency[0]; ?></div>
      <input type="hidden" eid="<?php echo $instance->fk_eid; ?>" eiid="<?php echo $instance->eiid; ?>" class="hidden_calculated_price" value="<?php echo $calculated_currency[1]; ?>">
      
      <div class='quantity_product_cart'>
          <?php
          if(isset($layout_params['fields'][$fName.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_prefix'])){
              echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_prefix'].'"></span>';
          }
          if($quantity_prefix != ''){
              echo '<span class="quantity_prefix">'.$quantity_prefix.'</span>';
          }
          if(isset($layout_params['fields'][$fName.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_suffix'])){
              echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_suffix'].'"></span>';
          }
          if($edit_quantity){
          ?>
              <input class='cart_input_product_quantity' type='number' min='1' value='<?php echo $quantity; ?>' instance_currency='<?php echo $instance->instance_currency; ?>' onchange='javascript:changeProductQuantity(<?php echo $key; ?>, <?php echo $price_fields_json; ?>, <?php echo $instance->eiid; ?>, true)'>
          <?php }else{ ?>
              <input class='cart_input_product_quantity' type='hidden' value='<?php echo $quantity; ?>' instance_currency='<?php echo $instance->instance_currency; ?>'><?php echo $quantity; ?>
          <?php } 
          if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
              echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
          }
          if($quantity_suffix != ''){
              echo '<span class="quantity_suffix">'.$quantity_suffix.'</span>';
          }
          if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
              echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
          }?>
      </div>
      <?php if($delete_button_show){ ?>
            <div class="delete_product_from_cart"><input class="btn delete_product_from_cart_btn" type="button" value="Delete from Cart" onclick="javascript:remove_product_from_cart(<?php echo $key; ?>)"/></div>
      <?php } ?>
      </div>
      
      <input type='hidden' key="<?php echo $key; ?>" class='hidden_cart_price' eiid='<?php echo $instance->eiid;?>' quantity='<?php echo $quantity;?>' value='<?php echo $price_fields_json;?>'>
  <?php }
  ?>
</div>




<!--<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php

    if(!empty($layout_params['fields'][$fName.'_prefix'])){
      echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
    }
    if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
      $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
      $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
    }
    
        //echo 'NEW PRICE';
        ?>
    <div id="<?php echo $fName; ?>" class="calculated_price_value" ordering_calculate="<?php echo $ordering_calculate;?>">
        
    </div>
    <?php
    
    if(!empty($layout_params['fields'][$fName.'_suffix'])){
      echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
    }
  ?>
</span>-->
