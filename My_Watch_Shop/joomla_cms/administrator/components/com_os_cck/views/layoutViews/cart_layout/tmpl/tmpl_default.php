<?php
/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/

defined('_JEXEC') or die;
//getting all params

$layout_params = unserialize($layout->params);
$layout_params['unique_fields'] = ($layout->custom_fields)?unserialize($layout->custom_fields):array();

$rowsNames = array();
if(isset($layout_params['row_ids']) && !empty($layout_params['row_ids'])){
  $rowsIds= explode('|',$layout_params['row_ids']);
  foreach ($rowsIds as $value) {
    if(!empty($value)){
      $rowName = new stdClass();
      $rowName->field_name = 'row_'.$value;
      $rowsNames[] = $rowName;
    }
  }
}else{
  $layout_params['row_ids'] = '';
}

$columnNames = array();
if(isset($layout_params['column_ids']) && !empty($layout_params['column_ids'])){
  $columnIds = explode('|',$layout_params['column_ids']);
  foreach ($columnIds as $value) {
    if(!empty($value)){
      $columnName = new stdClass();
      $columnName->field_name = 'col_'.$value;
      $columnNames[] = $columnName;
    }
  }
}else{
  $layout_params['column_ids'] = '';
}

//get unique max array key
$counter = (count($layout_params['unique_fields']))? max(array_keys($layout_params['unique_fields']))+1 : 1 ;
$fields_from_params = (isset($layout_params['fields']))?$layout_params['fields']:array();

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root() . "components/com_os_cck/assets/css/editLayout.css");
//custom category field
$product_for_cart = new stdClass();
$product_for_cart->label = JText::_("COM_OS_CCK_CART_UNIQUE_FIELD_PRODUCT_FOR_CART");
$product_for_cart->db_field_name = 'product_for_cart';
$product_for_cart->field_type = 'product_for_cart';
$product_for_cart->description = 'Product for cart';

$button_continue_shopping = new stdClass();
$button_continue_shopping->label = JText::_("COM_OS_CCK_CART_UNIQUE_FIELD_BUTTON_CONTINUE_SHOPPING");
$button_continue_shopping->db_field_name = 'button_continue_shopping';
$button_continue_shopping->field_type = 'button_continue_shopping';
$button_continue_shopping->description = 'Continue Shopping';

$final_price = new stdClass();
$final_price->label = JText::_("COM_OS_CCK_CART_UNIQUE_FIELD_TOTAL_PRICE");
$final_price->db_field_name = 'total_price';
$final_price->field_type = 'total_price';
$final_price->description = 'Total Price';

$coupon = new stdClass();
$coupon->label = JText::_("COM_OS_CCK_CART_UNIQUE_FIELD_COUPON");
$coupon->db_field_name = 'coupon';
$coupon->field_type = 'coupon';
$coupon->description = 'Coupon';


$unique_fields = array($product_for_cart, $button_continue_shopping, $final_price, $coupon);
//end

//custom field
$custom_code_field = new stdClass();
$custom_code_field->label = JText::_("COM_OS_CCK_CATEGORY_UNIQUE_CODE_FIELD");
$custom_code_field->db_field_name = 'custom_code_field';
$custom_code_field->description = '';
//end



?>
<div id="messages" class="cck-spiner">
<div class="spiner-bg"></div>
  <div class="sk-cube sk-cube1"></div>
  <div class="sk-cube sk-cube2"></div>
  <div class="sk-cube sk-cube3"></div>
  <div class="sk-cube sk-cube4"></div>
  <div class="sk-cube sk-cube5"></div>
  <div class="sk-cube sk-cube6"></div>
  <div class="sk-cube sk-cube7"></div>
  <div class="sk-cube sk-cube8"></div>
  <div class="sk-cube sk-cube9"></div>
<span id="result-message"></span></div>

<!-- START main drag&drop aria -->
<div class="container-fluid">

<!-- layout notice -->
<?php 
  noticeLinkToDocLayout('category_layout', 'Category layout', 'http://ordasoft.com/News/OS-CCK-Documentation/cck-term-explanation.html#Show category');
