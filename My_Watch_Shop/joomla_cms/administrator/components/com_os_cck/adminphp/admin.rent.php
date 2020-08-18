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

class AdminRent{

  static function edit_rent($option, $eiid){
    global $db, $user;
    $session = JFactory::getSession();;
    if (!is_array($eiid) || count($eiid) < 1) {
      echo "<script> alert('Select an item to rent'); window.history.go(-1);</script>\n";
      exit;
    }


    $eiids = implode(',', $eiid);
    $select="SELECT a.*, cc.name AS category, l.id as rent_id, cl.params as lay_params,ce.name AS entity, l.rent_from as rent_from, " .
        "\n l.rent_return as rent_return, l.rent_until as rent_until, " .
        "\n l.user_name as user_name, l.user_email as user_email, " .
        "\n cc.rent_request AS for_rent" .
        "\n FROM #__os_cck_entity_instance AS a" .
        "\n LEFT JOIN #__os_cck_categories_connect AS CC_rel ON CC_rel.fk_eiid = a.eiid" .
        "\n LEFT JOIN #__os_cck_categories AS cc ON cc.cid = CC_rel.fk_cid" .
        "\n LEFT JOIN #__os_cck_layout AS cl ON cl.lid = a.fk_lid ".
        "\n LEFT JOIN #__os_cck_entity AS ce ON ce.eid = a.fk_eid ".
        "\n LEFT JOIN #__os_cck_rent AS l ON l.fk_eiid = a.eiid" .
        "\n WHERE a.eiid in (" . $eiids . ") GROUP BY rent_id ORDER BY l.id DESC";
    $db->setQuery($select);
    if (!$db->query()) {
      echo "<script> alert('" . addslashes($db->getErrorMsg()) . "'); window.history.go(-1); </script>\n";
      exit ();
    }
    $rows = $db->loadObjectList();
    $show_fields = $entityEaaray = array();
    if(count($rows)>0){
      foreach ($rows as $row) {
        if($row->rent_return){
          $history_item[] = $row;
        }else if($row->rent_until){
          $return_item[] = $row;
        }
        $lay_params = unserialize($row->lay_params);
        $entityEaaray[] = $row->fk_eid;
        $layoutArray[] = $row->fk_lid;
      }
      foreach(array_unique($entityEaaray) as $key => $value){
        $entity = new os_cckEntity($db);
        $entity->load($value);
        $layout = new os_cckLayout($db);
        $layout->load($layoutArray[$key]);
        $bootstrap_version = $session->get( 'bootstrap','2');
        $layout_html = urldecode($layout->getLayoutHtml($bootstrap_version));
        $layout_params = unserialize($layout->params);
        $extra_fields_list = $entity->getFieldList();

        
        foreach($extra_fields_list as $Fieldvalue){
                  
          if($Fieldvalue->show_in_instance_menu && strpos($layout_html,"{|f-".$Fieldvalue->fid."|}")){
            $fieldNames[$key]['ent_name'] = $entity->eid;
            $fieldNames[$key]['field_type'] = $Fieldvalue->field_type;
            $fieldNames[$key]['fields'][] = $Fieldvalue->db_field_name;//need for use in search // [][table_name][column_mname]
            $show_fields[$value][]= $Fieldvalue;
          }
        }
      }
      ksort($show_fields);
    }
    //for rent or not
    $count = count($rows);
    // get list of categories
    $userlist[] = JHTML::_('select.option','-1', 'Select User');
    $db->setQuery("SELECT id AS value, name AS text from #__users ORDER BY name");
    $userlist = array_merge($userlist, $db->loadObjectList());
    $usermenu = JHTML::_('select.genericlist',$userlist, 'userid',
                         'class="inputbox" size="1"', 'value', 'text', '-1');


    AdminViewRent::showRentItems($option, $rows,$return_item,$history_item, $usermenu, "rent",$show_fields);
  }


