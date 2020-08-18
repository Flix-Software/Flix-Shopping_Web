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

$search_type = isset($layout_params['fields']['search_'.$fName])?$layout_params['fields']['search_'.$fName]:1;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}
$default_value = isset($layout_params['fields']['default_value_'.$fName]) ? $layout_params['fields']['default_value_'.$fName] : '';
$list = CAT_Utils::categoryArray('com_os_cck',$fromSearch,$layout->fk_eid);

$this_treename = '';
$childs_ids = $options = Array();
foreach ($list as $item) {
  if (array_key_exists($item->parent_id, $childs_ids))
    $childs_ids[$item->cid] = $item->cid;
}


$options[] = JHTML::_('select.option','', JText::_('COM_OS_CCK_LABEL_SELECT_VIEW_TYPE_ALL_CATEGORIES'));

foreach ($list as $item) {
    if($item->fk_eid == '0' || $item->fk_eid == $layout->fk_eid){
      if ($this_treename) {
        if (strpos($item->title, $this_treename) === false
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
  $select_type  = 'multiple="multiple" size="'.$select_type_value.'"';
}
if(JRequest::getVar('categories', '') != ''){
    $selected_category = JRequest::getVar('categories', '');
}elseif($default_value != ''){
    $selected_category = $default_value;
}else{
    $selected_category = $layout_params['catid'];
}
if($search_type == 1){
?><span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> ><?php

echo JHTML::_('select.genericlist',$options, 'categories[]', $field_styling.' id="catid" '. $select_type .' class="'.$custom_class.' inputbox" onchange=""' . $offset_animation, 'value', 'text',$selected_category);

?></span>
<?php }elseif ($search_type == 0 && $default_value != '') { ?>
    <input type="hidden" name="categories[]" value="<?php echo $default_value; ?>">
<?php }