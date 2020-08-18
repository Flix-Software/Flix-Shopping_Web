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

$field_from_params['ceid'] = $layout->fk_eid;
$field_from_params['lay_type'] = $layout_type;
$field_from_params['field_styling'] = $field_styling;
$field_from_params['custom_class'] = $custom_class;
$field_from_params['form_id'] = isset($field_from_params['form_id'])?$field_from_params['form_id']:'adminForm';
$offset_animation = get_field_offset_animation($field, $layout);

$fName = $field->db_field_name;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

if(!isset($field_from_params[$fName.'_field_type'])){
    $field_from_params[$fName.'_field_type'] = 'default';
}

$required = '';
if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required'] == 'on')
    $required = ' required ';
$readonly = '';
$defVal = $field_from_params[$fName.'_default_val'];
$input_format = isset($field_from_params[$fName.'_input_format'])?trim($field_from_params[$fName.'_input_format']):'15';
$input_time_format = isset($field_from_params[$fName.'_input_time_format'])?trim($field_from_params[$fName.'_input_time_format']):'H:i:s';
$time_value = '';

$step_time = isset($field_from_params[$fName.'_step_time']) ? $field_from_params[$fName.'_step_time'] : '15';

if(trim($step_time) == '' || $input_time_format == '') $step_time = false;

if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}

if(isset($value) && $value != '' && $value != "0000-00-00 00:00:00"){
    
}elseif($defVal == 'TODAY'){
    $value = date($input_format);
}elseif($defVal == 'EMPTY'){
    $value = '';
}elseif(($defVal == 'CHANGE' || $defVal == 'CREATE') && empty($value)){
    $value = date($input_format);
    $readonly=' readonly ';
}


//$value = (isset($value) && $value != '' && $value != "0000-00-00 00:00:00") ? $value : date($input_format);

if($input_time_format != ''){
    $time_value = date($input_time_format , strtotime(data_transform_cck($value,$input_time_format)));
}

if($input_format != ''){
  $date_value = date($input_format, strtotime(data_transform_cck($value,$input_format)));
}else{
  //$input_format = "Y-m-d";
  $date_value = date($input_format);
}



if(isset($field_from_params[$fName.'_field_type']) && $field_from_params[$fName.'_field_type'] == 'rent_from'){
    
    $id = 'rent_from_'.$field_from_params['form_id'];
    $date_NA = available_dates_cck($field_from_params['eiid'],$step_time);
    
    //initial auto first time
    $minutes_for_day = available_times_cck($field_from_params['eiid'], $input_format);
    $minutes_for_day_rent_to = available_times_cck($field_from_params['eiid'], $input_format, true, $step_time);
    $tracked_class = "tracked";

}elseif(isset($field_from_params[$fName.'_field_type']) &&  $field_from_params[$fName.'_field_type'] == 'rent_to'){
    $id = 'rent_until_'.$field_from_params['form_id'];
    $date_NA = available_dates_cck($field_from_params['eiid'],$step_time);
    
    //initial auto first time
    $minutes_for_day = available_times_cck($field_from_params['eiid'], $input_format);
    $minutes_for_day_rent_to = available_times_cck($field_from_params['eiid'], $input_format, true, $step_time);
    $tracked_class = "tracked";

}else{
    $id = 'fi_'.$fName.$field_from_params['form_id'];
    $tracked_class = "";
}

?>

