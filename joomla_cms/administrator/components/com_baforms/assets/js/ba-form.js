/**
* @package   BaForms
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

if (typeof(Calendar) !== 'undefined') {
    Calendar._DN = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday",
                    "Saturday","Sunday"];
    Calendar._SDN = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
    Calendar._FD = 0;
    Calendar._MN = ["January","February","March","April","May","June","July",
                    "August","September","October","November","December"];
    Calendar._SMN = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep",
                     "Oct","Nov","Dec"];
    var about = "DHTML Date\/Time Selector\n(c) dynarch.com 2002-2005 \/ ";
    about += "Author: Mihai Bazon\nFor latest version visit: ";
    about += "http:\/\/www.dynarch.com\/projects\/calendar\/\nDistributed under GNU LGPL.  ";
    about += "See http:\/\/gnu.org\/licenses\/lgpl.html for details.\n\nDate ";
    about += "selection:\n- Use the \u00ab and \u00bb buttons to select year\n- ";
    about += "Use the < and > buttons to select month\n- Hold mouse ";
    about += "button on any of the buttons above for faster selection.";
    var aboutTime = "\n\nTime selection:\n- Click on any of the time parts to increase ";
    aboutTime += "it\n- or Shift-click to decrease it\n- or click and drag for faster selection.";
    Calendar._TT = {"INFO":"About the Calendar",
                    "ABOUT":about,
                    "ABOUT_TIME":aboutTime,
                    "PREV_YEAR":"Click to move to the previous year. Click and hold for a list of years.",
                    "PREV_MONTH":"Click to move to the previous month. Click and hold for a list of the months.",
                    "GO_TODAY":"Go to today",
                    "NEXT_MONTH":"Click to move to the next month. Click and hold for a list of the months.",
                    "SEL_DATE":"Select a date.","DRAG_TO_MOVE":"Drag to move",
                    "PART_TODAY":" Today ",
                    "DAY_FIRST":"Display %s first",
                    "WEEKEND":"0,6","CLOSE":"Close","TODAY":"Today","TIME_PART":"(Shift-)Click or Drag to change the value.",
                    "DEF_DATE_FORMAT":"%Y-%m-%d","TT_DATE_FORMAT":"%a, %b %e","WK":"wk","TIME":"Time:"};
}

var ba_jQuery = jQuery;

ba_jQuery(document).ready(function(){
    ba_jQuery('.com-baforms').each(function(){
        var dialogColor = ba_jQuery(this).find('.message-modal .dialog-color').val();
        var messageModal = ba_jQuery(this).find('.message-modal');
        ba_jQuery('.modal-scrollable').hide();
        ba_jQuery('body .modal-scrollable').css('background-color', dialogColor);

        ba_jQuery('.tool.ba-date').each(function(){
            var text = ba_jQuery(this).find('input[type="text"]').attr('id');
            var img = ba_jQuery(this).find('button[type="button"]').attr('id');
            Calendar.setup({
                // Id of the input field
                inputField: text,
                // Format of the input field
                ifFormat: "%d %B %Y",
                // Trigger for the calendar (button ID)
                button: img,
                // Alignment (defaults to "Bl")
                align: "Tl",
                singleClick: true,
                firstDay: 0
                });
        });
        /*
            add ba_jQuery UI toltip to the elements
        */
        ba_jQuery('.tool').each(function(){
            ba_jQuery(this).find('span').each(function(){
                ba_jQuery(this).tooltip();
            });
        });
        
        if (ba_jQuery('.com-baforms .ba-form:last-child a').attr('href') != 'http://www.balbooa.com/joomla-forms') {
            var copyright = 'Your page is blank because you have removed copyrights.<br><br>';
            copyright += 'You have 2 ways to solve this issue:<br>';
            copyright += '1. Back copyrights, if you don\'t know how, install free version above,';
            copyright += ' don\'t worry, you will not lose your data.<br>';
            copyright += '2. Buy PRO version of the component.<br><br>';
            copyright += 'Have a nice day!';
            ba_jQuery('body').html(copyright);
            return false;
        }

        ba_jQuery('.ba-textInput input').on('keyup', function(){
            var type = ba_jQuery(this).attr('data-type');
            var value = ba_jQuery(this).val();
            if (type == 'number') {
                if (ba_jQuery.isNumeric(value)) {
                    ba_jQuery(this).removeClass('ba-alert');
                } else {
                    ba_jQuery(this).addClass('ba-alert');
                }
            }
        });

        /*
            event on click of the page break Next button, check the required
            items and show next page, hide previous
        */
        ba_jQuery('.ba-form .btn-next').on('click', function() {
            setTimeout(refreshMap, 100)
            var parent = ba_jQuery(this).parent().parent();
            var id = parent.attr('class');
            var n = id.substr(5);
            var flag = true;
            parent.find('.tool').each(function() {
                ba_jQuery(this).find('input[type="text"]').each(function(){
                    var required = ba_jQuery(this).prop('required');
                    if (required) {
                        var value = ba_jQuery(this).val()
                        if(ba_jQuery.trim(value) == '') {
                            ba_jQuery(this).addClass('ba-alert');
                            flag = false;
                        } else {
                            ba_jQuery(this).removeClass('ba-alert');
                        }
                    }
                });

                ba_jQuery(this).find('input[type="email"]').each(function(){
                    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
                    var value = ba_jQuery(this).val()
                    if(!reg.test(value)) {
                        ba_jQuery(this).addClass('ba-alert');
                        flag = false;
                    } else {
                        ba_jQuery(this).removeClass('ba-alert');
                    }
                });

                ba_jQuery('.ba-textInput input').each(function(){
                    if (ba_jQuery(this).hasClass('ba-alert')) {
                        flag = false;
                        return false;
                    }
                });

                ba_jQuery(this).find('input[type="radio"]').each(function() {
                    var required = ba_jQuery(this).prop('required');
                    if (required) {
                        var name = ba_jQuery(this).attr('name');
                        var preFlag = "";
                        parent.find('.tool').find('[name="'+name+'"]').each(function(){
                            if (ba_jQuery(this).prop('checked')) {
                                ba_jQuery(this).parent().parent().removeClass('ba-alert');
                                preFlag = true;
                                return false;
                            } else {
                                ba_jQuery(this).parent().parent().addClass('ba-alert');
                                preFlag = false;
                            }
                        });
                        if (flag && !preFlag) {
                            flag = false;
                        }
                    }
                });

                ba_jQuery(this).find('select[required]').each(function (){
                    var value = ba_jQuery(this).val();
                    if (ba_jQuery.trim(value) != '' && ba_jQuery.trim(value) != 'null') {
                        ba_jQuery(this).removeClass('ba-alert');
                    } else {
                        ba_jQuery(this).addClass('ba-alert');
                        flag = false;
                    }
                });

                ba_jQuery(this).find('textarea').each(function(){
                    var required = ba_jQuery(this).prop('required');
                    if (required) {
                        var value = ba_jQuery(this).val()
                        if(ba_jQuery.trim(value) == '') {
                            ba_jQuery(this).addClass('ba-alert');
                            flag = false;
                        } else {
                            ba_jQuery(this).removeClass('ba-alert')
                        }
                    }
                });

                ba_jQuery(this).find('.required').each(function(){
                    var preFlag = "";
                    ba_jQuery(this).find('input[type="checkbox"]').each(function(){
                        if (ba_jQuery(this).prop('checked')) {
                            ba_jQuery(this).parent().parent().parent().removeClass('ba-alert');
                            preFlag = true;
                            return false;
                        } else {
                            ba_jQuery(this).parent().parent().parent().addClass('ba-alert');
                            preFlag = false;
                        }
                    });
                    if (flag && !preFlag) {
                        flag = false;
                    }
                });
            });
            if (flag) {
                parent.attr('style', 'display:none');
                parent.parent().find('.page-'+(++n)).removeAttr('style');
            } else {
                var position = ba_jQuery('.ba-alert').offset().top
                ba_jQuery('html, body').animate({
                    scrollTop: position
                }, 'slow');
            }
        });

        /*
            add event on click page break Prev button, that show prev page
            and hide current page
        */
        ba_jQuery('.ba-form .btn-prev').on('click', function() {
            setTimeout(refreshMap, 50)
            var parent = ba_jQuery(this).parent().parent();
            var id = parent.attr('class');
            var n = id.substr(5);
            parent.attr('style', 'display:none');
            parent.parent().find('.page-'+(--n)).removeAttr('style');
        });

        /*
            initial all maps of the form
        */
        ba_jQuery('.ba-map').each(function(){
            var options = ba_jQuery(this).parent().find('.ba-options').val(),
                zoom = true,
                draggable = true;
            options = options.split(';');
            if (options[8] == 0) {
                zoom = false;
            }
            if (options[9] == 0) {
                draggable = false;
            }
            if (options[0] != '') {
                var option = JSON.parse(options[0]);
                if (options[6] == 1) {
                    option.scrollwheel = zoom;
                    option.navigationControl = true;
                    option.mapTypeControl = true;
                    option.scaleControl = true;
                    option.draggable = draggable;
                    option.zoomControl = true;
                    option.disableDefaultUI = false;
                    option.disableDoubleClickZoom = false;
                } else {
                    option.scrollwheel = zoom;
                    option.draggable = draggable;
                    option.disableDoubleClickZoom = false;
                    option.disableDefaultUI = true;
                }
            } else {
                if (options[6] == 0) {
                    option = {
                        scrollwheel: zoom,
                        navigationControl: false,
                        mapTypeControl: false,
                        scaleControl: false,
                        draggable: draggable,
                        zoomControl: false,
                        disableDefaultUI: true,
                        disableDoubleClickZoom: false,
                    }
                } else {
                    option = {
                        scrollwheel: zoom,
                        navigationControl: true,
                        mapTypeControl: true,
                        scaleControl: true,
                        draggable: draggable,
                        zoomControl: true,
                        disableDefaultUI: false,
                        disableDoubleClickZoom: false,
                    }
                }
            }
            if (options[1] != '') {
                var marker = JSON.parse(options[1]);
            }
            if (options[7] != '') {
                var dir = ba_jQuery('.admin-dirrectory').val();
                var image = dir+options[7];
            } else {
                var image = options[7];
            }
            var content = options[2];
            var flag = options[5];
            option.callback = function(map){
                var self = this;
                if (marker) {
                    var keys = [];
                    for (var key in marker) {
                        keys.push(key);
                    }
                    var allMark = self.addMarker({'position': marker[keys[0]]+','+marker[keys[1]],
                                                  'draggable': false, 'bounds': false,
                                                  'icon': image}).click(function() {
                        if (content) {
                            self.openInfoWindow({'content': content}, allMark);
                        }
                    });
                    if (flag == 1) {
                         if (content) {
                             self.openInfoWindow({'content': content}, allMark);
                         }
                    }
                }
            };
            ba_jQuery(this).gmap(option);
        });

        /*
            initial all sliders of the form
        */
        ba_jQuery('.ba-slider').each(function(){
            var options = ba_jQuery(this).parent().find('.ba-options').val();
            options = options.split(';');
            var minimum = options[2];
            var maximum = options[3];
            var step = options[4];
            ba_jQuery(this).slider({
                min: minimum,
                max: maximum,
                step: step,
                value: [minimum, maximum]
            });
        });

        /*
            add event on click on the button, what show popup form
        */
        ba_jQuery('.popup-btn').on('click', function(){
            var target = ba_jQuery(this).attr('data-popup');
            ba_jQuery('body .modal-scrollable').css('background-color', dialogColor);
            ba_jQuery('#'+target).ba_modal();
            ba_jQuery('#'+target).parent().show();
            setTimeout(refreshMap, 300);
        });

        var files;

        /*
            refresh popup map
        */
        function refreshMap ()
        {
            ba_jQuery('.ba-map').each(function(){
                ba_jQuery(this).gmap('destroy');
            });
            ba_jQuery('.ba-map').each(function(){
                var options = ba_jQuery(this).parent().find('.ba-options').val(),
                    zoom = true,
                    draggable = true;
                options = options.split(';');
                if (options[8] == 0) {
                    zoom = false;
                }
                if (options[9] == 0) {
                    draggable = false;
                }
                if (options[0] != '') {
                    var option = JSON.parse(options[0]);
                    if (options[6] == 1) {
                        option.scrollwheel = zoom;
                        option.navigationControl = true;
                        option.mapTypeControl = true;
                        option.scaleControl = true;
                        option.draggable = draggable;
                        option.zoomControl = true;
                        option.disableDefaultUI = false;
                        option.disableDoubleClickZoom = false;
                    }
                } else {
                    if (options[6] == 0) {
                        option = {
                            scrollwheel: zoom,
                            navigationControl: false,
                            mapTypeControl: false,
                            scaleControl: false,
                            draggable: draggable,
                            zoomControl: false,
                            disableDefaultUI: true,
                            disableDoubleClickZoom: true,
                        }
                    } else {
                        option = {
                            scrollwheel: zoom,
                            navigationControl: true,
                            mapTypeControl: true,
                            scaleControl: true,
                            draggable: draggable,
                            zoomControl: true,
                            disableDefaultUI: false,
                            disableDoubleClickZoom: false,
                        }
                    }
                }
                if (options[1] != '') {
                    var marker = JSON.parse(options[1]);
                }
                if (options[7] != '') {
                    var dir = ba_jQuery('.admin-dirrectory').val();
                    var image = dir+options[7];
                } else {
                    var image = options[7];
                }
                var content = options[2];
                var flag = options[5];
                option.callback = function(map){
                    var self = this;
                    if (marker) {
                        var keys = [];
                        for (var key in marker) {
                            keys.push(key);
                        }
                        var allMark = self.addMarker({'position': marker[keys[0]]+','+marker[keys[1]],
                                                      'draggable': false, 'bounds': false}).click(function() {
                            if (content) {
                                self.openInfoWindow({'content': content}, allMark);
                            }
                        });
                        if (flag == 1) {
                             if (content) {
                                 self.openInfoWindow({'content': content}, allMark);
                             }
                        }
                    }
                };
                ba_jQuery(this).gmap(option);
            });
        }

        /*
            add event on load the file, what check the max size and file tipe of 
            loaded file
        */
        ba_jQuery(this).find('.tool').find('input[type=file]').on('change', prepareUpload);
        function prepareUpload(event)
        {
            files = event.target.files;
            if (files.length != 0) {
                var size = ba_jQuery(this).parent().find('.upl-size').val();
                var types = ba_jQuery(this).parent().find('.upl-type').val();
                types = types.split(',');
                size = 1048576*size;
                if (files[0].size < size) {
                    globalFlag = true;
                    var type = files[0].name.split('.');
                    for(var i = 0; i<types.length; i++) {
                        if (type[type.length-1].toLowerCase() == ba_jQuery.trim(types[i].toLowerCase())) {
                            ba_jQuery(this).parent().find('.upl-error').val('');
                            ba_jQuery(this).parent().removeClass('ba-alert');
                            break;
                        } else {
                            ba_jQuery(this).parent().addClass('ba-alert');
                            ba_jQuery(this).parent().find('.upl-error').val('error');
                        }
                    }
                } else {
                    ba_jQuery(this).parent().addClass('ba-alert');
                    ba_jQuery(this).parent().find('.upl-error').val('error');
                }
            } else {
                ba_jQuery(this).parent().find('.upl-error').val('');
                ba_jQuery(this).parent().removeClass('ba-alert');
            }
        }

        /*
            add event on submit form
        */
        ba_jQuery(this).find('.ba-form').parent().on('submit', sendMassage);
        function sendMassage(event) 
        {
            var globalFlag = true;
            ba_jQuery('.ba-textInput input').each(function(){
                if (ba_jQuery(this).hasClass('ba-alert')) {
                    globalFlag = false;
                    return false;
                }
            });

            ba_jQuery(this).find('.upl-error').each(function(){
                if (ba_jQuery(this).val() == 'error') {
                    globalFlag = false;
                    return false;
                }
            });
            ba_jQuery(this).find('input[type="email"]').each(function(){
                var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
                var value = ba_jQuery(this).val();
                if(!reg.test(value)) {
                    ba_jQuery(this).addClass('ba-alert');
                    globalFlag = false;
                } else {
                    ba_jQuery(this).removeClass('ba-alert');
                }
            });
            if (ba_jQuery('.ba-captcha').length != 0) {
                var captcha = ba_jQuery('.ba-captcha').find('input[type="text"]').val();
                if (captcha == '') {
                    globalFlag = false;
                    ba_jQuery('.ba-captcha').addClass('ba-alert');
                } else {
                    globalFlag = true;
                    ba_jQuery('.ba-captcha').removeClass('ba-alert');
                }
            }
            var preFlag = true;
            ba_jQuery(this).find('.required').each(function(){
                ba_jQuery(this).find('input[type="checkbox"]').each(function(){
                    if (ba_jQuery(this).prop('checked')) {
                        ba_jQuery(this).parent().parent().parent().removeClass('ba-alert');
                        preFlag = true;
                        return false;
                    } else {
                        ba_jQuery(this).parent().parent().parent().addClass('ba-alert');
                        preFlag = false;
                    }
                });
            });
            if (globalFlag && !preFlag) {
                globalFlag = false;
            }
            if (!globalFlag) {
                event.stopPropagation();
                event.preventDefault();
                var position = ba_jQuery('.ba-alert').offset().top
                ba_jQuery('html, body').animate({
                    scrollTop: position
                }, 'slow');
            } else {
                var iframe = ba_jQuery('<iframe/>', {
                    name:'form-target',
                    id:'form-target'
                });
                ba_jQuery('#form-target').remove();
                iframe.appendTo(ba_jQuery('body'));
                ba_jQuery(this).attr('target', 'form-target');
                ba_jQuery(iframe).attr('style', 'display:none');
                var item = ba_jQuery(this);
                var dir = ba_jQuery('.admin-dirrectory').val();
                ba_jQuery('body .modal-scrollable').css('background-color', dialogColor);
                messageModal.ba_modal();
                messageModal.parent().show();
                messageModal.find('.message').html('<img src="'+dir+'/administrator/components/com_baforms/assets/images/reload.svg">');
                if (window.addEventListener) {
                    window.addEventListener("message", function(event){
                        listenMessage(event);
                    }, false);
                } else {
                    window.attachEvent("onmessage", function(event){
                        listenMessage(event);
                    });
                }
                
                function listenMessage(event){
                    item.find('.ba-captcha').find('input[type="text"]').val('');
                    var mesage = ba_jQuery(iframe).contents().find('#form-sys-mesage').val();
                    messageModal.find('.message').html(mesage);
                    var success = item.find('.sent-massage').val();
                    if (ba_jQuery('.popup-form').hasClass('popup-form')) {
                        hideModal(item);
                    }
                    if (success == mesage) {
                        var redirect =  item.find('.redirect').val();
                        if (redirect != '') {
                            setTimeout(function(){
                                redirectFunct(item);
                            }, 2000);
                        }
                    }
                }
                function hideModal(item){
                    item.closest('.popup-form').ba_modal('hide');
                    item.closest('modal-scrollable').hide();
                    item.find('input').each(function(){
                        var type = ba_jQuery(this).attr('type');
                        if (type == 'radio' || type == 'checkbox') {
                            ba_jQuery(this).removeAttr('checked');
                        }
                        if (type == 'email') {
                            ba_jQuery(this).val('');
                        }
                        if (ba_jQuery(this).parent().hasClass('ba-textInput')) {
                            ba_jQuery(this).val('');
                        }
                    });
                    item.find('textarea').each(function () {
                        ba_jQuery(this).val('');
                    });
                    item.find('select').each(function(){
                        ba_jQuery(this).find('option').each(function(){
                            ba_jQuery(this).removeAttr('selected');
                        });
                    });
                }
                function redirectFunct(item) {
                    var redirect =  item.find('.redirect').val();
                    window.location = redirect;
                }
            }
        }
    });
});