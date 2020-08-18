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
$db = JFactory::getDbo();

if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
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

$required = '';
if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
$tracks = array();
$videos = array();
$youtubeId = "";
if (!empty($entityInstance->eiid)) {
  $db->setQuery("SELECT * FROM #__os_cck_video_source WHERE fk_eiid=" . $entityInstance->eiid . " AND fk_fid='$field->fid' ORDER BY id");
  $videos = $db->loadObjectList();
}
$youtube = new stdClass();
for ($k = 0;$k < count($videos);$k++) {
  if (!empty($videos[$k]->youtube)) {
    $youtube->code = $videos[$k]->youtube;
    $youtube->id = $videos[$k]->id;
    break;
  }
}

if (!empty($entityInstance->eiid)) { //check video file
  $db->setQuery("SELECT * FROM #__os_cck_track_source WHERE fk_eiid=" . $entityInstance->eiid);
  $tracks = $db->loadObjectList();
}
if(!isset($layout_params['field_styling']))$layout_params['field_styling'] = '';
if(!isset($layout_params['custom_class']))$layout_params['custom_class'] = '';
?>

<script language="javascript" type="text/javascript">
  var request = null;
  var tid=1;
  function createRequest_track() {
    if (request != null)
    return;
    try {
      request = new XMLHttpRequest();
    } catch (trymicrosoft) {
      try {
         request = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (othermicrosoft) {
        try {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (failed) {
          request = null;
        }
      }
    }
    if (request == null)
      alert(" :-( ___ Error creating request object! ");
  }

  function testInsert_track(id1,upload){
    for(var i=1; i< t_counter; i++){
      if(upload.id != ('new_upload_track'+i) &&
      document.getElementById('new_upload_track'+i).value == upload.value){
        return false;
      }
    }
    return true;
  }

  function refreshRandNumber_track(id1,upload){
    id=id1;
    if(testInsert_track(id1,upload)){
      createRequest_track();
      var url = "<?php echo JURI::root() . "/index.php?option=com_os_cck&task=checkFile&format=raw";?>&file="+upload.value+"&path=<?php echo str_replace("\\", "/", JURI::root()) . '/components/com_os_cck/files/track/'?>";
     try{
      request.onreadystatechange = updateRandNumber_track;
      request.open("GET", url,true);
      request.send(null);
      }catch (e)
      {
        alert(e);
      }
    }
    else
    {
      alert("You alredy select this track file");
      upload.value="";
    }
  }

  function updateRandNumber_track() {
    if (request.readyState == 4) {
      document.getElementById("randNumTrack"+tid).innerHTML = request.responseText;
    }
  }
</script>
<!-- END Ajax load track-->

<!-- START Ajax load video-->
<script language="javascript" type="text/javascript">
  var request = null;
  var vid=1;
  function createRequest_video(){
    if (request != null)
    return;
    try {
      request = new XMLHttpRequest();
    } catch (trymicrosoft) {
      try {
        request = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (othermicrosoft) {
        try {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (failed) {
          request = null;
        }
      }
    }
    if (request == null)
      alert(" :-( ___ Error creating request object! ");
  }

  function testInsertVideo(id1,upload){
    for(var i=1 ;i< v_counter; i++){
      if(upload.id != ('new_upload_video'+i) &&
      document.getElementById('new_upload_video'+i).value == upload.value)
      {
        return false;
      }
    }
    return true;
  }

  function refreshRandNumber_video(id1,upload){
    id=id1;
    if(testInsertVideo(id1,upload)){
      createRequest_video();
      var url = "<?php echo JURI::root() . "/index.php?option=com_os_cck&task=checkFile&format=raw";?>&file="+upload.value+"&path=<?php echo str_replace("\\", "/", JURI::root()) . 'components/com_os_cck/files/video/' ?>";
     try{
      request.onreadystatechange = updateRandNumber_video;
      request.open("GET",url,true);
      request.send(null);
      }catch (e)
      {
        alert(e);
      }
    }
    else
    {
      alert("You alredy select this video file");
      upload.value="";
    }
  }

  function updateRandNumber_video() {
    if (request.readyState == 4) {
      document.getElementById("randNumVideo"+vid).innerHTML = request.responseText;
    }
  }
</script>

<!-- END Ajax load video-->
<script language="javascript" type="text/javascript">
  function changeButtomName() {
    document.getElementById('v_add').value = "<?php echo JText::_('COM_OS_CCK_LABEL_VIDEO_ADD_ALTERNATIVE_VIDEO') ?>";
  }
  var v_counter<?php echo $field->fid; ?>=0;
  function new_videos<?php echo $field->fid; ?>(new_element, fid){
    div = jQuerOs(new_element).parent()[0];
    button = new_element;
    v_counter<?php echo $field->fid; ?>++;
    newitem='<div>'+
                '<div width="160px">'+
                    "<?php echo JText::_('COM_OS_CCK_LABEL_VIDEO_UPLOAD') ?>"+v_counter<?php echo $field->fid; ?>+
                  ': '+
                '</div>'+
                '<div width="400px">'+
                  '<input style="float:left; width:100%" type="file"'+
                        " onClick=\"jQuerOs('#"+fid+"_new_upload_video_url"+v_counter<?php echo $field->fid; ?>+"').val('');jQuerOs('#new_upload_video_youtube_code"+v_counter<?php echo $field->fid; ?>+"').val('');\" " +
                        ' value ="" onChange="refreshRandNumber_video('+v_counter<?php echo $field->fid; ?>+',this);"'+
                        ' name="new_upload_video'+v_counter<?php echo $field->fid; ?>+'" id="new_upload_video'+v_counter<?php echo $field->fid; ?>+
                        '" value="" size="45">'+
                  '<div id="randNumVideo'+v_counter<?php echo $field->fid; ?>+'" style="color:red;"></div>'+
                '</div>'+
              '</div>'+
              '<div><div style="margin:5px;">OR</div></div>';
    newnode = document.createElement("div");
    newnode.innerHTML = newitem;
    div.insertBefore(newnode,button);
    

    newitem = '<div>'+
                  '<div width="160px">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_VIDEO_UPLOAD_URL'); ?>" +v_counter<?php echo $field->fid; ?>+
                    ': '+
                  '</div>'+
                  '<div width="400px">'+
                    '<input style="float:left; width:90%" type="text"'+
                      ' name="'+fid+'_new_upload_video_url'+v_counter<?php echo $field->fid; ?>+'"'+
                      ' id="new_upload_video_url'+v_counter<?php echo $field->fid; ?>+'" value="" size="45">'+
                  '</div>'+
                '</div>'
                ;
    newnode = document.createElement("div");
    newnode.innerHTML = newitem;
    div.insertBefore(newnode,button);
    
    newitem = '<div><div style="margin:5px; width:160px;">OR</div></div>';
    newnode = document.createElement("div");
    newnode.innerHTML = newitem;
    div.insertBefore(newnode,button);
    
    newitem = '<div>'+
                  '<div width="160px">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_VIDEO_UPLOAD_YOUTUBE_CODE'); ?>" +
                    ':'+
                  '</div>'+
                  '<div width="400px">'+
                    '<input style="float:left; width:90%" type="text"'+
                          ' name="'+fid+'_new_upload_video_youtube_code'+v_counter<?php echo $field->fid; ?>+'"'+
                          ' id="new_upload_video_youtube_code'+v_counter<?php echo $field->fid; ?>+'" value="" size="45">'+
                  '</div>'+
                '</div>'+
              '<br><br><br><div><?php echo JText::_("COM_OS_CCK_LABEL_PRIOTITY"); ?></div>'
    newnode=document.createElement("div");
    newnode.innerHTML=newitem;
    div.insertBefore(newnode,button);
    var allowed_files = 5;
    if(v_counter<?php echo $field->fid; ?> + <?php echo count($videos); ?> >= allowed_files) {
      button.setAttribute("style","display:none");
    }
    changeButtomName();
  }

  var t_counter=0;
  function new_tracks(){
    div = document.getElementById("t_items");
    button = document.getElementById("t_add");
    t_counter++;
    newitem = '<div>'+
                  '<label style="float:left;">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_TRACK_UPLOAD') ?>"+t_counter+
                    ': </label>'+
                  '<div>'+
                    '<input style="float:left; width:100%" type="file"'+
                          'onClick="jQuerOs(\'#new_upload_track_url"'+t_counter+'\').val(\'\')" value =""'+
                          ' onChange="refreshRandNumber_track('+t_counter+',this);"'+
                          ' name="new_upload_track'+t_counter+'"'+
                          ' id="new_upload_track'+t_counter+'" value="" size="45">'+
                    '<span id="randNumTrack'+t_counter+'" style="color:red;"></span>'+
                  '</div>'+
                '</div>'+
                '<span style="margin:5px;"> OR </span>';
    newnode = document.createElement("div");
    newnode.innerHTML = newitem;
    div.insertBefore(newnode,button);

    newitem = '<div>'+
                  '<label style="float:left;">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_TRACK_UPLOAD_URL'); ?>"+t_counter+
                    ': </label>'+
                  '<div>'+
                    '<input style="float:left; width:90%" type="text"'+
                          ' name="new_upload_track_url'+t_counter+'"'+
                          ' id="new_upload_track_url'+t_counter+'" value="" size="45">'+
                  '</div>'+
                '</div>';
    newnode = document.createElement("div");
    newnode.innerHTML=newitem;
    div.insertBefore(newnode,button);

    newitem = '<div>'+
                  '<label style="float:left;">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_TRACK_UPLOAD_KIND'); ?>"+t_counter+
                    ': '+
                  '</label>'+
                  '<div>'+
                    '<input style="float:left; width:90%" type="text"'+
                          ' name="new_upload_track_kind'+t_counter+'"'+
                          ' id="new_upload_track_kind'+t_counter+'" value="" size="45">'+
                  '</div>'+
                '</div>';
    newnode = document.createElement("div");
    newnode.innerHTML=newitem;
    div.insertBefore(newnode,button);

    newitem = '<div>'+
                  '<label style="float:left;">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_TRACK_UPLOAD_SCRLANG'); ?>"+t_counter+
                    ':'+
                  '</label>'+
                  '<div>'+
                    '<input style="float:left; width:90%" type="text"'+
                          ' name="new_upload_track_scrlang'+t_counter+'"'+
                          ' id="new_upload_track_scrlang'+t_counter+'" value="" size="45">'+
                  '</div>'+
                '</div>';
    newnode = document.createElement("div");
    newnode.innerHTML = newitem;
    div.insertBefore(newnode,button);

    newitem = '<div>'+
                  '<label style="float:left;">'+
                      "<?php echo JText::_('COM_OS_CCK_LABEL_TRACK_UPLOAD_LABEL'); ?>"+t_counter+
                    ': '+
                  '</label>'+
                  '<div>'+
                    '<input style="float:left; width:90%" type="text"'+
                          ' name="new_upload_track_label'+t_counter+'"'+
                          ' id="new_upload_track_label'+t_counter+'" value="" size="45">'+
                  '</div>'+
                '</div>';
    newnode = document.createElement("div");
    newnode.innerHTML=newitem;
    div.insertBefore(newnode,button);
  }
