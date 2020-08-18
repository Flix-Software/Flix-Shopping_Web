<?php
if (!defined('_VALID_MOS') && !defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');
/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/?>
<!-- Styling Modal -->
<div class="modal fade" id="styling-modal" tabindex="-1" role="dialog" aria-labelledby="styling-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="styling-modal-Label"><?php echo JText::_("COM_OS_CCK_STYLING")?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php
          styling_options($fields, $fields_from_params);
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Styling Modal -->