<script type="text/javascript">
  var unavailabelDates = Array();
  jQuerOs(document).ready(function() {
    var k=0;
    <?php if(!empty($date_NA)){
      foreach ($date_NA as $N_A){ ?>
        unavailabelDates[k]= '<?php echo $N_A; ?>';
        k++;
      <?php } ?>
    <?php } ?>

    function unavailabelFrom(date) {
      dmy = date.getFullYear() + "-" + ('0'+(date.getMonth() + 1)).slice(-2) +
        "-" + ('0'+date.getDate()).slice(-2);
        
      if (jQuerOs.inArray(dmy, unavailabelDates) == -1) {
          
        return [true, ""];
      } else {
          
        return [false, "", "Unavailabel"];
      }
    }

    function unavailabelUntil(date) {
      dmy = date.getFullYear() + "-" + ('0'+(date.getMonth() + 1)).slice(-2) +
        "-" + ('0'+(date.getDate()-("<?php  if($os_cck_configuration->get('rent_type') == 0 ) echo 1;?>"))).slice(-2);
      if (jQuerOs.inArray(dmy, unavailabelDates) == -1) {
        return [true, ""];
      } else {
        return [false, "", "Unavailabel"];
      }
    }


  <?php
  if($defVal == 'CHANGE' || $defVal == 'CREATE'){
    //datepicker not create
  }elseif(!isset($field_from_params[$fName.'_field_type']) || $field_from_params[$fName.'_field_type'] == 'default'){
    ?>
    jQuerOs(document).ready(function() {
        
      jQuerOs( "#<?php echo $field_from_params['form_id'];?> #<?php echo $id?>" ).datepicker({
        //minDate: "+0",
        dateFormat: "<?php echo transforDateFromPhpToJqueryCCK($input_format);?>",
      });
    })
    <?php
  }elseif($field_from_params[$fName.'_field_type'] == 'rent_from'){?>
    
    jQuerOs( "#rent_from_<?php echo $field_from_params['form_id'];?>" ).datepicker({
      minDate: "+0",
      dateFormat: "<?php echo transforDateFromPhpToJqueryCCK($input_format);?>",
      beforeShowDay: unavailabelFrom,
      onClose: function () {
        jQuerOs.ajax({
          type: "POST",
          url: '<?php echo JUri::current()?>',
          update: jQuerOs("#<?php echo $field_from_params['form_id'];?>  #alert_date "),
          success: function( data ) {
            jQuerOs("#alert_date").html("");
          }
        });
        var rent_from = jQuerOs("#rent_from_<?php echo $field_from_params['form_id']?>").val();
        var rent_until = jQuerOs("#rent_until_<?php echo $field_from_params['form_id']?>").val();
        var time_from = jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").val();
        var time_until = jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").val();

        jQuerOs("[name=rent_from]").val(rent_from);
        jQuerOs("[name=rent_until]").val(rent_until);
        jQuerOs("[name=time_from]").val(time_from);
        jQuerOs("[name=time_until]").val(time_until);
        
        var price_fields = jQuerOs(".hidden-price");
        
        if(price_fields.length > 0){
            var json_price_fields = [];
            for(index = 0; index < price_fields.length; ++index){
                var fid = jQuerOs(price_fields[index]).attr('fid');

                var lid = jQuerOs(price_fields[index]).attr('lid');
                json_price_fields[index] ={}
                json_price_fields[index]['fid'] = fid;
                json_price_fields[index]['lid'] = lid;
                json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
            }
            json_price_fields = JSON.stringify(json_price_fields);
        }else{
            json_price_fields = jQuerOs('[name=price_fields]').val();
        }
    
//        jQuerOs.ajax({
//          type: "POST",
//          url: "index.php?option=com_os_cck&task=ajax_rent_calcualete"
//            +"&rent_eiid=<?php echo $field_from_params['eiid']; ?>&current_lid=<?php echo $layout->lid?>"+
//            "&rent_ceid=<?php echo $field_from_params['ceid']; ?>&rent_from="+
//            rent_from+"&rent_until="+rent_until,
//          data: { " #do " : " #1 ",
//                    jsonPriceFields: json_price_fields
//                },
//          update: jQuerOs("#<?php echo $field_from_params['form_id'];?>  #alert_date"),
//          success: function( data ) {
//            if(data){
//               data = JSON.parse(data);
//            }
//            if(typeof data.price != 'undefined' && typeof data.currency != 'undefined'){
//              jQuerOs("#<?php echo $field_from_params['form_id'];?> .message-here").html(data.price+' '+data.currency);
//              jQuerOs("#<?php echo $field_from_params['form_id'];?> [name=calculated_price]").val(data.price);
//            }
//          }
//        });
        
      }
    });
    <?php
  }elseif($field_from_params[$fName.'_field_type'] == 'rent_to'){?>
    jQuerOs( "#rent_until_<?php echo $field_from_params['form_id'];?>" ).datepicker({
      minDate: "+0",
      dateFormat: "<?php echo transforDateFromPhpToJqueryCCK($input_format);?>",
      beforeShowDay: unavailabelUntil,
      onClose: function () {
        jQuerOs.ajax({
          type: "POST",
          url: '<?php echo JUri::current()?>',
          update: jQuerOs("#<?php echo $field_from_params['form_id'];?>  #alert_date "),
          success: function( data ) {
            jQuerOs("#<?php echo $field_from_params['form_id'];?> #alert_date").html("");
          }
        });
        var rent_from = jQuerOs("#rent_from_<?php echo $field_from_params['form_id']?>").val();
        var rent_until = jQuerOs("#rent_until_<?php echo $field_from_params['form_id']?>").val();
        var time_from = jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").val();
        var time_until = jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").val();

        jQuerOs("[name=rent_from]").val(rent_from);
        jQuerOs("[name=rent_until]").val(rent_until);
        jQuerOs("[name=time_from]").val(time_from);
        jQuerOs("[name=time_until]").val(time_until);
        
        var price_fields = jQuerOs(".hidden-price");
        if(price_fields.length > 0){
            var json_price_fields = [];
            for(index = 0; index < price_fields.length; ++index){
                var fid = jQuerOs(price_fields[index]).attr('fid');

                var lid = jQuerOs(price_fields[index]).attr('lid');
                json_price_fields[index] ={}
                json_price_fields[index]['fid'] = fid;
                json_price_fields[index]['lid'] = lid;
                json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
            }
            json_price_fields = JSON.stringify(json_price_fields);
        }else{
            json_price_fields = jQuerOs('[name=price_fields]').val();
        }

//        jQuerOs.ajax({
//          type: "POST",
//          url: "index.php?option=com_os_cck&task=ajax_rent_calcualete"
//            +"&rent_eiid=<?php echo $field_from_params['eiid']; ?>&current_lid=<?php echo $layout->lid?>"+
//            "&rent_ceid=<?php echo $field_from_params['ceid']; ?>&rent_from="+
//            rent_from+"&rent_until="+rent_until,
//          data: { " #do " : " #1 ",
//                    jsonPriceFields: json_price_fields
//                },
//          update: jQuerOs("#<?php echo $field_from_params['form_id'];?>  #alert_date"),
//          success: function( data ) {
//            if(data){
//               data = JSON.parse(data);
//            }
//            
//            if(typeof data.price != 'undefined' && typeof data.currency != 'undefined'){
//              jQuerOs("#<?php echo $field_from_params['form_id'];?> .message-here").html(data.price+' '+data.currency);
//              jQuerOs("#<?php echo $field_from_params['form_id'];?> [name=calculated_price]").val(data.price);
//            }             
//          }
//        });
      }
    });
    <?php
  }?>
});
</script>
<?php if($input_format != ''){ ?>
<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >

<input <?php echo $layout_params['field_styling']?> 
        class="<?php echo $layout_params['custom_class']. ' ' .$required . ' ' . $field->db_field_name . ' ' . $tracked_class?> calendar_input"
        placeholder="<?php echo $field_from_params[$fName.'_placeholder']?>"
        <?php echo $offset_animation; ?>
        <?php echo $readonly?>
        type="text"
        id="<?php echo $id?>"
        name=""
        value="<?php echo ($defVal == 'EMPTY' && $value == '') ? '' : $date_value?>">


<?php }
  // if(isset($field_from_params[$fName.'_field_type']) 
  //   && ($field_from_params[$fName.'_field_type'] != 'rent_from' 
  //       || $field_from_params[$fName.'_field_type'] != 'rent_to')){
