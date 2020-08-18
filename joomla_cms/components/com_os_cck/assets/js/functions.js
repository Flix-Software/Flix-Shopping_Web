var price_num = 0;
var item_num = 0;
var offer_num = 0;
var cck;

cck = {
    gallery_main_img: function (val, fid) {
        var img_name = jQuerOs(val).parent().find("img").attr("src").split("/").pop();
        jQuerOs.post("index.php?option=com_os_cck&task=ajax_instance&id=" + jQuerOs("[name='id']").val() + "&format=raw", { img: img_name, do: "main", "f_id": fid});
        jQuerOs("[value='Main']").val("Set Main").removeAttr("disabled");
        jQuerOs(val).val("Main").attr("disabled", "disabled");
    },
    gallery_delete_img: function (val, fid) {
        var img_name = jQuerOs(val).parent().find("img").attr("src").split("/").pop();
        jQuerOs.post("index.php?option=com_os_cck&task=ajax_instance&id=" + jQuerOs("[name='id']").val() + "&format=raw", { img: img_name, do: "delete", 'f_id': fid});
        jQuerOs(val).parent().parent().fadeOut(500, function () {
            jQuerOs(this).remove();
        });
    }
};

function new_extra_field() {
    field_div = document.getElementById("select_items");
    button = document.getElementById("add_select_field");
    newitem = "<strong>" + ++item_num + ". </strong> Option name:\n" +
        "<input type='text' name='add_selectitem[" + item_num + "][0]' value='' size='15' maxsize='50'>\n" +
        "Option value: <input id='pp" + price_num + "' type='text' name='add_selectitem[" + item_num + "][1]' value='' size='15' maxsize='50'><br />";
    newnode = document.createElement("span");
    newnode.innerHTML = newitem;
    field_div.insertBefore(newnode, button);
}

var photos = 0;
function new_photos() {
    div = document.getElementById("items");
    button = document.getElementById("add");
    photos++;
    newitem = "<strong>" + "Photo " + photos + ": </strong>";
    newitem += "<input type=\"file\" name=\"new_photo_file[]";
    newitem += "\" value=\"\"size=\"45\"><br>";
    newnode = document.createElement("span");
    newnode.innerHTML = newitem;
    div.insertBefore(newnode, button);
}


function selectLayout(id, fk_eid, type, module_id){
    document.getElementById("selected_layout").value = id;
    
    if(module_id){
        if(document.getElementById("layout_type")){
            document.getElementById("layout_type").value = type;
        }
        if(type == 'instance' || type == 'category' || type == 'parent_child'){
            if(document.getElementById('jform_params_show_type')){
                document.getElementById('jform_params_show_type').parentNode.parentNode.style.display = 'none';
            }
            if(document.getElementById("instance")){
                document.getElementById("instance").parentNode.parentNode.style.display = '';
                document.getElementById("instance").value = '';
            }
            
            if(type == 'instance' || type == 'parent_child'){
                document.getElementById("changeLink").href =
                                "index.php?option=com_os_cck&task=show_instance_modal&layout_type="+type
                                +"&fk_eid="+fk_eid+"&module_id="+module_id+"&tmpl=component";
                document.getElementById("jform_params_instance-lbl").innerHTML = 'Select Instance';
                document.getElementById("changeLink").innerHTML = 'Select Instance';
            }else{
                document.getElementById("changeLink").href =
                                 "index.php?option=com_os_cck&task=show_categories_modal&layout_type="+type
                                 +"&fk_eid="+fk_eid+"&module_id="+module_id+"&tmpl=component";
                document.getElementById("changeLink").innerHTML = 'Select Category';
                if(document.getElementById("jform_params_instance-lbl")){
                    document.getElementById("jform_params_instance-lbl").innerHTML = 'Select Category';
                }
            }

        }else if(type == 'add_instance' || type == 'request_instance'){
            document.getElementById('jform_params_show_type').parentNode.parentNode.style.display = '';
            if(document.getElementById('instance')){
                document.getElementById('instance').parentNode.parentNode.style.display = 'none';
            }
        }else{
            if(document.getElementById('jform_params_show_type')){
                document.getElementById('jform_params_show_type').parentNode.parentNode.style.display = 'none';
            }
            if(document.getElementById('instance')){
                document.getElementById('instance').parentNode.parentNode.style.display = 'none';
                document.getElementById("instance").value = '';
            }
        }

        if(type == 'user'){
            document.getElementById('userModal_jform_params_user_choise_class').parentNode.parentNode.style.display = '';
            document.getElementById('jform_params_user_choise_class-lbl').parentNode.parentNode.style.display = '';
        }else{
            if(document.getElementById('userModal_jform_params_user_choise_class')){
                document.getElementById('userModal_jform_params_user_choise_class').parentNode.parentNode.style.display = 'none';
                document.getElementById('jform_params_user_choise_class-lbl').parentNode.parentNode.style.display = 'none';
            }
        }
        if(type == 'cart'){
            document.getElementById('jform_params_cart_type').parentNode.parentNode.style.display = '';
        }else{
            if(document.getElementById('jform_params_cart_type')){
                document.getElementById('jform_params_cart_type').parentNode.parentNode.style.display = 'none';
            }
        }



    }else{
        if(type == 'instance' || type == 'parent_child'){
            document.getElementById("instance").parentNode.parentNode.style.display = '';
            document.getElementById("instance").value = '';
            document.getElementById("instance").value = '';
            document.getElementById("changeLink").href = "index.php?option=com_os_cck&task=show_instance_modal&layout_type="+type+"&fk_eid="
                                                        +fk_eid+"&tmpl=component";
        }
        if(type == 'category'){
            document.getElementById("category").parentNode.parentNode.style.display = '';
            document.getElementById("category").value = '';
            document.getElementById("changeLink").href = "index.php?option=com_os_cck&task=show_categories_modal&layout_type="+type+"&fk_eid="
                                                        +fk_eid+"&tmpl=component";
        }
    }
    SqueezeBox.close();
}