  static function rent_return($option, $lids){
    global $db, $app;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    if (!is_array($lids) || count($lids) < 1 || $lids[0] == 0) {
      echo "<script> alert('Select an item to return'); window.history.go(-1);</script>\n";
      exit;
    }
    for ($i = 0, $n = count($lids); $i < $n; $i++) {
      $rent = new mosCCK_rent($db);
      $rent->load($lids[$i]);
      if ($rent->rent_return != null) {
        echo "<script> alert('Item already returned'); window.history.go(-1);</script>\n";
        exit;
      }
      $rent->rent_return = date("Y-m-d H:i:s");
      if (!$rent->store()) {
        echo "<script> alert('" . addslashes($rent->getError()) . "'); window.history.go(-1); </script>\n";
        exit ();
      }
    }
    $app->redirect("index.php?option=$option&task=show_instance",'ok');
  }

  static function saveRent($option, $eiid,$task = ""){

    global $db, $app, $os_cck_configuration;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $rent_id = JRequest::getVar("return_id", '');
    $itemid = JRequest::getVar('itemid','');
    
    if($task == 'save_edit_rent'){
       if (!is_array($rent_id) || count($rent_id) <> 1 || $rent_id[0] == 0) {
        echo "<script> alert('Select an item to return'); window.history.go(-1);</script>\n";
        exit;
      }
    }

    if ($eiid == "" ) {
      echo "<script> alert('Select an item to rent'); window.history.go(-1);</script>\n";
      exit;
    }
    
    $query = "SELECT * FROM #__os_cck_rent where fk_eiid= " . $eiid . " AND rent_return is NULL ";
    $db->setQuery($query);
    $rentTerm = $db->loadObjectList();
    $rent = new mosCCK_rent($db);
    if ($task == "save_edit_rent" && isset($rent_id[0]))
      $rent->load($rent_id[0]);
    $rent->rent_from = $rent_from = date("Y-m-d H:i:s", strtotime(JRequest::getVar('rent_from','')));
    $rent->rent_until = $rent_until =date("Y-m-d H:i:s", strtotime(JRequest::getVar( 'rent_until','')));
    if (empty($rent_until) || strlen($rent_until) < 2) $rent_until = JRequest::getVar('rent_until','');
    if($os_cck_configuration->get('rent_type') == 2){ 
        foreach ($rentTerm as $oneTerm){
                $returnMessage = checkRentCCK (($oneTerm->rent_from),($oneTerm->rent_until),
                 $rent_from, $rent_until);
                if(strlen($returnMessage) > 0){
                  echo "<script> alert('$returnMessage'); window.history.go(-1); </script>\n";
                  exit;
                }
              }
    } else {
        foreach ($rentTerm as $oneTerm){
                $oneTerm->rent_from = substr($oneTerm->rent_from, 0, 10);
                $oneTerm->rent_until = substr($oneTerm->rent_until, 0, 10);
                $returnMessage = checkRentCCK (($oneTerm->rent_from),($oneTerm->rent_until),
                 substr($rent_from, 0 , 10), substr($rent_until, 0 , 10));

                if(strlen($returnMessage) > 0){
                  echo "<script> alert('$returnMessage'); window.history.go(-1); </script>\n";
                  exit;
                }
              }
    }
          //var_dump($itemid); exit;
    if ($rent_from > $rent_until) {
      echo "<script> alert('" . $rent_from . " more then " . $rent_until . "'); window.history.go(-1); </script>\n";
      exit ();
    }
    // $rent_from = substr($rent_from, 0, 10);
    // $rent_until = substr($rent_until, 0, 10);
    
    if (isset($rentTerm[0]) ) {
      for ($e = 0, $m = count($rentTerm); $e < $m; $e++) {
        if ($task == "save_edit_rent" && isset($rent_id[0]) && $rent_id[0] == $rentTerm[$e]->id)
          continue;
        // $rentTerm[$e]->rent_from = substr($rentTerm[$e]->rent_from, 0, 10);
        // $rentTerm[$e]->rent_until = substr($rentTerm[$e]->rent_until, 0, 10);
        
        //rent check
        if($os_cck_configuration->get('rent_type') == 2){    //by day

          if (($rent_from >= $rentTerm[$e]->rent_from && $rent_from < $rentTerm[$e]->rent_until) || 
          ($rent_from <= $rentTerm[$e]->rent_from && $rent_until >= $rentTerm[$e]->rent_until) || 
          ($rent_until > $rentTerm[$e]->rent_from && $rent_until <= $rentTerm[$e]->rent_until)) {
            echo "<script> alert('Sorry , this object already rent out from " . $rentTerm[$e]->rent_from . " to " . $rentTerm[$e]->rent_until . "'); window.history.go(-1); </script>\n";
            exit ();
          }

        }elseif($os_cck_configuration->get('rent_type')){

           $rent_from = date('Y-m-d',strtotime($rent_from));
          $rent_until = date('Y-m-d',strtotime($rent_until));
          $rentTerm[$e]->rent_from = date('Y-m-d',strtotime($rentTerm[$e]->rent_from));
          $rentTerm[$e]->rent_until = date('Y-m-d',strtotime($rentTerm[$e]->rent_until));

          if (($rent_from >= $rentTerm[$e]->rent_from && $rent_from <= $rentTerm[$e]->rent_until) || 
          ($rent_from <= $rentTerm[$e]->rent_from && $rent_until >= $rentTerm[$e]->rent_until) || 
          ($rent_until >= $rentTerm[$e]->rent_from && $rent_until <= $rentTerm[$e]->rent_until)) {
            echo "<script> alert('Sorry , this object already rent out from " . $rentTerm[$e]->rent_from . " to " . $rentTerm[$e]->rent_until . "'); window.history.go(-1); </script>\n";
            exit ();
          }

        }else{  //by night

          $rent_from = date('Y-m-d',strtotime($rent_from));
          $rent_until = date('Y-m-d',strtotime($rent_until));
          $rentTerm[$e]->rent_from = date('Y-m-d',strtotime($rentTerm[$e]->rent_from));
          $rentTerm[$e]->rent_until = date('Y-m-d',strtotime($rentTerm[$e]->rent_until));
            
          if (($rent_from > $rentTerm[$e]->rent_from && $rent_from < $rentTerm[$e]->rent_until) || 
          ($rent_from < $rentTerm[$e]->rent_from && $rent_until > $rentTerm[$e]->rent_until) || 
          ($rent_until > $rentTerm[$e]->rent_from && $rent_until < $rentTerm[$e]->rent_until)) {
            echo "<script> alert('Sorry , this object already rent out from " . $rentTerm[$e]->rent_from . " to " . $rentTerm[$e]->rent_until . "'); window.history.go(-1); </script>\n";
            exit ();
          }

        }

      }
    }
    $rent->fk_eiid = JRequest::getVar('eiid','');
    $userid = JRequest::getVar('userid','');
    if ($userid == "-1") {
      $rent->user_name = JRequest::getVar('user_name', '');
      $rent->user_email = JRequest::getVar('user_email', '');
    }else{
      $rent->fk_userid = intval($userid);
      $query = "SELECT name, email FROM #__users WHERE id=$userid";
      $db->setQuery($query);
      $user = $db->loadObjectList();
      $rent->user_name = $user[0]->name;
      $rent->user_email = $user[0]->email;
    }
    $rent->fk_eiid = $eiid;
    if (!$rent->check($rent)) {
      echo "<script> alert('" . addslashes($rent->getError()) . "'); window.history.go(-1); </script>\n";
      exit ();
    }
    if (!$rent->store()) {
      echo "<script> alert('" . addslashes($rent->getError()) . "'); window.history.go(-1); </script>\n";
      exit ();
    }
    $rent->checkin();

    $app->redirect("index.php?option=$option&task=show_instance",'ok');
  }

}
