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
////////////////////////GLOBAL VARIABLES DECLARATION///////////////////////
//JPATH_SITE = $GLOBALS['mosConfig_absolute_path'] = JPATH_SITE;
//$mosConfig_live_site = $GLOBALS['mosConfig_live_site'] = JURI::root();



global $option,
        $Itemid,
        $doc,
        $user,
        $db,
        $os_cck_configuration,
        $limit,
        $limitstart,
        $app,
        $session,
        $jConf;


$app = JFactory::getApplication();
$input = $app->input;
$user = JFactory::getUser();
$doc = JFactory::getDocument();
$db = JFactory::getDBO();
$session = JFactory::getSession();
$os_cck_configuration = JComponentHelper::getParams('com_os_cck');
$Itemid = $input->get('Itemid', 0, 'INT');
$option = $input->get('option', '', 'STRING');

$GLOBALS['input'] = $input;

//check is set task in simplemembershipt
if(isset($_GLOBALS) && isset($_GLOBALS['task']) ){
     $task = $_GLOBALS['task'] ;
}
if (!isset($task))
    $_GLOBALS['task'] = $task = $input->get('task', '', 'STRING');
else {
    $_GLOBALS['task'] = $task;
}

//check is set lid in simplemembershipt
if(isset($_GLOBALS) && isset($_GLOBALS['lid']) ){
     $lid = $_GLOBALS['lid'] ;
}
if (!isset($lid))
    $_GLOBALS['lid'] = $lid = $input->get('lid', 0, 'INT');
else {
    $_GLOBALS['lid'] = $lid;
}

//$lid = $input->get('lid', 0,'INT');
//$task = $input->get('task', '', 'STRING');
$view = $input->get('view', '', 'STRING');
$type = $input->get('type', '', 'STRING');
$catid = $input->get('catid', 0, 'INT');
$eiids = $input->get('eiid', array(0), 'ARRAY');
$jConf = JFactory::getConfig();


// paginations
$limit = $input->get('limit', $os_cck_configuration->get('items_on_page'), 'INT');;
$limitstart = $input->get('limitstart', 0, 'INT');

if($task == "" && $view != "" ) $task = $view ;
///////////END GLOBAL VARIABLES DECLARATIONS///////////////////////

require_once(JPATH_SITE."/components/com_os_cck/functions.php");
require_once(JPATH_SITE."/components/com_os_cck/captcha.php");
require_once(JPATH_SITE."/components/com_os_cck/os_cck.html.php");
jimport('joomla.html.pagination');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.application.component.helper');
if(!function_exists("auto_include")){
  function auto_include($path_to_files)
  {
    $component_path = JPath::clean(JPATH_SITE . $path_to_files);
    if (is_dir($component_path) && ($component_layouts = JFolder::files($component_path, '^[^-]*\.php$', false, true))) {
        foreach ($component_layouts as $i => $file) {
            require_once($file);
        }
    }
  }
}

if(!function_exists("auto_include_with_global")){
    function auto_include_with_global($path_to_files)
    {
        $component_path = JPath::clean(JPATH_SITE . $path_to_files);
        if (is_dir($component_path) && ($component_layouts = JFolder::files($component_path, '^[^-]*\.php$', false, true))) {
            foreach ($component_layouts as $i => $file) {
                require($file);
                $file_name = substr($file, strrpos($file, '/')+1);
                $file_name = explode('.', $file_name);
                $pos = strripos($file_name[1], '_');
                $entity_id = substr($file_name[1], $pos+1);
                $GLOBALS['cck_entity_configuration'][$entity_id] = ${"cck_entity_configuration_$entity_id"};
            }
        }
    }
}
auto_include_with_global('/administrator/components/com_os_cck/entities_conf');
auto_include('/components/com_os_cck/php');
auto_include('/components/com_os_cck/html');
auto_include('/components/com_os_cck/classes');
//added animate css
// $doc->addStyleSheet("https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css");
// $doc->addScript("https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js");

