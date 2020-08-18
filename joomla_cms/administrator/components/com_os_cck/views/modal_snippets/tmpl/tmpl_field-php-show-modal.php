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
<!-- Php Show field Modal -->
<div class="modal fade" id="field-php-show-modal" tabindex="-1" role="dialog" aria-labelledby="field-php-show-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="field-php-show-modal-Label"><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_FIELD_MODAL")?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <span class="col-lg-5"><label>Title</label></span>
          <span class="col-lg-6"><label>Mask(without styles)</label></span>
          
          <span class="col-lg-1"><label>ID</label></span>
        </div>

        <?php
        
        if(isset($layout->custom_field_mask_list)){
          foreach ($layout->custom_field_mask_list as $key => $value) { ?>
           <?php $lay_params = unserialize($layout->params);
            $field_title = isset($lay_params['fields'][$value->title.'_alias'])?$lay_params['fields'][$value->title.'_alias']:'';?>
            <div id="field-custom-row-<?php echo $value->fid; ?>" class="row">
              <span class="col-lg-5"><?php echo !empty($field_title)?$field_title:$value->title; ?></span>
              <span onclick="addMaskPhpShow('<?php echo $value->mask; ?>');" class="col-lg-6 addMaskCustom">
                <?php echo $value->mask; ?></span>
              
              <span class="col-lg-1"><?php echo $value->fid; ?></span>
            </div>
            <?php
          } 
        }  
        ?>
      </div>
    </div>
  </div>
</div>
<!-- CustomCode field Modal -->