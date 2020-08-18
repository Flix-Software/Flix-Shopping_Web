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

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}
$required = '';
if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
$field_styling = (isset($layout_params['field_styling']))? $layout_params['field_styling'] : '';
$custom_class = (isset($layout_params['custom_class']))? $layout_params['custom_class'] : '';
$offset_animation = get_field_offset_animation($field, $layout);

$list = CAT_Utils::categoryArray('com_os_cck',$fromSearch,$layout->fk_eid);

if($fromSearch == 2)return $list;
$this_treename = '';
$childs_ids = $options = Array();
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}

foreach ($list as $item) { 
  if ($item->parent_id != 0){
    $childs_ids[$item->cid] = $item->cid;
  }
}

$options[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_PLEASE_SELECT_OPTION'));
//var_dump($layout->fk_eid);
//var_dump($options);
foreach ($list as $item) {
    
    if(isset($item->fk_eid) && ($item->fk_eid == '0' || $item->fk_eid == $layout->fk_eid)){
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

//select type



$select_type = '';
$select_type_value = isset($layout_params['fields']['select_type_'.$fName]) ? $layout_params['fields']['select_type_'.$fName] : 1;

if($select_type_value > 1){
  $options[0]->disable = TRUE;
  $select_type  = 'multiple="multiple" size="'.$select_type_value.'"';
}

?><span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> ><?php
echo JHTML::_('select.genericlist',$options, 'categories[]', $field_styling.' id="catid" '. $select_type .' class="'.$custom_class. ' ' . $required. ' ' . $field->db_field_name .' inputbox" ' . $offset_animation . ' onchange=""', 'value', 'text', $value);
?></span>