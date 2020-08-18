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
//$fName = $field->db_field_name;
$fName = $child_entity->data_field_name;
//var_dump($fields_from_params);
$description_show = (isset($lParams['description_'.$fName]))? 'checked="true"' : '';
$field_prefix = (isset($lParams[$fName.'_prefix']))? $lParams[$fName.'_prefix'] : '';
$field_suffix = (isset($lParams[$fName.'_suffix']))? $lParams[$fName.'_suffix'] : '';
$fld_alias = (isset($lParams[$fName.'_alias']))? $lParams[$fName.'_alias'] : $child_entity->entity_alias;
$field_tooltip = (isset($lParams[$fName.'_tooltip']))? $lParams[$fName.'_tooltip'] : '';
$access_selected = (isset($lParams['access_'.$fName]))? $lParams['access_'.$fName] : '1';
//$params = new JRegistry;
//$params->loadString($field->params);
//$field_allowed_value = $params->get("allowed_value", "One\nTwo\nThree");
//$field_default_value = $params->get("default_value", "Two");
//$select_type = (isset($lParams['select_type_'.$fName]))? $lParams['select_type_'.$fName] : '1';
$field_php_show = (isset($lParams[$fName.'_php_show'])) ? $lParams[$fName.'_php_show'] : '';
$fld_require = (isset($lParams[$fName.'_required']))? 'checked="true"' : '';

//publish checked default
$fld_published = (isset($lParams[$fName.'_published']) 
                    && $lParams[$fName.'_published'] == 'on') ? 'checked="true"' : '';
$fld_published = (!isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;
//show name checked default
$fld_name_show = (isset($lParams['showName_'.$fName]) 
                    && $lParams['showName_'.$fName] == 'on') ? 'checked="true"' : '';
$fld_name_show = (!isset($lParams['showName_'.$fName])) ? 'checked="true"' : $fld_name_show;
$fld_default_value = (isset($lParams[$fName . '_default_value'])) ? $lParams[$fName . '_default_value'] : "";

$icon_alias_prefix = (isset($lParams[$fName.'_add_icon_alias_prefix'])) ? $lParams[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($lParams[$fName.'_add_icon_alias_suffix'])) ? $lParams[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($lParams[$fName.'_add_icon_prefix_prefix'])) ? $lParams[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($lParams[$fName.'_add_icon_prefix_suffix'])) ? $lParams[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($lParams[$fName.'_add_icon_suffix_prefix'])) ? $lParams[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($lParams[$fName.'_add_icon_suffix_suffix'])) ? $lParams[$fName.'_add_icon_suffix_suffix'] : '';

//$allowed_values = $params->get("allowed_value");
//$allowed_values = explode('\sprt', $allowed_values);


//$default_values_options = array();
//$default_values_options[] = JHTML::_('select.option','0',JText::_("COM_OS_CCK_OPTION_NOT_SELECTED_RADIOBUTTON"));
//foreach ($allowed_values as $item) {
//    $key_value = explode('|', $item);
//    if(!isset($key_value[0]) && isset($key_value[1])){
//      $key_value[0] =$key_value[1];
//    }
//    
//    if (isset($key_value[0]) && isset($key_value[1]))
//        $default_values_options[] = JHTML::_('select.option', $key_value[0], $key_value[1], "value", "text");
//    else if (isset($key_value[0]) && !isset($key_value[1]))
//        $default_values_options[] = JHTML::_('select.option', $key_value[0], $key_value[0], "value", "text");
//    else if (!isset($key_value[0]) && isset($key_value[1]))
//        $default_values_options[] = JHTML::_('select.option', $key_value[1], $key_value[1], "value", "text");
//    else 
//        return "Bad set 'allow value' for this field!";
//}

//$select_type_option = [];
//
//$select_type_option[] = JHTML::_('select.option','1','Single select');
//$select_type_option[] = JHTML::_('select.option','2','Size 2');
//$select_type_option[] = JHTML::_('select.option','3','Size 3');
//$select_type_option[] = JHTML::_('select.option','4','Size 4');
//$select_type_option[] = JHTML::_('select.option','5','Size 5');
//$select_type_option[] = JHTML::_('select.option','6','Size 6');
//$select_type_option[] = JHTML::_('select.option','7','Size 7');
//$select_type_option[] = JHTML::_('select.option','8','Size 8');
//$select_type_option[] = JHTML::_('select.option','9','Size 9');
//$select_type_option[] = JHTML::_('select.option','10','Size 10');

?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published"
        <?php echo $fld_published?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" <?php echo $fld_published?>>
    </div>
<!--    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_REQUIRED")?></label>
        <input class="require-checkbox" type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_required" <?php echo $fld_require?>>
    </div>-->
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
<!--    <div>
        <label><?php echo JText::_("COM_OS_CCK_LAYOUT_SELECT_TYPE")?><i title="<?php echo JText::_("COM_OS_CCK_LABEL_SELECT_TYPE_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <?php echo JHTML::_('select.genericlist', $select_type_option, 'fi_select_type_'.$fName, '','value', 'text',$select_type)?>
    </div>-->
<!--    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_DEFAULT")?> </label>
        <?php echo JHTML::_('select.genericlist',$default_values_options, 'fi_'.$fName.'_default_value',
                                            'size="1" class="inputbox" ', 'value', 'text',$fld_default_value)?>
        <input type="hidden" name="os_cck_search_<?php echo $fName?>[fid]" value="<?php //echo $field->fid?>">
    </div>-->
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="fi_<?php echo $fName?>_php_show"><?php echo $field_php_show?></textarea>
    </div>
    <?php if($cck_entity_configuration[$layout->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_ACCESS")?></label>
        <?php echo JHTML::_('select.genericlist', $gtree, 'fi_access_'.$fName.'[]', 'multiple="true"','value', 'text',$access_selected)?>
    </div>
    <?php } ?>
</div>