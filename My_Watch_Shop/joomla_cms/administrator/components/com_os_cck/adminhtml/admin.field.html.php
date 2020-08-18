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

class AdminViewField{

  static function showLayoutFields($option, $rows, $pageNav, &$entity_list, &$publist, $layout_type){
    global $doc;
    ?>
    <div class="add-field-button-block">
      <span class="add-new-field">
        <input type="button" value="New" aria-invalid="false" onclick="addLayoutField()">
      </span>
      <span class="delete-layout-field">
        <input type="button" value="Delete" aria-invalid="false" onclick="deleteLayoutField()">
      </span>
      <span>
        <div class="entity-search"><input class="cck-entity-field-search" type="text" placeholder="Search"></div>
      </span>
    </div>
    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
      <tr>
        <th width="5%" align="center" class="title">
          <input type="checkbox" name="toggle" value="" onClick="checkboxFields(this)"/>
        </th>
        <th align="center" class="title" width="5%" nowrap="nowrap"><?php echo "Field ID"; ?></th>
        <th align="left" class="title" width="30%" nowrap="nowrap"><?php echo "Field name"; ?></th>
        <th align="left" class="title" width="15%" nowrap="nowrap"><?php echo "Field type"; ?></th>
        <th align="center" class="title" width="5%" nowrap="nowrap"><?php echo "Published"; ?></th>
        <th align="center" class="title" width="20%" nowrap="nowrap"><?php echo "Show in instance menu"; ?></th>
      </tr>
      <?php
      $i = 0;
      foreach ($rows AS $row) {
        $task = $row->published ? 'unpublish_fields' : 'publish_fields';
        $img = $row->published ? 'tick.png' : 'publish_x.png';
        $alt = $row->published ? 'Published' : 'Unpublished';
        $task2 = ($row->show_in_instance_menu)? 'not_show_in_ins' : 'show_in_ins';
        $img2 = ($row->show_in_instance_menu)? 'tick.png' : 'publish_x.png';
        $alt2 = ($row->show_in_instance_menu) ? 'Published' : 'Unpublished';
        $img = "components/com_os_cck/images/{$img}";
        $img2 = "components/com_os_cck/images/{$img2}";
        if(($layout_type == 'rent_request_instance' || $layout_type == 'buy_request_instance') 
                && stripos($row->field_type, 'price') !== FALSE){
            continue;
        }
        ?>
        <tr class="row<?php echo $i % 2; ?>">
          <td align="center" width="5%">
            <input type="checkbox" class="field-id-checkbox" name="fid[]" value="<?php echo $row->fid; ?>"/>
          </td>
          <td class="field-id" align="center" width="5%"><?php echo $row->fid; ?></td>
          <td align="left" width="30%">

            <span class="edit-field-name-icon" onClick="editLayoutField(this, <?php echo $row->fid?>)">Edit</span>
            
            <?php

            if($row->field_type == 'text_single_checkbox_onoff' || $row->field_type == 'text_select_list'
                || $row->field_type == 'text_radio_buttons' || $row->field_type == 'pricefield_select_list' 
                    || $row->field_type == 'pricefield_radio_buttons' || $row->field_type == 'filefield'){
              ?>
              <span class="field-name-list link-field" onclick="addLayoutField(<?php echo $row->fid?>)"><?php  echo $row->field_name; ?></span>
              <?php
            }else{?>
              <span class="field-name-list"><?php  echo $row->field_name; ?></span>
              <?php
            }
            ?>
          </td>
          <td class="field-type" align="left" width="15%"><?php echo showFieldType($row->field_type); ?></td>
          <td align="center" width="5%">
            <a href="javascript: void(0);"
               onClick="pubLayoutFields('<?php echo $row->fid; ?>','<?php echo $task; ?>')">
                <img src="<?php echo $img; ?>" alt="<?php echo $alt; ?>"/>
            </a>
          </td>
          <td align="center" width="20%">
            <?php
            if($row->field_type == 'text_textfield' || $row->field_type == 'decimal_textfield'
              || $row->field_type == 'datetime_popup' || $row->field_type == 'rating_field'
              || $row->field_type == 'categoryfield' || $row->field_type == 'text_select_list'
              || $row->field_type == 'text_textarea' || $row->field_type == 'text_url' ){?>
              <a  href="javascript: void(0);"
                  onClick="inInstLayoutFields('<?php echo $row->fid; ?>','<?php echo $task2; ?>')">
                  <img src="<?php echo $img2; ?>" alt="<?php echo $alt2; ?>"/>
              </a>
              <?php
            }?>
          </td>
        </tr>
        <?php
        $i++;
      }
      ?>
    </table>
<script type="text/javascript">
    makeSearchInEntityFields();
</script>
  <?php
  }

