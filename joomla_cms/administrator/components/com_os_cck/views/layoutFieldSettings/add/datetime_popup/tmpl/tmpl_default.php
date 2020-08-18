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
global $os_cck_configuration;
$fName = $field->db_field_name;

$description_show = (isset($lParams['description_'.$fName])) ? 'checked="true"' : '';
$field_prefix = (isset($lParams[$fName.'_prefix'])) ? $lParams[$fName.'_prefix'] : '';
$field_suffix = (isset($lParams[$fName.'_suffix'])) ? $lParams[$fName.'_suffix'] : '';
$fld_alias = (isset($lParams[$fName.'_alias'])) ? $lParams[$fName.'_alias'] : $field->field_name;
$field_tooltip = (isset($lParams[$fName.'_tooltip'])) ? $lParams[$fName.'_tooltip'] : '';
$access_selected = (isset($lParams['access_'.$fName])) ? $lParams['access_'.$fName] : '1';
$field_placeholder = (isset($lParams[$fName.'_placeholder'])) ? $lParams[$fName.'_placeholder'] : '';
$field_input_format = (isset($lParams[$fName.'_input_format'])) ? $lParams[$fName.'_input_format'] : 'd-m-Y';
$field_input_time_format = (isset($lParams[$fName.'_input_time_format'])) ? $lParams[$fName.'_input_time_format'] : 'H:i:s';
$field_output_format = (isset($lParams[$fName.'_output_format'])) ? $lParams[$fName.'_output_format'] : 'd-m-Y';
$field_php_show = (isset($lParams[$fName.'_php_show'])) ? $lParams[$fName.'_php_show'] : '';
$fld_require = (isset($lParams[$fName.'_required'])) ? 'checked="true"' : '';

$field_step_time = (isset($lParams[$fName.'_step_time'])) ? $lParams[$fName.'_step_time'] : '15';

//publish checked default
$fld_published = (isset($lParams[$fName.'_published']) 
                    && $lParams[$fName.'_published'] == 'on') ? 'checked="true"' : '';
$fld_published = (!isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;

//show name checked default
$fld_name_show = (isset($lParams['showName_'.$fName]) 
                    && $lParams['showName_'.$fName] == 'on') ? 'checked="true"' : '';
$fld_name_show = (!isset($lParams['showName_'.$fName])) ? 'checked="true"' : $fld_name_show;

$icon_alias_prefix = (isset($lParams[$fName.'_add_icon_alias_prefix'])) ? $lParams[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($lParams[$fName.'_add_icon_alias_suffix'])) ? $lParams[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($lParams[$fName.'_add_icon_prefix_prefix'])) ? $lParams[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($lParams[$fName.'_add_icon_prefix_suffix'])) ? $lParams[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($lParams[$fName.'_add_icon_suffix_prefix'])) ? $lParams[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($lParams[$fName.'_add_icon_suffix_suffix'])) ? $lParams[$fName.'_add_icon_suffix_suffix'] : '';

$default = array();
$default[] = JHTML::_('select.option','TODAY','Today');
$default[] = JHTML::_('select.option','EMPTY','Empty field');
$default[] = JHTML::_('select.option','CREATE','Сreation date/time');
$default[] = JHTML::_('select.option','CHANGE','Date/time of change');

$default_val = (isset($lParams[$fName.'_default_val'])) ? $lParams[$fName.'_default_val'] : 'TODAY';

?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published"
        <?php echo $fld_published?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" <?php echo $fld_published?>>
    </div>
    <?php
    if($layoutType == 'rent_request_instance'){
        $types = array();
        $types[] = JHTML::_('select.option','default','Default');
        $types[] = JHTML::_('select.option','rent_from','Rent From');
        $types[] = JHTML::_('select.option','rent_to','Rent To');
        $default_type = (isset($lParams[$fName.'_field_type'])) ? $lParams[$fName.'_field_type'] : 'default';
        ?>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_TYPE")?></label>
            <?php echo JHTML::_('select.genericlist', $types, 'fi_'.$fName.'_field_type', '','value', 'text',$default_type)?>
        </div>
        <?php
    }
    ?>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_REQUIRED")?></label>
        <input class="require-checkbox" type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_required" <?php echo $fld_require?>>
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
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_PLACEHOLDER")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_placeholder"  value="<?php echo $field_placeholder?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DATE_INPUT_FORMAT")?> <i title="<?php echo JText::_("COM_OS_CCK_DATE_FIELD_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_input_format"  value="<?php echo $field_input_format?>" >
    </div>
    <div id="time_format_<?php echo $fName; ?>">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_TIME_INPUT_FORMAT")?> <i title="<?php echo JText::_("COM_OS_CCK_TIME_FIELD_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_input_time_format"  value="<?php echo $field_input_time_format?>" >
    </div>

    <div id='time_stap_<?php echo $fName; ?>'>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_STEP_TIME")?></label>
        <input type="number" size="4" name="fi_<?php echo $fName?>_step_time"  value="<?php echo $field_step_time?>" >
    </div>

    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_DEFAULT")?></label>
        <?php echo JHTML::_('select.genericlist', $default, 'fi_'.$fName.'_default_val', '','value', 'text',$default_val)?>
    </div>
     <div style="display:none;">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_OUTPUT_FORMAT")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_output_format"  value="<?php echo $field_output_format?>" >
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
<script type="text/javascript">
    jQuerOs( document ).ready(function() {
        layoutType = '<?php echo $layoutType; ?>'
        if(layoutType == 'rent_request_instance'){
        
            field_id<?php echo $fName; ?> = 'fi_<?php echo $fName; ?>_field_type'
            rent_type = '<?php echo $os_cck_configuration->get('rent_type'); ?>'

            function time_panel<?php echo $fName; ?>(){

              jQuerOs('#time_format_<?php echo $fName; ?>, #time_stap_<?php echo $fName; ?>').hide();
              if(jQuerOs('#' + field_id<?php echo $fName; ?>).val() == 'default' 
                      || (rent_type == 2 && (jQuerOs('#' + field_id<?php echo $fName; ?>).val() == 'rent_from' 
                      || jQuerOs('#' + field_id<?php echo $fName; ?>).val() == 'rent_to'))){
                jQuerOs('#time_format_<?php echo $fName; ?>, #time_stap_<?php echo $fName; ?>').show();

              }  
                return;
            }

            time_panel<?php echo $fName; ?>();

            jQuerOs('#' + field_id<?php echo $fName; ?>).change(function(event) {

                time_panel<?php echo $fName; ?>();
            });
        }
    })


</script>