</script>

<div>
  <span width="185"></span>
  <span><span id="error_video"></span></span>
</div>
<?php
if (count($videos) > 0 ) {?>
  <div>
    <span colspan="2"></span>
  </div>
  <div>
    <span valign="top" align="left"><?php echo JText::_("COM_OS_CCK_LABEL_VIDEO")?></span>
  </div>
  <?php
  for ($k = 0;$k < count($videos);$k++){?>
    <div>
      <?php  if($videos[$k]->youtube == ''){ ?>
      <span align="right"><?php echo JText::_("COM_OS_CCK_LABEL_VIDEO_ATTRIBUTE").($k+1)?></span>
      <?php } ?>
      <span>
        <?php
        if(isset($videos[$k]->src) && substr($videos[$k]->src, 0, 4) != "http"
          && empty($youtube->code)){?>
            <input type="text" name="<?php echo $field->fid; ?>_video<?php echo $k?>" id="video<?php echo $k?>"
                    size="60" value="<?php echo JURI::root().$videos[$k]->src?>"
                    readonly="readonly" class="<?php echo $field->db_field_name; ?>"/>
            <?php
          }elseif($videos[$k]->youtube){ ?>
              <div>
                <span align="right"><?php echo JText::_("COM_OS_CCK_LABEL_YOUTUBE_ATTRIBUTE")?></span>
                <span>
                  <input type="text" name="<?php echo $field->fid; ?>_youtube_code<?php echo $youtube->id?>"
                          id="youtube_code<?php echo $youtube->id?>"
                          size="60" value="<?php echo $youtube->code?>" class="<?php echo $field->db_field_name; ?>"/>
                </span>
              </div>
              <div>
                <label><span align="right"><?php echo JText::_("COM_OS_CCK_LABEL_VIDEO_DELETE")?></span>
                <span>
                  <input type="checkbox"
                        name="youtube_option_del<?php echo $youtube->id?>"
                        value="<?php echo $youtube->id?>">
                </span></label>
              </div>
        <?php  }else{?>
            <input type="text" name="<?php echo $field->fid; ?>_video_url<?php echo $k?>" id="video_url<?php echo $k?>"
                    size="60" value="<?php echo $videos[$k]->src?>"
                    readonly="readonly" class="<?php echo $field->db_field_name; ?>"/>
            <?php
          }?>
      </span>
    </div>
    <?php
        if(isset($videos[$k]->id) && $videos[$k]->youtube == ''){?>
        <div>
          <label><span align="right"><?php echo JText::_("COM_OS_CCK_LABEL_VIDEO_DELETE")?></span>
          <span>


              <input type="checkbox" name="<?php echo $field->fid; ?>_video_option_del<?php echo $videos[$k]->id?>"
                      value="<?php echo $videos[$k]->id?>">
              <?php
            ?>
          </span></label>
        </div>
        <?php
    }
  }
} 


