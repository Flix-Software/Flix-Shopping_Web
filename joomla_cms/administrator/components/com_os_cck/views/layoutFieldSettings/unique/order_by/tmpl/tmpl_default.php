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

if(isset($field)){
    $fName = $field->db_field_name;
}else{
//    $field = new stdClass();
//    $field->db_field_name = 'user_order_by';
    $fName = 'user_order_by';
}
$rand =rand();

$fld_published = (isset($fields_from_params[$fName.'_published']) 
                    && $fields_from_params[$fName.'_published'] == 'on') ? 'checked="true"' : '';
$fld_published = (!isset($fields_from_params[$fName.'_published'])) ? 'checked="true"' : $fld_published;
$selected_orderFieldsDefault = (isset($fields_from_params['indexed_'.$fName])) ? $fields_from_params['indexed_'.$fName] : '';
$sortType_selected = (isset($fields_from_params['sortType_'.$fName])) ? $fields_from_params['sortType_'.$fName] : '';
$selected_orderFields = (isset($fields_from_params['order_by_fields_'.$fName])) ? $fields_from_params['order_by_fields_'.$fName] : '';

//sort fields
if($layout->type == 'parent_child'){
    $idxFields = array();
    if(isset($layout_params['views']['show_request_layout']) && !empty($layout_params['views']['show_request_layout'])){
        foreach ($layout_params['views']['show_request_layout'] as $child_layout_id => $temp_val){
            $child_layout = new os_cckLayout($db);
            $child_layout->load($child_layout_id);
            $child_entity_id = $child_layout->fk_eid;
            $child_entity = new os_cckEntity($db);
            $child_entity->load($child_entity_id);
            $order_fields = $child_entity->getIndexedFieldList();
            $idxFields = array_merge($idxFields, $order_fields);
        }
    
    }elseif(isset($child_lid)){
        $child_layout = new os_cckLayout($db);
        $child_layout->load($child_lid);
        $child_entity_id = $child_layout->fk_eid;
        $child_entity = new os_cckEntity($db);
        $child_entity->load($child_entity_id);
        $order_fields = $child_entity->getIndexedFieldList();
        $idxFields = array_merge($idxFields, $order_fields);
    }else{
        echo '<div id="options-field-'.$fName.'">';
        echo '<div class="request_layout_error">'.JText::_('COM_OS_CCK_LAYOUT_ORDER_BY_REQUEST_LAYOUT_ERROR').'</div></div>'; return;
    }
}else{
    $idxFields = $entity->getIndexedFieldList();
}
//var_dump($idxFields); exit;
$field_for_order = array();
$field_for_order[] = JHTML::_('select.option','ceid','Id');

foreach($idxFields as $idx) {
    $field_for_order[]  = JHTML::_('select.option',$idx['value'],$idx['text']);
}
if(count($field_for_order) <= 1){
    $orderByFields = 'Need at least 2 sortable fields';
}else{
    $orderByFields =  JHTML::_('select.genericlist',$field_for_order, 'fi_order_by_fields_' . $fName. '[]',
                      'size="4" multiple="multiple" class="inputbox" ', 'value', 'text', $selected_orderFields);
}


// order by
$orderByFieldsDefault =  JHTML::_('select.genericlist',$field_for_order, 'fi_indexed_' . $fName,
                      ' class="inputbox" ', 'value', 'text', $selected_orderFieldsDefault);

$sortType_option = array(JHTML::_('select.option','ASC','ASC'), JHTML::_('select.option','DESC','DESC'));
$sortType = JHTML::_('select.genericlist', $sortType_option, 'fi_sortType_' . $fName, '','value', 'text',$sortType_selected);


$tags[]  = JHTML::_('select.option','span','span');
$tags[]  = JHTML::_('select.option','div','div');


?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published"
        <?php echo $fld_published?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" <?php echo $fld_published?>>
    </div>

        <div class="category-options">
            <label><?php echo JText::_('COM_OS_CCK_LAYOUT_ORDER_BY_FIELDS_DEFAULT'); ?></label>
            <?php echo $orderByFieldsDefault; ?>
        </div>
        <div class="category-options">
            <label><?php echo JText::_('COM_OS_CCK_LAYOUT_ORDER_BY'); ?></label>
            <?php echo $sortType; ?>
        </div>
        <div class="category-options">
            <label><?php echo JText::_('COM_OS_CCK_LAYOUT_ORDER_BY_FIELDS'); ?>
                <i title="<?php echo JText::_("COM_OS_CCK_LAYOUT_ORDER_BY_FIELDS_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i>
            </label>
            <?php echo $orderByFields; ?>
        </div>
</div>
