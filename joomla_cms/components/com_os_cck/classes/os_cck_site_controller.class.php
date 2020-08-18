<?php

if (!defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');

/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/
class os_cck_site_controller{
  //os cck controller class

static function prepere_field_for_show($field, $value,$row=0)
{
    global $moduleId ;
    $field->options['strlen'] = 100;
    $field->options['width'] = 100;
    $field->options['height'] = 100;
    if ($field->published != "1") return "";
    $ftype = $field->field_type;
    $global_settings = unserialize($field->global_settings);
    $db_columns = unserialize($field->db_columns);
    $sufix = '';
    if ($ftype == 'text_textfield') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
        if ($value != '') $return = (strlen($value) > $field->options['strlen']) ? substr($value, 0, $field->options['strlen']) . "..." : $value;
        return $return;
    }elseif ($ftype == 'categoryfield') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
        if ($value != '') $return = $value;
        return $return;
    }elseif ($ftype == 'decimal_textfield') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
        if ($value != '') $return = $value;
        return $return;
    }elseif ($ftype == 'rating_field') {
        return '<img src="'.JURI::root().'/components/com_os_cck/images/rating-'.($value->data*2).'.png"
                alt="'.$value->data.'" border="0"/>&nbsp;';
    } else if ($ftype == 'datetime_popup') {
        $value = (isset($value->data) && $value->data != '0000-00-00 00:00:00') ? $value->data : '';
        $format=($global_settings['output_format']!="") ? ($global_settings['output_format']) : ($global_settings['input_format']);
        $value = date(str_replace('%','',$format), strtotime($value));
        return $value;
    } else if ($ftype == 'filefield') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
        if ($value != '') $return = '<a href="' . JURI::root() . $value . '" > download </a>';
        return $return;
    } else if ($ftype == 'imagefield') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
        $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
        $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';
        if ($value != '') {
            $image = show_image_cck($value, $field->options['width'], $field->options['height']);
            $return = '<img src="' . JURI::root() . $image . '"  /><br />';
        }
        return $return;
    } else if ($ftype == 'locationfield') {
        $layout_params = array();
        $layout_params['map_field_name'] = $field->field_name;
        $width = (isset($field->options['width'])) ? $field->options['width'] : '';
        $heigth = (isset($field->options['height'])) ? $field->options['height'] : '';
        $field->settings = unserialize($field->global_settings);
        if($row){
            $fieldName=str_replace(' ','_',($row->title.'_'.$field->field_name));
        }else{
            $fieldName=str_replace(' ','_',$field->field_name);
        }
        ob_start();
        showLocationMap($layout_params,false, $fieldName
            , $value->{$field->field_name . "_vlat"}
            , $value->{$field->field_name . "_vlong"}
            , $value->{$field->field_name . "_zoom"}
            , $value->{$field->field_name . "_adress"}
            , $field->settings['maptype']
            , $width
            , $heigth

        );
    
        $return = ob_get_contents();
        ob_end_clean();

        return $return;
    } 
//    else if ($ftype == 'galleryfield') {
//        
//        $width_heigth = (isset($field->options['width'])) ? 'width:' . $field->options['width'] . 'px;' : '';
//        $width_heigth .= (isset($field->options['height'])) ? ' height:' . $field->options['height'] . 'px;' : '';
//        $return = '';
//
//        if(!empty($value) && $images = json_decode(base64_decode($value->data))){
//            $return .= "<div class='gallery_".$field->field_name."' id='gallery_".$field->field_name."'>";
//            $images = json_decode(base64_decode($value->data));
//
//            foreach ($images as $image) {
//                if (!isset($_REQUEST['view']) || $_REQUEST['view'] != 'category')
//                    $return .= '<a href="' . JURI::root() . 'images/com_os_cck' . $field->fid . '/original/' . $image->file . '" data-lightbox="roadtrip_'.$field->field_name.$moduleId.'" title="' . $image->alt . '">';
//                $return .= '<img style="' . $width_heigth . '" src="' . JURI::root() . 'images/com_os_cck' . $field->fid . '/thumbnail/' . $image->file . '"  />';
//                if (!isset($_REQUEST['view']) || $_REQUEST['view'] != 'category') $return .= '</a>';
//                if (isset($_REQUEST['view']) && $_REQUEST['view'] == 'category') break;
//            }
//            return $return . "</div>";
//        }
//    } 
    else if ($ftype == 'text_radio_buttons') {
        $value = (isset($value->data)) ? $value->data : '';
      $return = '';
      $arr = array();
      $allowed_values = urlencode($global_settings['allowed_values']);
      if (strpos($allowed_values, '%0D%0A') !== false) $allowed_values = explode('%0D%0A', $allowed_values);
      else if (strpos($allowed_values, '%0D') !== false) $allowed_values = explode('%0D', $allowed_values);
      else if (strpos($allowed_values, '%0A') !== false) $allowed_values = explode('%0A', $allowed_values);
      else return "Bad set 'allow value' for this field!";
      foreach ($allowed_values as $item) {
          $key_value = explode('%7C', $item);
          if ($key_value[0] == $value) $return = (isset($key_value[1]))?urldecode($key_value[1]):urldecode($key_value[0]);
      }
      return $return;
    } else if ($ftype == 'text_select_list') {
        $value = (isset($value->data)) ? $value->data : '';
          $return = '';
          $arr = array();
          $allowed_values = $global_settings['allowed_values'];
          $allowed_values = urlencode($allowed_values);
          if (strpos($allowed_values, '%0D%0A') !== false) $allowed_values = explode('%0D%0A', $allowed_values);
          else if (strpos($allowed_values, '%0D') !== false) $allowed_values = explode('%0D', $allowed_values);
          else if (strpos($allowed_values, '%0A') !== false) $allowed_values = explode('%0A', $allowed_values);
          else return "Bad set 'allow value' for this field!";
          foreach ($allowed_values as $key => $allow_value) {
            $allow_value = str_replace("+", ' ', $allow_value);
            $allowed_values[$key] = trim(urldecode($allow_value));
          }
          foreach ($allowed_values as $item) {
              //echo ":1111111111:".$item.":1111111111:".$value.":1111111111:";
              $key_value = explode('|', $item);
              if(!isset($key_value[0]) && isset($key_value[1])){
                $key_value[0] = str_replace(' ', '', $key_value[1]);
              }
              //print_r($key_value);
              if($key_value[0] !== 0){
                if ($key_value[0] == $value and count($key_value) > 1) $return = $key_value[1];
                else if ($key_value[0] == $value) $return = $key_value[0];
              }
          }
          return $return;
    } else if ($ftype == 'text_single_checkbox_onoff') {
        $value = (isset($value->data)) ? $value->data : '';
      $return = '';
      $arr = array();
      $allowed_values = str_replace(' ', '', $global_settings['allowed_values']);
      $allowed_values = urlencode($allowed_values);
      if (strpos($allowed_values, '%0D%0A') !== false) $allowed_values = explode('%0D%0A', $allowed_values);
      else if (strpos($allowed_values, '%0D') !== false) $allowed_values = explode('%0D', $allowed_values);
      else if (strpos($allowed_values, '%0A') !== false) $allowed_values = explode('%0A', $allowed_values);

      foreach ($allowed_values as $key => $item) {
        $key_value = explode('%7C', $item);
        if (isset($key_value[0]) && isset($key_value[1]) && $key_value[0] == $value) $return = urldecode($key_value[1]);
        else if (isset($key_value[0]) && !isset($key_value[1]) && $key_value[0] == $value) $return = urldecode($key_value[0]);
        else if (!isset($key_value[0]) && isset($key_value[1]) && $key_value[1] == $value) $return = urldecode($key_value[1]);
        else if (count($allowed_values) == 2 && empty($value) && $key == 0){
          if (isset($key_value[0]) && isset($key_value[1])) 
            $return = urldecode($key_value[1]);
          else
            $return = urldecode($key_value[0]);
        }
      }
      return $return;

    } else if ($ftype == 'text_textarea') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
