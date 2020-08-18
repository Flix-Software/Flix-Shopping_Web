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

$fld_published = (isset($fields_from_params[$fName.'_published']) && $fields_from_params[$fName.'_published'] == 1) ? 'checked="true"' : '';
$fld_published = (!isset($fields_from_params[$fName.'_published'])) ? 'checked="true"' : $fld_published;

$months_selected = (isset($fields_from_params['months_'.$fName])) ? $fields_from_params['months_'.$fName] : array('current');
$fld_show_month_year = (isset($fields_from_params[$fName.'_show_month_year']) && $fields_from_params[$fName.'_show_month_year'] == 1) ? 'checked="true"' : '';
$fld_show_month_year = (!isset($fields_from_params[$fName.'_show_month_year'])) ? 'checked="true"' : $fld_show_month_year;

$fld_show_nav_butt = (isset($fields_from_params[$fName.'_show_nav_butt']) && $fields_from_params[$fName.'_show_nav_butt'] == 1) ? 'checked="true"' : '';
$fld_show_nav_butt = (!isset($fields_from_params[$fName.'_show_nav_butt'])) ? 'checked="true"' : $fld_show_nav_butt;
$fld_show_day_details = (!isset($fields_from_params[$fName.'_show_day_details'])) ? 'checked="true"' : '';

$field_initial_year = (isset($fields_from_params[$fName.'_initial_year'])) ? $fields_from_params[$fName.'_initial_year'] : date('Y');
$field_final_year = (isset($fields_from_params[$fName.'_final_year'])) ? $fields_from_params[$fName.'_final_year'] : date('Y')+1;


$label_tag_selected = (isset($fields_from_params['label_tag_'.$fName])) ? $fields_from_params['label_tag_'.$fName] : "div";
$tags = array();
$tags[]  = JHTML::_('select.option','span','span');
$tags[]  = JHTML::_('select.option','div','div');
$tags[]  = JHTML::_('select.option','h1','h1');
$tags[]  = JHTML::_('select.option','h2','h2');
$tags[]  = JHTML::_('select.option','h3','h3');
$tags[]  = JHTML::_('select.option','h4','h4');
$tags[]  = JHTML::_('select.option','h5','h5');
$tags[]  = JHTML::_('select.option','label','label');

$label_tags = array();
$label_tags[]  = JHTML::_('select.option','span','span');
$label_tags[]  = JHTML::_('select.option','div','div');

$field_php_show = (isset($fields_from_params[$fName.'_php_show'])) ? $fields_from_params[$fName.'_php_show'] : '';

$gtree = get_group_children_tree_cck($layout->type);
$access_selected = (isset($fields_from_params['access_'.$fName])) ? $fields_from_params['access_'.$fName] : '1';

$months = array();
    $months[]  = JHTML::_('select.option','last','last');
    $months[]  = JHTML::_('select.option','current','current');
    $months[]  = JHTML::_('select.option','next1','next1');
    $months[]  = JHTML::_('select.option','next2','next2');
?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" 
        <?php echo $fld_published?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" 
        <?php echo $fld_published?> value="1">
    </div>
    
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_LABEL_SHELL")?></label>
        <?php echo JHTML::_('select.genericlist',$label_tags, 'fi_label_tag_'. $fName,
                            'size="1" class="inputbox" ', 'value', 'text', $label_tag_selected);?>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_MONTH_LIST")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_SHOW_MONTH_LIST_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <?php echo JHTML::_('select.genericlist', $months, 'fi_months_' . $fName. '[]', 'multiple="true"','value', 'text',$months_selected)?>
    </div>
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_show_month_year" 
        <?php echo $fld_show_month_year?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_MONTH_YEAR_SELECTOR")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_show_month_year" 
        <?php echo $fld_show_month_year; ?> value="1">
    </div>
    <br>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_INITIAL_YEAR")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_initial_year"  value="<?php echo $field_initial_year; ?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FINAL_YEAR")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_final_year"  value="<?php echo $field_final_year; ?>" >
    </div>
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_show_nav_butt" 
        <?php echo $fld_show_nav_butt; ?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_NAV_BUTT")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_show_nav_butt" 
        <?php echo $fld_show_nav_butt; ?> value="1">
    </div>
    <br>
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_show_day_details" 
        <?php echo $fld_show_day_details; ?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DAY_DETAILS")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DAY_DETAILS_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_show_day_details" 
        <?php echo $fld_show_day_details; ?> value="1">
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="fi_<?php echo $fName?>_php_show"><?php echo $field_php_show?></textarea>
    </div>
    <?php if($cck_entity_configuration[$layout->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_ACCESS")?></label>
        <?php echo JHTML::_('select.genericlist', $gtree, 'fi_access_' . $fName. '[]', 'multiple="true"','value', 'text',$access_selected)?>
    </div>
    <?php } ?>
</div>