  static function addLayoutField($option, $field_type_input, $params, $field){
    global $doc;
    
    $allowedDefault = '';
    $default = '';
    $dispAll = 'style="display:none;"';
    $dispDef = 'style="display:none;"';
    if($field){
      switch ($field->field_type) {
        case 'text_single_checkbox_onoff':
          $allowedDefault = "";
          $dispAll = '';
          $dispDef = '';
          break;
        
        case 'text_radio_buttons':
          $allowedDefault = "";
          $dispAll = '';
          $dispDef = '';
          break;
      
        case 'pricefield_select_list':
          $allowedDefault = "";
          $dispAll = '';
          $dispDef = '';
          break;
        case 'pricefield_radio_buttons':
          $allowedDefault = "";
          $dispAll = '';
          $dispDef = '';
          break;
          
        case 'text_select_list':
          $allowedDefault = "One\nTwo\nThree";
          $default = "";
          $dispAll = '';
          $dispDef = '';
          break;  
      
        case 'filefield':
          $allowedDefault = "";
          $default = "";
          $dispAll = '';
          $dispDef = '';
          break; 
      }
    }
    ?>
    <div class="add-field-button-block">
      <span class="save-close-new-field">
        <input type="button" value="Save&Close" aria-invalid="false" onclick="saveLayoutField(<?php echo ($field)?$field->fid:''?>)">
        <input type="button" value="Close" aria-invalid="false" onclick="cckBack('showFieldList')">
      </span>
    </div>
    <form action="index.php" method="post" name="addFieldForm" id="addFieldForm">
      <div class="add-field-block">
        <div>
          <label><?php echo JText::_('COM_OS_CCK_FIELDS_NAME');?></label>
          <span slass="cck-col-2">
            <input type="text" name="field_name" id="field_name" value="<?php echo ($field)?$field->field_name:''?>"/>
          </span>
        </div>
        <div>
            <label><?php echo JText::_('COM_OS_CCK_FIELDS_SELECT_TYPE');?></label>
            <span slass="cck-col-2">
              <?php
                if($field){
                  echo showFieldType($field->field_type);
                  echo '<input id="field_type" type="hidden" name="field_type" value="'.$field->field_type.'">';
                }else{
                  echo $field_type_input;
                }
              ?> 
            </span>
        </div>
      </div>


      <!-- allowed-block -->

      <!-- checkbox -->
      <?php if(!isset($field->field_type) 
            || ($field->field_type == 'text_single_checkbox_onoff')){?>
        <div id="allowed-block-check" <?php echo $dispAll?>>
            
          <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_CHECKBOX_ALLOW_VAL")?> <i title="<?php echo JText::_("COM_OS_CCK_INFO_TO_CHECKBOX")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
          <textarea id="allowed-check-value" class="text_area" name="allowed_value" type="text" placeholder="<?php echo JText::_("COM_OS_CCK_LABLE_CHECKBOX_PLACEHOLDER")?>"><?php echo $params->get("allowed_value", $allowedDefault)?></textarea>
        </div>
            <?php } ?> 
      <!-- / checkbox  -->
      
      <!-- radiobutton -->
      <?php if(!isset($field->field_type) 
            || ($field->field_type == 'text_radio_buttons')){ ?>
        <div id="allowed-block-radio" <?php echo $dispAll?>>
            
          <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_CHECKBOX_ALLOW_VAL")?> </label>
          <textarea id="allowed-radio-value" class="text_area" name="allowed_value" rows="3" type="text" placeholder="<?php echo JText::_("COM_OS_CCK_LABLE_RADIOBUTTON_PLACEHOLDER")?>"><?php echo $params->get("allowed_value", $allowedDefault)?></textarea>
        </div>
            <?php } ?>
      <!-- / radiobutton -->
      
      <!-- pricefield_select_list -->
      <?php if(!isset($field->field_type) 
            || ($field->field_type == 'pricefield_select_list') || ($field->field_type == 'pricefield_radio_buttons')){ ?>
        <div id="allowed-block-pricefield-select" <?php echo $dispAll?>>
            
          <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_CHECKBOX_ALLOW_VAL")?> </label>
          <textarea id="allowed-block-pricefield-select-value" class="text_area" name="allowed_value" rows="3" type="text" placeholder="<?php echo JText::_("COM_OS_CCK_LABLE_PRICEFIELD_SELECT_PLACEHOLDER")?>"><?php echo $params->get("allowed_value", $allowedDefault)?></textarea>
        </div>
            <?php } ?>
      <!-- / pricefield_select_list -->
      
      <!-- pricefield_select_list -->
      <?php if(!isset($field->field_type) 
            || ($field->field_type == 'filefield')){ 
        $product_value = '';
        $product = $params->get('allowed_value', '');
        
        if($product != '' && $product == 'on'){
            $product_value = 'checked="true"';
        }?>
        <div id="allowed-block-filefield" <?php echo $dispAll?>>
            
          <label class="access-label"><?php echo JText::_("COM_OS_CCK_LABEL_FILEFIELD_PRODUCT")?> </label>
          <input type="checkbox" id="allowed-block-filefield-product" name="product" <?php echo $product_value; ?>>
          <!--<textarea id="allowed-block-pricefield-select-value" class="text_area" name="allowed_value" rows="3" type="text" placeholder="<?php echo JText::_("COM_OS_CCK_LABLE_PRICEFIELD_SELECT_PLACEHOLDER")?>"><?php echo $params->get("allowed_value", $allowedDefault)?></textarea>-->
        </div>
            <?php } ?>
      <!-- / pricefield_select_list -->

      <!-- select -->
      <?php if(!isset($field->field_type) || $field->field_type == 'text_select_list'){?>  
        <div id="allowed-block-select" <?php echo $dispAll?>>
          <div class="row one_allow_fields_row">
            <div class="col-md-2">
              <label >Value
                <i title="<?php echo JText::_("COM_OS_CCK_LABEL_FIELD_SELECT_LIST_VAL")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i>
              </label>
            </div>
            <div  class="text-center pull-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-md-2">
            <label>Child Select
              <i title="<?php echo JText::_("COM_OS_CCK_LABEL_FIELD_SELECT_LIST_CHILD_LIST")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i>
            </label>
            </div>
            <div class="col-md-8"></div>
          </div>

          <?php 
            //for now only select_type
            $child_select_list = AdminField::getSelectList();
            //allowed values
            $allowed_values = explode('\sprt',$params->get("allowed_value", ''));
            $child_selected = explode('|',$params->get("child_select", ''));
            $default_value = $params->get("default_value", 0);
            //current field id
            if($field){
              $current_fid = $field->fid;
            }else{
              $current_fid = 0;
            }
            $childs_list = [];
            //var_dump($fields);
            foreach ($child_select_list as $value) {
              $params->loadString($value['params']);
              $childs_list = array_merge($childs_list, explode('|',$params->get('child_select')));
            }
            $childs_list = array_unique($childs_list);
            //var_dump($childs_list);
          ?>

          <?php foreach ($allowed_values as $key => $value){?>

            <?php 
              $childOptionsList= $childOptionsListForAdd = '<option value="0">None</option>';
              
              foreach ($child_select_list as $option) {
                if($option['fid'] == $current_fid) continue;
//var_dump((in_array($option['fid'], $childs_list)) || (isset($child_selected[$key]) && $child_selected[$key] == $option['fid']));
                if(!in_array($option['fid'], $childs_list) || (isset($child_selected[$key]) && $child_selected[$key] == $option['fid'])){
                //selected in children list
                $selected = '';
                if(isset($child_selected[$key]) && $child_selected[$key] == $option['fid']) $selected = 'selected';

                $childOptionsList .= "<option ".$selected." value=".$option['fid'].">".$option['field_name']."</option>";
                $childOptionsListForAdd .= "<option value=".$option['fid'].">".$option['field_name']."</option>";
                //var_dump($childOptionsListForAdd);
                }
              }
            ?>
            <!-- display form  -->
            <div class="row one_allow_fields_row">
              <div class="col-md-2">
                <input type="text" class="allowed-value form-control" name="allowed_value[]" value="<?=$value?>"  placeholder="Text">
              </div>
               <div  class="text-center pull-left">
                  <i class="glyphicon glyphicon-link signModal"></i>
               </div>
              <div class="col-md-2">
                <select class="form-control child-assoc" name="child-assoc[]" >
                  <?php echo $childOptionsList; ?>
                </select>
              </div>
              <div>
                <i class="glyphicon glyphicon-plus-sign signModal"></i>
                &nbsp;<i class="glyphicon glyphicon-minus-sign signModal"></i>
              </div>
              <div class="col-md-8"></div>
            </div>
            <!-- /display form  -->
          <?php } ?>
        </div>
      <?php } ?>
      <!-- / select -->
      <!-- /allowed-block -->

      <br>



      
     
      <input type="hidden" name="option" value="com_os_cck"/>
    </form>
  
  <script>
    
    jQuerOs(document).ready(function(){
      jQuerOs('#allowed-block-select').on('click','i.glyphicon-plus-sign',function(){

        var row = '<div class="row one_allow_fields_row"><div class="col-md-2"><input type="text" class="allowed-value form-control" name="allowed_value[]" placeholder="Value|Text"></div><div  class=" text-center pull-left"><i class="glyphicon glyphicon-link signModal"></i></div><div class="col-md-2"><select class="form-control child-assoc" name="child_assoc[]"><?php echo isset($childOptionsListForAdd) ? $childOptionsListForAdd : ''; ?></select></div><div><i class="glyphicon glyphicon-plus-sign signModal"></i>&nbsp;&nbsp;<i class="glyphicon glyphicon-minus-sign signModal"></i></div><div class="col-md-8"></div></div>';

        jQuerOs('#allowed-block-select').append(row);
        jQuerOs('#allowed-block-select .one_allow_fields_row:last').hide();
        jQuerOs('#allowed-block-select .one_allow_fields_row:last').slideDown(400);

      })
      //remove if not the last one 
      jQuerOs('#allowed-block-select').on('click','i.glyphicon-minus-sign',function(){

        if (jQuerOs('.one_allow_fields_row').length > 2){
          jQuerOs(this).closest('.one_allow_fields_row').slideUp(400,function(){
            jQuerOs(this).remove()
          })
        }
      })

      jQuerOs('#allowed-block-select').on('change','.one_allow_fields_row .allowed-value',function(){

          var defaultOptionsList = '<option value="0">Select default</option>';
          jQuerOs('#allowed-block-select .one_allow_fields_row .allowed-value').each(function(key, el){

            if(jQuerOs(el).val().split('|').length > 1){
              defaultOptionsList += '<option value="'+(jQuerOs(el).val()).split('|')[0]+'">'+(jQuerOs(el).val()).split('|')[1]+'</option>';
            }else{
              defaultOptionsList += '<option value="'+jQuerOs(el).val()+'">'+jQuerOs(el).val()+'</option>';
            }

          })

          jQuerOs('#default-block-select select').html(defaultOptionsList);

      })
    })

  </script>

  <?php
  }
}
