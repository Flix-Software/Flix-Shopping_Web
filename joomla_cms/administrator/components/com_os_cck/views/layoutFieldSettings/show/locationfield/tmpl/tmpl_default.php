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
$width  = (isset($lParams[$fName]['options']['width'])) ? $lParams[$fName]['options']['width'] : 100;
$height = (isset($lParams[$fName]['options']['height'])) ? $lParams[$fName]['options']['height'] : 300;
$field_php_show = (isset($lParams[$fName.'_php_show'])) ? $lParams[$fName.'_php_show'] : '';
if(isset($lParams[$fName.'_nofirst']) && $lParams[$fName.'_nofirst'] == 'nofirst'){
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : '';
}else{
    $fld_published = (isset($field->published)) ? 'checked="true"' : '';
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;
}

$map_address = (isset($lParams[$fName.'_map_address'])) ? $lParams[$fName.'_map_address'] : '';
$map_country = (isset($lParams[$fName.'_map_country'])) ? $lParams[$fName.'_map_country'] : '';
$map_region = (isset($lParams[$fName.'_map_region'])) ? $lParams[$fName.'_map_region'] : '';
$map_city = (isset($lParams[$fName.'_map_city'])) ? $lParams[$fName.'_map_city'] : '';
$map_zip_code = (isset($lParams[$fName.'_map_zip_code'])) ? $lParams[$fName.'_map_zip_code'] : '';
$map_type = (isset($lParams[$fName.'_map_type'])) ? $lParams[$fName.'_map_type'] : 'ROADMAP';
$map_zoom = (isset($lParams[$fName.'_map_zoom'])) ? $lParams[$fName.'_map_zoom'] : '7';
$map_latitude = (isset($lParams[$fName.'_map_latitude'])) ? $lParams[$fName.'_map_latitude'] : '40.728252774602204';
$map_longitude = (isset($lParams[$fName.'_map_longitude'])) ? $lParams[$fName.'_map_longitude'] : '-73.99167272244449';

$code = '<div class="location-address-block">'."\n".
            '<div class="cck-address">{address}</div>'."\n".
            '<div class="cck-country">{country}</div>'."\n".
            '<div class="cck-region">{region}</div>'."\n".
            '<div class="cck-city">{city}</div>'."\n".
            '<div class="cck-zip">{zip}</div>'."\n".
        '</div>';
$map_map_code = (isset($lParams[$fName.'_map_code'])) ? $lParams[$fName.'_map_code'] : $code;
$map_hide_address = (isset($lParams[$fName.'_map_hide_address'])) ? $lParams[$fName.'_map_hide_address'] : 'false';
$map_hide_map = (isset($lParams[$fName.'_map_hide_map'])) ? $lParams[$fName.'_map_hide_map'] : 'false';

$icon_alias_prefix = (isset($lParams[$fName.'_add_icon_alias_prefix'])) ? $lParams[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($lParams[$fName.'_add_icon_alias_suffix'])) ? $lParams[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($lParams[$fName.'_add_icon_prefix_prefix'])) ? $lParams[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($lParams[$fName.'_add_icon_prefix_suffix'])) ? $lParams[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($lParams[$fName.'_add_icon_suffix_prefix'])) ? $lParams[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($lParams[$fName.'_add_icon_suffix_suffix'])) ? $lParams[$fName.'_add_icon_suffix_suffix'] : '';

?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SETUP_LOCATION")?></label>
        <input type="button" onclick="openLocationModal('<?php echo $fName?>')" data-field-name="<?php echo $fName?>" value="Open">
        <input id="<?php echo $fName?>_map_address" type="hidden" name="fi_<?php echo $fName?>_map_address" value="<?php echo $map_address?>">
        <input id="<?php echo $fName?>_map_country" type="hidden" name="fi_<?php echo $fName?>_map_country" value="<?php echo $map_country?>">
        <input id="<?php echo $fName?>_map_region" type="hidden" name="fi_<?php echo $fName?>_map_region" value="<?php echo $map_region?>">
        <input id="<?php echo $fName?>_map_city" type="hidden" name="fi_<?php echo $fName?>_map_city" value="<?php echo $map_city?>">
        <input id="<?php echo $fName?>_map_zip_code" type="hidden" name="fi_<?php echo $fName?>_map_zip_code" value="<?php echo $map_zip_code?>">
        <input id="<?php echo $fName?>_map_type" type="hidden" name="fi_<?php echo $fName?>_map_type" value="<?php echo $map_type?>">
        <input id="<?php echo $fName?>_map_zoom" type="hidden" name="fi_<?php echo $fName?>_map_zoom" value="<?php echo $map_zoom?>">
        <input id="<?php echo $fName?>_map_latitude" type="hidden" name="fi_<?php echo $fName?>_map_latitude" value="<?php echo $map_latitude?>">
        <input id="<?php echo $fName?>_map_longitude" type="hidden" name="fi_<?php echo $fName?>_map_longitude" value="<?php echo $map_longitude?>">
        <input id="<?php echo $fName?>_map_as_show" type="hidden" name="fi_<?php echo $fName?>_map_as_show" value="false">
        <input id="<?php echo $fName?>_map_hide_address" type="hidden" name="fi_<?php echo $fName?>_map_hide_address" value="<?php echo $map_hide_address?>">
        <input id="<?php echo $fName?>_map_hide_map" type="hidden" name="fi_<?php echo $fName?>_map_hide_map" value="<?php echo $map_hide_map?>">
        <textarea style="display:none!important;" id="<?php echo $fName?>_map_code" name="fi_<?php echo $fName?>_map_code"><?php echo $map_map_code?></textarea>
    </div>
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
    <div>
        <label><?php echo JText::_('COM_OS_CCK_LABEL_WIDTH_HEIGHT')?></label>
        <input class="width-height" type="text" size="4" name="fi_<?php echo $fName?>[options][width]"  value="<?php echo $width?>" > %
        <input class="width-height" type="text" size="4" name="fi_<?php echo $fName?>[options][height]"  value="<?php echo $height?>" >px
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