function selectInstance(id){
    document.getElementById("instance").value = id;
    SqueezeBox.close();
}

function selectCategory(id, module_id){

    if(module_id){
        if(document.getElementById("instance")){
            document.getElementById("instance").value = id;
        }else{
            document.getElementById("category").value = id;
        }
    }else{
        document.getElementById("category").value = id;
    }
    SqueezeBox.close();
}


function MM_findObj(n, d){ //v4.01
    var p,i,x;
    if(!d) d=document;
    if((p=n.indexOf("?"))>0&&parent.frames.length){
        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
    }
    if(!(x=d[n])&&d.all) x=d.all[n];
    for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
    for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
    if(!x && d.getElementById) x=d.getElementById(n);
    return x;
}


function MM_swapImage(){ //v3.0
    var i,j=0,x,a=MM_swapImage.arguments;
    document.MM_sr=new Array;
    for(i=0;i<(a.length-2);i+=3)
    if ((x=MM_findObj(a[i]))!=null){
        document.MM_sr[j++]=x;
        if (!x.oSrc) x.oSrc=x.src;
        x.src=a[i+2];
    }
}


function MM_swapImgRestore(){ //v3.0
    var i,x,a=document.MM_sr;
    for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}


function MM_preloadImages(){ //v3.0
    var d=document;
    if(d.images){
        if(!d.MM_p) d.MM_p=new Array();
        var i,j=d.MM_p.length,a=MM_preloadImages.arguments;
        for(i=0; i<a.length; i++) if (a[i].indexOf("#")!=0){
            d.MM_p[j]=new Image;
            d.MM_p[j++].src=a[i];
        }
    }
}
if(window.jQuerOs){
    jQuerOs(document).ready(function() {
        //highlight 
        jQuerOs('table.filters select, table.filters input[name=search]').each(function(index, value){
            if(jQuerOs(value).val() != '-1' 
                && jQuerOs(value).val() != '0'
                && jQuerOs(value).val() != ''
                && jQuerOs(value).val() != ' ')
            {
                jQuerOs(value).css('border','2px solid #46a546');
            }
        })

    });
}

function addChildSelect(field_json = false,lid = false,value = false,path = false,fid = false, unique_parent_id){
    jQuerOs("select[id^=fi_text_select_list_"+fid+"], select[id^=os_cck_search_text_select_list_"+fid+"]").unbind('change');

    jQuerOs("select[id^=fi_text_select_list_"+fid+"], select[id^=os_cck_search_text_select_list_"+fid+"]").change(function(){

        var field = JSON.stringify(field_json);
        var selectObject = jQuerOs(this);
        var currentValue = jQuerOs(this).val();
        
        unique_parent_id = fid
        if(selectObject.closest('.drop-item').attr('data-parent') != undefined){
          unique_parent_id = selectObject.closest('.drop-item').attr('data-parent');
        }
        
        jQuerOs.ajax({
              type:"POST",
              url: path+"/index.php?option=com_os_cck&task=getChildSelect&format=raw",
              data:"field="+field+"&lid="+lid+"&value="+value+"&currentValue="+currentValue+"&unique_parent_id="+unique_parent_id,
              success:function(data){ 
              
              // if(data){

              //   var selectParams = jQuerOs(data).find('span.select-params').data('selectParams');
                
              //   selectObject.parent('span').find('~ span').remove()
              //   selectObject.closest('.col_box').append(data);
              //   selectObject.parent('span').find('~ span').css('opacity','0').animate({opacity:1},600);

              // }else{


              //   selectObject.parent('span').find('~ span').animate({opacity:0}, 600,function(){
              //     jQuerOs(this).remove();
              //   });

              // }

                if(data){
                    
                  var selectParams = jQuerOs(data).find('span.select-params').data('selectParams');
              
                  var html_start = '<div class="drop-item" data-parent="'+unique_parent_id+'" data-content=""><span class="f-inform-button"></span><!-- clear back/front title --><span class="field-name" data-field-name="'+selectParams.db_field_name+'" data-field-type="text_select_list" style="font-weight:normal;">'+selectParams.field_name+'</span><span class="col_box admin_aria_hidden">';
                  
                  var html_end = '</span><input class="f-params" name="fi_Params_'+selectParams.db_field_name+'" type="hidden" value="{}"></div>';

                  data = html_start+data+html_end;
                 
                  removeChildSelect(unique_parent_id, selectObject);
                  selectObject.closest('.drop-item').after(data);
                  selectObject.closest('.drop-item').find('~ .drop-item[data-parent='+unique_parent_id+']').css('display','none').show(400);

                }else{
                    removeChildSelect(unique_parent_id, selectObject);
                    
                    

                }
              
            }
        })
    })
}

