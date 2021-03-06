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
<!-- Editor Modal -->
<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-modalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="layout-modalLabel"><?php echo JText::_("COM_OS_CCK_EDIT_LAYOUT_MODAL_EDITOR_TITLE")?></h4>
      </div>
      <div class="modal-body">
        <textarea id="editor-area" name="cckEditor" style="display:none;"></textarea>
        <div class="joomla-editor">
          <script>var joomlaEditor = true;</script>
          <?php $editor = JFactory::getConfig()->get('editor');
          if($editor != "codemirror" && $editor != 'none'){
            $editor = JEditor::getInstance($editor);
            echo $editor->display( 'cckEditor', '', '400', '350', '5', '5');
          }else{?>
            <script>
              joomlaEditor = false;
            </script>
            <?php
          }?>
        </div>
      </div>
      <br>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
        <button class="btn btn-primary save-editor-button" 
                type="button">
                  Save
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Editor Modal -->
