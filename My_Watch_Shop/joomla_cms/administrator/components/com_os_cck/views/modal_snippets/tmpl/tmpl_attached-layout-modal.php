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
<!-- Attached Layout Modal -->
<div class="modal fade" id="attached-layout-modal" tabindex="-1" role="dialog" aria-labelledby="attached-layout-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="attached-layout-modal-Label"><?php echo JText::_("COM_OS_CCK_ATTACHED_LAYOUT_MODAL_TITLE")?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <span class="col-lg-6"><label>Title</label></span>
          <span class="col-lg-4"><label>Type</label></span>
          <span class="col-lg-2"><label>ID</label></span>
        </div>
        <?php 
        foreach ($layout->layout_list as $key => $value) { ?>
          <div id="attached-layout-row-<?php echo $value->lid; ?>" class="row"
                onclick="addAttachedLayout('<?php echo $value->lid; ?>','<?php echo $value->title; ?>');">
            <span class="col-lg-6"><?php echo $value->title; ?></span>
            <span class="col-lg-4"><?php echo $value->type; ?></span>
            <span class="col-lg-2"><?php echo $value->lid; ?></span>
          </div>
          <?php
        } ?>
      </div>
    </div>
  </div>
</div>
<!-- Attached Layout Modal -->