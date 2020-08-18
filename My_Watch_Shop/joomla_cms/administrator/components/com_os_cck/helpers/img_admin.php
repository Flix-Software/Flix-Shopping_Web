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


function show_img_admin($field, $value, $multiple = 0, $layout_params)
{
    $moduleID = $field->fid;
    $html = '<div id="module-sliders_'.$field->field_name.'" >';
    $items = json_decode(base64_decode($value));
    $html .='<div id="file-area_'. $field->field_name .'">
        <noscript>
            <p>JavaScript disabled :(</p>
        </noscript>
    </div>';
    $html .= '<section id="wrapper_'. $field->field_name .'">
        <ul id="images_'. $field->field_name .'"></ul>
        <input id="json_query_'. $field->field_name .'" type="hidden" name="fi_'. $field->field_name .'" value="'. $value .'"
               type="text">
    </section>
    <input type="hidden" value="Clear all" class="clear_all_btn">';
// Remove temp files
    $items = json_decode(base64_decode($value));

    $html.= '<div id="dialog-form_'. $field->field_name .'" title="Image options" style="display:none;">
        <fieldset>
            <label for="name">Slide link</label>
            <input placeholder="'. JURI::root() .'" type="text" name="name_'. $field->field_name .'" id="name_'. $field->field_name .'"
                   class="text ui-widget-content ui-corner-all"/>
            <label for="description">Slide alt tag,name</label>
            <input type="text" name="description" id="description_'. $field->field_name .'" value=""
                   class="text ui-widget-content ui-corner-all"/>
            <input type="hidden" class="where" value="">
        </fieldset></div>';

    $html.='<script>
        (function ($) {

	    var field_name = "_'. $field->field_name .'";
            var uploader = new qq.FileUploader({
                element: document.getElementById("file-area"+field_name),
                action: \''. JURI::base() . '/index.php?option=com_os_cck&no_html=1&task=getContent&format=raw'.'\',
                params: {
                    id: \''. $moduleID .'\'
                },
                sizeLimit: 10 * 1024 * 1024,
                allowedExtensions: [\'jpg\', \'jpeg\', \'png\', \'gif\'
                ],
                debug: false,
                template: \'<div class="qq-uploader">\' +
                    \'<div class="qq-upload-drop-area"><p>drag and drop images here</p></div>\' +
                    \'<div class="qq-upload-button" '.$layout_params['field_styling'].'><p>drag and drop images here</p><span class="pseudo_button">Select images</span></div>\' +
                    \'<ul class="qq-upload-list"></ul>\' +
                    \'</div><div style="display:none;" id="my_popup"><p>Popup content</p></div>\',
                onComplete: function (id, filename, responseJSON) {
                    if (!responseJSON.success) {
                    }
                    else {
                        if ($("input#json_query"+field_name).val() != ""){

                            var $images = JSON.parse(Base64.decode($("input#json_query"+field_name).val()));
	    		}
                        if ($("input#json_query"+field_name).val() != "") {
                            $images.push({\'file\': responseJSON.file, \'alt\': \'\', \'name\': \'\'});
                            $("#json_query"+field_name).val(Base64.encode(JSON.stringify($images)));
                            refresh_data(append_button);
                        } else {
                            $images = new Array();
                            $images.push({\'file\': responseJSON.file, \'alt\': \'\', \'name\': \'\'});
                            $("#json_query"+field_name).val(Base64.encode(JSON.stringify($images)));
                            refresh_data(append_button);
                        }
                    }
                }
            });

            function refresh_data(func) {
                setTimeout(function () {
					if ($("input#json_query"+field_name).val() == "") return;
                    var image_set = JSON.parse(Base64.decode($("input#json_query"+field_name).val()));
                    var image_mass = new Array();
                    $.each(image_set, function (key, img) {
                        image_mass.push("<li><img src=\"'.  JURI::root().'images/com_os_cck'.$moduleID.'/thumbnail/'.'" + img.file + "\" alt=\"" + img.alt + "\"><a item=\"" + img.file + "\" class=\"rem_item"+field_name+"\"></a><a name=\"" + ((typeof img.name == "undefined") ? "" : img.name ) + "\" description=\"" + ((typeof img.alt == "undefined") ? "" : img.alt ) + "\" item=\"" + img.file + "\" class=\"edit_item"+field_name+" popup"+field_name+"\"></a></li>");
                    });
                    $("ul#images"+field_name).html(image_mass.join(""));
                    func();
                }, 1000);
            }

            $(document).ready(function () {
                refresh_data(append_button);
                $("#images"+field_name).sortable({
                    start: function (event, ui) {
                        ui.item.addClass(\'active\');
                    },
                    stop: function (event, ui) {
                        ui.item.removeClass(\'active\').effect("highlight", { color: \'#000\' }, 0, function () {
                            var mass = new Array();
                            $.each($(\'#images_'.$field->field_name.' li img\'), function (index, event) {
                                $(this).attr(\'ordering\', parseInt(index, 10));
                                var filename = $(this).attr("src").split(\'/\').pop();
                                mass.push({\'file\': filename, \'alt\': $(this).attr(\'alt\'), \'name\': $(this).parent().children("input").val() });
                            });
                            $("#json_query"+field_name).val(Base64.encode(JSON.stringify(mass)));
                            //  window.location.hash = Base64.encode(JSON.stringify(mass));
                        });
                    }
                });
            });
            //$("#images"+field_name).disableSelection();///is depracated
	    $("#images"+field_name).on(\'dblclick mousedown\', \'.prevent-select\', true) //disable text selection in images//maybe don\'t work//akosha

            function append_button() {
                $(".clear_all_btn").click(function () {
                    var $images = new Array();
                    $("#json_query"+field_name).val(Base64.encode(JSON.stringify($images)));
                    $("ul#images_'. $field->field_name .' li").fadeOut(1000, function () {
                        $(this).remove();
                    });
                });


                $(".rem_item"+field_name).click(function () {
                    var file = $(this).attr("item");
                    var images = JSON.parse(Base64.decode(jQuerOs("input#json_query"+field_name).val()));

                    //   console.log(images);
                    var $rem = $(this).parent();
                    if (images.length > 0) {
                        $.each(images, function (k, img) {

                            if (img.file == file) {
                                $($rem).fadeOut(400, function () {
                                    $(this).remove();
                                });

                                images.splice(k, 1);
                                return false; //stop each
                            }
                        });

                        //console.log(images);
                        $("#json_query"+field_name).val(Base64.encode(JSON.stringify(images)));
                    }
                });
                $("#dialog-form"+field_name).dialog({
                    autoOpen: false,
                    height: 285,
                    width: 560,
                    modal: true,
                    buttons: {
                        "Save": function () {
                            var where = $(this).find(".where").val();
                            var $image_set = JSON.parse(Base64.decode($("input#json_query"+field_name).val()));
                            var tmp_this = this;
                            $.each($image_set, function (k, item) {
                                if (item.file == where) {
                                    $image_set[k].name = $(tmp_this).find("#name"+field_name).val();
                                    $image_set[k].alt = $(tmp_this).find("#description"+field_name).val();
                                    return false;
                                }
                            });
                            $("a.edit_item_'. $field->field_name .'[item=\'" + $(this).find(".where").val() + "\']").attr(\'name\', $(this).find("#name"+field_name).val());
                            $("a.edit_item_'. $field->field_name .'[item=\'" + $(this).find(".where").val() + "\']").attr(\'description\', $(this).find("#description"+field_name).val());
                            $("input#json_query"+field_name).val(Base64.encode(JSON.stringify($image_set)));
                            $(this).find(".where").val();
                            $(this).dialog("close");
                            $(this).css("height", "1px");
                        }
                    },
                    close: function () {

                    }
                });
                $("a.popup"+field_name).click(function () {
                    $("div#dialog-form_'. $field->field_name .' input#name"+field_name).val($(this).attr(\'name\'));
                    $("div#dialog-form_'. $field->field_name .' input#description"+field_name).val($(this).attr(\'description\'));
                    $("div#dialog-form_'. $field->field_name .' input.where").val($(this).attr(\'item\'));
                    $("#dialog-form"+field_name).css("height", "100%");
                    $("#dialog-form"+field_name).dialog("open");

                });
            }
        })(jQuerOs);
    </script>
    </div>';
    return $html;
}
