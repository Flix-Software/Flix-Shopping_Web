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

//var_dump($lParams);
//$limit = (isset($lParams['limit_'.$fName])) ? $lParams['limit_'.$fName] : '';
//$pagenator = isset($lParams['pagenator_limit_'.$fName])?$lParams['pagenator_limit_'.$fName]:'10';
$field_tag_selected = (isset($lParams['field_tag_'.$fName])) ? $lParams['field_tag_'.$fName] : "span";

$tags[]  = JHTML::_('select.option','span','span');
$tags[]  = JHTML::_('select.option','div','div');


?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_SHELL")?></label>
        <?php echo JHTML::_('select.genericlist',$tags, 'fi_field_tag_'.$fName,
                'size="1" class="inputbox" ', 'value', 'text', $field_tag_selected)?>
    </div>
<!--    <div class="category-options">
        <label><?php echo JText::_("COM_OS_CCK_LAYOUT_INSTANCE_LIMIT"); ?> <i title="<?php echo JText::_("COM_OS_CCK_LAYOUT_INSTANCE_LIMIT_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="number" name="fi_limit_<?php echo $fName; ?>" value="<?php echo $limit; ?>" />
      </div>
      <div class="category-options">
        <label><?php echo JText::_("COM_OS_CCK_LAYOUT_PAGE"); ?></label>
        <input type="text" name="fi_pagenator_limit_<?php echo $fName; ?>"
               value="<?php $pagenator; ?>">
      </div>-->
</div>