?>
<!-- /layout notice -->

  <!-- block for main body -->
  <div id="main-block" class="row">
      <!-- all fields block -->
      <div id="fields-block" class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
        <div id="fields-block-title">
          <div class="fields-search"><input class="cck-main-field-search" type="text" placeholder="Search"></div>
          <div class="fields-title">Fields</div>
        </div>
        <!-- custom block for field -->
        <div class="field-block">
          <div>
            <!-- popover back/front title -->
            <span class="field-name <?php echo $custom_code_field->db_field_name.'-'.$counter.'-label-hidden';
                        echo  (isset($fields_from_params['showName_'.$custom_code_field->db_field_name.'_'.$counter]) )?
                               '':
                               ' hide-field-name-'.$custom_code_field->db_field_name.'_'.$counter;?>"
                data-field-name="<?php echo $custom_code_field->db_field_name.'_'.$counter; ?>">
                <?php echo $custom_code_field->label; ?>
            </span>
            <span class="col_box admin_aria_hidden">
              <?php echo '{|f-'.$custom_code_field->db_field_name.'_'.$counter.'|}'; ?>
            </span>
          </div>
        </div>
        <!--END custom block for field -->
        <?php
        foreach($unique_fields as $field) {?>
          <!-- block for field -->
          <div class="field-block">
            <div>
              <!-- popover back/front title -->
              <span class="field-name <?php echo $field->db_field_name.'-label-hidden';
                          echo  (isset($fields_from_params['showName_'.$field->db_field_name])
                                  || !$layout->lid)?
                                 '':
                                 ' hide-field-name-'.$field->db_field_name;?>"
                  data-field-name="<?php echo $field->db_field_name; ?>">
                  <?php if($field->db_field_name == "joom_alphabetical"){
                      echo $field->label; ?><i title="<?php echo JText::_("COM_OS_CCK_USER_INSTANCES_INFO_ALPHABETICAL")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i>
                 <?php } else {
                     echo $field->label;
                 } ?>
              </span>
              <span class="col_box admin_aria_hidden">
                <?php echo '{|f-'.$field->db_field_name.'|}'; ?>
              </span>
              <input class="f-params" name="<?php echo 'fi_Params_'.$field->db_field_name ?>" type="hidden" value="{}">
            </div>
          </div>
          <!--END block for field -->
          <?php
        } ?>
        <!-- attached block -->
        <div id="attached-block">
          <div class="layout-title">Attach Layouts</div>
          <input id="add-layout" class="new-layout" type="button" aria-invalid="false" value="Add New">

          <div class="layout-title">Attach Modules</div>
          <input id="add-module" class="new-layout" type="button" aria-invalid="false" value="Add New">
        </div>
        <!-- End attached block -->
      </div>
      <!-- END all fields block -->

      <!-- editor main aria -->
      <div id="editor-block" class="col-lg-7 col-md-6 col-sm-8 col-xs-12">
        <div id="content-block">
          <?php echo $layout->html; ?>
        </div>
        <input class="form-params" name="form-params" type="hidden" value='<?php echo (isset($layout_params['form_params']))?$layout_params['form_params']:'{}';?>'>
        <input id="add-row" class="new-row" type="button" aria-invalid="false" value="New Row">
      </div>
      <!--END editor main aria -->

      <!-- block for options -->
      <div id="field_options" class="col-lg-3 col-md-4 col-sm-8 col-xs-12">
        <ul>
          <li><a href="#options-tab-1"><?php echo JText::_("COM_OS_CCK_EDIT_LAYOUT_FIELD_OPTION")?></a></li>
          <li><a href="#options-tab-2"><?php echo JText::_("COM_OS_CCK_EDIT_LAYOUT_BLOCK_OPTION")?></a></li>
          <li><a href="#options-tab-3"><?php echo JText::_("COM_OS_CCK_EDIT_LAYOUT_FORM_OPTION")?></a></li>
        </ul>
        <!-- START OPTIONS TABS -->
        <div id="options-tab-1">
          <div id="fields-options-accordion">
            <h3><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_FIELDS_MAIN_OPTIONS") ?></h3>
            <div class="main-fields-content main-fields-options">
              <?php
              foreach ($unique_fields as $field) {
                  //require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'category_layout', 'fieldUniq');
                  require getAdminFiledSettingsViewPath('com_os_cck', 'unique', $field->field_type);
              }
              
              if(isset($layout_params['views']['show_request_layout'])){
                foreach ($layout_params['views']['show_request_layout'] as $key => $value) {
                  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'cart_layout', 'layoutOptions');
                }
              }
              if(count($layout_params['unique_fields'])){
                foreach ($layout_params['unique_fields'] as $key => $custom_options){
                  //require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'category_layout', 'customField');
                    require getAdminFiledSettingsViewPath('com_os_cck', 'unique', 'custom_code');
                }
              } ?>
            </div>
            <h3><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_FIELDS_CSS_OPTIONS") ?></h3>
            <div class="styling-field-content">
              <?php
              
                styling_options($layout,'f','');
              ?>
            </div>
          </div>
        </div>
        <div id="options-tab-2">
          <div id="block-options-accordion">
            <h3 id="row-styling"><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_ROW_CSS_OPTIONS")?></h3>
            <div class="styling-row-content">
              <?php styling_options($layout,'row');?>
            </div>
            <h3 id="column-styling"><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_COLUMN_CSS_OPTIONS")?></h3>
            <div class="styling-column-content">
              <?php styling_options($layout,'col');?>
            </div>
          </div>
        </div>
        <div id="options-tab-3">
          <div id="form-options-accordion">



            <h3><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_FIELDS_MAIN_OPTIONS") ?></h3>
            <div class="main-fields-content">
              <div class="category-options">
                <label><?php echo JText::_('COM_OS_CCK_LAYOUT_TITLE'); ?></label>
                <?php  print_r($layout->layout_title);?>
              </div>
           
               <div class="category-options">
                <label><?php echo JText::_('COM_OS_CCK_SHOW_LAYOUT_TITLE'); ?></label>
                <?php  print_r($layout->show_layout_title);?>
              </div>
                  
              <h4><?php echo JText::_("COM_OS_CCK_LABEL_SHORT_CART_SETTINGS") ?></h4>
              <div>
                  <label><?php echo JText::_('COM_OS_CCK_EMPTY_CART_IMG_TYPE'); ?></label>
                  <?php  print_r($layout->empty_cart_img_type);?> 
              </div>
              <br>
              <div id="emty_cart_type_img">
                <label><?php echo JText::_('COM_OS_CCK_EMPTY_CART_IMG'); ?></label>
                <?php  print_r($layout->empty_cart_img);?> 
                <div id="empty_cart_img_demo"></div>
              </div>
              <div id="emty_cart_type_icon">
                <label><?php echo JText::_('COM_OS_CCK_FULL_CART_ICON'); ?></label>
                <div class="fa <?php echo $layout->empty_cart_icon; ?> add_font_awesom" id="add_icon_empty_cart" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($layout->empty_cart_icon == '') ? '&#10000;' : ''; ?></div>
                <input type="hidden" name="vi_add_icon_empty_cart" value="<?php echo $layout->empty_cart_icon; ?>">
              </div>
              
              <div>
                  <label><?php echo JText::_('COM_OS_CCK_FULL_CART_IMG_TYPE'); ?></label>
                  <?php  print_r($layout->full_cart_img_type);?> 
              </div>
              <br>
              <div id="full_cart_type_img">
                <label><?php echo JText::_('COM_OS_CCK_FULL_CART_IMG'); ?></label>
                <?php  print_r($layout->full_cart_img);?> 
                <div id="full_cart_img_demo"></div>
              </div>
              <div id="full_cart_type_icon">
                <label><?php echo JText::_('COM_OS_CCK_FULL_CART_ICON'); ?></label>
                <div class="fa <?php echo $layout->full_cart_icon; ?> add_font_awesom" id="add_icon_full_cart" rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_("COM_OS_CCK_TOOLTIP_ADD_ICON");?>"><?php echo ($layout->full_cart_icon == '') ? '&#10000;' : ''; ?></div>
                <input type="hidden" name="vi_add_icon_full_cart" value="<?php echo $layout->full_cart_icon; ?>">
              </div>
              
              <div class="mini_cart_options">
                <label><?php echo JText::_('COM_OS_CCK_TEXT_EMPTY_CART'); ?></label>
                <?php  print_r($layout->text_empty_cart);?>
              </div>
              <div class="mini_cart_options">
                <label><?php echo JText::_('COM_OS_CCK_TEXT_FULL_CART'); ?></label>
                <?php  print_r($layout->text_full_cart);?>
              </div>
              
              <!--<div class="mini_cart_options">
                <label><?php echo JText::_('COM_OS_CCK_MINI_CART_ADD_EFFECT'); ?></label>
                <?php  print_r($layout->add_effect);?>
              </div>-->

            </div>
            <h3><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_FIELDS_CSS_OPTIONS") ?></h3>
            <div class="styling-field-content">
              <?php styling_options($layout,'form');?>
            </div>
          </div>
        <!-- END options tabs -->
      </div>
  </div>
