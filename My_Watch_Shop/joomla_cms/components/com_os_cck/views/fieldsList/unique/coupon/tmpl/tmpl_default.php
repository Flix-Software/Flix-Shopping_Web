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

$apply_button_type = (isset($layout_params['fields']['apply_button_type_'.$fName])) ? $layout_params['fields']['apply_button_type_'.$fName] : "button";
$apply_button_text = (isset($layout_params['fields'][$fName.'_apply_button_text']) && $layout_params['fields'][$fName.'_apply_button_text'] != '') ? $layout_params['fields'][$fName.'_apply_button_text'] : 'Apply coupon';
$icon_apply_coupon = (isset($layout_params['fields'][$fName.'_add_icon_apply_coupon'])) ? $layout_params['fields'][$fName.'_add_icon_apply_coupon'] : '';


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
    <input type="text" id="os_cck_coupon" value="">
    <?php if($apply_button_type == 'button'){ ?>
        <a class="btn btn-default" onclick="javascript:apply_coupon();"><?php echo $apply_button_text; ?></a>
    <?php }elseif($apply_button_type == 'icon'){ ?>
        <a class="fa <?php echo $icon_apply_coupon; ?>" onclick="javascript:apply_coupon();"></a>
    <?php } ?>
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
    function apply_coupon(){
      var coupon = jQuerOs('#os_cck_coupon').val();
      apply_coupon_value = 0;
      
      if(coupon != ''){
          jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "ajaxCheckCoupon",
                coupon: coupon,
            },
            success: function(data){ 
                if(data.success){
                    
                    var coup_id = data.coup_id;
                    jQuerOs('#os_cck_coupon').attr('coup_id', coup_id)
                    jQuerOs('#coupon_id').val(coup_id)
                    var prices = jQuerOs('.hidden_cart_price');
                    
                    
                    for(var index=0; index < prices.length && apply_coupon_value == 0; ++index){
                        
                        var price = JSON.parse(jQuerOs(prices[index]).val());
                        price.coupon = coup_id;
                        jQuerOs(prices[index]).val(JSON.stringify(price));
                        var eiid = jQuerOs(prices[index]).attr('eiid');
                        var key = jQuerOs(prices[index]).attr('key');
                        apply_coupon_val = changeProductQuantity(key, price, eiid, false, data.coupon_type);
                        if(apply_coupon_val){
                            apply_coupon_value = 1
                        }
                    
                    }
                    setTimeout(function(){
                        get_total_price('<?php echo $os_cck_configuration->get("currency_position", "0"); ?>', '<?php echo getProductCurrency(); ?>');
                    }, 600);
                    getBuyRentRequestCalculatedPrice('<?php echo $layout->type; ?>');
                    
                }else{
                    jQuerOs('#os_cck_coupon').css('border-color', 'red');
                    alert(data.error_text);
                }
            }
          });
          
      }
        
        
    }
</script>