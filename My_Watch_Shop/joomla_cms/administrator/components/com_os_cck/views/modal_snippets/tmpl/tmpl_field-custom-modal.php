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
<!-- CustomCode field Modal -->
<div class="modal fade" id="field-custom-modal" tabindex="-1" role="dialog" aria-labelledby="field-custom-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="field-custom-modal-Label"><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_FIELD_MODAL")?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <span class="col-lg-3"><label>Title</label></span>
          <span class="col-lg-3"><label>Mask(without styles)</label></span>
          <span class="col-lg-3"><label>Mask(with styles)</label></span>
          <span class="col-lg-3"><label>ID</label></span>
        </div>

        <?php
        //var_dump($layout->custom_field_mask_list);
        if(isset($layout->custom_field_mask_list)){
          foreach ($layout->custom_field_mask_list as $key => $value) { ?>
           <?php $lay_params = unserialize($layout->params);
            $field_title = isset($lay_params['fields'][$value->title.'_alias'])?$lay_params['fields'][$value->title.'_alias']:'';?>
            <div id="field-custom-row-<?php echo $value->fid; ?>" class="row">
              <span class="col-lg-3"><?php echo !empty($field_title)?$field_title:$value->title; ?></span>
              <span onclick="addMaskCustom('<?php echo $value->mask; ?>');" class="col-lg-3 addMaskCustom">
                <?php echo $value->mask; ?></span>
              <span onclick="addMaskCustom('<?php echo '{|f-'.$value->fid.'|}'; ?>');" class="col-lg-3 addMaskCustom">
                <?php echo '{|f-'.$value->fid.'|}'; ?></span>
              <span class="col-lg-3"><?php echo $value->fid; ?></span>
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