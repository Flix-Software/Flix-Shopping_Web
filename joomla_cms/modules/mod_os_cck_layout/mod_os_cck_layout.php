    <?php
    defined( '_JEXEC' ) or die( 'Restricted access' );
    /**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/
    if(!defined('DS')){
        define('DS', DIRECTORY_SEPARATOR  );
    }
    
    $doc =JFactory::getDocument();
 
    
    require_once ( JPATH_BASE .DS.'components'.DS.'com_os_cck'.DS.'os_cck.php' );
    /** ensure this file is being included by a parent file */
    $language = JFactory::getLanguage();
    $language->load('com_os_cck');
    $db = JFactory::getDBO();
    

    if( !function_exists( 'sefreltoabs')) {
        function sefRelToAbs( $value ) {
          //Need check!!!
      
          // Replace all &amp; with & as the router doesn't understand &amp;
          $url = str_replace('&amp;', '&', $value);
          if(substr(strtolower($url),0,9) != "index.php") return $url;
          $uri    = JURI::getInstance();
          $prefix = $uri->toString(array('scheme', 'host', 'port'));
          return $prefix.JRoute::_($url);
        }
    }
    global $moduleId;
    $moduleId = $module->id;
    $catid = 0;
    $defaultDesign = $params->get('defaultDesign');
    $background = $params->get('background');
    $layout_type = $params->get('layout_type');
    $layout_from_params = $params->get('layout');
    $instance = $params->get('instance');
    $option = "com_os_cck";
    $moduleclass_sfx = $params->get('moduleclass_sfx', '');
    if($defaultDesign == 1) { ?>
        <style type="text/css">
        #last_added {}
        .new_all {
            margin: 10px 10px;
            padding: 10px;
            border: 1px solid #D6D6D6;
            width:200px;
            height:280px;
            overflow:hidden;
        }
        .new_image {text-align:center;}
        .new_title {}
        .new_text {}
        .new_btn {}
        .new_btn_a {}
        </style>
    <?php
    }
    ?>
    
    <div id="os_cck_layout" style="overflow:hidden;">
    <div class="os_cck_<?php echo "$moduleclass_sfx"; ?>" >
        <?php
        $task = trim(mosGetParam($_REQUEST, 'modtask', ""));
        if($task)$layout_type=$task;

        switch($layout_type){
            case "instance":
                Instance::showItem($option, $instance, $catid, 0, 1);
            break;
            
            case "add_instance":
            case "request_instance":
                $lid = $params->get('layout','');
                $show_type = $params->get('show_type');
                $button_name = $params->get('button_name');
                Instance::show_request_layout($option, $lid,0,$show_type,$button_name);//$count='m', $moduleId
            break;

            case "category_with_map":
            case "category":
                $lid = $params->get('layout','');
                Category::showCategory($option, $instance, -1, 0, 1);
            break;
            
            case "user_instances":
                $lid = $params->get('layout','');
                $mod_type = 1;
                Instance::showUserInstances($option, $lid, 1);
            break;

            case "search":
                Category::showSearch($option, $catid);
            break;
            
            case "all_categories":
                Category::listCategories($option, $catid,$params);
            break;

            case 'all_instance':
                Instance::show_all_instance($option, $params->get('layout'), 1);
            break;

            case 'calendar':
                Instance::show_calendar($option, $params->get('layout'));
            break;
        
            case 'cart':
                $lid = $params->get('layout','');
                $cart_type = $params->get('cart_type','');
                Instance::showCartLayout($option, $lid, 1, $cart_type);
            break;

            case 'parent_child':
                Instance::showParentChildLayout($option, $params->get('layout'), 1);
            break;
        }
        ?>
    </div>
  </div>

