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


class Instance{

    static function 
    search($option, $catid, $mod_type = 0){

  
      global $app, $db, $user, $mosConfig_absolute_path, $doc, $session,
             $Itemid, $limit, $total, $limitstart, $search,$moduleId, $os_cck_configuration, $cck_entity_configuration;


      $Itemid = intval($_REQUEST['Itemid']);
      $moduleId =(($moduleId == 0 || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
      $instancies = $names = array();
      $search = "";
      $params="";
      $multiple_query ="";
      $layout="";
      $pageNav="";
      $currentcat = NULL;
      $comp_search = array();
      $comp_search_and = array();
      $where = array();
      $fild_name = array();
      $prices = array();
      $multiple_table_name = array();
      $session = JFactory::getSession();
      if(!$moduleId){
        // Params(cck component menu)
        $menu = new JTableMenu($db);
        $menu->load($Itemid);
        $params = new JRegistry;
        $params->loadString($menu->params);
      }else{
        $mod_row =  JTable::getInstance ( 'Module', 'JTable' );//load module tables and params
        if (! $mod_row->load ( $moduleId )) {
          JError::raiseError ( 500, $mod_row->getError () );
        }
        //module params
        if (version_compare(JVERSION, '3.0', 'ge')) {
          $params = new JRegistry;
          $params->loadString($mod_row->params);
        } else {
          $params = new JRegistry($mod_row->params);
        }//end
      }
      $layout = new os_cckLayout($db);
      $search_layout = new os_cckLayout($db);
     //from os cck menu item(Search)
      if($params->get('search_layout') || $params->get('layout_type') == 'search'){
        $search_layout->load($params->get('layout')?$params->get('layout') : $params->get('search_layout'));
        if(!$search_layout->fk_eid){
          JError::raiseWarning(0, JText::_("COM_OS_CCK_REBILD_MENU"));
          return;
        }
      }else{
        if(protectInjectionWithoutQuote('lid','')){
          $search_layout->load(protectInjectionWithoutQuote('lid'));
        }else{
          JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_SEARCH_LAYOUT"));
          return;
        }
      }//end search layouts
      $entity_id = $search_layout->fk_eid;
      $fields_from_params = unserialize($search_layout->params);
      

      if($fields_from_params['views']['all_instance_layout'] == -1){//we set default lyout
        if($layout->getDefaultLayout($entity_id, 'all_instance')){
          $layout->load(intval($layout->getDefaultLayout($entity_id, 'all_instance')));
          $fields_from_params = unserialize($layout->params);

        }else{
          JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ALL_INSTANCE_LAYOUT"));
          return;
        }
      }else{
        $layout->load($fields_from_params['views']['all_instance_layout']);
        $fields_from_params = unserialize($layout->params);
      }
      if(empty($layout->lid)){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ALL_INSTANCE_LAYOUT"));
        return;
      }
      $limit = $fields_from_params['views']['pagenator_limit'];
      if(isset($fields_from_params['views']['limit'])){
      $max_items = $fields_from_params['views']['limit'];
      }else{
        $max_items = 0;
      }
      
      $header = $layout->title;
      $params->def('header', $header);
      $params->def('pageclass_sfx', '');
      $params->def('show_rating', 1);
      $params->def('hits', 1);
      $params->def('back_button', $app->getCfg('back_button'));

      if (array_key_exists("search", $_REQUEST)) {
        $search = urldecode(protectInjectionWithoutQuote('search','','STRING'));
        $search = addslashes($search);
      }
      //var_dump($_REQUEST); exit;
       ////////start create search request

      if (isset($_REQUEST['search_title'])) {
        $comp_search[] = "LOWER(c.title) LIKE '%$search%'";
      }
      $reaquest = JRequest::get('request');
      //maybe shit code below
      //var_dump($_REQUEST); //exit;
      $add_join = array();
      $child_where = array();
      
      foreach($reaquest AS $key => $var){
          $short_key = '';
          if(stripos($key, '_e-p-ch-') !== false){
              $key_array = explode('-', $key);
              
              foreach($key_array as $row){
                  //$short_key .= '-' . $row;
                  if(strpos($row, '_') !== false){
                      //var_dump(is_numeric(explode('_', $row)[0]));
                      if(is_numeric(explode('_', $row)[0])){
                          $field_array = explode('_', $row);
                          continue;
                      }
                  }
              }
              
              $short_key = str_replace('_range_eventfrom', '', $key);
              $short_key = str_replace('_range_eventto', '', $short_key);
              $short_key = str_replace('_from', '', $short_key);
              $short_key = str_replace('_to', '', $short_key);
              //var_dump($short_key);
              //$field_array = explode('_', end($key_array));
              if(!isset($add_join[$field_array[0]])){
                  //LEFT JOIN #__os_cck_content_entity_".$entity_id." AS entcont ON c.eiid = entcont.fk_eiid
                $add_join[$field_array[0]] = " LEFT JOIN #__os_cck_content_entity_".$field_array[0]." AS parent_$field_array[0] ON cpc.fid_child = parent_$field_array[0].fk_eiid ";
              }
              //var_dump($add_join); exit;
              $child_field = new os_cckEntityField($db);
              $child_field->load($field_array[2]);
              //var_dump($short_key.'_range_eventfrom');
              
              if($child_field->field_type == 'text_single_checkbox_onoff' &&
                 $_REQUEST[$key] == 'on'){ //checkbox
                    $comp_search_and[] = "LOWER(parent_$field_array[0]." .$child_field->db_field_name." != '')";
                }
                elseif($child_field->field_type == 'text_select_list' && 
                  $_REQUEST[$key] != 'all' 
                  && $_REQUEST[$key] != '0' ){//list field
                    $like = $db->Quote(protectInjectionWithoutQuote($key));
                    $like = substr_replace($like, "'%", 0, 1);
                    $like = substr_replace($like, "%'", -1, 1);
                    //var_dump(substr_replace($like, "%'", -1, 1));
                    $comp_search_and[] = "LOWER(parent_$field_array[0]." .$child_field->db_field_name. ") LIKE ".
                      $like;


              //var_dump($comp_search_and);
                }
                elseif($child_field->field_type == 'text_radio_buttons'){//radioButton field
                    
                    if($db->Quote(protectInjectionWithoutQuote($key,'')) != "'0'"){

                    $comp_search_and[] = "LOWER(parent_$field_array[0]." .$child_field->db_field_name. ") LIKE ".
                      $db->Quote(protectInjectionWithoutQuote($key,''));
                    }
                    
                }
//                elseif($child_field->type == 'decimal_textfield' 
//                  && isset($_REQUEST['os_cck_search_'.$field['db_field_name'].'_from']) 
//                  && isset($_REQUEST['os_cck_search_'.$field['db_field_name'].'_to'])){
                elseif($child_field->field_type == 'decimal_textfield' 
                  && isset($_REQUEST[$short_key.'_from']) 
                  && isset($_REQUEST[$short_key.'_to'])){

                  //print_r($multiple);exit;//NumberField field
                    $price_from = protectInjectionWithoutQuote($short_key.'_from','')*1;//may be necessary to improve the int number test later
                    $price_to = protectInjectionWithoutQuote($short_key.'_to','')*1;//

                    if($price_to){

                      $comp_search_and[] = "(LOWER(parent_$field_array[0]." .$child_field->db_field_name. ")) BETWEEN ".($price_from)
                      .' AND '.($price_to);

                    }
                }

                elseif($child_field->field_type == 'datetime_popup' && 
                  (isset($_REQUEST[$short_key.'_range_eventfrom']))){//date/time field


                    if(isset($_REQUEST[$short_key.'_range_eventto'])){

                      if(!empty($_REQUEST[$short_key.'_range_eventfrom']) 
                          && empty($_REQUEST[$short_key.'_range_eventto'])){
                        $range_date_from = protectInjectionWithoutQuote($short_key.'_range_eventfrom','');
                        $range_date_from = date_create($range_date_from)->Format('Y-m-d H:i:s');

                        $comp_search_and[] = "parent_$field_array[0]." .$child_field->db_field_name. " BETWEEN '".($range_date_from)
                      ."' AND  '2067-01-01 00:00:00'";

                        //print_r($comp_search_and);

                      }

                      if(empty($_REQUEST[$short_key.'_range_eventfrom']) 
                          && !empty($_REQUEST[$short_key.'_range_eventto'])){
                        $range_date_to = protectInjectionWithoutQuote($short_key.'_range_eventto','');
                        $range_date_to = date_create($range_date_to)->Format('Y-m-d')." 23:59:59";

                        $comp_search_and[] = "parent_$field_array[0]." .$child_field->db_field_name. " BETWEEN '1967-01-01 00:00:00'". 
                        " AND  '".($range_date_to)."'";

                      }

                      if(!empty($_REQUEST[$short_key.'_range_eventfrom']) 
                          && !empty($_REQUEST[$short_key.'_range_eventto'])){
                        $range_date_from = protectInjectionWithoutQuote($short_key.'_range_eventfrom','');
                        $range_date_to = protectInjectionWithoutQuote($short_key.'_range_eventto','');
                        $range_date_from = date_create($range_date_from)->Format('Y-m-d H:i:s');
                        $range_date_to = date_create($range_date_to)->Format('Y-m-d H:i:s');

                        $comp_search_and[] = "parent_$field_array[0]." .$child_field->db_field_name. " BETWEEN '".($range_date_from)
                        ."' AND  '".($range_date_to)."'";

                      }

                    }else{

                      if(!empty($_REQUEST[$short_key.'_range_eventfrom'])){
                        $range_date_from = protectInjectionWithoutQuote($short_key.'_range_eventfrom','');
                        $range_date_from_explode = explode(' ', $range_date_from);
                        if($range_date_from_explode[count($range_date_from_explode)-1] == 'undefined'){
                            $range_date_from = str_replace(' undefined', '', $range_date_from);
                            $range_date_from = date_create($range_date_from)->Format('Y-m-d');
                        }else{

                            $range_date_from = date_create($range_date_from)->Format('Y-m-d H:i:s');
                        }
                        //var_dump($range_date_from); exit;
                        $comp_search_and[] = "parent_$field_array[0]." .$child_field->db_field_name. " LIKE '%".($range_date_from)
                        ."%'";

                      }

                }

            }

            elseif($child_field->field_type == 'datetime_popup' && 
              (!empty($_REQUEST[$short_key.'_dateto']) || 
              !empty($_REQUEST[$short_key.'_datefrom']))){//date/time field

                if(!empty($_REQUEST[$short_key.'_datefrom']))
                {
                  $date_from = protectInjectionWithoutQuote($short_key.'_datefrom','');
                }
                 
                if(!empty($_REQUEST[$short_key.'_dateto'])){
                    $date_to = protectInjectionWithoutQuote($short_key.'_dateto','');
                }

            }else
                $comp_search[] = "LOWER(parent_$field_array[0]." .$child_field->db_field_name. ") LIKE '%$search%'";
              
              
              //var_dump($field_array); exit;
          }
          
        if(stripos($key, 'text_radio_buttons')){
            $key = substr($key, 0, strripos($key, '_'));
        }

        if(strpos($key, '_datefrom')===strlen($key)-9){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('_datefrom','',
            str_replace('os_cck_search_', '', $key))));
        }elseif(strpos($key, '_dateto')===strlen($key)-7){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('_dateto','',
            str_replace('os_cck_search_', '', $key))));

        }elseif(strpos($key, 'os_cck_search_price_search_from')!==FALSE){
         $prices['price_search_from'] = $var;
        }elseif(strpos($key, 'os_cck_search_price_search_to')!==FALSE){
          $prices['price_search_to'] = $var;
        }elseif($key ==  'os_cck_search_price_search' && $var = 'on'){
          $prices['price_search'] = $var;
        }elseif(strpos($key, '_from')===strlen($key)-5){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('_from','',
            str_replace('os_cck_search_', '', $key))));
        }elseif(strpos($key, '_to')===strlen($key)-3){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('_to','',
            str_replace('os_cck_search_', '', $key))));
        }elseif(strpos($key, '_range_eventfrom')===strlen($key)-16){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('_range_eventfrom','',
            str_replace('os_cck_search_', '', $key))));

        }elseif(strpos($key, '_range_eventto')===strlen($key)-14){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('_range_eventto','',
            str_replace('os_cck_search_', '', $key))));

        }elseif(strpos($key, 'os_cck_search_') === 0){
          array_push($fild_name, 'fld.db_field_name='.$db->quote(str_replace('os_cck_search_', '', $key)));
        }
        
      }//end
      
      $fild_name = array_unique($fild_name);
      
      //all names and types of tables/fields
      if($fild_name){
        $query = "SELECT fld.db_field_name, fld.field_type "
                  ."\n FROM #__os_cck_entity_field AS fld "
                  ."\n WHERE ".implode(' OR ', $fild_name)." ORDER BY fid";
        $db->setQuery($query);
        $fields = $db->loadAssocList();
      
        //end
        $allowed_values='';

        //$date_from = '0000-00-00';
        //$date_to = '0000-00-00';

             //print_r($fields);
            //       exit;
            
        foreach($fields as $field){


            if($field['field_type'] == 'text_single_checkbox_onoff' &&
             $_REQUEST['os_cck_search_'.$field['db_field_name']] == 'on'){ //checkbox
                $comp_search_and[] = "LOWER(entcont." .$field['db_field_name']." != '')";
            }
            elseif($field['field_type'] == 'text_select_list' && 
              $_REQUEST['os_cck_search_'.$field['db_field_name']] != 'all' 
              && $_REQUEST['os_cck_search_'.$field['db_field_name']] != '0' ){//list field
                $like = $db->Quote(protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name']));
                $like = substr_replace($like, "'%", 0, 1);
                $like = substr_replace($like, "%'", -1, 1);
                //var_dump(substr_replace($like, "%'", -1, 1));
                $comp_search_and[] = "LOWER(entcont." .$field['db_field_name']. ") LIKE ".
                  $like;
          
          
          //var_dump($comp_search_and);
            }
            elseif($field['field_type'] == 'text_radio_buttons'){//radioButton field
                
                if($db->Quote(protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'],'')) != "'0'"){
                    
                $comp_search_and[] = "LOWER(entcont." .$field['db_field_name']. ") LIKE ".
                  $db->Quote(protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'],''));
                }
          
            }
            elseif($field['field_type'] == 'decimal_textfield' 
              && isset($_REQUEST['os_cck_search_'.$field['db_field_name'].'_from']) 
              && isset($_REQUEST['os_cck_search_'.$field['db_field_name'].'_to'])){

              //print_r($multiple);exit;//NumberField field
                $price_from = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_from','')*1;//may be necessary to improve the int number test later
                $price_to = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_to','')*1;//
                
                if($price_to){

                  $comp_search_and[] = "(LOWER(entcont." .$field['db_field_name']. ")) BETWEEN ".($price_from)
                  .' AND '.($price_to);

                }
            }

            elseif($field['field_type'] == 'datetime_popup' && 
              (isset($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventfrom']))){//date/time field


                if(isset($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventto'])){

                  if(!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventfrom']) 
                      && empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventto'])){
                    $range_date_from = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_range_eventfrom','');
                    $range_date_from = date_create($range_date_from)->Format('Y-m-d H:i:s');

                    $comp_search_and[] = "entcont." .$field['db_field_name']. " BETWEEN '".($range_date_from)
                  ."' AND  '2067-01-01 00:00:00'";

                    //print_r($comp_search_and);
                    
                  }

                  if(empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventfrom']) 
                      && !empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventto'])){
                    $range_date_to = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_range_eventto','');
                    $range_date_to = date_create($range_date_to)->Format('Y-m-d')." 23:59:59";

                    $comp_search_and[] = "entcont." .$field['db_field_name']. " BETWEEN '1967-01-01 00:00:00'". 
                    " AND  '".($range_date_to)."'";
                    
                  }

                  if(!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventfrom']) 
                      && !empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventto'])){
                    $range_date_from = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_range_eventfrom','');
                    $range_date_to = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_range_eventto','');
                    $range_date_from = date_create($range_date_from)->Format('Y-m-d H:i:s');
                    $range_date_to = date_create($range_date_to)->Format('Y-m-d H:i:s');

                    $comp_search_and[] = "entcont." .$field['db_field_name']. " BETWEEN '".($range_date_from)
                    ."' AND  '".($range_date_to)."'";
                    
                  }

                }else{

                  if(!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_range_eventfrom'])){
                    $range_date_from = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_range_eventfrom','');
                    $range_date_from_explode = explode(' ', $range_date_from);
                    if($range_date_from_explode[count($range_date_from_explode)-1] == 'undefined'){
                        $range_date_from = str_replace(' undefined', '', $range_date_from);
                        $range_date_from = date_create($range_date_from)->Format('Y-m-d');
                    }else{
                    
                        $range_date_from = date_create($range_date_from)->Format('Y-m-d H:i:s');
                    }
                    //var_dump($range_date_from); exit;
                    $comp_search_and[] = "entcont." .$field['db_field_name']. " LIKE '%".($range_date_from)
                    ."%'";
                    
                  }

                }

            }

            elseif($field['field_type'] == 'datetime_popup' && 
              (!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_dateto']) || 
              !empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_datefrom']))){//date/time field

                if(!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_datefrom']))
                {
                  $date_from = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_datefrom','');
                }
                 
                if(!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_dateto'])){
                    $date_to = protectInjectionWithoutQuote('os_cck_search_'.$field['db_field_name'].'_dateto','');
                }

            }else
                $comp_search[] = "LOWER(entcont." .$field['db_field_name']. ") LIKE '%$search%'";//not multiple field
        }
      }
      
//      if(!empty($prices)){
//          
//      }

//var_dump(!empty($_REQUEST['os_cck_search_'.$field['db_field_name'].'_datefrom'])); exit;
      ////////creating database search request
      if($catid[0]!=0){
          $k=0;
          $addwhere='';
          foreach($catid as $item){
            $k++;
            if($k==1)$addwhere.='(';
            if($k < count($catid))
                $addwhere.="categ.cid=".$item." OR ";
            else
                $addwhere.="categ.cid=".$item.")";
          }
          array_push($where, $addwhere);
          
      }
      
      array_push($where, "c.published='1'");
      array_push($where, "c.approved='1'");

      array_push($where, "(categ.published IS NULL OR categ.published ='1')");

      $comp_search_str = implode(' OR ', $comp_search);
      if ($comp_search_str != '') {
          array_push($where, '(' . $comp_search_str . ')');
      }
      $comp_search_str_and = implode(' AND ', $comp_search_and);
      if ($comp_search_str_and != '') {
          array_push($where, '(' . $comp_search_str_and . ')');
      }
      
      array_push($where, "c.fk_eid=".$entity_id);
      array_push($where, "lay.type = 'add_instance'");
      $search_date_from = '';
      $search_date_until = '';
      if(isset($date_from)) $search_date_from = date_create($date_from)->Format('Y-m-d H:i:s');
      if(isset($date_to)) $search_date_until = date_create($date_to)->Format('Y-m-d H:i:s');
      $RentSQL = '';

      if($os_cck_configuration->get('rent_type') || $os_cck_configuration->get('by_time')){
          $sign = '=';      
      }else{
          $sign = '';
      }  
      //var_dump($date_from); exit;
      if(isset($date_from) || isset($date_to)){
      $RentSQL = " entcont.fk_eiid NOT IN (select dd.fk_eiid from #__os_cck_rent AS dd
      where ((dd.rent_until >".$sign." '" . $search_date_from . "' and dd.rent_from <= '" . $search_date_from . "') or " .
          " (dd.rent_from <".$sign." '" . $search_date_until . "' and dd.rent_until >= '" . $search_date_until . "' ) or " .
          " (dd.rent_from >".$sign."'" . $search_date_from . "' and dd.rent_until <".$sign." '" . $search_date_until . "'))  AND dd.rent_return IS NULL) ";
  

      if (trim($RentSQL) != "")
          array_push($where, $RentSQL);
      }
      
      if(!empty($prices)){
          //$base_price_fields = getBasePriceFields($entity_id);
          
          if(isset($prices['price_search_to']) && $prices['price_search_to']){
              $currency = $session->get('currency', '');
              if($currency == ''){
                  $currency = cck_getCurrency($os_cck_configuration);
                  $currency = $currency[0]['sign'];
              }
              
              $search_currency = cck_getCurrency($os_cck_configuration);
              $search_currency = $search_currency[0]['sign'];
              
              if($currency == $search_currency){
                  $currency_price_search_from = $prices['price_search_from'];
                  $currency_price_search_to = $prices['price_search_to'];
              }else{
                  $entityInstance = new stdClass();
                  $entityInstance->instance_currency = $currency;
                  $currency_price_search_from = calculatedCurrency($entityInstance, $prices['price_search_from'], $search_currency);
                  $currency_price_search_from = $currency_price_search_from[1];
                  $currency_price_search_to = calculatedCurrency($entityInstance, $prices['price_search_to'], $search_currency);
                  $currency_price_search_to = $currency_price_search_to[1];
              }
              
              //$price_search_from = 
                  $price_search_string = "c.instance_price BETWEEN ".($currency_price_search_from)
                  .' AND '.($currency_price_search_to); 

                }elseif($prices['price_search']){
                      $price_search = (isset($reaquest['search'])) ? $reaquest['search'] : '';
                      
                      if(is_numeric($price_search)){
                          
                      
                          $currency = $session->get('currency', '');
                          if($currency == ''){
                              $currency = cck_getCurrency($os_cck_configuration);
                              $currency = $currency[0]['sign'];
                          }

                          $search_currency = cck_getCurrency($os_cck_configuration);
                          $search_currency = $search_currency[0]['sign'];

                          if($currency == $search_currency){
                              $currency_price_search = $price_search;
                          }else{
                              $entityInstance = new stdClass();
                              $entityInstance->instance_currency = $currency;
                              $currency_price_search = calculatedCurrency($entityInstance, $price_search, $search_currency);
                              $currency_price_search = $currency_price_search[1];
                          }

                          $price_search_string = "c.instance_price = '$currency_price_search'";
                      }else{
                          $price_search_string = '';
                      }
                }
                
                array_push($where, $price_search_string);
      }
      
      //user access
          if($entity_id > 0 && isset($cck_entity_configuration[$entity_id]) && $cck_entity_configuration[$entity_id]['check_access_instances'] == 0){
              $access_where = '';
          }else{
              $access_where = ' AND (' . getWhereUsergroupsConditionCCK('ei') . " or ei.access='') ";
          }
        array_push($where, $access_where);
        foreach($where as $key => $temp_where){
            if($temp_where == ''){
                unset($where[$key]);
            }
        }
      //query for paginator limit
      $query = "SELECT COUNT(DISTINCT c.eiid) FROM #__os_cck_entity_instance as c "//items table
        . "\n LEFT JOIN #__os_cck_content_entity_".$entity_id." AS entcont ON c.eiid = entcont.fk_eiid"//table for text field
        . "\n LEFT JOIN #__os_cck_categories_connect AS catcon ON c.eiid = catcon.fk_eiid"//need for conect entity and categories tables
        //. "\n LEFT JOIN #__os_cck_content_instances_price AS price ON c.eiid = price.fk_eiid"//for price search
        . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid = c.fk_lid"//need for conect entity and categories tables
        . "\n LEFT JOIN #__os_cck_child_parent_connect AS cpc ON cpc.fid_parent = entcont.fk_eiid"
        .$multiple_query . ' ' . implode(' ', $add_join) 
        . "\n LEFT JOIN #__os_cck_categories AS categ ON catcon.fk_cid = categ.cid"//category table
        .((count($where) ? "\nWHERE " . implode(' AND ', $where) : ""));
      
         //print_r($query);exit;
      $db->setQuery($query);
      $total = $db->loadResult();
      if($max_items != '0' && $max_items < $total ) {
          $total = $max_items;
      }
      //creating order by list
      
      $fields_from_params["views"]["sortField"][] = isset($fields_from_params["fields"]["indexed_all_instance_order_by"])?$fields_from_params["fields"]["indexed_all_instance_order_by"]:array();
      $entity = new os_cckEntity($db);
      $entity->load($entity_id);
      $fields_list = $entity->getFieldList();
      if(isset($fields_from_params["fields"]['order_by_fields_all_instance_order_by']) && isset($fields_from_params["views"]["sortField"][0])){
        foreach ($fields_from_params["fields"]['order_by_fields_all_instance_order_by'] as $key => $value) {
          if($value != $fields_from_params["views"]["sortField"][0]){
            $fields_from_params["views"]["sortField"][$key] = array();
            foreach ($fields_list as $entity_field) {
              if($entity_field->db_field_name == $value){
                $fields_from_params["views"]["sortField"][$key]['value'] = $value;
                $fields_from_params["views"]["sortField"][$key]['text'] = $entity_field->field_name;
                $fields_from_params['views']['order_by_fields'][] = $value;

              }
            }
          }
        }
      }
      //end
      //get params after reload page with new order direction
      //session need if we are used pagination(save our sort params in all pages)
      //default value set in cat layout params

      $item_session = JFactory::getSession();

      //$item_session->destroy();




      if(isset($_REQUEST['order_direction']) && !empty($_REQUEST['order_direction'])){
          $fields_from_params["fields"]["sortType_all_instance_order_by"] = protectInjectionWithoutQuote('order_direction','');//need for order by desc//asc
      }elseif($item_session->get('order_direction','')){
          $fields_from_params["fields"]["sortType_all_instance_order_by"] = $item_session->get('order_direction');
      }
      if(isset($_REQUEST['order_field']) && !empty($_REQUEST['order_field'])){
          $fields_from_params["views"]["selected"] = protectInjectionWithoutQuote('order_field','');//need for order by field name
      }elseif($item_session->get('selected','')){
          $fields_from_params["views"]["selected"] = $item_session->get('selected');
      }else
          $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_all_instance_order_by"])?$fields_from_params["fields"]["indexed_all_instance_order_by"]:'';
          //end sort params
      $order_by_selected = $fields_from_params["views"]["selected"];
      if($order_by_selected == 'ceid') $order_by_selected = 'entcont.'.$order_by_selected;
      // $orderby = (!empty($fields_from_params["fields"]["sortType_all_instance_order_by"])) ? $fields_from_params["fields"]["sortType_all_instance_order_by"] : 'ASC';
      
      $pageNav = new JPagination($total, $limitstart, $limit);


      //serch query
      $query = "SELECT distinct c.eiid,catcon.fk_cid FROM #__os_cck_entity_instance as c "
        . "\n LEFT JOIN #__os_cck_content_entity_".$entity_id." AS entcont ON c.eiid = entcont.fk_eiid"//table for text field
        . "\n LEFT JOIN #__os_cck_categories_connect AS catcon ON c.eiid = catcon.fk_eiid"//need for conect entity and categories tables
              . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON c.eiid = price.fk_eiid"//for price search
        . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid = c.fk_lid"//need for conect entity and categories tables
        . "\n LEFT JOIN #__os_cck_child_parent_connect AS cpc ON cpc.fid_parent = entcont.fk_eiid"
        . $multiple_query . ' ' . implode(' ', $add_join) 
        . "\n LEFT JOIN #__os_cck_categories AS categ ON catcon.fk_cid = categ.cid"//category table
        // .$RentSQL_JOIN_1 . $RentSQL_JOIN_2 
        . ((count($where) ? "\nWHERE " . implode(' AND ', $where) : ""))
        . "\n GROUP BY $order_by_selected LIMIT $pageNav->limitstart, $pageNav->limit ";
//echo $query; exit;
      //echo $query; exit;
      $db->setQuery($query);
      $items = $db->loadObjectList();
      //var_dump($items);
      
      foreach ($items as $key => $item) {
        $instance = new os_cckEntityInstance($db);
        $instance->load($item->eiid);
        $instancies[$key] = $instance;
        $instancies[$key]->cat_id = $item->fk_cid;
      }
      ////////end search request
      
      

      if (!isset($instancies[0])) {
          print_r("<h1 >".JText::_("COM_OS_CCK_LABEL_SEARCH_NOTHING_FOUND") . " </h1><br><br> ");
          //return;
      }
      $layout_params = unserialize($layout->params);
      
      $layout_params['all_instance_layout_params'] = $fields_from_params;
      $bootstrap_version = $session->get( 'bootstrap','2');
      $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);
      if(isset($layout_params['attachedModuleIds'])){
        $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
        $mids = array();
        foreach ($layout_params['attachedModule'] as $attachedModuleId) {
          if($attachedModuleId){
            $mids[] = $attachedModuleId;
          }
        }
        if($mids){
          $mids = str_replace('m_', '', $mids);
          $mids = implode(',', $mids);
          $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
          $db->setQuery($query);
          $layout_params['attachedModule'] = $db->loadObjectList('id');
        }
      }
      
      

      $type =  'all_instance';

      require getLayoutPathCCK::getLayoutPathCom($option, $type);
    }

    static function showItem($option, $eiid, $catid, $lid = 0, $mod_type = 0){


      global $app, $db, $user, $Itemid, $os_cck_configuration,$moduleId,$limitstart, $doc;
      
      $jinput = JFactory::getApplication()->input;
      //var_dump($jinput);
      $Itemid = ($Itemid == 0 || empty($Itemid)) ? intval($_REQUEST['Itemid']) : $Itemid;
      $moduleId = (($moduleId == 0 || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
      //var_dump($eiid);
      if(!$moduleId){
        // Params(cck component menu)
        $menu = new JTableMenu($db);
        $menu->load($Itemid);
        $params = new JRegistry;
        $params->loadString($menu->params);
      }else{
        $mod_row = JTable::getInstance ( 'Module', 'JTable' );//load module tables and params
        if (! $mod_row->load ( $moduleId )) {
          JError::raiseError ( 500, $mod_row->getError () );
        }
        //module params
        if (version_compare(JVERSION, '3.0', 'ge')) {
          $params = new JRegistry;
          $params->loadString($mod_row->params);
        } else {
          $params = new JRegistry($mod_row->params);
        }//end
      }
      $session = JFactory::getSession();
      $nextInstId = 0;
      $prevInstId = 0;
     
      $queryItemIds = $session->get("queryItemIds");
      $category_layout = new os_cckLayout($db);
      $all_instance_layout = new os_cckLayout($db);
      $layout = new os_cckLayout($db);
      $entityInstance = new os_cckEntityInstance($db);
      $search_layout = new os_cckLayout($db);
      
      if(!$lid){


        //if we set menu all_cat(category_layout layout take from all_cat layout,
        //entity_layout and entity_type from category layout(set in the backend))
        //if we have a module then params takes from module
        if($params->get('allcategories_layout') || $params->get('layout_type') == 'all_categories'){
          $all_category_layout = new os_cckLayout($db);
          $all_category_layout->load($params->get('layout')?$params->get('layout') : $params->get('allcategories_layout'));//(expression ? true_value : false_value)
          $fields_from_params = unserialize($all_category_layout->params);
          $entity_id = $all_category_layout->fk_eid;
          //if we set default category lyout
          if($fields_from_params['views']['category_layout'] == 1){
            if($category_layout->getDefaultLayout($entity_id, 'category')){
                $category_layout->load(intval($category_layout->getDefaultLayout($entity_id, 'category')));
                $fields_from_params = unserialize($category_layout->params);
            }
          }else{
            $category_layout->load($fields_from_params['views']['category_layout']);
            $fields_from_params = unserialize($category_layout->params);
          }
          //if we set default items lyout
          if($fields_from_params['views']['item_layout'] == 1){
            if($layout->getDefaultLayout($entity_id, 'instance')){
              $layout->load(intval($layout->getDefaultLayout($entity_id, 'instance')));
            }else{
              JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ENTITY_LAYOUT"));
              return;
            }
          }else{
              $layout->load($fields_from_params['views']['item_layout']);
          }
        }//end all_cat menu

        //if we display category menu
        if($params->get('category_layout') || $params->get('layout_type') == 'category'){
          $category_layout->load($params->get('layout')?$params->get('layout') : $params->get('category_layout'));
          $fields_from_params = unserialize($category_layout->params);
          $entity_id = $category_layout->fk_eid;
          if($fields_from_params['views']['item_layout'] == 1){
            if($layout->getDefaultLayout($entity_id, 'instance')){
              $layout->load(intval($layout->getDefaultLayout($entity_id, 'instance')));
            }else{
              JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ENTITY_LAYOUT"));
              return;
            }
          }else{
            $layout->load($fields_from_params['views']['item_layout']);
          }
        }//end category menu

        //if we display category with map menu


        if($params->get('all_instance_layout')){
          $all_instance_layout->load($params->get('all_instance_layout'));
          $fields_from_params = unserialize($all_instance_layout->params);
          $entity_id = $all_instance_layout->fk_eid;
          if($fields_from_params['views']['item_layout'] == 1){
            if($layout->getDefaultLayout($entity_id, 'instance')){
              $layout->load(intval($layout->getDefaultLayout($entity_id, 'instance')));
            }else{
              JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ENTITY_LAYOUT"));
              return;
            }
          }else{
            $layout->load($fields_from_params['views']['item_layout']);
          }
        }//end category with map menu

        //if we display one item menu
        if($params->get('instance_layout') || $params->get('layout_type') == 'instance'){
          $layout->load($params->get('layout')?$params->get('layout') : $params->get('instance_layout'));
          if(!$layout->fk_eid || !$layout->published){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_ENTITY_LAYOUT"));
            return;
          }

          $entity_id = $layout->fk_eid;
          $entityInstance->load($params->get('instance'));
            if(!$entityInstance->eiid){
              JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_INSTANCE"));
              return;
            }
        }else{



          $fields_from_params = unserialize($layout->params);

          if(isset($layout_params['fields']['cck_instance_navigation_published']) 
        && $layout_params['fields']['cck_instance_navigation_published']){
            //query for pagination//itemindex -- index number of instance in cat-instances array
            $andCID = '';


            if($catid > 0)
              $andCID = "AND cc.fk_cid=$catid";
            $query = "SELECT eiid FROM #__os_cck_entity_instance as i "
                    ."\n LEFT JOIN #__os_cck_layout as l ON l.lid = i.fk_lid "
                    ."\n LEFT JOIN #__os_cck_categories_connect as cc ON cc.fk_eiid = i.eiid "
                    ."\n WHERE l.type ='add_instance' ".$andCID." AND i.published=1 "
                    ."\n AND i.approved=1   AND i.eiid > ".intval($eiid)
                    ."\n AND i.fk_eid= " . $layout->fk_eid
                    ."\n ORDER BY eiid LIMIT 1";
            $db->setQuery($query);
            $nextInstId = $db->loadResult();
            
            $query = "SELECT eiid FROM #__os_cck_entity_instance as i "
                    ."\n LEFT JOIN #__os_cck_layout as l ON l.lid = i.fk_lid "
                    ."\n LEFT JOIN #__os_cck_categories_connect as cc ON cc.fk_eiid = i.eiid "
                    ."\n WHERE l.type ='add_instance' ".$andCID." AND i.published=1 "
                    ."\n AND i.approved=1   AND i.eiid < ".intval($eiid)
                    ."\n AND i.fk_eid= " . $layout->fk_eid
                    ."\n ORDER BY eiid DESC LIMIT 1";
            $db->setQuery($query);
            $prevInstId = $db->loadResult();



            if(isset($_REQUEST['next']) && $_REQUEST['next'] > 0 && $nextInstId){
              $entityInstance->load(intval($nextInstId));
            }else if(isset($_REQUEST['prev']) && $_REQUEST['prev'] > 0 && $prevInstId){
              $entityInstance->load(intval($prevInstId));
            }else{
              $entityInstance->load(intval($eiid));
            }
          }
        }//end item menu
        //
        
        
        if($entityInstance->access != ''){
            $groupAccess = explode(',', $entityInstance->access);
        }else{
            $groupAccess = array();
            $groupAccess[] = '1';
        }
        
        $user = JFactory::getUser();
        if (!checkAccess_cck($groupAccess, $user->groups, $entity_id, 'instances')){
          JError::raiseWarning(0, JText::_("COM_OS_CCK_ACCESS_INSTANCE"));
          return;
        }
        
        //if we display search menu
        if($params->get('search_layout') || $params->get('layout_type') == 'search'){
          $search_layout->load($params->get('layout')?$params->get('layout') : $params->get('search_layout'));
          $entity_id = $search_layout->fk_eid;
          $fields_from_params = unserialize($search_layout->params);
          if($fields_from_params['views']['all_instance_layout'] == 1){//we set default lyout
            if($category_layout->getDefaultLayout($entity_id, 'category')){
              $category_layout->load(intval($category_layout->getDefaultLayout($entity_id, 'category')));
              $fields_from_params = unserialize($category_layout->params);
            }else{
              JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_CATEGORY_LAYOUT"));
              return;
            }
          }else{
            $category_layout->load($fields_from_params['views']['all_instance_layout']);
            $fields_from_params = unserialize($category_layout->params);
          }
          if($fields_from_params['views']['item_layout'] == 1){
            if($layout->getDefaultLayout($entity_id, 'instance')){
              $layout->load(intval($layout->getDefaultLayout($entity_id, 'instance')));
            }else{
              JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_ENTITY_LAYOUT"));
              return;
            }
          }else{
            $layout->load($fields_from_params['views']['item_layout']);
          }
        }//end search menu


      }else{


        $layout->load($lid);
        $fields_from_params = unserialize($layout->params);
        // if(isset($fields_from_params['views']['show_navigation'])){
          //query for pagination//itemindex -- index number of instance in cat-instances array
          $andCID = '';
          if($catid > 0)


          $andCID = "AND cc.fk_cid=$catid";
          $query = "SELECT eiid FROM #__os_cck_entity_instance as i "
                  ."\n LEFT JOIN #__os_cck_layout as l ON l.lid = i.fk_lid "
                  ."\n LEFT JOIN #__os_cck_categories_connect as cc ON cc.fk_eiid = i.eiid "
                  ."\n WHERE l.type ='add_instance' ".$andCID." AND i.published=1 "
                  ."\n AND i.approved=1   AND i.eiid > ".intval($eiid)
                  ."\n AND i.fk_eid= " . $layout->fk_eid
                    ."\n ORDER BY eiid LIMIT 1";
            //var_dump($query); exit;
          $db->setQuery($query);
          $nextInstId = $db->loadResult();

          $query = "SELECT eiid FROM #__os_cck_entity_instance as i "
                  ."\n LEFT JOIN #__os_cck_layout as l ON l.lid = i.fk_lid "
                  ."\n LEFT JOIN #__os_cck_categories_connect as cc ON cc.fk_eiid = i.eiid "
                  ."\n WHERE l.type ='add_instance' ".$andCID." AND i.published=1 "
                  ."\n AND i.approved=1   AND i.eiid < ".intval($eiid)
                  ."\n AND i.fk_eid= " . $layout->fk_eid
                    ."\n ORDER BY eiid DESC LIMIT 1";
          $db->setQuery($query);
          $prevInstId = $db->loadResult();


          if(isset($_REQUEST['next']) && $_REQUEST['next'] > 0 && $nextInstId){
            $entityInstance->load(intval($nextInstId));
          }else if(isset($_REQUEST['prev']) && $_REQUEST['prev'] > 0 && $prevInstId){
            $entityInstance->load(intval($prevInstId));
          }else{
            $entityInstance->load(intval($eiid));
          }
        // }else{
        //   $entityInstance->load(intval($eiid));
        // }

        //features
        if($entityInstance->featured_clicks == 0){
          //return;
        }else{
          $featured_clicks = 0;
          if($entityInstance->featured_clicks != 0 && $entityInstance->featured_clicks != ''){
            $featured_clicks = 1;
          }
          $query = "UPDATE #__os_cck_entity_instance SET "
                    ."\n featured_clicks = featured_clicks-".$featured_clicks
                    ."\n WHERE eiid=".$entityInstance->eiid;
          $db->setQuery($query);
          $db->query();
        }
      }

      
        if($entityInstance->meta_title != ''){
            $doc->setTitle($entityInstance->meta_title);
        }
        if($entityInstance->meta_description != ''){
            $doc->setDescription($entityInstance->meta_description);
        }
        if($entityInstance->meta_keywords != ''){
            $doc->setMetaData('keywords',$entityInstance->meta_keywords);
        }
        if($entityInstance->meta_robots > 0){
            switch ($entityInstance->meta_robots){
            case '1':
                $robots_text = 'index, follow';
            case '2':
                $robots_text = 'noindex, follow';
            case '3':
                $robots_text = 'index, nofollow';
            case '4':
                $robots_text = 'noindex, nofollow';
            }    
            $doc->setMetaData('robots',$robots_text);
            
        }
      


      if(!$layout->title || $layout->type != 'instance'){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_INSTANCE"));
        return;
      }
      if (!$entityInstance->eiid){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_INSTANCE") );
        return;
      }
      if(!$entityInstance->published || !$entityInstance->approved){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_INSTANCE_ERROR_APPROVE_PUBLISH") );
        return;
      }
      $header = $category_layout->title;
      $params->def('header', $header);
      $params->def('pageclass_sfx', '');
      if ($catid > 0) {
        $query = "SELECT * FROM #__os_cck_categories WHERE cid='{$catid}'";
        $db->setQuery($query);
        $category = $db->loadObjectList();
        os_cck_site_controller::cck_constructPathway($category[0], 'instance', $mod_type);
        $pathway = JRoute::_('index.php?option=' . $option . '&task=showCategory&catid=' . 
          $category[0]->cid . '&Itemid=' . $Itemid);
        $pathway_name = $category[0]->name;
        
        if($entityInstance->title != ''){
            $app->getPathway()->addItem($entityInstance->title, $pathway);
        }else{
            $query = "SELECT name FROM #__os_cck_entity WHERE eid = " . $entityInstance->fk_eid;
            $db->setQuery($query);
            $entity_name = $db->loadResult();
            $app->getPathway()->addItem('One ' . $entity_name, $pathway);
            //var_dump($entity_name);
        }

      } else {


        $query = "SELECT * FROM #__os_cck_categories AS cc "
                . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON cc.cid=ccc.fk_cid "
                . "\n WHERE ccc.fk_eiid=" . $entityInstance->eiid . ""
                . "\n LIMIT 0,1";
        $db->setQuery($query);
        $category = $db->loadObjectList();
        $app->getPathway()->addItem($entityInstance->title, $entityInstance->title);

      }
      if($category)
        $category = $category[0];

      //Record the hit
      $sql = "UPDATE #__os_cck_entity_instance SET hits = hits + 1 WHERE eiid = " . $entityInstance->eiid . "";
      $db->setQuery($sql);
      $db->query();
      $params->def('pageclass_sfx', '');
      $params->def('item_description', 1);
      $params->def('back_button', $app->getCfg('back_button'));
      $currentcat = new stdclass();
      $currentcat->header = $params->get('header');
      $currentcat->header = $currentcat->header . ": " . $entityInstance->title;
      $bootstrap_version = $session->get( 'bootstrap','2');
      $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);
      $layout_params = unserialize($layout->params);
      $layout_params['custom_fields'] = unserialize($layout->custom_fields);
      $layout_params['nextInstId'] = $nextInstId;
      $layout_params['prevInstId'] = $prevInstId;

      $layout_params['has_price'] = 0;
      $layout->field_list = $entityInstance->getFields();
      foreach ($layout->field_list as $field) {
        $html = urldecode($layout->layout_html);
        if(strpos($html,"{|f-".$field->fid."|}")){
          $layout_fields = $layout_params['fields'];
          if($field->field_type == 'decimal_textfield' && $layout_params['has_price'] == 0){
            if(isset($layout_fields[$field->db_field_name.'_field_type']) && $layout_fields[$field->db_field_name.'_field_type'] == 'price'){
              $layout_params['has_price'] = 1;
            }
          }
        }
      }
      
      if(isset($layout_params['attachedModuleIds'])){
        $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
        $mids = array();
        foreach ($layout_params['attachedModule'] as $attachedModuleId) {
          if($attachedModuleId){
            $mids[] = $attachedModuleId;
          }
        }
        
        if($mids){
          $mids = str_replace('m_', '', $mids);
          foreach($mids as $key => $mid){
              if($mid == 'undefined'){
                  unset($mids[$key]);
              }
          }
          if(!empty($mids)){
              $mids = implode(',', $mids);
              $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";

              $db->setQuery($query);
              $layout_params['attachedModule'] = $db->loadObjectList('id');
          }
        }
      }
      //features
      if($entityInstance->featured_shows == 0){
        //return;
      }else{
        $featured_shows = 0;
        if($entityInstance->featured_shows != 0 && $entityInstance->featured_shows != ''){
          $featured_shows = 1;
        }
        $query = "UPDATE #__os_cck_entity_instance SET "
                  ."\n featured_shows = featured_shows-".$featured_shows
                  ."\n WHERE eiid=".$entityInstance->eiid;
        $db->setQuery($query);
        $db->query();
      }

      //features
      $type = 'instance';

      //check access for category

      if(isset($category) && !empty($category)){ //is not isset category (skip access checking)

        $db->setQuery("SELECT * FROM `#__os_cck_categories` e WHERE e.`cid` = {$category->cid}");
        $carCatParams =$db->loadObjectList();

        if(!$carCatParams){
          JError::raiseWarning(0, JText::_("COM_OS_CCK_ACCESS_CATEGORY"));
          return;
        }

        $carCatParams = $carCatParams[0];
        //user access to category
        $user = JFactory::getUser();
        if (($carCatParams->params == implode(',',array_diff(explode(',',$carCatParams->params),$user->groups)))
            && $carCatParams->params != 1) {
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ACCESS_CATEGORY"));
            return;
        }//end  
      }
      //check access for category

      require getLayoutPathCCK::getLayoutPathCom($option,$type);
    }

    static function  show_all_instance($option, $lid, $mod_type = 0){


      global $app, $db, $user ,$doc;
      global $Itemid, $os_cck_configuration, $limit, $total, $limitstart,$moduleId, $cck_entity_configuration;
      $Itemid = intval($_REQUEST['Itemid']);
      $moduleId =(($moduleId == 0
                   || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
      if(!$moduleId){
        // Params(cck component menu)
        $menu = new JTableMenu($db);
        $menu->load($Itemid);
        $params = new JRegistry;
        $params->loadString($menu->params);
      }else{
        $mod_row =  JTable::getInstance ( 'Module', 'JTable' );//load module tables and params
        if (! $mod_row->load ( $moduleId )) {
          JError::raiseError ( 500, $mod_row->getError () );
        }
        //module params
        $params = new JRegistry;
        $params->loadString($mod_row->params);
        //itemId
        $query = "SELECT id  FROM #__menu WHERE menutype like '%menu%'"
                        . "\n AND link LIKE '%option=com_os_cck%'"
                        . "\n AND params LIKE '%back_button%'"
                        . "\n AND params LIKE '%all_instance%'"
                        . "\n AND published = 1";
        $db->setQuery($query);
        $Itemid = $db->loadResult();
         if($params->get('ItemId'))$Itemid=$params->get('ItemId');
      }
      $layout = new os_cckLayout($db);
      $layout->load($lid);


      if(empty($layout->title) || $layout->type != 'all_instance'){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_MENU_NO_LAYOUT"));
        return;
      }
      $entity_layout = new os_cckLayout($db);
      if($params->get('all_instance_layout') || $params->get('layout') || $layout->title){
        $fields_from_params = unserialize($layout->params);
        $entity_id = $layout->fk_eid;
      }//end all instance menu
      
      if(!isset($fields_from_params['views']['show_request_layout']) || empty($fields_from_params['views']['show_request_layout'])){
          JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_NO_REQUEST_LAYOUT"));
          return;
      }

      $entity_name = $entity_id;
      $limit = $fields_from_params['views']['pagenator_limit'];
      if(isset($fields_from_params['views']['limit'])){
          $max_items = $fields_from_params['views']['limit'];
      }else{
          $max_items = 0;
      }
      $layout->layout_html = $layout->getLayoutHtml('2');
      $lay_html = urldecode($layout->layout_html);
       //var_dump($lay_html);
      //creating order by list

       if(stripos($lay_html, 'all_instance_order_by')){
          $fields_from_params["views"]["sortField"][] = isset($fields_from_params["fields"]["indexed_all_instance_order_by"])?$fields_from_params["fields"]["indexed_all_instance_order_by"]:array();
          $entity = new os_cckEntity($db);
          $entity->load($entity_id);
          $fields_list = $entity->getFieldList();
          if(isset($fields_from_params["fields"]['order_by_fields_all_instance_order_by']) && isset($fields_from_params["views"]["sortField"][0])){
            foreach ($fields_from_params["fields"]['order_by_fields_all_instance_order_by'] as $key => $value) {
              if($value != $fields_from_params["views"]["sortField"][0]){
                $fields_from_params["views"]["sortField"][$key] = array();
                foreach ($fields_list as $entity_field) {
                  if($entity_field->db_field_name == $value){
                    $fields_from_params["views"]["sortField"][$key]['value'] = $value;
                    $fields_from_params["views"]["sortField"][$key]['text'] = $entity_field->field_name;
                    $fields_from_params['views']['order_by_fields'][] = $value;

                  }
                }
              }
            }
          }
          

          //end
          //get params after reload page with new order direction
          //session need if we are used pagination(save our sort params in all pages)
          //default value set in cat layout params

          $item_session = JFactory::getSession();

          //$item_session->destroy();



          if($mod_type == 0){
              if(isset($_REQUEST['order_direction']) && !empty($_REQUEST['order_direction'])){
                  $fields_from_params["fields"]["sortType_all_instance_order_by"] = protectInjectionWithoutQuote('order_direction','');//need for order by desc//asc
              }elseif($item_session->get('order_direction','')){
                  $fields_from_params["fields"]["sortType_all_instance_order_by"] = $item_session->get('order_direction');
              }
          } else{
            $fields_from_params["views"]["sortType_all_instance_order_by"] = isset($fields_from_params["fields"]["sortType_all_instance_order_by"]) ? $fields_from_params["fields"]["sortType_all_instance_order_by"] : '';
          }
          
            if(isset($_REQUEST['order_field']) && !empty($_REQUEST['order_field'])){ 
                $query = "SELECT * FROM #__os_cck_content_entity_$entity_name LIMIT 0,1";
                $db->setQuery($query);
                $collumns = $db->loadObjectList();
                if(property_exists($collumns[0], $_REQUEST['order_field'])){
                    $fields_from_params["views"]["selected"] = $_REQUEST['order_field'];
                }else{
                    $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_category_order_by"])?$fields_from_params["fields"]["indexed_category_order_by"]:'';
                }
              //$fields_from_params["views"]["selected"] = protectInjectionWithoutQuote('order_field','');//need for order by field name
            }elseif($item_session->get('selected','')){ 
                $query = "SELECT * FROM #__os_cck_content_entity_$entity_name LIMIT 0,1";
                $db->setQuery($query);
                $collumns = $db->loadObjectList();
                if(property_exists($collumns[0], $item_session->get('selected'))){
                    $fields_from_params["views"]["selected"] = $item_session->get('selected');
                }else{
                    $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_category_order_by"])?$fields_from_params["fields"]["indexed_category_order_by"]:'';
                }
          //$fields_from_params["views"]["selected"] = $session->get('selected');
            }else
              $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_all_instance_order_by"])?$fields_from_params["fields"]["indexed_all_instance_order_by"]:'';
              //end sort params
          $header = $layout->title;
          $params->def('header', $header);
          $params->def('pageclass_sfx', '');
       }

      
       //alfabetical pagination
       //$bootstrap_version = $session->get( 'bootstrap','2');
      
          $sp = 0;
          if (array_key_exists("sp", $_REQUEST)){
            $sp = JFactory::getApplication()->input->getInt('sp', 0);
          }
          $where = '';
          $list_str = array();
          if (array_key_exists("letindex", $_REQUEST)) {
              $search = JFactory::getApplication()->input->getCmd("letindex",'');

              if(isset($_REQUEST['now_indexed']) && $search != 'all'){

                if($sp == 1 && $_REQUEST['now_indexed'] == $fields_from_params["views"]["selected"]){
                  $where = " AND LOWER(instance." . $_REQUEST['now_indexed'] . ") LIKE '$search%' ";
                }else{
                  $where = '';
                }
              }
          }
          $need_lid = JRequest::getInt('lid');
          if($need_lid == $lid){
            $event_date = (JRequest::getVar('event_date'))?JRequest::getVar('event_date'):false;
            $event_date_field = (JRequest::getVar('event_date_field'))?JRequest::getVar('event_date_field'):false;
          }else{
            $event_date = false;
            $event_date_field = false;
          }
//          $event_date = (JRequest::getVar('event_date'))?JRequest::getVar('event_date'):false;
//          $event_date_field = (JRequest::getVar('event_date_field'))?JRequest::getVar('event_date_field'):false;

          if($event_date_field && $event_date){
            $event_where = " AND " . $event_date_field . " LIKE '%" . $event_date . "%'";
          }else{
            $event_where = '';
          }
          
          $custom_sql_where = '';
            if(isset($fields_from_params['views']['request_layout_sql_show']) && !empty($fields_from_params['views']['request_layout_sql_show'])){
                foreach ($fields_from_params['views']['request_layout_sql_show'] as $request_layout){
                    foreach($request_layout as $sql_show){
                        $custom_sql_where .= ' ' . $sql_show . ' ';
                    }
                } 
            }
                  //user access
          if($entity_id > 0 && isset($cck_entity_configuration[$entity_id]) && $cck_entity_configuration[$entity_id]['check_access_instances'] == 0){
              $access_where = '';
          }else{
              $access_where = ' AND (' . getWhereUsergroupsConditionCCK('ei') . " or ei.access='') ";
          }
          
          
        if(stripos('joom_alphabetical', $lay_html)){
          if(strstr($fields_from_params["views"]["selected"], 'text_textfield') !== false){

              $query = " SELECT  DISTINCT UPPER(SUBSTRING(instance.".$fields_from_params["views"]["selected"].", 1,1)) AS symb FROM  #__os_cck_entity_instance AS ei "
                  . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
                  . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
                  . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
                  . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
                  . "\n WHERE ei.published='1' "
                  . "\n AND ei.approved='1' "
                  . "\n AND lay.type='add_instance' "
                  . "\n AND ei.fk_eid='" . $entity_id . "' $event_where  $access_where $custom_sql_where GROUP BY ei.eiid ORDER BY symb";
          
              $db->setQuery($query);
              $tmp_arr = $db->loadObjectList();

              if(count($tmp_arr)>1){

              $symb_list_str = '<ul>';
              foreach($tmp_arr as $symbol){
                  if(empty($symbol->symb)){
                    continue;
                  }

                  if($event_where!=''){
                    $symb_list_str.= '<li><a href="index.php?option=' . $option . 
                    '&view=all_instance&letindex=' . $symbol->symb . '&sp=1&Itemid=' . $Itemid . '&now_indexed=' . $fields_from_params["views"]["selected"] . '&event_date='.$event_date.'&event_date_field='.$event_date_field.'&lid='.$lid.'">' . 
                    $symbol->symb . '</a></li> ';
                  }else{
                    $symb_list_str.= '<li><a href="index.php?option=' . $option . 
                    '&view=all_instance&letindex=' . $symbol->symb . '&sp=1&Itemid=' . $Itemid . 
                      '&now_indexed=' . $fields_from_params["views"]["selected"] . '">' . 
                    $symbol->symb . '</a></li> ';
                  }

              }

              //check string not empty
              $temp_var =  strip_tags($symb_list_str) ;
              if(!empty( $temp_var ) ){

                  if($event_where!=''){
                    $symb_list_str.= '<li><a href="index.php?option=' . $option . 
                    '&view=all_instance&letindex=all&sp=1&Itemid=' . $Itemid . '&now_indexed=' . $fields_from_params["views"]["selected"] . '&event_date='.$event_date.'&event_date_field='.$event_date_field.'&lid='.$lid.'">all</a></li> ';
                  }else{
                    $symb_list_str.= '<li><a href="index.php?option=' . $option . 
                    '&view=all_instance&letindex=all&sp=1&Itemid=' . $Itemid . 
                      '&now_indexed=' . $fields_from_params["views"]["selected"] . '">all</a></li> ';
                  }
              }

              $symb_list_str.= "</ul>";

              $list_str['symbol_list'] = $symb_list_str;

              }else{
                $list_str['symbol_list'] = false;
              }
          }else{
            $list_str['symbol_list'] = false;
          }
      }
     $layout_params = unserialize($layout->params);
     $featured = (isset($layout_params['views']['featured'])?$layout_params['views']['featured']:'0');

        //check featured layout or not
      if ( (isset($featured) && $featured != 0)  ){
        $where .= " AND ( ei.featured_clicks > 0 || ei.featured_shows > 1 ) ";
      } 
            

      $query = " SELECT COUNT(DISTINCT ei.eiid) FROM  #__os_cck_entity_instance AS ei "
              . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
              . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
              . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
              . "\n WHERE ei.published='1' "
              . "\n AND ei.approved='1' "
              . "\n AND lay.type='add_instance' "
              . "\n AND ei.fk_eid='" . $entity_id . "' $where $event_where $access_where $custom_sql_where ";
      
      $db->setQuery($query);
      $total = $db->loadResult();
      if($max_items != '0' && $max_items < $total ) {
        if($limit > $max_items )$limit = $max_items;
        $total = $max_items;
      }




     if( isset($fields_from_params['views']['selected']) && 
         ( !isset( $fields_from_params['views']['order_by_fields'] ) || !is_array( $fields_from_params['views']['order_by_fields'] ) ||
          ( is_array( $fields_from_params['views']['order_by_fields'] ) && !in_array($fields_from_params["views"]["selected"],$fields_from_params['views']['order_by_fields']) 
          ) 
         )
        )
     {
          $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_all_instance_order_by"])?$fields_from_params["fields"]["indexed_all_instance_order_by"]:'';
     }

     $pageNav = new JPagination($total, $limitstart, $limit);


     $query = " SELECT  ei.eiid,ccc.fk_cid FROM  #__os_cck_entity_instance AS ei "
              . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
              . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
              . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
              . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
              . "\n WHERE ei.published='1' "
              . "\n AND ei.approved='1' "
              . "\n AND lay.type='add_instance' "
              . "\n AND ei.fk_eid='" . $entity_id . "' $where $event_where $access_where $custom_sql_where GROUP BY ei.eiid ";
      //var_dump($query);
        if(isset($fields_from_params["fields"]["indexed_all_instance_order_by"])) { // if selected sortable field
          $orderby = (!empty($fields_from_params["fields"]["sortType_all_instance_order_by"])) ? $fields_from_params["fields"]["sortType_all_instance_order_by"] : 'ASC';
          
          if (isset($fields_from_params["views"]["selected"]) && !empty( $fields_from_params["views"]["selected"])) {
              $index = 0;
              
              foreach ($fields_from_params['views']['show_request_layout'] as $key => $val){
              
                  $request_layout = new os_cckLayout($db);
                  $request_layout->load($key);
                  $request_layout_fields_params = unserialize($request_layout->params);
                  $views_selected = $fields_from_params["views"]["selected"] . '_average';
                  
                  if($request_layout->type == 'instance' && $index == 0){
                      
                      if($fields_from_params["views"]["selected"] == 'title'){
                          
                          $query .= "ORDER BY ei.title $orderby ";
                      }
                      elseif (stripos($fields_from_params["views"]["selected"], 'categoryfield') !== FALSE) {
                          
                              $query .= "ORDER BY cat.name $orderby ";
                      }
                      elseif(stripos($fields_from_params["views"]["selected"], 'rating_field') !== FALSE && isset($request_layout_fields_params['fields'][$views_selected]) && $request_layout_fields_params['fields'][$views_selected] == 'on'){
                          
                          $query = "SELECT  ei.eiid,ccc.fk_cid,AVG(instance2.`" . $fields_from_params['views']['selected'] . "`) as rating FROM  #__os_cck_entity_instance AS ei "
                                     . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
                                     . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
                                     . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
                                     . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
                                     . "\n LEFT JOIN #__os_cck_child_parent_connect AS cpc ON cpc.fid_parent=ei.eiid "
                                     . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance2 ON instance2.`fk_eiid` = cpc.fid_child "
                                     . "\n WHERE ei.published='1' "
                                     . "\n AND ei.approved='1' "
                                     . "\n AND lay.type='add_instance' "
                                     . "\n AND ei.fk_eid='" . $entity_id . "' $where $event_where $access_where $custom_sql_where "
                                     . "\n GROUP BY ei.eiid "
                                     . "\n ORDER BY rating $orderby";

                      }
                      else{
                          
                          $query .= "ORDER BY instance.`{$fields_from_params["views"]["selected"]}` $orderby ";
                      }
                      $index++;
                  }
                  
              }
          }elseif($fields_from_params["fields"]["indexed_all_instance_order_by"] == 'eid') {
                  $query .= "ORDER BY ei.eiid $orderby ";
          }elseif ($fields_from_params["fields"]["indexed_all_instance_order_by"] == 'title') {
                  $query .= "ORDER BY ei.title $orderby ";
          }elseif (stripos($fields_from_params["fields"]["indexed_all_instance_order_by"], 'categoryfield') !== FALSE) {
                  $query .= "ORDER BY cat.name $orderby ";
          }else { // for other fields
                  $query .= "ORDER BY instance.`{$fields_from_params["fields"]["indexed_all_instance_order_by"]}` $orderby ";
          }
        }

        
      $session = JFactory::getSession();
      $session->set( 'queryItemIds', $query );//need for pagination in instances//we save our query to know how to sort ourinstance//
      $query .= " LIMIT $pageNav->limitstart, $pageNav->limit ";
      
      $db->setQuery($query);
      $items = $db->loadObjectList();
      $instancies = array();



      foreach ($items as $key => $item) {
        
        if(isset($item->fk_cid) && !empty($item->fk_cid)){ //is not isset category (skip access checking)
        //check access for category
          $db->setQuery("SELECT * FROM `#__os_cck_categories` e WHERE e.`cid` = " . (int)$item->fk_cid);
          $carCatParams = $db->loadObjectList();

          if(!$carCatParams){
              continue;
          }

          $carCatParams = $carCatParams[0];
          //user access to category
          $user = JFactory::getUser();
          if (($carCatParams->params == implode(',',array_diff(explode(',',$carCatParams->params),$user->groups)))
              && $carCatParams->params != 1) {
              continue;
          }//end  
        }
        //check access for category

        $instance = new os_cckEntityInstance($db);
        $instance->load($item->eiid);
        $instancies[$key] = $instance;
        $instancies[$key]->cat_id = $item->fk_cid;


      }
      //////////////////////////////////////////////////////////////////
      $params->def('show_rating', 1);
      $params->def('hits', 1);
      $params->def('back_button', $app->getCfg('back_button'));
      if(!$instancies){
          echo '<div style="text-align:center"><h2>'.JText::_("COM_OS_CCK_NO_INSTANCE").'</h2></div>';
      }
      
      $layout_params['custom_fields'] = unserialize($layout->custom_fields);
      $layout_params['all_instance_layout_params'] = $fields_from_params;
      $bootstrap_version = $session->get( 'bootstrap','2');
      $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);
      if(isset($layout_params['attachedModuleIds'])){
        $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
        $mids = array();
        foreach ($layout_params['attachedModule'] as $attachedModuleId) {
          if($attachedModuleId){
            $mids[] = $attachedModuleId;
          }
        }
        if($mids){
          $mids = str_replace('m_', '', $mids);
          $mids = implode(',', $mids);
          $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
          $db->setQuery($query);
          $layout_params['attachedModule'] = $db->loadObjectList('id');
        }
      }

      $type =  'all_instance';
      // $layout = $
      require getLayoutPathCCK::getLayoutPathCom($option, $type);
    }
    
    static function showUserInstances($option, $lid, $mod_type = 0, $number_of_plugin=''){ 

    global $app, $db, $acl, $user, $doc, $session, $_globals;
    global $Itemid, $os_cck_configuration, $limit, $total, $limitstart,$moduleId ,$session, $cck_entity_configuration;
    
    $Itemid = intval($_REQUEST['Itemid']);
    $moduleId =(($moduleId == 0
                 || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
    

    $currentcat = NULL;
    if($_REQUEST['option'] == 'com_simplemembership'){
            $GLOBALS['number_of_plugin'] = $number_of_plugin;
          $plugin = JPluginHelper::getPlugin('simplemembership', 'plg_simplemembership_get_cck_user_instances' . $number_of_plugin);
          $params = new JRegistry($plugin->params);
      }else{
        if(!$moduleId){
          // Params(cck component menu)
          $menu = new JTableMenu($db);
          $menu->load($Itemid);
          $params = new JRegistry;
          $params->loadString($menu->params);

        }else{

          $mod_row =  JTable::getInstance ( 'Module', 'JTable' );//load module tables and params

          if (! $mod_row->load ( $moduleId )) {
            JError::raiseError ( 500, $mod_row->getError () );
          }
          //module params
          $params = new JRegistry;
          $params->loadString($mod_row->params);
          //itemId


          $value = $params->get('layout_type');

          $query = "SELECT id  FROM #__menu WHERE menutype like '%menu%'"
                          . "\n AND link LIKE '%option=com_os_cck%'"
                          . "\n AND params LIKE '%back_button%'"
                          . "\n AND params LIKE '%".$value."%'"
                          . "\n AND published = 1";
          $db->setQuery($query);
          $Itemid = $db->loadResult();
           if($params->get('ItemId'))$Itemid=$params->get('ItemId');
        }
      }
    
    $entity_layout = new os_cckLayout($db);
    $user_instances_layout = new os_cckLayout($db);


    
    if(!$lid || $lid == -1){        
        //var_dump($_REQUEST);
      //from category menu
      
        if($params->get('user_instances_layout') || $params->get('layout_type') == 'user_layout' || $params->get('user_layout')){

            $user_instances_layout->load($params->get('layout')?$params->get('layout') : $params->get('user_instances_layout'));
            
            if(!$user_instances_layout->published){
                JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_CATEGORY_LAYOUT"));
                return;
            }
            $fields_from_params = unserialize($user_instances_layout->params);
            $entity_id = $user_instances_layout->fk_eid;
            if (!$entity_id){
              if(!$params->get('layout'))//component or module
                  JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_CATEGORY_LAYOUT"));
              else
                  JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_MODULE_CATEGORY_LAYOUT"));
              return;
            }
            if($_REQUEST['option'] == 'com_simplemembership' && isset($_REQUEST['userId'])){
                //var_dump(userId);
               $user = $_REQUEST['userId'];
            }elseif($_REQUEST['option'] == 'com_simplemembership' && ((isset($_REQUEST['task']) && $_REQUEST['task'] == 'my_account') || $_REQUEST['option'] == 'com_simplemembership')){
                $user = JFactory::getUser()->id;
            }else{
                $user = $params->get('layout')?$params->get('item') : $params->get('user');
            }
               
        }//end category menu
    

        $user = (!$user) ? $params->get('user') : $user; 
        $search_layout = new os_cckLayout($db);
        $search_layout->load($entity_layout->getDefaultLayout($entity_id, 'search'));
        if($search_layout->published == 0){
            $params->def('show_search','0');
        }else{
            $params->def('show_search','1');
        }//end show serch
    }else{
        if(isset($_REQUEST['userId'])){
            $user= $_REQUEST['userId'];
        }elseif (isset($_REQUEST['task']) && $_REQUEST['task'] == 'my_account' && $_REQUEST['option'] == 'com_simplemembership') {
            $user = JFactory::getUser()->id;   
        }else{
            $user = $params->get('user');
        }
        $user_instances_layout->load($lid);
        $fields_from_params = unserialize($user_instances_layout->params);
        $entity_id = $user_instances_layout->fk_eid;
        
    }
    //var_dump($user);
    
    if($user_instances_layout->type != 'user_instances'){
      JError::raiseWarning(0, "Layout type load error User instances layout ID: ".$user_instances_layout->lid);
      return;
    }
    
    $limit = $fields_from_params['views']['pagenator_limit'];

    if(isset($fields_from_params['views']['limit'])){
        $max_items = $fields_from_params['views']['limit'];
    }else{
        $max_items = 0;
    }


    if($user_instances_layout->fk_eid){
        $entity_name = $user_instances_layout->fk_eid;
    }else{
        return;
    }


    //creating order by list
    $fields_from_params["views"]["sortField"][] = isset($fields_from_params["fields"]["indexed_user_order_by"])?$fields_from_params["fields"]["indexed_user_order_by"]:'';
    $entity = new os_cckEntity($db);
    $entity->load($entity_id);
    $fields_list = $entity->getFieldList();
    if(isset($fields_from_params["fields"]['order_by_fields_user_order_by']) && isset($fields_from_params["views"]["sortField"][0])){
      foreach ($fields_from_params["fields"]['order_by_fields_user_order_by'] as $key => $value) {
        if($value != $fields_from_params["views"]["sortField"][0]){
          $fields_from_params["views"]["sortField"][$key] = array();
          foreach ($fields_list as $entity_field) {
            if($entity_field->db_field_name == $value){
              $fields_from_params["views"]["sortField"][$key]['value'] = $value;
              $fields_from_params["views"]["sortField"][$key]['text'] = $entity_field->field_name;
              $fields_from_params['views']['order_by_fields'][] = $value;              
            }
          }
        }
      }
    }
    if($mod_type == 0){
        if(isset($_REQUEST['order_direction']) && !empty($_REQUEST['order_direction'])){
            $fields_from_params["views"]["sortType_user_order_by"] = protectInjectionWithoutQuote('order_direction','');//need for order by desc//asc

        }elseif($session->get('order_direction','')){ 
            $fields_from_params["views"]["sortType_user_order_by"] = $session->get('order_direction');
        }
        else {
            $fields_from_params["views"]["sortType_user_order_by"] = $fields_from_params["fields"]["sortType_user_order_by"];
        }
    } else{
        $fields_from_params["views"]["sortType_user_order_by"] = isset($fields_from_params["fields"]["sortType_user_order_by"]) ? $fields_from_params["fields"]["sortType_user_order_by"] : '';
    }
    //end
    //get params after reload page with new order direction
    //session need if we are used pagination(save our sort params in all pages)
    //default value set in cat layout params
    if(isset($_REQUEST['order_direction']) && !empty($_REQUEST['order_direction'])){
        $fields_from_params["views"]["indexed_user_order_by"] = protectInjectionWithoutQuote('order_direction','');//need for order by desc//asc
    }elseif($session->get('order_direction','')){ 
        $fields_from_params["views"]["indexed_user_order_by"] = $session->get('order_direction');
    }

 

    if(isset($_REQUEST['order_field']) && !empty($_REQUEST['order_field'])){ 
        $query = "SELECT * FROM #__os_cck_content_entity_$entity_name LIMIT 0,1";
        $db->setQuery($query);
        $collumns = $db->loadObjectList();
        if(property_exists($collumns[0], $_REQUEST['order_field'])){
            $fields_from_params["views"]["selected"] = $_REQUEST['order_field'];
        }else{
            $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_category_order_by"])?$fields_from_params["fields"]["indexed_category_order_by"]:'';
        }
      //$fields_from_params["views"]["selected"] = protectInjectionWithoutQuote('order_field','');//need for order by field name
    }elseif($session->get('selected','')){ 
        $query = "SELECT * FROM #__os_cck_content_entity_$entity_name LIMIT 0,1";
        $db->setQuery($query);
        $collumns = $db->loadObjectList();
        if(property_exists($collumns[0], $session->get('selected'))){
            $fields_from_params["views"]["selected"] = $session->get('selected');
        }else{
            $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_category_order_by"])?$fields_from_params["fields"]["indexed_category_order_by"]:'';
        }
  //$fields_from_params["views"]["selected"] = $session->get('selected');
    }else
        $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_user_order_by"])?$fields_from_params["fields"]["indexed_user_order_by"]:'';
        //end sort params
        
    if($params->get('layout')){
        $header = $user_instances_layout->title;
    }elseif($_REQUEST['option'] == 'com_simplemembership'){
        $header = $params->get('tab_name');
    }else{
        $header = set_header_name_cck($menu, $Itemid);
    }
    //$header = $params->get('layout') ? "$user_instances_layout->title" : set_header_name_cck($menu, $Itemid);
    $params->def('header', $header);
    $params->def('pageclass_sfx', '');
    

    //alfabetical pagination

    $sp = 0;
    if (array_key_exists("sp", $_REQUEST)){
      $sp = JFactory::getApplication()->input->getInt('sp', 0);
    }
    $where = '';
    $list_str = array();
    if (array_key_exists("letindex", $_REQUEST)) {
        $search = JFactory::getApplication()->input->getCmd("letindex",'');

        if(isset($_REQUEST['now_indexed']) && $search != 'all'){

          if($sp == 1 && $_REQUEST['now_indexed'] == $fields_from_params["views"]["selected"]){
            $where = " AND LOWER(instance." . $_REQUEST['now_indexed'] . ") LIKE '$search%' ";
          }else{
            $where = '';
          }
        }
    }
    
    $custom_sql_where = '';
    if(isset($fields_from_params['views']['request_layout_sql_show']) && !empty($fields_from_params['views']['request_layout_sql_show'])){
        foreach ($fields_from_params['views']['request_layout_sql_show'] as $request_layout){
            foreach($request_layout as $sql_show){
                $custom_sql_where .= ' ' . $sql_show . ' ';
            }
        } 
    }
    
    //user access
    if($entity_id > 0 && isset($cck_entity_configuration[$entity_id]) && $cck_entity_configuration[$entity_id]['check_access_instances'] == 0){
          $access_where = '';
      }else{
          $access_where = ' AND (' . getWhereUsergroupsConditionCCK('ei') . " or ei.access='') ";
      }
      //var_dump($user);
    if(strstr($fields_from_params["views"]["selected"], 'text_textfield') !== false){



       $query = " SELECT DISTINCT UPPER(SUBSTRING(instance.".$fields_from_params["views"]["selected"].", 1,1)) AS symb FROM  #__os_cck_entity_instance AS ei "
          . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
          . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
          . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
          . "\n LEFT JOIN `#__os_cck_content_entity_$entity_name` as instance ON instance.`fk_eiid` = ei.eiid "
          . "\n WHERE ei.published='1' "
          . "\n AND ei.approved='1' "
          . "\n AND lay.type='add_instance' "
          . "\n AND ei.fk_userid='{$user}' "
          . "\n AND ei.fk_eid='" . $entity_id . $access_where . $custom_sql_where . "' GROUP BY ei.eiid ORDER BY symb"; 

        $db->setQuery($query);
        $tmp_arr = $db->loadObjectList();

        if(count($tmp_arr)>1){

          $symb_list_str = '<ul>';
          foreach($tmp_arr as $symbol){

            if(empty($symbol->symb)){
              continue;
            }

          $symb_list_str.= '<li><a href="index.php?option=' . $option . 
          '&view=user_instances&letindex=' . $symbol->symb . '&sp=1&Itemid=' . $Itemid . 
            '&now_indexed=' . $fields_from_params["views"]["selected"] . '&userId=' . $user . '">' . 
          $symbol->symb . '</a></li> ';
            
          }

          //check string not empty
          if(!empty(strip_tags($symb_list_str))){
            $symb_list_str.= '<li><a href="index.php?option=' . $option . 
            '&view=user_instances&letindex=all&sp=1&Itemid=' . $Itemid . 
            '&now_indexed=' . $fields_from_params["views"]["selected"] . '">all</a></li> ';
          }
          
          $symb_list_str.= "</ul>";
          $list_str['symbol_list'] = $symb_list_str;
        }else{
          $list_str['symbol_list'] = false;
        }
    }else{
      $list_str['symbol_list'] = false;
    }

    //alfabetical pagination

    

    $query = " SELECT COUNT(DISTINCT ei.eiid) FROM  #__os_cck_entity_instance AS ei "
            . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
            . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
            . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
            . "\n LEFT JOIN `#__os_cck_content_entity_$entity_name` as instance ON instance.`fk_eiid` = ei.eiid "
            . "\n WHERE ei.published='1' "
            . "\n AND ei.approved='1' "
            . "\n AND lay.type='add_instance' "
            . "\n AND ei.fk_userid='{$user}' "
            . "\n AND ei.fk_eid='" . $entity_id . "' $where $access_where $custom_sql_where";
    $db->setQuery($query);
    $total = $db->loadResult();

    if($max_items != '0' && $max_items < $total ) {
      if($limit > $max_items )$limit = $max_items;
      $total = $max_items;
    }
     if( isset($fields_from_params['views']['selected']) && 
         ( !isset( $fields_from_params['views']['order_by_fields'] ) || !is_array( $fields_from_params['views']['order_by_fields'] ) ||
          ( is_array( $fields_from_params['views']['order_by_fields'] ) && !in_array($fields_from_params["views"]["selected"],$fields_from_params['views']['order_by_fields']) 
          ) 
         )
        )
     {

        $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_user_order_by"])?$fields_from_params["fields"]["indexed_user_order_by"]:'';
     }
    
    $pageNav = new JPagination($total, $limitstart, $limit);
    $query = " SELECT ei.eiid FROM  #__os_cck_entity_instance AS ei "
            . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
            . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
            . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
            . "\n LEFT JOIN `#__os_cck_content_entity_$entity_name` as instance ON instance.`fk_eiid` = ei.eiid "
            . "\n WHERE ei.published='1' "
            . "\n AND ei.approved='1' "
            . "\n AND lay.type='add_instance' "
            . "\n AND ei.fk_userid='{$user}' "
            . "\n AND ei.fk_eid='" . $entity_id . "' $where $access_where $custom_sql_where GROUP BY ei.eiid ";
            
            
            
        if(isset($fields_from_params["fields"]["indexed_user_order_by"])){ // if selected sortable field
            $orderby = (!empty($fields_from_params["views"]["sortType_user_order_by"])) ? $fields_from_params["views"]["sortType_user_order_by"] : 'ASC';
          if (isset($fields_from_params["views"]["selected"]) && !empty( $fields_from_params["views"]["selected"])) {
              $index = 0;
              if(isset($fields_from_params['views']['show_request_layout'])){
                foreach ($fields_from_params['views']['show_request_layout'] as $key => $val){
                
                    $request_layout = new os_cckLayout($db);
                    $request_layout->load($key);
                    $request_layout_fields_params = unserialize($request_layout->params);
                    $views_selected = $fields_from_params["views"]["selected"] . '_average';
                    if($request_layout->type == 'instance' && $index == 0){ 
                      if($fields_from_params["views"]["selected"] == 'title'){
                        $query .= "ORDER BY ei.title $orderby ";
                      }
                      elseif(stripos($fields_from_params["views"]["selected"], 'rating_field') !== FALSE){
                            $query = "SELECT  ei.eiid,ccc.fk_cid,AVG(instance2.`" . $fields_from_params['views']['selected'] . "`) as rating FROM  #__os_cck_entity_instance AS ei "
                                       . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
                                       . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
                                       . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
                                       . "\n LEFT JOIN `#__os_cck_content_entity_$entity_name` as instance ON instance.`fk_eiid` = ei.eiid "
                                       . "\n LEFT JOIN #__os_cck_child_parent_connect AS cpc ON cpc.fid_parent=ei.eiid "
                                       . "\n LEFT JOIN `#__os_cck_content_entity_$entity_name` as instance2 ON instance2.`fk_eiid` = cpc.fid_child "
                                       . "\n WHERE ei.published='1' "
                                       . "\n AND ei.approved='1' "
                                       . "\n AND lay.type='add_instance' "
                                       . "\n AND ei.fk_userid='{$user}' "
                                       . "\n AND ei.fk_eid='" . $entity_id . "' $where $access_where $custom_sql_where "
                                       . "\n GROUP BY ei.eiid "
                                       . "\n ORDER BY rating $orderby";

                        }
                      else{
                        $query .= "ORDER BY instance.`{$fields_from_params["views"]["selected"]}` $orderby ";
                      }
                      $index++;
                    }
                    
                }
              }
          }elseif($fields_from_params["fields"]["indexed_user_order_by"] == 'eid') {
                  $query .= "ORDER BY ei.eiid $orderby ";
          }elseif ($fields_from_params["fields"]["indexed_user_order_by"] == 'title') {
                  $query .= "ORDER BY ei.title $orderby ";
          }else { // for other fields
                  $query .= "ORDER BY instance.`{$fields_from_params["fields"]["indexed_user_order_by"]}` $orderby ";
          }
        }
    $session = JFactory::getSession();
    $session->set( 'queryItemIds', $query );//need for pagination in instances//we save our query to know how to sort ourinstance//
    $query .= " LIMIT $pageNav->limitstart, $pageNav->limit ";
    $db->setQuery($query); 
    $items = (version_compare(JVERSION, "3.0.0", "lt")) ? $db->loadResultArray() : $db->loadColumn();
    $instancies = array();
    
    foreach ($items as $item) {
        $instance = new os_cckEntityInstance($db);
        
        $instance->load($item);
        $instancies[] = $instance;
    }
    

    //////////////////////////////////////////////////////////////////
    $query = " SELECT c.*, (SELECT COUNT(ccc.fk_cid) "
            . "\n FROM #__os_cck_categories_connect AS ccc WHERE ccc.fk_cid=c.cid) AS items, '0' AS display "
            . "\n FROM  #__os_cck_categories AS c WHERE section='com_os_cck' ORDER BY ordering ";
    $db->setQuery($query);
    $cat_all1 = $db->loadObjectList();
    

    //cck_constructPathway($category, 'category');
    $params->def('show_rating', 1);
    $params->def('hits', 1);
    $params->def('back_button', $app->getCfg('back_button'));

    
    $layout_params = unserialize($user_instances_layout->params);
    $layout_params['custom_fields'] = unserialize($user_instances_layout->custom_fields);
    $layout_params['cat_layout_params'] = $fields_from_params;
    $bootstrap_version = $session->get( 'bootstrap','2');
    $user_instances_layout->layout_html = $user_instances_layout->getLayoutHtml($bootstrap_version);
    if(isset($layout_params['attachedModuleIds'])){
      $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
      $mids = array();
      foreach ($layout_params['attachedModule'] as $attachedModuleId) {
        if($attachedModuleId){
          $mids[] = $attachedModuleId;
        }
      }
      if($mids){
        $mids = str_replace('m_', '', $mids);
        $mids = implode(',', $mids);
        $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
        $db->setQuery($query);
        $layout_params['attachedModule'] = $db->loadObjectList('id');
      }
    }

    $layout = $user_instances_layout;
    
    $type = 'user_instances';
    if($option == 'com_simplemembership'){
        $option = 'com_os_cck';
        
    }
    
    require getLayoutPathCCK::getLayoutPathCom($option, $type);
    
  }



    static function show_calendar($option, $lid,$showLayModId = ''){

    global $app, $db, $user ,$doc;
    global $Itemid, $os_cck_configuration, $limit, $total, $limitstart, $moduleId, $cck_entity_configuration;

    $Itemid = intval($_REQUEST['Itemid']);
    $moduleId =(($moduleId == 0
                 || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
    if(!$moduleId){
      // Params(cck component menu)
      $menu = new JTableMenu($db);
      $menu->load($Itemid);
      $params = new JRegistry;
      $params->loadString($menu->params);
    }else{
      $mod_row =  JTable::getInstance ( 'Module', 'JTable' );//load module tables and params
      if (! $mod_row->load ( $moduleId )) {
        JError::raiseError ( 500, $mod_row->getError () );
      }
      //module params
      $params = new JRegistry;
      $params->loadString($mod_row->params);
      //itemId
      $query = "SELECT id  FROM #__menu WHERE menutype like '%menu%'"
                      . "\n AND link LIKE '%option=com_os_cck%'"
                      . "\n AND params LIKE '%back_button%'"
                      . "\n AND params LIKE '%calendar%'"
                      . "\n AND published = 1";
      $db->setQuery($query);
      $Itemid = $db->loadResult();
       if($params->get('ItemId'))$Itemid=$params->get('ItemId');
    }
    $layout = new os_cckLayout($db);
    $layout->load($lid);
    if(empty($layout->title) || $layout->type != 'calendar'){
      JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_MENU_NO_LAYOUT"));
      return;
    }
    // $entity_layout = new os_cckLayout($db);

    if($params->get('calendar_layout') || $params->get('layout') || $layout->title){
      $fields_from_params = unserialize($layout->params);
      $entity_id = $layout->fk_eid;
    }
    //end all instance menu

    $session = JFactory::getSession();

    $layout_params = unserialize($layout->params);
    $layout_params['custom_fields'] = unserialize($layout->custom_fields);
    $layout_params['calendar_layout_params'] = $fields_from_params;
    $bootstrap_version = $session->get( 'bootstrap','2');
    $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);

 
    //calendar start

    //modules
    if(isset($layout_params['attachedModuleIds'])){
      $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
      $mids = array();
      foreach ($layout_params['attachedModule'] as $attachedModuleId) {
        if($attachedModuleId){
          $mids[] = $attachedModuleId;
        }
      }
      if($mids){
        $mids = str_replace('m_', '', $mids);
        $mids = implode(',', $mids);
        $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
        $db->setQuery($query);
        $layout_params['attachedModule'] = $db->loadObjectList('id');
      }
    } 
    //modules

    $current_month = isset($fields_from_params['views']['month_calendar'])?$fields_from_params['views']['month_calendar']:date('Y-m');
    $event_title = isset($layout_params['calendar_layout_params']['fields']['calendar_table_event_title']) ? $layout_params['calendar_layout_params']['fields']['calendar_table_event_title'] : 0;
    $instance_lid = $fields_from_params['views']['instance_layout'];
    $all_instance_lid = $fields_from_params['views']['all_instance_layout'];
    $show_past_events = $fields_from_params['views']['show_past_events'];
    $event_date_field = isset($fields_from_params['views']['event_date'])?$fields_from_params['views']['event_date']:false;
    $sortType = isset($fields_from_params['fields']['sortType_all_instance_order_by'])?$fields_from_params['fields']['sortType_all_instance_order_by']:'ASC';
    $event_sort_by = $fields_from_params['views']['event_sort_by'];
    $schedule_instance_lid = $layout_params['calendar_layout_params']['fields']['calendar_table_schedule_instance_lid'];


    //check isset needs layouts and fields

    //shedule instance
    if($schedule_instance_lid == '-1'){
          $schedule_instance_lid = $layout->getDefaultLayout($entity_id, 'instance');
      if(empty($schedule_instance_lid)){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_CALENDAR_INST_NO_LAYOUT"));
        return;
      }
    }
    //instance
    if($instance_lid == '-1'){
          $instance_lid = $layout->getDefaultLayout($entity_id, 'instance');
      if(empty($instance_lid)){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_CALENDAR_INST_NO_LAYOUT"));
        return;
      }
    }
    //all instance
    if($all_instance_lid == '-1'){
          $all_instance_lid = $layout->getDefaultLayout($entity_id, 'all_instance');
      if(empty($all_instance_lid)){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_CALENDAR_ALL_INST_NO_LAYOUT"));
        return;
      }
    }

    //data field
    if($event_date_field == '-1'){
        $event_date_field = $layout->getDefaultField($entity_id, 'datetime_popup');
      if(empty($event_date_field)){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_CALENDAR_DATE_NO_FIELD"));
        return;
      }
    }
    //title field
    if($event_title == '-1'){
        $event_title = $layout->getDefaultField($entity_id, 'text_textfield');
      if(empty($event_title)){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_CALENDAR_TEXT_NO_FIELD"));
        return;
      }
    }
    
    
    //user access
     if($entity_id > 0 && isset($cck_entity_configuration[$entity_id]) && $cck_entity_configuration[$entity_id]['check_access_instances'] == 0){
          $access_where = '';
      }else{
          $access_where = ' AND (' . getWhereUsergroupsConditionCCK('ei') . " or ei.access='') ";
      }

    $query = " SELECT count(instance.".$event_date_field."), DATE(instance.".$event_date_field.") FROM  #__os_cck_entity_instance AS ei "
            . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
            . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
            . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
            . "\n WHERE ei.published='1' "
            . "\n AND ei.approved='1' "
            . "\n AND lay.type='add_instance' "
            . "\n AND instance.".$event_date_field."!='' "
            . "\n AND ei.fk_eid='" . $entity_id . "' " . $access_where . " GROUP BY DATE(instance.".$event_date_field.") ";

    $db->setQuery($query);
    $calenDate = $db->loadRowList();

    
    $calendarParams = array();
    $calendarParams['all_instance_lid'] = $all_instance_lid;
    $calendarParams['event_date_field'] = $event_date_field;
    $calendarParams['calenDate'] = $calenDate;
    $calendarParams['show_past_events'] = $show_past_events;
    $calendarParams['instance_lid'] = $instance_lid;
    $calendarParams['event_title'] = $event_title;
    $calendarParams['calendar_view'] =  $layout_params['calendar_layout_params']['fields']['calendar_view_calendar_table'];
    $calendarParams['date_format'] = $layout_params['calendar_layout_params']['fields']['calendar_table_output_format'];
    $calendarParams['show_time'] = $layout_params['calendar_layout_params']['fields']['calendar_table_show_time'];
    $calendarParams['header_format'] = $layout_params['calendar_layout_params']['fields']['calendar_table_output_header_format'];
    $calendarParams['show_header'] = $layout_params['calendar_layout_params']['fields']['calendar_table_show_header_date_time'];
    $calendarParams['schedule_instance_lid'] = $schedule_instance_lid;



    $eiids = array();
    $item_infos = array();

    if($event_sort_by == -1){
      $event_sort_by = 'TIME(time)';
    }else{
      $event_sort_by = 'instance.'.$event_sort_by;
    }

    foreach ($calenDate as $key => $value) {

      $event_where = " AND " . $event_date_field . " LIKE '%" . $value[1] . "%' ";

        $query = " SELECT  ei.eiid, instance.".$event_title." as title, instance.".$event_date_field." as time FROM  #__os_cck_entity_instance AS ei "
            . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
            . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
            . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
            . "\n WHERE ei.published='1' "
            . "\n AND ei.approved='1' "
            . "\n AND lay.type='add_instance' "
            . "\n AND ei.fk_eid='" . $entity_id . "' $event_where $access_where GROUP BY ei.eiid ORDER BY $event_sort_by $sortType ";
        $db->setQuery($query);

        $item_infos[$value[1]] = $db->loadAssocList();

    }
    
    //to time formnat
    foreach ($item_infos as $key => $value) {
      foreach ($value as $key1 => $value1) {
        $item_infos[$key][$key1]['time'] = date($calendarParams['date_format'],strtotime($value1['time']));
      }
    }

    $calendarParams['item_infos'] = $item_infos;


    //get instances for schedule layout
    $query = " SELECT  ei.eiid,ccc.fk_cid FROM  #__os_cck_entity_instance AS ei "
              . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
              . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
              . "\n LEFT JOIN `#__os_cck_content_entity_$layout->fk_eid` as instance ON instance.`fk_eiid` = ei.eiid "
              . "\n WHERE ei.published='1' "
              . "\n AND ei.approved='1' "
              . "\n AND lay.type='add_instance' ";
    $db->setQuery($query);
    $items = $db->loadObjectList();

    $instancies = [];

    foreach ($items as $key => $item) {
      
          if(isset($item->fk_cid) && !empty($item->fk_cid)){ //is not isset category (skip access checking)
          //check access for category
            $db->setQuery("SELECT * FROM `#__os_cck_categories` e WHERE e.`cid` = " . (int)$item->fk_cid);
            $carCatParams = $db->loadObjectList();
            if(!$carCatParams){
                continue;
            }

            $carCatParams = $carCatParams[0];
            //user access to category
            $user = JFactory::getUser();
            if (($carCatParams->params == implode(',',array_diff(explode(',',$carCatParams->params),$user->groups)))
                && $carCatParams->params != 1) {
                continue;
            }//end  
          }
          //check access for category

          $instance = new os_cckEntityInstance($db);
          $instance->load($item->eiid);
          $instancies[$key] = $instance;
          $instancies[$key]->cat_id = $item->fk_cid;
      }

      // echo "<pre>";
      // print_r($$instancies);

      $calendarParams['instancies'] = $instancies;
      $calendarParams['option'] = $option;
      $calendarParams['layout_fk_eid'] = $layout->fk_eid;
      $calendarParams['layout_params'] = $layout_params;
      $calendarParams['Itemid'] = $Itemid;

    // Category::show_attached_layout($option, $instance_lid, $layout->fk_eid, $layout_params, '', '', 0, $instancies, '');  

    // exit;
    $type =  'calendar';
    require getLayoutPathCCK::getLayoutPathCom($option, $type);
  }



  static function show_request_layout($option, $lid,$eiid,$show_type = 1,$button_name = '', $has_price = 0,$title = '', $button_style = ''){
      
    global $os_cck_configuration, $db, $moduleId, $task, $doc;
    
    $input = JFactory::getApplication()->input;
    $price_fields = $input->get('price_fields', '', 'STRING');
    $entityInstance = new os_cckEntityInstance($db);
    $session = JFactory::getSession();
    $bootstrap_version = $session->get('bootstrap','2');
    $layout = new os_cckLayout($db);
    $layout->load($lid);
    if(!$layout->lid){
      JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_ADD_INSTANCE") );
      return;
    }
    //echo '1111111111111'; exit;
    $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);
    $layout_params = unserialize($layout->params);
    $layout_params['custom_fields'] = unserialize($layout->custom_fields);
    $layout_fields = $layout_params['fields'];
    $layout_params['has_price'] = $has_price;
    
    $layout_params['title'] = $title;
    
    $layout->parent_eiid = $eiid;
    
    if($show_type)
      $layout_params['show_type'] = $show_type;
    $layout_params['button_name'] = $button_name;
    if($layout->type == 'show_review_instance'){

      $entityInstance->load($eiid);
      $reviews = $entityInstance->getReviews();


      if ($reviews != null && count($reviews) > 0) {
        foreach ($reviews as $review) {
          $entityInstance = new os_cckEntityInstance($db);
          $entityInstance->load($review->eiid);
          $layout->field_list = $entityInstance->getFields();
          //load attached module ids
          if(isset($layout_params['attachedModuleIds'])){
            $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
            $mids = array();
            foreach ($layout_params['attachedModule'] as $attachedModuleId) {
              if($attachedModuleId){
                $mids[] = $attachedModuleId;
              }
            }
            if($mids){
              $mids = str_replace('m_', '', $mids);
              $mids = implode(',', $mids);
              $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
              $db->setQuery($query);
              $layout_params['attachedModule'] = $db->loadObjectList('id');
            }
          }
        
          require getLayoutPathCCK::getLayoutPathCom($option,$layout->type);
        }
      }else{
        if($layout_params['views']['no_review_message']){
          echo '<span class="first-review">'.JText::_("COM_OS_CCK_SELECT_NO_REVIEW").'</span>';
        }
      }
    }else{
      $entityInstance->fk_eid = $layout->fk_eid;
      $layout->field_list = $entityInstance->getFields();
      if($layout_params['has_price'] == 0){
        $parentInstance = new os_cckEntityInstance($db);
        $parentInstance->load($eiid);
        $field_list = $parentInstance->getFields();
        foreach ($field_list as $field) {
          $layout_fields = $layout_params['fields'];
          if($field->field_type == 'decimal_textfield' && $layout_params['has_price'] == 0){
              
            if(isset($layout_fields[$field->db_field_name.'_field_type']) 
                && $layout_fields[$field->db_field_name.'_field_type'] == 'price'){
              $layout_params['has_price'] = 1;
            }
          }
        }
      }

      if(isset($layout_params['attachedModuleIds'])){
        $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
        $mids = array();
        foreach ($layout_params['attachedModule'] as $attachedModuleId) {
          if($attachedModuleId){
            $mids[] = $attachedModuleId;
          }
        }
        if($mids && $mids[0] != 'undefined'){
          $mids = str_replace('m_', '', $mids);
          $mids = implode(',', $mids);
          $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
          $db->setQuery($query);
          $layout_params['attachedModule'] = $db->loadObjectList('id');
        }
      }

      $type = $layout->type;
      
      require getLayoutPathCCK::getLayoutPathCom($option,$type);
    }
  }
  
  static function showParentChildLayout($option, $lid, $mod_type = 0){ 

    global $app, $db, $acl, $user, $doc, $session, $_globals, $input;
    global $Itemid, $os_cck_configuration, $limit, $total, $limitstart,$moduleId ,$session, $cck_entity_configuration;
    
      
      
    
    $Itemid = intval($_REQUEST['Itemid']);
    $moduleId =(($moduleId == 0
                 || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
    

    $currentcat = NULL;
    if($_REQUEST['option'] == 'com_simplemembership'){
            $GLOBALS['number_of_plugin'] = $number_of_plugin;
          $plugin = JPluginHelper::getPlugin('simplemembership', 'plg_simplemembership_get_cck_user_instances' . $number_of_plugin);
          $params = new JRegistry($plugin->params);
      }else{
        if(!$moduleId){
          // Params(cck component menu)
          $menu = new JTableMenu($db);
          $menu->load($Itemid);
          $params = new JRegistry;
          $params->loadString($menu->params);

        }else{

          $mod_row =  JTable::getInstance ( 'Module', 'JTable' );//load module tables and params

          if (! $mod_row->load ( $moduleId )) {
            JError::raiseError ( 500, $mod_row->getError () );
          }
          //module params
          $params = new JRegistry;
          $params->loadString($mod_row->params);
          //itemId


          $value = $params->get('layout_type');

          $query = "SELECT id  FROM #__menu WHERE menutype like '%menu%'"
                          . "\n AND link LIKE '%option=com_os_cck%'"
                          . "\n AND params LIKE '%back_button%'"
                          . "\n AND params LIKE '%".$value."%'"
                          . "\n AND published = 1";
          $db->setQuery($query);
          $Itemid = $db->loadResult();
           if($params->get('ItemId'))$Itemid=$params->get('ItemId');
        }
      }
    
    $entity_layout = new os_cckLayout($db);
    $parent_child_instances_layout = new os_cckLayout($db);
    
    
    if(!$lid || $lid == -1){        

      //from category menu
      
        if($params->get('parent_child_layout')){

            $parent_child_instances_layout->load($params->get('layout')?$params->get('layout') : $params->get('parent_child_layout'));
            
            if(!$parent_child_instances_layout->published){
                JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_CATEGORY_LAYOUT"));
                return;
            }
            $fields_from_params = unserialize($parent_child_instances_layout->params);
            $entity_id = $parent_child_instances_layout->fk_eid;
            
            if (!$entity_id){
              if(!$params->get('layout'))//component or module
                  JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_CATEGORY_LAYOUT"));
              else
                  JError::raiseWarning(0, JText::_("COM_OS_CCK_SELECT_MODULE_CATEGORY_LAYOUT"));
              return;
            }
            if($_REQUEST['option'] == 'com_simplemembership' && isset($_REQUEST['userId'])){
                //var_dump(userId);
               $user = $_REQUEST['userId'];
            }else{
                $user = $params->get('layout')?$params->get('item') : $params->get('user');
            }
            $eiid = ($params->get('instance')) ? $params->get('instance') : 0;
            $entityInstance = new os_cckEntityInstance($db);
            $entityInstance->load($eiid);
            $parent_child_instances_layout->field_list = $entityInstance->getFields();
            
            $parent_instance_id = $params->get('instance');
            $fields_from_params = unserialize($parent_child_instances_layout->params);
            $child_layouts = $fields_from_params['views']['show_request_layout'];
            
            foreach($child_layouts as $key => $child_layout){
                $child_layout_id = $key;
            }
            
            $child_layout = new os_cckLayout($db);
            $child_layout->load($child_layout_id);
            $child_entity_id = $child_layout->fk_eid;
            //var_dump($child_layout);
        }//end category menu
    

        $user = (!$user) ? $params->get('user') : $user; 
        $search_layout = new os_cckLayout($db);
        $search_layout->load($entity_layout->getDefaultLayout($entity_id, 'search'));
        if($search_layout->published == 0){
            $params->def('show_search','0');
        }else{
            $params->def('show_search','1');
        }//end show serch
        
    }else{
        if(isset($_REQUEST['userId'])){
            $user= $_REQUEST['userId'];
        }elseif (isset($_REQUEST['task']) && $_REQUEST['task'] == 'my_account' && $_REQUEST['option'] == 'com_simplemembership') {
            $user = JFactory::getUser()->id;   
        }else{
            $user = $params->get('user');
        }
        
        $eiid = $input->get('eiid', 0, 'INT');
        if(is_array($eiid)){
            $eiid = $eiid[0];
        }
        if($eiid == 0 && $mod_type == 1){
            $eiid = $params->get('instance');
        }
        //var_dump($eiid);exit;
        $entityInstance = new os_cckEntityInstance($db);
        $entityInstance->load($eiid);
        
        $parent_child_instances_layout->load($lid);
        $parent_child_instances_layout->field_list = $entityInstance->getFields();
        $fields_from_params = unserialize($parent_child_instances_layout->params);
        
        $child_layouts = $fields_from_params['views']['show_request_layout'];
        //var_dump($child_layouts);
        foreach($child_layouts as $key => $child_layout){
            $child_layout_id = $key;
        }

        $child_layout = new os_cckLayout($db);
        $child_layout->load($child_layout_id);
        $child_entity_id = $child_layout->fk_eid;
        
        $parent_instance_id = $eiid;

        $entity_id = $parent_child_instances_layout->fk_eid;
        
        //var_dump($_REQUEST); exit;
    }

    //var_dump($user_instances_layout);
    if($parent_child_instances_layout->type != 'parent_child'){
      JError::raiseWarning(0, "Layout type load error User instances layout ID: ".$parent_child_instances_layout->lid);
      return;
    }
    
    $limit = $fields_from_params['views']['pagenator_limit'];

    if(isset($fields_from_params['views']['limit'])){
        $max_items = $fields_from_params['views']['limit'];
    }else{
        $max_items = 0;
    }


    if($parent_child_instances_layout->fk_eid){
        $entity_name = $parent_child_instances_layout->fk_eid;
    }else{
        return;
    }


    //creating order by list
    $fields_from_params["views"]["sortField"][] = isset($fields_from_params["fields"]["indexed_parent_child_order_by"])?$fields_from_params["fields"]["indexed_parent_child_order_by"]:'';
    $entity = new os_cckEntity($db);
    
    $entity->load($child_entity_id);
    //var_dump($entity); exit;
    $fields_list = $entity->getFieldList();
    if(isset($fields_from_params["fields"]['order_by_fields_parent_child_order_by']) && isset($fields_from_params["views"]["sortField"][0])){
      foreach ($fields_from_params["fields"]['order_by_fields_parent_child_order_by'] as $key => $value) {
        if($value != $fields_from_params["views"]["sortField"][0]){
          $fields_from_params["views"]["sortField"][$key] = array();
          foreach ($fields_list as $entity_field) {
            if($entity_field->db_field_name == $value){
              $fields_from_params["views"]["sortField"][$key]['value'] = $value;
              $fields_from_params["views"]["sortField"][$key]['text'] = $entity_field->field_name;
              $fields_from_params['views']['order_by_fields'][] = $value;              
            }
          }
        }
      }
    }
    
    if($mod_type == 0){
        if(isset($_REQUEST['order_direction']) && !empty($_REQUEST['order_direction'])){
            $fields_from_params["views"]["sortType_parent_child_order_by"] = protectInjectionWithoutQuote('order_direction','');//need for order by desc//asc

        }elseif($session->get('order_direction','')){ 
            $fields_from_params["views"]["sortType_parent_child_order_by"] = $session->get('order_direction');
        }
        else {
            $fields_from_params["views"]["sortType_parent_child_order_by"] = isset($fields_from_params["fields"]["sortType_parent_child_order_by"]) ? $fields_from_params["fields"]["sortType_parent_child_order_by"] : '';
        }
    } else{
        $fields_from_params["views"]["sortType_parent_child_order_by"] = isset($fields_from_params["fields"]["sortType_parent_child_order_by"]) ? $fields_from_params["fields"]["sortType_parent_child_order_by"] : '';
    }
    //end
    //get params after reload page with new order direction
    //session need if we are used pagination(save our sort params in all pages)
    //default value set in cat layout params
    if(isset($_REQUEST['order_direction']) && !empty($_REQUEST['order_direction'])){
        $fields_from_params["views"]["indexed_parent_child_order_by"] = protectInjectionWithoutQuote('order_direction','');//need for order by desc//asc
    }elseif($session->get('order_direction','')){ 
        $fields_from_params["views"]["indexed_parent_child_order_by"] = $session->get('order_direction');
    }

 
    
    if(isset($_REQUEST['order_field']) && !empty($_REQUEST['order_field'])){ 
        $query = "SELECT * FROM #__os_cck_content_entity_$child_entity_id LIMIT 0,1";
        $db->setQuery($query);
        $collumns = $db->loadObjectList();
        if(property_exists($collumns[0], $_REQUEST['order_field'])){
            $fields_from_params["views"]["selected"] = $_REQUEST['order_field'];
        }else{
            $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_category_order_by"])?$fields_from_params["fields"]["indexed_category_order_by"]:'';
        }
      //$fields_from_params["views"]["selected"] = protectInjectionWithoutQuote('order_field','');//need for order by field name
    }elseif($session->get('selected','')){ 
        $query = "SELECT * FROM #__os_cck_content_entity_$child_entity_id LIMIT 0,1";
        $db->setQuery($query);
        $collumns = $db->loadObjectList();
        if(property_exists($collumns[0], $session->get('selected'))){
            $fields_from_params["views"]["selected"] = $session->get('selected');
        }else{
            $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_category_order_by"])?$fields_from_params["fields"]["indexed_category_order_by"]:'';
        }
  //$fields_from_params["views"]["selected"] = $session->get('selected');
    }else
        $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_parent_child_order_by"])?$fields_from_params["fields"]["indexed_parent_child_order_by"]:'';
        //end sort params
        
    if($params->get('layout')){
        $header = $parent_child_instances_layout->title;
    }elseif($_REQUEST['option'] == 'com_simplemembership'){
        $header = $params->get('tab_name');
    }else{
        $header = set_header_name_cck($menu, $Itemid);
    }
    //$header = $params->get('layout') ? "$user_instances_layout->title" : set_header_name_cck($menu, $Itemid);
    $params->def('header', $header);
    $params->def('pageclass_sfx', '');
    

    //alfabetical pagination

    $sp = 0;
    if (array_key_exists("sp", $_REQUEST)){
      $sp = JFactory::getApplication()->input->getInt('sp', 0);
    }
    $where = '';
    $list_str = array();
    if (array_key_exists("letindex", $_REQUEST)) {
        $search = JFactory::getApplication()->input->getCmd("letindex",'');

        if(isset($_REQUEST['now_indexed']) && $search != 'all'){

          if($sp == 1 && $_REQUEST['now_indexed'] == $fields_from_params["views"]["selected"]){
            $where = " AND LOWER(instance." . $_REQUEST['now_indexed'] . ") LIKE '$search%' ";
          }else{
            $where = '';
          }
        }
    }
    
    $custom_sql_where = '';
    if(isset($fields_from_params['views']['request_layout_sql_show']) && !empty($fields_from_params['views']['request_layout_sql_show'])){
        foreach ($fields_from_params['views']['request_layout_sql_show'] as $request_layout){
            foreach($request_layout as $sql_show){
                $custom_sql_where .= ' ' . $sql_show . ' ';
            }
        } 
    }
    
    //user access
    if($child_entity_id > 0 && isset($cck_entity_configuration[$child_entity_id]) && $cck_entity_configuration[$child_entity_id]['check_access_instances'] == 0){
          $access_where = '';
      }else{
          $access_where = ' AND (' . getWhereUsergroupsConditionCCK('ei') . " or ei.access='') ";
      }
    

    if(strstr($fields_from_params["views"]["selected"], 'text_textfield') !== false){

        $query = "SELECT DISTINCT UPPER(SUBSTRING(instance.".$fields_from_params["views"]["selected"].", 1,1)) AS symb FROM #__os_cck_entity_instance AS ei "
            . "LEFT JOIN #__os_cck_child_parent_connect as c_p_ch ON (c_p_ch.fid_child = ei.eiid OR c_p_ch.fid_parent = ei.eiid) "
            . "LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
            . "LEFT JOIN `#__os_cck_content_entity_$child_entity_id` as instance ON instance.`fk_eiid` = ei.eiid "
            . "WHERE ei.published='1' "
            . "AND ei.approved='1' "
            . "AND ei.fk_eid='$child_entity_id' "
            . "AND (c_p_ch.fid_child='$parent_instance_id' OR c_p_ch.fid_parent='$parent_instance_id') $access_where $custom_sql_where GROUP BY ei.eiid ORDER BY symb";  
           
    //var_dump($query); exit;
        $db->setQuery($query);
        $tmp_arr = $db->loadObjectList();
        
        if(count($tmp_arr)>1){

          $symb_list_str = '<ul>';
          foreach($tmp_arr as $symbol){

            if(empty($symbol->symb)){
              continue;
            }

          $symb_list_str.= '<li><a href="index.php?option=' . $option . 
          '&view=parent_child&letindex=' . $symbol->symb . '&sp=1&Itemid=' . $Itemid . 
            '&now_indexed=' . $fields_from_params["views"]["selected"] . '&userId=' . $user . '">' . 
          $symbol->symb . '</a></li> ';
            
          }

          //check string not empty
          if(!empty(strip_tags($symb_list_str))){
            $symb_list_str.= '<li><a href="index.php?option=' . $option . 
            '&view=parent_child&letindex=all&sp=1&Itemid=' . $Itemid . 
            '&now_indexed=' . $fields_from_params["views"]["selected"] . '">all</a></li> ';
          }
          
          $symb_list_str.= "</ul>";
          $list_str['symbol_list'] = $symb_list_str;
        }else{
          $list_str['symbol_list'] = false;
        }
    }else{
      $list_str['symbol_list'] = false;
    }

    //alfabetical pagination
            
    $query = "SELECT COUNT(DISTINCT c_p_ch.fid_child, c_p_ch.fid_parent) FROM #__os_cck_entity_instance AS ei "
            . "LEFT JOIN #__os_cck_child_parent_connect as c_p_ch ON (c_p_ch.fid_child = ei.eiid OR c_p_ch.fid_parent = ei.eiid) "
            . "LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
            . "LEFT JOIN `#__os_cck_content_entity_$child_entity_id` as instance ON instance.`fk_eiid` = ei.eiid "
            . "WHERE ei.published='1' "
            . "AND ei.approved='1' "
            . "AND ei.fk_eid='$child_entity_id' "
            . "AND (c_p_ch.fid_child='$parent_instance_id' OR c_p_ch.fid_parent='$parent_instance_id') $access_where $custom_sql_where ";
    
    $db->setQuery($query);
    $total = $db->loadResult();
    
    if($max_items != '0' && $max_items < $total ) {
      if($limit > $max_items )$limit = $max_items;
      $total = $max_items;
    }
    
     if( isset($fields_from_params['views']['selected']) && 
         ( !isset( $fields_from_params['views']['order_by_fields'] ) || !is_array( $fields_from_params['views']['order_by_fields'] ) ||
          ( is_array( $fields_from_params['views']['order_by_fields'] ) && !in_array($fields_from_params["views"]["selected"],$fields_from_params['views']['order_by_fields']) 
          ) 
         )
        )
     {

        $fields_from_params["views"]["selected"] = isset($fields_from_params["fields"]["indexed_parent_child_order_by"])?$fields_from_params["fields"]["indexed_parent_child_order_by"]:'';
     }
    
    $pageNav = new JPagination($total, $limitstart, $limit);

    
    $query = "SELECT DISTINCT c_p_ch.fid_child, c_p_ch.fid_parent FROM #__os_cck_entity_instance AS ei "
            . "LEFT JOIN #__os_cck_child_parent_connect as c_p_ch ON (c_p_ch.fid_child = ei.eiid OR c_p_ch.fid_parent = ei.eiid) "
            . "LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "
            . "LEFT JOIN `#__os_cck_content_entity_$child_entity_id` as instance ON instance.`fk_eiid` = ei.eiid "
            . "WHERE ei.published='1' "
            . "AND ei.approved='1' "
            . "AND ei.fk_eid='$child_entity_id' "
            . "AND (c_p_ch.fid_child='$parent_instance_id' OR c_p_ch.fid_parent='$parent_instance_id') $access_where $custom_sql_where ";
            
            
            
        if(isset($fields_from_params["fields"]["indexed_parent_child_order_by"])){ // if selected sortable field
            $orderby = (!empty($fields_from_params["views"]["sortType_parent_child_order_by"])) ? $fields_from_params["views"]["sortType_parent_child_order_by"] : 'ASC';
          if (isset($fields_from_params["views"]["selected"]) && !empty( $fields_from_params["views"]["selected"])) {
              $index = 0;
              foreach ($fields_from_params['views']['show_request_layout'] as $key => $val){
              
                  $request_layout = new os_cckLayout($db);
                  $request_layout->load($key);
                  $request_layout_fields_params = unserialize($request_layout->params);
                  $views_selected = $fields_from_params["views"]["selected"] . '_average';
                  if($request_layout->type == 'instance' && $index == 0){ 
                    if($fields_from_params["views"]["selected"] == 'title'){
                      $query .= "ORDER BY ei.title $orderby ";
                    }
                    elseif(stripos($fields_from_params["views"]["selected"], 'rating_field') !== FALSE){
                          $query = "SELECT  ei.eiid,ccc.fk_cid,AVG(instance2.`" . $fields_from_params['views']['selected'] . "`) as rating FROM  #__os_cck_entity_instance AS ei "
                                     . "\n LEFT JOIN #__os_cck_categories_connect AS ccc ON ccc.fk_eiid=ei.eiid "
                                     . "\n LEFT JOIN #__os_cck_layout AS lay ON lay.lid=ei.fk_lid "
                                     . "\n LEFT JOIN `#__os_cck_content_entity_$child_entity_id` as instance ON instance.`fk_eiid` = ei.eiid "
                                     . "\n LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid "    
                                     . "\n LEFT JOIN #__os_cck_child_parent_connect AS cpc ON cpc.fid_parent=ei.eiid "
                                     . "\n LEFT JOIN `#__os_cck_content_entity_$child_entity_id` as instance2 ON instance2.`fk_eiid` = cpc.fid_child "
                                     . "\n WHERE ei.published='1' "
                                     . "\n AND ei.approved='1' "
                                     . "\n AND lay.type='add_instance' "
                                     . "\n AND ei.fk_userid='{$user}' "
                                     . "\n AND ei.fk_eid='" . $child_entity_id . "' $where $access_where $custom_sql_where"
                                     . "\n GROUP BY ei.eiid "
                                     . "\n ORDER BY rating $orderby";

                      }
                    else{
                        
                      $query .= "ORDER BY instance.`{$fields_from_params["views"]["selected"]}` $orderby ";
                    }
                    $index++;
                  }
                  
              }
          }elseif($fields_from_params["fields"]["indexed_parent_child_order_by"] == 'eid') {
                  $query .= "ORDER BY ei.eiid $orderby ";
          }elseif ($fields_from_params["fields"]["indexed_parent_child_order_by"] == 'title') {
                  $query .= "ORDER BY ei.title $orderby ";
          }else { // for other fields
                  $query .= "ORDER BY instance.`{$fields_from_params["fields"]["indexed_parent_child_order_by"]}` $orderby ";
          }
        }
    $session = JFactory::getSession();
    $session->set( 'queryItemIds', $query );//need for pagination in instances//we save our query to know how to sort ourinstance//
    $query .= " LIMIT $pageNav->limitstart, $pageNav->limit ";
    
    $db->setQuery($query); 
    $items = $db->loadObjectList();
    //var_dump($items);
    $instancies = array();
    $temp_instancies_id = array();
    foreach ($items as $item) {
        
        if($item->fid_child == $parent_instance_id){
            if(!in_array($item->fid_parent, $temp_instancies_id)){
                $instance = new os_cckEntityInstance($db);
                $instance->load($item->fid_parent);
                $temp_instancies_id[] = $item->fid_parent;
                $instancies[] = $instance;
            }
        }else{
            if(!in_array($item->fid_child, $temp_instancies_id)){
                $instance = new os_cckEntityInstance($db);
                $instance->load($item->fid_child);
                $temp_instancies_id[] = $item->fid_child;
                $instancies[] = $instance;
            }
        }
        
    }
        

    //cck_constructPathway($category, 'category');
    $params->def('show_rating', 1);
    $params->def('hits', 1);
    $params->def('back_button', $app->getCfg('back_button'));

    //var_dump($fields_from_params['views']);
    $layout_params = unserialize($parent_child_instances_layout->params);
    $layout_params['custom_fields'] = unserialize($parent_child_instances_layout->custom_fields);
    $layout_params['cat_layout_params'] = $fields_from_params;
    $bootstrap_version = $session->get( 'bootstrap','2');
    $parent_child_instances_layout->layout_html = $parent_child_instances_layout->getLayoutHtml($bootstrap_version);
    if(isset($layout_params['attachedModuleIds'])){
      $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
      $mids = array();
      foreach ($layout_params['attachedModule'] as $attachedModuleId) {
        if($attachedModuleId){
          $mids[] = $attachedModuleId;
        }
      }
      if($mids){
        $mids = str_replace('m_', '', $mids);
        $mids = implode(',', $mids);
        $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
        $db->setQuery($query);
        $layout_params['attachedModule'] = $db->loadObjectList('id');
      }
    }

    $layout = $parent_child_instances_layout;
    
    $type = 'parent_child';
    if($option == 'com_simplemembership'){
        $option = 'com_os_cck';
        
    }
    
    require getLayoutPathCCK::getLayoutPathCom($option, $type);
    
  }
  
  static function showCartLayout($option, $lid, $mod_type = 0, $cart_type = 'default'){
      global $app, $db, $acl, $user, $doc, $session;
    global $Itemid, $os_cck_configuration, $limit, $total, $limitstart,$moduleId ,$session;

    $Itemid = intval($_REQUEST['Itemid']);
    $moduleId =(($moduleId == 0
                 || empty($moduleId)) && isset($_REQUEST['moduleId'])) ? intval($_REQUEST['moduleId']) : $moduleId;
    
    $app = JFactory::getApplication();
    $input = $app->input;
    
    $task = $input->get('view', '', 'STRING');
    
    $currentcat = NULL;
    $cart = $session->get('cart', array());
    //var_dump($session->get('cart', array())); exit;

    if(!$moduleId){
      // Params(cck component menu)
      $menu = new JTableMenu($db);
      $menu->load($Itemid);
      $params = new JRegistry;
      $params->loadString($menu->params);

    }else{

      $mod_row =  JTable::getInstance ( 'Module', 'JTable' );//load module tables and params

      if (! $mod_row->load ( $moduleId )) {
        JError::raiseError ( 500, $mod_row->getError () );
      }
      //module params
      $params = new JRegistry;
      $params->loadString($mod_row->params);
      //itemId


      $value = ($params->get('layout_type') == 'category')?
                              'category_layout' : 'map_category_layout';

      $query = "SELECT id  FROM #__menu WHERE menutype like '%menu%'"
                      . "\n AND link LIKE '%option=com_os_cck%'"
                      . "\n AND params LIKE '%back_button%'"
                      . "\n AND params LIKE '%".$value."%'"
                      . "\n AND published = 1";
      $db->setQuery($query);
      $Itemid = $db->loadResult();
       if($params->get('ItemId'))$Itemid=$params->get('ItemId');
    }

    
    $entity_layout = new os_cckLayout($db);
    $cart_layout = new os_cckLayout($db);

    
    if(!$lid || $lid == -1){
        
      if($params->get('cart_layout') || $params->get('layout_type') == 'cart'){
          
        $cart_layout->load($params->get('layout')?$params->get('layout') : $params->get('cart_layout'));
        if(!$cart_layout->published){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_CREATE_CATEGORY_LAYOUT"));
            return;
        }
        $fields_from_params = unserialize($cart_layout->params);

      }//end category menu
      
    }else{

      $cart_layout->load($lid);
      $fields_from_params = unserialize($cart_layout->params);
      $entity_id = $cart_layout->fk_eid;
    }
    

    if($cart_layout->type != 'cart'){
      JError::raiseWarning(0, "Layout type load error Cart layout ID: ".$cart_layout->lid);
      return;
    }
    
    if($cart_layout->fk_eid){
        $entity_name = $cart_layout->fk_eid;
    }else{
        return;
    }

    
    
    $instancies = array();
    foreach ($cart as $item) {
        
        $instance = new os_cckEntityInstance($db);
        $instance->load($item['eiid']);
        $instancies[] = $instance;
    }
    
    $categories = array();

    //os_cck_site_controller::cck_constructPathway($category, 'cart', $mod_type);
    $params->def('show_rating', 1);
    $params->def('hits', 1);
    $params->def('back_button', $app->getCfg('back_button'));
    $currentcat = new stdclass();

    //$currentcat->descrip = $category->description;
    // page image
    $currentcat->img = null;
    $path = JURI::root() . '/images/stories/';
    
    $currentcat->header = $params->get('header');

    $tabclass = array('sectiontableentry1', 'sectiontableentry2');
    if(!$instancies && $cart_type == 'default'){
        echo '<div style="text-align:center"><h2>'.JText::_("COM_OS_CCK_CART_IS_EMPTY").'</h2></div>';
    }
    $layout_params = unserialize($cart_layout->params);
    
    $layout_params['custom_fields'] = unserialize($cart_layout->custom_fields);
    $layout_params['cat_layout_params'] = $fields_from_params;
    $bootstrap_version = $session->get( 'bootstrap','2');
    $cart_layout->layout_html = $cart_layout->getLayoutHtml($bootstrap_version);
    //$layout_params['parent_layout_params'] = $parent_layout_params;
    //$layout_params['catid'] = $catid;
    
    if(isset($layout_params['attachedModuleIds'])){
      $layout_params['attachedModule'] = explode('|_|',$layout_params['attachedModuleIds']);
      $mids = array();
      foreach ($layout_params['attachedModule'] as $attachedModuleId) {
        if($attachedModuleId){
          $mids[] = $attachedModuleId;
        }
      }
      if($mids){
        $mids = str_replace('m_', '', $mids);
        $mids = implode(',', $mids);
        $query = "SELECT id, title, module as type FROM #__modules WHERE id IN (" . $mids . ")";
        $db->setQuery($query);
        $layout_params['attachedModule'] = $db->loadObjectList('id');
      }
    }
    
    $count = 0;
    foreach ($cart as $item){
          $price_fields = json_decode($item['price_fields']);
          if(isset($price_fields[0]->quantity)){
              $count += $price_fields[0]->quantity;
          }else{
              $count += 1;
          }
      }

    

    $layout = $cart_layout;

    if($cart_type == 'default'){
        $type = 'cart';
    }else{
        $type = 'small_cart';
    }

    require getLayoutPathCCK::getLayoutPathCom($option, $type);
  }
  

}
