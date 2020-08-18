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


$fName = $field->db_field_name;
$cck_type_slider_or_image = isset($layout_params['fields']['cck_type_slider_or_image_'.$field->db_field_name]) ? $layout_params['fields']['cck_type_slider_or_image_'.$field->db_field_name] : 'slider';//slider or image
$data_src = ($cck_type_slider_or_image == 'slider') ? 'data-src' : 'src';
$cck_light_box_in_main_image = isset($layout_params['fields']['cck_light_box_in_main_image_'.$field->db_field_name]) ? $layout_params['fields']['cck_light_box_in_main_image_'.$field->db_field_name] : 0;
if($cck_type_slider_or_image == 'slider'){
    if(checkStylesIncludedCCK("swiper.css") === false ) {
        $doc->addStylesheet(JUri::root() . "components/com_os_cck/assets/css/swiper.css");
    }
    if(checkJavaScriptIncludedCCK("swiper-os.js") === false ) {
        $doc->addScript(JUri::root() . "components/com_os_cck/assets/js/swiper-os.js");
    }
}
if($cck_light_box_in_main_image == 'on'){
    if(checkStylesIncludedCCK("lightbox.css") === false ) {
        $doc->addStyleSheet( JUri::root().'components/com_os_cck/assets/lightbox/css/lightbox.css');
    }
    if(checkJavaScriptIncludedCCK("lightbox-2.6.min.js") === false ) {
        $doc->addScript(JURI::root() . 'components/com_os_cck/assets/lightbox/js/lightbox-2.6.min.js');
    }
}


