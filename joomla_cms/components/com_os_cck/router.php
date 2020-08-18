<?php

/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/
defined('_JEXEC') or die;
use Joomla\CMS\Component\Router\RouterBase;

$mosConfig_absolute_path = $GLOBALS['mosConfig_absolute_path'] = JPATH_SITE;
require_once($mosConfig_absolute_path . "/components/com_os_cck/classes/instance.class.php");
require_once($mosConfig_absolute_path . "/components/com_os_cck/classes/entity.class.php");
require_once($mosConfig_absolute_path . "/components/com_os_cck/classes/layout.class.php");

class Os_cckRouter extends RouterBase
{
    public function build(&$query)
    {
        
        $segments = array();
        $session = JFactory::getSession();
        $db = JFactory::getDBO();
        
        if(isset($query['task'])){
            $query['view'] = $query['task'];
        }
        
        if(isset($query['view'])){
             switch($query['view']){
               case "instance":
               case "parent_child":
               case "show_request_layout":
                   if(isset($query['catid']) && $query['catid'] > 0){
                       $sql = "SELECT name FROM #__os_cck_categories WHERE cid=" . $query['catid'];
                       $db->setQuery($sql);
                       $cat_name = $db->loadResult();

                       $cat_name = JFilterOutput::stringURLSafe(str_replace(' ', '_', $cat_name));
                       $segments[] = $query['catid'] . '-' .$cat_name;
                       unset($query['catid']);
                   }elseif(isset($query['catid'])){
                       unset($query['catid']);
                   }
                   if(isset($query['eiid'])){
                       if(is_array($query['eiid'])){
                           $eiid = $query['eiid'][0];
                       }else{
                           $eiid = $query['eiid'];
                       }
                       $entityInstanse = new os_cckEntityInstance($db);
                       $entityInstanse->load($eiid);
                       $fk_eid = $entityInstanse->fk_eid;

                       if(isset($query['lid'])){
                           $lid = $query['lid'];
                       }
                       if(isset($lid) && isset($fk_eid)){

                          //get params
                          $sql = "SELECT params FROM #__os_cck_layout
                                   \nWHERE lid =".intval($lid);

                          $db->setQuery($sql);
                          $params = $db->loadResult();
                          $params = unserialize($params);

                          //get all fields
                          $sql =  "SHOW columns FROM #__os_cck_content_entity_" . $fk_eid;
                          $db->setQuery($sql);
                          $cols = $db->loadColumn();


                          //search Title field if exists
                          for($i=0;$i<count($cols);$i++){
                            if(isset($params['fields'][$cols[$i].'_title_field']) && $params['fields'][$cols[$i].'_title_field'] == 1){
                                $title_field = $cols[$i];
                            }
                          }

                          if(empty($title_field)){
                            $segments[]=$eiid . ':' . $lid;
                            unset($query['eiid']);
                          }else{

                            $sql = "SELECT fk_eiid AS id, ".$title_field." AS title_field FROM #__os_cck_content_entity_".$fk_eid."

                                     \nWHERE fk_eiid=".intval($entityInstanse->eiid);
                            $db->setQuery($sql);
                            $row = $db->loadObject();

                            if(isset($row) && $row) {
                              $segments[] = JFilterOutput::stringURLSafe(str_replace(array(' ', ':'), '_', $row->title_field)). ':'. $row->id . ':' . $lid;
                              unset($query['eiid']);
                            }
                          }
                        }else{
                          $segments[]=$entityInstanse->eiid;
                          unset($query['eiid']);
                        }

                        unset($query['lid']);
                   }
                   unset($query['view']);
                   if(isset($query['task'])){
                       unset($query['task']);
                   }
                   
               break;

               case "category":
                   if(isset($query['catid']) && isset($query['lid'])){
                       $sql = "SELECT name FROM #__os_cck_categories WHERE cid=" . intval($query['catid']);
                       $db->setQuery($sql);
                       $cat_name = $db->loadResult();

                       $cat_name = JFilterOutput::stringURLSafe(str_replace(array(' ', ':'), '_', $cat_name));
                       $segments[] = $query['lid'] . ':' . $query['catid'] . ':' .$cat_name;
                       unset($query['catid']);
                       unset($query['view']);
                       unset($query['lid']);
                   }
                   break;
               case "all_categories":
                   unset($query['view']);
                   break;
               case "show_search":
                   if(isset($query['lid'])){
                    $segments[] = 'show_search:' . $query['lid'];
                   }
                   if(isset($query['view'])){
                    unset($query['view']);
                   }
                   if(isset($query['lid'])){
                    unset($query['lid']);
                   }
                   if(isset($query['task'])){
                    unset($query['task']);
                   }
                   break;
               case "search":
                   $segments[] = 'search:' . $query['lid'];
                   unset($query['view']);
                   unset($query['lid']);
                   unset($query['task']);
                   //unset($query['option']);
                   break;

             }
           }
//           foreach ($segments as $key => $value) {
//             $segments[$key] = str_replace("'", "", $value);
//           }
        return $segments;
    }
    