</div>
<!-- END main drag-drop aria -->


<!-- ADD MODALS -->
<?php
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'editor-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'layout-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'attached-layout-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'attached-module-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'field-php-show-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'font-awesom-modal');
?>
<!-- ADD MODALS -->


<!-- hidden option block -->
<input type="hidden" name="vi_instance_type" value="add"/>
<input id="lid" type="hidden" name="lid" value="<?php echo $layout->lid; ?>"/>
<input id="attached_module_ids" type="hidden" name="attached_module_ids"
      value="<?php echo (isset($layout_params['attachedModuleIds']))?$layout_params['attachedModuleIds'] : '' ;?>">
<input id="row_ids" type="hidden" name="row_ids" value="<?php echo $layout_params['row_ids']; ?>">
<input id="column_ids" type="hidden" name="column_ids" value="<?php echo $layout_params['column_ids']; ?>">
<!-- end hidden option -->
<?php
require_once(JPATH_SITE . "/administrator/components/com_os_cck/views/editLayoutFunctions.php");
?>
<!-- script for drop joomla menu and buttons sidebar -->
<script type="text/javascript">
  //counters block
  var cust_count = <?php echo $counter?>;
//end
  //fn drop for rows
  function make_droppable(){
    jQuerOs(".drop-area").droppable({
      activeClass: "activeDroppable",
      accept: ".field-block, .attached-layout-block, .attached-module-block",
      drop: function( event, ui ) {
        var draggable = ui.draggable;
        draggable.find("div:first-child").addClass("drop-item");
        if(draggable.hasClass("field-block")){
          //field block
          delete_button = '<span class="delete-field"></span>';
          inform_button = '<span class="f-inform-button"></span>';
        }else if(draggable.hasClass("attached-module-block")){
          inform_button = '<span class="m-inform-button"></span>';
          delete_button = '<span class="delete-module"></span>';
        }else{
          //attached layout block
          inform_button = '<span class="l-inform-button"></span>';
          delete_button = '<span class="delete-layout"></span>';
        }
        draggable.find(".drop-item").prepend(inform_button);
        draggable.find(".drop-item").append(delete_button);
        jQuerOs(this).append(draggable.html());
        if(draggable.hasClass("field-block")){
          //field block
          
          del_field();
          hide_options();
          makeOptions();
          jQuerOs("#field_options div[id^='options-field-']").hide();
          jQuerOs("#field_options #options-field-"+draggable.find(".field-name").data("field-name")).show();
        }else if(draggable.hasClass("attached-module-block")){
          
          hide_options();
          makeOptions();
          del_module();
          addHiddenModuleIds(draggable.find(".module-name").data("field-name"));//(modId)
        }else{
          //attached layout block
          
          addOptionForLayout(draggable.find(".layout-name").data("field-name"));
          del_layout();
          hide_options();
          makeOptions();
          make_showHideTitle();
          jQuerOs("#field_options div[id^='options-field-']").hide();
          jQuerOs("#field_options #options-field-"+draggable.find(".layout-name").data("field-name")).show();
        }
        if(draggable.find(".field-name").length
            && draggable.find(".field-name").data("field-name").indexOf("custom_code_field_") >= 0){
          //if we drag custom field
          //start block with cutom_field_counter//we change field data-name,class and inner hidden text
          cust_count++;
          //delete current class
          draggable.find(".field-name").removeClass("hide-field-name-"+jQuerOs(this).find(".field-name").data("field-name"));
          //delete previos class
          draggable.find(".field-name").removeClass("hide-field-name-custom_code_field_"+(cust_count-1));
          draggable.find(".field-name").removeClass("custom_code_field-"+(cust_count-1)+"-label-hidden");
          //add new class
          draggable.find(".field-name").addClass("hide-field-name-custom_code_field_"+cust_count);
          draggable.find(".field-name").addClass("custom_code_field-"+(cust_count)+"-label-hidden");
          //change curent data-field-name
          draggable.find(".field-name").attr("data-field-name","custom_code_field_"+(cust_count));
          //change current hfield hidden
          draggable.find(".admin_aria_hidden").text("{|f-custom_code_field_"+cust_count+"|}");
          //remove x buttons
          draggable.find(".f-inform-button").remove();
          draggable.find(".delete-field").remove();
          //end
          //start dinamic create unique option
          add_unique_option(cust_count);
          make_showHideTitle();
          hide_options();
          makeOptions();
          jQuerOs("#field_options #options-field-custom_code_field_"+(cust_count-1)).show();
          //end
        }else if(draggable.find(".field-name").length
            && draggable.find(".field-name").data("field-name") == "joom_pagination"
            || draggable.find(".field-name").data("field-name") == "joom_alphabetical"){

           //field block

          del_field();
          hide_options();
          makeOptions();
          jQuerOs("#field_options div[id^='options-field-']").hide();
          jQuerOs("#field_options #options-field-"+draggable.find(".field-name").data("field-name")).show();
          //remove x buttons
          draggable.find(".f-inform-button").remove();
          draggable.find(".delete-field").remove();
          draggable.find("div:first-child").removeClass("drop-item")
        }else{
          //remove dragable field from field block
          draggable.remove();
        }
      }
    });
  }
