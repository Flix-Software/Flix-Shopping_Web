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

class AdminBuy_request{
  static function showBuyRequestInstances($option){
    global $db, $app, $jConf;
    JHtml::_('behavior.framework', true);
    // SORTING parameters start
    $item_session = JFactory::getSession();
    $item_sort_param = mosGetParam($_GET, 'sort', 'jei.eiid');
    if (is_array($sort_arr = $item_session->get('eq_itemsort', ''))) {
      if(JRequest::getVar('sorting_direction','')){
        if(JRequest::getVar('sorting_direction')=="ASC"){
          $sort_arr['sorting_direction'] = "DESC";
        }else{
          $sort_arr['sorting_direction'] = "ASC";
        }
      }elseif($item_session->get('sorting_direction','')){ 
        $sort_arr['sorting_direction'] = $item_session->get('sorting_direction');
      }else{
        $sort_arr['sorting_direction']="ASC";
      }
      if ($item_sort_param == $sort_arr['field']) {
      } else {
        $sort_arr['field'] = $item_sort_param;
      }
      if($item_sort_param == 'category'){
        $sort_string = 'c.fk_cid' . " " . $sort_arr['sorting_direction'];
      }else if($item_sort_param == 'inst_entity'){
        $sort_string = 'jei.fk_eid' . " " . $sort_arr['sorting_direction'];
      }else if($item_sort_param == 'inst_id'){
        $sort_string = 'jei.eiid' . " " . $sort_arr['sorting_direction'];
      }else{
        $sort_string = $sort_arr['field'] . " " . $sort_arr['sorting_direction'];
      }
    } else {
      $sort_arr = array();
      if(JRequest::getVar('sorting_direction','')){
        $sort_arr['sorting_direction'] = JRequest::getVar('sorting_direction');
      }elseif($item_session->get('sorting_direction','')){ 
        $sort_arr['sorting_direction'] = $item_session->get('sorting_direction');
      }else{
        $sort_arr['sorting_direction']="ASC";
      }
      if($item_sort_param == 'category'){
        $sort_string = 'c.fk_cid'. " " . $sort_arr['sorting_direction'];
      }else if($item_sort_param == 'inst_entity'){
        $sort_string = 'jei.fk_eid'. " " . $sort_arr['sorting_direction'];
      }else if($item_sort_param == 'inst_id'){
        $sort_string = 'jei.eiid'. " " . $sort_arr['sorting_direction'];
      }else{
        $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
      }
      $sort_arr['field'] = $item_sort_param;
    }
    $item_session->set('eq_itemsort', $sort_arr);

    //maybe it is search below
    $limit = $app->getUserStateFromRequest("viewlistlimit", 'limit', $jConf->get("list_limit",10));
    $limitstart = $app->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0);
    $catid = $app->getUserStateFromRequest("catid{$option}", 'catid', '');
    $pub = $app->getUserStateFromRequest("pub{$option}", 'pub', '');
    $search = $app->getUserStateFromRequest("search{$option}", 'search', '');
    $entity_id = $app->getUserStateFromRequest("entity_id{$option}", 'entity_id', '');
    $entities = array();
    $entities[] = array('value' => '', 'text' => 'All entities');
    // $query = "SELECT ent.eid AS value, ent.name AS text FROM #__os_cck_entity as ent"
    //           ."\n LEFT JOIN #__os_cck_layout as lay ON lay.fk_eid = ent.eid WHERE lay.type = 'buy_request_instance'";
    $query = "SELECT eid AS value, name AS text FROM #__os_cck_entity ORDER BY name ";
    $db->setQuery($query);
    $ent = $db->loadObjectList();
    $entities = (count($ent) > 1) ? array_merge($entities, (array)$ent) : $entities;
    $entity_list = JHTML::_('select.genericlist',$entities, 'entity_id', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $entity_id);
    $where = $where2 = array();
    $catwhere = "";
    if ($entity_id != '' && isset($ent[$entity_id])) {
        array_push($where, "jei.fk_eid ='{$entity_id}'");
    }
    if ($pub == "pub") {
      array_push($where, "jei.published = 1");
    } else if ($pub == "not_pub") {
      array_push($where, "jei.published = 0");
    }
    if ($catid > 0) {
      array_push($where, "c.fk_cid='$catid'");
    }
    array_push($where, "cl.type = 'buy_request_instance'");
    //pagination?*
    $selectstring = "SELECT count(jei.eiid) " .
      "\nFROM #__os_cck_entity_instance AS jei" .
      "\nLEFT JOIN #__os_cck_categories_connect AS c ON jei.eiid=c.fk_eiid " .
      "\nLEFT JOIN #__os_cck_categories AS cc ON cc.cid = c.fk_cid " .
      "\nLEFT JOIN #__os_cck_entity AS ce ON ce.eid = jei.fk_eid ";