    public function parse(&$segments)
    {
        //var_dump($segments);
        $vars = array();
        $db = JFactory::getDBO();
        $vars['option'] = 'com_os_cck';
         $app    = JFactory::getApplication();
         $menu   = $app->getMenu();
         $count = count($segments);
         $parse_var = $segments[$count-1];
         $lid = substr($parse_var, strripos($parse_var, ':')+1);
         
         if(intval($lid) == 0){
             $lid = substr($parse_var, 0, stripos($parse_var, ':'));
         }elseif(preg_match('/\D/', $lid) == 1){
             $lid = substr($parse_var, strripos($parse_var, ':')+1);
             $non_title = true;
         }
         //var_dump(preg_match('/[\D:]+/', $parse_var));
         if(preg_match('/[a-zA-Z]+/', $parse_var) == 0){
             $non_title = true;
         }
         

         $layout = new os_cckLayout($db);
         $layout->load($lid);
         //var_dump($layout);
         
        if($layout->type == 'instance' || $layout->type == 'parent_child'
                 || $layout->type == 'request_instance' || $layout->type == 'review_instance'){
             $vars['view'] = $layout->type;
             if($layout->type == 'request_instance' || $layout->type == 'review_instance'){
                 $vars['view'] = 'show_request_layout';
             }
//             $end_crop = strlen($parse_var) - strripos($parse_var, ':') - 1;
//             $vars['eiid'] = substr($parse_var, stripos($parse_var, ':')+1, $end_crop);
             $end_crop = strlen($parse_var) - strripos($parse_var, ':');
             $substring = substr($parse_var, stripos($parse_var, ':')+1);
             $vars['eiid'] = substr($substring, 0, stripos($substring, ':'));
             if(isset($non_title) && $non_title == true){
                 $vars['eiid'] = substr($parse_var, 0, stripos($parse_var, ':'));
             }
             
             $vars['lid']   = $lid;

         }elseif ($layout->type == 'category') {
             $vars['view'] = $layout->type;
             $end_crop = stripos($parse_var, '-') - stripos($parse_var, ':')-1;
             $vars['catid'] = substr($parse_var, stripos($parse_var, ':')+1, $end_crop);
             $vars['lid']   = $lid;

        }elseif ($layout->type == 'search') {
            $vars['view'] = 'show_search';
            $vars['task'] = 'search';
            $vars['lid']   = $lid;
        }
        return $vars;
    }
}


function os_cckBuildRoute(&$query) {
//echo"1111111start os_cckBuildRoute";
//print_r($query);echo"<br>";
//    
    $app = JFactory::getApplication();
    $router = new Os_cckRouter($app, $app->getMenu());

    return $router->build($query);

//echo ":111111 end os_cckBuildRoute";
//print_r($query);echo"<br>";

    return $segments;
}

/**
 * Parse the segments of a URL.
 *
 */
function os_cckParseRoute($segments) {
//echo"22222 start os_cckParseRoute";
// print_r($segments);echo"<br>";
//    
    $app = JFactory::getApplication();
    $router = new Os_cckRouter($app, $app->getMenu());

    return $router->parse($segments);
     
//echo"22222 start os_cckParseRoute";
//print_r($query);echo"<br>";

    return $vars;
}