//end

// --------------------------------------------------READY BLOCK START-----------------------------\\
  jQuerOs( document ).ready(function() {
    //make fun-s
    return_span_shell();
    make_add_row();
    make_attached_layout();
    make_attached_module();
    make_popover();
    make_remove_joomla_bars();
    make_synchronize_fields();
    make_synchronize_layout();
    make_field_mask_php_show();
    make_font_awesom_modal();
    //resizable
    jQuerOs('[id^=cck_col-]').addClass('resizable');
    jQuerOs('.ui-resizable-handle').remove();
    make_resize_grid();
    //resizable
    make_sortable();
    make_droppable();
    makeTabs();
    make_draggable();
    make_showHideTitle();
    del_field();
    del_module();
    makeOptions();
    makeDeleteRow();
    del_layout();
    make_accordion();
    make_colorpicker();
    make_editor();
    makeSearchInFields();
    jQuerOs("#messages").removeClass('cck-spiner');

//    function grid_panel(){
//      jQuerOs('.g_auto, .g_custom, .g_auto_custom').hide();
//      if(jQuerOs('.g_instance_grid select').val() == 1){
//        jQuerOs('.g_auto, .g_custom, .g_auto_custom').show();
//
//        if(jQuerOs('.g_auto_custom select').val() == 'auto'){
//          jQuerOs('.g_auto').show()
//          jQuerOs('.g_custom').hide()
//        }else{
//          jQuerOs('.g_custom').show()
//          jQuerOs('.g_auto').hide()
//        }
//      }  
//      return;
//    }
//
//    grid_panel();
//      
//    jQuerOs('.g_instance_grid select, .g_auto_custom select').change(function(event) {
//      grid_panel();
//    });
    
    function subcat_panel(){
      jQuerOs('#subcat_lay, #subcat_fild_link').hide();
      if(jQuerOs('#vi_sub_category_level').val() == 1){
        jQuerOs('#subcat_lay, #subcat_fild_link').show();

      }  
      return;
    }

    subcat_panel();
      
    jQuerOs('#vi_sub_category_level').change(function(event) {
      subcat_panel();
    });
//end
  });
  
      function hide_img(elem){
      if(elem == ''){
          var elements = jQuerOs('#vi_full_cart_img, #vi_empty_cart_img')
      }else{
          var elements = jQuerOs(elem);
      }
      
      for(var index=0; index < jQuerOs(elements).length; ++index){
          var name = jQuerOs(elements[index]).attr('name');
          
          var selVal = document.getElementById(name);

          if (selVal.options[selVal.selectedIndex].value != ''){
              
              if(name == 'vi_empty_cart_img'){
                  jsimg_emp='<?php echo JURI::ROOT(); ?>images/stories/' + jQuerOs('#vi_empty_cart_img').val();
              }else if(name == 'vi_full_cart_img'){
                  jsimg_full='<?php echo JURI::ROOT(); ?>images/stories/' + jQuerOs('#vi_full_cart_img').val();
              }
              
              jQuerOs('#imagelib_'+name).css("display", "block");
              jQuerOs('#imagelib_'+name).css("height", "110");
              //jQuerOs('#imagelib_'+name).css("float", "right");
              jQuerOs('#imagelib_'+name).css("margin-right", "25px");
          }
          else{
          console.log('33333333333333')
              if(name == 'vi_empty_cart_img'){
                  jsimg_emp='<?php echo JURI::ROOT(); ?>components/com_os_cck/images/blank.png';
              }else if(name == 'vi_full_cart_img'){
                  jsimg_full='<?php echo JURI::ROOT(); ?>components/com_os_cck/images/blank.png';
              }
              jQuerOs('#imagelib_'+name).css("display", "none");
          }
      }
    }

    hide_img('');
      
    jQuerOs('#vi_empty_cart_img, #vi_full_cart_img').on('change', function() {
      hide_img(this);
    });
    
    jQuerOs('#empty_cart_img_demo').html('<img src=' + jsimg_emp + ' name="imagelib_vi_empty_cart_img" id="imagelib_vi_empty_cart_img" '+
                                                     'border="2" alt="<?php echo JText::_('COM_OS_CCK_CATEGORIES_IMAGEPREVIEW');?>" />');
    jQuerOs('#full_cart_img_demo').html('<img src=' + jsimg_full + ' name="imagelib_vi_full_cart_img" id="imagelib_vi_full_cart_img" '+
                                                     'border="2" alt="<?php echo JText::_('COM_OS_CCK_CATEGORIES_IMAGEPREVIEW');?>" />');
    
    function height_img(){
        //var selVal = jQuerOs('#vi_empty_cart_img');
        
        if (jQuerOs('#vi_empty_cart_img').val() != ''){
            jQuerOs('#imagelib_vi_empty_cart_img').css("height", "110");
            //jQuerOs('#imagelib_vi_empty_cart_img').css("float", "right");
            jQuerOs('#imagelib_vi_empty_cart_img').css("margin-right", "25px");
        }else{
            jQuerOs('#imagelib_vi_empty_cart_img').css("height", "0");
        }
        
        if (jQuerOs('#vi_full_cart_img').val() != ''){
            jQuerOs('#imagelib_vi_full_cart_img').css("height", "110");
            //jQuerOs('#imagelib_vi_full_cart_img').css("float", "right");
            jQuerOs('#imagelib_vi_full_cart_img').css("margin-right", "25px");
        }else{
            jQuerOs('#imagelib_vi_full_cart_img').css("height", "0");
        }
    }
    height_img();
    
    function showHideImgOptionsEmptyCart(){
        var type = jQuerOs('#vi_empty_cart_img_type').val();
        
        if(type == 'img'){
            jQuerOs('#emty_cart_type_img').show();
            jQuerOs('#emty_cart_type_icon').hide();
        }else if(type == 'icon'){
            jQuerOs('#emty_cart_type_img').hide();
            jQuerOs('#emty_cart_type_icon').show();
        }
    }
    showHideImgOptionsEmptyCart();
    
    jQuerOs('#vi_empty_cart_img_type').on('change', function(){
        showHideImgOptionsEmptyCart()
    });
    
    function showHideImgOptionsFullCart(){
        var type = jQuerOs('#vi_full_cart_img_type').val();
        
        if(type == 'img'){
            jQuerOs('#full_cart_type_img').show();
            jQuerOs('#full_cart_type_icon').hide();
        }else if(type == 'icon'){
            jQuerOs('#full_cart_type_img').hide();
            jQuerOs('#full_cart_type_icon').show();
        }
    }
    showHideImgOptionsFullCart();
    
    jQuerOs('#vi_full_cart_img_type').on('change', function(){
        showHideImgOptionsFullCart()
    });
// --------------------------------------------------READY BLOCK END-----------------------------\\
</script>
