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

$empty_cart_text = (isset ($layout_params['views']['text_empty_cart'])) ? $layout_params['views']['text_empty_cart'] : '';
$full_cart_text = (isset ($layout_params['views']['text_full_cart'])) ? $layout_params['views']['text_full_cart'] : '';

$empty_cart_img_type = (isset($layout_params['views']['empty_cart_img_type'])) ? $layout_params['views']['empty_cart_img_type'] : 'img';
$full_cart_img_type = (isset($layout_params['views']['full_cart_img_type'])) ? $layout_params['views']['full_cart_img_type'] : 'img';

$empty_cart_img = (isset($layout_params['views']['empty_cart_img'])) ? $layout_params['views']['empty_cart_img'] : '';
$full_cart_img = (isset($layout_params['views']['full_cart_img'])) ? $layout_params['views']['full_cart_img'] : '';

$icon_empty_cart = (isset($layout_params['views']['add_icon_empty_cart'])) ? $layout_params['views']['add_icon_empty_cart'] : '';
$icon_full_cart = (isset($layout_params['views']['add_icon_full_cart'])) ? $layout_params['views']['add_icon_full_cart'] : '';

$add_effect = (isset($layout_params['views']['add_effect'])) ? $layout_params['views']['add_effect'] : '';
$itemId = $params->get('ItemId', '');

if($empty_cart_img_type == 'img'){
    $empty_cart_img_value = $empty_cart_img;
}else{
    $empty_cart_img_value = $icon_empty_cart;
}

if($full_cart_img_type == 'img'){
    $full_cart_img_value = $full_cart_img;
}else{
    $full_cart_img_value = $icon_full_cart;
}
$cart_link = JRoute::_('index.php?option=com_os_cck&amp;view=cart&amp;lid='.$layout->lid.'&amp;Itemid='.$itemId);

$field = new stdClass();
$field->db_field_name = 'form-'.$layout->lid;
$form_styling = get_field_styles($field, $layout);
$form_custom_class = get_field_custom_class($field, $layout);
$form_offset_animation = get_field_offset_animation($field, $layout);
$form_hover_animation = get_field_hover_animation($field, $layout);
?>
<div class="cck-body" <?php echo $form_hover_animation; ?>>
    
    <div class="small_cart <?php echo $form_custom_class;?>" <?php echo $form_offset_animation; ?> <?php echo $form_styling; ?> change_effect="<?php echo $add_effect; ?>" full_text="<?php echo $full_cart_text; ?>" 
         empty_text="<?php echo $empty_cart_text; ?>" img_empty="<?php echo $empty_cart_img_type . ' ' . $empty_cart_img_value;?>" 
         img_full="<?php echo $full_cart_img_type . ' ' . $full_cart_img_value;?>">
        <a href="<?php echo $cart_link; ?>" style="display:block;">
            <div class="text_cart">
                <?php if(empty($cart)){
                    echo $empty_cart_text;
                }else{
                    echo $full_cart_text;
                }?>
            </div>
            <div class="img_and_count">
                <div class="small_cart_img" >
                    <?php 
                    if(empty($cart)){
                       if($empty_cart_img_type == 'img' && $empty_cart_img != ''){
                           echo '<img src="'.JURI::root().'/images/stories/'.$empty_cart_img.'">';
                       }elseif($empty_cart_img_type == 'icon' && $icon_empty_cart != ''){
                           echo '<span class="fa '.$icon_empty_cart.'"></span>';
                       }else{
                           echo '<span class="fa fa-shopping-basket"></span>';
                       }
                    }else{
                       if($full_cart_img_type == 'img' && $full_cart_img != ''){
                           echo '<img src="'.JURI::root().'/images/stories/'.$full_cart_img.'">';
                       }elseif($full_cart_img_type == 'icon' && $icon_full_cart != ''){
                           echo '<span class="fa '.$icon_full_cart.'"></span>';
                       } else{
                           echo '<span class="fa fa-shopping-bag"></span>';
                       }
                    }?>
                </div>
                <div class="small_cart_count" ><div><?php echo $count; ?></div></div>
            </div>
        </a>
    </div>
    
</div>
<script type="text/javascript">
    cart_count = '<?php echo count($cart);?>';
</script>