?>

<?php 

if($time_value != '' && ($field_from_params[$fName.'_field_type'] == 'default' 
        || $os_cck_configuration->get('rent_type', 0) == '2' )){ ?>
  <input <?php echo $layout_params['field_styling']?> 
          id="<?php echo $id.'time_picker'?>" 
          class="<?php echo $layout_params['custom_class']. ' ' . $required . ' ' . $field->db_field_name . ' ' . $tracked_class; ?> ui-timepicker-input"
          <?php echo $readonly?>
          <?php echo $offset_animation; ?>
          type="text" 
          name="" 

          <?php if(isset($field_from_params[$fName.'_field_type']) 
            && $field_from_params[$fName.'_field_type'] == 'rent_to'){
            echo "value='". date($input_time_format,strtotime('23:59:59')) ."'";
          }elseif(isset($field_from_params[$fName.'_field_type']) 
            && $field_from_params[$fName.'_field_type'] == 'rent_from'){
            echo "value='". date($input_time_format,strtotime('00:00:00')) ."'";
          }else{
            echo "value='".$time_value."'";  
          }?>
  >
        <?php } ?>

<input type="hidden" class="<?php echo $id.'hidden'?>" name="fi_<?php echo $fName?>" value="<?php echo $date_value?> <?php echo $time_value;?>">

