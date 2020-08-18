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
$buttonText = isset($fields_from_params[$fName."_button_text"])?$fields_from_params[$fName."_button_text"]:'';
$field_php_show = (isset($fields_from_params[$fName.'_php_show'])) ? $fields_from_params[$fName.'_php_show'] : '';
$redirect = (isset($fields_from_params['redirect_'.$fName])) ? $fields_from_params['redirect_'.$fName] : 'return';
$redirect_link = (isset($fields_from_params['redirect_link_'.$fName])) ? $fields_from_params['redirect_link_'.$fName] : '';

$style = '';
if($redirect == 'return'){
    $style = 'style="display: none;"';
}

$redirect_opt = array();
$redirect_opt[]  = JHTML::_('select.option','return','Return to previous page');
$redirect_opt[]  = JHTML::_('select.option','link','Custom link');

?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <label><?php echo JText::_('COM_OS_CCK_LAYOUT_BUTTON_TEXT')?></label>
        <input type="text" value="<?php echo $buttonText?>" placeholder="Type form button text...." name="fi_<?php echo $fName; ?>_button_text">
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_REDIRECT_TYPE")?></label>
        <?php echo JHTML::_('select.genericlist',$redirect_opt, 'fi_redirect_'.$fName,
                    'size="1" class="inputbox" style="width: 53%;"', 'value', 'text', $redirect);?>
    </div>
    <div <?php echo $style; ?> class="redirect_link">
        <label><?php echo JText::_('COM_OS_CCK_LABEL_REDIRECT_LINK')?></label>
        <input type="text" value="<?php echo $redirect_link?>" name="fi_redirect_link_<?php echo $fName; ?>">
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="fi_<?php echo $fName?>_php_show"><?php echo $field_php_show?></textarea>
    </div>
</div>

<script type="text/javascript">
    function hide_redirect_link(){
        var name = '<?php echo $fName; ?>';
        var redirect_type = jQuerOs('#fi_redirect_'+name).val();
        if(redirect_type == 'return'){
            jQuerOs('.redirect_link').hide();
        }else{
            jQuerOs('.redirect_link').show();
        }
    }
    
    jQuerOs('#fi_redirect_'+'<?php echo $fName; ?>').on('change', function(){
        hide_redirect_link();
    })
</script>
