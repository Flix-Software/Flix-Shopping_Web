<?php
/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/

//var_dump(stripos($layout->html, 'Date of start 2'));

defined('_JEXEC') or die;
//getting all params
//var_dump($database); exit;
$layout_params = unserialize($layout->params);

$layout_params['unique_fields'] = ($layout->custom_fields)?unserialize($layout->custom_fields):array();
$child_entities = (isset($layout_params['child_entities'])) ? $layout_params['child_entities'] : '';
//var_dump($child_entities);
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
$counter_calc_price = (isset($layout_params['calculated_price_fields']) && count($layout_params['calculated_price_fields']))? max(array_keys($layout_params['calculated_price_fields']))+1 : 1 ;
$fields = $entity->getFieldList();
$fields_from_params = (isset($layout_params['fields']))?$layout_params['fields']:array();

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root() . "components/com_os_cck/assets/css/editLayout.css");

//custom field
$custom_code_field = new stdClass();
$custom_code_field->label = JText::_("COM_OS_CCK_CATEGORY_UNIQUE_CODE_FIELD");
$custom_code_field->db_field_name = 'custom_code_field';
$custom_code_field->description = '';
//end
$cck_instance_navigation = new stdClass();
$cck_instance_navigation->label = JText::_("COM_OS_CCK_INSTANCE_NAVIGATION");
$cck_instance_navigation->db_field_name = 'cck_instance_navigation';
$cck_instance_navigation->field_type = 'instance_navigation';
$cck_instance_navigation->description = '';

//calendat import
// $cck_cal_import = new stdClass();
// $cck_cal_import->label = JText::_("COM_OS_CCK_LAYOUT_CALENDAR_IMPORT");
// $cck_cal_import->db_field_name = 'cck_cal_import';
// $cck_cal_import->field_type = 'export_to_calendar';
// $cck_cal_import->description = '';

//booking calendar
$cck_booking_cal = new stdClass();
$cck_booking_cal->label = JText::_("COM_OS_CCK_LAYOUT_BOOKING_CALENDAR");
$cck_booking_cal->db_field_name = 'cck_booking_cal';
$cck_booking_cal->field_type = 'booking_calendar';
$cck_booking_cal->description = '';

//calculated price
$cck_calculated_price = new stdClass();
$cck_calculated_price->label = JText::_("COM_OS_CCK_CALCULATED_PRICE");
$cck_calculated_price->db_field_name = 'cck_calculated_price';
$cck_calculated_price->field_type = 'calculated_price';
$cck_calculated_price->description = '';

//Add to cart button
$cck_add_to_cart = new stdClass();
$cck_add_to_cart->label = JText::_("COM_OS_CCK_ADD_TO_CART");
$cck_add_to_cart->db_field_name = 'cck_add_to_cart_button';
//$cck_add_to_cart->field_type = 'add_to_cart_button';
$cck_add_to_cart->field_type = 'send_button';
$cck_add_to_cart->description = '';


