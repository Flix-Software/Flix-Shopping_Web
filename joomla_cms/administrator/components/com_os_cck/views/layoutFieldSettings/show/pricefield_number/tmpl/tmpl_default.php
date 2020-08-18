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
$rand =rand();

$description_show = (isset($lParams['description_'.$fName])) ? 'checked="true"' : '';
$field_prefix = (isset($lParams[$fName.'_prefix'])) ? $lParams[$fName.'_prefix'] : '';
$field_suffix = (isset($lParams[$fName.'_suffix'])) ? $lParams[$fName.'_suffix'] : '';
$quantity_prefix = (isset($lParams[$fName.'_quantity_prefix'])) ? $lParams[$fName.'_quantity_prefix'] : '';
$quantity_suffix = (isset($lParams[$fName.'_quantity_suffix'])) ? $lParams[$fName.'_quantity_suffix'] : '';
$fld_name_show = (isset($lParams['showName_'.$fName])) ? 'checked="true"' : '';
$fld_not_calculated = (isset($lParams['not_calculated_'.$fName])) ? 'checked="true"' : '';
$fld_show_quantity = (isset($lParams['show_quantity_'.$fName])) ? 'checked="true"' : '';
$fld_show_quantity_input = (isset($lParams['show_quantity_input_'.$fName])) ? 'checked="true"' : '';
$fld_alias = (isset($lParams[$fName.'_alias'])) ? $lParams[$fName.'_alias'] : $field->field_name;
$field_tooltip = (isset($lParams[$fName.'_tooltip'])) ? $lParams[$fName.'_tooltip'] : '';
$access_selected = (isset($lParams['access_'.$fName])) ? $lParams['access_'.$fName] : '1';
$fld_require = (isset($lParams[$fName.'_required'])) ? 'checked="true"' : '';
$field_price_field = (isset($lParams[$fName.'_price_field'])) ? $lParams[$fName.'_price_field'] : 0;
$field_digits_points = (isset($lParams[$fName.'_digits_points'])) ? $lParams[$fName.'_digits_points'] : 0;
$field_php_show = (isset($lParams[$fName.'_php_show'])) ? $lParams[$fName.'_php_show'] : '';
$price_type = (isset($lParams[$fName.'_price_type'])) ? $lParams[$fName.'_price_type'] : 'base_price';
$calculation_order = (isset($lParams[$fName.'_calculation_order'])) ? $lParams[$fName.'_calculation_order'] : 1;
$icon_alias_prefix = (isset($lParams[$fName.'_add_icon_alias_prefix'])) ? $lParams[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($lParams[$fName.'_add_icon_alias_suffix'])) ? $lParams[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($lParams[$fName.'_add_icon_prefix_prefix'])) ? $lParams[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($lParams[$fName.'_add_icon_prefix_suffix'])) ? $lParams[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($lParams[$fName.'_add_icon_suffix_prefix'])) ? $lParams[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($lParams[$fName.'_add_icon_suffix_suffix'])) ? $lParams[$fName.'_add_icon_suffix_suffix'] : '';

if(isset($lParams[$fName.'_nofirst']) && $lParams[$fName.'_nofirst'] == 'nofirst'){
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : '';
}else{
    $fld_published = (isset($field->published)) ? 'checked="true"' : '';
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;
}
 
$label_tag_selected = (isset($lParams['label_tag_'.$fName])) ? $lParams['label_tag_'.$fName] : "span";
$field_tag_selected = (isset($lParams['field_tag_'.$fName])) ? $lParams['field_tag_'.$fName] : "span";
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

$price_type_option = array();
$price_type_option[] = JHTML::_('select.option','base_price','Base price');
$price_type_option[] = JHTML::_('select.option','val+','Value +');
$price_type_option[] = JHTML::_('select.option','val-','Value -');
$price_type_option[] = JHTML::_('select.option','percent+','Percent +');
$price_type_option[] = JHTML::_('select.option','percent-','Percent -');

