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
?>
<!-- Attached Module Modal -->
<div class="modal fade" id="attached-child-enteties-modal" tabindex="-1" role="dialog" aria-labelledby="attached-module-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="attached-module-modal-Label"><?php echo JText::_("COM_OS_CCK_ATTACHED_ENTITY_MODAL_TITLE")?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php echo JHTML::_('select.genericlist', $layout->enteties_list, 'add_child_enteties', 'onchange="addChildEntityFields()"', 'value', 'text', 0); ?>
            <?php if($layout->type == 'add_instance'){ ?>
            <input id="child_entity_alias" type="text" value="" placeholder="<?php echo JText::_("COM_OS_CCK_ATTACHED_ENTITY_MODAL_ALIAS_PLACEHOLDER")?>"/>
            <?php } ?>
        </div>
          
          <div id="modal_fields_options"></div>
      </div>
    </div>
  </div>
</div>
<!-- Attached Module Modal -->