$unique_fields = array($cck_instance_navigation, $cck_booking_cal, $cck_add_to_cart);
//$unique_fields = array($cck_instance_navigation, $cck_cal_import);
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
    noticeLinkToDocLayout('instance_layout', 'Show Instance layout', 'http://ordasoft.com/News/OS-CCK-Documentation/cck-term-explanation.html#Show Layout');
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
                        echo  (isset($fields_from_params['showName_'.$custom_code_field->db_field_name.'_'.$counter])
                                || !$layout->lid)?
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
         
        <!-- calculated price block for field --> 
        <div class="field-block">
          <div>
            <!-- popover back/front title -->
            <span class="field-name <?php echo $cck_calculated_price->db_field_name.'-'.$counter_calc_price.'-label-hidden';
                        echo  (isset($fields_from_params['showName_'.$cck_calculated_price->db_field_name.'_'.$counter_calc_price])
                                || !$layout->lid)?
                               '':
                               ' hide-field-name-'.$cck_calculated_price->db_field_name.'_'.$counter_calc_price;?> cck_calculated_price"
                data-field-name="<?php echo $cck_calculated_price->db_field_name.'_'.$counter_calc_price; ?>">
                <?php echo $cck_calculated_price->label; ?>
            </span>
            <span class="col_box admin_aria_hidden">
              <?php echo '{|f-'.$cck_calculated_price->db_field_name.'_'.$counter_calc_price.'|}'; ?>
            </span>
            <input class="f-params" name="<?php echo 'fi_Params_'.$cck_calculated_price->db_field_name.'_'.$counter_calc_price ?>" type="hidden" value="{}">
            
          </div>
        </div>
        <!--END calculate price block for field --> 
        
        <?php
        foreach($unique_fields as $field){?>
          <!-- block for field -->
          <div class="field-block">
            <div>
              <!-- popover back/front title -->
              <span class="field-name <?php echo $field->db_field_name.'-label-hidden';
                                 ' hide-field-name-'.$field->db_field_name;?>"
                  data-field-name="<?php echo $field->db_field_name; ?>">
                  <?php echo $field->label; ?>
              </span>
              <span class="col_box admin_aria_hidden">
                <?php echo '{|f-'.$field->db_field_name.'|}'; ?>
              </span>
              <input class="f-params" name="<?php echo 'fi_Params_'.$field->db_field_name ?>" type="hidden" value="{}">
            </div>

          </div> 
          <!--END block for field -->
          <?php
        }

        //skip child selects get ids
          $params = new JRegistry;
          $childs_list = [];
          foreach ($fields as $value) {
            $params->loadString($value->params);
            $childs_list = array_merge($childs_list, explode('|',$params->get('child_select')));
          }
          $childs_list = array_unique($childs_list);
        //skip child selects get ids

        for ($i = 0; $i < count($fields); $i++) {
          $field = $fields[$i];
          //skip child selects
            if(in_array($field->fid, $childs_list))continue;
          //skip child selects 
          if($field->field_type == 'captcha_field')
            continue;
          $required = isset($fields_from_params[$field->db_field_name.'_required']) && $fields_from_params[$field->db_field_name.'_required'] == 'on'?true:false;
          if($field->published == "1"){ ?>
          <!-- block for field -->
            <div class="field-block">
              <div>
                <?php
                if(isset($fields_from_params['description_'.$field->db_field_name])){?>
                  <!-- <span class="cck-help-string" data-field-name="<?php echo $field->db_field_name?>"><?php echo $fields_from_params[$field->db_field_name.'_tooltip']?></span> -->
                  <?php
                }?>
                <span class="field-name
                      <?php echo $field->db_field_name.'-label-hidden';
                                echo (isset($fields_from_params['showName_'.$field->db_field_name])
                                      || !$layout->lid)?
                                       '':
                                       ' hide-field-name-'.$field->db_field_name;?>"
                          data-field-name="<?php echo $field->db_field_name; ?>"
                          data-field-type="<?php echo $field->field_type?>"
                          rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $field->field_type;?>">
                    <!-- clear back/front title -->
                    <span class="<?php echo $field->db_field_name;?>_label_icon_prefix_hidden"></span>
                    <span class="field_alias">
                        <?php echo $field->field_name . ($required?'*' : ''); ?>
                    </span>
                    <span class="<?php echo $field->db_field_name;?>_label_icon_suffix_hidden"></span>
                </span>
                <span class="col_box admin_aria_hidden" fid="<?php echo $field->fid; ?>">
                  <?php echo '{|f-'.$field->fid.'|}'; ?>
                </span>
                 <i class="f-parent" fid="<?php if($field->field_type == 'text_select_list')echo $field->fid;?>" style="display: none;"><?php if($field->field_type == 'text_select_list')echo '{|f-parent-'.$field->fid.'|}';?></i>
                <input class="f-params" name="<?php echo 'fi_Params_'.$field->db_field_name ?>" type="hidden" value="{}">
              </div>
            </div>
            <!--END block for field -->
            <?php
          }
        } ?>

        <!-- new field block -->
        <!--div id="new-field-block">
          <input id="add-field" class="new-field" type="button" aria-invalid="false" value="Add New">
        </div-->
        <!-- End new field block -->

        <!-- attached block -->
        <div id="attached-block">
          <div class="layout-title">Attach Layouts</div>
          <input id="add-layout" class="new-layout" type="button" aria-invalid="false" value="Add New">

          <div class="layout-title">Attach Modules</div>
          <input id="add-module" class="new-layout" type="button" aria-invalid="false" value="Add New">
          
          <div class="layout-title">Attach Child Enteties</div>
          <input id="add-child-enteties" class="new-layout" type="button" aria-invalid="false" value="Add New">
        </div>
        <!-- End attached block -->
      </div>
      <!-- END all fields block -->

      <!-- editor main aria -->
      <div id="editor-block" class="col-lg-7 col-md-6 col-sm-8 col-xs-12">
        <div id="content-block">
            <?php //var_dump(substr($layout->html, 4000, 4100)); ?>
          <?php echo (isset($layout->html))?$layout->html:'';?>
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
              
              for ($i = 0; $i < count($fields); $i++){
                $field = $fields[$i];
                if($field->published == "1" && $field->field_type != "captcha_field"){
                  echo show_edite_add_form_field_layout($field, 'show',$fields_from_params,$layout->type,$layout); 
                }
              }
              if(isset($child_entities) && is_array($child_entities) && !empty($child_entities)){
                  foreach($child_entities as $temp_child_entity){
                      $field = new os_cckEntityField($db);
                      $field->load($temp_child_entity->childEntityFields);
                      $field->db_field_name = $temp_child_entity->data_field_name; 
                      //var_dump($field);
                      if($field->published == "1" && $field->field_type != "captcha_field"){
                        echo show_edite_add_form_field_layout($field, 'show',$fields_from_params,$layout->type,$layout);
                      }
                      
                  }
              }

              foreach ($unique_fields as $field) {
                //require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'instance_layout', 'fieldUniq');
                   require getAdminFiledSettingsViewPath('com_os_cck', 'unique', $field->field_type);
              }
              
              if(count($layout_params['unique_fields'])){
                foreach ($layout_params['unique_fields'] as $key => $custom_options){
                  //require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'instance_layout', 'customField');
                    require getAdminFiledSettingsViewPath('com_os_cck', 'unique', 'custom_code');
                }
              }
              //var_dump($layout_params['views']);
              if(isset($layout_params['views']['show_request_layout'])){
                foreach ($layout_params['views']['show_request_layout'] as $key => $value) {
                  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'instance_layout', 'layoutOptions');
                }
              }
              if($counter_calc_price){
                  if(isset($layout_params['calculated_price_fields'])){
                      foreach($layout_params['calculated_price_fields'] as $key=>$val){
                          $field = new stdClass;
                          $field->db_field_name = 'cck_calculated_price_' . ($key);
                          require getAdminFiledSettingsViewPath('com_os_cck', 'unique', 'calculated_price');
                          //require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'instance_layout', 'fieldUniq');

                      }
                  }
              }
              
               ?>
            </div>


            <h3><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_FIELDS_CSS_OPTIONS") ?></h3>
            <div class="styling-field-content">
              <?php
                styling_options($layout,'f');
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

            <!--   <div class="category-options">
                <label><?php echo JText::_('COM_OS_CCK_LAYOUT_SHOW_NAVIGATION'); ?></label>
                <?php echo $layout->show_navigation; ?>
              </div> -->
         <!--      <div class="category-options">
                <label><?php echo JText::_('COM_OS_CCK_LAYOUT_REVIEWS'); ?></label>
                <?php echo $layout->show_reviews;  ?>
              </div> -->

            </div>
            <h3><?php echo JText::_("COM_OS_CCK_STYLING_LABEL_ACCORDION_FORM_CSS_OPTIONS")?></h3>
            <div class="styling-form-content">
              <?php styling_options($layout,'form');?>
            </div>
          </div>
        </div>
  </div>
      