    if($search || JRequest::getVar('sort','')){
      $fieldNames = $item_session->get('field_names');
      foreach ($fieldNames as $value) {
        foreach ($value['fields'] as $name) {
          if($value['field_type'] == 'categoryfield' && $name == JRequest::getVar('sort','')){
            $sort_string = 'cc.title'. " " . $sort_arr['sorting_direction'];
            continue;
          }
          array_push($where2, '#__os_cck_content_entity_'.$value['ent_name'].'.'.$name." LIKE '%$search%' ");
        }
        $selectstring .= "\nLEFT JOIN #__os_cck_content_entity_".$value['ent_name']." ON #__os_cck_content_entity_".$value['ent_name'].".fk_eiid = jei.eiid ";
      }
      array_push($where2, "jei.eiid LIKE '%$search%' ");
    }

    $selectstring .=  "\nLEFT JOIN #__os_cck_layout AS cl ON cl.lid = jei.fk_lid ".
      "\nLEFT JOIN #__os_cck_rent AS l ON l.fk_eiid = jei.eiid  and l.rent_return is null " .
      "\nLEFT JOIN #__users AS u ON u.id = jei.checked_out " .
      (count($where) ? "\nWHERE " . implode(' AND ', $where) : "");

    if($search){
      $selectstring .=  (count($where2) ? "\nAND (" . implode(' OR ', $where2).')' : "");
    }
    $db->setQuery($selectstring);

    $total = $db->loadResult();
    echo $db->getErrorMsg();
    $pageNav = new JPagination($total, $limitstart, $limit);

    $selectstring = "SELECT jei.*, cl.title as lay_title, cl.type as lay_type, cl.params as lay_params, GROUP_CONCAT(DISTINCT cc.title SEPARATOR ', ') AS category, ce.name AS entity, " .
      "\nl.id as rentid, l.rent_from as rent_from, l.rent_return as rent_return,l.rent_until as rent_until,u.name AS editor " .
      "\nFROM #__os_cck_entity_instance AS jei" .
      "\nLEFT JOIN #__os_cck_categories_connect AS c ON jei.eiid=c.fk_eiid " .
      "\nLEFT JOIN #__os_cck_categories AS cc ON cc.cid = c.fk_cid " .
      "\nLEFT JOIN #__os_cck_entity AS ce ON ce.eid = jei.fk_eid ";

      if($search || JRequest::getVar('sort','')){
        $fieldNames = $item_session->get('field_names');
        foreach ($fieldNames as $value) {
          foreach ($value['fields'] as $name) {
            if($value['field_type'] == 'categoryfield' && $name == JRequest::getVar('sort','')){
              $sort_string = 'cc.title'. " " . $sort_arr['sorting_direction'];
              continue;
            }
            array_push($where2, '#__os_cck_content_entity_'.$value['ent_name'].'.'.$name." LIKE '%$search%' ");
          }
          $selectstring .= "\nLEFT JOIN #__os_cck_content_entity_".$value['ent_name']." ON #__os_cck_content_entity_".$value['ent_name'].".fk_eiid = jei.eiid ";
        }
        array_push($where2, "jei.eiid LIKE '%$search%' ");
      }

    $selectstring .= "\nLEFT JOIN #__os_cck_layout AS cl ON cl.lid = jei.fk_lid ".
      "\nLEFT JOIN #__os_cck_rent AS l ON l.fk_eiid = jei.eiid  and l.rent_return is null " .
      "\nLEFT JOIN #__users AS u ON u.id = jei.checked_out " .
      (count($where) ? "\nWHERE " . implode(' AND ', $where) : "");

    if($search){
      $selectstring .=  (count($where2) ? "\nAND (" . implode(' OR ', $where2).')' : "");
    }
    
    $selectstring .= "\n GROUP BY jei.eiid " .
      "\nORDER BY jei.notreaded desc,$sort_string " .
      "\nLIMIT $pageNav->limitstart,$pageNav->limit;";
    $db->setQuery($selectstring);

    $rows = $db->loadObjectList();

