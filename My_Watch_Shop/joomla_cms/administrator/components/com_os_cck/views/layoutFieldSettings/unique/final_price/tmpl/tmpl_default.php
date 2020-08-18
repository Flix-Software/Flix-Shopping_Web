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

$fld_alias = (isset($fields_from_params[$fName.'_alias'])) ? $fields_from_params[$fName.'_alias'] : $fName;
$description_show = (isset($fields_from_params['description_'.$fName])) ? 'checked="true"' : '';
$field_tooltip = (isset($fields_from_params[$fName.'_tooltip'])) ? $fields_from_params[$fName.'_tooltip'] : '';
$field_prefix = (isset($fields_from_params[$fName.'_prefix'])) ? $fields_from_params[$fName.'_prefix'] : '';
$field_suffix = (isset($fields_from_params[$fName.'_suffix'])) ? $fields_from_params[$fName.'_suffix'] : '';

$icon_alias_prefix = (isset($fields_from_params[$fName.'_add_icon_alias_prefix'])) ? $fields_from_params[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($fields_from_params[$fName.'_add_icon_alias_suffix'])) ? $fields_from_params[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($fields_from_params[$fName.'_add_icon_prefix_prefix'])) ? $fields_from_params[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($fields_from_params[$fName.'_add_icon_prefix_suffix'])) ? $fields_from_params[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($fields_from_params[$fName.'_add_icon_suffix_prefix'])) ? $fields_from_params[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($fields_from_params[$fName.'_add_icon_suffix_suffix'])) ? $fields_from_params[$fName.'_add_icon_suffix_suffix'] : '';

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

$field_php_show = (isset($fields_from_params[$fName.'_php_show'])) ? $fields_from_params[$fName.'_php_show'] : '';

$gtree = get_group_children_tree_cck();
$access_selected = (isset($fields_from_params['access_'.$fName])) ? $fields_from_params['access_'.$fName] : '1';

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
        <?php echo JHTML::_('select.genericlist',$tags, 'fi_label_tag_'. $fName,
                            'size="1" class="inputbox" ', 'value', 'text', $label_tag_selected);?>
    </div>
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_showName_<?php echo $fName?>" 
        <?php echo $fld_name_show?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_showName_<?php echo $fName?>" <?php echo $fld_name_show?>>
    </div>

    <div class="label_alias_wrap">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_ALIAS")?></label>
        <div class="fa <?php echo $icon_alias_prefix; ?> add_font_awesom" id="<?php echo $fName;?>_add_icon_alias_prefix" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($icon_alias_prefix == '') ? '&#10000;' : ''; ?></div>
        <input type="hidden" name="fi_<?php echo $fName; ?>_add_icon_alias_prefix" value="<?php echo $icon_alias_prefix; ?>">
        <input type="text" size="4" style="float: right;" name="fi_<?php echo $fName?>_alias"  value="<?php echo $fld_alias?>" >
        <div class="fa <?php echo $icon_alias_suffix; ?> add_font_awesom" id="<?php echo $fName;?>_add_icon_alias_suffix" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($icon_alias_suffix == '') ? '&#10000;' : ''; ?></div>
        <input type="hidden" name="fi_<?php echo $fName; ?>_add_icon_alias_suffix" value="<?php echo $icon_alias_suffix; ?>">
    </div>

    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DESCRIPTION")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_description_<?php echo $fName?>" <?php echo $description_show?>>
    </div>

    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_TOOLTIP")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_tooltip"  value="<?php echo $field_tooltip?>" >
    </div>
    <div class="prefix_wrap">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PREFIX")?></label>
        <div class="fa <?php echo $icon_prefix_prefix; ?> add_font_awesom" id="<?php echo $fName;?>_add_icon_prefix_prefix" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($icon_prefix_prefix == '') ? '&#10000;' : ''; ?></div>
        <input type="hidden" name="fi_<?php echo $fName; ?>_add_icon_prefix_prefix" value="<?php echo $icon_prefix_prefix; ?>">
        <input type="text" size="4" name="fi_<?php echo $fName?>_prefix"  value="<?php echo $field_prefix?>" >
        <div class="fa <?php echo $icon_prefix_suffix; ?> add_font_awesom" id="<?php echo $fName;?>_add_icon_prefix_suffix" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($icon_prefix_suffix == '') ? '&#10000;' : ''; ?></div>
        <input type="hidden" name="fi_<?php echo $fName; ?>_add_icon_prefix_suffix" value="<?php echo $icon_prefix_suffix; ?>">
    </div>
    <div class="suffix_wrap">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SUFFIX")?></label>
        <div class="fa <?php echo $icon_suffix_prefix; ?> add_font_awesom" id="<?php echo $fName;?>_add_icon_suffix_prefix" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($icon_suffix_prefix == '') ? '&#10000;' : ''; ?></div>
        <input type="hidden" name="fi_<?php echo $fName; ?>_add_icon_suffix_prefix" value="<?php echo $icon_suffix_prefix; ?>">
        <input type="text" size="4" name="fi_<?php echo $fName?>_suffix"  value="<?php echo $field_suffix?>" >
        <div class="fa <?php echo $icon_suffix_suffix; ?> add_font_awesom" id="<?php echo $fName;?>_add_icon_suffix_suffix" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($icon_suffix_suffix == '') ? '&#10000;' : ''; ?></div>
        <input type="hidden" name="fi_<?php echo $fName; ?>_add_icon_suffix_suffix" value="<?php echo $icon_suffix_suffix; ?>">
    </div>
    <input name="<?php echo $fName; ?>" type="hidden" value="{}">
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
