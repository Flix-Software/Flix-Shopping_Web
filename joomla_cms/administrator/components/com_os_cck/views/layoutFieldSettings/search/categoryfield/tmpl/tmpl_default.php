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
$ftype = $field->field_type;
$showSearchOptions = array();
$fld_name_show = (isset($lParams['showName_'.$fName])) ? 'checked="true"' : "";
$description_show = (isset($lParams['description_'.$fName]))? 'checked="true"' : '';
$field_prefix = (isset($lParams[$fName.'_prefix']))? $lParams[$fName.'_prefix'] : '';
$field_suffix = (isset($lParams[$fName.'_suffix']))? $lParams[$fName.'_suffix'] : '';
$fld_alias = (isset($lParams[$fName.'_alias']))? $lParams[$fName.'_alias'] : $field->field_name;
$field_tooltip = (isset($lParams[$fName.'_tooltip']))? $lParams[$fName.'_tooltip'] : '';
$access_selected = (isset($lParams['access_'.$fName]))? $lParams['access_'.$fName] : '1';
$select_type = (isset($lParams['select_type_'.$fName]))? $lParams['select_type_'.$fName] : '1';
$default_value = (isset($lParams['default_value_'.$fName]))? $lParams['default_value_'.$fName] : '';


if(isset($lParams[$fName.'_nofirst']) && $lParams[$fName.'_nofirst'] == 'nofirst'){
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : '';
}else{
    $fld_published = (isset($field->published)) ? 'checked="true"' : '';
    $fld_published = (isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;
}

$icon_alias_prefix = (isset($lParams[$fName.'_add_icon_alias_prefix'])) ? $lParams[$fName.'_add_icon_alias_prefix'] : '';
$icon_alias_suffix = (isset($lParams[$fName.'_add_icon_alias_suffix'])) ? $lParams[$fName.'_add_icon_alias_suffix'] : '';
$icon_prefix_prefix = (isset($lParams[$fName.'_add_icon_prefix_prefix'])) ? $lParams[$fName.'_add_icon_prefix_prefix'] : '';
$icon_prefix_suffix = (isset($lParams[$fName.'_add_icon_prefix_suffix'])) ? $lParams[$fName.'_add_icon_prefix_suffix'] : '';
$icon_suffix_prefix = (isset($lParams[$fName.'_add_icon_suffix_prefix'])) ? $lParams[$fName.'_add_icon_suffix_prefix'] : '';
$icon_suffix_suffix = (isset($lParams[$fName.'_add_icon_suffix_suffix'])) ? $lParams[$fName.'_add_icon_suffix_suffix'] : '';

//search params
if($ftype == 'decimal_textfield'){
  $showSearchOptions[] = JHTML::_('select.option','1','Show search by range');
  $showSearchOptions[] = JHTML::_('select.option','2','Show search by value');
  $showSearchOptions[] = JHTML::_('select.option','3','Search by value');
  $showSearchOptions[] = JHTML::_('select.option','0','Hide');
}elseif($ftype == 'text_single_checkbox_onoff'){
  $showSearchOptions[] = JHTML::_('select.option','1','Show');
  $showSearchOptions[] = JHTML::_('select.option','0','Hide');
}else{
  $showSearchOptions[] = JHTML::_('select.option','1','Show');
  //$showSearchOptions[] = JHTML::_('select.option','2','Search');
  $showSearchOptions[] = JHTML::_('select.option','0','Hide');
}

$select_type_option = [];

$select_type_option[] = JHTML::_('select.option','1','Single select');
$select_type_option[] = JHTML::_('select.option','2','Size 2');
$select_type_option[] = JHTML::_('select.option','3','Size 3');
$select_type_option[] = JHTML::_('select.option','4','Size 4');
$select_type_option[] = JHTML::_('select.option','5','Size 5');
$select_type_option[] = JHTML::_('select.option','6','Size 6');
$select_type_option[] = JHTML::_('select.option','7','Size 7');
$select_type_option[] = JHTML::_('select.option','8','Size 8');
$select_type_option[] = JHTML::_('select.option','9','Size 9');
$select_type_option[] = JHTML::_('select.option','10','Size 10');

$list = CAT_Utils::categoryArray('com_os_cck',0,$field->fk_eid);
$this_treename = '';
$childs_ids = $options = Array();


foreach ($list as $item) { 
  if ($item->parent_id != 0){
    $childs_ids[$item->cid] = $item->cid;
  }
}

//search params
//$showSearchOptions[] = JHTML::_('select.option','1','Show');
//$showSearchOptions[] = JHTML::_('select.option','2','Search');
$selectedFieldTitle = (isset($lParams['search_'.$fName])) ? $lParams['search_'.$fName] : '';

$options[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_PLEASE_SELECT_OPTION'));
//var_dump($layout->fk_eid);
//var_dump($options);
foreach ($list as $item) {
    
    if(isset($item->fk_eid) && ($item->fk_eid == '0' || $item->fk_eid == $field->fk_eid)){
      if ($this_treename) {
        if (strpos($item->name, $this_treename) === false
            && array_key_exists($item->cid, $childs_ids) === false
        ) {
            $options[] = JHTML::_('select.option',$item->cid, $item->name);
        }
      } else {
        $options[] = JHTML::_('select.option',$item->cid, $item->name);
      }
    }
}

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

    <div>
        <label><?php echo JText::_("COM_OS_CCK_LAYOUT_SELECT_TYPE")?></label>
        <?php echo JHTML::_('select.genericlist', $select_type_option, 'fi_select_type_'.$fName, '','value', 'text',$select_type)?>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_SEARCH_CATEGORY_DEFAULT_VALUE")?></label>
        <?php echo JHTML::_('select.genericlist',$options, 'fi_default_value_'.$fName, '', 'value', 'text', $default_value); ?>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SEARCH_TYPE")?></label>
        <?php echo JHTML::_('select.genericlist', $showSearchOptions, 'fi_search_'.$fName,
                                            'size="1" class="inputbox" ', 'value', 'text', $selectedFieldTitle)?>
        <input type="hidden" name="os_cck_search_<?php echo $fName?>[fid]" value="<?php echo $field->fid?>">
    </div>
    <?php if($cck_entity_configuration[$field->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_ACCESS")?></label>
        <?php echo JHTML::_('select.genericlist', $gtree, 'fi_access_'.$fName.'[]', 'multiple="true"','value', 'text',$access_selected)?>
    </div>
    <?php } ?>
    <input type="hidden" value="<?php echo $field->fid?>" name="os_cck_search_<?php echo $fName?>[fid]">
    <input type="hidden" value="1" name="os_cck_search_<?php echo $fName?>[type]">
</div>