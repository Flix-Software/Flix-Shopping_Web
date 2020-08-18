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
if(checkStylesIncludedCCK("jquery.cck_timepicker.css") === false ) {
    $doc->addStyleSheet(JURI::root() . "components/com_os_cck/assets/css/jquery.cck_timepicker.css");
}
if(checkJavaScriptIncludedCCK("jquery.cck_timepicker.js") === false ) {
    $doc->addScript(JURI::root() . "components/com_os_cck/assets/js/jquery.cck_timepicker.js","text/javascript",true);
}
global $db;

$fName = $field->db_field_name;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$fParams['type'] = isset($layout_params['fields']['search_'.$fName])?$layout_params['fields']['search_'.$fName]:'';
$inputFormat = isset($fields_from_params[$fName.'_input_format'])?$fields_from_params[$fName.'_input_format']:'d-m-Y';
$inputFormatTime = isset($fields_from_params[$fName.'_input_time_format'])?$fields_from_params[$fName.'_input_time_format']:'H:i:s';
$range_eventfrom = JRequest::getVar('os_cck_search_'.$field->db_field_name.'_range_eventfrom', '');
$range_eventto = JRequest::getVar('os_cck_search_'.$field->db_field_name.'_range_eventto', '');

if($fParams['type'] == 1){
?>

  <div>
    <script type="text/javascript">
      jQuerOs(document).ready(function(){
        jQuerOs( "#os_cck_search_<?php echo $fName?>_from, #os_cck_search_<?php echo $fName?>_to" ).datepicker({
          minDate: "+0",
          dateFormat: '<?php echo transforDateFromPhpToJqueryCCK($inputFormat)?>'
        });
        jQuerOs( "#os_cck_search_<?php echo $fName?>time_picker_from, #os_cck_search_<?php echo $fName?>time_picker_to" ).timepicker({
          timeFormat: '<?php echo transforDateFromPhpToJqueryCCK($inputFormatTime)?>'
        });
        
        
        jQuerOs("#os_cck_search_<?php echo $fName?>_from, #os_cck_search_<?php echo $fName?>time_picker_from").change(function(event) {
             var date = jQuerOs("#os_cck_search_<?php echo $fName?>_from").val();
             var time = jQuerOs("#os_cck_search_<?php echo $fName?>time_picker_from").val();
             if(time == undefined || time == '') time = '00:00:00';
             jQuerOs(".<?php echo 'fi_'.$fName.'hidden_from'?>").val(date+" "+time);
          });
          
          jQuerOs("#os_cck_search_<?php echo $fName?>_to, #os_cck_search_<?php echo $fName?>time_picker_to").change(function(event) {
             var date = jQuerOs("#os_cck_search_<?php echo $fName?>_to").val();
             var time = jQuerOs("#os_cck_search_<?php echo $fName?>time_picker_to").val();
             if(time == undefined || time == '') time = '23:59:59';
             jQuerOs(".<?php echo 'fi_'.$fName.'hidden'?>_to").val(date+" "+time);
          });

      });
      
      
      
    </script>

<?php

    $layout_fk_eid = $layout->fk_eid;
    $layout_type = 'rent_request_instance';

    $layout_one = new os_cckLayout($db);
    $lid = $layout_one->getLayoutParams($layout_fk_eid, $layout_type);
    $layout_one->load($lid);
    $fields_from_params = unserialize($layout_one->params);
    
  ?> 
  <span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
  <?php

    if($fields_from_params['fields'][$fName."_field_type"] == "rent_from")
          {
              ?>
                <input  <?php echo $field_styling?> class="<?php echo $custom_class?> date_input" <?php echo $offset_animation; ?> size="10" type="text" id="os_cck_search_<?php echo $fName?>_from" name="">
              <?php
              if($os_cck_configuration->get('rent_type') == '2' && $inputFormatTime != ''){ ?>
                  <input <?php echo $layout_params['field_styling']?> 
                  id="os_cck_search_<?php echo $fName; ?>time_picker_from" 
                  class="<?php echo $field->db_field_name?> ui-timepicker-input time_input"
                  <?php echo $offset_animation; ?>
                  size="8"
                  type="text" 
                  name="" 
                  value=""
                >
                
              <?php } ?>
              <input type="hidden" class="fi_<?php echo $fName; ?>hidden_from" name="os_cck_search_<?php echo $fName?>_datefrom" value="">
          <?php }

    if($fields_from_params['fields'][$fName."_field_type"] == "rent_to")
        {
            ?>
            <input  <?php echo $field_styling?> class="<?php echo $custom_class?> date_input" <?php echo $offset_animation; ?> size="10" type="text" id="os_cck_search_<?php echo $fName?>_to" name="">
            
            <?php
            if($os_cck_configuration->get('rent_type') == '2' && $inputFormatTime != ''){ ?>
                  <input <?php echo $layout_params['field_styling']?> 
                  id="os_cck_search_<?php echo $fName; ?>time_picker_to" 
                  class="<?php echo $field->db_field_name?> ui-timepicker-input time_input"
                  <?php echo $offset_animation; ?>
                  size="8"
                  type="text" 
                  name="" 
                  value=""
                >
        <?php } ?>
            <input type="hidden" class="fi_<?php echo $fName; ?>hidden_to" name="os_cck_search_<?php echo $fName?>_dateto" value="">
        <?php }
        
  ?></span><?php
?>
     
  </div>

  <?php
  }

  //one default field
  elseif($fParams['type'] == 2){?> 

     <script type="text/javascript">
      jQuerOs(document).ready(function(){
        jQuerOs( "#os_cck_search_<?php echo $fName?>" ).datepicker({
          dateFormat: '<?php echo transforDateFromPhpToJqueryCCK($inputFormat)?>'
        });
        jQuerOs( "#os_cck_search_<?php echo $fName?>time_picker" ).timepicker({
          timeFormat: '<?php echo transforDateFromPhpToJqueryCCK($inputFormatTime)?>'
        });
        
        
        jQuerOs("#os_cck_search_<?php echo $fName?>, #os_cck_search_<?php echo $fName?>time_picker").change(function(event) {
             var date = jQuerOs("#os_cck_search_<?php echo $fName?>").val();
             var time = jQuerOs("#os_cck_search_<?php echo $fName?>time_picker").val();
             if(time == undefined || time == '') time = 'undefined';
             jQuerOs(".<?php echo 'fi_'.$fName.'hidden'?>").val(date+" "+time);
          });
      });
    </script>

    <div>
        <span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
              {?>
          rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
          <?php } ?> >

          <input  <?php echo $field_styling?> 
                class="<?php echo $custom_class?> date_input" 
                <?php echo $offset_animation; ?> 
                type="text" 
                id="os_cck_search_<?php echo $fName?>" 
                name=""
                size="10"
                value="<?php echo $range_eventfrom; ?>">
          
          <?php 
          if($inputFormatTime != ''){ ?>
                  <input <?php echo $layout_params['field_styling']?> 
                  id="os_cck_search_<?php echo $fName; ?>time_picker" 
                  class="<?php echo $field->db_field_name?> ui-timepicker-input time_input"
                  <?php echo $offset_animation; ?>
                  type="text" 
                  size="8"
                  name="" 
                  value=""
                >
          <?php } ?>
          <input type="hidden" class="fi_<?php echo $fName; ?>hidden" name="os_cck_search_<?php echo $fName?>_range_eventfrom" value="">
        </span>
         
    </div>

  <?php
    }

 //range default field
  elseif($fParams['type'] == 3){?>

    <script type="text/javascript">
      jQuerOs(document).ready(function(){
        jQuerOs( "#os_cck_search_<?php echo $fName?>_range_eventfrom, #os_cck_search_<?php echo $fName?>_range_eventto" ).datepicker({
          dateFormat: '<?php echo transforDateFromPhpToJqueryCCK($inputFormat)?>'
        });
        jQuerOs( "#os_cck_search_<?php echo $fName?>_range_event_time_picker_from, #os_cck_search_<?php echo $fName?>_range_event_time_picker_to" ).timepicker({
          timeFormat: '<?php echo transforDateFromPhpToJqueryCCK($inputFormatTime)?>'
        });
        
        
        jQuerOs("#os_cck_search_<?php echo $fName?>_range_eventfrom, #os_cck_search_<?php echo $fName?>_range_event_time_picker_from").change(function(event) {
             var date = jQuerOs("#os_cck_search_<?php echo $fName?>_range_eventfrom").val();
             var time = jQuerOs("#os_cck_search_<?php echo $fName?>_range_event_time_picker_from").val();
             if(time == undefined || time == '') time = '00:00:00';
             jQuerOs(".<?php echo 'fi_'.$fName.'hidden_from'?>").val(date+" "+time);
          });
          
          jQuerOs("#os_cck_search_<?php echo $fName?>_range_eventto, #os_cck_search_<?php echo $fName?>_range_event_time_picker_to").change(function(event) {
             var date = jQuerOs("#os_cck_search_<?php echo $fName?>_range_eventto").val();
             var time = jQuerOs("#os_cck_search_<?php echo $fName?>_range_event_time_picker_to").val();
             if(time == undefined || time == '') time = '23:59:59';
             jQuerOs(".<?php echo 'fi_'.$fName.'hidden'?>_to").val(date+" "+time);
          });
      });
    </script>

    <div>

        <span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
              {?>
          rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
          <?php } ?> >

          <label>From:</label><input  <?php echo $field_styling?> 
                class="<?php echo $custom_class?> date_input" 
                <?php echo $offset_animation; ?> 
                type="text" 
                id="os_cck_search_<?php echo $fName?>_range_eventfrom" 
                size="10"
                value="<?php echo $range_eventfrom; ?>">
          <?php if($inputFormatTime != ''){ ?>
                  <input <?php echo $layout_params['field_styling']?> 
                  id="os_cck_search_<?php echo $fName; ?>_range_event_time_picker_from" 
                  class="<?php echo $field->db_field_name?> ui-timepicker-input time_input"
                  <?php echo $offset_animation; ?>
                  size="8"
                  type="text" 
                  name="" 
                  value=""
                >
                  
          <?php } ?>
                  <input type="hidden" class="fi_<?php echo $fName; ?>hidden_from" name="os_cck_search_<?php echo $fName?>_range_eventfrom" value="">
          <label>To:</label><input  <?php echo $field_styling?> 
                class="<?php echo $custom_class?> date_input" 
                <?php echo $offset_animation; ?> 
                type="text" 
                size="10"
                id="os_cck_search_<?php echo $fName?>_range_eventto" 
                value="<?php echo $range_eventto; ?>">
          <?php if($inputFormatTime != ''){ ?>
                  <input <?php echo $layout_params['field_styling']?> 
                  id="os_cck_search_<?php echo $fName; ?>_range_event_time_picker_to" 
                  class="<?php echo $field->db_field_name?> ui-timepicker-input time_input"
                  <?php echo $offset_animation; ?>
                  size="8"
                  type="text" 
                  name="" 
                  value=""
                >
                  
          <?php } ?>
                  <input type="hidden" class="fi_<?php echo $fName; ?>hidden_to" name="os_cck_search_<?php echo $fName?>_range_eventto" value="">
        </span>
         
    </div>

  <?php
  }

  elseif($fParams['type'] == 4){?>
  <input type="hidden" name="os_cck_search_<?php echo $fName?>" value="on">
  <?php
  }