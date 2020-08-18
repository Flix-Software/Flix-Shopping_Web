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

class AdminOrders{

    static function showOrders(){
        global $db, $user, $option, $doc, $jConf, $app;
        $search = '';
        $order = 'ORDER BY o.notreaded desc,o.id  DESC';
        
        $entity_id = $app->getUserStateFromRequest("entity_id{$option}", 'entity_id', '');
        $entities = array();
        $entities[] = array('value' => '', 'text' => 'All entities');
        // $query = "SELECT ent.eid AS value, ent.name AS text FROM #__os_cck_entity as ent"
        //           ."\n LEFT JOIN #__os_cck_layout as lay ON lay.fk_eid = ent.eid WHERE lay.type = 'add_instance' GROUP BY ent.eid";
        $query = "SELECT eid AS value, name AS text FROM #__os_cck_entity ORDER BY name ";

        $db->setQuery($query);
        $ent = $db->loadObjectList("value");


        $entities = (count($ent) > 1) ? array_merge($entities, (array)$ent) : $entities;
        $entity_list = JHTML::_('select.genericlist',$entities, 'entity_id', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $entity_id);
        
        $where = '';
        if(isset($_REQUEST['search']) || ($entity_id != '' && isset($ent[$entity_id]))){
            
            if(isset($_REQUEST['search'])) {
                $search = $_REQUEST['search'];
                $where = "WHERE o.user_email LIKE '%{$search}%' OR o.user_name LIKE '%{$search}%' OR o.id LIKE '%{$search}%'";
            }
            if ($entity_id != '' && isset($ent[$entity_id])) {
                if(stripos($where, 'WHERE')){
                    $where .= " AND eii.fk_eid ='{$entity_id}'";
                } else {
                    $where = "WHERE eii.fk_eid ='{$entity_id}'";
                }
            }
        }
        //var_dump($where); exit;
        if(isset($_GET['orderby']) && $_GET['orderby'] == 'user') {
            $order = 'ORDER BY o.notreaded desc,o.user_name';
        }elseif(isset($_GET['orderby']) && $_GET['orderby'] == 'email') {
            $order = 'ORDER BY o.notreaded desc,o.user_email ASC';
        }elseif(isset($_GET['orderby']) && $_GET['orderby'] == 'status') {
            $order = "ORDER BY o.notreaded desc,o.status = 'Completed' DESC";
        }elseif(isset($_GET['orderby']) && $_GET['orderby'] == 'order_date') {
            $order = "ORDER BY o.notreaded desc,o.order_date  DESC";
        }elseif(isset($_GET['orderby']) && $_GET['orderby'] == 'id') {
            $order = "ORDER BY o.notreaded desc,o.id  ASC";
        }

        $limit = $app->getUserStateFromRequest("viewlistlimit", 'limit', $jConf->get("list_limit",10));
        $limitstart = $app->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0);

