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

$description_show = (isset($lParams['description_'.$fName])) ? 'checked="true"' : '';
$field_prefix = (isset($lParams[$fName.'_prefix'])) ? $lParams[$fName.'_prefix'] : '';
$field_suffix = (isset($lParams[$fName.'_suffix'])) ? $lParams[$fName.'_suffix'] : '';
$fld_name_show = (isset($lParams['showName_'.$fName])) ? 'checked="true"' : '';
$fld_alias = (isset($lParams[$fName.'_alias'])) ? $lParams[$fName.'_alias'] : $field->field_name;
$field_tooltip = (isset($lParams[$fName.'_tooltip'])) ? $lParams[$fName.'_tooltip'] : '';
$access_selected = (isset($lParams['access_'.$fName])) ? $lParams['access_'.$fName] : '1';
$fld_require = (isset($lParams[$fName.'_required'])) ? 'checked="true"' : '';
$field_php_show = (isset($lParams[$fName.'_php_show'])) ? $lParams[$fName.'_php_show'] : '';
$show_count = (isset($lParams[$fName.'_show_count'])) ? $lParams[$fName.'_show_count'] : '0';
$max_lenght = (isset($lParams[$fName.'_max_lenght'])) ? $lParams[$fName.'_max_lenght'] : '250';

if(isset($lParams[$fName.'_nofirst']) && $lParams[$fName.'_nofirst'] == 'nofirst'){
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : '';
}else{
    $fld_published = (isset($field->published)) ? 'checked="true"' : '';
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;
}

$label_tag_selected = (isset($lParams['label_tag_'.$fName])) ? $lParams['label_tag_'.$fName] : "span";
$field_tag_selected = (isset($lParams['field_tag_'.$fName])) ? $lParams['field_tag_'.$fName] : "span";

$icon_alias_prefix = (isset($lParams[$fName.'_add_icon_alias_prefix'])) ? $lParams[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($lParams[$fName.'_add_icon_alias_suffix'])) ? $lParams[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($lParams[$fName.'_add_icon_prefix_prefix'])) ? $lParams[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($lParams[$fName.'_add_icon_prefix_suffix'])) ? $lParams[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($lParams[$fName.'_add_icon_suffix_prefix'])) ? $lParams[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($lParams[$fName.'_add_icon_suffix_suffix'])) ? $lParams[$fName.'_add_icon_suffix_suffix'] : '';

$label_tags = array();
$label_tags[]  = JHTML::_('select.option','span','span');
$label_tags[]  = JHTML::_('select.option','div','div');
$label_tags[]  = JHTML::_('select.option','h1','h1');
$label_tags[]  = JHTML::_('select.option','h2','h2');
$label_tags[]  = JHTML::_('select.option','h3','h3');
$label_tags[]  = JHTML::_('select.option','h4','h4');
$label_tags[]  = JHTML::_('select.option','h5','h5');
$label_tags[]  = JHTML::_('select.option','label','label');

$tags = array();
$tags[]  = JHTML::_('select.option','span','span');
$tags[]  = JHTML::_('select.option','div','div');
$tags[]  = JHTML::_('select.option','h1','h1');
$tags[]  = JHTML::_('select.option','h2','h2');
$tags[]  = JHTML::_('select.option','h3','h3');
$tags[]  = JHTML::_('select.option','h4','h4');
$tags[]  = JHTML::_('select.option','h5','h5');
$tags[]  = JHTML::_('select.option','label','label');
?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" <?php echo $fld_published?>>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_nofirst" value="nofirst">
    </div>
    <div>
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
<!--     <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_CATEGORIES_SHOW_COUNT")?>
            <i title="<?php echo JText::_("COM_OS_CCK_LAYOUT_INSTANCE_LIMIT_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i>
        </label>
        <input type="number" min="0" size="4" name="fi_<?php echo $fName?>_show_count"  value="<?php echo $show_count?>" >
    </div>
    <span class="clearfix"></span>  
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_MAXLENGTH")?></label>
        <input type="number" min="0" size="4" name="fi_<?php echo $fName?>_max_lenght"  value="<?php echo $max_lenght?>" >
    </div>
    <span class="clearfix"></span>   -->
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_LABEL_SHELL")?></label>
        <?php echo JHTML::_('select.genericlist',$label_tags, 'fi_label_tag_'.$fName,
                    'size="1" class="inputbox" ', 'value', 'text', $label_tag_selected);?>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_SHELL")?></label>
        <?php echo JHTML::_('select.genericlist',$tags, 'fi_field_tag_'.$fName,
                    'size="1" class="inputbox" ', 'value', 'text', $field_tag_selected);?>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="fi_<?php echo $fName?>_php_show"><?php echo $field_php_show?></textarea>
    </div>
    <?php if($cck_entity_configuration[$field->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_ACCESS")?></label>
        <?php echo JHTML::_('select.genericlist', $gtree, 'fi_access_'.$fName.'[]', 'multiple="true"','value', 'text',$access_selected)?>
    </div>
    <?php } ?>
</div>