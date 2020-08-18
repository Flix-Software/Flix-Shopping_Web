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

class AdminCoupons{
    public static function showCoupons($option){
        global $db, $app, $jConf;
        
        // SORTING parameters start
        $session = JFactory::getSession();

        $item_sort_param = mosGetParam($_GET, 'sort', 'coup.coup_id');
        
        if (is_array($sort_arr = $session->get('eq_itemsort', ''))) {
          if(JRequest::getVar('sorting_direction','')){
            if(JRequest::getVar('sorting_direction')=="ASC"){
              $sort_arr['sorting_direction'] = "DESC";
            }else{
              $sort_arr['sorting_direction'] = "ASC";
            }
          }elseif($session->get('sorting_direction','')){ 
            $sort_arr['sorting_direction'] = $session->get('sorting_direction');
          }else{
            $sort_arr['sorting_direction']="ASC";
          }
          if ($item_sort_param == $sort_arr['field']) {
          } else {
            $sort_arr['field'] = $item_sort_param;
          }

          if($item_sort_param == 'coup_id'){
            $sort_string = 'coup.coup_id' . " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.coup_id"){
            $sort_string = $item_sort_param . " " . $sort_arr['sorting_direction'];
          }
          
          if($item_sort_param == 'coupon_name'){
            $sort_string = 'coup.name'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.name"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
          
          if($item_sort_param == 'coupon_date_start'){
            $sort_string = 'coup.date_start'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.date_start"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
          
          if($item_sort_param == 'coupon_date_finish'){
            $sort_string = 'coup.date_finish'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.date_finish"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
        } else { 
          $sort_arr = array();
          if(JRequest::getVar('sorting_direction','')){
            $sort_arr['sorting_direction'] = JRequest::getVar('sorting_direction');
          }elseif($session->get('sorting_direction','')){ 
            $sort_arr['sorting_direction'] = $session->get('sorting_direction');
          }else{
            $sort_arr['sorting_direction']="ASC";
          }

          if($item_sort_param == 'coup_id'. " " . $sort_arr['sorting_direction']){
            $sort_string = 'coup.coup_id'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.coup_id"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
          
          if($item_sort_param == 'coupon_name'){
            $sort_string = 'coup.name'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.name"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
          
          if($item_sort_param == 'coupon_date_start'){
            $sort_string = 'coup.date_start'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.date_start"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
          
          if($item_sort_param == 'coupon_date_finish'){
            $sort_string = 'coup.date_finish'. " " . $sort_arr['sorting_direction'];
          }else if($item_sort_param == "coup.date_finish"){
            $sort_string = $item_sort_param. " " . $sort_arr['sorting_direction'];
          }
          $sort_arr['field'] = $item_sort_param;
        }

        $session->set('eq_itemsort', $sort_arr);

        //maybe it is search below
        $limit = $app->getUserStateFromRequest("viewlistlimit", 'limit', $jConf->get("list_limit",10));
        $limitstart = $app->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0);
        //$catid = $app->getUserStateFromRequest("catid{$option}", 'catid', '');
        $pub = $app->getUserStateFromRequest("pub{$option}", 'pub', '');
        //$approved = $app->getUserStateFromRequest("appr{$option}", 'appr', '');
        $userid = $app->getUserStateFromRequest("userid{$option}", 'userid', '');
        $search = trim($app->getUserStateFromRequest("search{$option}", 'search', ''));
        $entity_id = $app->getUserStateFromRequest("entity_id{$option}", 'entity_id', '');
        $entities = array();
        $entities[] = array('value' => '', 'text' => 'All entities');
        // $query = "SELECT ent.eid AS value, ent.name AS text FROM #__os_cck_entity as ent"
        //           ."\n LEFT JOIN #__os_cck_layout as lay ON lay.fk_eid = ent.eid WHERE lay.type = 'add_instance' GROUP BY ent.eid";
        $query = "SELECT eid AS value, name AS text FROM #__os_cck_entity ORDER BY name ";

        $db->setQuery($query);
        $ent = $db->loadObjectList("value");
        $entities_array = $ent;
        //var_dump($entities_array);
        $entities = (count($ent) > 1) ? array_merge($entities, (array)$ent) : $entities;
        $entity_list = JHTML::_('select.genericlist',$entities, 'entity_id', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $entity_id);


        $where = $where2 = array();
        $catwhere = "";
        if ($entity_id != '' && isset($ent[$entity_id])) {
            array_push($where, "coup.entities LIKE '%,{$entity_id},%'");
        }

        if ($pub == "pub") {
          array_push($where, "coup.published = 1");
        } else if ($pub == "not_pub") {
          array_push($where, "coup.published = 0");
        }

        if($userid != 0){
          array_push($where, "coup.user_ids LIKE '%," . $userid.",%'");
        }

        //pagination?*
        $selectstring = "SELECT count(DISTINCT coup.coup_id) " .
          "\nFROM #__os_cck_coupons AS coup " ;
          

        if($search){
          array_push($where2, "coup.name LIKE '%$search%' ");
        }

        $selectstring .=  (count($where) ? "\nWHERE " . implode(' AND ', $where) : "");

        if($search){
          $conditions_connect = count($where) ? 'AND' : 'WHERE';
          $selectstring .=  (count($where2) ? "\n".$conditions_connect." (" . implode(' OR ', $where2).')' : "");
        }
        $db->setQuery($selectstring);

        $total = $db->loadResult();
        echo $db->getErrorMsg();
        $pageNav = new JPagination($total, $limitstart, $limit);

        $selectstring = "SELECT coup.* " .
          "\nFROM #__os_cck_coupons AS coup" ;
          
          if($search){
            array_push($where2, "coup.name LIKE '%$search%' ");
          }

        $selectstring .= (count($where) ? "\nWHERE " . implode(' AND ', $where) : "");

        if($search){
          $conditions_connect = count($where) ? 'AND' : 'WHERE';
          $selectstring .=  (count($where2) ? "\n".$conditions_connect." (" . implode(' OR ', $where2).')' : "");
        }
        $selectstring .= "\n GROUP BY coup.name " .
          "\nORDER BY $sort_string " .
          "\nLIMIT $pageNav->limitstart,$pageNav->limit;";
  
        $db->setQuery($selectstring);
        $rows = $db->loadObjectList();


        if ($db->getErrorNum()) {
          echo $db->stderr();
          return false;
        }

        
        $pubmenu[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_LABEL_SELECT_TO_PUBLIC'),'value','text');
        $pubmenu[] = JHTML::_('select.option','not_pub', JText::_('COM_OS_CCK_LABEL_SELECT_NOT_PUBLIC'),'value','text');
        $pubmenu[] = JHTML::_('select.option','pub', JText::_('COM_OS_CCK_LABEL_SELECT_PUBLIC'),'value','text');
        $publist = JHTML::_('select.genericlist',$pubmenu, 'pub', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $pub);

//        $select = "SELECT user_ids FROM #__os_cck_coupons";
//        $db->setQuery($select);
//        $users = $db->loadObjectList();
//        
//        $users_line= '';
//        foreach($users as $user){
//            $users_line .= $user->user_ids;
//        }
//        $users = explode(',', $users_line);
//        $users = array_diff($users, array(''));
//        $users = array_unique($users);
//        
//
//        $userOpt = array();
//        $userOpt[] = JHTML::_('select.option', '', 'All Users','value','text');
//        foreach ($users as $user) {
//            if($user == 0) $user = JText::_("COM_OS_CCK_LABEL_ALL_OWNERS");
//            $userOpt[] = JHTML::_('select.option', $user, @JFactory::getUser($user)->name,'value','text');
//        }
//
//        $userslist = JHTML::_('select.genericlist',$userOpt, 'userid', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $userid);
        
        AdminViewCoupons::showCoupons($option, $rows, $publist, $search, $pageNav, $sort_arr, $entity_list, $userslist, $entities_array);
    }
    
    static function publishCoupons($eiids, $publish, $option){

        global $db, $user,$app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $catid = mosGetParam($_POST, 'catid', array(0));
        if (!is_array($eiids) || count($eiids) < 1) {
          $action = $publish ? 'publish' : 'unpublish';
          echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
          exit;
        }
        $eiids = implode(',', $eiids);
        $db->setQuery("UPDATE #__os_cck_coupons SET published='$publish'"
                        . "\n WHERE coup_id IN ($eiids) ");
        if (!$db->query()) {
          echo "<script> alert('" . addslashes($db->getErrorMsg()) . "'); window.history.go(-1); </script>\n";
          exit ();
        }
        if (count($eiids) == 1) {
          $instance = new os_cckEntityInstance($db);
          $instance->checkin($eiids[0]);
        }
        $app->redirect("index.php?option=$option&task=coupons");
    }
    
    static function editCoupon($option){
        global $db, $input, $app;
        
        require JPATH_ADMINISTRATOR . '/components/com_os_cck/elements/getUserModal.php';
        JHtml::_('jquery.framework');
        
        $coupon = new os_cckCoupons($db);
        
        $coup_id = $input->get('coup_id', array(), 'ARRAY');
        
        //var_dump($coup_id); exit;
        if(!empty($coup_id)){
            $coupon->load($coup_id[0]);
        }
        //var_dump($coupon);
        $coupon_type_opt = array();
        $coupon_type_opt[] = JHTML::_('select.option', 'percent', '%','value','text');
        $coupon_type_opt[] = JHTML::_('select.option', 'value', 'Value','value','text');
        
        $coupon_type_input = JHTML::_('select.genericlist',$coupon_type_opt, 'type', 'class="inputbox" size="1"', 'value', 'text', $coupon->type);
        $coupon->_coupon_type_input = $coupon_type_input;
        
        $query = "SELECT eid, name FROM #__os_cck_entity WHERE published=1";
        $db->setQuery($query);
        $enteties = $db->loadObjectList();
        
        $entities_opt = array();
        $entities_opt[] = JHTML::_('select.option', '-1', JText::_('COM_OS_CCK_LABEL_ALL_ENTETIES'), 'value','text');
        foreach($enteties as $entity){
            $entities_opt[] = JHTML::_('select.option', $entity->eid,$entity->name, 'value','text');
        }
        $entities_val = explode(',', $coupon->entities);
        $entities_input = JHTML::_('select.genericlist',$entities_opt, 'entities[]', 'class="inputbox" multiple="true, "size="3"', 'value', 'text', $entities_val);
        $coupon->_entities_input = $entities_input;
        
        $gtree = get_group_children_tree_cck();
        $user_groups_val = explode(',',$coupon->user_group_ids);
        $coupon->_coupon_user_groups_input = JHTML::_('select.genericlist', $gtree, 'user_group_ids[]', 'multiple="multiple"','value', 'text',$user_groups_val);
        
        
        $categories_list = CAT_Utils::categoryArray('com_os_cck',0);
        $coupon_categories_opt = array();
        $coupon_categories_opt[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_PLEASE_SELECT_OPTION'));
        
        foreach ($categories_list as $item) {
            $coupon_categories_opt[] = JHTML::_('select.option',$item->cid, $item->name);
        }
        $categories_val = explode(',',$coupon->category_ids);
        $coupon_categories = JHTML::_('select.genericlist',$coupon_categories_opt, 'category_ids[]', 'multiple="multiple"','value', 'text', $categories_val);
        $coupon->_coupon_categories = $coupon_categories;
        
        $coupon_publish_opt = array();
        $coupon_publish_opt[] = JHTML::_('select.option', '1', 'Publish','value','text');
        $coupon_publish_opt[] = JHTML::_('select.option', '0', 'Unpublish','value','text');
        $coupon->_coupon_publish_input = JHTML::_('select.genericlist', $coupon_publish_opt, 'published', '','value', 'text',$coupon->publish);
        AdminViewCoupons::editCoupon($coupon);
    }
    
    static function saveCoupon($option){
        global $db, $input, $app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $coupon = new os_cckCoupons($db);
        
        $data = $_POST;
        
        if($input->get('coup_id', '', 'INT') != ''){
            $coupon->load($input->get('coup_id', '', 'INT'));
        }else{
            $coupon->creation_date = date('Y-m-d');
        }
        
        $entities = $input->get('entities', array(), 'ARRAY');
        if(!empty($entities)){
            $data['entities'] = ','.implode(',',$entities).',';
        }
        
        $user_group_ids = $input->get('user_group_ids', array(), 'ARRAY');
        if(!empty($user_group_ids)){
            $data['user_group_ids'] = ','.implode(',',$user_group_ids).',';
        }
        
        $category_ids = $input->get('category_ids', array(), 'ARRAY');
        if(!empty($category_ids)){
            $data['category_ids'] = ','.implode(',',$category_ids).',';
        }
        
        if(!$coupon->bind($data)){
            echo "<script>alert('Coupon with this name alredy exist'); window.history.go(-1);/script>/n";
        }
        
        if(!$coupon->check()){
            echo "<script>alert('Coupon with this name alredy exist'); window.history.go(-1);/script>/n";
        }
        
        if(!$coupon->store()){
            echo "<script>alert('Coupon with this name alredy exist'); window.history.go(-1);/script>/n";
        }
        
        
        
        $app->redirect("index.php?option={$option}&task=coupons");
        
        
        //var_dump($coupon); exit;
    }
    
    static function removeCoupon($option){
        global $db, $input, $app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $coup_ids = $input->get('coup_id', array(), 'ARRAY');
        
        $coupon = new os_cckCoupons($db);
        
        if(!empty($coup_ids)){
            foreach ($coup_ids as $coup_id){
                $coupon->delete($coup_id);
            }
        }
        
        $app->redirect("index.php?option={$option}&task=coupons");
    }
}