        if(isset($_REQUEST['order_details'])){
            $order = "ORDER BY o.order_date  DESC";
            if(isset($_GET['orderby']) && $_GET['orderby'] == 'order_date') {
                $order = "ORDER BY o.order_date  ASC";
            }
            if($where)
                $where = "WHERE o.user_email LIKE '%{$search}%' OR o.user_name LIKE '%{$search}%' 
                            AND fk_order_id = ".$_REQUEST['order_id']."";
            else
                $where = "WHERE fk_order_id = ".$_REQUEST['order_id']."";
            $sql = "SELECT count(*)  ".
                    " FROM #__os_cck_orders_details AS o ".
                    " LEFT JOIN #__users AS u ".
                    " ON o.fk_user_id = u.id ".
                    " LEFT JOIN #__os_cck_entity_instance AS eii ".
                    " ON o.fk_instance_id = eii.eiid ".
                    " LEFT JOIN #__os_cck_orders AS ccko ".
                    " ON ccko.id = o.fk_order_id ".
                    $where." ".$order ;
            $db->setQuery($sql);
            $total = $db->loadResult();
            $pageNav = new JPagination($total, $limitstart, $limit);
            $sql = "SELECT u.username, ".
                           "o.*, ".
                           "ccko.fk_request_id,ccko.order_price as i_price, ccko.order_currency as i_unit".
                   " FROM #__os_cck_orders_details AS o ".
                   " LEFT JOIN #__users AS u ".
                   " ON o.fk_user_id = u.id ".
                   " LEFT JOIN #__os_cck_entity_instance AS eii ".
                   " ON o.fk_instance_id = eii.eiid ".
                   " LEFT JOIN #__os_cck_orders AS ccko ".
                   " ON ccko.id = o.fk_order_id ".
                    $where." ".$order. " LIMIT " . $pageNav->limitstart." , ". $pageNav->limit;
            $db->setQuery($sql);
            $orders = $db->loadobjectList();

            $query = "UPDATE #__os_cck_orders SET notreaded=0 WHERE id=".$_REQUEST['order_id'];
            $db->setQuery($query);
            $db->query();

            AdminViewOrders::orders_details($orders, $search, $pageNav, $entity_list);
        }else{
            $sql = "SELECT count(*)  ".
                    " FROM #__os_cck_orders AS o ".
                    " LEFT JOIN #__users AS u ".
                    " ON o.fk_user_id = u.id ".
                    " LEFT JOIN #__os_cck_entity_instance AS eii ".
                   " ON o.fk_instance_id = eii.eiid ". $where ." ".$order;
            $db->setQuery($sql);
            $total = $db->loadResult();
            $pageNav = new JPagination($total, $limitstart, $limit);
            $sql = "SELECT u.id as userId, u.username, ".
               "o.*".
               " FROM #__os_cck_orders AS o ".
               " LEFT JOIN #__users AS u ".
               " ON o.fk_user_id = u.id ".
               " LEFT JOIN #__os_cck_entity_instance AS eii ".
               " ON o.fk_instance_id = eii.eiid ". $where.
                $order. " LIMIT " . $pageNav->limitstart." , ". $pageNav->limit;
            $db->setQuery($sql);
            $orders = $db->loadobjectList();

            AdminViewOrders::orders($orders, $search, $pageNav, $entity_list);
        }
    }

    static function updateOrderStatus() {
        global $db, $option,$app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $input = JFactory::getApplication()->input;
        $orderId = $input->get('orderId', 0, 'INT');
        $status = $input->get('status', 'Completed', 'STRING');
        $comment = $input->get('comment', '', 'STRING');
        $option = $input->get('option', 'com_os_cck', 'STRING');
        
        $query = "SELECT status FROM #__os_cck_orders WHERE id = ".$orderId."";
        $db->setQuery($query);
        $old_status = $db->loadResult();
        if($status == 'Completed'){
            $sql = "UPDATE #__os_cck_orders SET status = '".$status."', order_date = NOW(), number_of_downloads=0 WHERE id = ".$orderId."";
        }else{
            $sql = "UPDATE #__os_cck_orders SET status = '".$status."', order_date = NOW() WHERE id = ".$orderId."";
        }
        //var_dump($sql); exit;
        $db->setQuery($sql);
        $db->query();
        $sql = "SELECT * FROM #__os_cck_orders WHERE id = ".$orderId."";
        $db->setQuery($sql);
        $order = $db->loadobjectList();
        $order = $order['0'];
        $order->txn_type = 'Order status changed (set:'.$status.') by the administrator';
        
        $user = JFactory::getUser();
        $comment = "Comment administrator " . $user->username . ": " . $comment;
        $sql = "INSERT INTO #__os_cck_orders_details( fk_order_id, fk_user_id, fk_instance_id,
                                                              instance_title, user_email, user_name, status,
                                                              order_date,txn_type, txn_id, payer_id, payer_status,
                                                              payment_details, quantity, comment)
                        VALUES ('".$order->id."','".$order->fk_user_id."','". $order->fk_instance_id ."',
                                '".$order->instance_title."','".$order->user_email."','".$order->user_name."','".$order->status."',
                                now(),'".$order->txn_type."','".$order->txn_id."',  '".$order->payer_id."',
                                '".$order->payer_status."', ".$db->Quote($raw_data).", ".$db->Quote($order->quantity).", ".$db->Quote($comment).")";
                                //echo $sql; exit;
        $db->setQuery($sql);
        $db->query();
        
        $sql = "SELECT * FROM #__os_cck_orders_price WHERE fk_order_id=".$order->id;
        $db->setQuery($sql);
        $order_prices = $db->loadObjectList();
        
        foreach($order_prices as $order_price){
            if($order_price->quantity > 0){
                $sql = "SELECT quantity FROM #__os_cck_content_instances_price WHERE price_id=" . $order_price->fk_price_id;
                $db->setQuery($sql);
                $old_quantity = $db->loadResult();
                
                if($status == 'Completed'){
                    $quantity = $old_quantity - $order_price->quantity;
                }elseif($old_status != 'Completed'){
                    $quantity = $old_quantity;
                }else{
                    $quantity = $old_quantity + $order_price->quantity;
                }
                
                $sql = "UPDATE #__os_cck_content_instances_price SET quantity = '$quantity' WHERE price_id=" . $order_price->fk_price_id;
                $db->setQuery($sql);
                $db->query();
            }
        }
        
//        $instance = new os_cckEntityInstance($db);
//        $instance->load($order->fk_instance_id);
//        
//        if($status == 'Completed'){
//            $quantity = $instance->quantity - $order->quantity;
//        }elseif($old_status != 'Completed'){
//            $quantity = $instance->quantity;
//        }else{
//            $quantity = $instance->quantity - $order->quantity;
//        }
//        
//        $query = "UPDATE #__os_cck_entity_instance SET quantity = '$quantity' WHERE eiid = '$order->fk_instance_id'";
//        $db->setQuery($query);
//        $db->query();
        
        $app->redirect("index.php?option=$option&task=orders");
    }


    static function deleteOrder($cb, $option)
    {

        global $db, $app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        foreach($cb as $key=>$orderId){
            $sql = "DELETE FROM #__os_cck_orders WHERE id = ".$orderId." ";
            $db->setQuery($sql);
            $db->query();

            $sql = "DELETE FROM #__os_cck_orders_details WHERE fk_order_id = ".$orderId." ";
            $db->setQuery($sql);
            $db->query();
        }

        $app->redirect("index.php?option=$option&task=orders");

    }
    
    static function changeOrderStatus(){
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $input = JFactory::getApplication()->input;
        
        $orderId = $input->get('cb', 0 , 'INT');
        $orderId = $orderId[0];
        $status = $input->get('order_status', array(), 'ARRAY');
        $status = $status[$orderId];
        
        
       AdminViewOrders::changeOrderStatus($orderId, $status);
        
    }

    

}