function removeChildSelect(unique_parent_id, selectObject){

    selectObject.closest('.drop-item').find('~ .drop-item[data-parent='+unique_parent_id+']').hide(400,function(){
        jQuerOs(this).remove();
    });
}


function remove_class_for_hover_animate(element, hover_effect){
    setTimeout(function() {
        jQuerOs(element).removeClass('animated'); 
        jQuerOs(element).removeClass(hover_effect);
    }, 2000)
}

  
  function added_hover_animated_with_element(element, hover_effect){
        jQuerOs(element).css('display','block');
        var timer;
        jQuerOs(element).hover(
                
               function(){ 
                //jQuerOs(this).addClass('wow'); 
                jQuerOs(this).addClass('animated');
                jQuerOs(this).addClass(hover_effect); 
               },
               function(){ 
                   
                   //timer = setTimeout(function() {
                   //jQuerOs(this).removeClass('wow'); 
                   remove_class_for_hover_animate (element, hover_effect);
                       
                   //}, 5000);
                   //clearTimeout(timer);
               }
        );
    
}
if(window.jQuerOs){
    

    jQuerOs(document).ready(function() {

          jQuerOs(".field-name").removeAttr("title");
          jQuerOs('.table-responsive').html(function(i,h){ 
                return h.replace(/&nbsp;/g,'<span class="hide"></span>'); 
          });
            //jQuerOs('.table-responsive .cck_tableC td .hide').parent().hide();

    });
}
function calculated_price(eiid){
    
    
    var fields_calculate_price = jQuerOs('.calculated_price_value');
    
    for(var i=0; i<fields_calculate_price.length; ++i){
        var ordering_calculate_field = jQuerOs(fields_calculate_price[i]).attr('ordering_calculate');
        var price_fields = jQuerOs('.hidden-price');
        var json_price_fields = [];
        var quantity_fields = jQuerOs('.quantity_input');
        

        for(index = 0; index < price_fields.length; ++index){
            var fid = jQuerOs(price_fields[index]).attr('fid');

            var lid = jQuerOs(price_fields[index]).attr('lid');
            var calculated = jQuerOs(price_fields[index]).attr('calculated');
            json_price_fields[index] ={}
            json_price_fields[index]['fid'] = fid;
            json_price_fields[index]['lid'] = lid;
            json_price_fields[index]['calculated'] = calculated;
            if(quantity_fields.length > 0){
                var qf_index = 0
                while(qf_index < quantity_fields.length){
                    var qf_fid = jQuerOs(quantity_fields[qf_index]).attr('fid')
                    if(qf_fid == fid){
                        json_price_fields[index]['quantity'] = jQuerOs(quantity_fields[qf_index]).val();
                    }
                    qf_index++;
                }
            }
            json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
        }
        json_price_fields = JSON.stringify(json_price_fields);
        
        jQuerOs.ajax({
                dataType: "json",
                type: 'POST',
                url: 'index.php?option=com_os_cck&format=raw',
                data: {
                    task: "ajaxCalculatedPrice",
                    jsonPriceFields: json_price_fields,
                    eiid: eiid,
                    orderingCalculateField: ordering_calculate_field,
                    index: i
                },
                success: function(data){
                    if(data.success){
                        jQuerOs(fields_calculate_price[data.index]).text(data.print_value);
                    }
                }
            });
        
        
    }

}

function get_total_price(currency_position, currency){
      var prices = jQuerOs('.hidden_calculated_price');
      //var currency_position = '<?php echo $os_cck_configuration->get("currency_position", "0"); ?>';

      var total_price = 0;
      for(var i =0; i < prices.length; ++i){
          var price = jQuerOs(prices[i]).val();
          total_price = total_price + Number(price);
          total_price = Math.floor(total_price * 100) / 100;
      }
      //var total_price
      //var currency = '<?php echo getProductCurrency(); ?>'
      var new_total_price_html = '';
      if(currency_position == '0'){
          //jQuerOs('.total_price').html('<span class="new_total_price">' + total_price + ' ' + currency + '</span>');
          new_total_price_html = '<span class="new_total_price">' + total_price + ' ' + currency + '</span>';
      }else if(currency_position == '1'){
          new_total_price_html = '<span class="new_total_price">' + currency + ' ' + total_price + '</span>';
      }
      
      var old_total_price_html = '';
      var old_total_price = jQuerOs('.total_price').attr('old_total_price');

      //console.log('33333333333', jQuerOs('#os_cck_coupon') != undefined)
      
      if(old_total_price != undefined && old_total_price > total_price && jQuerOs('#os_cck_coupon') != undefined && jQuerOs('#os_cck_coupon').val() != ''){
          if(currency_position == '0'){
              //jQuerOs('.total_price').html('<span class="new_total_price">' + total_price + ' ' + currency + '</span>');
              old_total_price_html = '<span class="old_total_price">' + old_total_price + ' ' + currency + '</span>';
          }else if(currency_position == '1'){
              old_total_price_html = '<span class="old_total_price">' + currency + ' ' + old_total_price + '</span>';
          }
      }
      //console.log('111111111111', jQuerOs('#os_cck_coupon').val())
      //if(jQuerOs('#os_cck_coupon').val() != ''){
        jQuerOs('.total_price').html(old_total_price_html + ' ' + new_total_price_html);
      //}
      jQuerOs('.total_price').attr('old_total_price', total_price);
      

}


