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

if(isset($layout->type) && $layout->type == 'buy_request_instance'){
  echo '<input class="hidden-price" type="hidden" name="fi_'.$fName.'" value="'.$value[0]->data.'">';
}

if(isset($field_from_params[$fName.'_digits_points']) && $field_from_params[$fName.'_digits_points'] != 0){
    
    $cut_string_len = -9 + $field_from_params[$fName.'_digits_points'];
    
    $value[0]->data = substr($value[0]->data, 0, $cut_string_len);
}
 else {
    $value[0]->data = substr($value[0]->data, 0, -10);
}
if(isset($layout_params["fields"][$fName."_field_type"]) && $layout_params["fields"][$fName."_field_type"] == 'price' && strlen($os_cck_configuration->get('paypal_currency',''))){
  $paypal_currency = isset($layout_params['instance_currency'])?$layout_params['instance_currency']:'';
  
  $currencyArr = array();
  $currentCurrency;
  $currencys = explode(';', $os_cck_configuration->get('paypal_currency',''));
  foreach ($currencys as $oneCurency) {
    $oneCurrArr = explode('=', $oneCurency);
    if(!empty($oneCurrArr[0]) && !empty($oneCurrArr[1])){
     $currencyArr[$oneCurrArr[0]] = $oneCurrArr[1];
     if(isset($paypal_currency) && $paypal_currency == $oneCurrArr[0]){
       $currentCurrency = $oneCurrArr[1];
     }
   }
 }
 foreach ($currencyArr as $key=>$value2) {
  if (!isset($currentCurrency)) {

      $currencys_price[$key] = round($value2);

  } else {

      $currencys_price[$key] = round($value2 / $currentCurrency * $value[0]->data, $field_from_params[$fName.'_digits_points']);

  }
}
$val = array();
foreach ($currencys_price as $key => $value){
  if($os_cck_configuration->get('currency_position','0')){
    $val[] = $key.' '.$value;
    //$val .= (isset($value[0]->data))? $value[0]->data : '0';
  }else{
    $val[] = $value . ' '.$key;
    //$val.= ' '.$paypal_currency;
  }
}
         //var_dump($val);
  
}else{
  $val = (isset($value[0]->data))?$value[0]->data : '';
}

//var_dump($os_cck_configuration->get('paypal_currency',''));
        
?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php
  if ($val){
      if(isset($layout_params['fields'][$fName.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_prefix'])){
          echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_prefix'].'"></span>';
      }
      if(!empty($layout_params['fields'][$fName.'_prefix'])){
          echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
      }
      if(isset($layout_params['fields'][$fName.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_suffix'])){
          echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_suffix'].'"></span>';
      }

      if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
          $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
          $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
      }
      if(is_array($val)){
	      for($k = 0; $k < count($val); $k++){
                  if(($k + 1) <  count($val)){
                    echo $val[$k] . ',  ';
                  }else{
                      echo $val[$k];
                  }
	      }
  	  }else{
  	  	echo $val;
  	  }
          
    if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
    }

    if(!empty($layout_params['fields'][$fName.'_suffix'])){
        echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
    }
    if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
    }
  }?>
</span>