<?php
  // } 
?>

</span>


<?php 



//$minutes_for_day to json
if(isset($minutes_for_day)){  
  $minutes_for_day = json_encode($minutes_for_day);
}else{
  $minutes_for_day = '{}';
}

if(isset($minutes_for_day_rent_to)){  
  $minutes_for_day_rent_to = json_encode($minutes_for_day_rent_to);
}else{
  $minutes_for_day_rent_to = '{}';
}

?>

<?php 
$step_time_rent_from = '';
$step_time_rent_until = '';
if(stripos($id, 'rent_from') !== FALSE){
  if($step_time){
    $step_time_rent_from = "'forceRoundTime': true,'step': ".(int)$step_time.",";
  }else{
    $step_time_rent_from = '';
  }
}elseif (stripos($id, 'rent_until') !== FALSE) {
    if($step_time){
        $step_time_rent_until = "'forceRoundTime': true,'step': ".(int)$step_time.",";
    }else{
        $step_time_rent_until = '';
    }
}else{
    if($step_time){
        $step_time = "'forceRoundTime': true,'step': ".(int)$step_time.",";
    }else{
        $step_time = '';
    }
}

  ?>

<?php if(!isset($field_from_params[$fName.'_field_type']) || $field_from_params[$fName.'_field_type'] == 'default'):?>

  <script type="text/javascript">

  jQuerOs(document).ready(function($) {
    

    jQuerOs("#<?php echo $id;?>, #<?php echo $id;?>time_picker").change(function(event) {

     var date = jQuerOs("#fi_<?php echo $fName.$field_from_params['form_id'];?>").val();
     var time = jQuerOs("#fi_<?php echo $fName.$field_from_params['form_id'];?>time_picker").val();

     if(time == undefined) time = '00:00:00';
     
      if('<?php echo  $layout->type;?>' != 'rent_request_instance' || '<?php echo $os_cck_configuration->get('rent_type'); ?>' == '2'){
        jQuerOs(".<?php echo $id.'hidden'?>").val(date+" "+time);
      }else{
        jQuerOs(".<?php echo $id.'hidden'?>").val(date);
      }

    });


   //rent_from timepicker

        jQuerOs("#<?php echo $id.'time_picker'?>").timepicker(
            { 
              'timeFormat' : "<?php echo transforDateFromPhpToJqueryCCK($input_time_format);?>",
               <?php echo $step_time;?>
            }
        );
  });

  </script>

<?php else:?>

<script type="text/javascript">

