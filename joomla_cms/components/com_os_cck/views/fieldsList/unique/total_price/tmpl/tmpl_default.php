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

//$val_calc_price = ($price_fields != '') ? $price_fields : '';


if(isset($layout_params['fields'][$fName.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_prefix'])){
    echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_prefix'].'"></span>';
}
if(!empty($layout_params['fields'][$fName.'_prefix'])){
  echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
}
if(isset($layout_params['fields'][$fName.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_suffix'])){
    echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_suffix'].'"></span>';
}
    ?>
<span   

<?php if(isset($layout_params['fields']['description_'.$fName]) 
            && $layout_params['fields']['description_'.$fName]=='on' 
            && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
    rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
        <?php } ?> >
    <span id="buy_requesr_calculated_price"></span>
</span>

<?php 
if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
    echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
}
if(!empty($layout_params['fields'][$fName.'_suffix'])){
  echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
}
if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
    echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
}
?>
<script type="text/javascript">
    
    
    jQuerOs(document).ready(function(){
        getBuyRentRequestCalculatedPrice('<?php echo $layout->type; ?>');
    });
    
    jQuerOs('.tracked').on('change', function(){
        
        setTimeout(function() {
            getBuyRentRequestCalculatedPrice('<?php echo $layout->type; ?>');
        },300);
    })
</script>