$calculation_order_option = array();
$calculation_order_option[] = JHTML::_('select.option',0,0,'value', 'text', $disable=true);
for($k = 0; $k<50; $k++){
    $calculation_order_option[] = JHTML::_('select.option',$k+1,$k+1,'value', 'text');
}
?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" <?php echo $fld_published?>>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_nofirst" value="nofirst">
    </div>
    <!--<div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_PRICE")?></label>
        <input type="radio" name="fi_<?php echo $fName?>_price_field"  <?php echo $field_price_field?'checked':''?> value="1">Yes
        <input type="radio" name="fi_<?php echo $fName?>_price_field"  <?php echo $field_price_field?'':'checked'?> value="0">No
    </div>-->
    
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_showName_<?php echo $fName?>" <?php echo $fld_name_show?>>
    </div>
    <div class="<?php echo $fName; ?>_not_calculated">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_NOT_CALCULATED_VALUE")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_NOT_CALCULATED_VALUE_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_not_calculated_<?php echo $fName?>" <?php echo $fld_not_calculated?>>
    </div>
    <div class="<?php echo $fName; ?>_show_quantity">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_QUANTITY")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_SHOW_QUANTITY_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_show_quantity_<?php echo $fName?>" <?php echo $fld_show_quantity?>>
    </div>
    <div class="<?php echo $fName; ?>_show_quantity">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_QUANTITY_INPUT")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_SHOW_QUANTITY_INPUT_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_show_quantity_input_<?php echo $fName?>" <?php echo $fld_show_quantity_input?>>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_NUMBER_PRICE_TYPE")?> </label>
        <?php echo JHTML::_('select.genericlist', $price_type_option,  'fi_'. $fName .'_price_type', '','value', 'text',$price_type)?>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_CALCULATION_ORDER")?> </label>
        <?php echo JHTML::_('select.genericlist', $calculation_order_option,  'fi_'. $fName .'_calculation_order', '','value', 'text',$calculation_order)?>
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
    <div class="<?php echo $fName; ?>_quantity_settings">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_QUANTITY_PREFIX")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_quantity_prefix"  value="<?php echo $quantity_prefix?>" >
    </div>
    <div class="<?php echo $fName; ?>_quantity_settings">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_QUANTITY_SUFFIX")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_quantity_suffix"  value="<?php echo $quantity_suffix?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_DIGITS_POINT")?><i title="<?php echo JText::_("COM_OS_CCK_LABEL_DIGITS_POINT_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_digits_points"  value="<?php echo $field_digits_points?>" >
    </div>
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

<script>
    var field_name<?php echo $rand; ?> = '<?php echo $fName; ?>';
    
    function disabled_calculating_order<?php echo $rand; ?>(){
        var price_type = jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_price_type').val();
        var calculation_order_val = '<?php echo $calculation_order; ?>';
        
        if(price_type == 'base_price'){
            jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_calculation_order').val('0');
            jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_calculation_order').attr('disabled', 'disabled');
        }else{
            if(calculation_order_val != ''){
                jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_calculation_order').val(calculation_order_val);
            }else{
                jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_calculation_order').val('1');
            }
            jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_calculation_order').removeAttr('disabled');
        }
        
    }
    
    function show_hide_quantity_settings<?php echo $rand; ?>(){
        var price_type = jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_price_type').val();
        if(price_type == 'base_price'){
            jQuerOs('.'+field_name<?php echo $rand; ?>+'_show_quantity').show();
            
            if(jQuerOs('[name=fi_show_quantity_'+field_name<?php echo $rand; ?>+']:checked').length > 0){
                jQuerOs('.'+field_name<?php echo $rand; ?>+'_quantity_settings').show();
            }else{
                jQuerOs('.'+field_name<?php echo $rand; ?>+'_quantity_settings').hide();
            }
        }else{
            jQuerOs('.'+field_name<?php echo $rand; ?>+'_show_quantity, .'+field_name<?php echo $rand; ?>+'_quantity_settings').hide()
        }
    }
    
    jQuerOs('#fi_'+field_name<?php echo $rand; ?>+'_price_type').on('change', function(){
        disabled_calculating_order<?php echo $rand; ?>();
        show_hide_quantity_settings<?php echo $rand; ?>();
    })
    jQuerOs('.'+field_name<?php echo $rand; ?>+'_show_quantity input[type=checkbox]').on('change', function(){
        show_hide_quantity_settings<?php echo $rand; ?>();
    });
    disabled_calculating_order<?php echo $rand; ?>();
    show_hide_quantity_settings<?php echo $rand; ?>();
</script>