function checkRequireFields(required_fields){
    jQuerOs(required_fields).each(function(index, el) {
        
      if(jQuerOs(el).attr("name") == "new_audio"){
      var audio_src = jQuerOs(el).parent().parent().parent().find('.audio_src').val()
      
        audio = false;
        jQuerOs("[id*='new_upload_audio']").each(function(index, input) {
          if(jQuerOs(input).val()){
            audio = true;
          }
        });
        if(audio_src != ''&& audio_src != 0 && audio_src != undefined){
            audio = true;
        }
        if(!audio){
          //alert("<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_EDIT_REQUIRED_AUDIO');?>");
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }else if(jQuerOs(el).attr("name") == "new_video"){
        var video_src = jQuerOs(el).parent().parent().parent().find("[name*='video']").val();
        var youtube_src = jQuerOs(el).parent().parent().parent().find("[name*='youtube_code']").val();
        video = false;
        jQuerOs("[id*='new_upload_video']").each(function(index, input) {
          if(jQuerOs(input).val()){
              
            video = true;
          }
        });
        if((video_src != 0 && video_src != '' && video_src != undefined && video_src != 'Add video source file') 
                || (youtube_src != 0 && youtube_src != '' && youtube_src != undefined)){

            video = true;
        }
        if(!video){
          //alert("<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_EDIT_REQUIRED_VIDEO');?>");
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }//else if(jQuerOs(".rev_rating").length){
      else if(jQuerOs(el).parent(".rev_rating").length){
      
        if(!jQuerOs("[name*='fi_rating_field_']").val()){
          //alert("<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_EDIT_REQUIRED');?>");
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }else if(jQuerOs(el).parent().find("[name*='text_radio_buttons']").length){
      
        if(!jQuerOs(el).parents(".controls").find("[name*='text_radio_buttons']:checked").length){
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).parent().css("borderColor", "#FF0000");
          jQuerOs(el).parent().css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }else if(jQuerOs(el).parent().find("[name*='single_checkbox_onoff']").length){
      
        if(jQuerOs(el).prop('checked') == false){
          window.scrollTo(0,findPosY(el)-100);
          //alert("<?php echo JText::_('COM_OS_CCK_ADMIN_INFOTEXT_JS_EDIT_REQUIRED');?>");
          ret = true;
          return false;
        }
      }else if(jQuerOs(el).parent().find("[name*='fi_text_url_']").length){
      
        if(!jQuerOs(el).val() || jQuerOs(el).val() == 'http://'){
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }else if(jQuerOs(el).parent("[id*='galleryfield_']").length){
      var img_value = jQuerOs(el).parent().parent().parent().find("[id*='wrapper_'] input").val();
        if(img_value == '' || img_value == '[]'){
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }else if(jQuerOs(el).attr('name').indexOf('imagefield') > -1
          || jQuerOs(el).attr('name').indexOf('filefield') > -1){
      
        if(!jQuerOs(el).val() && jQuerOs(el).attr('value') == ''){
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }else{
      
        if(!jQuerOs(el).val() || jQuerOs(el).val() == 0){
          window.scrollTo(0,findPosY(el)-100);
          jQuerOs(el).css("borderColor", "#FF0000");
          jQuerOs(el).css("color", "#FF0000");
          jQuerOs(el).addClass("os_cck_reqired_error");
          ret = true;
          return false;
        }else{
          jQuerOs(el).css("borderColor",'');
          jQuerOs(el).css("color",'');
          jQuerOs(el).removeClass("os_cck_reqired_error");
        }
      }
    });

}

function getBuyRentRequestCalculatedPrice(type){
        
    var ordering_calculate_field = 51;
    var price_fields = jQuerOs('.hidden-price');
    var json_price_fields = [];
    var quantity_fields = jQuerOs('.quantity_input');
    var coupon = jQuerOs('#os_cck_coupon').attr('coup_id');
    var eiid = jQuerOs('[name=fk_eiid]').val();
    var eid = jQuerOs('[name=eid]').val();
    var lid = jQuerOs('[name=lay_type]').val();
//console.log('66666666666666666666', price_fields)
    for(var index = 0; index < price_fields.length; ++index){
        var fid = jQuerOs(price_fields[index]).attr('fid');

        var lid = jQuerOs(price_fields[index]).attr('lid');
        var calculated = jQuerOs(price_fields[index]).attr('calculated');
        json_price_fields[index] ={}
        json_price_fields[index]['fid'] = fid;
        json_price_fields[index]['lid'] = lid;
        json_price_fields[index]['calculated'] = calculated;
        if(quantity_fields.length > 0){
            var qf_index = 0
            while(qf_index < quantity_fields.length){
                var qf_fid = jQuerOs(quantity_fields[qf_index]).attr('fid')
                if(qf_fid == fid){
                    json_price_fields[index]['quantity'] = jQuerOs(quantity_fields[qf_index]).val();
                }
                qf_index++;
            }
        }
        json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
    }

    json_price_fields = JSON.stringify(json_price_fields);
    
    if(price_fields.length == 0){
        if(jQuerOs('[name=price_fields]') != undefined && jQuerOs('[name=price_fields]').val() != ''){
            json_price_fields=JSON.parse(jQuerOs('[name=price_fields]').val());
        }
        json_price_fields=JSON.stringify(json_price_fields[0][eiid])
        
    }
    if(type == 'rent_request_instance'){
        var task = 'ajax_rent_calcualete'
    }else{
        var task = 'ajaxCalculatedPrice'
    }
    
    var rent_from = jQuerOs("[name=rent_from]").val();
    var rent_until = jQuerOs("[name=rent_until]").val();
    var time_from = jQuerOs("[name=time_from]").val();
    var time_until = jQuerOs("[name=time_until]").val();
    jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: task,
                jsonPriceFields: json_price_fields,
                eiid: eiid,
                ceid: eid,
                rent_from: rent_from + ' ' + time_from,
                rent_until: rent_until + ' ' + time_until,
                current_lid: lid,
                orderingCalculateField: ordering_calculate_field,
                coupon: coupon,
            },
            success: function(data){
                //console.log('11111111111111', data.calculated_currency[0])
                if(data.success){
                    var old_price = jQuerOs('#buy_requesr_calculated_price').attr('old_price');
                    
                    if(old_price != data.print_value){
                        if(jQuerOs('#os_cck_coupon').val() != '' && old_price != undefined && old_price != ''){
                            jQuerOs('#buy_requesr_calculated_price').html('<span class="old_total_price">'+old_price+'</span> <span class="new_total_price">'+data.print_value+'</span>');
                        }else{
                            jQuerOs('#buy_requesr_calculated_price').text(data.print_value);
                        }
                    }
                    jQuerOs('#buy_requesr_calculated_price').attr('old_price', data.print_value);
                }else{
                    jQuerOs('#buy_requesr_calculated_price').text(data.calculated_currency[0]);
                }
            }
        });

}

function CckAddToCart(eiid, onclick_event, onclick_event_value, elem, path_to_site){
    var this_instance =  jQuerOs(elem).parents('.instance_body');
    var price_fields = jQuerOs(this_instance).find('.hidden-price');
    
    var json_price_fields = [];
    var quantity_fields = jQuerOs('.quantity_input');
    for(index = 0; index < price_fields.length; ++index){
        if(jQuerOs(price_fields[index]).attr('eiid') == eiid){
            var fid = jQuerOs(price_fields[index]).attr('fid');
            var lid = jQuerOs(price_fields[index]).attr('lid');
            var calculated = jQuerOs(price_fields[index]).attr('calculated');
            if (calculated == 1){
                json_price_fields[index] ={}
                json_price_fields[index]['fid'] = fid;
                json_price_fields[index]['lid'] = lid;
                json_price_fields[index]['calculated'] = calculated;
                if(quantity_fields.length > 0){
                    var qf_index = 0
                    while(qf_index < quantity_fields.length){
                        var qf_fid = jQuerOs(quantity_fields[qf_index]).attr('fid')
                        if(qf_fid == fid){
                            json_price_fields[index]['quantity'] = jQuerOs(quantity_fields[qf_index]).val();
                        }
                        qf_index++;
                    }
                }else if(index == 0){
                    json_price_fields[index]['quantity'] = 1;
                }
                json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
            }
        }
    }
    json_price_fields = JSON.stringify(json_price_fields);
    
    jQuerOs.ajax({
        dataType: "json",
        type: 'POST',
        url: 'index.php?option=com_os_cck&format=raw',
        data: {
            task: 'addInstanceToCart',
            eiid: eiid,
            price_fields: json_price_fields,
        },
        success: function(data){
            
            
            if(onclick_event == 0){
                
            }else{
                location=onclick_event_value;
            }
            var small_carts = jQuerOs('.small_cart');
            
            for(var index=0; index < small_carts.length; ++index){
                
                
                
                //var change_effect = jQuerOs(small_carts[index]).attr('change_effect');
                var html = '<div>'+data.cart_count+'</div>';
                jQuerOs(small_carts[index]).find('.small_cart_count').html(html);
                
                
                if(cart_count == 0 && data.cart_count > 0){
                    var text_full_cart = jQuerOs(small_carts[index]).attr('full_text');
                    var img_full_cart = jQuerOs(small_carts[index]).attr('img_full');
                    
                    if(img_full_cart.indexOf('img') == 0 && img_full_cart.length > 4){
                        var img_full_cart_value = '<img src="'+path_to_site+'images/stories/'+img_full_cart.substr(img_full_cart.indexOf(' ')+1)+'">';
                    }else if(img_full_cart.indexOf('icon') == 0 && img_full_cart.length > 5){
                        var img_full_cart_value = '<div class="fa '+img_full_cart.substr(img_full_cart.indexOf(' ')+1)+'"></div>'
                    }else{
                        var img_full_cart_value = '<div class="fa fa-shopping-bag"></div>'
                    }
                    
                    jQuerOs(small_carts[index]).find('.text_cart').html(text_full_cart);
                    jQuerOs(small_carts[index]).find('.small_cart_img').html(img_full_cart_value);
                }
                
                jQuerOs(small_carts[index]).addClass('addItem');
                //jQuerOs(small_carts[index]).find('a').addClass('animated');
                setTimeout(removeAnimateClass,1000,jQuerOs(small_carts[index])); 
            }
            
            jQuerOs('.small_cart_img').addClass('cart_fixed');
            setTimeout(removeFixesClass,1000); 
            
            cart_count = data.cart_count;
            
        },
        error: function(){
            alert('Error!!!')
        }
    })
    
    
}

function removeAnimateClass(element){
    //jQuerOs(element).removeClass('animated');
    jQuerOs(element).removeClass('addItem');
}

function removeFixesClass(){
    jQuerOs('.small_cart_img').removeClass('cart_fixed');
}

function loadInstance(){
    //jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row, .delete-layout").remove();
    jQuerOs(".delete-field, .delete-row, .delete-layout").remove();

  
    jQuerOs("div[class *='cck-row-'], div[id *='cck_col-']").each(function(index, el) {
      jQuerOs(el).attr("style",jQuerOs(el).data("block-styling"));
    });
    jQuerOs("div[class *='cck-row-']").addClass('row');
    ////jQuerOs("span.cck-help-string").remove()

    jQuerOs(function () {
      jQuerOs('[data-toggle="tooltip"]').tooltip()
    })

    var delete_empty_child_entity = jQuerOs('.delete_empty_child_entity');
    if(delete_empty_child_entity.length > 0){
        for(index = 0; index < delete_empty_child_entity.length; ++index){
            jQuerOs(delete_empty_child_entity[index]).parent().parent().remove();
        }
    }
}

function changeRadioPrice(name, rand, show_quantity, fid, eiid, lid){
    var select_value = jQuerOs('[name=fi_'+name+rand+']:checked').val();
    
    jQuerOs.ajax({
        dataType: "json",
        type: 'POST',
        url: 'index.php?option=com_os_cck&format=raw',
        data: {
            task: "ajaxCalculatedCurrency",
            selectValue: select_value,
            fid: fid,
            eiid: eiid,
            lid: lid
        },
        success: function(data){
            if(data.success){
                jQuerOs('#'+name+'_price_value').text(data.print_value);

                if(show_quantity == 'on'){
                    jQuerOs('#'+name+'_quantity_value').text(data.quantity);
                }
                jQuerOs('[name=fi_'+name+'_hidden]').val(select_value);
                calculated_price(eiid);
                getBuyRentRequestCalculatedPrice();
            }
        }
    });
}

function changeSelectPrice(name, rand, show_quantity, fid, eiid, lid){
    var select_value = jQuerOs('#fi_'+name).val();
    jQuerOs.ajax({
        dataType: "json",
        type: 'POST',
        url: 'index.php?option=com_os_cck&format=raw',
        data: {
            task: "ajaxCalculatedCurrency",
            selectValue: select_value,
            fid: fid,
            eiid: eiid,
            lid: lid
        },
        success: function(data){
            if(data.success){
                jQuerOs('#'+name+'_price_value').text(data.print_value);

                if(show_quantity == 'on'){
                    jQuerOs('#'+name+'_quantity_value').text(data.quantity);
                }
                jQuerOs('[name=fi_'+name+'_hidden]').val(select_value);
                calculated_price(eiid);
                getBuyRentRequestCalculatedPrice();
            }
        }
    });
}

function loadGalleryfield(name, rand, slider_height, object_fit, number_of_plugin){
    jQuerOs(window).on('load',function($){
        var width = jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container').width();
          
        jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container .swiper-slide img').height(width*slider_height);
        jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container .swiper-slide img').css('object-fit',object_fit);
    })
      

    jQuerOs('.shadetabs li a[rel=country_cck'+number_of_plugin+']').on('click', function(){
        jQuerOs('#country_cck'+number_of_plugin).show();
        var width = jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container').width();
          
        jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container .swiper-slide img').height(width*slider_height);
    })
    jQuerOs(window).resize(function(){
        var width = jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container').width();
        jQuerOs('#cck-slider-container-'+name+'-'+rand+' .swiper-container .swiper-slide img').height(width*slider_height);
    })
}

function checkUploadedFiles(form, post_max_size, upl_max_fsize, file_upl, error_upload_off, error_post_max_size, error_upl_max_size, js_track_kind, js_track_lang, js_track_title){
    
    var total_file_size = 0;
    
    for (i = 1;document.getElementById('new_upload_video'+i); i++){
        if(document.getElementById('new_upload_video'+i).files.length){
          total_file_size += document.getElementById('new_upload_video'+i).files[0].size;
          if(document.getElementById('new_upload_video'+i).value != ''){
            if(!file_upl){
              window.scrollTo(0,findPosY(document.getElementById('new_upload_video'+i))-100);
              document.getElementById('error_video').innerHTML = error_upload_off;
              document.getElementById('new_upload_video'+i).style.borderColor = "#FF0000";
              document.getElementById('new_upload_video'+i).style.color = "#FF0000";
              document.getElementById('error_video').style.color = "#FF0000";
              
              return;
            }
            if(document.getElementById('new_upload_video'+i).files[0].size >= post_max_size){
              window.scrollTo(0,findPosY(document.getElementById('new_upload_video'+i))-100);
              document.getElementById('error_video').innerHTML = error_post_max_size;
              document.getElementById('new_upload_video'+i).style.borderColor = "#FF0000";
              document.getElementById('new_upload_video'+i).style.color = "#FF0000";
              document.getElementById('error_video').style.color = "#FF0000";
              return;
            }
            if(document.getElementById('new_upload_video'+i).files[0].size >= upl_max_fsize){
              window.scrollTo(0,findPosY(document.getElementById('new_upload_video'+i))-100);
              document.getElementById('error_video').innerHTML = error_upl_max_size;
              document.getElementById('new_upload_video'+i).style.borderColor = "#FF0000";
              document.getElementById('new_upload_video'+i).style.color = "#FF0000";
              document.getElementById('error_video').style.color = "#FF0000";
              return;
            }
          }
        }
      }

      for (i = 1;document.getElementById('new_upload_audio'+i); i++){
        if(document.getElementById('new_upload_audio'+i).files.length){
          if(document.getElementById('new_upload_audio'+i).value != ''){
            total_file_size += document.getElementById('new_upload_audio'+i).files[0].size;
            if(!file_upl){
              window.scrollTo(0,findPosY(document.getElementById('new_upload_audio'+i))-100);
              document.getElementById('error_video').innerHTML = error_upload_off;
              document.getElementById('new_upload_audio'+i).style.borderColor = "#FF0000";
              document.getElementById('new_upload_audio'+i).style.color = "#FF0000";
              document.getElementById('error_audio').style.color = "#FF0000";
              return;
            }
            if(document.getElementById('new_upload_audio'+i).files[0].size >= post_max_size){
              window.scrollTo(0,findPosY(document.getElementById('new_upload_audio'+i))-100);
              document.getElementById('error_video').innerHTML = error_post_max_size;
              document.getElementById('new_upload_audio'+i).style.borderColor = "#FF0000";
              document.getElementById('new_upload_audio'+i).style.color = "#FF0000";
              document.getElementById('error_audio').style.color = "#FF0000";
              return;
            }
            if(document.getElementById('new_upload_audio'+i).files[0].size >= upl_max_fsize){
              window.scrollTo(0,findPosY(document.getElementById('new_upload_audio'+i))-100);
              document.getElementById('error_video').innerHTML = error_upl_max_size;
              document.getElementById('new_upload_audio'+i).style.borderColor = "#FF0000";
              document.getElementById('new_upload_audio'+i).style.color = "#FF0000";
              document.getElementById('error_audio').style.color = "#FF0000";
              return;
            }
          }
        }
      }

      if(total_file_size >= post_max_size){
        if(document.getElementById('error_video')){
          window.scrollTo(0,findPosY(document.getElementById('error_video'))-100);
          document.getElementById('error_video').innerHTML = error_post_max_size;
          document.getElementById('error_video').style.borderColor = "#FF0000";
          document.getElementById('error_video').style.color = "#FF0000";
          document.getElementById('error_video').style.color = "#FF0000";
          return;
        }
        if(document.getElementById('error_audio')){
          window.scrollTo(0,findPosY(document.getElementById('error_audio'))-100);
          document.getElementById('error_audio').innerHTML = error_post_max_size;
          document.getElementById('error_audio').style.borderColor = "#FF0000";
          document.getElementById('error_audio').style.color = "#FF0000";
          document.getElementById('error_audio').style.color = "#FF0000";
          return;
        }
      }

      if(form.new_upload_track_url1){
        for (i = 1;document.getElementById('new_upload_track_url'+i); i++) {
          if(document.getElementById('new_upload_track'+i).value != ''
            || document.getElementById('new_upload_track_url'+i).value != ''){
              if(document.getElementById('new_upload_track_kind'+i).value == ''){
                window.scrollTo(0,findPosY(document.getElementById('new_upload_track_kind'+i))-100);
                document.getElementById('new_upload_track_kind'+i).placeholder = js_track_kind;
                document.getElementById('new_upload_track_kind'+i).style.borderColor = "#FF0000";
                document.getElementById('new_upload_track_kind'+i).style.color = "#FF0000";
                return;
              }else if(document.getElementById('new_upload_track_scrlang'+i).value == ''){
                window.scrollTo(0,findPosY(document.getElementById('new_upload_track_scrlang'+i))-100);
                document.getElementById('new_upload_track_scrlang'+i).placeholder = js_track_lang;
                document.getElementById('new_upload_track_scrlang'+i).style.borderColor = "#FF0000";
                document.getElementById('new_upload_track_scrlang'+i).style.color = "#FF0000";
                return;
              }else if(document.getElementById('new_upload_track_label'+i).value == ''){
                window.scrollTo(0,findPosY(document.getElementById('new_upload_track_label'+i))-100);
                document.getElementById('new_upload_track_label'+i).placeholder = js_track_title;
                document.getElementById('new_upload_track_label'+i).style.borderColor = "#FF0000";
                document.getElementById('new_upload_track_label'+i).style.color = "#FF0000";
                return;
              }
            }
          }
        }
}

function loadAddLayout(){
     jQuerOs("div[class *='cck-row-'], div[id *='cck_col-']").each(function(index, el) {
      jQuerOs(el).attr("style",jQuerOs(el).data("block-styling"))
    });
     jQuerOs("div[class *='cck-row-']").addClass('row');
}

function button_hidden(is_hide,moduleId) {
  var moduleSuffix = '';
  if (moduleId){
    moduleSuffix = '_cckmod_'+moduleId;
  }
  if (moduleId) {
    var el = document.getElementById('button_hidden_review'+moduleSuffix);
    var el2 = document.getElementById('hidden_review'+moduleSuffix);
  }else{
    var el = document.getElementById('button_hidden_review');
    var el2 = document.getElementById('hidden_review');
  }
  if (is_hide) {
    el.style.display = 'none';
    el2.style.display = 'block';
  } else {
    el.style.display = 'block';
    el2.style.display = 'none';
  }
}

function findPosY(obj) {
  var curtop = 0;
  if (obj.offsetParent) {
    while (1) {
      curtop+=obj.offsetTop;
      if (!obj.offsetParent) {
        break;
      }
      obj=obj.offsetParent;
    }
  } else if (obj.y) {
    curtop+=obj.y;
  }
  return curtop-20;
}

function checkStepNumberFields(){
    if(jQuerOs("input[name*='fi_decimal_textfield_']:not(.hidden-price)").length){
      jQuerOs("input[name*='fi_decimal_textfield_']:not(.hidden-price)").each(function(index, el) {
        if(jQuerOs(this).val()){
          step = jQuerOs(this).attr("step");
          if(step.indexOf(".") >= 0){
            point = step.length - 1 - step.indexOf(".");
            numb = step.length-1-point;
          }else{
            numb = jQuerOs(this).attr("max");
            point = 0;
          }

          if(step.indexOf(".") >= 0){
            vallen = jQuerOs(this).val().length;
            if(numb < vallen-1-jQuerOs(this).val().indexOf(".")){
              window.scrollTo(0,findPosY(el)-100);
              jQuerOs(el).css("borderColor", "#FF0000");
              jQuerOs(el).css("color", "#FF0000");
              alert("Format: "+step);
              ret = true;
              return false;
            }
            if(point < vallen - 1 - jQuerOs(this).val().indexOf(".")){
              window.scrollTo(0,findPosY(el)-100);
              jQuerOs(el).css("borderColor", "#FF0000");
              jQuerOs(el).css("color", "#FF0000");
              alert("Format: "+step);
              ret = true;
              return false;
            }
          }else{
            if(numb < parseInt(jQuerOs(this).val())){
              window.scrollTo(0,findPosY(el)-100);
              jQuerOs(el).css("borderColor", "#FF0000");
              jQuerOs(el).css("color", "#FF0000");
              alert("Max: "+numb);
              ret = true;
              return false;
            }
          }
        }
      });
    }
}

function check_reg_expr(){
    var error = false;
    //check for regular exp // set array of field=>exp in fields above(checkExpr)
    jQuerOs(checkExpr).each(function(index, el) {
      if(typeof el == "object"){
        regEx = eval(decodeURI(el[1]));
        if(regEx){
          str = jQuerOs("[name='fi_"+el[0]+"']").val();
          if(!regEx.test(str)){
            if(el[2]){
              errorText = el[2];
            }else{
              errorText = '';
            }
            window.scrollTo(0,findPosY(jQuerOs("[name='fi_"+el[0]+"']"))-100);
            jQuerOs("[name='fi_"+el[0]+"']").attr("placeholder", errorText);
            jQuerOs("[name='fi_"+el[0]+"']").css("borderColor", "#FF0000");
            jQuerOs("[name='fi_"+el[0]+"']").css("color","#FF0000");
            error = true;
          };
        }
      }
    });
    if(error){return;}
}