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
//var_dump($_REQUEST); exit;
$fName = $field->db_field_name;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}
//var_dump($icon_alias_prefix);

if($value == '' || empty($value)){
    $value = array();
    $value[0] = new stdClass;
    $value[0]->price_value = '';
    $value[0]->quantity = '';
    $value[0]->price_name = '';
    $value[0]->price_type = '';
}elseif(is_object($value)){
    $temp_value = $value;
    $value = array();
    $value[] = $temp_value;
}
//var_dump($value);
if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'edit_buy_request_instance'){
    $sign = '';
    if($value[0]->price_type == 'val+' || $value[0]->price_type == 'percent+'){
        $sign = '+';
    }elseif($value[0]->price_type == 'val-' || $value[0]->price_type == 'percent-'){
        $sign = '-';
    }
    if($value[0]->price_type == 'base_price' || $value[0]->price_type == 'val+' || $value[0]->price_type == 'val-'){
        echo '<div class="pricefield_number_value">'.$sign.calculatedCurrency($entityInstance, $value[0]->price_value)[0].'</div>';
    }elseif($value[0]->price_type == 'percent+' || $value[0]->price_type == 'percent-'){
        echo '<div class="pricefield_number_value">'.$sign.$value[0]->price_value.'</div>';
    }
    
}else{

$calculation_order = (isset($field_from_params[$fName.'_calculation_order']) ? $field_from_params[$fName.'_calculation_order'] : 0);
$calculated = (isset($field_from_params['not_calculated_' . $fName]) && $field_from_params['not_calculated_' . $fName] == 'on') ? 0 : 1;
if(isset($layout->type) && $layout->type == 'instance'){
  echo '<input class="hidden-price" type="hidden" eiid="' . $entityInstance->eiid . '" fid="' . $field->fid . '" calculated="'.$calculated.'" lid="' . $layout->lid . '" name="fi_'.$fName.'_hidden" value="'.$value[0]->price_id.'">';
}

if(isset($field_from_params[$fName.'_digits_points']) && $field_from_params[$fName.'_digits_points'] != 0){
    $point_pos = stripos($value[0]->price_value, '.')+1;
    $digits_after_points = strlen(substr($value[0]->price_value, $point_pos));
    if($digits_after_points > $field_from_params[$fName.'_digits_points']){
        $cut_string_len = $point_pos + $field_from_params[$fName.'_digits_points'];
        $value[0]->price_value = substr($value[0]->price_value, 0, $cut_string_len);
    }
}else{
    $value[0]->price_value = substr($value[0]->price_value, 0, -3);
}


if(stripos($layout_params['fields'][$field->db_field_name . '_price_type'], 'percent') !== FALSE){
    $val = $value[0]->price_value;
}else{     
    $val = calculatedCurrency($entityInstance, $value[0]->price_value);
}

?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php
  if ($val){
      if(isset($field_from_params[$fName.'_add_icon_prefix_prefix']) && !empty($field_from_params[$fName.'_add_icon_prefix_prefix'])){
          echo '<span class="fa '.$field_from_params[$fName.'_add_icon_prefix_prefix'].'"></span>';
      }
      if(!empty($layout_params['fields'][$fName.'_prefix'])){
          echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
      }
      if(isset($field_from_params[$fName.'_add_icon_prefix_suffix']) && !empty($field_from_params[$fName.'_add_icon_prefix_suffix'])){
          echo '<span class="fa '.$field_from_params[$fName.'_add_icon_prefix_suffix'].'"></span>';
      }

      if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
          $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
          $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
      }
      if(is_array($val)){
//	      for($k = 0; $k < count($val); $k++){
//                  if(($k + 1) <  count($val)){
                    echo $val[0];
//                  }else{
//                      echo $val[$k];
//                  }
	      //}
  	  }else{
  	  	echo $val;
  	  }
    if(isset($field_from_params[$fName.'_add_icon_suffix_prefix']) && !empty($field_from_params[$fName.'_add_icon_suffix_prefix'])){
        echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_prefix'].'"></span>';
    }
    if(!empty($layout_params['fields'][$fName.'_suffix'])){
        echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
    }
    if(isset($field_from_params[$fName.'_add_icon_suffix_suffix']) && !empty($field_from_params[$fName.'_add_icon_suffix_suffix'])){
        echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_suffix'].'"></span>';
    }
  }?>
</span>
<?php if(isset($layout_params['fields']['show_quantity_'.$field->db_field_name]) &&
          $layout_params['fields']['show_quantity_'.$field->db_field_name] == 'on'){
    ?>

    <div>
        <?php 
        if(!empty($layout_params['fields'][$fName.'_quantity_prefix'])){
            echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_quantity_prefix'].'</span>';
        }
        echo $value[0]->quantity; 
        if(!empty($layout_params['fields'][$fName.'_quantity_suffix'])){
            echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_quantity_suffix'].'</span>';
        }?>
    </div>
<?php } ?>

<?php if(isset($layout_params['fields']['show_quantity_input_'.$field->db_field_name]) &&
          $layout_params['fields']['show_quantity_input_'.$field->db_field_name] == 'on'){ ?>
    <input type="number" id="<?php echo $fName; ?>_quantity_input" class="quantity_input" fid="<?php echo $field->fid; ?>" max="<?php echo $value[0]->quantity; ?>" min="1" value="1">
<?php }else{ ?>
    <input type="hidden" id="<?php echo $fName; ?>_quantity_input" class="quantity_input" fid="<?php echo $field->fid; ?>" max="<?php echo $value[0]->quantity; ?>" min="1" value="1">
<?php }

}?>
<script type="text/javascript">
    jQuerOs('#<?php echo $fName; ?>_quantity_input').on('change', function(){
       calculated_price('<?php echo $entityInstance->eiid;?>'); 
    });
</script>