    if ($db->getErrorNum()) {
      echo $db->stderr();
      return false;
    }
    $show_fields = $fieldNames = $entityEaaray = array();
    if(count($rows)>0){
      $date = strtotime(JFactory::getDate()->toSql());
      foreach ($rows as $row) {
        $check = strtotime($row->checked_out_time);
        $remain = 7200 - ($date - $check);
        if (($remain <= 0) && ($row->checked_out != 0)) {
            $db->setQuery("UPDATE #__os_cck_entity_instance SET checked_out=0,checked_out_time=0");
            $db->query();
            $row->checked_out = 0;
            $row->checked_out_time = 0;
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
        $bootstrap_version = $item_session->get( 'bootstrap','2');
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
    $item_session->set('field_names', $fieldNames);
    $categories[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_LABEL_SELECT_CATEGORIES'),'value','text');
    //************* begin add for sub category in select in manager houses  *************
    $options = $categories;
    $id = 0;
    $fromSearch=0;
    $list = CAT_Utils::categoryArray('com_os_cck',$fromSearch);
    $cat = new os_cckCategory($db);
    $cat->load($id);

    $this_treename = '';
    foreach ($list as $item) {
      if ($this_treename) {
          if ($item->cid != $cat->cid && strpos($item->title, $this_treename) === false) {
              $options[] = JHTML::_('select.option',$item->cid, $item->title,'value','text');
          }
      } else {
          if ($item->cid != $cat->cid) {
              $options[] = JHTML::_('select.option',$item->cid, $item->title,'value','text');
          } else {
              $this_treename = "$item->title/";
          }
      }
    }
    // print_r($list);exit;
    $clist = JHTML::_('select.genericlist',$options, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $catid); //new nik edit
    $pubmenu[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_LABEL_SELECT_TO_PUBLIC'),'value','text');
    $pubmenu[] = JHTML::_('select.option','not_pub', JText::_('COM_OS_CCK_LABEL_SELECT_NOT_PUBLIC'),'value','text');
    $pubmenu[] = JHTML::_('select.option','pub', JText::_('COM_OS_CCK_LABEL_SELECT_PUBLIC'),'value','text');
    $publist = JHTML::_('select.genericlist',$pubmenu, 'pub', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $pub);

    AdminViewBuy_request :: showBuyRequestInstances($option, $rows, $clist, $publist, $search, $pageNav, $sort_arr, $show_fields, $entity_list);
  }

  static function editBuyRequestInstance($option, $eiid, $parent_price_fields = ''){
    global $db, $my,$app;
    JHtml::_('behavior.framework', true);
    $entityInstance = new os_cckEntityInstance($db);
    $entityInstance->load(intval($eiid));
    if(!$entityInstance->eiid){
      return;
    }
    if(intval($eiid)){
      $query="UPDATE #__os_cck_entity_instance SET notreaded=0 WHERE eiid=".intval($eiid);
      $db->setQuery($query);
      $db->query();
    }
    $extra_fields_list = $entityInstance->getFields();
    
    $query = "SELECT DISTINCT opr.сart_item FROM #__os_cck_orders_price as opr "
            . "LEFT JOIN #__os_cck_orders as ord ON ord.id = opr.fk_order_id "
            . "WHERE ord.fk_request_id=$eiid";
    $db->setQuery($query);
    $cart_items = $db->loadObjectList();
    //var_dump($cart_items); exit;
    $price_fields = array();
    $parent_instance = array();
    foreach ($cart_items as $item){
        
        $query = "SELECT opr.* FROM #__os_cck_orders_price as opr "
            . "LEFT JOIN #__os_cck_orders as ord ON ord.id = opr.fk_order_id "
            . "WHERE ord.fk_request_id=$eiid AND opr.сart_item=$item->сart_item";
    
        $db->setQuery($query);
        $price_fields[] = $db->loadObjectList();
        
        $query = "SELECT opr.fk_eiid FROM #__os_cck_orders_price as opr "
            . "LEFT JOIN #__os_cck_orders as ord ON ord.id = opr.fk_order_id "
            . "WHERE ord.fk_request_id=$eiid AND opr.сart_item=$item->сart_item "
            . "GROUP BY opr.сart_item";
        $db->setQuery($query);
        $parent_instance[] = $db->loadObjectList();
        
    }
    
    //$query = "SELECT DISTINCT fk_order_id"
    
    //var_dump($parent_instance);
    
    //var_dump($price_fields);
    
//    $query = "SELECT fid_parent FROM #__os_cck_child_parent_connect WHERE fid_child = $entityInstance->eiid";
//    $db->setQuery($query);
//    $parent_instance = $db->loadResult();

    
    $instance_layout = new os_cckLayout($db);
    if(empty($parent_instance)){
      if($instance_layout->getDefaultLayout($entityInstance->fk_eid, 'instance')){
        $instance_layout->load(intval($instance_layout->getDefaultLayout($entityInstance->fk_eid, 'instance')));
      }else{
        JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ENTITY_LAYOUT"));
        return;   
      }
    }else{
      $instance_layout->load(intval($entityInstance->fk_lid));
    }
    //var_dump($parent_instance);
    $layout_params = unserialize($instance_layout->params);
    $str_list = array();
    $str_list['layout_params'] = $layout_params;
    $str_list['layout'] = $instance_layout;
    $str_list['parent_instance'] = $parent_instance;
    $str_list['extra_fields_list'] = $extra_fields_list;
    //print_r($entityInstance);exit;
    AdminViewBuy_request :: editBuyRequestInstance($option, $entityInstance, $str_list, $price_fields, $parent_price_fields);
  }
  
  static function remove_buy_request_item($eiid, $option){
    global $db, $app;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    if (!is_array($eiid) || count($eiid) < 1) {
      echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
      exit;
    }
    if (count($eiid)) {
      foreach ($eiid as $id) {
        $instance = new os_cckEntityInstance($db);
        $instance->load($id);
        $instance->delete();
      }
    }
    $app->redirect("index.php?option=$option&task=show_buy_request_instances");
  }
    
}