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

$ordering_calculate = $layout_params['fields'][$fName.'_calculation_order'];

?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php
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
    
        //echo 'NEW PRICE';
        ?>
    <div id="<?php echo $fName; ?>" class="calculated_price_value" ordering_calculate="<?php echo $ordering_calculate;?>">
        
    </div>
    <?php
    if(isset($field_from_params[$fName.'_add_icon_suffix_prefix']) && !empty($field_from_params[$fName.'_add_icon_suffix_prefix'])){
        echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_prefix'].'"></span>';
    }
    if(!empty($layout_params['fields'][$fName.'_suffix'])){
      echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
    }
    if(isset($field_from_params[$fName.'_add_icon_suffix_suffix']) && !empty($field_from_params[$fName.'_add_icon_suffix_suffix'])){
        echo '<span class="fa '.$field_from_params[$fName.'_add_icon_suffix_suffix'].'"></span>';
    }
  ?>
</span>
<script type="text/javascript">
    var eiid = '<?php echo $entityInstance->eiid; ?>';
    jQuerOs(window).on('load',function($) {
        calculated_price(eiid);
    })
    
    
</script>