</div>
<!-- END main drag-drop aria -->

<!-- ADD MODALS -->
<?php
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'editor-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'location-field-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'field-custom-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'field-php-show-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'add-field-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'layout-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'attached-layout-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'attached-module-modal');
  require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'attached-child-enteties-modal');
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

<!-- script for drag/drop -->
<script type="text/javascript">
  //counters block
  var cust_count = <?php echo $counter?>;
  var counter_calc_price = <?php echo $counter_calc_price; ?>
//end
 
  //fn drop for rows
  function make_droppable(){
      
    jQuerOs(".drop-area").droppable({
      activeClass: "activeDroppable",
      accept: ".field-block, .attached-layout-block, .attached-module-block, .attached-child-entity-block",
      drop: function( event, ui ) {
          
        var draggable = ui.draggable;
        draggable.find("div:first-child").addClass("drop-item");

         var f_parent = draggable.find("div:first-child").find('i.f-parent');
        draggable.find("div:first-child").after('<i class="f-parent" fid="'+f_parent.attr('fid')+'" style="display: none;">'+f_parent.text()+'</i>');
        f_parent.remove();

        if(draggable.hasClass("field-block")){
          //field block
          delete_button = '<span class="delete-field"></span>';
          inform_button = '<span class="f-inform-button"></span>';
        }else if(draggable.hasClass("attached-module-block")){
          inform_button = '<span class="m-inform-button"></span>';
          delete_button = '<span class="delete-module"></span>';
        }else if(draggable.hasClass("attached-child-entity-block")){
          inform_button = '<span class="e-inform-button"></span>';
          delete_button = '<span class="delete-child-entity"></span>';
        }else{
          //attached layout block
          inform_button = '<span class="l-inform-button"></span>';
          delete_button = '<span class="delete-layout"></span>';
        }
        draggable.find(".drop-item").prepend(inform_button);
        draggable.find(".drop-item").append(delete_button);

        //show name // test
        if(draggable.find(".field-name").length
            && draggable.find(".field-name").data("field-name").indexOf("custom_code_field_") == -1){
          jQuerOs("input[name='fi_showName_"+draggable.find(".field-name").data("field-name")+"']").prop("checked", true);
          draggable.find(".field-name").removeClass('hide-field-name-'+draggable.find(".field-name").data("field-name"));
        }

        jQuerOs(this).append(draggable.html());
        if(draggable.hasClass("field-block")){
          
          //field block
          del_field();
          hide_options();
          if(!jQuerOs("#options-field-"+draggable.find(".field-name").data('field-name')).length){
            addFieldOptions(draggable.find(".field-name").data('field-name'));
          }
          makeOptions();
          jQuerOs("#field_options #options-field-"+draggable.find(".field-name").data("field-name")).show();
        }else if(draggable.hasClass("attached-module-block")){
          
          hide_options();
          makeOptions();
          del_module();
          addHiddenModuleIds(draggable.find(".module-name").data("field-name"));//(modId)
        }else if(draggable.hasClass("attached-child-entity-block")){
          
          hide_options();
          makeOptions();
          del_child_entity();
          //addHiddenModuleIds(draggable.find(".module-name").data("field-name"));//(modId)
        }else{
          
          //attached layout block
          addOptionForLayout(draggable.find(".layout-name").data("field-name"));
          hide_options();
          del_layout();
          makeOptions();
          make_showHideTitle();
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
          add_unique_option(cust_count, true);
          make_showHideTitle();
          hide_options();
          makeOptions();
          jQuerOs("#field_options #options-field-custom_code_field_"+(cust_count-1)).show();
          //end
        }else if(draggable.find(".field-name").length
            && draggable.find(".field-name").data("field-name").indexOf("cck_calculated_price") >= 0){
                      counter_calc_price++;
          //delete current class
          draggable.find(".field-name").removeClass("hide-field-name-"+jQuerOs(this).find(".field-name").data("field-name"));
          //delete previos class
          draggable.find(".field-name").removeClass("hide-field-name-cck_calculated_price_"+(counter_calc_price-1));
          draggable.find(".field-name").removeClass("cck_calculated_price-"+(counter_calc_price-1)+"-label-hidden");
          //add new class
          draggable.find(".field-name").addClass("hide-field-name-cck_calculated_price_"+counter_calc_price);
          draggable.find(".field-name").addClass("cck_calculated_price-"+(counter_calc_price)+"-label-hidden");
          //change curent data-field-name
          draggable.find(".field-name").attr("data-field-name","cck_calculated_price_"+(counter_calc_price));
          //change current hfield hidden
          draggable.find(".admin_aria_hidden").text("{|f-cck_calculated_price_"+counter_calc_price+"|}");
          //remove x buttons
          draggable.find(".f-inform-button").remove();
          draggable.find(".delete-field").remove();
          //end
          //start dinamic create unique option
          add_option_calculated_price(counter_calc_price);
          make_showHideTitle();
          hide_options();
          makeOptions();
          jQuerOs("#field_options #options-field-cck_calculated_price_"+(counter_calc_price-1)).show();
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
    make_attached_child_enteties();
    changeChildFieldName()
    make_field_mask_custom();
    make_field_mask_php_show();
    make_font_awesom_modal();
    make_popover();
    make_remove_joomla_bars();
    make_synchronize_fields();
    make_synchronize_layout();
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
    del_child_entity()
    makeOptions();
    makeDeleteRow();
    del_layout();
    make_accordion();
    make_colorpicker();
    make_editor();
    make_add_field();
    makeSearchInFields();
    jQuerOs("#messages").removeClass('cck-spiner');

//end
  });

  // jQuerOs(window).load(function(){
  //   make_resize_grid();
  // })
// --------------------------------------------------READY BLOCK END-----------------------------\\
</script>
