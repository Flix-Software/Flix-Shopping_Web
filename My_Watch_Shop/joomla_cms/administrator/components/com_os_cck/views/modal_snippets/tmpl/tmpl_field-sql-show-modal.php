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
<div class="modal fade" id="field-sql-show-modal" tabindex="-1" role="dialog" aria-labelledby="field-sql-show-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <?php //var_dump($layout->custom_field_mask_list); ?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="field-sql-show-select-Label"><?php echo JText::_("COM_OS_CCK_LABEL_ORIGINAL_SELECT_MODAL")?></h4>
        
        <?php echo $original_select; ?>
        
        <div class="original_select_note">
            * In this query, order by, pagination, alphabetical and access values will also be added.
        </div>
      </div>
      <div class="modal-header">
          <?php //var_dump($layout->custom_field_mask_list); ?>
        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
        <h4 class="modal-title" id="field-sql-show-modal-Label"><?php echo JText::_("COM_OS_CCK_LABEL_MAIL_FIELD_MODAL")?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <span class="col-lg-5"><label>Title</label></span>
          <span class="col-lg-6"><label>Mask(without styles)</label></span>
          
          <span class="col-lg-1"><label>ID</label></span>
        </div>
          
        <?php
        //var_dump($layout->custom_field_mask_list);
        if(isset($layout->custom_field_mask_list)){
          foreach ($layout->custom_field_mask_list as $key => $value) { ?>
           <?php $lay_params = unserialize($layout->params);
            $prefix = (stripos($value->field_type, 'pricefield_') !== FALSE) ? 'price.' : 'instance.';
            $field_title = isset($lay_params['fields'][$value->title.'_alias'])?$lay_params['fields'][$value->title.'_alias']:'';?>
            <div id="field-custom-row-<?php echo $value->fid; ?>" class="row">
              <span class="col-lg-5"><?php echo $value->name; ?></span>
              <?php if(stripos($value->field_type, 'pricefield_') !== FALSE){ ?>
                  <span onclick="addMaskSqlShow('(price.fk_fid=<?php echo $value->fid; ?> AND price.price_value= )');" class="col-lg-6 addMaskCustom">
              <?php } else{ ?>
                  <span onclick="addMaskSqlShow('<?php echo 'instance.'. $value->title; ?>');" class="col-lg-6 addMaskCustom">
              <?php } ?>
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