<?php
if (!defined('_VALID_MOS') && !defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');

/**
* @package OS CCK
* @copyright 2020 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Vladislav Prikhodko(vlados.vp1@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/



$key = 'key='.$os_cck_configuration->get("google_map_key",'');
if(checkJavaScriptIncludedCCK("maps.googleapis.com") === false ) {
    $doc->addScript('//maps.googleapis.com/maps/api/js?'.$key);
}

$fName = $field->db_field_name;
$clasterer = isset($layout_fields['clasterer_'.$field->db_field_name]) ? $layout_fields['clasterer_'.$field->db_field_name] : '';
$field_styling = get_field_styles($field, $layout);
$field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
$hover_styling = get_hover_css_style($field, $layout_params);
echo $hover_styling;
$custom_class = get_field_custom_class($field, $layout);
$offset_animation = get_field_offset_animation($field, $layout);
if(isset($layout_fields) && $layout_fields[$fName]['options']['width'] && $layout_fields[$fName]['options']['width']){
  $map_style = ' width:'.$layout_fields[$fName]['options']['width'].
                'px;height:'.$layout_fields[$fName]['options']['width'].'px;" ';
}else{
  $map_style = ' height: 300px;" ';
}

if(isset($layout_params['fields'][$field->db_field_name.'_tooltip']) && isset($layout_params['fields']['description_'.$field->db_field_name]) && $layout_params['fields']['description_'.$field->db_field_name]=='on'){
  $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title="'.$layout_params['fields'][$field->db_field_name.'_tooltip'].'"';           
}else{
  $tooltip = 'rel="tooltip" data-toggle="tooltip" data-placement="top" title=""';
}


$field_styling = substr_replace($field_styling, $map_style, strlen($field_styling)-1, strlen($field_styling));
$key = 'key='.$os_cck_configuration->get("google_map_key","AIzaSyD4ZY-54e-nzN0-KejXHkUh-D7bbexDMKk");
$doc->addScript('//maps.googleapis.com/maps/api/js?'.$key);




//add maps markers for instances to map
$tempEntity = new os_cckEntity($db);  
if(!empty($instancies)){
$tempEntity->load($instancies[0]->fk_eid); 

$tempFields = $tempEntity->getFieldList() ;
$for_map = '';
foreach ($tempFields as $tempField) {
    if( $tempField->field_type == "locationfield" ) {

      foreach ($instancies as $instancie) {
        $tempValue = $instancie->getFieldValue( $tempField ) ;
        if($tempValue[0]->vlat != '' && $tempValue[0]->vlong != ''){
            $for_map = 1;
        }


      }
      break ;
    }
  }

  if ($for_map != 1){

      $layout_html = str_replace("{|f-$fName|}", '', $layout_html);

  } else {

?>

<script language="JavaScript" type="text/javascript">
var items<?php echo $fName; ?> = new Array();

if(typeof(items<?php echo $fName; ?>) !== 'undefined'){
<?php    
  foreach ($tempFields as $tempField) {
    if( $tempField->field_type == "locationfield" ) {

      foreach ($instancies as $instancie) {
        $tempValue = $instancie->getFieldValue( $tempField ) ;
?>
        if('<?php echo $tempValue[0]->vlat; ?>' != 0 && '<?php echo $tempValue[0]->vlong; ?>' != 0){


              items<?php echo $fName; ?>.push({vlat: '<?php echo $tempValue[0]->vlat; ?>',
              vlong: '<?php echo $tempValue[0]->vlong; ?>',
              adress:<?php echo $db->quote(ltrim( $tempValue[0]->country." ".$tempValue[0]->region." ".$tempValue[0]->city." ".$tempValue[0]->zipcode." ".$tempValue[0]->address ));?>});
        }  
<?php    
      }
      break ;
    }
  }
?>

}

</script>

<?php   



ob_start();?>
<div <?php echo $tooltip; ?> class="<?php echo $custom_class . ' ' . $field->db_field_name; ?>" <?php echo $offset_animation; ?> <?php echo $field_styling; ?> id="map_canvas-<?php echo $os_cck_rand; ?>"></div>
<script type="text/javascript">
  function initialize() {
      var lastmarker = null;
      var clasterer = '<?php echo $clasterer; ?>';
      var image = {url: '<?php echo JURI::root()?>/components/com_os_cck/images/marker.png'};
      var mapOptions = {
          scrollwheel: false,
          zoomControlOptions: {
              style: google.maps.ZoomControlStyle.LARGE
          },
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById("map_canvas-<?php echo $os_cck_rand; ?>"),
          mapOptions);
      var marker = new Array();
      var bounds = new google.maps.LatLngBounds();

      for (var i = 0; i < items<?php echo $fName; ?>.length; i++){
        bounds.extend(new google.maps.LatLng(items<?php echo $fName; ?>[i]['vlat'], items<?php echo $fName; ?>[i]['vlong']));
        marker.push(new google.maps.Marker({
          position: new google.maps.LatLng(items<?php echo $fName; ?>[i]['vlat'], items<?php echo $fName; ?>[i]['vlong']),
          map: map,
          icon: image,
          animation: google.maps.Animation.DROP,
          title: items<?php echo $fName; ?>[i]['adress']
        }));
      }
      map.fitBounds(bounds);
      if(clasterer == 'on'){
          var markerCluster = new MarkerClusterer(map, marker,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      function updateCoordinates(latlng) {
          if (latlng) {
              document.getElementById('vlatitude').value = latlng.lat();
              document.getElementById('vlongitude').value = latlng.lng();
          }
      }
      function toggleBounce() {
          if (marker.getAnimation() != null) {
              marker.setAnimation(null);
          } else {
              marker.setAnimation(google.maps.Animation.BOUNCE);
          }
      }
      function updateCoordinates(latlng) {
          if (latlng) {
              document.getElementById('vlatitude').value = latlng.lat();
              document.getElementById('vlongitude').value = latlng.lng();
          }
      }
      function codeAddress() {
          var geocoder = new google.maps.Geocoder();
          myOptions = {
              zoom: 14,
              scrollwheel: false,
              zoomControlOptions: {
                  style: google.maps.ZoomControlStyle.LARGE
              },
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          map = new google.maps.Map(document.getElementById("map_canvas-<?php echo $os_cck_rand; ?>"), myOptions);
          var address = document.getElementById('vlocation').value +
                          " " + document.getElementById('country').value +
                          " " + document.getElementById('city').value +
                          " " + document.getElementById('vlatitude').value +
                          " " + document.getElementById('vlongitude').value;
          geocoder.geocode({
              'address': address
          }, function (results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  map.setCenter(results[0].geometry.location);
                  updateCoordinates(results[0].geometry.location);
                  if (marker) marker.setMap(null);
                  marker = new google.maps.Marker({
                      map: map,
                      position: results[0].geometry.location,
                      draggable: true,
                      icon: image,
                      animation: google.maps.Animation.DROP
                  });
                  google.maps.event.addListener(marker, 'click', toggleBounce);
                  google.maps.event.addListener(marker, "dragend", function () {
                      updateCoordinates(marker.getPosition());
                  });
              } else {
                  alert("Please check the accuracy of Address");
              }
          });
      }
      initialize.codeAddress = codeAddress;
  } // end of intialize
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php 
if($clasterer == 'on'){
    if(checkJavaScriptIncludedCCK("markerclusterer.js") === false ) {
        $doc->addScript('https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js');
    }
}
$layout_html = str_replace("{|f-$fName|}", ob_get_contents(), $layout_html);
ob_end_clean();
  }
} else {
    $layout_html = str_replace("{|f-$fName|}", '', $layout_html);
}