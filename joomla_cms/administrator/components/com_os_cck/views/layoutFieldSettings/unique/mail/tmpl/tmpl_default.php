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

$access_selected = (isset($fields_from_params['cck_mail'][$fName.'_access'])) ? $fields_from_params['cck_mail'][$fName.'_access'] : '1';
$gtree = get_group_children_tree_cck();
$mail_value      = (isset($fields_from_params['cck_mail'][$fName.'_body'])) ? $fields_from_params['cck_mail'][$fName.'_body'] : '';
$mail_subject    = (isset($fields_from_params['cck_mail'][$fName.'_subject'])) ? $fields_from_params['cck_mail'][$fName.'_subject'] : '';
$mail_recipient  = (isset($fields_from_params['cck_mail'][$fName.'_recipient'])) ? $fields_from_params['cck_mail'][$fName.'_recipient'] : '';
$mail_encoding   = (isset($fields_from_params['cck_mail'][$fName.'_encoding'])) ? $fields_from_params['cck_mail'][$fName.'_encoding'] : '';

$mail_owner = (isset($fields_from_params['cck_mail'][$fName.'_owner']) 
                    && $fields_from_params['cck_mail'][$fName.'_owner'] == 'on') ? 'checked="true"' : '';
$mail_owner = (!isset($fields_from_params['cck_mail'][$fName.'_owner'])) ? 'checked="true"' : $mail_owner;

$options[]  = JHTML::_('select.option','1','HTML');
$options[]  = JHTML::_('select.option','0','Text');


?>
<div id="options-field-<?php echo $fName?>">
    <?php if($cck_entity_configuration[$layout->fk_eid]['check_access_fields'] == '1'){ ?>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_ACCESS")?></label>
            <?php echo JHTML::_('select.genericlist', $gtree, 'cck_mail['.$fName.'_access][]',
                                 'multiple="true"','value', 'text',$access_selected)?>
            </div>
    <?php } ?>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_ENCODING")?></label>
            <?php echo JHTML::_('select.genericlist',$options, 'cck_mail['.$fName.'_encoding]',
                                'size="1" class="inputbox" ', 'value', 'text', $mail_encoding)?>
        </div>
        <div>
            <input type="hidden" data-field-name="<?php echo $fName?>" name="cck_mail[<?php echo $fName?>_owner]"
            <?php echo $mail_owner; ?> value="0">
            <label><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_OWNER")?></label>
            <input type="checkbox" data-field-name="<?php echo $fName?>" name="cck_mail[<?php echo $fName?>_owner]" <?php echo $mail_owner; ?>>
        </div>

        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_RECIPIENT")?></label>
            <input type="text" placeholder="<?php echo JText::_('COM_OS_CCK_PLACEHOLDER_MAIL_RECIPIENT')?>" name="cck_mail[<?php echo $fName?>_recipient]"  value="<?php echo $mail_recipient?>">
        </div>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_SUBJECT")?></label>
            <input type="text" placeholder="<?php echo JText::_('COM_OS_CCK_PLASEHOLDER_MAIL_SUBJECT')?>" name="cck_mail[<?php echo $fName?>_subject]"  value="<?php echo $mail_subject?>">
        </div>
        <div>
            <input id="add-field-mask" class="new-mask" type="button" aria-invalid="false" value="+field">
            <label><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_OPTIONS")?></label>
            <textarea id="<?php echo $fName?>_body" placeholder="<?php echo JText::_('COM_OS_CCK_PLASEHOLDER_MAIL_BODY')?>" rows="10" cols="30" name="cck_mail[<?php echo $fName?>_body]" ><?php echo $mail_value?></textarea>
        </div>
</div>