if(count($videos) < 5){?>
  <div>
      <?php $span_style = get_align_styles($field, $layout); ?>
    <span id="v_items" <?php echo $span_style; ?>>
      <input <?php echo $layout_params['field_styling']?> class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?>"
          id="v_add" type="button"
          <?php echo $offset_animation; ?>
          name="new_video"
          value="<?php echo JText::_("COM_OS_CCK_LABEL_ADD_NEW_VIDEO_FILE")?>"
          onClick="new_videos<?php echo $field->fid; ?>(this, <?php echo $field->fid; ?>)"/>
    </span>
  </div>
  <?php 
}

if (count($tracks) > 0) {?>
  <div>
    <span valign="top" align="left"><?php echo JText::_("COM_OS_CCK_LABEL_TRACK")?></span>
  </div>
  <?php
  for ($k = 0;$k < count($tracks);$k++) {?>
    <div>
      <span align="right"><?php echo JText::_("COM_OS_CCK_LABEL_TRACK_UPLOAD_URL").($k+1)?></span>
      <span>
        <?php
        if (isset($tracks[$k]->src) && substr($tracks[$k]->src, 0, 4) != "http"){?>
          <input type="text" class="trackitems" size="60"
                value="<?php echo JURI::root().$tracks[$k]->src?>" readonly="readonly"/>
          <?php
        }else{?>
          <input type="text" class="trackitems" size="60"
                value="<?php echo $tracks[$k]->src?>" readonly="readonly"/>
          <?php
        }
        if (!empty($tracks[$k]->kind)){?>
          <input class="trackitems" type="text" size="60"
                  value="<?php echo $tracks[$k]->kind?>" readonly="readonly"/>
          <?php
        }
        if (!empty($tracks[$k]->scrlang)){?>
          <input class="trackitems" type="text" size="60"
                value="<?php echo $tracks[$k]->scrlang?>" readonly="readonly"/>
          <?php
        }
        if (!empty($tracks[$k]->label)){?>
          <input class="trackitems" type="text" size="60"
                value="<?php echo $tracks[$k]->label?>" readonly="readonly"/>
          <?php
        }?>
      </span>'.
    </div>
    <div>
      <label><span align="right"><?php echo JText::_("COM_OS_CCK_LABEL_TRACK_DELETE")?></span>
      <span>
        <?php
        if(isset($tracks[$k]->id)){?>
          <input type="checkbox" name="track_option_del<?php echo $tracks[$k]->id?>" 
                  value="<?php echo $tracks[$k]->id?>">
          <?php
        }?>
      </span></label>
    </div>
    <?php
  }
}
?><span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> ><?php

if($field_from_params[$fName.'_add_track']){?>
  <div>
    <span id="t_items">
      <input <?php echo $layout_params["field_styling"]?>
          class="<?php echo $layout_params['custom_class'].$required . $field->db_field_name?>" 
          <?php echo $offset_animation; ?>
          id="t_add"
          type="button"
          name="new_track"
          value="<?php echo JText::_("COM_OS_CCK_LABEL_ADD_NEW_TRACK")?>"
          onClick="new_tracks()"/>
    </span>
  </div>
  <?php
}?></span>