$doc->addStylesheet(JUri::root() . "components/com_os_cck/assets/css/front_end_style.css");
if(checkJavaScriptIncludedCCK('jQuerOs-2.2.4.min.js') === false){
    $doc->addScript(JUri::root() . "components/com_os_cck/assets/js/jQuerOs-2.2.4.min.js");
    $doc->addScriptDeclaration('jQuerOs=jQuerOs.noConflict();');
}
if(checkStylesIncludedCCK("jquerOs-ui.min.css") === false ) {
    $doc->addStyleSheet(JURI::root() . "components/com_os_cck/assets/css/jquerOs-ui.min.css");
}
if(checkJavaScriptIncludedCCK("jquerOs-ui.min.js") === false ) {
    $doc->addScript(JURI::root() . "components/com_os_cck/assets/js/jquerOs-ui.min.js");
}
if(checkStylesIncludedCCK("bootstrap.css") === false ) {
    $doc->addStyleSheet(JURI::root() . "components/com_os_cck/assets/bootstrap/css/bootstrap-grid_OS.css");
}
$doc->addScript(JUri::root() . "components/com_os_cck/assets/js/functions.js");
// $id = intval(mosGetParam($_REQUEST, 'id', 0));

//swiper slider js and css
// $doc->addStylesheet(JUri::root() . "components/com_os_cck/assets/css/swiperCCK.css");
// $doc->addScript(JUri::root() . "components/com_os_cck/assets/js/swiperCCK.js");
if(checkStylesIncludedCCK("font-awesome.min.css") === false ) {
  $doc->addStyleSheet("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
}

?>


<?php

//print_r($task); exit;
if($option == "com_os_cck"  || $option == "com_simplemembership") {
  switch ($task) {
    case 'allcategories':
    case 'all_categories':
      Category::listCategories($option, $lid);
    break;

    case 'getISC':
      $jinput = JFactory::getApplication()->input;

      $title = $jinput->getCmd('title','');
      $location = $jinput->getCmd('location','');
      $event_start = $jinput->getCmd('event_start','');
      $event_end = $jinput->getCmd('event_end','');
      $description = $jinput->getCmd('description','');
      $calendarConstruct = new CalendarUrlConstruct($title, $event_start, $event_end, $description, $location);
      $calendarConstruct->get("File","ICS");

    break;

    case 'category':
      Category::showCategory($option, $catid,$lid);
    break;

    case 'user_instances':
        if(isset($_GLOBALS['number_of_plugin'])){
            $number_of_plugin = $_GLOBALS['number_of_plugin'];
        }else{
            $number_of_plugin = FALSE;
        }
      Instance::showUserInstances($option, $lid, 0, $number_of_plugin);
    break;
    
    case 'parent_child':
      Instance::showParentChildLayout($option, $lid, 0);
    break;

    case 'cart':
      Instance::showCartLayout($option, $lid, 0);
    break;

    case 'paypal':
      os_cck_site_controller::paypal();
    break;

    case 'category_with_map':
      Category::showCategory($option, $catid,$lid);
    break;

    case 'instance':
      Instance::showItem($option, array_pop($eiids), $catid, $lid);
    break;

    case 'instance_manager':
        if($user->id){
            Instance::showInstanceManager('add_instance');
        }else{
            JFactory::getApplication()->enqueueMessage(JText::_("COM_OS_CCK_LOGIN_FIRST"), 'error');
        }
    break;

    case 'edit_instance':
      Instance::editInstance($option, array_pop($eiids));
    break;

    case "publish_instances" :
      Instance::publishInstances($eiids, 1, $option);
    break;

    case "unpublish_instances" :
      Instance::publishInstances($eiids, 0, $option);
    break;

    case "getContent":
      require_once(JPATH_SITE . "/components/com_os_cck/uploader.php");
      break;

    case "approve_instances" :
      Instance::approveInstances($eiids, 1, $option);
    break;

    case "unapprove_instances" :
      Instance::approveInstances($eiids, 0, $option);
    break;

    case "show_rent_request_instances":
      Instance::showInstanceManager('rent_request_instance');
    break;

    case "edit_rent" :
        
      // $eiids = $eiids[0];
      InstanceManagerRent::edit_rent($option, array_pop($eiids));
    break;

    case "save_rent" :
      $eiids = $eiids[0];
      InstanceManagerRent::saveRent($option, $eiids ,$task);
    break;

    case "rent_return" :
      $return_ids = protectInjectionWithoutQuote('return_id','','ARRAY');
      InstanceManagerRent::rent_return($option, $return_ids);
    break;

    case "show_user_rent_history" :
      InstanceManagerRent::users_rent_history($option);
    break;

    case "edit_rent_request_instance":
      Instance::editRentRequestInstance($option, array_pop($eiids));
    break;

    case "decline_rent_requests" :
      Instance::decline_rent_requests($option, $eiids);
    break;

    case "accept_rent_requests" :
      Instance::accept_rent_requests($option, $eiids);
    break;

    case "show_buy_request_instances":
      Instance::showInstanceManager('buy_request_instance');
    break;

    case "edit_buy_request_instance":
      Instance::editBuyRequestInstance($option, array_pop($eiids));
    break;

    case "remove_buy_request_instance" :
      Instance::remove_buy_request_instance($eiids, $option);
    break;

    case 'save_instance':
      os_cck_site_controller::saveInstance($option);
      break;

    case 'send_buy_request':
      os_cck_site_controller::send_buy_request($option);
      break;

    case 'all_instance':

      $event_date = (JRequest::getVar('event_date') && JRequest::getVar('event_date') != '')?JRequest::getVar('event_date'):false;
      $event_date_field = (JRequest::getVar('event_date_field') && JRequest::getVar('event_date_field') != '')?JRequest::getVar('event_date_field'):false;

      $menu = new JTableMenu($db);
      $menu->load($Itemid);
      $params = new JRegistry;
      $params->loadString($menu->params);
      $lid = $params->get('all_instance_layout');

      if($event_date && $event_date_field){
        $lid = intval(JRequest::getVar('lid'));
      }

      Instance::show_all_instance($option,$lid);
      break;

    case 'calendar':
      $menu = new JTableMenu($db);
      $menu->load($Itemid);
      $params = new JRegistry;
      $params->loadString($menu->params);

      Instance::show_calendar($option,$params->get('calendar_layout'));
      break;

    case 'add_instance':
      global $params;
      $menu = new JTableMenu($db);
      $menu->load($Itemid);
      $params = new JRegistry;
      $params->loadString($menu->params);
      Instance::show_request_layout($option, $params->get('request_layout'),0);
      break;

    case 'show_request_layout':


      $lid = intval(JRequest::getVar('lid'));

      $eiids = protectInjectionWithoutQuote('eiid','','string');
      Instance::show_request_layout($option, $lid,$eiids);
      break;

    case 'send_rent_request':
      os_cck_site_controller::send_rent_request($option);
      break;
    case 'send_request':
      os_cck_site_controller::send_request($option);
      break;

    case 'send_review_request':
      os_cck_site_controller::send_review_request($option);
      break;

    case 'view':
      Instance::showItem($option, $id, $catid);
      break;
      ///
    case 'show_search':
      Category::showSearch($option, $catid, $lid);
      break;
      ///
    case 'secret_image':
      os_cck_site_controller::secretImageCCK($type);
      break;

    case 'ajax_rent_calcualete':
      $rent_from = trim(protectInjectionWithoutQuote("rent_from",''));
      $rent_until = trim(protectInjectionWithoutQuote("rent_until",''));
      $eiids_ajax_rent = intval(JRequest::getVar("eiid",''));
      $ceid_ajax_rent = intval(JRequest::getVar("ceid",''));
      
      os_cck_site_controller::ajax_rent_calcualete($eiids_ajax_rent,$ceid_ajax_rent,$rent_from,$rent_until);
      break;

    case 'search':

      Instance::search($option, $input->get('categories', array(0), "ARRAY"));
      break;

    case 'checkCaptcha':
      os_cck_site_controller::checkCaptcha();
      break;

    case 'orderitem':
      os_cck_site_controller::orderitem($option);
      break;

    case 'show_rss_categories':
      os_cck_site_controller::listRssCategories();
      break;

    case 'rent_manage':
      rentManage();
      break;

    case 'reload_captcha':
      $jinput = JFactory::getApplication()->input;
      $captchafName = $jinput->getCmd('captchafName');

      $layout_type = $input->get('captcha_type','','STRING');
      $layout = new os_cckLayout($db);
      $layout->load($lid);
      $layout_params = unserialize($layout->params);

      $layout_html = '';
      $field = new stdClass();
      $field->db_field_name = $captchafName; 

      ob_start();
        require getSiteAddFiledViewPath('com_os_cck', 'captcha_field');
        $html = ob_get_contents();
      ob_end_clean();

      $response = array("html" => $html);
      echo json_encode($response);
      break;

    case "checkFile":
        os_cck_site_controller::checkFile($option);
        break;
    
    case "show_request_instances":
      Instance::showInstanceManager('request_instance');
        break;
    
    case "ajaxCalculatedCurrency":
        os_cck_site_controller::ajaxCalculatedCurrency();
        break;
    
    case "ajaxCalculatedPrice":
        os_cck_site_controller::ajaxCalculatedPrice();
        break;

    case 'getChildSelect':
    //init variables
    $db = JFactory::getDbo();
    $session = JFactory::getSession();
    $jinput = JFactory::getApplication()->input;
    
    //get post ajax params
    $parent_field = json_decode($jinput->getRaw('field',false));
    $lid = $jinput->getRaw('lid',false);
    $value = $jinput->getRaw('value',false);
    $current_value = $jinput->getRaw('currentValue', false);
    
    $unique_parent_id = json_decode($jinput->getRaw('unique_parent_id',''));
    
    
    //ger select params
    $params = new JRegistry;
    $params->loadString($parent_field->params);
    //get allowed_values
    $allowed_values = explode('\sprt', $params->get('allowed_value'));
    
    $tmp_values = [];
    foreach ($allowed_values as $value) {
      $tmp_values[] = explode('|', $value)[0];
    }
    $allowed_values = $tmp_values;
    //get child_select
    $child_select = explode('|',$params->get('child_select'));
    //get allowed_values => child_select array
    
    $childs = array_combine($allowed_values,$child_select);
    
    
    if(!isset($childs[$current_value]) || $childs[$current_value] == 0){
      return;
    }

    $child_fid = $childs[$current_value];
    //var_dump($current_value);
    
    $entityInstance = new os_cckEntityInstance($db);
    $entityInstance->load($parent_field->fk_eid);

    $field = $entityInstance->getField($child_fid);
    
    
    $unique_parent_field = $entityInstance->getField($unique_parent_id);
    
    $layout = new os_cckLayout($db);
    $layout->load($lid);
    //get necessary datas
    $layout_params = unserialize($layout->params);
    $bootstrap_version = $session->get( 'bootstrap','2');
    $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);
    $layout_html = urldecode($layout->layout_html);
    
    $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
    $field_styling = get_field_styles($unique_parent_field, $layout);
    $custom_class = get_field_custom_class($unique_parent_field, $layout);
    $offset_animation = get_field_offset_animation($unique_parent_field, $layout);

    $layout_params['field_styling'] = $field_styling;
    $layout_params['custom_class'] = $custom_class;
    $layout_params['offset_animation'] = $offset_animation;
    $layout_params['custom_fields'] = unserialize($layout->custom_fields);
    $layout_params['fields']['Params_text_select_list_'.$child_fid] = $layout_params['fields']['Params_text_select_list_'.$unique_parent_id];
//

    // print_r($custom_class);
    // exit;

    if($layout->type == 'search'){
      require getSiteSearchFiledViewPath('com_os_cck', $field->field_type);
    }else{
      require getSiteAddFiledViewPath('com_os_cck', $field->field_type);
    }
    
    break;
    
    case "addInstanceToCart":
        os_cck_site_controller::addInstanceToCart();
        break;
    
    case "removeProductFromCart":
        os_cck_site_controller::removeProductFromCart();
        break;
    
    case "getAjaxPriceDetails":
        os_cck_site_controller::getAjaxPriceDetails();
        break;
    
    case "changeCurrency":
        os_cck_site_controller::changeCurrency();
        break;
    
    case "ajaxCheckCoupon":
        os_cck_site_controller::ajaxCheckCoupon();
        break;
        
    case "fileDownload":
        os_cck_site_controller::fileDownload();
        break;

    case "home_page":
        break;


    default:
//		Category::listCategories($catid);
      break;
  }
}