$icon_alias_prefix = (isset($layout_params['fields'][$fName.'_add_icon_alias_prefix'])) ? $layout_params['fields'][$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($layout_params['fields'][$fName.'_add_icon_alias_suffix'])) ? $layout_params['fields'][$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$rand = rand();

$width_heigth = (!empty($layout_params["fields"][$fName]["options"]["width"]))? 'width:'.$layout_params["fields"][$fName]["options"]["width"].'px;' : 'width:100px;';
$width_heigth .= (!empty($layout_params["fields"][$fName]["options"]["height"]))? ' height:'.$layout_params["fields"][$fName]["options"]["height"].'px;' : 'height:100px;';
if(isset($GLOBALS['number_of_plugin'])){
    $number_of_plugin = $GLOBALS['number_of_plugin'];
}else{
    $number_of_plugin = '';
}
//for unique value to each slider
if(!isset($instance)) $instance = $entityInstance;

?>

<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
  rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> 
>
  <?php

    if(isset($layout_params['fields'][$fName.'_add_icon_prefix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_prefix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_prefix'].'"></span>';
    }
    if(!empty($layout_params['fields'][$fName.'_prefix'])){
      echo '<span class="cck-prefix">'.$layout_params['fields'][$fName.'_prefix'].'</span>';
    }
    if(isset($layout_params['fields'][$fName.'_add_icon_prefix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_prefix_suffix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_prefix_suffix'].'"></span>';
    }
  
    if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
        $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
        $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
    }

    
    //add settings
    $cck_on_gallery = isset($layout_params['fields']['cck_on_gallery_'.$field->db_field_name]) ? $layout_params['fields']['cck_on_gallery_'.$field->db_field_name] : 0;// 1 or 0
    $cck_on_slider_main_image = isset($layout_params['fields']['cck_on_slider_main_image_'.$field->db_field_name]) ? $layout_params['fields']['cck_on_slider_main_image_'.$field->db_field_name] : 0;//1 or 0
    
    $cck_slider_height = isset($layout_params['fields']['cck_slider_height_'.$field->db_field_name]) ? $layout_params['fields']['cck_slider_height_'.$field->db_field_name]/100 : 57/100; // 57%
    $cck_slider_object_fit = isset($layout_params['fields']['cck_slider_object_fit_'.$field->db_field_name]) ? $layout_params['fields']['cck_slider_object_fit_'.$field->db_field_name] : 'contain'; //contain or cover

    
    
    if($cck_type_slider_or_image == 'image'){
      $allowTouchMove = "false";
    }else{
      $allowTouchMove = "true";
    }
    ?>
    
    <div class="gallery_<?php echo $fName?>" id="gallery_<?php echo $fName?>">
    

    <?php 
    $images = array();
    
    if(!empty($value[0]) && $value[0]->data != '' && $value[0]->data != '[]'){ 
        $images = json_decode($value[0]->data);
        
    } elseif ($layout_params['fields'][$fName.'_def_img'] != '') {
        $images[] = JURI::root().'images/stories/'.$layout_params['fields'][$fName.'_def_img'];
    }
    $images_from_gallery = $images;
    if($cck_on_slider_main_image == 'on'){?>
      <!-- slider start -->
      <div id="cck-slider-container-<?php echo $fName?>-<?php echo $rand; ?>">
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
   
                <?php if($cck_type_slider_or_image == 'image' && $images != '') $images = array_splice($images, 0 ,1); ?>
               <?php if(!empty($value[0]) && $value[0]->data != '' && $value[0]->data != '[]'){
                 foreach ($images as $image){ 

                    if(!isset($image->name)) $image->name = '';
                    if(!isset($image->alt)) $image->alt = '';
                    if(!isset($image->file)) $image->file = '';
                ?>
                
                <div class="swiper-slide">
                  <?php if($cck_light_box_in_main_image == "on") echo '<a href="'.JURI::root().'images/com_os_cck'.$field->fid.'/original/'.$image->file.'" data-lightbox="group-<?php echo $instance->eiid; ?>" title="' . $image->name . '">'; ?>

                  <?php echo '<img style="width:100%" '.$data_src.'="'.JURI::root().'images/com_os_cck'.$field->fid.'/original/'.$image->file.'" alt="' . $image->alt . '" class="swiper-lazy"/>' ?>
                    
                  <?php if($cck_light_box_in_main_image == "on") echo'</a>'; ?>
                    <div class="swiper-lazy-preloader"></div>
                </div>
             <?php   }
                 }elseif (isset($layout_params['fields'][$fName.'_def_img']) && $layout_params['fields'][$fName.'_def_img'] != ''){ ?>
                <div class="swiper-slide">
                     <?php if($cck_light_box_in_main_image == "on") echo '<a href="'.JURI::root().'images/stories/'.$layout_params['fields'][$fName.'_def_img'].'" data-lightbox="group-<?php echo $instance->eiid; ?>">'; ?>

                  <?php echo '<img style="width:100%" '.$data_src.'="'.JURI::root().'images/stories/'.$layout_params['fields'][$fName.'_def_img'].'" class="swiper-lazy"/>' ?>
                    
                  <?php if($cck_light_box_in_main_image == "on") echo'</a>'; ?>
                    
                    </div>
                <div class="swiper-lazy-preloader"></div>
                <?php } ?>
                    
                <?php if($cck_type_slider_or_image == 'slider' && count($images) > 1){ ?>
              <!-- If we need navigation buttons -->
              
              <!-- If we need scrollbar -->
    <?php } ?>
            </div>
            <?php 

            if($cck_type_slider_or_image != 'image' && $images != ''){ ?>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <?php } ?>
        </div>  
      </div>
      
      <!-- slider end -->
    <?php } ?>

    <script>
      if('<?php echo $layout_params['fields']['cck_type_slider_or_image_'.$field->db_field_name]; ?>' == 'slider'){
          jQuerOs(window).on('load', function(){
          
              var SwipeOs<?php echo $instance->eiid; ?> = new SwipeOs ('#cck-slider-container-<?php echo $fName?>-<?php echo $rand; ?> .swiper-container', {
                navigation: {
                  nextEl: '#cck-slider-container-<?php echo $fName?>-<?php echo $rand; ?> .swiper-button-next',
                  prevEl: '#cck-slider-container-<?php echo $fName?>-<?php echo $rand; ?> .swiper-button-prev',
                },
                allowTouchMove: <?php echo $allowTouchMove; ?>,
                lazy:  true
    
              })
          })
          
      }
      loadGalleryfield('<?php echo $fName?>', '<?php echo $rand; ?>', '<?php echo $cck_slider_height; ?>', '<?php echo $cck_slider_object_fit; ?>', '<?php echo $number_of_plugin; ?>');

    </script>

    <?php
      
    if($cck_on_gallery == 'on'){
        if(!empty($value[0]) && $value[0]->data != '' && $value[0]->data != '[]'){
          foreach ($images_from_gallery as $image){
                if(!isset($image->name)) $image->name = '';
                if(!isset($image->alt)) $image->alt = '';
                if(!isset($image->file)) $image->file = '';

                if($cck_light_box_in_main_image == "on") echo '<a href="'.JURI::root().'images/com_os_cck'.$field->fid.'/original/'.$image->file.'" data-lightbox="roadtrip_'.$fName.$field->fid.'" title="' . $image->name . '">';
                echo '<img style="'.$width_heigth.'" src="'.JURI::root().'images/com_os_cck'.$field->fid.'/thumbnail/'.$image->file.'" alt="' . $image->alt . '"/>';
                if($cck_light_box_in_main_image == "on") echo'</a>';
          }
        }elseif (isset($layout_params['fields'][$fName.'_def_img']) && $layout_params['fields'][$fName.'_def_img'] != ''){
            if($cck_light_box_in_main_image == "on") echo '<a href="'.JURI::root().'images/stories/'.$layout_params['fields'][$fName.'_def_img'].'" data-lightbox="roadtrip_'.$fName.$field->fid.'" >';
            echo '<img style="'.$width_heigth.'" src="'.JURI::root().'images/stories/'.$layout_params['fields'][$fName.'_def_img'].'" />';
            if($cck_light_box_in_main_image == "on") echo'</a>';
        }
    }

    ?>
    </div>
    
    <?php
      if(isset($layout_params['fields'][$fName.'_add_icon_suffix_prefix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_prefix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_prefix'].'"></span>';
      }
      if(!empty($layout_params['fields'][$fName.'_suffix'])){
        echo '<span class="cck-suffix">'.$layout_params['fields'][$fName.'_suffix'].'</span>';
      }
      if(isset($layout_params['fields'][$fName.'_add_icon_suffix_suffix']) && !empty($layout_params['fields'][$fName.'_add_icon_suffix_suffix'])){
        echo '<span class="fa '.$layout_params['fields'][$fName.'_add_icon_suffix_suffix'].'"></span>';
      }
    ?>
</span>