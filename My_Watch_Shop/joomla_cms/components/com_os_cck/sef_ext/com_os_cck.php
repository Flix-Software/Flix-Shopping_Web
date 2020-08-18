<?php
/**
 * sh404SEF support for com_os_cck component.
 * @copyright 2017 OrdaSoft
 * @author 2017 Sergey Buchastiy-OrdaSoft(buchastiy1989@gmail.com)
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * 
 */

if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );

// ------------------  standard plugin initialize function - don't change ---------------------------
$shLangName = '';
$shLangIso = '';
$title = array();
$shItemidString = '';
$dosef = shInitializePlugin( $lang, $shLangName, $shLangIso, $option);
// ------------------  standard plugin initialize function - don't change ---------------------------

// $database is directly needed by some functions, so we need to create it here. 
$GLOBALS['database'] = $database = JFactory::getDBO();
global $database;

// remove common URL from GET vars list, so that they don't show up as query string in the URL

shRemoveFromGETVarsList('option');
shRemoveFromGETVarsList('lang');
if (!empty($Itemid))
  shRemoveFromGETVarsList('Itemid');
if (!empty($limit))  
  shRemoveFromGETVarsList('limit');
if (isset($limitstart)) 
  shRemoveFromGETVarsList('limitstart'); // limitstart can be zero

// echo $lid;

if($option == 'com_os_cck') {

  // $title[] = 'OS_CCK';
  if ( (!isset($task) OR $task == '' ) AND  isset($view)  ) $task = $view;

  if(isset($task)) {

    switch($task) {
      case 'edit_instance':
      $title[] = 'add_instance';
      shRemoveFromGETVarsList($task);
      break;

      case 'edit_instance':
      case 'category':
      case 'add_instance':
      case 'instance_manager':
      case 'show_search':
      case 'all_categories':  
      case 'instance':
      case 'all_instance':    
      case 'parent_child': 
      case 'user_instances':
        shRemoveFromGETVarsList($task);
        break;

      default:
        $title[] = $task;
        break;
    }

    shRemoveFromGETVarsList('task');
    shRemoveFromGETVarsList('layout');
    shRemoveFromGETVarsList('view');
    shRemoveFromGETVarsList('letindex');
    shRemoveFromGETVarsList('name');

  }

  // add active menu name
  $title[] = getMenuTitle($option, (isset($task) ? @$task : null), ((isset($Itemid))?$Itemid:""), null, $shLangName ); 
   
  // To get name of layout
  if(isset($lid)){
    $query = "SELECT title FROM #__os_cck_layout
               \nWHERE lid =".intval($lid);

      $database->setQuery($query);
      $fk_eid = $database->loadResult();

      $title[] = $fk_eid;
      shRemoveFromGETVarsList('lid');
  }
 

  // To get name of category
  if(isset($catid)) {
      if($catid>0) {
        $query = "SELECT c.cid, c.title, c.parent_id FROM #__os_cck_categories AS c
                 \nWHERE c.cid = ".intval($catid);

        $database->setQuery($query);
        $row = null;
        $row = $database->loadObject();

        if(isset($row)) {
          $cattitle = array();
          $cattitle[] = $row->cid. '_' .$row->title;
          shRemoveFromGETVarsList('catid');
       
          while(isset($row) && $row->parent_id>0) {
            $query = "SELECT  c.title, c.cid AS catid, parent_id 
                      FROM #__os_cck_categories AS c
                      WHERE c.cid = ".intval($row->parent_id);
          
            $database->setQuery($query);
            $row = $database->loadObject();

            if(isset($row) && $row->title!=''){
              $cattitle[] = $row->title;
            }
          }
          $title = array_merge($title,array_reverse($cattitle));
       
        }
      } else {
            shRemoveFromGETVarsList('catid');
      }


  }

  // To get Name of the houses


  if(isset($eiid[0])) {

      //if exists title or not exist
      $query = "SELECT fk_eid FROM #__os_cck_entity_instance
               \nWHERE eiid =".intval($eiid[0]);

      $database->setQuery($query);
      $fk_eid = $database->loadResult();


      if(isset($lid) && isset($fk_eid)){

      //get params
      $query = "SELECT params FROM #__os_cck_layout
               \nWHERE lid =".intval($lid);

      $database->setQuery($query);
      $params = $database->loadResult();
      $params = unserialize($params);

      //get all fields
      $query =  "SHOW columns FROM #__os_cck_content_entity_" . $fk_eid;
      $database->setQuery($query);
      $cols = $database->loadColumn();


      //search Title field if exists
      for($i=0;$i<count($cols);$i++){
        if(isset($params['fields'][$cols[$i].'_title_field']) && $params['fields'][$cols[$i].'_title_field'] == 1){
            $title_field = $cols[$i];
        }
      }

      if(empty($title_field)){
        $title[]=$eiid[0];
        shRemoveFromGETVarsList('eiid');
      }else{
   
        $query = "SELECT fk_eiid AS id, ".$title_field." AS title_field FROM #__os_cck_content_entity_".$fk_eid."
                
                 \nWHERE fk_eiid=".intval($eiid[0]);
        $database->setQuery($query);
        $row = $database->loadObject();

        if(isset($row) && $row) {
          $title[] = $row->id. '_' .$row->title_field;
          shRemoveFromGETVarsList('eiid');
        }
      }
    }else{
      $title[]=$eiid[0];
      shRemoveFromGETVarsList('eiid');
    }
  }

}

if(isset($Itemid)) {
      shRemoveFromGETVarsList('Itemid');
}
// ------------------  standard plugin finalize function - don't change ---------------------------  

if ($dosef){
   $string = shFinalizePlugin( $string, $title, $shAppendString, $shItemidString, 
      (isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null), 
      (isset($shLangName) ? @$shLangName : null));
}      
// ------------------  standard plugin finalize function - don't change ---------------------------
?>
