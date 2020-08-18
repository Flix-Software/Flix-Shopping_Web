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
<!-- Add Field Modal -->
<div class="modal fade" id="add-field-modal" tabindex="-1" role="dialog" aria-labelledby="add-field-modalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="add-field-modalLabel"><?php echo $entity->name?> Entity | Avaible Fields.</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="close-add-field-modal btn btn-primary" onclick="addFieldModalClose()">Close</button>
    </div>
  </div>
</div>
<!-- Add Field Modal -->