jQuerOs(document).ready(function() {



  jQuerOs("#<?php echo 'fi_'.$fName;?>, #<?php echo 'fi_'.$fName.'time_picker';?>").change(function(event) {
     var date = jQuerOs("#<?php echo 'fi_'.$fName;?>").val();
     var time = jQuerOs("#<?php echo 'fi_'.$fName.'time_picker';?>").val();
     if(time == undefined) time = '00:00:00';
     jQuerOs(".<?php echo 'fi_'.$fName.'hidden'?>").val(date+" "+time);
  });
  
  jQuerOs("#rent_from_<?php echo $field_from_params['form_id'];?>, #rent_until_<?php echo $field_from_params['form_id'];?>").change(function(event) {

    //var date = new Date(jQuerOs(this).val());
    var date = new Date();
    date_from = jQuerOs("#rent_from_<?php echo $field_from_params['form_id'];?>").val();
    date_until = jQuerOs("#rent_until_<?php echo $field_from_params['form_id'];?>").val();
    
      //get unavailable time rent_from_
      unavailable_time = [];
      minutes_for_day = JSON.parse('<?php echo $minutes_for_day;?>');
      
      if(minutes_for_day[date_from] !== undefined){
        unavailable_time = minutes_for_day[date_from];
      }
       
      //get unavailable time rent_until_
      unavailable_time_rent_to = [];
      minutes_for_day_rent_to = JSON.parse('<?php echo $minutes_for_day_rent_to;?>');
      if(minutes_for_day_rent_to[date_until] !== undefined){
         unavailable_time_rent_to = minutes_for_day_rent_to[date_until];
      }

    //rent_from timepicker
    if(jQuerOs(this).attr('id') == 'rent_from_'+"<?php  echo $field_from_params['form_id']?>"){  
      jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").timepicker('remove');
      jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").timepicker(
          { 
            'timeFormat' : "<?php echo transforDateFromPhpToJqueryCCK($input_time_format);?>",
            'disableTimeRanges' : unavailable_time,
            <?php echo $step_time_rent_from;?>
          }
      );
    }

    //rent_until timepicker
    if(jQuerOs(this).attr('id') == 'rent_until_'+"<?php  echo $field_from_params['form_id']?>"){ 
      jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").timepicker('remove');
      jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").timepicker(
          { 
            'timeFormat' : "<?php echo transforDateFromPhpToJqueryCCK($input_time_format);?>",
            'disableTimeRanges' : unavailable_time_rent_to,
            <?php echo $step_time_rent_until;?>
          }
      );
    }  
     
    //rent_from_ time default
    if(jQuerOs(this).attr('id') == 'rent_from_'+"<?php  echo $field_from_params['form_id']?>"){  
      if(minutes_for_day[date_from] == undefined){
        jQuerOs('#rent_from_'+"<?php  echo $field_from_params['form_id']?>"+"time_picker").val('00:00:00');
      }else{
        jQuerOs('#rent_from_'+"<?php  echo $field_from_params['form_id']?>"+"time_picker").val('');
      }
    }

    //rent_until_ time default
    if(jQuerOs(this).attr('id') == 'rent_until_'+"<?php  echo $field_from_params['form_id']?>"){
      if(minutes_for_day_rent_to[date_until] == undefined){
        jQuerOs("#rent_until_"+"<?php  echo $field_from_params['form_id']?>"+"time_picker").val('23:59:59');
      }else{
        jQuerOs("#rent_until_"+"<?php  echo $field_from_params['form_id']?>"+"time_picker").val('');
      }
    }

  });

  function rent_calculate_from(){
        var date = jQuerOs("#rent_from_<?php echo $field_from_params['form_id']?>").val();
       var time = jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").val();

       if(time == undefined) time = '00:00:00';
        if('<?php echo  $os_cck_configuration->get('rent_type');?>' == 2){
          jQuerOs(".rent_from_<?php echo $field_from_params['form_id'].'hidden'?>").val(date+" "+time);
        }else{
          jQuerOs(".rent_from_<?php echo $field_from_params['form_id'].'hidden'?>").val(date);
        }

        var rent_from = jQuerOs("#rent_from_<?php echo $field_from_params['form_id']?>").val();
        var rent_until = jQuerOs("#rent_until_<?php echo $field_from_params['form_id']?>").val();
        var time_from = jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").val();
        var time_until = jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").val();

        jQuerOs("[name=rent_from]").val(rent_from);
        jQuerOs("[name=rent_until]").val(rent_until);
        jQuerOs("[name=time_from]").val(time_from);
        jQuerOs("[name=time_until]").val(time_until);
        
        if(time_from == undefined) time_from = '';
        if(time_until == undefined) time_until = '';
        
        var price_fields = jQuerOs(".hidden-price");
        if(price_fields.length > 0){
            var json_price_fields = [];
            for(index = 0; index < price_fields.length; ++index){
                var fid = jQuerOs(price_fields[index]).attr('fid');

                var lid = jQuerOs(price_fields[index]).attr('lid');
                json_price_fields[index] ={}
                json_price_fields[index]['fid'] = fid;
                json_price_fields[index]['lid'] = lid;
                json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
            }
            json_price_fields = JSON.stringify(json_price_fields);
        }else{
            json_price_fields = jQuerOs('[name=price_fields]').val();
        }
        //console.log('111111111111', time_from)
//        jQuerOs.ajax({
//              type: "POST",
//              url: "index.php?option=com_os_cck&task=ajax_rent_calcualete"
//                +"&rent_eiid=<?php echo $field_from_params['eiid']; ?>&current_lid=<?php echo $layout->lid?>"+
//                "&rent_ceid=<?php echo $field_from_params['ceid']; ?>&rent_from="+
//                rent_from+" "+time_from+"&rent_until="+rent_until+" "+time_until,
//              data: { " #do " : " #1 ",
//                    jsonPriceFields: json_price_fields
//                },
//              update: jQuerOs("#<?php echo $field_from_params['form_id'];?>  #alert_date"),
//              success: function( data ) {
//                if(data){
//                   data = JSON.parse(data);
//                }
//
//                if(typeof data.price != 'undefined' && typeof data.currency != 'undefined'){
//                  jQuerOs("#<?php echo $field_from_params['form_id'];?> .message-here").html(data.price+' '+data.currency);
//                  jQuerOs("#<?php echo $field_from_params['form_id'];?> [name=calculated_price]").val(data.price);
//                }             
//              }
//            });
  }
  rent_calculate_from();
  //add date time to hidden datetime field
    jQuerOs("#rent_from_<?php echo $field_from_params['form_id']?>, #<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").change(function(event) {
        rent_calculate_from();
    });
    function rent_calculate_until(){
        var date = jQuerOs("#rent_until_<?php echo $field_from_params['form_id']?>").val();
   
       var time = jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").val();

       if(time == undefined) time = '00:00:00';
        if('<?php echo  $os_cck_configuration->get('rent_type');?>' == 2){
          jQuerOs(".rent_until_<?php echo $field_from_params['form_id'].'hidden'?>").val(date+" "+time);
        }else{
          jQuerOs(".rent_until_<?php echo $field_from_params['form_id'].'hidden'?>").val(date);
        }

        var rent_from = jQuerOs("#rent_from_<?php echo $field_from_params['form_id']?>").val();
        var rent_until = jQuerOs("#rent_until_<?php echo $field_from_params['form_id']?>").val();
        var time_from = jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").val();
        var time_until = jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").val();

        jQuerOs("[name=rent_from]").val(rent_from);
        jQuerOs("[name=rent_until]").val(rent_until);
        jQuerOs("[name=time_from]").val(time_from);
        jQuerOs("[name=time_until]").val(time_until);
        if(time_from == undefined) time_from = '';
        if(time_until == undefined) time_until = '';
        
        var price_fields = jQuerOs(".hidden-price");
        var json_price_fields = [];
        for(index = 0; index < price_fields.length; ++index){
            var fid = jQuerOs(price_fields[index]).attr('fid');

            var lid = jQuerOs(price_fields[index]).attr('lid');
            json_price_fields[index] ={}
            json_price_fields[index]['fid'] = fid;
            json_price_fields[index]['lid'] = lid;
            json_price_fields[index]['value'] = jQuerOs(price_fields[index]).val();
        }
        json_price_fields = JSON.stringify(json_price_fields);
//        jQuerOs.ajax({
//              type: "POST",
//              url: "index.php?option=com_os_cck&task=ajax_rent_calcualete"
//                +"&rent_eiid=<?php echo $field_from_params['eiid']; ?>&current_lid=<?php echo $layout->lid?>"+
//                "&rent_ceid=<?php echo $field_from_params['ceid']; ?>&rent_from="+
//                rent_from+" "+time_from+"&rent_until="+rent_until+" "+time_until,
//              data: { " #do " : " #1 ",
//                    jsonPriceFields: json_price_fields
//                },
//              update: jQuerOs("#<?php echo $field_from_params['form_id'];?>  #alert_date"),
//              success: function( data ) {
//                if(data){
//                   data = JSON.parse(data);
//                }
//
//                if(typeof data.price != 'undefined' && typeof data.currency != 'undefined'){
//                  jQuerOs("#<?php echo $field_from_params['form_id'];?> .message-here").html(data.price+' '+data.currency);
//                  jQuerOs("#<?php echo $field_from_params['form_id'];?> [name=calculated_price]").val(data.price);
//                }             
//              }
//            });
    }
    rent_calculate_until();
  //add date time to hidden datetime field
    jQuerOs("#rent_until_<?php echo $field_from_params['form_id']?>, #<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").change(function(event) {
        rent_calculate_until();
    });




  
});
jQuerOs(window).on('load',function($) { 
    
    date_from = jQuerOs("#rent_from_<?php echo $field_from_params['form_id'];?>").val();
    date_until = jQuerOs("#rent_until_<?php echo $field_from_params['form_id'];?>").val();
    //date = date.getFullYear()  + "-" + ("0"+(date.getMonth()+1)).slice(-2) + "-" + ("0" + date.getDate()).slice(-2);
      //get unavailable time rent_from_
      unavailable_time = [];
      minutes_for_day = JSON.parse('<?php echo $minutes_for_day;?>');
       

      if(minutes_for_day[date_from] !== undefined){
        unavailable_time = minutes_for_day[date_from];
      }
       
      //get unavailable time rent_until_
      unavailable_time_rent_to = [];
      minutes_for_day_rent_to = JSON.parse('<?php echo $minutes_for_day_rent_to;?>');
      if(minutes_for_day_rent_to[date_until] !== undefined){
         unavailable_time_rent_to = minutes_for_day_rent_to[date_until];
      }

    //rent_from timepicker

      jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").timepicker('remove');
      jQuerOs("#<?php echo 'rent_from_'.$field_from_params['form_id'].'time_picker'?>").timepicker(
          { 
            'timeFormat' : "<?php echo transforDateFromPhpToJqueryCCK($input_time_format);?>",
            'disableTimeRanges' : unavailable_time,
            <?php echo $step_time_rent_from;?>
          }
      );


    //rent_until timepicker
 
      jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").timepicker('remove');
      jQuerOs("#<?php echo 'rent_until_'.$field_from_params['form_id'].'time_picker'?>").timepicker(
          { 
            'timeFormat' : "<?php echo transforDateFromPhpToJqueryCCK($input_time_format);?>",
            'disableTimeRanges' : unavailable_time_rent_to,
            <?php echo $step_time_rent_until;?>
          }
      );
 
    
    //rent_from_ time default

        jQuerOs('#rent_from_'+"<?php  echo $field_from_params['form_id']?>"+"time_picker").val('00:00:00');
      
 

    //rent_until_ time default
 
      
        jQuerOs("#rent_until_"+"<?php  echo $field_from_params['form_id']?>"+"time_picker").val('23:59:59');
      
 
    });
</script>

<?php endif; ?>