//       if($value!=''){
//         $return = '<textarea class="text_area" type="text"  rows="'.$field->options['rows'].'" cols="'.$field->options['cols'].'" readonly="true" > '.$value.'</textarea>' ;
//       }
        if ($value != '') $return = (strlen($value) > $field->options['strlen']) ? substr($value, 0, $field->options['strlen']) . "..." : $value;

        return $return;

    } else if ($ftype == 'text_url') {
        $value = (isset($value->data)) ? $value->data : '';
        $return = '';
        if ($value != '' && $value != 'http://') {
            $return = '<a href="' . $value . '">' . $value . '</a>';
        }
        return $return;
    } else {
        return 'Canity test. Error - Bad type sellected!';
    }
}

  static function checkFile() {
      $path = protectInjectionWithoutQuote("path");
      $filename = basename(protectInjectionWithoutQuote("file"));
      $file = $path . $filename;
      if (file_exists($file)) {
          echo "The file with such name already is!";
      } else {
          echo "";
      }
  }


  static function paypal(){
    global $db;
    $operation=protectInjectionWithoutQuote('operation');
    if(isset($operation) && $operation == 'success') {
        $dispatcher = JDispatcher::getInstance();
        $plugin_name = 'paypal';
        $plugin = JPluginHelper::importPlugin( 'payment',$plugin_name);
        $a = '';
        $userName = '';
        $userEmail = '';
        $html = $dispatcher->trigger('validateIPN');
        if(isset($html[0]))$html = $html[0];
        if(JRequest::getVar('payer_email','') || count($html)>2){
            $userId  = JRequest::getVar('userId','');
            if($userId){
                $sql = "SELECT  name,username,email FROM  `#__users` WHERE id= '".$userId."'";
                $db->setQuery($sql);
                $result = $db->loadObjectList();
                $result = $result['0'];
                $userName = $result->name;
                $userEmail = $result->email;
            }
            if(!$userName)$userName = protectInjectionWithoutQuote('first_name');
            if(!$userEmail)$userEmail = protectInjectionWithoutQuote('payer_email');
            $instId = intval(JRequest::getVar('instId'));
            if($instId){
                if(count($html)>2){///paralel payment
                    // if($html['payKey']){
                    //     $query = "SELECT id FROM #__rem_orders_details "
                    //             ."\n WHERE txn_id = '".$html['payKey']."' "
                    //             ."\n AND status='".$html['responseEnvelope']['ack']."'";
                    //     $db->setQuery($query);
                    //     $result = $db->loadResult();
                    //     if(!empty($result)){
                    //         JError::raiseWarning(0,_REALESTATE_MANAGER_PAYPAL_F5_ERROR);
                    //         return;
                    //     }
                    // }
                    // $status = $html['responseEnvelope']['ack'];
                    // $payer_id = '';
                    // $txn_id = $html['payKey'];
                    // $txn_type = 'comission_payment';
                    // $order_currency_code = JRequest::getVar('currency_code');
                    // $orderId = JRequest::getVar('orderId');
                    // $payer_status = '';
                    // $mc_gross = 0;
                    // $userEmail = $html['senderEmail'];
                    // $html['pending_reason'] = 'Receiver List:<br>________________________';
                    // foreach ($html['paymentInfoList']['paymentInfo'] as $value) {
                    //     $mc_gross += $value['receiver']['amount'];
                    //     $html['pending_reason'] .= '<br>Email:'.$value['receiver']['email']
                    //                             .'<br>Amount:'.$value['receiver']['amount']
                    //                             .'<br>Status:'.$value['senderTransactionStatus'];
                    //     if($value['senderTransactionStatus'] == 'PENDING'){
                    //         $html['pending_reason'] .= '<br>Reason:'.$value['pendingReason'];
                    //     }
                    //     $html['pending_reason'] .= '<br>________________________';
                    // }
                    // $raw_data = serialize($html);
                }else{
                    $status = protectInjectionWithoutQuote('payment_status');
                    $payer_id = intval(JRequest::getVar('payer_id'));
                    $txn_id = intval(JRequest::getVar('txn_id'));
                    $txn_type = protectInjectionWithoutQuote('txn_type');
                    $payer_status = JRequest::getVar('payer_status');
                    $mc_gross = protectInjectionWithoutQuote('mc_gross');
                    $order_currency_code = protectInjectionWithoutQuote('mc_currency');
                    $orderId = intval(JRequest::getVar('orderId'));
                    $raw_data = serialize($_REQUEST);
                }               
               
                $sql = "UPDATE #__os_cck_orders SET order_date = now(), status='" . $status . "',
                        payer_id='".$payer_id."',
                        order_price='".$mc_gross."',
                        order_currency='".$order_currency_code."',
                        txn_id='".$txn_id."',
                        txn_type='".$txn_type."',
                        paid_price='".$mc_gross."',
                        notreaded=1,
                        paid_currency='".$order_currency_code."',
                        payer_status='".$payer_status."' WHERE id = '".$orderId."'";
                $db->setQuery($sql);
                $db->query();
                $itemName = protectInjectionWithoutQuote("item_name",'');
                $sql = "INSERT INTO #__os_cck_orders_details( fk_order_id, fk_user_id, fk_instance_id,
                                                              instance_title, user_email, user_name, status,
                                                              order_date,txn_type, txn_id, payer_id, payer_status,
                                                              order_price, order_currency, payment_details)
                        VALUES ('".$orderId."','".$userId."','". $instId ."',
                                '".$itemName."','".$userEmail."','".$userName."','".$status."',
                                now(),'".$txn_type."','".$txn_id."',  '".$payer_id."',
                                '".$payer_status."',  '".$mc_gross."', '".$order_currency_code."',
                                ".$db->Quote($raw_data).")";
                $db->setQuery($sql);
                $db->query();
            }else{
                JError::raiseWarning(0,JText::_("COM_OS_CCK_PAYPAL_ERROR"));
                return;
            }
            echo JText::_("COM_OS_CCK_PAYPAL_SUCCESS_PAYMENT");
        }
    } elseif(isset($_GET['operation']) && JRequest::getVar('operation') == 'cancel') {
        echo JText::_("COM_OS_CCK_PAYPAL_UNSUCCESS_PAYMENT");
    }
  }

  static function ajax_rent_calcualete($eiids,$ceid,$rent_from,$rent_until){
      
    $resulArr = calculatePriceCCK($eiids,$ceid,$rent_from,$rent_until);
    echo json_encode(array("price"=>$resulArr["price"],"currency"=>$resulArr["currency"],"calculated_currency"=>$resulArr["calculatedCurrency"]));
    exit;
  }

  static function saveInstance($option){
    global $db, $user,$task, $Itemid, $app;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $post = $_POST;
    $input = JFactory::getApplication()->input;
    if(isset($post['eiid'])) unset($post['eiid']);
    // Params(cck component menu)
    $menu = new JTableMenu($db);
    $menu->load($Itemid);
    $params = new JRegistry;
    $params->loadString($menu->params);
    //end


    $query = "SELECT c.title,c.lid,c.params,c.fk_eid ,c.mail, ch.layout_html FROM #__os_cck_layout AS c"
            ."\n LEFT JOIN #__os_cck_entity_instance AS ei ON c.lid = ei.fk_lid"
            ."\n LEFT JOIN #__os_cck_layout_html AS ch ON c.lid = ch.fk_lid"
            ."\n WHERE c.lid = ".protectInjectionWithoutQuote('lay_type');


    $db->setQuery($query);
    $layout = $db->loadObjectList();
    $layout_params = unserialize($layout[0]->params);
    
   
    $instance = new os_cckEntityInstance($db);
    $data = $post;

    //select add clild firlds for sale
    $select_list = array();
    foreach ($data as $key => $value) {
       if(stripos($key,'fi_text_select_list_') !== false){
        $select_id = str_ireplace('fi_text_select_list_', '', $key);
          $select_list[] = $instance->getField($select_id);
       }
    }
    //select add clild firlds for sale

    $data['fields_data'] = array();
    
    
    
    //$price = 0;
    //$quantity = NULL;
    foreach ($post as $key => $var) {
      if (strpos($key, 'fi_') === 0){
        $key = str_replace('fi_', '', $key);
        $data['fields_data'][$key] = $var;
//        if(isset($layout_params["fields"][$key."_field_type"]) && 
//                $layout_params["fields"][$key."_field_type"] == 'price'){
//          $price += $var;
//        }if(isset($layout_params["fields"][$key."_field_type"]) && 
//                $layout_params["fields"][$key."_field_type"] == 'quantity'){
//          $quantity = $var;
//        }
      }else{
        continue;
      }
    }
    
    $data["instance_price"] = 0;
    $data['quantity'] = 0;
    $total_price=0;
    
    $price_fields = array();
    if(isset($data['price_fields'])){
        foreach ($data['price_fields'] as $price_field){
            
            $ordering = $input->get($price_field.'_ordering', array(), 'ARRAY');
            
            foreach ($ordering as $val){
                //var_dump($data[$price_field . '_price_type']); exit;
                $price_class = new stdClass;
                $price_class->fid = '';
                //$price_class->price_type = '';
                $price_class->price_name = '';
                $price_class->price_value = '';
                $price_class->quantity = '';
                $price_class->ordering = '';
                if(isset($data[$price_field . '_fid'])){
                    $price_class->fid = $data[$price_field . '_fid'];
                }
//                if(isset($data[$price_field . '_price_type'])){
//                    $price_class->price_type = $data[$price_field . '_price_type'];
//                }else{
//                    $price_class->price_type = 'base_price';
//                }
                if(isset($data['fields_data'][$price_field . '_' . $val])){
                    $price_class->price_value = $data['fields_data'][$price_field . '_' . $val];
                }
                if(isset($data['fields_data'][$price_field . '_price_name_' . $val])){
                    $price_class->price_name = $data['fields_data'][$price_field . '_price_name_' . $val];
                }else{
                    $price_class->price_name = $price_class->price_value;
                }
                if(isset($data['fields_data'][$price_field . '_quantity_' . $val])){
                    $price_class->quantity = $data['fields_data'][$price_field . '_quantity_' . $val];
                }
                
                $price_class->ordering = $val;
                
                $price_fields[] = $price_class;
                
                $field = new os_cckEntityField($db);
              $field->load($price_class->fid);

              $temp_layout = new os_cckLayout($db);
              $temp_layout->load($data['fk_lid']);
              $temp_layout_params = unserialize($layout->params);

              //$calculate_ordering = (isset($layout_params['fields'][$field->db_field_name . '_calculation_order'])) ? $layout_params['fields'][$field->db_field_name . '_calculation_order'] : 0;
              $calculate_type = (isset($temp_layout_params['fields'][$field->db_field_name . '_price_type'])) ? $temp_layout_params['fields'][$field->db_field_name . '_price_type'] : 'base';
              
              if($calculate_type == 'base_price'){
                  $data["instance_price"] = $price_class->price_value;
                  $data['quantity'] = $price_class->quantity;
              }
            }
        }
    }
    
    foreach ($post as $key => $var) {
      if (strpos($key, 'child_field_') === 0){ 
          $data['child_entity_fields'][str_replace('child_field_', '', $key)] = $var;
                  
      }
    }
    
//    var_dump($quantity); exit;
//    $data["instance_price"] = $price;
//    $data['quantity'] = $quantity;
    
    
    if (isset($post['id']) && $post['id'] != 0) {
      $instance->load($post['id']);
      $data['changed'] = date("Y-m-d H:i:s");
    } else {
      $query = "SELECT c.fk_eid FROM #__os_cck_layout as c WHERE c.lid=".intval(JRequest::getVar('lay_type'));
      $db->setQuery($query);
      $data['fk_eid'] = $db->loadResult();
      $data['created'] = date("Y-m-d H:i:s");
    }
    $data['title'] = protectInjectionWithoutQuote('title','');
    $data['asset_id'] = 0;
    if(!isset($post['categories'])){
      $data['categories'] = array();
    }
    $data['fk_userid'] = $user->id;
    $data['fk_lid'] = protectInjectionWithoutQuote('lay_type','');

    if(checkAccess_cck($layout_params['views']['access_publish'], $user->groups, $data['fk_eid'], 'instancies'))
    {
        if(isset($layout_params['views']['layout_publish_on_add'])){
            if(checkMaxItems($instance->fk_eid)){
                $data['published'] = 1;
            }else{
                $data['published'] = 0;
            }
        }else{
          $data['published'] = 0;
        }
    }else{
        $data['published'] = 0;
    }
        
    $data['checked_out'] = 0;
    $data['checked_out_time'] = 0;
    $data['teid'] = 0;
    $instance->fields_data = '';
    $instance->categories = '';

    if(checkAccess_cck($layout_params['views']['access_approved'], $user->groups, $data['fk_eid'], 'instancies'))
    {
        if(isset($layout_params['views']['layout_approve_on_add'])){
          $data['approved'] = 1;
        }else{
          $data['approved'] = 0;
        }
        
    }else{
          $data['approved'] = 0;
    }
    
    $instance->access = ',1,';
  
    if (!$instance->bind($data)) {
      echo "<script> alert('Entity with this name alredy exist'); window.history.go(-1); </script>\n";
      exit ();
    }
    //entity_name, entity_tbale_name
    $entitty = new os_cckEntity($db);
    $entitty->load($instance->fk_eid);
    $instance->_entity_name = $entitty->name;
    $instance->_field_list = $entitty->getFieldList($layout[0]->layout_html);
    $instance->_field_list = array_merge($instance->_field_list, $select_list);
    $instance->_layout_params = $layout_params['fields'];
    $instance->_layout_html = $layout[0]->layout_html;
    $instance->_price_fields = $price_fields;
    $instance->_child_entity_fields = $data['child_entity_fields'];
    $os_cck_configuration = JComponentHelper::getParams('com_os_cck');
    $paypal_currency = cck_getCurrency($os_cck_configuration);
    $instance->instance_currency = $paypal_currency[0]['sign'];

    $instance->check();
    
    if (!$instance->require_check()) {
      echo "<script> alert('Please fill the required fields!'); window.history.go(-1); </script>\n";
      exit ();
    }
    $fields_for_mail = array();

    foreach($instance->getFields() as $field)
    {

        $field_val = $instance->getFieldValue($field);

        if(isset($field_val[0])) $field_val = $field_val[0];

        if(isset($field_val->data))
        {
           $fields_for_mail[$field->db_field_name] = $field_val->data;
        }

        if($field->field_type == 'datetime_popup'){
          unset($fields_for_mail[$field->db_field_name]);
        }

    }


    $fields_for_mail = array_merge($fields_for_mail, $data['fields_data']);

    $layout_mail = new os_cckLayout($db);
    $layout_mail->load($instance->fk_lid);
    $mail = unserialize($layout_mail->mail);

    foreach($fields_for_mail as $key => $field)
    {
        $mail['cck_mail_body'] = str_replace("{|".$key."|}", $field, $mail['cck_mail_body']);
    }

     //if date field apply data_transform_cck
    foreach ($instance->_field_list as $field) {
      if($field->field_type == 'datetime_popup'){
        $date_format = $layout_params['fields']['datetime_popup_'.$field->fid.'_input_format'];
        $time_format = $layout_params['fields']['datetime_popup_'.$field->fid.'_input_time_format'];
        $format = $date_format.' '.$time_format;
        $date = $instance->fields_data['datetime_popup_'.$field->fid];
        $instance->fields_data['datetime_popup_'.$field->fid] = data_transform_cck($date, $format);
      }
    }


    $instance->store();
    $Itemid  = intval(JRequest::getVar('Itemid'));
    $id = intval(JRequest::getVar('eiid'));
    $catid = intval(JRequest::getVar('catid',''));

    $layout_html = urldecode($layout[0]->layout_html);

    if(strpos($layout_html,"{|f-cck_mail|}")){
        
      // $mail = unserialize($layout[0]->mail);
      $mail_body = $mail['cck_mail_body'];
      //check access
      if(isset($mail['cck_mail_access'])){
        $user = JFactory::getUser();      
        if(checkAccess_cck($mail['cck_mail_access'], $user->groups, $data['fk_eid'], 'instancies')){

          sendMailCck($mail_body, $mail['cck_mail_subject'],'',$mail['cck_mail_recipient'],$mail['cck_mail_encoding']);
        }
      }
    }//end


    if($catid)
      $catid = '&catid='.$catid;
    if(!empty($id) && $id > 0){
    //    print_r($_SERVER['HTTP_REFERER']);
    // exit;
      //JRoute::_("index.php?option=$option&view=instance&id=$id"."$catid&Itemid=$Itemid")
      $app->redirect('index.php?option=' . $_REQUEST['option'] . '&task=instance_manager&Itemid='.$Itemid,JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
    }elseif($post['redirect'] == 'instance_manager'){
    
      $app->redirect('index.php?option=' . $_REQUEST['option'] . '&task=instance_manager&Itemid='.$Itemid,JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
    }else{
      
      $app->redirect(JRoute::_($_SERVER['HTTP_REFERER']),JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
    }

  }

  static function send_buy_request($option){
    global $db, $user,$task, $app;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    
    $post = JRequest::get('post');
    
    $parent_instance = intval(JRequest::getVar('fk_eiid'));
    $instance = new os_cckEntityInstance($db);
    $parentIns = new os_cckEntityInstance($db);
    $parentIns->load($parent_instance);
    $input = JFactory::getApplication()->input;
    
    
    $requireLogin = $input->get('requireLogin', '', 'STRING');
    if($requireLogin == '1'){
        $user = JFactory::getUser();
        if($user->id == 0){
            $login_url = $input->get('login_url', '', 'STRING');
            if($login_url != ''){
                JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_LOGIN_PLEASE"));
                $app->redirect($login_url);
            }else{
                JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_LOGIN_PLEASE"));
                return;
            }
        }
    }
    
    
    $price_fields = $input->get('price_fields', '', 'STRING');
    $price_fields = json_decode($price_fields);
    
    $coupon_id = $input->get('coupon_id', '', 'STRING');
    if($coupon_id == ''){
        $coupon_val = $input->get('coupon', '', 'STRING');
        if($coupon_val != ''){
            $coup = self::ajaxCheckCoupon(1);
            
            if($coup['success']){
                $coupon_id = $coup['coup_id'];
            }else{
                echo '<script>alert("'.$coup['error_text'].'");</script>';
            }
            
        }
        
        
    }
    
    //var_dump($coupon_id); exit;
    if($coupon_id != ''){
        $coupon = new os_cckCoupons($db);
        $coupon->load($coupon_id);
        $coupon->used_number += 1;
    }
    
    
    $total_price = 0;
    $used_coupon = false;
    //var_dump($price_fields);
    foreach ($price_fields as $fields){
        foreach($fields as $key => $field){
            if(!$used_coupon){
                $calculated_price = getCalculatedPrice($field, $key, 51, $coupon_id);
                $coupon_discaunt = $calculated_price['coupon_discount'];
                $calculated_price = $calculated_price['calculated_price'];
                if($coupon_discaunt > 0 && $coupon->type == 'value'){
                    $used_coupon = true;
                }
            }else{
                $calculated_price = getCalculatedPrice($field, $key, 51, '')['calculated_price'];
            }
            $total_price += $calculated_price;
        }
    }
    
    $coupon_for_rowData = new stdClass();
    if($coupon_id != ''){
        $coupon_for_rowData->coup_id = $coupon->coup_id;
        $coupon_for_rowData->name = $coupon->name;
        $coupon_for_rowData->type = $coupon->type;
        $coupon_for_rowData->value = $coupon->value;
    }
    
    
    //var_dump($total_price); exit;
    
    $calculated_price = $total_price;
    //var_dump($calculated_price); exit;
    $data = $post;
    
    
    $quantity = 0;
    
    foreach ($price_fields as $fields){
        
        foreach($fields as $key => $field){
            if(isset($field->quantity)){
                $quantity = $field->quantity;
                continue;
            }
            foreach ($field as $price_field){
                if(isset($price_field->quantity)){
                    $quantity = $price_field->quantity;
                }
            }
        }
    }
    //var_dump($quantity); exit;
    if($quantity == 0){
        echo "<script> alert('The quantity of goods ordered cannot be zero'); window.history.go(-1); </script>\n";
        exit ();
    }
//    $quantity_fields = $input->get('quantity_fields', array(), 'ARRAY');
//    if(count($quantity_fields) > 0){
//        foreach ($quantity_fields as $quantity){
//            $quantity_field = $quantity;
//        }
//        $quantity = $input->get('fi_'.$quantity, 1, 'INT');
//        $query = "SELECT quantity FROM #__os_cck_entity_instance WHERE eiid='".$parent_instance."'";
//        $db->setQuery($query);
//        $quantity_in_stock = $db->loadResult();
//        
//        if($quantity > $quantity_in_stock){
//            echo "<script> alert('Ordered quantity more available'); window.history.go(-1); </script>\n";
//            exit ();
//        }
//        if($quantity == 0){
//            echo "<script> alert('The quantity of goods ordered cannot be zero'); window.history.go(-1); </script>\n";
//            exit ();
//        }
//        
//    }
    
    
    
    
    //select add clild firlds for sale
    $select_list = array();
    foreach ($data as $key => $value) {
       if(stripos($key,'fi_text_select_list_') !== false){
        $select_id = str_ireplace('fi_text_select_list_', '', $key);
          $select_list[] = $instance->getField($select_id);
       }
    }
    //select add clild firlds for sale

    $data['fields_data'] = array();
    foreach ($post as $key => $var) {
      if (strpos($key, 'fi_') === 0) $data['fields_data'][str_replace('fi_', '', $key)] = $var;
    }
    //   print_r($data['fields_data']);
    // exit;
    $query = "SELECT c.fk_eid FROM #__os_cck_layout as c WHERE c.lid=".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $data['fk_eid'] = $db->loadResult();
    $data['created'] = date("Y-m-d H:i:s");

    $data['title'] = protectInjectionWithoutQuote('title','');
    $data['asset_id'] = 0;
    if(!isset($post['categories'])){
      $data['categories'] = array();
    }
    $data['fk_userid'] = $user->id;
    $data['fk_lid'] = protectInjectionWithoutQuote('lay_type','');
    $data['published'] = 1;
    $data['approved'] = 1;
    $data['checked_out'] = 0;
    $data['checked_out_time'] = 0;
    $data['teid'] = 0;
    
    
    $instance->fields_data = '';
    $instance->categories = '';
    if (!$instance->bind($data)) {
      echo "<script> alert('Entity with this name alredy exist'); window.history.go(-1); </script>\n";
      exit ();
    }
    
    //entity_name, entity_tbale_name
    $entitty = new os_cckEntity($db);
    $entitty->load($instance->fk_eid);
    $instance->_entity_name = $entitty->name;
    $instance->_entity_table_name = "#__os_cck_entity_" . $entitty->name;
    $query = "SELECT c.title,c.lid,c.params,c.fk_eid ,c.mail, ch.layout_html FROM #__os_cck_layout AS c"
            ."\n LEFT JOIN #__os_cck_entity_instance AS ei ON c.lid = ei.fk_lid"
            ."\n LEFT JOIN #__os_cck_layout_html AS ch ON c.lid = ch.fk_lid"
            ."\n WHERE c.lid = ".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $layout = $db->loadObjectList();
    $instance->_field_list = $entitty->getFieldList($layout[0]->layout_html);
    $instance->_field_list = array_merge($instance->_field_list, $select_list);
    $layout_params = unserialize($layout[0]->params);
    $instance->_layout_params = $layout_params['fields'];
    $instance->_layout_html = $layout[0]->layout_html;
    //$instance->instance_price = $parentIns->instance_price; 
    $instance->instance_price = $calculated_price;
    $instance->instance_currency = $parentIns->instance_currency;
    if (!$instance->require_check()) {
      echo "<script> alert('Please fill the required fields!'); window.history.go(-1); </script>\n";
      exit ();
    }
    
 
    

    $fields_for_mail = array();

    foreach($parentIns->getFields() as $field)
    {

         $field_val = $parentIns->getFieldValue($field);

          if(isset($field_val[0])) $field_val = $field_val[0];


          if(isset($field_val->data))
          {
             $fields_for_mail[$field->db_field_name] = $field_val->data;
          }



         if($field->field_type == 'datetime_popup'){

          unset($fields_for_mail[$field->db_field_name]);

         }


      }

    $fields_for_mail = array_merge($fields_for_mail, $data['fields_data']);



    $layout_mail = new os_cckLayout($db);
    $layout_mail->load($instance->fk_lid);
    $mail = unserialize($layout_mail->mail);

    
    
    foreach($fields_for_mail as $key => $field)
    {

        $mail['cck_mail_body'] = str_replace("{|".$key."|}", $field, $mail['cck_mail_body']);

    }


    $instance->store();
    $query = "INSERT INTO #__os_cck_child_parent_connect (media_type,fid_parent,fid_child)"
            ."\n VALUES ('instance',$parent_instance,$instance->eiid)";
    $db->setQuery($query);
    $db->query();
    
    $instance_for_rowData = new stdClass();
    $instance_for_rowData->eiid = $instance->eiid;
    $instance_for_rowData->_field_list = $instance->_field_list;
    
    
//    var_dump($instance); exit;
//    if(count($price_fields)){
//        foreach ($price_fields as $price_field){
//            $temp_field = new os_cckEntityField($db);
//            $temp_field->load($price_field->fid);
//            $query = " UPDATE #__os_cck_content_entity_" . $instance->fk_eid . 
//              " SET " . $temp_field->db_field_name . "='" . $price_field->value. "'  WHERE fk_eiid='" . $instance->eiid . "' ";
//            var_dump($query); exit;
//            $db->setQuery($query);
//            $db->query();
//        }
//    }
    //var_dump($instance); exit;

    $layout_html = urldecode($layout[0]->layout_html);

    if(strpos($layout_html,"{|f-cck_mail|}")){

      // $mail = unserialize($layout[0]->mail);
      $mail_body = $mail['cck_mail_body'];
      if($mail['cck_mail_owner'] == 'on'){
          
          $query = "SELECT u.email FROM #__users AS u"
                  . " LEFT JOIN #__os_cck_entity_instance AS ei ON ei.eiid = " . $parent_instance
                  . " WHERE u.id = fk_userid";
          $db->setQuery($query);
          
          $owner_email = $db->loadResult();       
          
      }else{
          $owner_email = '';
      }
      //check access
      if(isset($mail['cck_mail_access'])){
        $user = JFactory::getUser();      
        if(checkAccess_cck($mail['cck_mail_access'], $user->groups,$instance->fk_eid, 'fields')){

          // foreach ($instance->_field_list as $field) {
          //   if(strpos($mail_body,"{|".$field->db_field_name."|}")){
          //     $field_value = JRequest::getVar('fi_'.$field->db_field_name,'');
          //     $mail_body = str_replace("{|".$field->db_field_name."|}",$field_value, $mail_body);
          //   }
          // }
          //send email
          sendMailCck($mail_body, $mail['cck_mail_subject'],'',$mail['cck_mail_recipient'],$mail['cck_mail_owner'], $owner_email, $mail['cck_mail_encoding']);
        }
      }
    }//end



    $Itemid  = intval(JRequest::getVar('Itemid'));
    $id = intval(JRequest::getVar('fk_eiid'));
    $catid = intval(JRequest::getVar('catid',''));
    if($catid)
      $catid = '&catid='.$catid;

    //JRoute::_("index.php?option=$option&view=instance&id=$id"."$catid&Itemid=$Itemid")
    $backLink = JRoute::_($_SERVER['HTTP_REFERER']);
    //mosRedirect($backLink,JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
//    $paypalStatus = false;
//    $os_cck_configuration = JComponentHelper::getParams('com_os_cck');
//    if($os_cck_configuration->get("use_paypal",0)){
//      $query = "SELECT enabled FROM #__extensions WHERE element='paypal'";
//      $db->setQuery($query);
//      $status = $db->loadResult();
//      if($status){
//        $paypalStatus = true;
//      }
//    }
    $selected_payment_systems = array();
    $os_cck_configuration = JComponentHelper::getParams('com_os_cck');
    if($os_cck_configuration->get("use_paypal",0)){
      $query = "SELECT enabled FROM #__extensions WHERE element='paypal'";
      $db->setQuery($query);
      $status = $db->loadResult();
      if($status){
        $selected_payment_systems[] = 'paypal';
      }
    }
    if($os_cck_configuration->get("use_2checkout",0)){
      $query = "SELECT enabled FROM #__extensions WHERE element='2checkout'";
      $db->setQuery($query);
      $status = $db->loadResult();
      if($status){
        $selected_payment_systems[] = '2checkout';
      }
    }
    
    
    //insert into orders
    $userId= $user->get("id","");
    $userEmail = $user->get("email","");
    $userName = $user->get("name","");
    $sql = "SELECT instance_price, instance_currency FROM #__os_cck_entity_instance WHERE eiid='".$parent_instance."'";
    $db->setQuery($sql);
    $res = $db->loadObjectList();
    $instTitle = protectInjectionWithoutQuote('title','');
    
    $total_price = $calculated_price * $quantity;
    //$total_quantity = $res['0']->quantity - $quantity;
    
    $rowData = array();
    $rowData['coupon'] = $coupon_for_rowData;
    $rowData['instance'] = $instance_for_rowData;
    
    $sql = "INSERT INTO  #__os_cck_orders(fk_user_id, fk_instance_id, fk_request_id,instance_type, instance_title, user_email , user_name , status,
                                        txn_type, order_date , order_price, order_currency, notreaded, quantity)
            VALUES ('".$userId."', '".$parent_instance."','".$instance->eiid."','Buy', '".$instTitle."', '".$userEmail."',
                    '".$userName."', 'Pending', 'Buy request',now(),'".$total_price."', '".$res['0']->instance_currency."', 1, '". $quantity . "')";
    $db->setQuery($sql);
    $db->query();
    $orderId = $db->insertid();
    $sql = "INSERT INTO #__os_cck_orders_details( fk_order_id, fk_user_id, fk_instance_id,
                    instance_title, user_email, user_name, status,
                    order_date,txn_type,quantity, row_data)
            VALUES (".$orderId.",'".$userId."','". $parent_instance ."',
                    '".$instTitle."','".$userEmail."','".$userName."','Pending',
                    now(),'Buy request','" . $quantity . "','" . serialize($rowData) . "')";
    $db->setQuery($sql);
    $db->query();
    //var_dump($price_fields); exit;
    foreach ($price_fields as $cart_item => $fields){
        foreach($fields as $key => $field){
            foreach ($field as $price_field){
                if($price_field == null){continue;}
                $query = "SELECT * FROM #__os_cck_content_instances_price WHERE price_id='$price_field->value'";

                $db->setQuery($query);
                $row = $db->loadObjectList();

                $field = new os_cckEntityField($db);
                  $field->load($price_field->fid);

                  $layout = new os_cckLayout($db);
                  $layout->load($price_field->lid);
                  $layout_params = unserialize($layout->params);

                  $calculate_ordering = (isset($layout_params['fields'][$field->db_field_name . '_calculation_order'])) ? $layout_params['fields'][$field->db_field_name . '_calculation_order'] : 0;
                  $calculate_type = (isset($layout_params['fields'][$field->db_field_name . '_price_type'])) ? $layout_params['fields'][$field->db_field_name . '_price_type'] : 'base';
                  $field_quantity = (isset($price_field->quantity)) ? $price_field->quantity : 0;

                $sql = "INSERT INTO #__os_cck_orders_price (fk_order_id, fk_price_id, fk_eid, fk_eiid, fk_fid, price_name, price_value, quantity, price_type, price_ordering, сart_item)"
                        . "VALUES ('$orderId', '$price_field->value', '" . $row[0]->fk_eid . "', '" . $row[0]->fk_eiid . "', '" . $row[0]->fk_fid . "' , '" . $row[0]->price_name . "', '" . $row[0]->price_value."' , '" . $field_quantity."', '" . $calculate_type."', '" . $calculate_ordering."', '" . $cart_item."' )";
                //var_dump($sql); exit;
                $db->setQuery($sql);
                $db->query();
            }
        }
    }
    if($coupon_id != ''){
        $sql = "INSERT INTO #__os_cck_orders_price (fk_order_id, fk_price_id, fk_eid, fk_eiid, fk_fid, price_name, price_value, quantity, price_type, price_ordering, сart_item)"
                . "VALUES ('$orderId', '$price_field->value', '" . $row[0]->fk_eid . "', '" . $row[0]->fk_eiid . "', '" . $row[0]->fk_fid . "' , '" . $row[0]->price_name . "', '" . $row[0]->price_value."' , '" . $field_quantity."', '" . $calculate_type."', '" . $calculate_ordering."', '" . $cart_item."' )";
        //var_dump($sql); exit;
        $db->setQuery($sql);
        $db->query();
        
        $coupon->store();
    }
    clear_os_cart();
    
//    $query = "UPDATE #__os_cck_entity_instance SET quantity = '" . $total_quantity . "' WHERE eiid='".$parent_instance."'";
//    $db->setQuery($query);
//    $db->query();
    $_REQUEST['OrderID'] =$orderId;
    $_REQUEST['userId'] = $userId;

    //end
    $instance->title = $instTitle;
    HTML_os_cck::showBuyRequestThanks($backLink, $selected_payment_systems, $instance, $calculated_price);

  }

  static function send_rent_request($option){
    global $db, $user,$task, $app, $input;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $input = $app->input;
    $post = JRequest::get('post');
    $Itemid  =intval(JRequest::getVar('Itemid'));
    $id = intval(JRequest::getVar('fk_eiid'));
    $catid = intval(JRequest::getVar('catid',''));
    if($catid)
      $catid = '&catid='.$catid;

    // if(JPluginHelper::isEnabled('payment','paypal')){
    //   if(empty($post['calculated_price'])){
    //     $app->redirect(JRoute::_("index.php?option=$option&view=instance&id=$id"."$catid&Itemid=$Itemid"),JText::_("COM_OS_CCK_LABEL_REQUEST_PRICE_ERROR"));
    //   }
    // }
    
    $requireLogin = $input->get('requireLogin', '', 'STRING');
    if($requireLogin == '1'){
        $user = JFactory::getUser();
        if($user->id == 0){
            $login_url = $input->get('login_url', '', 'STRING');
            if($login_url != ''){
                JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_LOGIN_PLEASE"));
                $app->redirect($login_url);
            }else{
                JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_LOGIN_PLEASE"));
                return;
            }
        }
    }

    $parent_instance = intval(JRequest::getVar('fk_eiid'));
    $instance = new os_cckEntityInstance($db);
    $parentIns = new os_cckEntityInstance($db);
    $parentIns->load($parent_instance);
    $data = $post;
    
    $price_fields = $input->get('price_fields', '', 'STRING');
    $price_fields = json_decode($price_fields);
    
//    $calculated_price = getCalculatedPrice($price_fields, $parent_instance);

    //select add clild firlds for sale
    $select_list = array();
    foreach ($data as $key => $value) {
       if(stripos($key,'fi_text_select_list_') !== false){
        $select_id = str_ireplace('fi_text_select_list_', '', $key);
          $select_list[] = $instance->getField($select_id);
       }
    }
    //select add clild firlds for sale

    $rent_from = $data['rent_from'].' '.$data['time_from'];
    $rent_until = $data['rent_until'].' '.$data['time_until'];
    //var_dump($id); exit;
    $query = "SELECT * FROM #__os_cck_rent where fk_eiid = " . $id .
          " AND rent_return is NULL ";
        $db->setQuery($query);
        $rentTerm = $db->loadObjectList();
        
        //$rent_from = substr($rent_request->rent_from, 0, 10);
        //$rent_until = substr($rent_request->rent_until, 0, 10);
        //var_dump($rentTerm);
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
    
    $data['fields_data'] = array();
    foreach ($post as $key => $var) {
      if (strpos($key, 'fi_') === 0) $data['fields_data'][str_replace('fi_', '', $key)] = $var;
    }

    $query = "SELECT c.fk_eid FROM #__os_cck_layout as c WHERE c.lid=".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $data['fk_eid'] = $db->loadResult();
    $data['created'] = date("Y-m-d H:i:s");
    $data['title'] = protectInjectionWithoutQuote('title','');
    $data['asset_id'] = 0;
    if(!isset($post['categories'])){
      $data['categories'] = array();
    }
    $data['fk_userid'] = $user->id;
    $data['fk_lid'] = protectInjectionWithoutQuote('lay_type','');
    $data['published'] = 1;
    $data['approved'] = 1;
    $data['checked_out'] = 0;
    $data['checked_out_time'] = 0;
    $data['teid'] = 0;
    $entitty = new os_cckEntity($db);
    $entitty->load($data['fk_eid']);
    $instance->_entity_name = $entitty->name;
    $instance->_entity_table_name = "#__os_cck_entity_" . $entitty->name;

    $instance->instance_currency = $parentIns->instance_currency;

    //entity_name, entity_tbale_name
    $query = "SELECT c.title,c.lid,c.params,c.fk_eid ,c.mail, ch.layout_html FROM #__os_cck_layout AS c"
            ."\n LEFT JOIN #__os_cck_entity_instance AS ei ON c.lid = ei.fk_lid"
            ."\n LEFT JOIN #__os_cck_layout_html AS ch ON c.lid = ch.fk_lid"
            ."\n WHERE c.lid = ".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $layout = $db->loadObjectList();
    $layout_params = unserialize($layout[0]->params);
    $instance->_layout_params = $layout_params['fields'];
    $instance->_layout_html = $layout[0]->layout_html;
    $instance->_field_list = $entitty->getFieldList($instance->_layout_html);
    $instance->_field_list = array_merge($instance->_field_list, $select_list);

    $calculate_price = array();

    foreach ($instance->_field_list as $field) {

      if($field->field_type == 'datetime_popup'){
        if($instance->_layout_params[$field->db_field_name.'_field_type'] == 'rent_from'){
          if($input->get('fi_'.$field->db_field_name, "")){
            $rentFrom = $input->get('fi_'.$field->db_field_name, "");
          }
        }
        if($instance->_layout_params[$field->db_field_name.'_field_type'] == 'rent_to'){
          if($input->get('fi_'.$field->db_field_name, "")){
            $rentTo = $input->get('fi_'.$field->db_field_name, "");
          }
        }
      }

      if($field->field_type == 'decimal_textfield'){
        if(isset($instance->_layout_params[$field->db_field_name.'_field_type']) && $instance->_layout_params[$field->db_field_name.'_field_type'] == 'price'){
          $data['fields_data'][$field->db_field_name] = protectInjectionWithoutQuote('calculated_price','0');
        }
      }
    }
    
    if(isset($rentFrom) && isset($rentTo)){
      $calculate_price = calculatePriceCCK($parent_instance,$data['fk_eid'],$rentFrom,$rentTo, $layout[0]->lid, $price_fields);
    }else{
      $calculate_price["price"] = 0;
    }

    $instance->instance_price = $calculate_price["price"];
    $instance->fields_data = '';
    $instance->categories = '';
    if (!$instance->bind($data)) {
      echo "<script> alert('Entity with this name alredy exist'); window.history.go(-1); </script>\n";
      exit ();
    }
    
    if (!$instance->require_check()) {
      echo "<script> alert('Please fill the required fields!'); window.history.go(-1); </script>\n";
      exit ();
    }

    $fields_for_mail = array();
    foreach($parentIns->getFields() as $field){

       $field_val = $parentIns->getFieldValue($field);

        if(isset($field_val[0])) $field_val = $field_val[0];

        if(isset($field_val->data))
        {
           $fields_for_mail[$field->db_field_name] = $field_val->data;
        }
       if($field->field_type == 'datetime_popup'){

        if(isset($instance->_layout_params[$field->db_field_name.'_field_type']) && $instance->_layout_params[$field->db_field_name.'_field_type'] == 'rent_from'){
          if($input->get('fi_'.$field->db_field_name, "")){
            $fields_for_mail[$field->db_field_name] = $input->get('fi_'.$field->db_field_name, "");
          }
        }
        if(isset($instance->_layout_params[$field->db_field_name.'_field_type']) && $instance->_layout_params[$field->db_field_name.'_field_type'] == 'rent_to'){
          if($input->get('fi_'.$field->db_field_name, "")){
            $fields_for_mail[$field->db_field_name] = $input->get('fi_'.$field->db_field_name, "");
          }
        }

       }
    }


    $fields_for_mail = array_merge($fields_for_mail, $data['fields_data']);



    $layout_mail = new os_cckLayout($db);
    $layout_mail->load($instance->fk_lid);
    $mail = unserialize($layout_mail->mail);

    

    foreach($fields_for_mail as $key => $field){
        $mail['cck_mail_body'] = str_replace("{|".$key."|}", $field, $mail['cck_mail_body']);
    }


    $instance->store();
    $query = "INSERT INTO #__os_cck_child_parent_connect (media_type,fid_parent,fid_child)"
            ."\n VALUES ('instance',$parent_instance,$instance->eiid)";
    $db->setQuery($query);
    $db->query();

    //mail block
    $layout_html = urldecode($layout[0]->layout_html);

    if(strpos($layout_html,"{|f-cck_mail|}")){

      // $mail = unserialize($layout[0]->mail);
      $mail_body = $mail['cck_mail_body'];
      if($mail['cck_mail_owner'] == 'on'){
          
          $query = "SELECT u.email FROM #__users AS u"
                  . " LEFT JOIN #__os_cck_entity_instance AS ei ON ei.eiid = " . $id
                  . " WHERE u.id = fk_userid";
          $db->setQuery($query);
          
          $owner_email = $db->loadResult();       
          
      }else{
          $owner_email = '';
      }
      //check access
      if(isset($mail['cck_mail_access'])){
        $user = JFactory::getUser();      
        if(checkAccess_cck($mail['cck_mail_access'], $user->groups, $data['fk_eid'], 'fields')){

          // foreach ($instance->_field_list as $field) {
          //   if(strpos($mail_body,"{|".$field->db_field_name."|}")){
          //     $field_value = JRequest::getVar('fi_'.$field->db_field_name,'');
          //     $mail_body = str_replace("{|".$field->db_field_name."|}",$field_value, $mail_body);
          //   }
          // }
          //send email
          sendMailCck($mail_body, $mail['cck_mail_subject'],'',$mail['cck_mail_recipient'],$mail['cck_mail_owner'], $owner_email, $mail['cck_mail_encoding']);
        }
      }
    }//end



    $Itemid  = intval(JRequest::getVar('Itemid'));
    $id = intval(JRequest::getVar('fk_eiid'));
    $catid = intval(JRequest::getVar('catid',''));
    if($catid)
      $catid = '&catid='.$catid;
    //JRoute::_("index.php?option=$option&view=instance&id=$id"."$catid&Itemid=$Itemid")
    //mosRedirect(JRoute::_($_SERVER['HTTP_REFERER']),JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));

    $backLink = JRoute::_($_SERVER['HTTP_REFERER']);
//    $paypalStatus = false;
//    $os_cck_configuration = JComponentHelper::getParams('com_os_cck');
//    if($os_cck_configuration->get("use_paypal",0)){
//      $query = "SELECT enabled FROM #__extensions WHERE element='paypal'";
//      $db->setQuery($query);
//      $status = $db->loadResult();
//      if($status){
//        $paypalStatus = true;
//      }
//    }
    
    $selected_payment_systems = array();
    $os_cck_configuration = JComponentHelper::getParams('com_os_cck');
    if($os_cck_configuration->get("use_paypal",0)){
      $query = "SELECT enabled FROM #__extensions WHERE element='paypal'";
      $db->setQuery($query);
      $status = $db->loadResult();
      if($status){
        $selected_payment_systems[] = 'paypal';
      }
    }
    if($os_cck_configuration->get("use_2checkout",0)){
      $query = "SELECT enabled FROM #__extensions WHERE element='2checkout'";
      $db->setQuery($query);
      $status = $db->loadResult();
      if($status){
        $selected_payment_systems[] = '2checkout';
      }
    }
    //insert into orders
    $userId= $user->get("id","");
    $userEmail = $user->get("email","");
    $userName = $user->get("name","");
    $sql = "SELECT instance_price, instance_currency FROM #__os_cck_entity_instance WHERE eiid='".$parent_instance."'";
    $db->setQuery($sql);
    $res = $db->loadObjectList();
    $instTitle = protectInjectionWithoutQuote('title','');
    //calculate price for rent
    // $calcPrice = calculatePriceCCK($parent_instance,$instance->fk_eid,$rent_from,$rent_until);

    //$calcPrice = $calculate_price;
    //$instance->instance_price = $calcPrice[0];
    //end
    $sql = "INSERT INTO  #__os_cck_orders(fk_user_id, fk_instance_id,fk_request_id,instance_type, instance_title, user_email , user_name , status,
                                        txn_type, order_date , order_price, order_currency, notreaded)
            VALUES ('".$userId."', '".$parent_instance."','".$instance->eiid."','Rent', '".$instTitle."', '".$userEmail."',
                    '".$userName."', 'Pending', 'Rent request',now(),'".$instance->instance_price."', '".$res['0']->instance_currency."', 1)";
    $db->setQuery($sql);
    $db->query();
    $orderId = $db->insertid();
    $sql = "INSERT INTO #__os_cck_orders_details( fk_order_id, fk_user_id, fk_instance_id,
                    instance_title, user_email, user_name, status,
                    order_date,txn_type)
            VALUES (".$orderId.",'".$userId."','". $parent_instance ."',
                    '".$instTitle."','".$userEmail."','".$userName."','Pending',
                    now(),'Rent request')";
    $db->setQuery($sql);
    $db->query();
    $_REQUEST['OrderID'] =$orderId;
    $_REQUEST['userId'] = $userId;

    //end
    $instance->title = $instTitle;
    HTML_os_cck::showRentRequestThanks($backLink, $selected_payment_systems, $instance);

  }

  static function send_request($option){
    global $db, $user,$task,$app;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $post = JRequest::get('post');
    $parent_instance_array = explode(',', JRequest::getVar('fk_eiid'));
    
    $instance = new os_cckEntityInstance($db);
    

    $data = $post;

    //select add clild firlds for sale
    $select_list = array();
    foreach ($data as $key => $value) {
       if(stripos($key,'fi_text_select_list_') !== false){
        $select_id = str_ireplace('fi_text_select_list_', '', $key);
          $select_list[] = $instance->getField($select_id);
       }
    }
    //select add clild firlds for sale

    $data['fields_data'] = array();
    foreach ($post as $key => $var) {
      if (strpos($key, 'fi_') === 0) $data['fields_data'][str_replace('fi_', '', $key)] = $var;
    }
    $query = "SELECT c.fk_eid FROM #__os_cck_layout as c WHERE c.lid=".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $data['fk_eid'] = $db->loadResult();
    $data['created'] = date("Y-m-d H:i:s");

    $data['title'] = protectInjectionWithoutQuote('title','');
    $data['asset_id'] = 0;
    if(!isset($post['categories'])){
      $data['categories'] = array();
    }
    $data['fk_userid'] = $user->id;
    $data['fk_lid'] = protectInjectionWithoutQuote('lay_type','');
    $data['published'] = 1;
    $data['approved'] = 1;
    $data['checked_out'] = 0;
    $data['checked_out_time'] = 0;
    $data['teid'] = 0;
    $instance->fields_data = '';
    $instance->categories = '';
    if (!$instance->bind($data)) {
      echo "<script> alert('Entity with this name alredy exist'); window.history.go(-1); </script>\n";
      exit ();
    }
    //entity_name, entity_tbale_name
    $entitty = new os_cckEntity($db);
    $entitty->load($instance->fk_eid);
    $instance->_entity_name = $entitty->name;
    $instance->_entity_table_name = "#__os_cck_entity_" . $entitty->name;
    
    $query = "SELECT c.title,c.lid,c.params,c.fk_eid ,c.mail, ch.layout_html FROM #__os_cck_layout AS c"
            ."\n LEFT JOIN #__os_cck_entity_instance AS ei ON c.lid = ei.fk_lid"
            ."\n LEFT JOIN #__os_cck_layout_html AS ch ON c.lid = ch.fk_lid"
            ."\n WHERE c.lid = ".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $layout = $db->loadObjectList();
    $layout_params = unserialize($layout[0]->params);
    $instance->_layout_params = $layout_params['fields'];
    $instance->_layout_html = $layout[0]->layout_html;

    $instance->_field_list = $entitty->getFieldList($instance->_layout_html);
    $instance->_field_list = array_merge($instance->_field_list, $select_list);
    if (!$instance->require_check()) {
      echo "<script> alert('Please fill the required fields!'); window.history.go(-1); </script>\n";
      exit ();
    }


   $fields_for_mail = array();
   
   foreach($parent_instance_array as $parent_instance){
       $parentIns = new os_cckEntityInstance($db);
       $parentIns->load($parent_instance);

        foreach($parentIns->getFields() as $field)
        {

             $field_val = $parentIns->getFieldValue($field);

              if(isset($field_val[0])) $field_val = $field_val[0];


              if(isset($field_val->data))
              {
                 $fields_for_mail[$field->db_field_name] = $field_val->data;
              }

            if($field->field_type == 'datetime_popup'){

              unset($fields_for_mail[$field->db_field_name]);

             }

          }
  }

    $fields_for_mail = array_merge($fields_for_mail, $data['fields_data']);



    $layout_mail = new os_cckLayout($db);
    $layout_mail->load($instance->fk_lid);
    $mail = unserialize($layout_mail->mail);

    
     foreach($fields_for_mail as $key => $field)
    {

        $mail['cck_mail_body'] = str_replace("{|".$key."|}", $field, $mail['cck_mail_body']);

    }



    $instance->store();
    if(!empty($parent_instance_array)){
        foreach($parent_instance_array as $parent_instance){
          $query = "INSERT INTO #__os_cck_child_parent_connect (media_type,fid_parent,fid_child)"
                  ."\n VALUES ('instance',$parent_instance,$instance->eiid)";
          $db->setQuery($query);
          $db->query();
        }
    }



 

    $layout_html = urldecode($layout[0]->layout_html);

    if(strpos($layout_html,"{|f-cck_mail|}")){
        
      // $mail = unserialize($layout[0]->mail);
      $mail_body = $mail['cck_mail_body'];
      if($mail['cck_mail_owner'] == 'on' && $parent_instance != 0){
          
          $query = "SELECT u.email FROM #__users AS u"
                  . " LEFT JOIN #__os_cck_entity_instance AS ei ON ei.eiid = " . $parent_instance
                  . " WHERE u.id = fk_userid";
          $db->setQuery($query);
          
          $owner_email = $db->loadResult();       
          
      }else{
          $owner_email = '';
      }
      //check access
      if(isset($mail['cck_mail_access'])){
        $user = JFactory::getUser();      
        if(checkAccess_cck($mail['cck_mail_access'], $user->groups, $data['fk_eid'], 'fields')){

          // foreach ($instance->_field_list as $field) {
          //   if(strpos($mail_body,"{|".$field->db_field_name."|}")){
          //     $field_value = JRequest::getVar('fi_'.$field->db_field_name,'');
          //     $mail_body = str_replace("{|".$field->db_field_name."|}",$field_value, $mail_body);
          //   }
          // }
          //send email
          sendMailCck($mail_body, $mail['cck_mail_subject'],'',$mail['cck_mail_recipient'],$mail['cck_mail_owner'], $owner_email, $mail['cck_mail_encoding']);
        }
      }
    }//end

    $Itemid  = protectInjectionWithoutQuote('Itemid');
    $id = protectInjectionWithoutQuote('eiid');
    if($id){
      $catid = protectInjectionWithoutQuote('catid','');
      if($catid)
        $catid = '&catid='.$catid;
      //JRoute::_("index.php?option=$option&view=instance&id=$id"."$catid&Itemid=$Itemid")
      $app->redirect(JRoute::_($_SERVER['HTTP_REFERER']),JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
    }else{
      $app->redirect(JRoute::_($_SERVER['HTTP_REFERER']),JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));//maybe need add in all request function HTTP_REFERER //no need get request item to set return url
    }

  }

  static function send_review_request($option){
    global $db, $user,$task, $Itemid,$app;
    // Params(cck component menu)
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $menu = new JTableMenu($db);
    $menu->load($Itemid);
    $params = new JRegistry;
    $params->loadString($menu->params);
    
    $post = JRequest::get('post');

    $parent_instance = protectInjectionWithoutQuote('fk_eiid');
    $instance = new os_cckEntityInstance($db);
    $parentIns = new os_cckEntityInstance($db);
    $parentIns->load($parent_instance);
    $data = $post;

    //select add clild firlds for sale
    $select_list = array();
    foreach ($data as $key => $value) {
       if(stripos($key,'fi_text_select_list_') !== false){
        $select_id = str_ireplace('fi_text_select_list_', '', $key);
          $select_list[] = $instance->getField($select_id);
       }
    }
    //select add clild firlds for sale

    $data['fields_data'] = array();
    foreach ($post as $key => $var) {
      if (strpos($key, 'fi_') === 0) $data['fields_data'][str_replace('fi_', '', $key)] = $var;
    }

    $query = "SELECT c.fk_eid FROM #__os_cck_layout as c WHERE c.lid=".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $data['fk_eid'] = $db->loadResult();
    $data['created'] = date("Y-m-d H:i:s");

    $data['title'] = protectInjectionWithoutQuote('title','');
    $data['asset_id'] = 0;
    if(!isset($post['categories'])){
      $data['categories'] = array();
    }
    $data['fk_userid'] = $user->id;
    $data['fk_lid'] = protectInjectionWithoutQuote('lay_type','');
    $data['published'] = 1;
    $data['checked_out'] = 0;
    $data['checked_out_time'] = 0;
    $data['teid'] = 0;
    $instance->fields_data = '';
    $instance->categories = '';
    $query = "SELECT c.title,c.lid,c.params,c.fk_eid ,c.mail, ch.layout_html FROM #__os_cck_layout AS c"
            ."\n LEFT JOIN #__os_cck_entity_instance AS ei ON c.lid = ei.fk_lid"
            ."\n LEFT JOIN #__os_cck_layout_html AS ch ON c.lid = ch.fk_lid"
            ."\n WHERE c.lid = ".protectInjectionWithoutQuote('lay_type');
    $db->setQuery($query);
    $layout = $db->loadObjectList();
    $layout_params = unserialize($layout[0]->params);


    if(checkAccess_cck($layout_params['views']['access_approved'], $user->groups, $data['fk_eid'], 'fields'))
    {
        if(isset($layout_params['views']['layout_approve_on_add'])){
          $data['approved'] = 1;
        }else{
          $data['approved'] = 0;
        }
  
    }else{
        $data['approved'] = 0;
    }        


    if(checkAccess_cck($layout_params['views']['access_publish'], $user->groups, $data['fk_eid'], 'instances'))
    {
        if(isset($layout_params['views']['layout_publish_on_add'])){
          $data['published'] = 1;
        }else{
          $data['published'] = 0;
        }

    }else{
        $data['published'] = 0;
    }



    if (!$instance->bind($data)) {
      echo "<script> alert('Entity with this name alredy exist'); window.history.go(-1); </script>\n";
      exit ();
    }
    //entity_name, entity_tbale_name
    $entitty = new os_cckEntity($db);
    $entitty->load($instance->fk_eid);
    $instance->_entity_name = $entitty->name;
    $instance->_entity_table_name = "#__os_cck_entity_" . $entitty->name;
    $instance->_layout_params = $layout_params['fields'];
    $instance->_layout_html = $layout[0]->layout_html;
    $instance->_field_list = $entitty->getFieldList($instance->_layout_html);
    $instance->_field_list = array_merge($instance->_field_list, $select_list);
    if (!$instance->require_check()) {
      echo "<script> alert('Please fill the required fields!'); window.history.go(-1); </script>\n";
      exit ();
    }
   $fields_for_mail = array();

    foreach($parentIns->getFields() as $field)
    {

         $field_val = $parentIns->getFieldValue($field);

          if(isset($field_val[0])) $field_val = $field_val[0];


          if(isset($field_val->data))
          {
             $fields_for_mail[$field->db_field_name] = $field_val->data;
          }



         if($field->field_type == 'datetime_popup'){

          unset($fields_for_mail[$field->db_field_name]);

         }


      }


    $fields_for_mail = array_merge($fields_for_mail, $data['fields_data']);



    $layout_mail = new os_cckLayout($db);
    $layout_mail->load($instance->fk_lid);
    $mail = unserialize($layout_mail->mail);

    
    foreach($fields_for_mail as $key => $field)
    {
        $mail['cck_mail_body'] = str_replace("{|".$key."|}", $field, $mail['cck_mail_body']);
    }

    $instance->store();
    $query = "INSERT INTO #__os_cck_child_parent_connect (media_type,fid_parent,fid_child)"
            ."\n VALUES ('instance',$parent_instance,$instance->eiid)";
    $db->setQuery($query);
    $db->query();


    $layout_html = urldecode($layout[0]->layout_html);

    if(strpos($layout_html,"{|f-cck_mail|}")){

      // $mail = unserialize($layout[0]->mail);
      $mail_body = $mail['cck_mail_body'];
      if($mail['cck_mail_owner'] == 'on'){
          
          $query = "SELECT u.email FROM #__users AS u"
                  . " LEFT JOIN #__os_cck_entity_instance AS ei ON ei.eiid = " . $parent_instance
                  . " WHERE u.id = fk_userid";
          $db->setQuery($query);
          
          $owner_email = $db->loadResult();       
          
      }else{
          $owner_email = '';
      }
      //check access
      if(isset($mail['cck_mail_access'])){
        $user = JFactory::getUser();      
        if(checkAccess_cck($mail['cck_mail_access'], $user->groups, $data['fk_eid'], 'fields')){

          // foreach ($instance->_field_list as $field) {
          //   if(strpos($mail_body,"{|".$field->db_field_name."|}")){
          //     $field_value = JRequest::getVar('fi_'.$field->db_field_name,'');
          //     $mail_body = str_replace("{|".$field->db_field_name."|}",$field_value, $mail_body);
          //   }
          // }
          //send email
          sendMailCck($mail_body, $mail['cck_mail_subject'],'',$mail['cck_mail_recipient'],$mail['cck_mail_owner'], $owner_email, $mail['cck_mail_encoding']);
        }
      }
    }//end


    $Itemid  = protectInjectionWithoutQuote('Itemid');
    $id = protectInjectionWithoutQuote('fk_eiid');
    if($id){
      $catid = protectInjectionWithoutQuote('catid','');
      if($catid)
        $catid = '&catid='.$catid;
      //JRoute::_("index.php?option=$option&view=instance&id=$id"."$catid&Itemid=$Itemid")
      $app->redirect(JRoute::_($_SERVER['HTTP_REFERER']),JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
    }else{
      //JRoute::_("index.php?option=$option&view=add_instance&Itemid=$Itemid")
      $app->redirect(JRoute::_($_SERVER['HTTP_REFERER']),JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS"));
    }

  }

  static function orderitem($option){
    global $db, $user,$app;
    $id = (int)$_POST['itemid'];
    $buy_quantity = (int)$_POST['buy_quantity'];
    $priceid = (int)$_POST['priceid'];
    $date = date("Y-m-d");
    $query = "select * from #__os_cck_items where id='$id'";
    $db->setQuery($query);
    $item = loadObjectList();
    if (array_key_exists(0, $item))
      $item = $item[0];
    if ($item->quantity < $buy_quantity) {
      $app->redirect(JRoute::_('index.php?option=com_os_cck'), 'Order not created: exceed item quantity.');
      exit;
    }
    if ($item->published != 1) {
      $app->redirect(JRoute::_('index.php?option=com_os_cck'), 'Order not created: wrong item.');
      exit;
    }
    $query = "insert into #__os_cck_order (itemid, quantity, userid, date_income, status, price_plan) VALUES
              ('$id', '$buy_quantity', '$user->id', '$date', 'pending', '$priceid')";
    $db->setQuery($query);
    $db->query();
    $app->redirect(JRoute::_('index.php?option=com_os_cck'), 'Your order successfuly added');
  }

  static function checkCaptcha(){
      global $db, $acl,$user;
  //*********************   begin compare to key   ***************************ч
      $session = JFactory::getSession();
      $type = protectInjectionWithoutQuote('captcha_type','');
      if(isset($_POST['keyguest']) && ($type == 'review_instance'))
        $password = $session->get('captcha_review_instance_keystring', 'default');
      if(isset($_POST['keyguest']) && ($type == 'rent_request_instance'))
        $password = $session->get('captcha_rent_request_instance_keystring', 'default');
      if(isset($_POST['keyguest']) && ($type == 'buy_request_instance'))
        $password = $session->get('captcha_buy_request_instance_keystring', 'default');
      if(isset($_POST['keyguest']) && ($type == 'add_instance'))
        $password = $session->get('captcha_add_instance_keystring', 'default');
      if(isset($_POST['keyguest']) && ($type == 'request_instance'))
        $password = $session->get('captcha_request_instance_keystring', 'default');
  //**********************   end compare to key   *****************************
 
        $session->set('keyguest', $_POST['keyguest']);
        
      if (isset($_POST['keyguest']) && ($_POST['keyguest'] != $password)) {
          print_r( json_encode(array('status'=> false)));
          exit ();
      }else{
          $status =  JText::_("COM_OS_CCK_SUCCESS");
          print_r( json_encode(array("status"=>$status)));
          exit ();
      }
  }
  
  static function SecondCheckCaptcha(){
      global $db, $acl,$user;
      
      $session = JFactory::getSession();
      $password = $session->get('captcha_add_instance_keystring', 'default');
      $keyguest = $session->get('keyguest');
      
  
  
      if ($keyguest != $password) {
          $session->set('keyguest', '');
          return FALSE;
      }else{
          $session->set('keyguest', '');
          return TRUE;
      }
  }

  //this function check - is exist houses in this folder and folders under this category
  static function is_exist_curr_and_subcategory_items($catid,$eid){
    global $db, $user;
    $query = "SELECT * FROM #__os_cck_categories AS cc"
      . "\n INNER JOIN #__os_cck_categories_connect AS a ON a.fk_cid = cc.cid"
      . "\n INNER JOIN #__os_cck_entity_instance AS cei ON cei.eiid = a.fk_eiid AND cei.fk_eid ='".$eid."' "
      . "\n WHERE  cc.cid='$catid' "
      . "\n AND cc.published = '1'"
      . "\n GROUP BY cc.cid"
      . "\n ORDER BY cc.ordering";
    $db->setQuery($query);
    $categories = $db->loadObjectList();
    if($catid == 8){
    count($categories);
   }
    if (count($categories) != 0) return $categories;

    $query = "SELECT cid "
        . "FROM #__os_cck_categories AS cc "
        . " WHERE parent_id='{$catid}' AND published='1' AND section='com_os_cck' ";
    $db->setQuery($query);
    $categories = $db->loadObjectList();

    if (count($categories) == 0) return false;
    foreach ($categories as $k) {
      if (self::is_exist_curr_and_subcategory_items($k->cid,$eid)) return $categories;
    }
    return false;
  }

  //end function

  //*****************************************************************************

  //this function check - is exist folders under this category
  static function is_exist_subcategory_items($catid){
    global $db, $user;
    $query = "SELECT *, COUNT(a.fk_cid) AS numlinks FROM #__os_cck_categories AS cc" .
      "\n JOIN #__os_cck_categories_connect AS a ON a.fk_cid = cc.cid" .
      "\n WHERE  cc.parent_id='$catid' " .
      "\n GROUP BY cc.cid" .
      "\n ORDER BY cc.ordering";
    $db->setQuery($query);
    $categories = $db->loadObjectList();

    if (count($categories) != 0) return $categories;
    if (count($categories) == 0) return false;

    foreach ($categories as $k) {
      if (is_exist_subcategory_items($k->id)) return $categories;
    }
    return false;
  }

  //end function


  /**
   * This function is used to show a list of all houses
   */


  static function cck_constructPathway($data, $type, $mod_type){
    global $app, $db, $option, $Itemid;
    switch ($type) {
      case "category":
          //var_dump($data); exit;
        break;
    }
    $jinput = JFactory::getApplication()->input;
    $task = $jinput->getVar('view', '');
    //var_dump($task);
    if($task != '' && $task != 'all_categories' && $mod_type === 0 && $task != 'featured'){
        
        $pid = $data->cid;
        $pathway = array();
        $pathway_name = array();
        
        while ($pid != 0) {
          $query = "SELECT * FROM #__os_cck_categories ";
          $db->setQuery($query);
          $rows = $db->loadObjectlist('cid');
          $cat = $rows[$pid];
          $pathway[] = JRoute::_('index.php?option=' . $option . '&view=category&catid=' . $cat->cid . '&Itemid=' . $Itemid);
          $pathway_name[] = $cat->name;
          $pid = $cat->parent_id;
        }
        

        $breadcrumbs = $app->getPathWay();
        $pathway = array_reverse($pathway);
        $pathway_name = array_reverse($pathway_name);
        $path_way = $app->getPathway();
        for ($i = 0, $n = count($pathway); $i < $n; $i++) {
          $path_way->addItem($pathway_name[$i], $pathway[$i]);
        }
        //var_dump($path_way);
    }
  }

  static function secretImageCCK($type){
    $session = JFactory::getSession();
    if($type=='review_instance'){
      $pas = $session->get('captcha_review_instance_keystring', 'default');
    }
    if($type=='rent_request_instance'){
      $pas = $session->get('captcha_rent_request_instance_keystring', 'default');
    }
    if($type=='buy_request_instance'){
      $pas = $session->get('captcha_buy_request_instance_keystring', 'default');
    }
    if($type=='request_instance'){
      $pas = $session->get('captcha_request_instance_keystring', 'default');
    }
    if($type=='add_instance'){
      $pas = $session->get('captcha_add_instance_keystring', 'default');
    }
    $new_img = new PWImageCCK();
    $new_img->set_show_string($pas);
    $new_img->get_show_image(2.2, array(mt_rand(0, 50), mt_rand(0, 50), mt_rand(0, 50)), array(mt_rand(200, 255),
        mt_rand(200, 255), mt_rand(200, 255)));
    exit();
  }



  static function userGID($oID){
    global $db, $ueConfig;
    if ($oID > 0) {
      $query = "SELECT group_id FROM #__user_usergroup_map WHERE user_id = '" . $oID . "'";
      $db->setQuery($query);
      $gid = $db->loadResult();
      return $gid;
    } else return 0;
  }



  static function listRssCategories(){
    global $db;
    $Itemid = intval($_GET['Itemid']);
    $catid = protectInjectionWithoutQuote('catid');
    if ($catid == "") $where_catid = "";
    else $where_catid = " AND c.id=" . $catid;
    $query = "SELECT c.id as catid, c.title as ctitle, a.id,"
             ."\n a.description,a.title,a.image,a.edok_link,a.date,a.price"
             ."\n FROM #__categories as c, #__os_cck_items as a"
             ."\n LEFT JOIN #__os_cck_adequacy as b ON a.id=b.itemid"
             ."\n WHERE b.cat_id=c.id AND a.published='1' AND c.published='1'" . $where_catid;
    $db->setQuery($query);
    $cat_all = $db->loadObjectList();
    HTML_os_cck :: showRssCategories($cat_all, $catid);
  }
  
  
    static function ajaxCalculatedCurrency(){
      global $os_cck_configuration, $db;
      
      $input = JFactory::getApplication()->input;
            
      $selectValue = $input->get('selectValue');
      $fid = $input->get('fid', 0, 'INT');
      $eiid = $input->get('eiid', 0, 'INT');
      $lid = $input->get('lid', 0, 'INT');
      
      $entityInstance = new os_cckEntityInstance($db);
      $entityInstance->load($eiid);
      
      
      $query = "SELECT price_value, quantity FROM #__os_cck_content_instances_price WHERE price_id='$selectValue'";
      $db->setQuery($query);
      $value = $db->loadObjectList();
      
      $val = calculatedCurrency($entityInstance, $value[0]->price_value);
      
      $print_value = '';
      
      
      $print_value .= $val[0];
      
      
      echo json_encode(array("success"=>true, "print_value"=>$print_value, "quantity"=>$value[0]->quantity, "value"=>$val[1]));
      return;

  }
  
  static function ajaxCalculatedPrice(){
      global $db;
      
      $input = JFactory::getApplication()->input;
      $index = $input->get('index', 0, 'INT');
      
      $eiid = $input->get('eiid', 0, 'INT');
      
      $coupon = $input->get('coupon', -1, 'INT');
      $entityInstance = new os_cckEntityInstance($db);
      $entityInstance->load($eiid);

      $jsonPriceFields = $input->get('jsonPriceFields', '', 'STRING');
      $price_fields = json_decode($jsonPriceFields);
      //var_dump($coupon); exit;
      $orderingCalculateField = $input->get('orderingCalculateField', 0, 'INT');
      
      $calculated_price= getCalculatedPrice($price_fields, $eiid, $orderingCalculateField, $coupon);
      $coupon_discount = $calculated_price['coupon_discount'];
      $calculated_price = $calculated_price['calculated_price'];
      //var_dump($calculated_price);
      $currency_price = calculatedCurrency($entityInstance, $calculated_price);
      $print_currency_price = '';
      //for($k = 0; $k < count($currency_price); $k++){
        //if(($k + 1) <  count($currency_price)){
        //    $print_currency_price .= $currency_price[0] . ', ';
        //}else{
            $print_currency_price .= $currency_price[0];
        //}
      //}
  	  
      echo json_encode(array("success"=>true, "print_value"=>$print_currency_price, "index"=>$index, "not_currency_value"=>$currency_price[1], "coupon_discount" => $coupon_discount));
      return;
  }
  
  static function addInstanceToCart(){
      global $session, $input;
      
      $price_fields = $input->get('price_fields', '', 'STRING');
      $eiid = $input->get('eiid', 0, 'INT');
      
      $new_product[] = array('eiid' => $eiid, 'price_fields' => $price_fields);
      
      if($session->get('cart', '') != ''){
          $new_price = json_decode($price_fields);
          
          $new_quantity = 1;
          foreach ($new_price as $key => $price){
              if(isset($price->quantity)){
                  $new_quantity = $price->quantity;
                  unset ($new_price[$key]->quantity);
              }
          }
          $cart = $session->get('cart', '');
          $dublicated_item = false;
          foreach($cart as $cart_key => $item){
              
              if($item['eiid'] == $eiid){
                  $prices = json_decode($item['price_fields']);
                  $quantity = 0;
                  foreach($prices as $key => $price){
                      if(isset($price->quantity)){
                          $quantity = $price->quantity;
                          unset ($prices[$key]->quantity);
                      }
                      
                      if(count($prices) == count($new_price)){
                          $dublic = true;
                          foreach ($prices as $price_key => $temp_price){
                              if($temp_price->fid != $new_price[$price_key]->fid || $temp_price->value != $new_price[$price_key]->value){
                                  $dublic = false;
                                  //break;
                              }
                          }
                          //var_dump($dublic);
                          if($dublic){
                            $prices[$key]->quantity = $quantity + $new_quantity;
                            $dublicated_item = true;
                          }
                      }
                  }
                  $json_price = json_encode($prices);
                  $cart[$cart_key]['price_fields'] = $json_price;
              }   
              
          }
          if(!$dublicated_item){
            $cart = array_merge($cart, $new_product);
          }
          $session->set('cart', $cart);
          
      }else{
          $session->set('cart', $new_product);
      }
      $count = 0;
      foreach ($session->get('cart', '') as $cart){
          $price_fields = json_decode($cart['price_fields']);
          if(isset($price_fields[0]->quantity)){
              $count += $price_fields[0]->quantity;
          }else{
              $count += 1;
          }
      }
      //var_dump($session->get('cart', ''));
      echo json_encode(array("success"=>true,"cart_count"=>$count));
      return;
      
  }
  
  
  static function removeProductFromCart(){
      global $session, $input;
      
      $product_key = $input->get('keyProduct', 0, 'INT');
      $cart = $session->get('cart', '');
      if(isset($cart[$product_key])){
          unset($cart[$product_key]);
          $session->set('cart', $cart);
          echo json_encode(array("success"=>true,"cart_count"=>count($session->get('cart', ''))));
          return;
      }
  }
  
  static function getAjaxPriceDetails(){
      global $input;
      
      $price_fields = $input->get('jsonPriceFields', '', 'STRING');
      $price_fields = json_decode($price_fields);
      
      $instance_currency = $input->get('instance_currency', '' , 'STRING');
      $eiid = $input->get('eiid', 0, 'INT');
      
      $coup_id = $input->get('coupon', -1, 'INT');
      $price_details = get_price_details($price_fields, $eiid, $coup_id);
      
      echo json_encode(array('success'=>true,'html'=>$price_details['html']));
  }
  
  static function changeCurrency(){
      global $input, $session;
      
      $currency = $input->get('currency');
      $session->set('currency', $currency);
      echo json_encode(array('success'=>true));
  }
  
  static function ajaxCheckCoupon($self = 0){
      global $db, $input;
      
      $coupon_name = $input->get('coupon' , '', 'STRING');
      
      if($coupon_name != ''){
        $query = "SELECT coup_id FROM #__os_cck_coupons WHERE name='$coupon_name'";
        $db->setQuery($query);
        $coup_id = $db->loadResult();
        
        if(!$coup_id){
            if($self == 0){
                echo json_encode(array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_MISSING_COUPON')));
            }
            return array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_MISSING_COUPON'));
            //exit;
        }
        
        $coupon = new os_cckCoupons($db);
        $coupon->load($coup_id);
        
        if($coupon->max_uses > 0 && $coupon->used_number >= $coupon->max_uses){
            if($self == 0){
                echo json_encode(array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_MAX_USED_COUPON')));
            }
            return array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_MAX_USED_COUPON'));
            //exit;
        }
        
        $now = new DateTime();
        $date_start = new DateTime($coupon->date_start);
        $date_finish = new DateTime($coupon->date_finish);
        
        if($date_start > $now){
            if($self == 0){
                echo json_encode(array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_NOT_START_COUPON').$coupon->date_start.'!'));
            }
            return array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_NOT_START_COUPON').$coupon->date_start.'!');
            //exit;
        }
        if($date_finish < $now ){
            if($self == 0){
                echo json_encode(array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_EXPIRED_COUPON')));
            }
            return array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_EXPIRED_COUPON'));
            //exit;
        }
        
        $user = JFactory::getUser();
        
        $coupon_user_groups = explode(',', $coupon->user_group_ids);
        $coupon_user_groups = array_diff($coupon_user_groups, array(''));
        sort($coupon_user_groups);
        
        if(!checkAccess_cck($coupon_user_groups, $user->groups)){
            if($self == 0){
                echo json_encode(array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_NOT_USER_GROUP_COUPON')));
            }
            return array('success'=>false, 'error_text'=> JText::_('COM_OS_CCK_ERROR_MESSAGE_NOT_USER_GROUP_COUPON'));
            //exit;
        }
        
        if($self == 0){
            echo json_encode(array('success'=>true, 'coup_id'=> $coup_id, 'coupon_type'=> $coupon->type));
        }
        return array('success'=>true, 'coup_id'=> $coup_id, 'coupon_type'=> $coupon->type);
      }
  }
  
  static function fileDownload(){
    global $input, $db, $cck_entity_configuration;
      
    $fid = $input->get('fid', '');
    $eiid = $input->get('eiid', '');
    
    $file = new os_cckFile($db);
    $file->load($fid);
    
    $params = new JRegistry;
          
    
    $field_id = $input->get('field', '');
    $product = false;
    if($field_id != ''){
        $field = new os_cckEntityField($db);
        $field->load($field_id);
        $params->loadString($field->params);
    }
    
    if($params->get('allowed_value', '') == 'on'){
        $max_download = $cck_entity_configuration[$field->fk_eid]['max_product_download'];
        $days_for_product_download = $cck_entity_configuration[$field->fk_eid]['days_for_product_download'];
        $my = JFactory::getUser();
        
        $query = "SELECT ord.* FROM #__os_cck_orders as ord "
                  . "LEFT JOIN #__os_cck_orders_price as opr ON ord.id = opr.fk_order_id "
                  . "WHERE opr.fk_eiid='$eiid' AND ord.user_email='$my->email' AND ord.status='Completed' ORDER BY ord.id DESC LIMIT 0,1";
        $db->setQuery($query);
        $order = $db->loadObjectList();
        
        
        if(!empty($order)){
            $order_date = new DateTime($order[0]->order_date);
            $now_date = new DateTime();
            $max_date = $order_date->modify($days_for_product_download . 'day');
            
            //var_dump($max_date);
            if(($max_download == 0 || $max_download > $order[0]->number_of_downloads)){
                $product = true;
            }else{
                JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_MAX_PRODUCT_DOWNLOADS"));
                return; 
            }
            
            if($days_for_product_download == 0 ||$now_date < $max_date){
                $product = true;
            }else{
                JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_DAYS_PRODUCT_DOWNLOADS"));
                return; 
            }
        }
        

    }
    

    
    if($file->fid != null){
        
    

        $new_temp_file = JPATH_SITE .  $file->filename;
        
        link(JPATH_SITE . $file->filepath, $new_temp_file);
          
        if($product){
            $query = "UPDATE #__os_cck_orders SET number_of_downloads = '".($order[0]->number_of_downloads + 1)."' WHERE id = ".$order[0]->id."";
            $db->setQuery($query);
            $db->query();
        }
        
        file_force_download($new_temp_file, $file->filemime);
        
        

    }elseif(!empty($result)){
//    	unactive_link($result[0]->gid);
    	echo "You are using an invalid link";

    }else{
    	echo "You are using an invalid link";
    }
  }
}
