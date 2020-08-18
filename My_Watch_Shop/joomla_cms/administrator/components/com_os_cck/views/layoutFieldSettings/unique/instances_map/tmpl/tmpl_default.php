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

$description_show = (isset($fields_from_params['description_'.$fName])) ? 'checked="true"' : '';
$field_tooltip = (isset($fields_from_params[$fName.'_tooltip'])) ? $fields_from_params[$fName.'_tooltip'] : '';
$clasterer = (isset($fields_from_params['clasterer_'.$fName])) ? 'checked="true"' : '';
$access_selected = (isset($fields_from_params['access_'.$fName])) ? $fields_from_params['access_'.$fName] : '1';
$width   = (isset($fields_from_params[$fName]['options']['width'])) ? $fields_from_params[$fName]['options']['width'] : '';
$height  = (isset($fields_from_params[$fName]['options']['height'])) ? $fields_from_params[$fName]['options']['height'] : '';

$field_php_show = (isset($fields_from_params[$fName.'_php_show'])) ? $fields_from_params[$fName.'_php_show'] : '';

$gtree = get_group_children_tree_cck();
?>
<div id="options-field-<?php echo $fName?>">
    <div>
      <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DESCRIPTION")?></label>
      <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_description_<?php echo $fName?>" <?php echo $description_show?>>
    </div>
    <div>
      <label><?php echo JText::_("COM_OS_CCK_LABEL_TOOLTIP")?></label>
      <input type="text" size="4" name="fi_<?php echo $fName?>_tooltip"  value="<?php echo $field_tooltip?>" >
    </div>
    <div>
        <label><?php echo JText::_('COM_OS_CCK_LABEL_WIDTH_HEIGHT')?></label>
        <input class="width-height" type="text" size="4" name="fi_<?php echo $fName?>[options][width]" value="<?php echo $width?>"> x
        <input class="width-height" type="text" size="4" name="fi_<?php echo $fName?>[options][height]" value="<?php echo $height?>">px
    </div>
    <div>
      <label><?php echo JText::_("COM_OS_CCK_LABEL_MARKER_CLASTERER")?></label>
      <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_clasterer_<?php echo $fName?>" <?php echo $clasterer; ?>>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">
        <span class="editor-button">Editor</span>
        <textarea class="php-show-editor" rows="5" cols="30" name="fi_<?php echo $fName?>_php_show"><?php echo $field_php_show?></textarea>
    </div>
    <?php if($cck_entity_configuration[$layout->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_ACCESS")?></label>
        <?php echo JHTML::_('select.genericlist', $gtree, 'fi_access_' . $fName. '[]', 'multiple="true"','value', 'text',$access_selected)?>
    </div>  
    <?php } ?>
</div>
