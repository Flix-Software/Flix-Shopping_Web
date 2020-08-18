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
$gtree = get_group_children_tree_cck();
$show_type_selected = (isset($layout_params['views']['show_type_request_layout'][$key][0]))?
                    $layout_params['views']['show_type_request_layout'][$key][0] : '1';
$button_name = (isset($layout_params['views']['show_request_layout_button_name'][$key]))?
                    $layout_params['views']['show_request_layout_button_name'][$key][0] : '';
$access_selected = (isset($layout_params['views']['show_request_layout'][$key]))?
                    $layout_params['views']['show_request_layout'][$key][0] : '1';
$fld_name_show = '';
if(isset($layout_params['views']['show_request_layout_name'][$key][0])){
    $fld_name_show = ' checked="true" ';
}
$fld_alias = (isset($layout_params['views']['show_request_layout_alias'][$key])) ? $layout_params['views']['show_request_layout_alias'][$key][0] : '';
$type_show = array();
$type_show[]  = JHTML::_('select.option','1','Form');
$type_show[]  = JHTML::_('select.option','2','Button with dropdown form');
$type_show[]  = JHTML::_('select.option','3','Button with redirect');
$field_php_show = (isset($layout_params['views']['request_layout_php_show'][$key][0])) ? $layout_params['views']['request_layout_php_show'][$key][0] : '';
?>
<div id="options-field-<?php echo $key?>">
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_BUTTON_NAME")?></label>
        <input type="text" name="vi_show_request_layout_button_name[<?php echo $key ?>][]" value="<?php echo $button_name?>">
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label>
        <input type="checkbox" data-field-name="<?php echo $key?>" name="vi_show_request_layout_name[<?php echo $key ?>][]" <?php echo $fld_name_show?>>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_ALIAS")?></label>
        <input type="text" size="4" name="vi_show_request_layout_alias[<?php echo $key ?>][]"  value="<?php echo $fld_alias?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="vi_request_layout_php_show[<?php echo $key ?>][]"><?php echo $field_php_show?></textarea>
    </div>
    <?php if($cck_entity_configuration[$layout->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label>Show to:</label>
        <?php echo JHTML::_('select.genericlist', $gtree, "vi_show_request_layout[".$key."][]", 'multiple="true"','value', 'text',$access_selected)?>
    </div>
    <?php }else{ ?>
        <input type="hidden" name="vi_show_request_layout[<?php echo $key; ?>][]" value="">
    <?php } ?>
    <div>
        <label>Show type</label>
        <?php echo JHTML::_('select.genericlist', $type_show, "vi_show_type_request_layout[".$key."][]", '','value', 'text',$show_type_selected)?>
    </div>
</div>