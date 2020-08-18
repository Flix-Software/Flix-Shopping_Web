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

$required = '';
$step = '1';
$offset_animation = get_field_offset_animation($field, $layout);
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$min = 0;
$max = str_pad('',$field_from_params[$fName.'_digits'], 9);
//var_dump($entityInstance->quantity);
if($layout->type == 'buy_request_instance' && isset($field_from_params[$fName.'_field_type']) && $field_from_params[$fName.'_field_type'] == 'quantity'){
    if($max > $entityInstance->quantity){
        $max = $entityInstance->quantity;
    }
    $value = 1;
    $min = 1;
}elseif($layout->type == 'add_instance' && isset($field_from_params[$fName.'_field_type']) 
        && $field_from_params[$fName.'_field_type'] == 'quantity' && $entityInstance->quantity != null){
    $value = $entityInstance->quantity;
}
$placeholder = isset($layout_params['fields'][$field->db_field_name."_placeholder"])?$layout_params['fields'][$field->db_field_name."_placeholder"]:'';
if($field_from_params[$fName.'_digits_points'] != 0){
    $step = str_pad(0, ($field_from_params[$fName.'_digits']+1),0);
    $step = substr_replace($step,'.',(strlen($step)-1-$field_from_params[$fName.'_digits_points']),1);
    $step = substr_replace($step,'1',-1);
}

if($field_from_params[$fName.'_digits_points'] != 0){
    $cut_string_len = -9 + $field_from_params[$fName.'_digits_points'];
    
    $value = substr($value, 0, $cut_string_len);
}
elseif(isset($field_from_params[$fName.'_field_type']) && $field_from_params[$fName.'_field_type'] != 'quantity') {
    $value = substr($value, 0, -10);
}

if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
$os_cck_configuration = JComponentHelper::getParams('com_os_cck');

if(isset($field_from_params[$fName.'_field_type']) && $field_from_params[$fName.'_field_type'] == 'price' && strlen($os_cck_configuration->get('paypal_currency',''))){
//if(isset($field_from_params[$fName.'_price_field']) && $field_from_params[$fName.'_price_field'] && strlen($os_cck_configuration->get('paypal_currency',''))){
    $paypal_currency = cck_getCurrency($os_cck_configuration);
    $currencyOpt = array();
    foreach ($paypal_currency as $carrencyArr) {
      $currencyOpt[] = JHTML::_('select.option', $carrencyArr['sign'], $carrencyArr['signAlias'], "value", "text");
    }
    $currency = (isset($entityInstance->instance_currency) && !empty($entityInstance->instance_currency))?$entityInstance->instance_currency : '';
    $currencySelect = JHTML::_('select.genericlist', $currencyOpt, "instance_currency", 'class="cck-currency ' . $layout_params['custom_class'] . '" ' . $offset_animation . ' style="width: auto !important;"', 'value', 'text', $currency);
    
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
      <input <?php echo $layout_params['field_styling']?> 
            class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> price_field" 
            <?php echo $offset_animation; ?> 
            type="number" 
            step="<?php echo $step?>" 
            min ="0"
            max="<?php echo $max?>"
            placeholder="<?php echo $placeholder?>"
            name="fi_<?php echo $field->db_field_name?>" 
            value="<?php echo $value?>"/>

      <?php
    }else{
        //after?>
        <input <?php echo $layout_params['field_styling']?> 
            class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?> price_field" 
            <?php echo $offset_animation; ?> 
            type="number"
            step="<?php echo $step?>"
            min ="0"
            max="<?php echo $max?>"
            placeholder="<?php echo $placeholder?>"
            name="fi_<?php echo $field->db_field_name?>"
            value="<?php echo $value?>"/>
        <?php
        if(!isset($show_currency)){
            echo $currencySelect;
            $show_currency = true;
        }
    } ?>
    <input type="hidden" name="price_fields[]" value="<?php echo $field->db_field_name?>">
    <?php
}else{ ?>
    <span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <input <?php echo $layout_params['field_styling']?> 
        class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?>" 
        <?php echo $offset_animation; ?> 
        type="number"
        step="<?php echo $step?>"
        min ="<?php echo $min; ?>"
        max="<?php echo $max?>"
        placeholder="<?php echo $placeholder?>"
        name="fi_<?php echo $field->db_field_name?>"
        value="<?php echo $value?>"/>
    <?php if(isset($field_from_params[$fName.'_field_type']) && $field_from_params[$fName.'_field_type'] == 'quantity'){ ?>
        <input type="hidden" name="quantity_fields[]" value="<?php echo $field->db_field_name?>">
    <?php }?>
    <?php
    }?></span>