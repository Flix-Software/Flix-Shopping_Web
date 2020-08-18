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

if($value == '' || empty($value)){
    $value = array();
    $value = new stdClass;
    $value->price_value = '';
    $value->quantity = '';
    $value->price_name = '';
}
$required = '';
$step = '1';
$offset_animation = get_field_offset_animation($field, $layout);
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$min = 0;
$max = str_pad('',18, 9);

if($layout->type == 'buy_request_instance'){
    if($max > $value->quantity){
        $max = $value->quantity;
    }
    $value = 1;
    $min = 1;
}

$placeholder = isset($layout_params['fields'][$field->db_field_name."_placeholder"])?$layout_params['fields'][$field->db_field_name."_placeholder"]:'';
$quantity_placeholder = isset($layout_params['fields'][$field->db_field_name."_quantity_placeholder"])?$layout_params['fields'][$field->db_field_name."_quantity_placeholder"]:'';

$step = str_pad(0, 3, 0);
$step = substr_replace($step,'.',(strlen($step)-1-2),1);
$step = substr_replace($step,'1',-1);

$price_type = (isset($field_from_params[$fName.'_price_type'])) ? $field_from_params[$fName.'_price_type'] : 'base_price';
$show_quantity = (isset($field_from_params[$fName.'_show_quantity'])) ? $field_from_params[$fName.'_show_quantity'] : 'on';

//$cut_string_len = -9 + 2;
//
//$value->price_value = substr($value->price_value, 0, $cut_string_len);
//var_dump($value);
//}
//elseif(isset($field_from_params[$fName.'_field_type']) && $field_from_params[$fName.'_field_type'] != 'quantity') {
//    $value = substr($value, 0, -10);
//}

if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
$os_cck_configuration = JComponentHelper::getParams('com_os_cck');


    $paypal_currency = cck_getCurrency($os_cck_configuration);
//    $currencyOpt = array();
//    //var_dump($paypal_currency);
//    foreach ($paypal_currency as $carrencyArr) {
//      $currencyOpt[] = JHTML::_('select.option', $carrencyArr['sign'], $carrencyArr['signAlias'], "value", "text");
//    }
//    $currency = (isset($entityInstance->instance_currency) && !empty($entityInstance->instance_currency))?$entityInstance->instance_currency : '';
//    $currencySelect = JHTML::_('select.genericlist', $currencyOpt, "instance_currency", 'class="cck-currency ' . $layout_params['custom_class'] . '" ' . $offset_animation . ' style="width: auto !important;"', 'value', 'text', $currency);
    $currencySelect = $paypal_currency[0]['sign'];
?><span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> ><?php

    if($os_cck_configuration->get('currency_position','0')){
      //before
      if(!isset($show_currency)){
        echo $currencySelect;
        $show_currency = true;
      }?>
    <span class="input_price">
        <label><?php echo JText::_('COM_OS_CCK_LABEL_PRICE_VALUE'); ?></label>
      <input <?php echo $layout_params['field_styling']?> 
            class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> price_field" 
            <?php echo $offset_animation; ?> 
            type="number" 
            step="<?php echo $step?>" 
            min ="0"
            max="<?php echo $max?>"
            placeholder="<?php echo $placeholder?>"
            name="fi_<?php echo $field->db_field_name?>_0" 
            value="<?php echo $value->price_value?>"/>
    </span>
        <?php if($price_type == 'base_price' && $show_quantity != '0'){ ?>
        <span class="input_price">
        <label><?php echo JText::_('COM_OS_CCK_LABEL_PRICE_QUANTITY'); ?></label>
          <input <?php echo $layout_params['field_styling']?> 
                class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> quantity_field" 
                <?php echo $offset_animation; ?> 
                type="number" 
                step="<?php echo $step?>" 
                min ="0"
                placeholder="<?php echo $quantity_placeholder; ?>"
                name="fi_<?php echo $field->db_field_name?>_quantity_0" 
                value="<?php echo $value->quantity?>"/>
        </span>
          <?php
        }
    }else{
        //after?>
    <span class="input_price">
        <label><?php echo JText::_('COM_OS_CCK_LABEL_PRICE_VALUE'); ?></label>
        <input <?php echo $layout_params['field_styling']?> 
            class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> price_field" 
            <?php echo $offset_animation; ?> 
            type="number"
            step="<?php echo $step?>"
            min ="0"
            max="<?php echo $max?>"
            placeholder="<?php echo $placeholder?>"
            name="fi_<?php echo $field->db_field_name?>_0"
            value="<?php echo $value->price_value?>"/>
    </span>
    <?php if($price_type == 'base_price' && $show_quantity != '0'){ ?>
    <span class="input_price">
      <label><?php echo JText::_('COM_OS_CCK_LABEL_PRICE_QUANTITY'); ?></label>
      <input <?php echo $layout_params['field_styling']?> 
            class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> quantity_field" 
            <?php echo $offset_animation; ?> 
            type="number" 
            step="<?php echo $step?>" 
            min ="0"
            placeholder="<?php echo $quantity_placeholder; ?>"
            name="fi_<?php echo $field->db_field_name?>_quantity_0" 
            value="<?php echo $value->quantity?>"/>
    </span>
      <?php
    }
        if(!isset($show_currency)){
            echo $currencySelect;
            $show_currency = true;
        } ?>
    <?php } ?>
    <input type="hidden" name="price_fields[]" value="<?php echo $field->db_field_name?>">
    <input type="hidden" name="<?php echo $field->db_field_name?>_fid" value="<?php echo $field->fid; ?>">
    <input type="hidden" name="<?php echo $field->db_field_name?>_ordering[]" value="0">
    
</span>
    