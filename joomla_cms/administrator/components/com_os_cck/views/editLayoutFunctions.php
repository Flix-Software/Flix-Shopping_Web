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
<script type="text/javascript">
  //default accordion active state
  var fieldActiveState = 0;
  var formActiveState = 0;
  var blockActiveState = 0;
  var debug = false;
  //fn for saving accordion state
  function saveAccordionState(){
    if(debug){
      console.log('saveAccordionState()');
    }
    fieldActiveState = jQuerOs( "#fields-options-accordion" ).accordion( "option", "active" );
    if(fieldActiveState == false) fieldActiveState = 0;
    formActiveState = jQuerOs( "#form-options-accordion" ).accordion( "option", "active" );
    if(formActiveState == false) formActiveState = 0;
    blockActiveState = jQuerOs( "#block-options-accordion" ).accordion( "option", "active" );
    if(blockActiveState == false) blockActiveState = 0;
  }
//end
  //fn for find position of dom obj
    function findPosY(obj) {
      if(debug){
      console.log('findPosY('+obj+')');
      }
      var curtop = 0;
      if(obj.offsetParent){
        while(1){
          curtop+=obj.offsetTop;
          if(!obj.offsetParent){
            break;
          }
          obj=obj.offsetParent;
        }
      }else if (obj.y){
        curtop+=obj.y;
      }
      return curtop-100;
    }
  //end
    //fn for layout field after drop// adding options
    function addOptionForLayout(key){
      if(debug){
        console.log('addOptionForLayout('+key+')');
      }
      jQuerOs.post("index.php?option=com_os_cck&task=addOptionForLayout&key="+key+"&lid="+jQuerOs("#lid").val()+"&layout_type="+jQuerOs("[name='type']").val()+"&entity_id="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
      {},
      function (data) {
        //jQuerOs("#ui-accordion-fields-options-accordion-panel-0").append(data.html);
        jQuerOs(".main-fields-options").append(data.html);
        jQuerOs(".main-fields-content select[id^='vi_show_type_']").on('change',function() {
          if(jQuerOs(this).val() != 1){
            jQuerOs("#ui-accordion-fields-options-accordion-header-1").slideDown();
            jQuerOs('#styling-f>div,h2').not('.style-for-block').hide();
          }else{
            jQuerOs("#ui-accordion-fields-options-accordion-header-1, #ui-accordion-fields-options-accordion-panel-1").slideUp();
          }
        });
      } , 'json' );

      if('<?php echo $layout->type; ?>' == 'parent_child'){
        addOptionForOrderByInParentChildLayout(key);
        addFieldMaskForSqlWhereLayoutOptionByInParentChildLayout(key);
      }
    }
  //end

    //insert text in cursor place
    jQuerOs.fn.extend({
        insertAtCaret: function(myValue){
            return this.each(function(i) {
                if (document.selection) {
                    // Для браузеров типа Internet Explorer
                    this.focus();
                    var sel = document.selection.createRange();
                    sel.text = myValue;
                    this.focus();
                }
                else if (this.selectionStart || this.selectionStart == '0') {
                    // Для браузеров типа Firefox и других Webkit-ов
                    var startPos = this.selectionStart;
                    var endPos = this.selectionEnd;
                    var scrollTop = this.scrollTop;
                    this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
                    this.focus();
                    this.selectionStart = startPos + myValue.length;
                    this.selectionEnd = startPos + myValue.length;
                    this.scrollTop = scrollTop;
                } else {
                    this.value += myValue;
                    this.focus();
                }
            })
        }
    });
    //insert text in cursor place

    //fn for addMask
    function addMask(mask){
      if(debug){
        console.log('addMask('+mask+')');
      }
      
      //if this is mail field 
       var mail_body = jQuerOs("#cck_mail_body").val();
       mail_body += ' '+mask;
      jQuerOs("#cck_mail_body").val(mail_body);
      jQuerOs('#field-mail-modal').modal('hide');
    }
  //end

      

  //fn for addMaskCustom
    function addMaskCustom(mask){
      if(debug){
        console.log('addMaskCustom('+mask+')');
      }
      //if this is custom field 
      var custom_body_name = jQuerOs('#field-custom-modal').attr('custom_code_field_name');
      // var custom_body = jQuerOs(".custom-code-editor[name='"+custom_body_name+"']").val();
      // custom_body += ' '+mask;
      jQuerOs(".custom-code-editor[name='"+custom_body_name+"']").insertAtCaret(mask);

      jQuerOs('#field-custom-modal').modal('hide');
    }
  //end
  
    //fn for addMaskPhpShow
    function addMaskPhpShow(mask){
      if(debug){
        console.log('addMaskPhpShow('+mask+')');
      }
      //if this is custom field 
      var custom_body_name = jQuerOs('#field-php-show-modal').attr('custom_code_field_name');
      // var custom_body = jQuerOs(".custom-code-editor[name='"+custom_body_name+"']").val();
      // custom_body += ' '+mask;
      jQuerOs(".php-show-editor[name='"+custom_body_name+"']").insertAtCaret(mask);

      jQuerOs('#field-php-show-modal').modal('hide');
    }
  //end
  
  //fn for addMaskSQLShow
    function addMaskSqlShow(mask){
      if(debug){
        console.log('addMaskSqlShow('+mask+')');
      }
      //if this is custom field 
      var custom_body_name = jQuerOs('#field-sql-show-modal').attr('custom_code_field_name');
      // var custom_body = jQuerOs(".custom-code-editor[name='"+custom_body_name+"']").val();
      // custom_body += ' '+mask;
      jQuerOs(".sql-show-editor[name='"+custom_body_name+"']").insertAtCaret(mask);

      jQuerOs('#field-sql-show-modal').modal('hide');
    }
  //end
  
    //fn for saving module ids in layout params
    function addHiddenModuleIds(modId){
      if(debug){
        console.log('addHiddenModuleIds('+modId+')');
      }
      if(jQuerOs("#attached_module_ids").attr("value")){
        modId = jQuerOs("#attached_module_ids").attr("value")+'|_|'+modId+'|_|';
        jQuerOs("#attached_module_ids").attr("value",modId);
      }else{
        modId = '|_|'+modId+'|_|';
        jQuerOs("#attached_module_ids").attr("value",modId);
      }
    }
  //end
    //delete from hiden module ids
    function deleteModuleIds(modId){
      if(debug){
        console.log('deleteModuleIds('+modId+')');
      }
      moduleIds = jQuerOs("#attached_module_ids").attr("value");
      moduleIds = moduleIds.replace('|_|'+modId+'|_|','');
      jQuerOs("#attached_module_ids").attr("value",moduleIds);
    }
  //end
  
    //fn for unique options
    function add_unique_option(count, showAddFieldButton = false){
      if(debug){
        console.log('add_unique_option('+count+')');
      }
      count--;
      
      db_field_name = '<?php echo $custom_code_field->db_field_name ?>'+'_'+(count);
      check_access_fields = '<?php echo (isset($cck_entity_configuration[$layout->fk_eid])) ? $cck_entity_configuration[$layout->fk_eid]['check_access_fields'] : '1'?>';
      
      html = '<div id="options-field-custom_code_field_'+(count)+'">'+
                '<div style="display:none;"><label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label> <input type="checkbox" data-field-name="'+db_field_name+'" name="code_field_unique['+(count)+'][showName_'+db_field_name+']" ></div>'+
                '<div style="display:none;"><label><?php echo JText::_("COM_OS_CCK_LABEL_PREFIX")?></label> <input type="text" size="4" name="code_field_unique['+(count)+']['+db_field_name+'_prefix]"  value="" ></div>'+
                '<div style="display:none;"><label><?php echo JText::_("COM_OS_CCK_LABEL_SUFFIX")?></label> <input type="text" size="4" name="code_field_unique['+(count)+']['+db_field_name+'_suffix]"  value="" ></div>';
      if(check_access_fields == 1){
        html += '<div><label>Access</label>'+
                  '<select class="inputbox" multiple="multiple" name="code_field_unique['+(count)+']['+db_field_name+'_access][]">';
                    <?php
                    foreach($layout->gtree as $value){ ?>
                      html +='<option <?php echo ($value->value == "1")? "selected" :""; ?>'+
                              ' value="<?php echo $value->value; ?>"><?php echo $value->text; ?></option>';
                      <?php
                    } ?>
        html += '</select></div>';
      }


        if(showAddFieldButton){
          var addFieldButton = '<input id="add-field-mask-custom" class="new-mask" type="button" aria-invalid="false" value="+field">';
        }else{
          var addFieldButton = '';
        }

        html += '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_CUSTOM_CODE_TYPE") ?></label>'+
                    '<select class="editor-type" rows="10" cols="30" name="code_field_unique['+(count)+']['+db_field_name+'_custom_code_type]">'+
                      '<option value="TEXT">TEXT</option>'+
                      '<option value="HTML">HTML</option>'+
                      '<option value="PHP">PHP</option>'+
                      '<option value="SCRIPT">SCRIPT</option>'+
                      '<option value="CSS">CSS</option>'+
                    '</select></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_CUSTOM_CODE") ?></label>'+addFieldButton+'<span class="editor-button">Editor</span> <textarea class="custom-code-editor" rows="10" cols="30" name="code_field_unique['+(count)+']['+db_field_name+'_custom_code]"></textarea></div>'+
              '</div>';
      //jQuerOs("#ui-accordion-fields-options-accordion-panel-0").append(html);
      jQuerOs(".main-fields-options").append(html);
    }
  //end
  
  //fn for unique options
    function add_option_calculated_price(count, showAddFieldButton = false){
      if(debug){
        console.log('add_option_calculated_price('+count+')');
      }
      count--;
      db_field_name = '<?php echo (isset($cck_calculated_price->db_field_name)) ? $cck_calculated_price->db_field_name : ''; ?>'+'_'+(count);
      name = 'Calculated Price '+' '+(count);
      check_access_fields = '<?php echo (isset($cck_entity_configuration[$layout->fk_eid])) ? $cck_entity_configuration[$layout->fk_eid]['check_access_fields'] : '1'?>';
      html = '<div id="options-field-'+db_field_name+'">'+
                '<div><input type="hidden" data-field-name="'+db_field_name+'" name="fi_showName_'+db_field_name+'" checked="true" value="0"><label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label><input type="checkbox" data-field-name="'+db_field_name+'" name="fi_showName_'+db_field_name+'" checked="true"></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_ALIAS")?></label><input type="text" size="4" name="fi_'+db_field_name+'_alias" value="'+name+'"></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_CALCULATION_ORDER")?></label>' +
                    '<select id="fi_'+db_field_name+'_calculation_order" name="fi_'+db_field_name+'_calculation_order">';
                    html += '<option value="0" disabled="disabled">0</option>';
                    html += '<option value="1" selected="selected">1</option>'
                    for(var index = 2; index < 51; index++){
                        html += '<option value="'+index+'">'+index+'</option>'
                    }
                html +=  '</select></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DESCRIPTION")?></label><input type="checkbox" data-field-name="'+db_field_name+'" name="fi_description'+db_field_name+'" checked="true"></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_TOOLTIP")?></label><input type="text" size="4" name="fi_'+db_field_name+'_tooltip" value=""></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_PREFIX")?></label><input type="text" size="4" name="fi_'+db_field_name+'_prefix" value=""></div>'+
                '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_SUFFIX")?></label><input type="text" size="4" name="fi_'+db_field_name+'_suffix" value=""></div>';
                if(check_access_fields == 1){
                  html += '<div><label>Access</label>'+
                  '<select multiple="multiple" name="fi_access_'+db_field_name+'[]">';
                    <?php
                    foreach($layout->gtree as $value){ ?>
                      html +='<option <?php echo ($value->value == "1")? "selected" :""; ?>'+
                              ' value="<?php echo $value->value; ?>"><?php echo $value->text; ?></option>';
                      <?php
                    } ?>
                html +=  '</select></div>';
                }
                html += '<div><label><?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW") ?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_PHP_SHOW_DESC_FOR_JS")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>'+
                '<input id="add-field-mask-php-show" class="new-mask" type="button" aria-invalid="false" value="+field">'+
                '<span class="editor-button">Editor</span>'+
                '<textarea class="php-show-editor" rows="5" cols="30" name="fi_'+db_field_name+'_php_show"></textarea>'+
              '</div><input name="cck_calculated_price['+count+']" type="hidden" value="{}">';
      //jQuerOs("#ui-accordion-fields-options-accordion-panel-0").append(html);
      jQuerOs(".main-fields-options").append(html);
    }
  //end

    //fn for empty title
    function empty_title(){
      if(debug){
        console.log('empty_title()');
      }
      window.scrollTo(0,findPosY(jQuerOs('#layout-title'))-100);
      jQuerOs('#layout-title input').attr("placeholder", "<?php echo JText::_('COM_OS_CCK_LAYOUT_ERROR_TITLE'); ?>");
      jQuerOs('#layout-title input').css("border-color","#FF0000");
      jQuerOs('#layout-title input').css("color","#FF0000");
      jQuerOs('#layout-title input').keypress(function() {
        jQuerOs('#layout-title input').css("border-color","gray");
        jQuerOs('#layout-title input').css("color","inherit");
      });
    }
  //end
    //fn fot delete row
    function del_field(){
      if(debug){
        console.log('del_field()');
      }

   

      jQuerOs("#content-block .delete-field").on('click',function() {
        if(debug){
          console.log('#content-block .delete-field::click');
        }

        field_block = jQuerOs(this).parent();

        var f_parent = field_block.next('i.f-parent');
        field_block.next('i.f-parent').remove();

        jQuerOs(this).parent().remove();

        field_block.find('.col_box.admin_aria_hidden').after(f_parent);

        //check unique fields
        if(jQuerOs(field_block).find(".field-name")){
          if(jQuerOs(field_block).find(".field-name").data("field-name").indexOf("custom_code_field_") >= 0
              || jQuerOs(field_block).find(".field-name").data("field-name") == 'joom_pagination'
              || jQuerOs(field_block).find(".field-name").data("field-name") == 'joom_alphabetical'
              || jQuerOs(field_block).find(".field-name").data("field-name") == 'calendar_month_year'
              || jQuerOs(field_block).find(".field-name").data("field-name") == 'calendar_pagination'
              || jQuerOs(field_block).find(".field-name").data("field-name").indexOf("cck_calculated_price_") >= 0
              ){
            // jQuerOs("#options-field-"+jQuerOs(field_block).find(".field-name").data("field-name")).remove();
            return;
          }
        }

        //return field to fields-block
        field_block.find(".delete-field, .f-inform-button").remove();
        field_block.removeClass("drop-item").addClass("field-block");
        field_block.wrapInner( "<div></div>" )
        if(jQuerOs("#new-field-block").length){
          jQuerOs("#new-field-block").before(field_block);
        }else{
          jQuerOs("#attached-block").before(field_block);

        }

        make_draggable();
        
      });
    }
  //end
    //fn fo delete layout row
    function del_layout(){
      if(debug){
        console.log('del_layout()');
      }
      jQuerOs("#content-block .delete-layout").on('click',function() {
        if(debug){
          console.log('#content-block .delete-layout::click');
        }
        var closest_resizable = jQuerOs(this).closest('.resizable')
        field_block = jQuerOs(this).parent();
        field_block.find(".delete-layout, .l-inform-button").remove();
        field_block.removeClass("drop-item").addClass("attached-layout-block");
        field_block.wrapInner( "<div></div>" )
        //removing options for this field
        jQuerOs("#options-field-"+field_block.find(".layout-name").data("field-name")).remove();
        jQuerOs(this).parent().remove();
        jQuerOs("#add-layout").before(field_block);
        make_attachedDraggable();
      });
    }
  //end
    //fn fo delete module row
    function del_module(){
      if(debug){
        console.log('del_module()');
      }
      jQuerOs("#content-block .delete-module").on('click',function() {
        if(debug){
          console.log('#content-block .delete-module::click');
        }
        var closest_resizable = jQuerOs(this).closest('.resizable')
        field_block = jQuerOs(this).parent();
        //del module id from moduleIds value
        deleteModuleIds(field_block.find(".module-name").data("field-name"));
      //end
        field_block.find(".delete-module, .m-inform-button").remove();
        field_block.removeClass("drop-item").addClass("attached-module-block");
        field_block.wrapInner( "<div></div>" )
        //removing options for this field
        jQuerOs("#options-field-"+field_block.find(".module-name").data("field-name")).remove();
        jQuerOs(this).parent().remove();
        jQuerOs("#add-module").before(field_block);
        make_attachedDraggable();
      });
    }
  //end
  //
  function del_child_entity(){
      if(debug){
        console.log('del_module()');
      }
      
      jQuerOs("#content-block .delete-child-entity").on('click',function() {
        if(debug){
          console.log('#content-block .delete-child-entity::click');
        }
        var closest_resizable = jQuerOs(this).closest('.resizable')
        field_block = jQuerOs(this).parent();
        //del module id from moduleIds value
        //deleteModuleIds(field_block.find(".module-name").data("field-name"));
      //end
        field_block.find(".delete-child-entity, .e-inform-button").remove();
        field_block.removeClass("drop-item").addClass("attached-child-entity-block");
        field_block.wrapInner( "<div></div>" )
        //removing options for this field
        jQuerOs("#options-field-"+field_block.find(".entity-name").data("field-name")).remove();
        jQuerOs(this).parent().remove();
        jQuerOs("#add-child-enteties").before(field_block);
        make_attachedDraggable();
      });
    }
    //fn for adding attached layout
    function addAttachedLayout(lid, lname){
      if(debug){
        console.log('addAttachedLayout('+lid+','+lname+')');
      }
      html_item = '<div class="attached-layout-block ">'+
                    '<div>'+
                      '<span class="layout-name '+lid+'-label-hidden" data-field-name="'+lid+'" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Layout ID '+lid+'">'+lname+'</span>'+
                      '<div class="col_box admin_aria_hidden">{|l-'+lid+'|}</div>'+
                      '<input class="f-params" name="fi_Params_l'+lid+'" type="hidden" value="{}">'+
                    '</div>'+
                  '</div>';
      jQuerOs('#attached-layout-modal').modal('hide');
      showSaveButtons();
      jQuerOs("#add-layout").before(html_item);
      jQuerOs("#attached-layout-row-"+lid).remove();
      make_attachedDraggable();
      make_droppable();
    }
  //end
    //fn for adding attached layout
    function addAttachedModule(id, mname){
      if(debug){
        console.log('addAttachedModule('+id+','+mname+')');
      }
      html_item = '<div class="attached-module-block ">'+
                    '<div>'+
                      '<span class="module-name" data-field-name="m_'+id+'">'+mname+'</span>'+
                      '<div class="col_box admin_aria_hidden">{|m-'+id+'|}</div>'+
                    '</div>'+
                  '</div>';
      jQuerOs('#attached-module-modal').modal('hide');
      showSaveButtons();
      jQuerOs("#add-module").before(html_item);
      jQuerOs("#attached-module-row-"+id).remove();
      make_attachedDraggable();
      make_droppable();
    }
  //end
    //fn sfor save label styling
    function save_label_styling(){
      if(debug){
        console.log('save_label_styling()');
      }
      jQuerOs.each( jQuerOs("#content-block .drop-item .field-name,"+
                            "#content-block .drop-item .layout-name,"+
                            "#content-block .drop-item .entity-name"), function(i, element){ 
        if(jQuerOs(element).parent().find(".f-params").val()){
            
        fparams_val = jQuerOs(element).parent().find(".f-params").val();
        if(fparams_val.indexOf('"label_text_align":"left""') > -1){
                
                fparams_val = fparams_val.substring(0, fparams_val.length - 2) + '}';
                
                jQuerOs(element).parent().find(".f-params").val(fparams_val);
            }
            //console.log('labelOptions', jQuerOs(element).parent().find(".f-params").val())
          labelOptions = window.JSON.parse(jQuerOs(element).parent().find(".f-params").val());
          //get value
          field_label_margin_top =labelOptions.labelMarginTop;
          field_label_margin_right =labelOptions.labelMarginRight;
          field_label_margin_bottom = labelOptions.labelMarginBottom;
          field_label_margin_left =labelOptions.labelMarginLeft;
          if(labelOptions.labelMargin){
            field_label_margin_px = 'px';
          }
          else{
            field_label_margin_px = '%';
          }
          if(labelOptions.labelPadding){
            field_label_padding_px = 'px';
          }
          else{
            field_label_padding_px = '%';
          }
          field_label_padding_top = labelOptions.labelPaddingTop;
          field_label_padding_right = labelOptions.labelPaddingRight;
          field_label_padding_bottom = labelOptions.labelPaddingBottom;
          field_label_padding_left = labelOptions.labelPaddingLeft;
          field_label_border = labelOptions.labelBorderSize;
          field_label_custom_class = labelOptions.labelCustomClass;
          field_label_animated = labelOptions.labelAnimated;
          field_label_offset_animated = labelOptions.labelOffsetAnimated;
          field_label_hover_animated = labelOptions.labelHoverAnimated;
          field_hover_animated = labelOptions.hoverAnimated;
          
          field_label_border_color = labelOptions.labelBorderColor;
          field_label_background_color = labelOptions.labelBackgroundColor;
          field_label_font_size = labelOptions.labelFontSize;
          if(typeof(labelOptions.labelFontWeight) == 'undefined'){
            field_label_font_weight = 1;
          }else{
            if(labelOptions.labelFontWeight ==='' || labelOptions.labelFontWeight){
              field_label_font_weight = 1;
            }else{
              field_label_font_weight = 0;
            }
          }
          field_label_font_color = labelOptions.labelFontColor;
          field_label_align_text = labelOptions.label_text_align;
          
          //end
          //set style variables
          label_margin = '';
          if(field_label_margin_top){
            label_margin += 'margin-top:'+field_label_margin_top+field_label_margin_px+';';
          }
          if(field_label_margin_right){
            label_margin += 'margin-right:'+field_label_margin_right+field_label_margin_px+';';
          }
          if(field_label_margin_bottom){
            label_margin += 'margin-bottom:'+field_label_margin_bottom+field_label_margin_px+';';
          }
          if(field_label_margin_left){
            label_margin += 'margin-left:'+field_label_margin_left+field_label_margin_px+';';
          }
          label_padding = '';
          if(field_label_padding_top){
            label_padding += 'padding-top:'+field_label_padding_top+field_label_padding_px+';';
          }
          if(field_label_padding_right){
            label_padding += 'padding-right:'+field_label_padding_right+field_label_padding_px+';';
          }
          if(field_label_padding_bottom){
            label_padding += 'padding-bottom:'+field_label_padding_bottom+field_label_padding_px+';';
          }
          if(field_label_padding_left){
            label_padding += 'padding-left:'+field_label_padding_left+field_label_padding_px+';';
          }
          if(field_label_offset_animated){
              jQuerOs(element).attr('data-wow-offset', field_label_offset_animated);
          }else{
              jQuerOs(element).attr('data-wow-offset', '');
          }
          if(field_label_hover_animated){
              jQuerOs(element).attr('hover_animated', field_label_hover_animated);
          }else{
              jQuerOs(element).attr('hover_animated', '');
          }
          //console.log('element', jQuerOs(element).parent().find(".col_box"))
          if(field_hover_animated && field_hover_animated != 'none'){
               jQuerOs(element).parent().find(".col_box").attr('hover_animated', field_hover_animated);
          }else{
              jQuerOs(element).parent().find(".col_box").attr('hover_animated', '');
          }
          if(field_label_custom_class){

            
                if(field_label_custom_class != jQuerOs(element).attr('old_custom_class')){
                    jQuerOs(element).removeClass(jQuerOs(element).attr('old_custom_class'));
                }
              jQuerOs(element).addClass(field_label_custom_class);
              jQuerOs(element).attr('old_custom_class', field_label_custom_class);
            }

            if(field_label_custom_class == ''){

                    jQuerOs(element).removeClass(jQuerOs(element).attr('old_custom_class'));
                    jQuerOs(element).attr('old_custom_class', field_label_custom_class);

            }
        
            if(field_label_animated){


                if(field_label_animated != jQuerOs(element).attr('old_animate')){
                    jQuerOs(element).removeClass(jQuerOs(element).attr('old_animate'));
                }
              jQuerOs(element).addClass('wow');
              jQuerOs(element).addClass('animate');
              jQuerOs(element).addClass(field_label_animated);
              jQuerOs(element).attr('old_animate', field_label_animated);
            }

            if(field_label_animated == '' || field_label_animated == 'none'){

                    jQuerOs(element).removeClass(jQuerOs(element).attr('old_animate'));
                    jQuerOs(element).removeClass('wow');
                    jQuerOs(element).removeClass('animate');
                    jQuerOs(element).attr('old_animate', field_label_animated);

            }
//          if(field_label_custom_class){
//            jQuerOs(element).addClass(field_label_custom_class);
//          }
//          if(field_label_animated){
//            jQuerOs(element).addClass('wow');
//            jQuerOs(element).addClass('animate');
//            jQuerOs(element).addClass(field_label_animated);
//          }
          label_border = '';
          if(field_label_border){
            if(!field_label_border_color)field_label_border_color = 'white';
            label_border += 'border:'+field_label_border+'px solid '+field_label_border_color+';';
          }
          label_background_color = '';
          if(field_label_background_color){
            label_border += 'background-color:'+field_label_background_color+';';
          }
          label_font_size = '';
          if(field_label_font_size){
            label_font_size += 'font-size:'+field_label_font_size+'px;';
            label_font_size += 'line-height:'+field_label_font_size+'px;';
          }
          label_font_weight = '';
          if(field_label_font_weight){
            label_font_weight += 'font-weight:normal;';
          }else{
            label_font_weight += 'font-weight:bold;';
          }
          label_font_color = '';
          if(field_label_font_color){
            label_font_color += 'color:'+field_label_font_color+';';
          }
          if(field_label_align_text){
            field_label_align_text = 'text-align:'+field_label_align_text+';';
          }
          
          //end
          //set style atribute
          label_style = '';
          if(label_margin || label_padding || label_border || label_background_color || field_label_font_size
             || field_label_font_weight || field_label_font_color || label_font_weight || field_label_align_text){
            label_style = label_margin+label_padding+label_border+label_background_color+label_font_size+
                          label_font_weight+label_font_color+field_label_align_text;
          }
          
          if(label_style){
            jQuerOs(element).attr("data-label-styling",label_style);
          }else{
            jQuerOs(element).attr("data-label-styling",'');
          }
          //end
        }
      });
    }
  //end
    //fn for save block styling
    function save_block_styling(){
      if(debug){
        console.log('save_block_styling()');
      }

      jQuerOs.each( jQuerOs("#editor-block .drop-area, #editor-block .content-row"), function(i, element){ 
        if(jQuerOs(element).data('row-number')){
          field_name = 'row';
          optionsBlock = window.JSON.parse(jQuerOs(element).find(".row-params").val());
        }else if(jQuerOs(element).data('column-number')){
          field_name = 'col';
          optionsBlock = window.JSON.parse(jQuerOs(element).find(".col-params").val());
        }
        //get value
        margin_top = optionsBlock.marginTop;
        margin_right = optionsBlock.marginRight;
        margin_bottom = optionsBlock.marginBottom;
        margin_left = optionsBlock.marginLeft;
        if(optionsBlock.margin){
          margin_px = 'px';
        }
        else{
          margin_px = '%';
        }
        if(optionsBlock.padding){
          padding_px = 'px';
        }
        else{
          padding_px = '%';
        }
        padding_top = optionsBlock.paddingTop;

        padding_right = optionsBlock.paddingRight;
        padding_bottom = optionsBlock.paddingBottom;
        padding_left = optionsBlock.paddingLeft;
        border = optionsBlock.borderSize;
        custom_class = optionsBlock.customClass;
        animated = optionsBlock.animated;
        offsetAnimated = optionsBlock.offsetAnimated;
        hoverAnimated = optionsBlock.hoverAnimated;
        
        border_color = optionsBlock.borderColor;
        background_color = optionsBlock.backgroundColor;
        font_size = optionsBlock.fontSize;
        font_weight = optionsBlock.fontWeight;
        font_color = optionsBlock.fontColor;
        text_align = optionsBlock.text_align;
        inline_field = optionsBlock.hideColumn;
        field_width = optionsBlock.fieldWidth;
        
        //end
        //set style variables
        margin = '';
        if(margin_top){
          margin += 'margin-top:'+margin_top+margin_px+';';
        }
        if(margin_right){
          margin += 'margin-right:'+margin_right+margin_px+';';
        }
        if(margin_bottom){
          margin += 'margin-bottom:'+margin_bottom+margin_px+';';
        }
        if(margin_left){
          margin += 'margin-left:'+margin_left+margin_px+';';
        }
        padding = '';
        if(padding_top){
          padding += 'padding-top:'+padding_top+padding_px+';';
        }
        if(padding_right){
          padding += 'padding-right:'+padding_right+padding_px+';';
        }
        if(padding_bottom){
          padding += 'padding-bottom:'+padding_bottom+padding_px+';';
        }
        if(padding_left){
          padding += 'padding-left:'+padding_left+padding_px+';';
        }
        if(offsetAnimated){
          jQuerOs(element).attr('data-wow-offset', offsetAnimated);
        }else{
            jQuerOs(element).attr('data-wow-offset', '');
        }
        
        if(hoverAnimated){
          jQuerOs(element).attr('hover_animated', hoverAnimated);
        }else{
            jQuerOs(element).attr('hover_animated', '');
        }
        
        if(custom_class){

            
            if(custom_class != jQuerOs(element).attr('old_custom_class')){
                jQuerOs(element).removeClass(jQuerOs(element).attr('old_custom_class'));
            }
          jQuerOs(element).addClass(custom_class);
          jQuerOs(element).attr('old_custom_class', custom_class);
        }
        
        if(custom_class == ''){

                jQuerOs(element).removeClass(jQuerOs(element).attr('old_custom_class'));
                jQuerOs(element).attr('old_custom_class', custom_class);

        }
        
        if(animated){

            
            if(animated != jQuerOs(element).attr('old_animate')){
                jQuerOs(element).removeClass(jQuerOs(element).attr('old_animate'));
            }
          jQuerOs(element).addClass('wow');
          jQuerOs(element).addClass('animate');
          jQuerOs(element).addClass(animated);
          jQuerOs(element).attr('old_animate', animated);
        }
        
        if(animated == '' || animated == 'none'){

                jQuerOs(element).removeClass(jQuerOs(element).attr('old_animate'));
                jQuerOs(element).removeClass('wow');
                jQuerOs(element).removeClass('animate');
                jQuerOs(element).attr('old_animate', animated);

        }
        
        if(inline_field == 0){
            jQuerOs(element).addClass('inline_field');
        }else if(inline_field == 1){
            jQuerOs(element).removeClass('inline_field');
        }
        
        border_style = '';
        if(border){
          if(!border_color)border_color = 'white';
          border_style += 'border:'+border+'px solid '+border_color+';';
        }
        background_color_style = '';
        if(background_color){
          background_color_style += 'background-color:'+background_color+';';
        }
        font_size_style = '';
        if(font_size){
          font_size_style += 'font-size:'+font_size+'px;';
        }
        font_weight_style = '';
        if(font_weight == 1){
          font_weight_style += 'font-weight:normal;';
        }else if(font_weight == 2){
            font_weight_style += 'font-weight:bold;';
        }
        font_color_style = '';
        if(font_color){
          font_color_style += 'color:'+font_color+';';
        }
        //console.log('field_width', field_width)
        //console.log('inline_field', inline_field)
        if(field_width != undefined && inline_field == 0){
            var dropItems = jQuerOs(element).children('.drop-item');
            
            for(index = 0; index < dropItems.length; ++index){
                
                var add_width = ',"width":"'+field_width+'px"}';
                var old_val = jQuerOs(dropItems[index]).children('.f-params').val();
                //console.log(old_val)
                if(old_val != undefined && old_val != '{}'){
                    if(old_val.indexOf('width') > -1){
                        var width_pos = old_val.indexOf('"width');
                        var second_pos = old_val.indexOf(',', width_pos);
                        if(second_pos == -1){
                            second_pos = old_val.indexOf('}', width_pos);
                        }
                        var old_width = old_val.substring(width_pos, second_pos);
                        add_width = '"width":"'+field_width+'px"';
                        
                        var new_val = old_val.replace(old_width, add_width);
                        jQuerOs(dropItems[index]).children('.f-params').val(new_val);
                    }else{
                        var new_val = old_val.replace('}', add_width);
                        jQuerOs(dropItems[index]).children('.f-params').val(new_val);
                    }
                }
                //console.log(jQuerOs(dropItems[index]).children('.f-params').val());
            }
        }
        else if((field_width != undefined && inline_field == 1) || field_width == undefined){
            var dropItems = jQuerOs(element).children('.drop-item');
            
            for(index = 0; index < dropItems.length; ++index){
                
                var add_width = ',"width":"'+field_width+'px"}';
                var old_val = jQuerOs(dropItems[index]).children('.f-params').val();
                
                if(old_val != undefined){
                    if(old_val.indexOf('width') > -1){
                        var width_pos = old_val.indexOf('width') - 2;
                        var second_pos = old_val.indexOf(',', width_pos + 2);
                        if(second_pos == -1){
                            second_pos = old_val.indexOf('}', width_pos + 2);
                        }
                       
                        var old_width = old_val.substring(width_pos, second_pos);
                        
                        add_width = '';
                        
                        var new_val = old_val.replace(old_width, add_width);
                        jQuerOs(dropItems[index]).children('.f-params').val(new_val);
                        if(old_val.indexOf('"label_text_align":"left""') > -1){
                            
                            old_val.replace('"label_text_align":"left""', '"label_text_align":"left"');
                        }
                    }
//                    else{
//                        var new_val = '';
//                        jQuerOs(dropItems[index]).children('.f-params').val(new_val);
//                    }
                }
                
            }
        }
        //end
        //set style atribute
        style = '';
        if(margin || padding || border_style || background_color_style || font_size_style
           || font_weight_style || font_color_style){
          style = margin+padding+border_style+background_color_style+font_size_style+
                        font_weight_style+font_color_style;
        }
        if(style){
          jQuerOs(element).attr("data-block-styling",style);
        }
        //end
      });
    }
  //end
    //fn for change tag
    function change_tag_shell(htmlstring){
      if(debug){
        console.log('change_tag_shell('+htmlstring+')');
      }
      jQuerOs.each( jQuerOs(htmlstring).find(".field-name"), function(i, element){ 
        field_name = jQuerOs(element).data('field-name');
        label_tag = jQuerOs("#fi_label_tag_"+field_name).val();
        if(label_tag && label_tag != 'span'){
          // Create a new element and assign it attributes from the current element
          var NewElement = jQuerOs("<"+label_tag+" />");
          jQuerOs.each(element.attributes, function(i, attrib){
            jQuerOs(NewElement).attr(attrib.name, attrib.value);
          });
          // Replace the current element with the new one and carry over the contents
          jQuerOs(element).replaceWith(function () {
            return jQuerOs(NewElement).append(jQuerOs(element).contents());
          });
        }
      });
      
    }
  //end

    function applyAliasTooltip(htmlstring){
      if(debug){
        console.log('applyFieldAlias('+htmlstring+')', htmlstring);
      }
      
      jQuerOs.each( jQuerOs(htmlstring).find(".field-name"), function(i, element){
        field_name = jQuerOs(element).data('field-name');
        
        if(jQuerOs("input[name='fi_"+field_name+"_alias']").length){
          fieldAlias = jQuerOs("input[name='fi_"+field_name+"_alias']").val();
          jQuerOs(element).html('<span class="'+field_name+'_label_icon_prefix_hidden"></span><span class="field_alias">'+fieldAlias+'</span><span class="'+field_name+'_label_icon_suffix_hidden"></span>');
        }
        if(jQuerOs("input[name='fi_"+field_name+"_tooltip']").length){
          fieldTooltip = jQuerOs("input[name='fi_"+field_name+"_tooltip']").val();
          jQuerOs(element).parents(".drop-item").attr("data-content",fieldTooltip);
        }
      });
      
      jQuerOs.each( jQuerOs(htmlstring).find(".layout-name"), function(i, element){
        field_name = jQuerOs(element).data('field-name');
        if(jQuerOs("input[name='vi_show_request_layout_alias["+field_name+"][]']").length){
          fieldAlias = jQuerOs("input[name='vi_show_request_layout_alias["+field_name+"][]']").val();
          jQuerOs(element).html(fieldAlias);
        }
        if(jQuerOs("input[name='vi_show_request_layout_alias["+field_name+"][]']").length){
          fieldTooltip = jQuerOs("input[name='vi_show_request_layout_alias["+field_name+"][]']").val();
          jQuerOs(element).parents(".drop-item").attr("data-content",fieldTooltip);
        }
      });
      
      
      jQuerOs.each( jQuerOs(htmlstring).find(".entity-name"), function(i, element){
        field_name = jQuerOs(element).data('field-name');
        
        if(jQuerOs("input[name='fi_"+field_name+"_alias']").length){
          fieldAlias = jQuerOs("input[name='fi_"+field_name+"_alias']").val();
          jQuerOs(element).html(fieldAlias);
        }
        if(jQuerOs("input[name='fi_"+field_name+"_tooltip']").length){
          fieldTooltip = jQuerOs("input[name='fi_"+field_name+"_tooltip']").val();
          jQuerOs(element).parents(".drop-item").attr("data-content",fieldTooltip);
        }
      });
    }

    //fn for return span shell in drop-item
    function return_span_shell(){
      if(debug){
        console.log('return_span_shell()');
      }
      
      jQuerOs.each( jQuerOs(".drop-item .field-name"), function(i, element){
        field_name = jQuerOs(element).data('field-name');
        
        label_tag = jQuerOs("#fi_label_tag_"+field_name).val();
        
        if(label_tag && label_tag != 'span'){
          // Create a new element and assign it attributes from the current element
          var NewElement = jQuerOs("<span />");
          jQuerOs.each(this.attributes, function(i, attrib){
              
            jQuerOs(NewElement).attr(attrib.name, attrib.value);
          });
          // Replace the current element with the new one and carry over the contents
          jQuerOs(this).replaceWith(function () {
            return jQuerOs(NewElement).append(jQuerOs(this).contents());
          });
        }
      });

    }
    //end
    //function for save and apply layout
    function saveLayout(task_name){
      if(debug){
        console.log('saveLayout('+task_name+')');
      }
      //save styling
      //var check_reqire_fields = check_reqire_fields();
      if(!check_reqire_fields(task_name)){
          return;
      }
      writeSettings();
      //remove width: 175 px
      jQuerOs.each( jQuerOs("div.admin_aria_hidden"), function(i, element){
        //jQuerOs(element).attr("style","");
        jQuerOs(element).removeAttr("style") ; 
      });
      //end
      //save block styling
      save_block_styling();
      //save layout styling
      save_label_styling();
      
      //end
      var htmlstring = jQuerOs("#content-block").clone();
      
      change_tag_shell(htmlstring);
      
      applyAliasTooltip(htmlstring);
      
      htmlstring = jQuerOs(htmlstring).html();
      
      var form = jQuerOs("#adminForm").serialize();
      var form_length = form.length;
      var htmlstring_length = htmlstring.length;
      
      var child_entities = [];
      var entity_names = jQuerOs('#content-block .entity-name');
      if(entity_names.length > 0){
          for(var i=0; i<entity_names.length; ++i){
              var temp_child_entity = {};
              temp_child_entity.childEntityId = jQuerOs(entity_names[i]).attr('entityid');
              temp_child_entity.childEntityFields = jQuerOs(entity_names[i]).attr('child_entity');
              temp_child_entity.data_field_name = jQuerOs(entity_names[i]).attr('data-field-name');
              temp_child_entity.entity_alias = jQuerOs(entity_names[i]).attr('entity_alias');
              child_entities[i] = temp_child_entity;
          }
      }
      var child_entities = JSON.stringify(child_entities);
      
      form_params = jQuerOs("#editor-block .form-params").val();
      fieldsParams = jQuerOs("#content-block .f-params").val();
      
      jQuerOs.post("index.php?option=com_os_cck&task="+task_name+"&format=raw",
                   {form_data:form, layout_html:htmlstring,
                    form_length:form_length, htmlstring_length:htmlstring_length,
                    columns_number: columnNumber, rows_number: rowNumber,
                    form_params:form_params,fieldsParams:fieldsParams,
                    child_entities:child_entities},
      function (data) {
        if (data.status == "<?php echo JText::_("COM_OS_CCK_SUCCESS"); ?>") {
          if(data.lid){
            jQuerOs("#lid").val(data.lid);
          }
          if(task_name == 'apply_layout'){
            jQuerOs("#messages").addClass("alert alert-success");
            jQuerOs('#result-message').html("<?php echo JText::_('COM_OS_CCK_LAYOUT_SAVE_SUCCESSFUL');?>");
            setTimeout("jQuerOs('#result-message').html('');jQuerOs('#messages').removeClass('alert alert-success');", 3000);
          }else{//save layout
            jQuerOs("#messages").addClass("alert alert-success");
            jQuerOs('#result-message').html("<?php echo JText::_('COM_OS_CCK_LAYOUT_SAVE_SUCCESSFUL');?>");
            setTimeout("jQuerOs('#result-message').html('');jQuerOs('#messages').removeClass('alert alert-success');", 950);
            setTimeout("window.location = 'index.php?option=com_os_cck&task=manage_layout'", 1000);
          }
        }else if(data.status == 'cancel'){
            window.location = 'index.php?option=com_os_cck&task=manage_layout';
        } else {
          if(data.status == 'title'){
            empty_title();
            return;
          }
          jQuerOs("#messages").addClass("alert alert-danger");
          jQuerOs('#result-message').html("<?php echo JText::_('COM_OS_CCK_FUCKING_ERROR');?>");
          setTimeout("jQuerOs('#result-message').html('');jQuerOs('#messages').removeClass('alert alert-danger');", 3000);
        }
      } , 'json' );
    }
    //end
    //add row fn
    var columnNumber = <?php echo isset($layout_params['columns_number'])?$layout_params['columns_number']:1;?>;
    var rowNumber = <?php echo isset($layout_params['rows_number'])?$layout_params['rows_number']:1;?>;

    function addRow(number){
      if(debug){
        console.log('addRow('+number+')');
      }
      
      var n = 12/number;
      var str = '<div class="row content-row cck-row-'+rowNumber+'" data-row-number="'+(rowNumber++)+'">';
      for (var i = 0; i<number; i++) {
        if (number == 1) {
          str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
        }
        if (number == 2) {
          if (i == 1) {
            str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
          } else {
            str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
          }
        }
        if (number == 3) {
          if (i == 2) {
            str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
          } else {
            str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
          }
        }
        if (number == 4) {
          if (i == 3) {
            str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
          } else {
            str += '<div id="cck_col-'+(columnNumber++)+'" class="resizable col-lg-' +n+ ' col-md-' +n+ ' col-sm-' +n+ ' col-xs-' +n+ ' drop-area column-sortable items" data-column-number="'+columnNumber+'"><input class="col-params" type="hidden" value="{}"></div>';
          }
        }

      }
      str += '<span class="delete-row"></span><input class="row-params" type="hidden" value="{}"></div>';
      jQuerOs("#content-block").append(str);
      make_colorpicker();
      makeDeleteRow();
      make_resize_grid();
      make_droppable();
      make_sortable();
      makeOptions();
      //scroll bottom
      window.scrollTo(0,findPosY(document.getElementById("add-row"))-350);
    }
  //end
  // --------------------------------------------------READY BLOCK START-----------------------------\\
    //triger click functions
    jQuerOs("select.editor-type").change(function(event) {
      make_editor();
    });
    //init codemirror
    function make_editor(){
      if(debug){
        console.log('make_editor()');
      }
      jQuerOs(".editor-button, .save-editor-button").unbind('click');
      jQuerOs(".editor-button").on('click',function(event) {
        jQuerOs(".joomla-editor").hide();
        //jQuerOs("#editor-area").attr("style","");
        jQuerOs(".CodeMirror").remove();
        //tinyMCE.remove();
        if(debug){
          console.log('.editor-button::click');
        }
        jQuerOs('#editor-modal').css('z-index', '1500');
        jQuerOs('#editor-modal').modal();
        mode = jQuerOs("select.editor-type:visible").parents("div[id^='options-field-custom_code_field']").find("select.editor-type").val();
        textValue = jQuerOs(".custom-code-editor:visible").val();
        if(textValue == undefined){
            if(jQuerOs(".php-show-editor:visible").val() != undefined){
                textValue = jQuerOs(".php-show-editor:visible").val();
            }else if(jQuerOs(".sql-show-editor:visible").val() != undefined){
                textValue = jQuerOs(".sql-show-editor:visible").val();
            }
        }
        
        if(mode != "TEXT" || !joomlaEditor){

          if(mode == "HTML"){
            mode = "text/html";
          }else if(mode == "PHP" || mode == "SCRIPT"){
            mode = "php";
          }else if(mode == "CSS"){
            mode = "text/css";
          }else if(mode == undefined){
              mode = "javascript";
          }else{
            mode = "text/html";
          }

          CodeMirror.commands.autocomplete = function(cm) {
            cm.showHint({hint: CodeMirror.hint.anyword});
          }
          
          var editor = CodeMirror.fromTextArea(document.getElementById('editor-area'), {
            lineNumbers: true,
            mode: mode,
            keyMap: "sublime",
            autoCloseBrackets: true,
            matchBrackets: true,
            showCursorWhenSelecting: true,
            theme: "monokai",
            styleActiveLine: true,
            tabSize: 2,
            extraKeys: {
              "F11": function(cm) {
                cm.setOption("fullScreen", !cm.getOption("fullScreen"));
              },
              "Esc": function(cm) {
                if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
              },
              "Ctrl-Space": "autocomplete"
            }
          });
          
          editor.setValue(textValue);
          setTimeout(function() {
              editor.refresh();
          },1000);
          editor.on("change", function(cm, change) {
            if(jQuerOs(".custom-code-editor:visible").val() != undefined){
              jQuerOs(".custom-code-editor:visible").val(editor.getValue());
            }else{
              jQuerOs(".php-show-editor:visible").val(editor.getValue());
            }
          })
          jQuerOs(".save-editor-button").on('click',function(event) {
            jQuerOs('#editor-modal').modal("hide");
          });
        }else{
         // tinymce.init({});
          tinyMCE.activeEditor.setContent(textValue);

          <?php if($editor != "codemirror" && $editor != 'none'){?>
            jQuerOs(".joomla-editor").show();

            <?php 
              // echo $editor->setContent('cckEditor','textValue');
            ?>

            jQuerOs(".save-editor-button").on('click',function(event) {
              jQuerOs(".custom-code-editor:visible").val(<?php echo str_replace(';','',$editor->getContent('cckEditor'))?>);
              jQuerOs('#editor-modal').modal("hide");
            });
          <?php }?>
          // tinymce.init({
          //   selector: 'textarea#editor-area',
          //   setup: function (editor) {
          //     editor.on('change', function () {
          //       jQuerOs(".custom-code-editor:visible").val(editor.getContent());
          //     });
          //   },
          //   height: 300,
          //   plugins: [
          //     'advlist autolink lists link image charmap preview anchor',
          //     'searchreplace visualblocks code fullscreen',
          //     'insertdatetime media table contextmenu paste'
          //   ],
          //   toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
          //   content_css: [
          //     '//www.tinymce.com/css/codepen.min.css'
          //   ]
          // });
          // tinyMCE.activeEditor.setContent(textValue);
          
        }
        
      });
    }
    //end

    function make_required(){
        if(debug){
        console.log('make_required()');
      }
      jQuerOs(".require-checkbox").unbind('click')
      jQuerOs(".require-checkbox").click(function(event) {
        if(jQuerOs(this).prop('checked')){
          jQuerOs(".field-name[data-field-name='"+jQuerOs(this).attr("data-field-name")+"']")
            .html(jQuerOs(".field-name[data-field-name='"+jQuerOs(this).attr("data-field-name")+"']").html()+'*');
          jQuerOs("[name=fi_"+jQuerOs(this).attr("data-field-name")+"_alias]").val(jQuerOs("[name=fi_"+jQuerOs(this).attr("data-field-name")+"_alias]").val()+'*');
        }else{
          jQuerOs(".field-name[data-field-name='"+jQuerOs(this).attr("data-field-name")+"']")
            .html(jQuerOs(".field-name[data-field-name='"+jQuerOs(this).attr("data-field-name")+"']").html().replace('*',''));
          jQuerOs("[name=fi_"+jQuerOs(this).attr("data-field-name")+"_alias]").val(jQuerOs("[name=fi_"+jQuerOs(this).attr("data-field-name")+"_alias]").val().replace('*',''));
        }
      });
    }

    //modal for add column
    function make_add_row(){
      if(debug){
        console.log('make_add_row()');
      }
      jQuerOs("#layout-modal .culumn-num").on('click',function() {
        if(debug){
          console.log('#layout-modal .culumn-num::click');
        }
        var num = jQuerOs(this).attr('data-column');
        addRow (num);
        jQuerOs('#layout-modal').modal('hide');
      });

      jQuerOs("#add-row").on('click',function() {
        if(debug){
          console.log('#add-row::click');
        }
        writeSettings();
        jQuerOs('#layout-modal').css('z-index', '1500');
        jQuerOs('#layout-modal').modal();
      });
    }
  //end
    //modal for  attached layout
    function make_attached_layout(){
      if(debug){
        console.log('make_attached_layout()');
      }
      jQuerOs("#add-layout").on('click',function() {
        if(debug){
          console.log('#add-layout::click');
        }
        jQuerOs('#attached-layout-modal').css('z-index', '1500');
        jQuerOs('#attached-layout-modal').modal();
        hideSaveButtons();
      });
    }
  //end
    //modal for  attached module
    function make_attached_module(){
      if(debug){
        console.log('make_attached_module()');
      }
      jQuerOs("#add-module").on('click',function() {
        if(debug){
          console.log('#add-module::click');
        }
        jQuerOs('#attached-module-modal').css('z-index', '1500');
        jQuerOs('#attached-module-modal').modal();
        hideSaveButtons();
      });
    }
  //end
  
  //modal for  attached module
    function make_attached_child_enteties(){
      if(debug){
        console.log('make_attached_child_enteties()');
      }
      jQuerOs("#add-child-enteties").on('click',function() {
        if(debug){
          console.log('#add-child-enteties::click');
        }
        jQuerOs('#attached-child-enteties-modal').css('z-index', '1500');
        jQuerOs('#attached-child-enteties-modal').modal();
        hideSaveButtons();
      });
    }
  //end
  
  function addChildEntityFields(){
      //if(debug){
        console.log('addChildEntetyFields()');
      //}
      var childEntityId = jQuerOs('#add_child_enteties').val();
      var layout_type = '<?php echo $layout->type; ?>';
      var entityId = '<?php echo $layout->fk_eid ?>';
      jQuerOs('#child_entity_alias').val('');
      
      hideSaveButtons();
      jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "getEntityFieldsAjax",
                childEntityId: childEntityId,
                layoutType: layout_type,
                entityId: entityId
            },
            success: function(data){ 
                jQuerOs('#modal_fields_options').empty()
                jQuerOs('#modal_fields_options').append(data.html)
                make_child_sortable();
            }

    });
      
  }
  
  function make_child_sortable(){
      //if(debug){
        console.log('make_child_sortable()');
      //}
      jQuerOs( "#sort" ).sortable({
          
        update: function (event, ui) {
            //var data = jQuerOs(this).sortable('serialize');
            var data = JSON.stringify(jQuerOs(this).sortable('toArray'));
            jQuerOs('#sorting').val(data);
        }
      });
    }
  
  function addChildEntity(entityId, entityName){
    //if(debug){
        console.log('addChildEntity('+entityId+','+entityName+')');
      //}
      var entityAlias = jQuerOs('#child_entity_alias').val();
      if(entityAlias == ''){
          entityAlias = entityName;
      }
      var child_entities = jQuerOs('.child_entity');
      var child_entity = '';
      var sorting = JSON.parse(jQuerOs('#sorting').val());
      
      for(var k=0; k<sorting.length; ++k){
          for(var i=0; i<child_entities.length; ++i){
              if(jQuerOs(child_entities[i]).attr('name') == sorting[k]){
                  
                  if(jQuerOs(child_entities[i]).prop('checked')){
                      child_entity += jQuerOs(child_entities[i]).attr('name') + ',';
                  }
              }

          }
      }
      
//      for(var i=0; i<child_entities.length; ++i){
//          if(jQuerOs(child_entities[i]).prop('checked')){
//              child_entity += jQuerOs(child_entities[i]).attr('name') + ',';
//          }
//          
//      }
//      if(jQuerOs('[entityid='+entityId+']').length == 0){
//          var unique_id = entityId;
//      }else{
          var unique_id = entityId + '_' + (Number(jQuerOs('[entityid='+entityId+']').length)+1);
      //}
      
      child_entity = child_entity.substring(0, child_entity.length - 1); 
      
      if(child_entity != ''){
          html_item = '<div class="attached-child-entity-block ">'+
                        '<div>'+
                          '<span class="entity-name" entityId="'+entityId+'" child_entity="'+child_entity+'" entity_alias="'+entityAlias+'" data-field-name="e-p-ch-'+unique_id+'">'+entityAlias+'</span>'+
                          '<div class="col_box admin_aria_hidden">{|e-p-ch-'+unique_id+'|}</div>'+
                          '<input class="f-params" name="fi_Params_e-p-ch-'+unique_id+'" type="hidden" value="{}" />'+
                        '</div>'+
                      '</div>';
          jQuerOs('#attached-child-enteties-modal').modal('hide');
          showSaveButtons();
          jQuerOs("#add-child-enteties").before(html_item);

          jQuerOs.ajax({
                dataType: "json",
                type: 'POST',
                url: 'index.php?option=com_os_cck&format=raw',
                data: {
                    task: "getChildEntitySettingsAjax",
                    unique_id: unique_id,
                    entityAlias: entityAlias,
                },
                success: function(data){ 
                    //jQuerOs('#ui-accordion-fields-options-accordion-panel-0').append(data.settings)
                    jQuerOs(".main-fields-options").append(data.settings);
                }

          });
          //jQuerOs("#attached-module-row-"+id).remove();
          make_attachedDraggable();
          make_droppable();
      }else{
          alert('<?php echo JText::_("COM_OS_CCK_LABEL_ERROR_ADD_CHILD_ENTETY"); ?>');
      }
  }
  
  function addChildEntityShowLayout(entityId, entityName){
    //if(debug){
        console.log('addChildEntityShowLayout('+entityId+','+entityName+')');
      //}
      var child_entiti_fields = jQuerOs('.child_entity');
      var child_entity_alias = jQuerOs('#child_entity_fields_'+entityId + ' option:selected').text();
      var child_entity_val = jQuerOs('#child_entity_fields_'+entityId).val();
      var checked_fields = false;
      
      html_item = '';
      for(var i=0; i<child_entiti_fields.length; ++i){
          if(jQuerOs(child_entiti_fields[i]).prop('checked')){
              checked_fields = true;
              var child_entity_field_alias = jQuerOs(child_entiti_fields[i]).parent().find('label').text();
              var child_field_id = jQuerOs(child_entiti_fields[i]).attr('name');
              
              html_item += '<div class="attached-child-entity-block ">'+
                            '<div>'+
                              '<span class="entity-name" entityId="'+entityId+'" child_entity="'+child_field_id+'" data-field-name="'+child_entity_val + '_' + child_field_id+'">'+child_entity_alias + ' - ' + child_entity_field_alias+'</span>'+
                              '<div class="col_box admin_aria_hidden">{|'+child_entity_val+'_'+child_field_id+'|}</div>'+
                              '<input class="f-params" name="fi_Params_'+child_entity_val+'_'+child_field_id+'" type="hidden" value="{}" />'+
                            '</div>'+
                          '</div>';
              jQuerOs.ajax({
              dataType: "json",
              type: 'POST',
              url: 'index.php?option=com_os_cck&format=raw',
              data: {
                  task: "getChildEntitySettingsAjax",
                  layout_type: '<?php echo $layout->type;?>',
                  unique_id: child_entity_val + '_' + child_field_id,
                  entityAlias: entityName,
                  fid: child_field_id,
              },
              success: function(data){ 
                  //jQuerOs('#ui-accordion-fields-options-accordion-panel-0').append(data.settings)
                  jQuerOs(".main-fields-options").append(data.settings);
              }

      });    
              
          }
      }
      if(checked_fields == false){
        alert('<?php echo JText::_("COM_OS_CCK_LABEL_ERROR_ADD_CHILD_ENTETY"); ?>'); return;
      }
      jQuerOs('#attached-child-enteties-modal').modal('hide');
      showSaveButtons();
      jQuerOs("#add-child-enteties").before(html_item);
      
      
      
      make_attachedDraggable();
      make_droppable();
  }

  function addLayoutField(fid){
    if(debug){
        console.log('addLayoutField('+fid+')');
      }
      var layout_type = '<?php echo $layout->type; ?>';
    if(fid){
      jQuerOs.post("index.php?option=com_os_cck&task=editLayoutField&fid="+fid+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
                 {},
      function (data) {
        jQuerOs("#add-field-modal .modal-body").html(data.html);
      } , 'json' );
    }else{
      jQuerOs.post("index.php?option=com_os_cck&task=addLayoutField&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&layout_type="+layout_type+"&format=raw",
                 {},
      function (data) {
        jQuerOs("#add-field-modal .modal-body").html(data.html);
      } , 'json' );
    }
  }

   function checkFieldType(val){
      //if(debug){
        console.log('checkFieldType('+val+')'); 
      //}
    if(val == 'text_single_checkbox_onoff'){
      jQuerOs("#allowed-block-check").show();
      
      jQuerOs("#allowed-check-value").attr("placeholder", "Please enter your value");
      
       
    }else{
        jQuerOs("#allowed-block-check").hide();
    }
    
    if(val == 'text_radio_buttons'){
        jQuerOs("#allowed-block-radio").show();
        jQuerOs("#allowed-radio-value").attr("placeholder", "First button\nSecond button\nThird button");
        
    }else{
        jQuerOs("#allowed-block-radio").hide();
    }
        
    if(val == 'text_select_list'){
      jQuerOs("#allowed-block-select").show();
        //  case 'text_select_list':
        //  jQuerOs("#allowed-value").val("One\nTwo\nThree");
        //  jQuerOs("#default-value").val("");
        //  break; 
    }else{
      jQuerOs("#allowed-block, #allowed-block-select").hide();
    }
    
    if(val == 'pricefield_select_list'|| val == 'pricefield_radio_buttons'){
      jQuerOs("#allowed-block-pricefield-select").show();

    }else{
      jQuerOs("#allowed-block, #allowed-block-pricefield-select").hide();
    }
    
    if(val == 'filefield'){
      jQuerOs("#allowed-block-filefield").show();

    }else{
      jQuerOs("#allowed-block, #allowed-block-filefield").hide();
    }

  }   

  function checkboxFields(el){
    if(debug){
        console.log('checkboxFields('+el+')');
      }
    if(jQuerOs(el).attr("name") == "toggle"){
        var checkboxes = jQuerOs(".field-id-checkbox");
        
        for (var index = 0; index < checkboxes.length; ++index){
            if(jQuerOs(checkboxes[index]).parent().is(':visible')){
                jQuerOs(checkboxes[index]).prop("checked",jQuerOs(el).prop('checked'));
            }
        }
        
    }
  }

  function deleteLayoutField(){
      if(debug){
        console.log('deleteLayoutField()');
      }
    if(!jQuerOs(".field-id-checkbox:checked").length){
      alert("Please select field for delete!");
      return;
    }
    jQuerOs('.delete-layout-field input').attr('disabled', 'disabled');
    jQuerOs('.delete-layout-field input').css('background-color', 'gray');
    
    var fid = [];
    jQuerOs(".field-id-checkbox:checked").each(function(index, el) {
      fid.push(jQuerOs(el).val());
    });
    jQuerOs.post("index.php?option=com_os_cck&task=deleteLayoutField&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
                 {fid: fid},
    function (data) {
      jQuerOs("#add-field-modal .modal-body").html(data.html);
    } , 'json' );
  }

  function pubLayoutFields(fid, task){
      if(debug){
        console.log('pubLayoutFields('+fid+',' +task+')');
      }
    jQuerOs.post("index.php?option=com_os_cck&task="+task+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
                 {fid: fid},
    function (data) {
      jQuerOs("#add-field-modal .modal-body").html(data.html);
    } , 'json' );
  }

  function inInstLayoutFields(fid, task){
      if(debug){
        console.log('inInstLayoutFields('+fid+',' +task+')');
      }
    jQuerOs.post("index.php?option=com_os_cck&task="+task+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
                 {fid: fid},
    function (data) {
      jQuerOs("#add-field-modal .modal-body").html(data.html);
    } , 'json' );
  }

  function saveLayoutField(fid){
    if(debug){
        console.log('saveLayoutField('+fid+')');
      }
    //get allow_value out of inputs   
    var allowed_values_select = [];
    jQuerOs(".allowed-value").each(function(key, el){
      allowed_values_select.push(jQuerOs(el).val());
    })

    //get child_select out of inputs   
    var child_assoc = [];
    jQuerOs(".child-assoc").each(function(key, el){
      child_assoc.push(jQuerOs(el).val());
    })

    if (jQuerOs("#global_settings_label").val() == '') {
      window.scrollTo(0,findPosY(jQuerOs("#global_settings_label"))-100);
      jQuerOs("#global_settings_label").attr("placeholder", "<?php echo JText::_('COM_OS_CCK_ERROR_FIELD_LABLE');?>");
      jQuerOs("#global_settings_label").css("borderColor", "#FF0000");
      jQuerOs("#global_settings_label").css("color", "#FF0000");
      return;
    }

    if(jQuerOs("#field_name").val() == ''){
        jQuerOs("#field_name").css('borderColor','red');
        return;
    }else{
        jQuerOs("#field_name").css('borderColor','');
    }
    


    if(jQuerOs("#field_type").val() == 'text_single_checkbox_onoff'){
        if(jQuerOs("#allowed-check-value").val() == ''){
            jQuerOs("#allowed-check-value").css('borderColor','red');
            return;
        }else{
            jQuerOs("#allowed-check-value").css('borderColor','');
        }
        var allowed_values = jQuerOs("#allowed-check-value").val();
        if(allowed_values.indexOf('\n') > -1){
            var enter_pos = allowed_values.indexOf('\n');
            allowed_values = allowed_values.substring(0, enter_pos);
        }
        
    }else if(jQuerOs("#field_type").val() == 'text_radio_buttons'){
        if(jQuerOs("#allowed-radio-value").val() == ''){
            jQuerOs("#allowed-radio-value").css('borderColor','red');
            return;
        }else{
            jQuerOs("#allowed-radio-value").css('borderColor','');
        }
      var allowed_values = jQuerOs("#allowed-radio-value").val();
    }else if(jQuerOs("#field_type").val() == 'text_select_list'){
        if(jQuerOs(".allowed-value").val() == ''){
            jQuerOs(".allowed-value").css('borderColor','red');
            return;
        }else{
            jQuerOs(".allowed-value").css('borderColor','');
        }
      var allowed_values = allowed_values_select;
    }else if(jQuerOs("#field_type").val() == 'pricefield_select_list' || jQuerOs("#field_type").val() == 'pricefield_radio_buttons'){
        
        if(jQuerOs("#allowed-block-pricefield-select-value").val() == ''){
            jQuerOs("#allowed-block-pricefield-select-value").css('borderColor','red');
            return;
        }else{
            jQuerOs("#allowed-block-pricefield-select-value").css('borderColor','');
        }
      var allowed_values = jQuerOs("#allowed-block-pricefield-select-value").val();
    }else if(jQuerOs("#field_type").val() == 'filefield'){
        if(jQuerOs("#allowed-block-filefield-product:checked").length > 0){
            var allowed_values = 'on';
        }else{
            var allowed_values = '';
        }
        
        //console.log('111111111111', jQuerOs("#allowed-block-filefield-product:checked"))
      
    }else{
      var allowed_values = allowed_values_select;  
    }



    jQuerOs.post("index.php?option=com_os_cck&task=saveLayoutField&fid="+fid+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
      { 
        field_name: jQuerOs("#field_name").val(),
        field_type: jQuerOs("#field_type").val(),
        allowed_value: allowed_values,
        child_select: child_assoc,
        default_value: jQuerOs("#default-value").val()
      },
    function (data) {
      cckBack('showFieldList');
      jQuerOs("#add-field-modal .modal-body").append(data.html);
    } , 'json' );
  }

  function updateLayoutFieldList(){
    if(debug){
        console.log('updateLayoutFieldList()');
      }
    jQuerOs.post("index.php?option=com_os_cck&task=updateLayoutFieldList&lid[]="+jQuerOs("#lid").val()+"&layout_type="+jQuerOs("[name='type']").val()+"&entity_id="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
      {},
    function (data) {
      jQuerOs("#fields-block").html(data.html);
      make_attached_layout();
      make_attached_module();
      make_attached_child_enteties();
      make_synchronize_fields();
      make_sortable();
      make_droppable();
      make_draggable();
      makeOptions();
      make_add_field();
      makeSearchInFields();
    } , 'json' );
  }

  function editLayoutField(el, fieldId){
      if(debug){
        console.log('editLayoutField('+el+','+fieldId+')');
      }
    text = jQuerOs(el).parent().find(".field-name-list").text();
    html = '<span class="edit-name-block">'+
              '<input class="new-field-name" type="text" value="'+text+'">'+
              '<span class="save-new-layout-field-name" onclick="saveNewFieldName(this,'+fieldId+')">Save</span>'+
              '<span class="cancel-edit-firld-name" onclick="cancelEditFieldName(this,'+fieldId+')">Cancel</span>'+
            '</span>';
    jQuerOs(el).parent().find(".field-name-list")
      .hide()
      .parent()
      .append(html);
    jQuerOs(jQuerOs(el).parent().find(".edit-field-name-icon")).hide();
  }

  function cancelEditFieldName(el, fid){
      if(debug){
        console.log('cancelEditFieldName('+el+','+fid+')');
      }
    jQuerOs(el).parent().parent()
      .find(".edit-name-block")
      .remove();
    jQuerOs(".field-name-list, .edit-field-name-icon").show();
  }

  function saveNewFieldName(el, fid){
      if(debug){
        console.log('saveNewFieldName('+el+','+fid+')');
      }
    fieldInput = jQuerOs(el).parent().find(".new-field-name");
    if (jQuerOs(fieldInput).val() == '') {
      window.scrollTo(0,findPosY(jQuerOs(fieldInput))-100);
      jQuerOs(fieldInput).attr("placeholder", "<?php echo JText::_('COM_OS_CCK_ERROR_FIELD_LABLE');?>");
      jQuerOs(fieldInput).css("borderColor", "#FF0000");
      jQuerOs(fieldInput).css("color", "#FF0000");
      return;
    }

    jQuerOs.post("index.php?option=com_os_cck&task=saveLayoutFieldName&fid="+fid+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
      { 
        field_name: jQuerOs(fieldInput).val(),
      },
    function (data) {
      jQuerOs("#add-field-modal .modal-body").html(data.html);
    } , 'json' );
  }

  function cckBack(task){
    if(debug){
        console.log('cckBack('+task+')');
      }
    jQuerOs.post("index.php?option=com_os_cck&task="+task+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",{},
    function (data) {
        jQuerOs("#add-field-modal .modal-body").html(data.html);
        makeSearchInEntityFields();
    } , 'json' );
  }

  //modal for  add-field module
    function make_add_field(){
      if(debug){
        console.log('make_add_field()');
      }
      jQuerOs("#add-field").on('click',function() {
        if(debug){
          console.log('#add-field::click');
        }
        jQuerOs('#add-field-modal').css('z-index', '1500');
        jQuerOs('#add-field-modal').modal({
          backdrop:'static',
          keyboard:false
        });
      });
      var layout_type = '<?php echo $layout->type; ?>';
      jQuerOs('#add-field-modal').on('shown.bs.modal', function (e) {
        hideSaveButtons();
        
        jQuerOs.post("index.php?option=com_os_cck&task=showFieldList&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&layout_type="+layout_type+"&format=raw",
                     {},
        function (data) {
          jQuerOs("#add-field-modal .modal-body").html(data.html);
          //makeSearchInEntityFields();
        } , 'json' );
      })
    }
  //end

    function hideSaveButtons(){
      if(debug){
          console.log('hideSaveButtons()');
      }
      jQuerOs("#layout-buttons").hide();
    }

    function showSaveButtons(){
      if(debug){
          console.log('showSaveButtons()');
      }
      jQuerOs("#layout-buttons").show();
    }

    function addFieldModalClose(){
        if(debug){
        console.log('addFieldModalClose()');
      }
      jQuerOs('#add-field-modal').modal('hide');
      jQuerOs("#add-field-modal .modal-body").html('');
      updateLayoutFieldList();
      showSaveButtons();
      
    }

    //fn make field mask
    function make_field_mask(){
      if(debug){
        console.log('make_field_mask()');
      }
      jQuerOs("#add-field-mask").on('click', function() {
        if(debug){
          console.log('#add-field-mask::click');
        }
        jQuerOs('#field-mail-modal').attr('custom_code_field_name',jQuerOs(this).parent('div').find('textarea').attr('name')); 
        jQuerOs('#field-mail-modal').css('z-index', '1500');
        jQuerOs('#field-mail-modal').modal();
      });
    }
  //end

   //fn make field mask
    function make_field_mask_custom(){
      if(debug){
        console.log('make_field_mask_custom()');
      }
      jQuerOs("#field_options").on('click', '#add-field-mask-custom',function() {
        if(debug){
          console.log('#add-field-mask::click');
        }

        jQuerOs('#field-custom-modal').attr('custom_code_field_name',jQuerOs(this).parent('div').find('textarea').attr('name')); 
        jQuerOs('#field-custom-modal').css('z-index', '1500');
        jQuerOs('#field-custom-modal').modal();
      });
    }

  //end
  //fn make field mask
    function make_field_mask_php_show(){
      if(debug){
        console.log('make_field_mask_php_show()');
      }
      jQuerOs("#field_options").on('click', '#add-field-mask-php-show',function() {
        if(debug){
          console.log('#add-field-mask-php-show::click');
        }
        
        jQuerOs('#field-php-show-modal').attr('custom_code_field_name',jQuerOs(this).parent('div').find('textarea').attr('name')); 
        jQuerOs('#field-php-show-modal').css('z-index', '1500');
        jQuerOs('#field-php-show-modal').modal();
      });
    }

  //end
  
  //fn make field mask
    function make_field_mask_sql_show(){
      if(debug){
        console.log('make_field_mask_sql_show()');
      }
      jQuerOs("#field_options").on('click', '#add-field-mask-sql-show',function() {
        if(debug){
          console.log('#add-field-mask-sql-show::click');
        }
        
        jQuerOs('#field-sql-show-modal').attr('custom_code_field_name',jQuerOs(this).parent('div').find('textarea').attr('name')); 
        jQuerOs('#field-sql-show-modal').css('z-index', '1500');
        jQuerOs('#field-sql-show-modal').modal();
      });
    }

  //end
  
    //fn make field mask
    function make_font_awesom_modal(){
      if(debug){
        console.log('make_font_awesom_modal()');
      }
      jQuerOs("#field_options").on('click', '.add_font_awesom',function() {
        if(debug){
          console.log('.add_font_awesom::click');
        }
        
        jQuerOs('#font-awesom-modal').attr('icon_field_name',jQuerOs(this).attr('id')); 
        jQuerOs('#font-awesom-modal').css('z-index', '1500');
        jQuerOs('#font-awesom-modal').modal();
      });
    }

  //end
  
    //fn for popover hide/show
    function make_popover(){
      if(debug){
        console.log('make_popover()');
      }
      jQuerOs("input[name^='fi_description_']").on('click',function() {

        if(debug){
          console.log("input[name^='fi_description_']::click");
        }
      
        fieldName = jQuerOs(this).data("field-name");

        objthis = this

        // if(this.checked){
        //   jQuerOs(".admin .field-name[data-field-name='"+fieldName+"']").parent()
        //     .prepend('<span class="cck-help-string" data-field-name="'+fieldName+'">'+jQuerOs("[name='fi_"+fieldName+"_tooltip']").val()+'</span>');
        // }else{
        //   jQuerOs(".admin .cck-help-string[data-field-name='"+fieldName+"']").remove();
        // }

      });

      //   jQuerOs("input[name*='_tooltip']").keyup(function() {

      //   jQuerOs(".admin .cck-help-string[data-field-name='"+fieldName+"']").remove();

      //   if(objthis.checked){
      //     jQuerOs(".admin .field-name[data-field-name='"+fieldName+"']").parent()
      //     .prepend('<span class="cck-help-string" data-field-name="'+fieldName+'">'+jQuerOs("[name='fi_"+fieldName+"_tooltip']").val()+'</span>');
      //   }else{
      //     jQuerOs(".admin .cck-help-string[data-field-name='"+fieldName+"']").remove();
      //   }
        
      // });


    }
  //end

  //modal for  location-field 
    function openLocationModal(fildName){
      hideSaveButtons();
      if(debug){
        console.log('openLocationModal('+fildName+')');
      }
      jQuerOs('#location-field-modal').css('z-index', '1500');
      jQuerOs('#location-field-modal').modal({
        backdrop:'static',
        keyboard:false
      });
      jQuerOs("#location-modal-address").val(jQuerOs("#"+fieldName+"_map_address").val());
      jQuerOs("#location-modal-country").val(jQuerOs("#"+fieldName+"_map_country").val());
      jQuerOs("#location-modal-region").val(jQuerOs("#"+fieldName+"_map_region").val());
      jQuerOs("#location-modal-city").val(jQuerOs("#"+fieldName+"_map_city").val());
      jQuerOs("#location-modal-zip-code").val(jQuerOs("#"+fieldName+"_map_zip_code").val());
      jQuerOs("#location-modal-latitude").val(jQuerOs("#"+fieldName+"_map_latitude").val());
      jQuerOs("#location-modal-longitude").val(jQuerOs("#"+fieldName+"_map_longitude").val());
      jQuerOs("#location-modal-zoom").val(jQuerOs("#"+fieldName+"_map_zoom").val());
      jQuerOs("#location-map-type").val(jQuerOs("#"+fieldName+"_map_type").val());
      jQuerOs("#location-modal-code-editor").val(jQuerOs("#"+fieldName+"_map_code").val());

      if(jQuerOs("#"+fieldName+"_map_as_show").val() == 'true'){
        jQuerOs("#location-modal-as-show1").prop('checked', 'checked');
      }else{
        jQuerOs("#location-modal-as-show2").prop('checked', 'checked');
      }
      if(jQuerOs("#"+fieldName+"_map_hide_address").val() == 'true'){
        jQuerOs("#location-modal-hide-address1").prop('checked', 'checked');
      }else{
        jQuerOs("#location-modal-hide-address2").prop('checked', 'checked');
      }
      if(jQuerOs("#"+fieldName+"_map_hide_map").val() == 'true'){
        jQuerOs("#location-modal-hide-map1").prop('checked', 'checked');
      }else{
        jQuerOs("#location-modal-hide-map2").prop('checked', 'checked');
      }

      enableModalMap(fildName);
      enableLocationCodeEditor();
    }
  //end

  function enableLocationCodeEditor(){
    CodeMirror.commands.autocomplete = function(cm) {
      cm.showHint({hint: CodeMirror.hint.anyword});
    }
    jQuerOs(".CodeMirror").remove();
    var editor = CodeMirror.fromTextArea(document.getElementById('location-modal-code-editor'), {
      lineNumbers: true,
      mode: 'text/html',
      keyMap: "sublime",
      autoCloseBrackets: true,
      matchBrackets: true,
      showCursorWhenSelecting: true,
      theme: "monokai",
      styleActiveLine: true,
      tabSize: 2,
      extraKeys: {
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        },
        "Ctrl-Space": "autocomplete"
      }
    });
    editor.on("change", function(cm, change) {
      jQuerOs("#location-modal-code-editor").val(editor.getValue());
    })
  }

  //location modal close
  function saveLocationModalSave(){
      if(debug){
        console.log('saveLocationModalSave()');
      }
    //save params from modal to hidden location field settings
    jQuerOs("#"+fieldName+"_map_address").val(jQuerOs("#location-modal-address").val());
    jQuerOs("#"+fieldName+"_map_country").val(jQuerOs("#location-modal-country").val());
    jQuerOs("#"+fieldName+"_map_region").val(jQuerOs("#location-modal-region").val());
    jQuerOs("#"+fieldName+"_map_city").val(jQuerOs("#location-modal-city").val());
    jQuerOs("#"+fieldName+"_map_zip_code").val(jQuerOs("#location-modal-zip-code").val());
    jQuerOs("#"+fieldName+"_map_latitude").val(jQuerOs("#location-modal-latitude").val());
    jQuerOs("#"+fieldName+"_map_longitude").val(jQuerOs("#location-modal-longitude").val());
    jQuerOs("#"+fieldName+"_map_zoom").val(jQuerOs("#location-modal-zoom").val());
    jQuerOs("#"+fieldName+"_map_type").val(jQuerOs("#location-map-type").val());
    jQuerOs("#"+fieldName+"_map_code").val(jQuerOs("#location-modal-code-editor").val());
    jQuerOs("#"+fieldName+"_map_as_show").val(jQuerOs("input[name='location-modal-as-show']").prop("checked"));
    jQuerOs("#"+fieldName+"_map_hide_address").val(jQuerOs("input[name='location-modal-hide-address']").prop("checked"));
    jQuerOs("#"+fieldName+"_map_hide_map").val(jQuerOs("input[name='location-modal-hide-map']").prop("checked"));

    jQuerOs('#location-field-modal').modal('hide');
    showSaveButtons();
  }
  //end
  function saveLocationModalClose(){
      if(debug){
        console.log('saveLocationModalClose()');
      }
    jQuerOs('#location-field-modal').modal('hide');
    showSaveButtons();
  }

  //location modal map
  function enableModalMap(fName){
      if(debug){
        console.log('enableModalMap('+fName+')');
      }
    var map;
    var marker = null;
    var mapOptions;
    var image = {url: '../components/com_os_cck/images/marker.png'};
    var myOptions = {
        zoom: eval(jQuerOs("#location-modal-zoom").val()),
        scrollwheel: false,
        center: new google.maps.LatLng(jQuerOs("#location-modal-latitude").val(),
                                    jQuerOs("#location-modal-longitude").val()),
        zoomControlOptions: {
           style: google.maps.ZoomControlStyle.LARGE
        },
        mapTypeId: eval('google.maps.MapTypeId.'+jQuerOs("#location-map-type").val())
    };
    var map = new google.maps.Map(document.getElementById("location-modal-map"), myOptions);
    geocoder = new google.maps.Geocoder();
    var bounds = new google.maps.LatLngBounds ();
    //Set the marker coordinates
    var lastmarker = new google.maps.Marker({
        icon: image,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(jQuerOs("#location-modal-latitude").val(),
                                    jQuerOs("#location-modal-longitude").val())
    });
    lastmarker.setMap(map);

    //If the zoom, then store it in the field map_zoom
    google.maps.event.addListener(map,"zoom_changed", function(){
        jQuerOs("#location-modal-zoom").val(map.getZoom());
    });
    google.maps.event.addListener(map,"click", function(e){
        //Initialize marker
        marker = new google.maps.Marker({
          icon: image,
          animation: google.maps.Animation.DROP,
          position: new google.maps.LatLng(e.latLng.lat(),e.latLng.lng())
        });

        //Delete marker
        if(lastmarker) lastmarker.setMap(null);;
        //Add marker to the map
        marker.setMap(map);
        //Output marker information
        jQuerOs("#location-modal-latitude").val(e.latLng.lat());
        jQuerOs("#location-modal-longitude").val(e.latLng.lng());
        //Memory marker to delete
        lastmarker = marker;
    });
    jQuerOs("#location-map-type").change(function(event) {
      enableModalMap();
    });
  }

  function updateCoordinates(latlng){
      if(debug){
        console.log('updateCoordinates('+latlng+')');
      }
    if(latlng) 
    {
      jQuerOs("#location-modal-latitude").val(latlng.lat());
      jQuerOs("#location-modal-longitude").val(latlng.lng());
    }
  }

  function toggleBounce() {
      if(debug){
        console.log('toggleBounce()');
      }
    if (marker.getAnimation() != null) {
      marker.setAnimation(null);
    } else {
      marker.setAnimation(google.maps.Animation.BOUNCE);
    }
  }

  function setupModalLocation(){
      if(debug){
        console.log('setupModalLocation()');
      }
    var marker;
    var myOptions = {
      zoom: eval(jQuerOs("#location-modal-zoom").val()),
      scrollwheel: false,
      zoomControlOptions: {
         style: google.maps.ZoomControlStyle.LARGE
      },
      mapTypeId: eval('google.maps.MapTypeId.'+jQuerOs("#location-map-type").val())
    };
    var map = new google.maps.Map(document.getElementById("location-modal-map"), myOptions);
    var address = jQuerOs("#location-modal-address").val() +" "+jQuerOs("#location-modal-country").val()
                  +" "+jQuerOs("#location-modal-region").val()+" "+jQuerOs("#location-modal-city").val()
                  +" "+jQuerOs("#location-modal-zip-code").val();
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          updateCoordinates(results[0].geometry.location);
          
          var image = {url: '../components/com_os_cck/images/marker.png'};
          if (marker) marker.setMap(null);
          marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              icon: image,
              animation: google.maps.Animation.DROP
          });
          google.maps.event.addListener(marker, 'click', toggleBounce);
          google.maps.event.addListener(marker, "dragend", function() {
              updateCoordinates(marker.getPosition());
          });
          jQuerOs("#location-modal-address").css("borderColor", "#ccc");
          jQuerOs("#location-modal-address").css("color", "#555");
      } else {
        enableModalMap();
        jQuerOs("#location-modal-address").css("borderColor", "#FF0000");
        jQuerOs("#location-modal-address").css("color", "#FF0000");
        jQuerOs("#location-modal-latitude,#location-modal-longitude").val("");
      }
    });
  }
  //end location modal map

    function clearStyleSettings($type){
      if(debug){
        console.log('clearStyleSettings('+$type+')');
      }
      switch($type){
        case "row":
          //set settings
          jQuerOs("#styling-row .margin-pixels:first").prop("checked",true);
          jQuerOs("#styling-row .margin-top").val('');
          jQuerOs("#styling-row .margin-right").val('');
          jQuerOs("#styling-row .margin-bottom").val('');
          jQuerOs("#styling-row .margin-left").val('');
          jQuerOs("#styling-row .padding-pixels:first").prop("checked",true);
          jQuerOs("#styling-row .padding-top").val('');
          jQuerOs("#styling-row .padding-right").val('');
          jQuerOs("#styling-row .padding-bottom").val('');
          jQuerOs("#styling-row .padding-left").val('');
          jQuerOs("#styling-row .background-color").val('');
          jQuerOs("#styling-row .border-size").val('');
          jQuerOs("#styling-row .border-color").val('');
          jQuerOs("#styling-row .font-size").val('');
          jQuerOs("#styling-row .font-weight:first").prop("checked",true);
          jQuerOs("#styling-row .font-color").val('');
          jQuerOs("#styling-row .custom-class").val('');
        break;

        case "col":
          //set settings
          jQuerOs("#styling-col .margin-pixels:first").prop("checked",true);
          jQuerOs("#styling-col .margin-top").val('');
          jQuerOs("#styling-col .margin-right").val('');
          jQuerOs("#styling-col .margin-bottom").val('');
          jQuerOs("#styling-col .margin-left").val('');
          jQuerOs("#styling-col .padding-pixels:first").prop("checked",true);
          jQuerOs("#styling-col .padding-top").val('');
          jQuerOs("#styling-col .padding-right").val('');
          jQuerOs("#styling-col .padding-bottom").val('');
          jQuerOs("#styling-col .padding-left").val('');
          jQuerOs("#styling-col .background-color").val('');
          jQuerOs("#styling-col .border-size").val('');
          jQuerOs("#styling-col .border-color").val('');
          jQuerOs("#styling-col .font-size").val('');
          jQuerOs("#styling-col .font-weight:first").prop("checked",true);
          jQuerOs("#styling-col .font-color").val('');
          jQuerOs("#styling-col .custom-class").val('');
        break;

        case "f":
          //set settings
          //input
          jQuerOs("#styling-f .background-table-header-color").val('');
          jQuerOs("#styling-f .font-table-header-color").val('');

          jQuerOs("#styling-f .margin-pixels:first").prop("checked",true);
          jQuerOs("#styling-f .margin-top").val('');
          jQuerOs("#styling-f .margin-right").val('');
          jQuerOs("#styling-f .margin-bottom").val('');
          jQuerOs("#styling-f .margin-left").val('');
          jQuerOs("#styling-f .padding-pixels:first").prop("checked",true);
          jQuerOs("#styling-f .padding-top").val('');
          jQuerOs("#styling-f .padding-right").val('');
          jQuerOs("#styling-f .padding-bottom").val('');
          jQuerOs("#styling-f .padding-left").val('');
          jQuerOs("#styling-f .background-color").val('');
          jQuerOs("#styling-f .border-size").val('');
          jQuerOs("#styling-f .border-color").val('');
          jQuerOs("#styling-f .font-size").val('');
          jQuerOs("#styling-f .font-weight:first").prop("checked",true);
          jQuerOs("#styling-f .font-color").val('');
          jQuerOs("#styling-f .custom-class").val('');

          //label
          jQuerOs("#styling-f .label-margin-pixels:first").prop("checked",true);
          jQuerOs("#styling-f .label-margin-top").val('');
          jQuerOs("#styling-f .label-margin-right").val('');
          jQuerOs("#styling-f .label-margin-bottom").val('');
          jQuerOs("#styling-f .label-margin-left").val('');
          jQuerOs("#styling-f .label-padding-pixels:first").prop("checked",true);
          jQuerOs("#styling-f .label-padding-top").val('');
          jQuerOs("#styling-f .label-padding-right").val('');
          jQuerOs("#styling-f .label-padding-bottom").val('');
          jQuerOs("#styling-f .label-padding-left").val('');
          jQuerOs("#styling-f .label-background-color").val('');
          jQuerOs("#styling-f .label-border-size").val('');
          jQuerOs("#styling-f .label-border-color").val('');
          jQuerOs("#styling-f .label-font-size").val('');
          jQuerOs("#styling-f .label-font-weight:first").prop("checked",true);
          jQuerOs("#styling-f .label-font-color").val('');
          jQuerOs("#styling-f .label-custom-class").val('');
        break;

        case "l":
          //set settings
          //input
          jQuerOs("#styling-f .margin-pixels:first").prop("checked",true);
          jQuerOs("#styling-f .margin-top").val('');
          jQuerOs("#styling-f .margin-right").val('');
          jQuerOs("#styling-f .margin-bottom").val('');
          jQuerOs("#styling-f .margin-left").val('');
          jQuerOs("#styling-f .padding-pixels:first").prop("checked",true);
          jQuerOs("#styling-f .padding-top").val('');
          jQuerOs("#styling-f .padding-right").val('');
          jQuerOs("#styling-f .padding-bottom").val('');
          jQuerOs("#styling-f .padding-left").val('');
          jQuerOs("#styling-f .background-color").val('');
          jQuerOs("#styling-f .border-size").val('');
          jQuerOs("#styling-f .border-color").val('');
          jQuerOs("#styling-f .font-size").val('');
          jQuerOs("#styling-f .font-weight:first").prop("checked",true);
          jQuerOs("#styling-f .font-color").val('');
          jQuerOs("#styling-f .custom-class").val('');
        break;
      }
      
    }

    //fn-s for readind settings from json string in hidden input
    function readSettings($type){
      if(debug){
        console.log('readSettings('+$type+')');
      }
      switch($type){
        case "row":
          if(jQuerOs("#content-block .row-active-settings").length){
            row = jQuerOs("#content-block .row-active-settings .row-params");
            
            rowSettings = window.JSON.parse(jQuerOs(row).val());
            //set settings
            if(typeof(rowSettings.margin) == 'undefined'){
              jQuerOs("#styling-row .margin-pixels:first").prop("checked",true);
            }else{
              if(rowSettings.margin){
                jQuerOs("#styling-row .margin-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-row .margin-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-row .margin-top").val(rowSettings.marginTop);
            jQuerOs("#styling-row .margin-right").val(rowSettings.marginRight);
            jQuerOs("#styling-row .margin-bottom").val(rowSettings.marginBottom);
            jQuerOs("#styling-row .margin-left").val(rowSettings.marginLeft);
            if(typeof(rowSettings.padding) == 'undefined'){
              jQuerOs("#styling-row .padding-pixels:first").prop("checked",true);
            }else{
              if(rowSettings.padding){
                jQuerOs("#styling-row .padding-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-row .padding-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-row .padding-top").val(rowSettings.paddingTop);
            jQuerOs("#styling-row .padding-right").val(rowSettings.paddingRight);
            jQuerOs("#styling-row .padding-bottom").val(rowSettings.paddingBottom);
            jQuerOs("#styling-row .padding-left").val(rowSettings.paddingLeft);
            jQuerOs("#styling-row .background-color").val(rowSettings.backgroundColor);
            jQuerOs("#styling-row .background-color").minicolors("value",rowSettings.backgroundColor);
            jQuerOs("#styling-row .border-size").val(rowSettings.borderSize);
            jQuerOs("#styling-row .border-color").val(rowSettings.borderColor);
            jQuerOs("#styling-row .border-color").minicolors("value",rowSettings.borderColor);
            jQuerOs("#styling-row .font-size").val(rowSettings.fontSize);
            if(typeof(rowSettings.fontWeight) == 'undefined'){
              jQuerOs("#styling-row .font-weight:first").prop("checked",true);
            }else{
              if(rowSettings.fontWeight){
                jQuerOs("#styling-row .font-weight:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-row .font-weight:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-row .font-color").val(rowSettings.fontColor);
            jQuerOs("#styling-row .font-color").minicolors("value",rowSettings.fontColor);
            jQuerOs("#styling-row .custom-class").val(rowSettings.customClass);
            
                    jQuerOs('.row-active-settings').attr("old_custom_class", rowSettings.customClass);
            jQuerOs("#styling-row #animate").val(rowSettings.animated);
            
                    jQuerOs('.row-active-settings').attr("old_animate", rowSettings.animated);
            jQuerOs("#styling-row #offset_animate").val(rowSettings.offsetAnimated);
                    jQuerOs('.row-active-settings').attr("data-wow-offset", rowSettings.offsetAnimated);
            jQuerOs("#styling-row #hover-animate").val(rowSettings.hoverAnimated);
                    jQuerOs('.row-active-settings').attr("hover_animated", rowSettings.hoverAnimated);

                    
            
          }else{
            clearStyleSettings('row');
          }
        break;

        case "col":
          if(jQuerOs("#content-block .col-active-settings").length){
            col = jQuerOs("#content-block .col-active-settings .col-params");
            colSettings = window.JSON.parse(jQuerOs(col).val());
            //set settings
            if(typeof(colSettings.margin) == 'undefined'){
              jQuerOs("#styling-col .margin-pixels:first").prop("checked",true);
            }else{
              if(colSettings.margin){
                jQuerOs("#styling-col .margin-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-col .margin-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-col .margin-top").val(colSettings.marginTop);
            jQuerOs("#styling-col .margin-right").val(colSettings.marginRight);
            jQuerOs("#styling-col .margin-bottom").val(colSettings.marginBottom);
            jQuerOs("#styling-col .margin-left").val(colSettings.marginLeft);
            if(typeof(colSettings.padding) == 'undefined'){
              jQuerOs("#styling-col .padding-pixels:first").prop("checked",true);
            }else{
              if(colSettings.padding){
                jQuerOs("#styling-col .padding-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-col .padding-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-col .padding-top").val(colSettings.paddingTop);
            jQuerOs("#styling-col .padding-right").val(colSettings.paddingRight);
            jQuerOs("#styling-col .padding-bottom").val(colSettings.paddingBottom);
            jQuerOs("#styling-col .padding-left").val(colSettings.paddingLeft);
            jQuerOs("#styling-col .background-color").val(colSettings.backgroundColor);
            jQuerOs("#styling-col .background-color").minicolors("value",colSettings.backgroundColor);
            jQuerOs("#styling-col .border-size").val(colSettings.borderSize);
            jQuerOs("#styling-col .border-color").val(colSettings.borderColor);
            jQuerOs("#styling-col .border-color").minicolors("value",colSettings.borderColor);
            jQuerOs("#styling-col .font-size").val(colSettings.fontSize);
            if(typeof(colSettings.fontWeight) == 'undefined'){
              jQuerOs("#styling-col .font-weight:first").prop("checked",true);
            }else{
              if(colSettings.fontWeight){
                jQuerOs("#styling-col .font-weight:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-col .font-weight:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-col .font-color").val(colSettings.fontColor);
            jQuerOs("#styling-col .font-color").minicolors("value",colSettings.fontColor);
            jQuerOs("#styling-col .custom-class").val(colSettings.customClass);
            jQuerOs('.col-active-settings').attr("old_custom_class", colSettings.customClass);
            jQuerOs("#styling-col #animate").val(colSettings.animated);
            jQuerOs('.col-active-settings').attr("old_animate", colSettings.animated);
            jQuerOs("#styling-col #offset_animate").val(colSettings.offsetAnimated);
            jQuerOs('.col-active-settings').attr("data-wow-offset", colSettings.offsetAnimated);
            //console.log(colSettings.hoverAnimated);
            jQuerOs("#styling-col #hover-animate").val(colSettings.hoverAnimated);
            jQuerOs('.col-active-settings').attr("hover_animated", colSettings.hoverAnimated);
            
            if(typeof(colSettings.hideColumn) == 'undefined'){
              jQuerOs("#styling-col .inline_field:first").prop("checked",true);
            }else{
              if(colSettings.hideColumn){
                jQuerOs("#styling-col .inline_field:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-col .inline_field:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-col .field_width").val(colSettings.fieldWidth);
          }else{
            clearStyleSettings('col');
          }
        break;

        case "f":
          if(jQuerOs("#content-block .active-field .field-name, #content-block .active-field .entity-name").length 
            && !jQuerOs("#content-block .active-field .field-name[data-field-name^='custom_code_field']").length
            && !jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_mail']").length
            //&& !jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_search_field']").length
            //&& !jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_send_button']").length
            ){
            f = jQuerOs("#content-block .active-field .f-params");
            
            if(f.length > 0){
                fSettings = window.JSON.parse(jQuerOs(f).val());
            }else{
                fSettings = {};
            }
            
            //set settings
            //input
            if(typeof(fSettings.margin) == 'undefined'){
              jQuerOs("#styling-f .margin-pixels:first").prop("checked",true);
            }else{
              if(fSettings.margin){
                jQuerOs("#styling-f .margin-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .margin-pixels:last").prop("checked",true);
              }
            }


            jQuerOs("#styling-f .background-table-header-color").val(fSettings.backgroundTableHeaderColor);
            jQuerOs("#styling-f .background-table-header-color").minicolors("value",fSettings.backgroundTableHeaderColor);
            jQuerOs("#styling-f .font-table-header-color").val(fSettings.fontTableHeaderColor);
            jQuerOs("#styling-f .font-table-header-color").minicolors("value",fSettings.fontTableHeaderColor);


            jQuerOs("#styling-f .margin-top").val(fSettings.marginTop);
            jQuerOs("#styling-f .margin-right").val(fSettings.marginRight);
            jQuerOs("#styling-f .margin-bottom").val(fSettings.marginBottom);
            jQuerOs("#styling-f .margin-left").val(fSettings.marginLeft);
            if(typeof(fSettings.padding) == 'undefined'){
              jQuerOs("#styling-f .padding-pixels:first").prop("checked",true);
            }else{
              if(fSettings.padding){
                jQuerOs("#styling-f .padding-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .padding-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .padding-top").val(fSettings.paddingTop);
            jQuerOs("#styling-f .padding-right").val(fSettings.paddingRight);
            jQuerOs("#styling-f .padding-bottom").val(fSettings.paddingBottom);
            jQuerOs("#styling-f .padding-left").val(fSettings.paddingLeft);
            if(jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'locationfield'){
              jQuerOs("#styling-f .padding-pixels").parent().parent().parent().hide();
            }else{
              jQuerOs("#styling-f .padding-pixels").parent().parent().parent().show();
            }


            jQuerOs("#styling-f .background-color").val(fSettings.backgroundColor);
            jQuerOs("#styling-f .background-color").minicolors("value",fSettings.backgroundColor);
            jQuerOs("#styling-f .border-size").val(fSettings.borderSize);
            jQuerOs("#styling-f .border-color").val(fSettings.borderColor);
            jQuerOs("#styling-f .border-color").minicolors("value",fSettings.borderColor);
            var layout_type = '<?php echo $type; ?>';
            if((jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'text_single_checkbox_onoff'
                || jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'text_radio_buttons'
                || jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'text_select_list')
                && (layout_type == 'add_instance_layout' || layout_type == 'buy_request_instance_layout'
                || layout_type == 'rent_request_instance_layout' || layout_type == 'request_instance_layout'
                || layout_type == 'review_layout')){
              jQuerOs("#styling-f .background-color,#styling-f .border-color").parent().parent().parent().hide();
            jQuerOs("#styling-f .border-size").parent().parent().hide();
            }else{
              jQuerOs("#styling-f .background-color,#styling-f .border-color").parent().parent().parent().show();
              jQuerOs("#styling-f .border-size").parent().parent().show();
            }
            jQuerOs("#styling-f .font-size").val(fSettings.fontSize);

            if(typeof(fSettings.fontWeight) == 'undefined'){
              jQuerOs("#styling-f .font-weight:first").prop("checked",true);
            }else{
              if(fSettings.fontWeight || fSettings.fontWeight === ''){
                jQuerOs("#styling-f .font-weight:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .font-weight:last").prop("checked",true);
              }
            }
            
            jQuerOs("#styling-f .font-color").val(fSettings.fontColor);
            jQuerOs("#styling-f .font-color").minicolors("value",fSettings.fontColor);
            jQuerOs("#styling-f #animate").val(fSettings.animated);
            jQuerOs("#styling-f #offset_animate").val(fSettings.offsetAnimated);
            jQuerOs("#styling-f #hover-animate").val(fSettings.hoverAnimated);
            jQuerOs('.active-field .col_box').attr("hover_animated", fSettings.hoverAnimated);
            jQuerOs("#styling-f .custom-class").val(fSettings.customClass);
            
            jQuerOs("#styling-f .hover_effect").val(fSettings.hoverEffect);
            jQuerOs("#styling-f .hover_background_collor").val(fSettings.hover_background_collor);
            jQuerOs("#styling-f .hover_background_collor").minicolors("value",fSettings.hover_background_collor);
            jQuerOs("#styling-f .hover_text_collor").val(fSettings.hover_text_collor);
            jQuerOs("#styling-f .hover_text_collor").minicolors("value",fSettings.hover_text_collor);
            jQuerOs("#styling-f .hover_border_collor").val(fSettings.hover_border_collor);
            jQuerOs("#styling-f .hover_border_collor").minicolors("value",fSettings.hover_border_collor);
            //console.log(fSettings.text_align)
            jQuerOs("#styling-f select#text_align").val(fSettings.text_align);
            

            //label
            if(typeof(fSettings.labelMargin) == 'undefined'){
              jQuerOs("#styling-f .label-margin-pixels:first").prop("checked",true);
            }else{
              if(fSettings.labelMargin){
                jQuerOs("#styling-f .label-margin-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .label-margin-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .label-margin-top").val(fSettings.labelMarginTop);
            jQuerOs("#styling-f .label-margin-right").val(fSettings.labelMarginRight);
            jQuerOs("#styling-f .label-margin-bottom").val(fSettings.labelMarginBottom);
            jQuerOs("#styling-f .label-margin-left").val(fSettings.labelMarginLeft);
            if(typeof(fSettings.labelPadding) == 'undefined'){
              jQuerOs("#styling-f .label-padding-pixels:first").prop("checked",true);
            }else{
              if(fSettings.labelPadding){
                jQuerOs("#styling-f .label-padding-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .label-padding-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .label-padding-top").val(fSettings.labelPaddingTop);
            jQuerOs("#styling-f .label-padding-right").val(fSettings.labelPaddingRight);
            jQuerOs("#styling-f .label-padding-bottom").val(fSettings.labelPaddingBottom);
            jQuerOs("#styling-f .label-padding-left").val(fSettings.labelPaddingLeft);
            jQuerOs("#styling-f .label-background-color").val(fSettings.labelBackgroundColor);
            jQuerOs("#styling-f .label-background-color").minicolors("value",fSettings.labelBackgroundColor);
            jQuerOs("#styling-f .label-border-size").val(fSettings.labelBorderSize);
            jQuerOs("#styling-f .label-border-color").val(fSettings.labelBorderColor);
            jQuerOs("#styling-f .label-border-color").minicolors("value",fSettings.labelBorderColor);
            jQuerOs("#styling-f .label-font-size").val(fSettings.labelFontSize);
            if(typeof(fSettings.labelFontWeight) == 'undefined'){
              jQuerOs("#styling-f .label-font-weight:first").prop("checked",true);
            }else{
              if(fSettings.labelFontWeight || fSettings.labelFontWeight === ''){
                jQuerOs("#styling-f .label-font-weight:first").prop("checked",true);
              }else{
                jQuerOs("#styling-f .label-font-weight:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .label-font-color").val(fSettings.labelFontColor);
            jQuerOs("#styling-f .label-font-color").minicolors("value",fSettings.labelFontColor);
            jQuerOs("#styling-f .label-custom-class").val(fSettings.labelCustomClass);
            jQuerOs('.active-field').attr("old_custom_class", fSettings.labelCustomClass);
            jQuerOs("#styling-f #label-animate").val(fSettings.labelAnimated);
            jQuerOs('.active-field').attr("old_animate", fSettings.labelAnimated);
            jQuerOs("#styling-f #label_offset_animate").val(fSettings.labelOffsetAnimated);
            jQuerOs('.active-field').attr("data-wow-offset", fSettings.labelOffsetAnimated);
            jQuerOs("#styling-f #label-hover-animate").val(fSettings.labelHoverAnimated);
            jQuerOs('.active-field .field-name').attr("hover_animated", fSettings.labelHoverAnimated);
            jQuerOs("#styling-f #text_align_label").val(fSettings.label_text_align);
             
          }else{
            clearStyleSettings('f');
          }
        break;


        case "l":
          if(jQuerOs("#content-block .active-field .layout-name").length){
            f = jQuerOs("#content-block .active-field .f-params");
            fSettings = window.JSON.parse(jQuerOs(f).val());
            //set settings
            //input
            if(typeof(fSettings.margin) == 'undefined'){
              jQuerOs("#styling-f .margin-pixels:first").prop("checked",true);
            }else{
              if(fSettings.margin){
                jQuerOs("#styling-f .margin-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .margin-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .margin-top").val(fSettings.marginTop);
            jQuerOs("#styling-f .margin-right").val(fSettings.marginRight);
            jQuerOs("#styling-f .margin-bottom").val(fSettings.marginBottom);
            jQuerOs("#styling-f .margin-left").val(fSettings.marginLeft);
            if(typeof(fSettings.padding) == 'undefined'){
              jQuerOs("#styling-f .padding-pixels:first").prop("checked",true);
            }else{
              if(fSettings.padding){
                jQuerOs("#styling-f .padding-pixels:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .padding-pixels:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .padding-top").val(fSettings.paddingTop);
            jQuerOs("#styling-f .padding-right").val(fSettings.paddingRight);
            jQuerOs("#styling-f .padding-bottom").val(fSettings.paddingBottom);
            jQuerOs("#styling-f .padding-left").val(fSettings.paddingLeft);
            if(jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'locationfield'){
              jQuerOs("#styling-f .padding-pixels").parent().parent().parent().hide();
            }else{
              jQuerOs("#styling-f .padding-pixels").parent().parent().parent().show();
            }


            jQuerOs("#styling-f .background-color").val(fSettings.backgroundColor);
            jQuerOs("#styling-f .background-color").minicolors("value",fSettings.backgroundColor);
            jQuerOs("#styling-f .border-size").val(fSettings.borderSize);
            jQuerOs("#styling-f .border-color").val(fSettings.borderColor);
            jQuerOs("#styling-f .border-color").minicolors("value",fSettings.borderColor);
            if(jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'text_single_checkbox_onoff'
                || jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'text_radio_buttons'
                || jQuerOs(".drop-item.active-field .field-name").data("field-type") == 'text_select_list'){
              jQuerOs("#styling-f .background-color,#styling-f .border-color").parent().parent().parent().hide();
            jQuerOs("#styling-f .border-size").parent().parent().hide();
            }else{
              jQuerOs("#styling-f .background-color,#styling-f .border-color").parent().parent().parent().show();
              jQuerOs("#styling-f .border-size").parent().parent().show();
            }
            jQuerOs("#styling-f .font-size").val(fSettings.fontSize);

            if(typeof(fSettings.fontWeight) == 'undefined'){
              jQuerOs("#styling-f .font-weight:first").prop("checked",true);
            }else{
              if(fSettings.fontWeight || fSettings.fontWeight === ''){
                jQuerOs("#styling-f .font-weight:first").prop("checked",true);
              }
              else{
                jQuerOs("#styling-f .font-weight:last").prop("checked",true);
              }
            }
            jQuerOs("#styling-f .font-color").val(fSettings.fontColor);
            jQuerOs("#styling-f .font-color").minicolors("value",fSettings.fontColor);
            jQuerOs("#styling-f #animate").val(fSettings.animated);
            jQuerOs("#styling-f #offset_animate").val(fSettings.offsetAnimated);
            jQuerOs("#styling-f #hover-animate").val(fSettings.hoverAnimated);
            jQuerOs('.active-field .col_box').attr("hover_animated", fSettings.hoverAnimated);
            jQuerOs("#styling-f .custom-class").val(fSettings.customClass);
            jQuerOs("#styling-f select#text_align").val(fSettings.text_align);

          }else{
            clearStyleSettings('f');
          }
        break;



        default:
          form = jQuerOs("#editor-block .form-params");
          formSettings = window.JSON.parse(jQuerOs(form).val());
          //set settings
          if(formSettings.margin){
            jQuerOs("#styling-form .margin-pixels:first").prop("checked",true);
          }
          else{
            jQuerOs("#styling-form .margin-pixels:last").prop("checked",true);
          }
          jQuerOs("#styling-form .margin-top").val(formSettings.marginTop);
          jQuerOs("#styling-form .margin-right").val(formSettings.marginRight);
          jQuerOs("#styling-form .margin-bottom").val(formSettings.marginBottom);
          jQuerOs("#styling-form .margin-left").val(formSettings.marginLeft);
          if(formSettings.padding){
            jQuerOs("#styling-form .padding-pixels:first").prop("checked",true);
          }
          else{
            jQuerOs("#styling-form .padding-pixels:last").prop("checked",true);
          }
          jQuerOs("#styling-form .padding-top").val(formSettings.paddingTop);
          jQuerOs("#styling-form .padding-right").val(formSettings.paddingRight);
          jQuerOs("#styling-form .padding-bottom").val(formSettings.paddingBottom);
          jQuerOs("#styling-form .padding-left").val(formSettings.paddingLeft);
          jQuerOs("#styling-form .background-color").val(formSettings.backgroundColor);
          jQuerOs("#styling-form .background-color").minicolors("value",formSettings.backgroundColor);
          jQuerOs("#styling-form .border-size").val(formSettings.borderSize);
          jQuerOs("#styling-form .border-color").val(formSettings.borderColor);
          jQuerOs("#styling-form .border-color").minicolors("value",formSettings.borderColor);
          jQuerOs("#styling-form .font-size").val(formSettings.fontSize);
          if(formSettings.fontWeight){
            jQuerOs("#styling-form .font-weight:first").prop("checked",true);
          }
          else{
            jQuerOs("#styling-form .font-weight:last").prop("checked",true);
          }
          jQuerOs("#styling-form .font-color").val(formSettings.fontColor);
          jQuerOs("#styling-form .font-color").minicolors("value",formSettings.fontColor);
          jQuerOs("#styling-form .custom-class").val(formSettings.customClass);
          jQuerOs("#styling-form #animate").val(formSettings.animated);
          jQuerOs("#styling-form #offset_animate").val(formSettings.offsetAnimated);
          jQuerOs("#styling-form #hover-animate").val(formSettings.hoverAnimated);
        break;
      }
    }
    //end

    //save settings
    function writeSettings(){
      if(debug){
        console.log('writeSettings()');
      }
      
      if(jQuerOs("#content-block .active").length){
        if(jQuerOs("#content-block .row-active-settings").length){
          row = jQuerOs("#content-block .row-active-settings .row-params");
          // save row settings
          rowSettings = jQuerOs();
          rowSettings.margin = jQuerOs("#styling-row .margin-pixels").prop("checked");
          rowSettings.marginTop = jQuerOs("#styling-row .margin-top").val();
          rowSettings.marginRight = jQuerOs("#styling-row .margin-right").val();
          rowSettings.marginBottom = jQuerOs("#styling-row .margin-bottom").val();
          rowSettings.marginLeft = jQuerOs("#styling-row .margin-left").val();
          rowSettings.padding = jQuerOs("#styling-row .padding-pixels").prop("checked");
          rowSettings.paddingTop = jQuerOs("#styling-row .padding-top").val();
          rowSettings.paddingRight = jQuerOs("#styling-row .padding-right").val();
          rowSettings.paddingBottom = jQuerOs("#styling-row .padding-bottom").val();
          rowSettings.paddingLeft = jQuerOs("#styling-row .padding-left").val();
          rowSettings.backgroundColor = jQuerOs("#styling-row .background-color").val();
          rowSettings.borderSize = jQuerOs("#styling-row .border-size").val();
          rowSettings.borderColor = jQuerOs("#styling-row .border-color").val();
          rowSettings.fontSize = jQuerOs("#styling-row .font-size").val();
          if(jQuerOs("#styling-row .font-weight").prop("checked")){
            rowSettings.fontWeight = 1;
          }else{
            rowSettings.fontWeight = 0;
          }
          rowSettings.fontColor = jQuerOs("#styling-row .font-color").val();
          rowSettings.customClass = jQuerOs("#styling-row .custom-class").val();
          rowSettings.animated = jQuerOs("#styling-row #animate").val();
          rowSettings.offsetAnimated = jQuerOs("#styling-row #offset_animate").val();
          rowSettings.hoverAnimated = jQuerOs("#styling-row #hover-animate").val();
          //wrrite
          jQuerOs(row).val(window.JSON.stringify(rowSettings));
        }
        if(jQuerOs("#content-block .col-active-settings").length){
          col = jQuerOs("#content-block .col-active-settings .col-params");
          // save col settings
          colSettings = jQuerOs();
          colSettings.margin = jQuerOs("#styling-col .margin-pixels").prop("checked");
          colSettings.marginTop = jQuerOs("#styling-col .margin-top").val();
          colSettings.marginRight = jQuerOs("#styling-col .margin-right").val();
          colSettings.marginBottom = jQuerOs("#styling-col .margin-bottom").val();
          colSettings.marginLeft = jQuerOs("#styling-col .margin-left").val();
          colSettings.padding = jQuerOs("#styling-col .padding-pixels").prop("checked");
          colSettings.paddingTop = jQuerOs("#styling-col .padding-top").val();
          colSettings.paddingRight = jQuerOs("#styling-col .padding-right").val();
          colSettings.paddingBottom = jQuerOs("#styling-col .padding-bottom").val();
          colSettings.paddingLeft = jQuerOs("#styling-col .padding-left").val();
          colSettings.backgroundColor = jQuerOs("#styling-col .background-color").val();
          colSettings.borderSize = jQuerOs("#styling-col .border-size").val();
          colSettings.borderColor = jQuerOs("#styling-col .border-color").val();
          colSettings.fontSize = jQuerOs("#styling-col .font-size").val();
          if(jQuerOs("#styling-col .font-weight").prop("checked")){
            colSettings.fontWeight = 1;
          }else{
            colSettings.fontWeight = 0;
          }
          colSettings.fontColor = jQuerOs("#styling-col .font-color").val();
          colSettings.customClass = jQuerOs("#styling-col .custom-class").val();
          colSettings.animated = jQuerOs("#styling-col #animate").val();
          colSettings.offsetAnimated = jQuerOs("#styling-col #offset_animate").val();
          colSettings.hoverAnimated = jQuerOs("#styling-col #hover-animate").val();
          
          if(jQuerOs("#styling-col .inline_field").prop("checked")){
            colSettings.hideColumn = 1;
          }else{
            colSettings.hideColumn = 0;
          }
          colSettings.fieldWidth = jQuerOs("#styling-col .field_width").val();
          //wrrite
          jQuerOs(col).val(window.JSON.stringify(colSettings));
        }
      }
      if(jQuerOs("#content-block .active-field .field-name, #content-block .active-field .entity-name").length
          && !jQuerOs("#content-block .active-field .field-name[data-field-name^='custom_code_field']").length
          && !jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_mail']").length
          //&& !jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_search_field']").length
          // && !jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_send_button']").length
          ){

        f = jQuerOs("#content-block .active-field .f-params");
        
        // save field settings
        fSettings = jQuerOs();
        //input

        fSettings.backgroundTableHeaderColor = jQuerOs("#styling-f .background-table-header-color").val();
        fSettings.fontTableHeaderColor = jQuerOs("#styling-f .font-table-header-color").val();

        fSettings.margin = jQuerOs("#styling-f .margin-pixels").prop("checked");
        fSettings.marginTop = jQuerOs("#styling-f .margin-top").val();
        fSettings.marginRight = jQuerOs("#styling-f .margin-right").val();
        fSettings.marginBottom = jQuerOs("#styling-f .margin-bottom").val();
        fSettings.marginLeft = jQuerOs("#styling-f .margin-left").val();
        fSettings.padding = jQuerOs("#styling-f .padding-pixels").prop("checked");
        fSettings.paddingTop = jQuerOs("#styling-f .padding-top").val();
        fSettings.paddingRight = jQuerOs("#styling-f .padding-right").val();
        fSettings.paddingBottom = jQuerOs("#styling-f .padding-bottom").val();
        fSettings.paddingLeft = jQuerOs("#styling-f .padding-left").val();
        fSettings.backgroundColor = jQuerOs("#styling-f .background-color").val();
        fSettings.borderSize = jQuerOs("#styling-f .border-size").val();
        fSettings.borderColor = jQuerOs("#styling-f .border-color").val();
        fSettings.fontSize = jQuerOs("#styling-f .font-size").val();
        if(jQuerOs("#styling-f .font-weight").prop("checked")){
          fSettings.fontWeight = 1;
        }else{
          fSettings.fontWeight = 0;
        }
        fSettings.fontColor = jQuerOs("#styling-f .font-color").val();
        fSettings.customClass = jQuerOs("#styling-f .custom-class").val();
        if(jQuerOs("#styling-f #animate").val() == 'none'){
            fSettings.animated = '';
        }else{
            fSettings.animated = jQuerOs("#styling-f #animate").val();
        }
        fSettings.offsetAnimated = jQuerOs("#styling-f #offset_animate").val();
        if(jQuerOs("#styling-f #hover-animate").val() == 'none'){
            fSettings.hoverAnimated = '';
            jQuerOs("#content-block .active-field .col-box").attr('hover_animated', '');
        }else{
            fSettings.hoverAnimated = jQuerOs("#styling-f #hover-animate").val();
            jQuerOs("#content-block .active-field .col-box").attr('hover_animated', fSettings.hoverAnimated);
        }
        
        fSettings.hoverEffect = jQuerOs("#styling-f .hoverEffect").val();
        fSettings.hover_background_collor = jQuerOs("#styling-f .hover_background_collor").val();
        fSettings.hover_text_collor = jQuerOs("#styling-f .hover_text_collor").val();
        fSettings.hover_border_collor = jQuerOs("#styling-f .hover_border_collor").val();
        fSettings.text_align = jQuerOs("#styling-f select#text_align").val();
        //console.log(jQuerOs("#styling-f select#text_align"))
        
        
        //label
        fSettings.labelMargin = jQuerOs("#styling-f .label-margin-pixels").prop("checked");
        fSettings.labelMarginTop = jQuerOs("#styling-f .label-margin-top").val();
        fSettings.labelMarginRight = jQuerOs("#styling-f .label-margin-right").val();
        fSettings.labelMarginBottom = jQuerOs("#styling-f .label-margin-bottom").val();
        fSettings.labelMarginLeft = jQuerOs("#styling-f .label-margin-left").val();
        fSettings.labelPadding = jQuerOs("#styling-f .label-padding-pixels").prop("checked");
        fSettings.labelPaddingTop = jQuerOs("#styling-f .label-padding-top").val();
        fSettings.labelPaddingRight = jQuerOs("#styling-f .label-padding-right").val();
        fSettings.labelPaddingBottom = jQuerOs("#styling-f .label-padding-bottom").val();
        fSettings.labelPaddingLeft = jQuerOs("#styling-f .label-padding-left").val();
        fSettings.labelBackgroundColor = jQuerOs("#styling-f .label-background-color").val();
        fSettings.labelBorderSize = jQuerOs("#styling-f .label-border-size").val();
        fSettings.labelBorderColor = jQuerOs("#styling-f .label-border-color").val();
        fSettings.labelFontSize = jQuerOs("#styling-f .label-font-size").val();
        fSettings.labelFontWeight = jQuerOs("#styling-f .label-font-weight").prop("checked");
        if(jQuerOs("#styling-f .label-font-weight").prop("checked")){
          fSettings.labelFontWeight = 1;
        }else{
          fSettings.labelFontWeight = 0;
        }
        fSettings.labelFontColor = jQuerOs("#styling-f .label-font-color").val();
        fSettings.labelCustomClass = jQuerOs("#styling-f .label-custom-class").val();
        fSettings.labelAnimated = jQuerOs("#styling-f #label-animate").val();
        fSettings.labelOffsetAnimated = jQuerOs("#styling-f #label_offset_animate").val();
        fSettings.labelHoverAnimated = jQuerOs("#styling-f #label-hover-animate").val();
        
        fSettings.label_text_align = jQuerOs("#styling-f #text_align_label").val();
        //wrrite
        jQuerOs(f).val(window.JSON.stringify(fSettings));
      }


      if(jQuerOs("#content-block .active-field .layout-name").length){

        f = jQuerOs("#content-block .active-field .f-params");
        // save field settings
        fSettings = jQuerOs();
        //input
        fSettings.margin = jQuerOs("#styling-f .margin-pixels").prop("checked");
        fSettings.marginTop = jQuerOs("#styling-f .margin-top").val();
        fSettings.marginRight = jQuerOs("#styling-f .margin-right").val();
        fSettings.marginBottom = jQuerOs("#styling-f .margin-bottom").val();
        fSettings.marginLeft = jQuerOs("#styling-f .margin-left").val();
        fSettings.padding = jQuerOs("#styling-f .padding-pixels").prop("checked");
        fSettings.paddingTop = jQuerOs("#styling-f .padding-top").val();
        fSettings.paddingRight = jQuerOs("#styling-f .padding-right").val();
        fSettings.paddingBottom = jQuerOs("#styling-f .padding-bottom").val();
        fSettings.paddingLeft = jQuerOs("#styling-f .padding-left").val();
        fSettings.backgroundColor = jQuerOs("#styling-f .background-color").val();
        fSettings.borderSize = jQuerOs("#styling-f .border-size").val();
        fSettings.borderColor = jQuerOs("#styling-f .border-color").val();
        fSettings.fontSize = jQuerOs("#styling-f .font-size").val();
        if(jQuerOs("#styling-f .font-weight").prop("checked")){
          fSettings.fontWeight = 1;
        }else{
          fSettings.fontWeight = 0;
        }
        fSettings.fontColor = jQuerOs("#styling-f .font-color").val();
        fSettings.customClass = jQuerOs("#styling-f .custom-class").val();
        fSettings.text_align = jQuerOs("#styling-f select#text_align").val();
        
        if(jQuerOs("#styling-f #animate").val() == 'none'){
            fSettings.animated = '';
        }else{
            fSettings.animated = jQuerOs("#styling-f #animate").val();
        }
        fSettings.offsetAnimated = jQuerOs("#styling-f #offset_animate").val();
        if(jQuerOs("#styling-f #hover-animate").val() == 'none'){
            fSettings.hoverAnimated = '';
            jQuerOs("#content-block .active-field .col-box").attr('hover_animated', '');
        }else{
            fSettings.hoverAnimated = jQuerOs("#styling-f #hover-animate").val();
            jQuerOs("#content-block .active-field .col-box").attr('hover_animated', fSettings.hoverAnimated);
        }
        //wrrite
        jQuerOs(f).val(window.JSON.stringify(fSettings));

      }


      if(jQuerOs("#styling-form:visible").length){
        form = jQuerOs("#editor-block .form-params");
        // save form settings
        formSettings = jQuerOs();
        //input
        formSettings.margin = jQuerOs("#styling-form .margin-pixels").prop("checked");
        formSettings.marginTop = jQuerOs("#styling-form .margin-top").val();
        formSettings.marginRight = jQuerOs("#styling-form .margin-right").val();
        formSettings.marginBottom = jQuerOs("#styling-form .margin-bottom").val();
        formSettings.marginLeft = jQuerOs("#styling-form .margin-left").val();
        formSettings.padding = jQuerOs("#styling-form .padding-pixels").prop("checked");
        formSettings.paddingTop = jQuerOs("#styling-form .padding-top").val();
        formSettings.paddingRight = jQuerOs("#styling-form .padding-right").val();
        formSettings.paddingBottom = jQuerOs("#styling-form .padding-bottom").val();
        formSettings.paddingLeft = jQuerOs("#styling-form .padding-left").val();
        formSettings.backgroundColor = jQuerOs("#styling-form .background-color").val();
        formSettings.borderSize = jQuerOs("#styling-form .border-size").val();
        formSettings.borderColor = jQuerOs("#styling-form .border-color").val();
        formSettings.fontSize = jQuerOs("#styling-form .font-size").val();
        if(jQuerOs("#styling-form .font-weight").prop("checked")){
          formSettings.fontWeight = 1;
        }else{
          formSettings.fontWeight = 0;
        }
        formSettings.fontColor = jQuerOs("#styling-form .font-color").val();
        formSettings.customClass = jQuerOs("#styling-form .custom-class").val();
        if(jQuerOs("#styling-form #animate").val() == 'none'){
            formSettings.animated = '';
        }else{
            formSettings.animated = jQuerOs("#styling-form #animate").val();
        }
        formSettings.offsetAnimated = jQuerOs("#styling-form #offset_animate").val();
        if(jQuerOs("#styling-form #hover-animate").val() == 'none'){
            formSettings.hoverAnimated = '';
        }else{
            formSettings.hoverAnimated = jQuerOs("#styling-form #hover-animate").val();
        }
        //wrrite
        jQuerOs(form).val(window.JSON.stringify(formSettings));
      }
      
    }
    //end

    //fn for hide options
    function hide_options(){
      if(debug){
        console.log('hide_options()');
      }
      jQuerOs("#field_options div[id^='options-field-']").hide();
      jQuerOs("#content-block .drop-area, #content-block .content-row, #content-block").removeClass("active col-active-settings row-active-settings");
      jQuerOs("#content-block .drop-item").removeClass('active-field col-active-settings row-active-settings');
    }
    //end

    function addFieldOptions(fName){
      if(debug){
        console.log('addFieldOptions('+fName+')');
      }
      jQuerOs.post("index.php?option=com_os_cck&task=addFieldOptions&lid="+jQuerOs("#lid").val()+"&layout_type="+jQuerOs("[name='type']").val()+"&fieldName="+fName+"&fk_eid="+jQuerOs("[name='fk_eid']").val()+"&format=raw",
                 {},
      function (data) {
        //jQuerOs("#ui-accordion-fields-options-accordion-panel-0").append(data.html);
        jQuerOs(".main-fields-options").append(data.html);
        make_required();
        make_popover();
      } , 'json' );
    }

    function makeSearchInFields(){
      if(debug){
        console.log('makeSearchInFields()');
      }
      jQuerOs(".cck-main-field-search").on('keyup', function(event) {
        input = jQuerOs(this).val();
        if(input != ''){
          jQuerOs("#fields-block .field-block ").each(function(index, el) {
            //slowwwww//jQuerOs(el).find(".field-name").text().search(eval("/"+input+"/ig"))
            //fast//jQuerOs(el).find(".field-name").text().search(input)
            if(jQuerOs(el).find(".field-name").text().search(new RegExp(input,"i")) >=0){
              jQuerOs(el).show();
            }else{
              jQuerOs(el).hide();
            }
          });
        }else{
          jQuerOs("#fields-block .field-block ").show();
        }
      });
    }

    function makeSearchInEntityFields(){
      if(debug){
        console.log('makeSearchInEntityFields()');
      }
      jQuerOs(".cck-entity-field-search").on('keyup', function(event) {
        input = jQuerOs(this).val();
        
        if(input != ''){
          jQuerOs(".adminlist tr:not(:first-child)").each(function(index, el) {
            //slowwwww//jQuerOs(el).find(".field-name").text().search(eval("/"+input+"/ig"))
            //fast//jQuerOs(el).find(".field-name").text().search(input)
            if(jQuerOs(el).find(".field-name-list").text().search(new RegExp(input,"i")) >=0 
              || jQuerOs(el).find(".field-id").text().search(new RegExp(input,"i")) >=0
              || jQuerOs(el).find(".field-type").text().search(new RegExp(input,"i")) >=0){
              jQuerOs(el).show();
            }else{
              jQuerOs(el).hide();
            }
          });
        }else{
          jQuerOs(".adminlist tr").show();
        }
      });
    }

    //fn for show/hide options
    function makeOptions (){
      if(debug){
        console.log('makeOptions()');
      }
      hide_options();
      jQuerOs("#content-block .drop-item").on('click',function() {
        if(debug){
          console.log('#content-block .drop-item::click');
        }
        //check if active 1-st tab
        if(jQuerOs( "#field_options" ).tabs( "option", "active" ) == 0){
          jQuerOs("#fields-options-accordion").show();
          writeSettings();
          hide_options();
          jQuerOs("#content-block .drop-item").removeClass('active-field');
          jQuerOs(this).addClass('active-field');
          readSettings('f');
          
          if(jQuerOs(this).find(".field-name").length){
            fieldName = jQuerOs(this).find(".field-name").data('field-name');
          }else if(jQuerOs(this).find(".module-name").length){
            fieldName = jQuerOs(this).find(".module-name").data('field-name');
          }else if(jQuerOs(this).find(".entity-name").length){
            fieldName = jQuerOs(this).find(".entity-name").data('field-name');
          }else{
            fieldName = jQuerOs(this).find(".layout-name").data('field-name');
          }
          
          jQuerOs("#field_options #options-field-"+fieldName).show();
          jQuerOs("#field_options #styling-f").show();
          saveAccordionState();
          if(jQuerOs("#content-block .active-field span[data-field-name^='custom_code_field']").length
            || jQuerOs("#content-block .active-field span[data-field-name^='cck_mail']").length
            // || jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_search_field']").length
            // || jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_send_button']").length
            || jQuerOs("#content-block .active-field .module-name").length
            // || jQuerOs("#content-block .active-field .layout-name").length
            ){

            jQuerOs("#ui-accordion-fields-options-accordion-header-1, #ui-accordion-fields-options-accordion-panel-1").hide();

          }else if(jQuerOs(this).find(".field-name").attr('data-field-name') == 'category_map'
                  || jQuerOs(this).find(".field-name").attr('data-field-name') == 'user_map'
                  || jQuerOs(this).find(".field-name").attr('data-field-name') == 'all_instance_map'){
              
              
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #background-color").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #font-size").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #font_weight").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #font-color").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #text_align").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #hover_background_collor").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #hover_text_collor").hide();
              jQuerOs('.table_header').hide();
          }else if(jQuerOs(this).find(".field-name").attr('data-field-name') == 'joom_alphabetical'
                  || jQuerOs(this).find(".field-name").attr('data-field-name') == 'joom_pagination'){
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #font-color").hide();
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1 #hover_text_collor").hide();
              jQuerOs('.table_header').hide();
          }else{

            jQuerOs('#styling-f>h2.style-for-block').hide();

            jQuerOs('.table_header').hide();

            if(jQuerOs("#content-block .active-field div[data-field-name='calendar_table']").length){
              jQuerOs('.table_header').show();
            }

            if(fieldActiveState){
              jQuerOs("#ui-accordion-fields-options-accordion-panel-1").show();  
            }
            jQuerOs("#ui-accordion-fields-options-accordion-header-1").show();

              //for buttons in add layouts
            if(jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_send_button']").length
              || jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_cal_import']").length
              || jQuerOs("#content-block .active-field .field-name[data-field-name^='cck_instance_navigation']").length){
              jQuerOs('#styling-f>div,h2').not('.style-for-block').hide();
            }else{
              jQuerOs('#styling-f>div,h2').not('.style-for-block').show();
            }


              //block for layout dropdown style list for button
            if(jQuerOs("#content-block .active-field .layout-name").length){
              var layout_name = jQuerOs(this).children('span.layout-name').attr('data-field-name');

              if(jQuerOs(".main-fields-content select[id='vi_show_type_request_layout"+layout_name+"']").val() != 1){

                readSettings('l');
                jQuerOs("#ui-accordion-fields-options-accordion-header-1").slideDown();
                jQuerOs('#styling-f>div,h2').not('.style-for-block').hide();

                jQuerOs('#styling-f>h2.style-for-block').show();

              }else{
                jQuerOs("#ui-accordion-fields-options-accordion-header-1, #ui-accordion-fields-options-accordion-panel-1").hide();
              }

            }

          }
          jQuerOs( "#fields-options-accordion" ).accordion( "option", "active", fieldActiveState );
          //form
          jQuerOs("div[id^='styling-form']").show();
          jQuerOs("#form-options-accordion").accordion( "option", "active", formActiveState );
          //block
          //row
          //hide module--field options
          if(jQuerOs(this).find(".module-name").length){
            jQuerOs("#fields-options-accordion").hide();
          }
        }
      });
      
      jQuerOs(".main-fields-content select[id^='vi_show_type_']").on('change',function() {
          
          if(jQuerOs(this).val() != 1){
            jQuerOs("#ui-accordion-fields-options-accordion-header-1").slideDown();
            jQuerOs('#styling-f>div,h2').not('.style-for-block').hide();
            readSettings('l');
          }else{
            jQuerOs("#ui-accordion-fields-options-accordion-header-1, #ui-accordion-fields-options-accordion-panel-1").slideUp();
          }

      });

      jQuerOs(".modal-header .close, #attached-layout-modal, #attached-module-modal, #attached-child-enteties-modal").on('click',function() {
        if(debug){
          console.log('.modal-header .close::click');
        }
        showSaveButtons();
      });

      //block //column show/hide
      jQuerOs("#content-block .drop-area").on('click',function() {
        if(debug){
          console.log('#content-block .drop-area::click');
        }
        //save settings
        writeSettings();
        //
        
        //we in field options
        if(!jQuerOs(this).find(".drop-item.active-field").length){
          jQuerOs("#content-block .drop-item").removeClass("active-field");
        }
        //row
        jQuerOs("#editor-block .content-row, #editor-block .drop-area, #editor-block").removeClass('active row-active-settings col-active-settings')
        saveAccordionState();
        jQuerOs( "#block-options-accordion" ).accordion( "option", "active", blockActiveState );
        if(jQuerOs( "#field_options" ).tabs( "option", "active" ) == 1){
          if(blockActiveState){
            jQuerOs(this).addClass('active col-active-settings');
          }else{
            jQuerOs(this).parent('div.row').addClass('active row-active-settings');
          }
        }
        
        colId = jQuerOs(this).data("column-number");
        rowId = jQuerOs(this).parent().data("row-number");
        fieldName = jQuerOs(this).find(".drop-item.active-field .field-name").data("field-name");
        jQuerOs("#styling-row").attr("data-row-id", rowId);
        jQuerOs("#styling-col").attr("data-col-id", colId);
        jQuerOs("#styling-f").attr("data-field-name", fieldName);
        
        readSettings('col');
        readSettings('row');
        
      });
      //fn for show/hide form options
      jQuerOs("#field_options #ui-id-1").on('click',function() {
        writeSettings();
        if(debug){
          console.log("#field_options #ui-id-1::click");
        }
        jQuerOs("#content-block .content-row, #content-block .drop-area, #editor-block").removeClass("active");
        if(fieldActiveState == 0){//active field main option
          if(jQuerOs("#fields-options-accordion div[id^='options-field-']:visible").length){
            fieldName = jQuerOs("#fields-options-accordion div[id^='options-field-']:visible").attr('id');
            if(fieldName){
              fieldName = fieldName.replace('options-field-','');
              jQuerOs("#content-block .drop-item span[data-field-name='"+fieldName+"']").parent().addClass("active-field");
            }
          }
        }else{//field styling option
          if(jQuerOs("#fields-options-accordion #styling-f:visible").length){
            fieldName = jQuerOs("#fields-options-accordion #styling-f:visible").attr('data-field-name');
            if(fieldName){
              jQuerOs("#content-block .drop-item span[data-field-name='"+fieldName+"']").parent().addClass("active-field");
            }
          }
        }
        readSettings('l');
        readSettings('f');
        saveAccordionState();
      });
    //end
      //fn for change active element on block option click
      jQuerOs("#field_options #ui-id-2").on('click',function(){
        writeSettings();
        if(debug){
          console.log('#field_options #ui-id-2::click');
        }
        jQuerOs('.table_header').hide();
        jQuerOs("#editor-block").removeClass("active col-active-settings row-active-settings");
        activeField = jQuerOs("#content-block").find(".drop-item.active-field").length;
        if(!activeField){//no active field
          activeRow = jQuerOs("#content-block").find(".drop-area.active").length;
          if(activeRow && blockActiveState == 0){//row style //allready active
            activeRow = jQuerOs("#content-block").find(".drop-area.active");
            jQuerOs(activeRow).removeClass("active col-active-settings row-active-settings");
            jQuerOs(activeRow).parent("div.content-row").addClass("active row-active-settings");
          }else if(!activeRow && blockActiveState == 0){//row style
            rowName = jQuerOs("#block-options-accordion #styling-row:visible").attr('data-row-id');
            if(rowName){
              jQuerOs("#content-block div[data-row-number='"+rowName+"']").addClass("active row-active-settings");
            }
          }else if(!activeRow && blockActiveState == 1){//column style
            columnName = jQuerOs("#block-options-accordion #styling-col:visible").attr('data-col-id');
            if(columnName){
              jQuerOs("#content-block .content-row div[data-col-number='"+columnName+"']").addClass("active col-active-settings");
            }
          }
        }else{
          activeField = jQuerOs("#content-block").find(".drop-item.active-field");
          jQuerOs(activeField).removeClass("active-field");
          if(blockActiveState == 0){//row style
            jQuerOs(activeField).parent().parent("div.content-row").addClass("active row-active-settings");
          }else{//column style
            jQuerOs(activeField).parent("div.drop-area").addClass("active col-active-settings");
          }
        }
        readSettings('col');
        readSettings('row');
        saveAccordionState();
      });
    //end
      //fn for click on row styles
      jQuerOs("#field_options #row-styling").on('click',function() {
        if(debug){
          console.log('#field_options #row-styling::click');
        }
        writeSettings();
        setTimeout(function(){
          if(jQuerOs("#options-tab-2 #styling-row:visible").length){
            jQuerOs("#content-block .drop-area").removeClass("active row-active-settings col-active-settings");
            rowId = jQuerOs("#options-tab-2 #styling-row:visible").attr('data-row-id');
            if(rowId){
              jQuerOs("#content-block div[data-row-number='"+rowId+"']").addClass("active row-active-settings");
            }
          }
          readSettings('row');
          saveAccordionState();
        }, 500);
      });
    //end
      //fn for click on column styles
      jQuerOs("#field_options #column-styling").on('click',function() {
        if(debug){
          console.log('#field_options #column-styling::click');
        }
        writeSettings();
        setTimeout(function(){
          if(jQuerOs("#options-tab-2 #styling-col:visible").length){
            jQuerOs("#content-block .content-row").removeClass("active row-active-settings col-active-settings");
            colId = jQuerOs("#options-tab-2 #styling-col:visible").attr('data-col-id');
            if(colId){
              jQuerOs("#content-block div[data-column-number='"+colId+"']").addClass("active col-active-settings");
            }
          }
          readSettings('col');
          saveAccordionState();
        }, 500);
      });
    //end
      //fn for show/hide form options
      jQuerOs("#field_options #ui-id-3").on('click',function() {
        if(debug){
          console.log('#field_options #ui-id-3::click');
        }
        jQuerOs('.table_header').hide();
        writeSettings();
        jQuerOs("#content-block .content-row, #content-block .drop-area").removeClass("active");
        jQuerOs("#content-block .drop-item").removeClass('active-field');
        jQuerOs("#editor-block").addClass("active");
        jQuerOs("div[id^='styling-form-']").show();
        jQuerOs("#form-options-accordion").accordion( "option", "active", formActiveState );
        saveAccordionState();
        readSettings();
      });
      make_editor();
    }
  //end
    //fn fot delete row
    function makeDeleteRow(){
      if(debug){
        console.log('makeDeleteRow()');
      }
      jQuerOs("#content-block .delete-row").on('click',function() {
        if(debug){
          console.log('#content-block .delete-row::click');
        }
        //return fields and layouts to it's place
        jQuerOs(this).parent().find(".drop-item").each(function( index ) {
          if(jQuerOs(this).find(".f-inform-button").length){
            //field block
            jQuerOs(this).find(".delete-row, .delete-field, span[class$='inform-button']").remove();
            //check unique fields
            if(jQuerOs(this).find(".field-name").data("field-name").indexOf("custom_code_field_") >= 0
              || jQuerOs(this).find(".field-name").data("field-name") == 'joom_pagination'
              || jQuerOs(this).find(".field-name").data("field-name") == 'joom_alphabetical'
              || jQuerOs(this).find(".field-name").data("field-name") == 'calendar_month_year'
              || jQuerOs(this).find(".field-name").data("field-name") == 'calendar_pagination'
              || jQuerOs(this).find(".field-name").data("field-name").indexOf("cck_calculated_price_") >= 0
              ){
              jQuerOs(this).parent().remove();
              return;
            }

            //return field to fields-block
            jQuerOs(this).removeClass("drop-item").addClass("field-block");
            jQuerOs(this).wrapInner( "<div></div>" );

            if(jQuerOs("#new-field-block").length){
              jQuerOs("#new-field-block").before(jQuerOs(this));
            }else{
              jQuerOs("#attached-block").before(jQuerOs(this));
            }

          }
          if(jQuerOs(this).find(".m-inform-button").length){
            //module block
            jQuerOs(this).find(".delete-row, .delete-module, span[class$='inform-button']").remove();
            jQuerOs(this).removeClass("drop-item").addClass("attached-module-block");
            jQuerOs(this).wrapInner( "<div></div>" );
            jQuerOs("#add-module").before(jQuerOs(this));
          }
          if(jQuerOs(this).find(".l-inform-button").length){
            //layout block
            jQuerOs(this).find(".delete-row, .delete-layout, span[class$='inform-button']").remove();
            jQuerOs(this).removeClass("drop-item").addClass("attached-layout-block");
            jQuerOs(this).wrapInner( "<div></div>" );
            jQuerOs("#add-layout").before(jQuerOs(this));
          }
        });
      //end
        //remove row
        jQuerOs(this).parent().remove();
        make_attachedDraggable();
        make_draggable();
      });
    }
  //end

  //end clicked funs

    //remove joomla bars
    function make_remove_joomla_bars(){
      if(debug){
        console.log('make_remove_joomla_bars()');
      }
      jQuerOs(".navbar-inverse, .btn-subhead, #status, .header .container-logo").remove();
    }
  //end
    //synchronize fields
    function make_synchronize_fields(){
      if(debug){
        console.log('make_synchronize_fields()');
      }
      
      jQuerOs( "#content-block .drop-item .field-name" ).each(function( index ) {
          
        existField = jQuerOs(this).data("field-name").trim();
        Textfield = jQuerOs(this);
        field_exist = false;
        jQuerOs( "#fields-block .field-block .field-name" ).each(function( index ) {
          if(jQuerOs(this).data("field-name") != undefined && jQuerOs(this).data("field-name").trim() == existField 
            && jQuerOs(this).data('field-name') != 'joom_pagination'
            && jQuerOs(this).data('field-name') != 'joom_alphabetical'
            && jQuerOs(this).data('field-name') != 'calendar_month_year'
            && jQuerOs(this).data('field-name') != 'calendar_pagination'){
            field_exist = true;
            fieldPopover=jQuerOs(this).parent().data("content")||'';
            if(fieldPopover){
              jQuerOs(Textfield).parent().attr("data-content",fieldPopover);
            }
            
            fieldText = jQuerOs(this).text().trim();
            
            Textfield.text(fieldText);
            jQuerOs(this).parent().parent().remove();
          }
        });
        if(!field_exist && jQuerOs(this).data('field-name').indexOf("custom_code_field_") < 0 
            && jQuerOs(this).data('field-name') != 'joom_pagination'
            && jQuerOs(this).data('field-name') != 'joom_alphabetical'
            && jQuerOs(this).data('field-name') != 'calendar_month_year'
            && jQuerOs(this).data('field-name') != 'calendar_pagination'
            && jQuerOs(this).data('field-name').indexOf("cck_calculated_price_") < 0){
          jQuerOs(this).parent().remove();
        }
      });
    }
  //end
    //synchronize layout
    function make_synchronize_layout(){
      if(debug){
        console.log('make_synchronize_layout()');
      }
      jQuerOs("#content-block .drop-item .layout-name").each(function( index ) {
        //jQuerOs(this).parent().prepend('<span class="l-inform-button"></span>');
        if(jQuerOs("#attached-layout-row-"+jQuerOs(this).attr("data-field-name")).length){
          layName = jQuerOs("#attached-layout-row-"+jQuerOs(this).attr("data-field-name")+" span:first").html();
          jQuerOs("#editor-block .layout-name[data-field-name='"+jQuerOs(this).attr("data-field-name")+"']").html(layName);
          jQuerOs("#attached-layout-row-"+jQuerOs(this).attr("data-field-name")).remove();
        }else{
          jQuerOs(this).parent().remove();
        }
      });
    }
  //end
  //fn for title hide/show
    function make_showHideTitle(){
      if(debug){
        console.log('make_showHideTitle()');
      }
      jQuerOs("input[name^='fi_showName_'],input[name*='showName_custom_code_field_'],input[name*='vi_show_request_layout_name']").on('click',function() {
        if(debug){
          console.log("input[name^='fi_showName_'],input[name*='showName_custom_code_field_'],input[name*='vi_show_request_layout_name']::click");
        }
        field_name = jQuerOs(this).data('field-name');
        if(this.checked){
          jQuerOs('span[data-field-name='+field_name+']').removeClass("hide-field-name-"+field_name);
        }else{
          jQuerOs('span[data-field-name='+field_name+']').addClass("hide-field-name-"+field_name);
        }
      });
    }
  //end
    //fn for tabs
    function makeTabs(){
      if(debug){
        console.log('makeTabs()');
      }
      jQuerOs( "#field_options" ).tabs();
    }
  //end
    //accordion
    function make_accordion(){
      if(debug){
        console.log('make_accordion()');
      }
      jQuerOs( "#fields-options-accordion,#form-options-accordion,#block-options-accordion" ).accordion({
        active: false,
        collapsible: true,
        icons:false,
        heightStyle: "content"
      });
    }
  //end
  //draggable for fields
    function make_draggable(){
      if(debug){
        console.log('make_draggable()');
      }
      jQuerOs( ".field-block" ).draggable({
        helper: "clone",
        cursor: "move",
        cancel: null
      });
    }
  //end
    //draggable for attached layout
    function make_attachedDraggable(){
      if(debug){
        console.log('make_attachedDraggable()');
      }
      jQuerOs( ".attached-layout-block, .attached-module-block, .attached-child-entity-block  " ).draggable({
        helper: "clone",
        cursor: "move",
        cancel: null
      });
    }
  //end
    //sortable fn
    function make_sortable(){
      if(debug){
        console.log('make_sortable()');
      }
      //add sortable for row
      jQuerOs("#content-block").sortable({
        revert: true
      }).disableSelection();

      //sort content column
      jQuerOs(".drop-area").sortable({
        cancel: null, // Cancel the default events on the controls
        connectWith: ".drop-area",
        start: function( event, ui ) {
          jQuerOs(".drop-area").addClass("activeSortable");
          jQuerOs(this).find(".drop-item").addClass("current-sort");
          jQuerOs(this).find(".drop-item").width(165);
          var fid = jQuerOs(ui.item).find('.col_box.admin_aria_hidden').attr('fid');

          

          fParent = jQuerOs(this).find("i.f-parent[fid="+fid+"]").remove();

        },
        stop: function( event, ui ) {
          jQuerOs(".drop-area").removeClass("activeSortable");
          jQuerOs(this).find(".drop-item").removeClass("current-sort");
          jQuerOs(this).find(".drop-item").width("");
          jQuerOs(ui.item).after(fParent);

        }
      }).disableSelection();
    }
  //end
    //options for column and row
    function make_rows_options(){
      if(debug){
        console.log('make_rows_options()');
      }
      jQuerOs.each( jQuerOs("#content-block .row"), function(i, element){
        row_index = jQuerOs(this).data("row-number");
        //styling-row-form-row-15
      });
    }
  //end
    //make colorpicker
    function make_colorpicker(){
      if(debug){
        console.log('make_colorpicker()');
      }
      jQuerOs("#field_options .background-colorpicker, #field_options .border-colorpicker,#field_options .label-border-colorpicker,#field_options .label-background-colorpicker,#field_options .font-colorpicker,#field_options .label-font-colorpicker").minicolors({
        control: "hue",
        defaultValue: "",
        format:"rgb",
        opacity:true,
        position: "bottom right",
        hideSpeed: 100,
        inline: false,
        theme: "bootstrap",
        change: function(value, opacity) {
          jQuerOs(this).attr("value",value);
        }
      });
    }



    function make_resize_grid(){
      if(debug){
        console.log('make_resize_grid()');
      }

       var resizableEl = jQuerOs('.resizable').not(':nth-last-child(-n+3)');
       var columns = 12;

       var totalCol; // this is filled by start event handler
       var updateClass = function(el, col, nextWidth) {
         if(nextWidth) el.css('width', nextWidth); // remove width, our class already has it
          el.removeClass(function(index, className) {
            return (className.match(/(^|\s)col-\S+/g) || []).join(' ');
          }).addClass('col-lg-'+col+' col-md-'+col+' col-sm-'+col+' col-xs-'+col);
        };

        
      jQuerOs('.resizable').not(':nth-last-child(-n+3)').resizable({
        handles: 'e',
        start: function(event, ui) {
            
          var
            fullWidth = resizableEl.parent().width(),
            columnWidth = fullWidth / columns,
            target = ui.element,
            next = target.next(),
            targetCol = Math.round((target.outerWidth(true)) / columnWidth),
            nextCol = Math.round((next.outerWidth(true)) / columnWidth);
          // set totalColumns globally
          totalCol = targetCol + nextCol;
          startNext = next.width();
          
          
          target.resizable('option', 'minWidth', columnWidth / 2);
          target.resizable('option', 'maxWidth', ((totalCol - 1) * columnWidth));
        },
        stop: function(event, ui){
            
          var target = ui.element; //current element
          var next = target.next(); //next element
          next.css('width', '');
          target.css('width', '');

        },
        resize: function(event, ui) {
            
           var fullWidth = resizableEl.parent().width();
           var columnWidth = fullWidth / columns;

           var target = ui.element; //current element
           var next = target.next(); //next element

           var targetColumnCount = Math.round((target.outerWidth(true)) / columnWidth); //(column count) target.width / one col width = 600/100 = 6
           var nextColumnCount = Math.round((next.outerWidth(true)) / columnWidth); //(column count) next.width / one col width = 600/100 = 6
           var targetSet = totalCol - nextColumnCount;
           var nextSet = totalCol - targetColumnCount;

            // console.log('fullWidth - '+fullWidth);

            // console.log('columnWidth - '+columnWidth);

            // console.log('targetColumnCount - '+targetColumnCount);
            // console.log('nextColumnCount - '+nextColumnCount);
            // console.log('------------------------------------------');

            // console.log(jQuerOs('div.resizable-columns').width());
            // console.log(ui.element.width())

          var origSize = ui.originalSize.width;
          var curSize = ui.element.width();
          var diffSize = curSize - origSize;
          var nextWidth = startNext - diffSize;

            // next.width(next.width() - diffSize)
            // alert(columnWidth)

          // Just showing class names inside headings
          // target.find('.col-helper').text('col-' + targetSet);
          // next.find('.col-helper').text('col-' + nextSet);
          if(targetSet + nextSet > totalCol){
              nextSet = nextSet - 1;
          }

           updateClass(target, targetSet, false);
           updateClass(next, nextSet, nextWidth);
        },
      });

     // })

    }
    
    function changeChildFieldName(){
        if(debug){
            console.log('changeChildFieldName')
        }
        jQuerOs.each( jQuerOs("#content-block .entity-name"), function(i, element){
            var childEntityId = jQuerOs(element).attr('entityid');
            var fieldId = jQuerOs(element).attr('child_entity');
            var entityId = '<?php echo $layout->fk_eid ?>';
            var layout_type = '<?php echo $layout->type; ?>';
            var fieldMask = jQuerOs(element).attr('data-field-name');
            
            jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "getNameEntityFieldsAjax",
                entityId: childEntityId,
                fieldId: fieldId,
                entityId: entityId,
                layout_type: layout_type,
                fieldMask: fieldMask
            },
            success: function(data){ 
                if(data.html){
                    jQuerOs(element).html(data.html)
                }
            }

            });
            
        });
    }
    
    function addOptionForOrderByInParentChildLayout(key){
        if(debug){
          console.log('addOptionForOrderByInParentChildLayout('+key+')');
        }
        
        jQuerOs.post("index.php?option=com_os_cck&task=addOptionForOrderByInParentChildLayout&key="+key+"&lid="+jQuerOs("#lid").val()+"&format=raw",
          {},
          function (data) {
              jQuerOs('#options-field-user_order_by').remove();
              //jQuerOs("#ui-accordion-fields-options-accordion-panel-0").append(data.html);
              jQuerOs(".main-fields-options").append(data.html);

          } , 'json' );
        
    }
    
    function addFieldMaskForSqlWhereLayoutOptionByInParentChildLayout(key){
        if(debug){
          console.log('addFieldMaskForSqlWhereLayoutOptionByInParentChildLayout('+key+')');
        }
        
        jQuerOs.post("index.php?option=com_os_cck&task=addFieldMaskForSqlWhereLayoutOptionByInParentChildLayout&key="+key+"&lid="+jQuerOs("#lid").val()+"&format=raw",
          {},
          function (data) {
              jQuerOs('#field-sql-show-modal').remove();
              jQuerOs(".form-inner-html .container-fluid").append(data.html);

          } , 'json' );
        
    }
    
    function check_reqire_fields(task_name){
        if(debug){
          console.log('check_reqire_fields('+task_name+')');
        }
        var title = jQuerOs('#layout-title [name=title]').val();
        
        if(title == '' && task_name != 'cancel_layout'){
            empty_title();
            return false;
        }
        
        var export_to_calendar = jQuerOs('#editor-block [data-field-name=cck_cal_import]');
        if(export_to_calendar.length > 0){
            var export_title = jQuerOs('#fi_cck_cal_import_event_title').val();
            var export_date_start = jQuerOs('#fi_cck_cal_import_event_date_start').val();
            
            if(export_title == -1 || export_date_start == -1){
                alert('<?php echo JText::_("COM_OS_CCK_ALERT_EXPORT_TO_CALENDAR_FIELD_ERROR")?>');
                return false;
            }
        }
        
        return true;
    }

    function add_font_awesome_icon(elem){
        if(debug){
          console.log('add_font_awesome_icon()');
        }
        
        var icon_class = jQuerOs(elem).attr('icon_class');
        
        var classes = jQuerOs(elem).attr('class').split(' ');
        var class_for_add = '';
        for(var index=0; index<classes.length; ++index){
            if(classes[index].indexOf('fa-') > -1){
                class_for_add = classes[index];
            }
        }
        var elem_id = jQuerOs('#font-awesom-modal').attr('icon_field_name');
        var old_classes = jQuerOs('#'+elem_id).attr('class').split(' ');
        var class_for_remove = '';
        for(var index=0; index<old_classes.length; ++index){
            if(old_classes[index].indexOf('fa-') > -1){
                class_for_remove = old_classes[index];
            }
        }
        jQuerOs('#'+elem_id).removeClass(class_for_remove);
        jQuerOs('#'+elem_id).addClass(class_for_add);
        
        if(icon_class == ''){
            jQuerOs('#'+elem_id).html('&#10000;');
        }else{
            jQuerOs('#'+elem_id).html('');
        }
        
        if(jQuerOs('[name=fi_'+elem_id+']').length > 0){
            jQuerOs('[name=fi_'+elem_id+']').val(class_for_add);
        }else if(jQuerOs('[name=vi_'+elem_id+']').length > 0){
            jQuerOs('[name=vi_'+elem_id+']').val(class_for_add);
        }
        jQuerOs('.close').trigger('click');
        //console.log(jQuerOs(elem).parent());
    }


  //end
</script>
