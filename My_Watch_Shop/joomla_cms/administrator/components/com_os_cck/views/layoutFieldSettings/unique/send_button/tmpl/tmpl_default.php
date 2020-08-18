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
//var_dump($layout);
$buttonText = isset($layout_params["views"]["layout_button_text"])?$layout_params["views"]["layout_button_text"]:'';
$field_php_show = (isset($fields_from_params[$fName.'_php_show'])) ? $fields_from_params[$fName.'_php_show'] : '';
if($fName == 'cck_add_to_cart_button'){
    $onclick_event = (isset($fields_from_params[$fName.'_onclick_event'])) ? $fields_from_params[$fName.'_onclick_event'] : 0;
    
    $onclick_event_opt = array();
    $onclick_event_opt[] = JHTML::_('select.option','0','Stay on the page');
    $onclick_event_opt[] = JHTML::_('select.option','1','Go to the cart');
    
    $add_effect = (isset($fields_from_params[$fName.'_add_effect'])) ? $fields_from_params[$fName.'_add_effect'] : '';
    
    $animated_opt = get_animated_opt();
    
    $cart_layout = (isset($fields_from_params[$fName.'_cart_layout'])) ? $fields_from_params[$fName.'_cart_layout'] : '';
    
    $cart_layouts_opt = array();
    foreach ($layout->cart_layout_list as $cart_layout){
        $cart_layouts_opt[] = JHTML::_('select.option',$cart_layout->lid,$cart_layout->title);
    }
    
}
if($layout->type == 'buy_request_instance' || $layout->type == 'rent_request_instance'){
    $fld_required_login = (isset($layout_params['fields']['reqiredLogin_'.$fName])) ? 'checked="true"' : '';
    $fld_login_url = (isset($fields_from_params[$fName.'_login_url'])) ? $fields_from_params[$fName.'_login_url'] : '';
}
?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <label><?php echo JText::_('COM_OS_CCK_LAYOUT_BUTTON_TEXT')?></label>
        <input type="text" value="<?php echo $buttonText?>" placeholder="Type form button text...." name="vi_layout_button_text">
    </div>
    <?php if($fName == 'cck_add_to_cart_button'){ ?>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_ONCLICK_EVENT")?> </label>
            <?php echo JHTML::_('select.genericlist', $onclick_event_opt,  'fi_'. $fName .'_onclick_event', '','value', 'text',$onclick_event)?>
        </div>
        <div id="cart_layout_wrap">
            <label><?php echo JText::_('COM_OS_CCK_LABEL_CART_LAYOUT')?></label>
            <?php echo JHTML::_('select.genericlist', $cart_layouts_opt,  'fi_'. $fName .'_cart_layout', 'style="width:160px;"','value', 'text',$cart_layout->lid)?>
        </div>
        
    
    <script type="text/javascript">
        function show_hide_onckick_events_opt(){
            var name = '<?php echo $fName; ?>';
            var onclick_event_val = jQuerOs('#fi_'+name+'_onclick_event').val();
            
            if(onclick_event_val == 0){
                jQuerOs('#add_effect_wrap').show();
                jQuerOs('#cart_layout_wrap').hide();
            }else{
                jQuerOs('#add_effect_wrap').hide();
                jQuerOs('#cart_layout_wrap').show();
            }
        }
        
        jQuerOs('#fi_'+'<?php echo $fName; ?>'+'_onclick_event').on('click', function(){
            show_hide_onckick_events_opt();
        })
        show_hide_onckick_events_opt();
    </script>
    <?php }
    if($layout->type == 'buy_request_instance' || $layout->type == 'rent_request_instance'){ ?>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_REQIRED_LOGIN")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_REQIRED_LOGIN_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
            <input type="checkbox" data-field-name="<?php echo $fName?>" id="reqiredLogin" name="fi_reqiredLogin_<?php echo $fName?>" <?php echo $fld_required_login;?>>
        </div>
        <div class="login_url_wrap">
            <label><?php echo JText::_("COM_OS_CCK_LABEL_LOGIN_URL")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_LOGIN_URL_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
            <input type="text" value="<?php echo $fld_login_url;?>" placeholder="Url for redirect" name="fi_<?php echo $fName; ?>_login_url">
        </div>
    
    <script>
        jQuerOs('#reqiredLogin').on('click', function(){
            showHideReqiredLoginOptions();
        })
        
        function showHideReqiredLoginOptions(){
            if(jQuerOs('#reqiredLogin:checked').length > 0){
                jQuerOs('.login_url_wrap').show();
            }else{
                jQuerOs('.login_url_wrap').hide();
            }
        }
        showHideReqiredLoginOptions();
    </script>
    <?php }?>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="fi_<?php echo $fName?>_php_show"><?php echo $field_php_show?></textarea>
    </div>
</div>
