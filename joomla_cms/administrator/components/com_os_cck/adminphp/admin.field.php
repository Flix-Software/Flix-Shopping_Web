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

class AdminField{

  static function showLayoutFields($option){
    global $db, $app, $jConf;
    $limit = $app->getUserStateFromRequest("viewlistlimit", 'limit', $jConf->get("list_limit",10));
    $limitstart = $app->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0);
    $pub = $app->getUserStateFromRequest("pub{$option}", 'pub', '');
    $entity_id = $app->input->get("fk_eid",'');
    $layout_type = $app->input->get("layout_type",'');
    
    $where = array();
    array_push($where, "ef.fk_eid = e.eid ");
    if ($entity_id != '') {
      array_push($where, "ef.fk_eid ='{$entity_id}'");
    }
    // if ($pub == "pub") {
    //   array_push($where, "ef.published = 1");
    // } else if ($pub == "not_pub") {
    //   array_push($where, "ef.published = 0");
    // }

    $query = "SELECT COUNT(ef.fid) FROM #__os_cck_entity_field AS ef, #__os_cck_entity AS e " .
        (count($where) ? " WHERE " . implode(' AND ', $where) : "");

    $db->setQuery($query);
    $total = $db->loadResult();
    $pageNav = new JPagination($total, $limitstart, $limit);

    $query = "SELECT ef.* , e.name  FROM #__os_cck_entity_field AS ef, #__os_cck_entity AS e " .
        (count($where) ? " WHERE " . implode(' AND ', $where) : "") .
        " ORDER BY  ef.field_name";

    $db->setQuery($query);
    $extrafield_list = $db->loadObjectList();
    $entities = array();
    $entities[] = array('value' => '', 'text' => 'All entities');
    $query = "SELECT eid AS value, name AS text FROM #__os_cck_entity ORDER BY name";
    $db->setQuery($query);
    $ent = $db->loadObjectList();
    $entities = (count($ent) > 1) ? array_merge($entities, (array)$ent) : $entities;
    $entity_list = JHTML::_('select.genericlist',$entities, 'entity_id', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $entity_id);

    $pubmenu[] = JHTML::_('select.option','0', JText::_('COM_OS_CCK_LABEL_SELECT_TO_PUBLIC'));
    $pubmenu[] = JHTML::_('select.option','-1', JText::_('COM_OS_CCK_LABEL_SELECT_ALL_PUBLIC'));
    $pubmenu[] = JHTML::_('select.option','not_pub', JText::_('COM_OS_CCK_LABEL_SELECT_NOT_PUBLIC'));
    $pubmenu[] = JHTML::_('select.option','pub', JText::_('COM_OS_CCK_LABEL_SELECT_PUBLIC'));
    $publist = JHTML::_('select.genericlist',$pubmenu, 'pub', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $pub);

    AdminViewField :: showLayoutFields($option, $extrafield_list, $pageNav, $entity_list, $publist, $layout_type);
  }

  static function addLayoutField($option,$fid){
    global $db, $app;
    $params = new JRegistry;
    if($fid){
      $field = new os_cckEntityField($db);
      $field->load($fid);
      $params->loadString($field->params);
    }else{
      $field = '';
    }
    
    $layout_type = $app->input->get("layout_type",'');
    
    $field_types = array();
    $field_types[] = JHTML::_('select.option','audiofield', 'Audio Field');
    $field_types[] = JHTML::_('select.option','captcha_field', 'Captcha');
    $field_types[] = JHTML::_('select.option','categoryfield', 'Category');
    $field_types[] = JHTML::_('select.option','text_single_checkbox_onoff', 'Checkbox');
    $field_types[] = JHTML::_('select.option','datetime_popup', 'Date');
    $field_types[] = JHTML::_('select.option','filefield', 'File Field');
    $field_types[] = JHTML::_('select.option','galleryfield', 'Gallery');
    $field_types[] = JHTML::_('select.option','imagefield', 'Image Field');
    $field_types[] = JHTML::_('select.option','locationfield', 'Location map');
    $field_types[] = JHTML::_('select.option','decimal_textfield', 'Number Field');
    if($layout_type != 'rent_request_instance' && $layout_type != 'buy_request_instance'){
        $field_types[] = JHTML::_('select.option','pricefield_number', 'Price Field (Number)');
        // $field_types[] = JHTML::_('select.option','pricefield_select_list', 'Price Field (Select List)');
        // $field_types[] = JHTML::_('select.option','pricefield_radio_buttons', 'Price Field (Radio buttons)');
    }
    $field_types[] = JHTML::_('select.option','text_radio_buttons', 'Radio buttons');
    $field_types[] = JHTML::_('select.option','rating_field', 'Rating Field');
    $field_types[] = JHTML::_('select.option','text_select_list', 'Select list');
    $field_types[] = JHTML::_('select.option','text_textfield', 'Text');
    $field_types[] = JHTML::_('select.option','text_textarea', 'Text Area');
    $field_types[] = JHTML::_('select.option','text_url', 'Url');
    $field_types[] = JHTML::_('select.option','videofield', 'Video Field');   

    if($fid){
      //print_r($field_types);exit;
      $field_type_input = '<input id="field_type" type="hidden" name="field_type" value="'.$field->field_type.'">'.$field->field_type;  
    }else{
      $field_type_input = JHTML::_('select.genericlist',$field_types, 'field_type',
                         'size="1" onchange="checkFieldType(jQuerOs(this).val())"', 'value', 'text', 'text_textfield');
    }

    AdminViewField::addLayoutField($option, $field_type_input, $params, $field);
  }

  static function saveLayoutField($fid){
    global $db, $mosConfig_absolute_path;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $input = JFactory::getApplication()->input;
    $params = new JRegistry;
    $fieldName = trim($input->get("field_name","","STRING"));
    $app = JFactory::getApplication();
    
    $fieldType = $input->get("field_type","","STRING");
    $fieldName = str_ireplace(array("`","'"), "", $fieldName);
    if(trim($fieldType) != 'text_select_list'){
        
        $allowed_value = $input->get("allowed_value",false,"STRING");
        //var_dump($allowed_value); exit;
        if(is_array($allowed_value)){
            $allowed_value = trim($allowed_value[0]);
        }else{
            $allowed_value = trim($allowed_value);
        }
      
      
      $str_param = $allowed_value;
      $child_param = '';
    }else{
        
      $allowed_value = array_diff($input->get("allowed_value", array(),"ARRAY"), array(''));
      $childSelect = $input->get("child_select",array(''),"ARRAY");

      //create string for save in params
      if(count($allowed_value) > 1){
        $str_param = '';
        $child_param = '';
        foreach ($allowed_value as $key => $value) {
          if(!empty($value) && $value != end($allowed_value)){
            $str_param .= $value.'\sprt';
            $child_param .= $childSelect[$key].'|';
          }else{
            $str_param .= $value;
            $child_param .= $childSelect[$key];
          }
        }
      }else{
        $str_param = array_pop($allowed_value);
        $child_param = array_pop($childSelect);
      }
      
    }

    //child selects

    
    $default_value = $input->get("default_value",'',"STRING");
    
    $fk_eid = $input->get("fk_eid",0,"INT");
    $params->set("allowed_value",$str_param);
    $params->set("child_select",$child_param);
    $params->set("default_value",$default_value);


    $field = new os_cckEntityField($db);
    if($fid){
      $field->load($fid);
    }
    $field->field_name = $fieldName;
    $field->params = $params->toString();
    $field->field_type = $fieldType;
    $field->fk_eid = $fk_eid;
    
    if (!$field->store()) {
      JError::raiseWarning(0,addslashes($field->getError()));
      
    }
  }

  static function saveLayoutFieldName($option){
    global $db, $mosConfig_absolute_path;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $input  = JFactory::getApplication()->input;
    
    $fieldName = $input->get("field_name","","STRING");
    $fk_eid = $input->get("fk_eid",0,"INT");
    $fid = $input->get("fid",0,"INT");

    if($fid) {
      $field = new os_cckEntityField($db);
      $field->load($fid);
      $field->field_name = $fieldName;
    }

    if (!$field->store()) {
      JError::raiseWarning(0,addslashes($field->getError()));
    }

    echo '<span class="cck-success-message">Field(s) deleted successful.</span>';
    self::showLayoutFields($option);
  }

  static function deleteField($option){ 
    global $db;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $input  = JFactory::getApplication()->input;
    $fidArr = $input->get("fid",array(),"ARRAY");
    foreach ($fidArr as $field_id) {
      $field = new os_cckEntityField($db);
      $field->load($field_id);
      //delete field from layout
      $query = "SELECT id,layout_html FROM #__os_cck_layout_html";
      $db->setQuery($query);
      $layoutArray = $db->loadObjectList();
      foreach ($layoutArray as $layoutArr) {
        $html = urldecode($layoutArr->layout_html);
        if(!empty($html)){
          $html = htmlspecialchars($html);
          $dom = new DOMDocument;
          $dom->loadHTML($html, LIBXML_HTML_NODEFDTD);
          $finder = new DomXPath($dom);
          $classname="drop-item";
          $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
          foreach ($nodes as $contentNode) {
            if(strpos($contentNode->textContent, '{|f-'.$field_id.'|}') != ''){
              $contentNode->parentNode->removeChild($contentNode);
              $layout_html = $dom->saveHTML();
              $layout_html = str_replace('<html><body>', '', $layout_html);
              $layout_html = str_replace('</body></html>', '', $layout_html);
              $layout_html = urlencode($dom->saveHTML());
              $query = "UPDATE #__os_cck_layout_html SET layout_html='$layout_html' WHERE id=$layoutArr->id";
              $db->setQuery($query);
              $db->query();
            }
          }
        }
      }
      //end layout
      $field->delete();
    }
    echo '<span class="cck-success-message">Field(s) deleted successful.</span>';
    self::showLayoutFields($option);
  }

  static function publishFields($publish, $option){
    global $db, $my;
    if(!cck_checkReferer()){
        JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
        return;
    }
    $input  = JFactory::getApplication()->input;
    $fid = $input->get("fid",0,"INT");
    $task = $input->get("task",'',"STRING");
    if(!$fid){
      echo '<span class="cck-error-message">Select an item to '.addslashes($task).'</span>';
      self::showLayoutFields($option);
      return;
    }

    $db->setQuery("UPDATE #__os_cck_entity_field SET published='$publish' WHERE fid = $fid");
    if (!$db->query()) {
      echo '<span class="cck-error-message">'.addslashes($db->getErrorMsg()).'</span>';
      self::showLayoutFields($option);
      return;
    }
    self::showLayoutFields($option);
  }

  static function show_in_ins($show, $option){
    global $db, $my;
    $input  = JFactory::getApplication()->input;
    $fid = $input->get("fid",0,"INT");
    $task = $input->get("task",'',"STRING");
    if(!$fid){
      echo '<span class="cck-error-message">Select an item to '.addslashes($task).'</span>';
      self::showLayoutFields($option);
      return;
    }

    $db->setQuery("UPDATE #__os_cck_entity_field SET show_in_instance_menu='$show' WHERE fid = $fid");
    if (!$db->query()) {
      echo '<span class="cck-error-message">'.addslashes($db->getErrorMsg()).'</span>';
      self::showLayoutFields($option);
      return;
    }
    self::showLayoutFields($option);
  }

  static function getSelectList(){
    global $db, $app;
    
    $fk_eid = $app->input->get("fk_eid",'');
    $query = "SELECT * FROM #__os_cck_entity_field WHERE field_type = 'text_select_list' AND  fk_eid = '". $fk_eid ."' ORDER BY fid ASC";
    $db->setQuery($query);
    $result = $db->loadAssocList();

    return $result;
  }
  
  static function getEntityFieldsAjax(){
      global $db; 
      $input = JFactory::getApplication()->input;
      
      $childEntityId = $input->get('childEntityId', 0, 'INT');
      $layoutType = $input->get('layoutType', '', 'STRING');
      $entityId = $input->get('entityId', 0, 'INT');
      //var_dump($entityId); exit;
      $childEntity = new os_cckEntity($db);
      $childEntity->load($childEntityId);
      $fields = $childEntity->getFieldList();
      
      if($layoutType == 'instance' || $layoutType == 'search'){
          $query = "SELECT lid FROM #__os_cck_layout WHERE fk_eid='$entityId' AND type='add_instance'";
          
          $db->setQuery($query);
          $entity_layouts = $db->loadObjectList();
          $childEntityFieldsOptions = array();
          if(!empty($entity_layouts)){
              foreach ($entity_layouts as $layout_id){
                  $layout = new os_cckLayout($db);
                  $layout->load($layout_id->lid);
                  $layout_params = unserialize($layout->params);
                  
                  if(isset($layout_params['child_entities']) && is_array($layout_params['child_entities']) 
                          && !empty($layout_params['child_entities'])){
                      foreach ($layout_params['child_entities'] as $child_entity){
                          if($child_entity->childEntityId == $childEntityId){
                              $childEntityFieldsOptions[] = JHTML::_('select.option', $child_entity->data_field_name, $child_entity->entity_alias, "value", "text");
                          }
                      }
                  }
              }
          }
          $childEntityFieldsSelectList = JHTML::_('select.genericlist', $childEntityFieldsOptions, 'child_entity_fields_' . $childEntityId, '', 'value', 'text', 0);
          //var_dump($entity_layouts); exit;
      }
      //var_dump($childEntityFieldsOptions);
      $html = '';
      if($layoutType == 'instance' || $layoutType == 'search'){
          if(!empty($childEntityFieldsOptions)){
              if(is_array($fields) && !empty($fields)){
                  if($layoutType == 'instance' || $layoutType == 'search'){
                      $html .= '<div>' . $childEntityFieldsSelectList . '</div>';
                  }
                  
                  foreach($fields as $field){
                      $html .= '<div class="child_entity_fields_check"><input type="checkbox" class="child_entity" name="' . $field->fid . '"><label>' . $field->field_name . '</label></div>';
                  }
                  
                  if($layoutType == 'instance' || $layoutType == 'search'){
                      $html .= '<input type="button" class="button child_entity_fields_button" onclick="addChildEntityShowLayout('.$childEntityId.',\''.$childEntity->name.'\')" value="Add Child">';
                  }else{
                      $html .= '<input type="button" class="button child_entity_fields_button" onclick="addChildEntity('.$childEntityId.',\''.$childEntity->name.'\')" value="Add Child">';
                  }

              }
          }else{
              $html = '<div style="color: red;"><h3>' . JText::_("COM_OS_CCK_LABEL_ADD_CHILD_ENTITY_FIRST") . '</h3></div>';
          }
          
      }else{
          
          if(is_array($fields) && !empty($fields)){
              
              if($layoutType == 'instance'){
                  $html .= '<div>' . $childEntityFieldsSelectList . '</div>';
              }
              $html .= '<div id="sort">';
              $sort_array = array();
              $html .= '<div id="id" class="child_entity_fields_check"><input type="checkbox" class="child_entity" name="id"><label>ID</label></div>';
              $sort_array[] = 'id';
              foreach($fields as $field){
                  $html .= '<div id="'.$field->fid.'" class="child_entity_fields_check"><input type="checkbox" class="child_entity" name="' . $field->fid . '"><label>' . $field->field_name . '</label></div>';
                  $sort_array[] = $field->fid;
                  
              }
              $html .= '</div>';
              if($layoutType == 'instance'){
                  $html .= '<input type="button" class="button child_entity_fields_button" onclick="addChildEntityShowLayout('.$childEntityId.',\''.$childEntity->name.'\')" value="Add Child">';
              }else{
                  $html .= '<div><input type="button" class="button child_entity_fields_button" onclick="addChildEntity('.$childEntityId.',\''.$childEntity->name.'\')" value="Add Child"></div>';
              }
              $html .= "<input type='hidden' name='sorting' id='sorting' value='". json_encode($sort_array)."'>";

          }
      }
      echo $html;
      //var_dump($fields); exit;
  }
  
  static function getNameEntityFieldsAjax(){
      global $db;
      $input = JFactory::getApplication()->input;
      
      $fieldId = $input->get('fieldId', 0, 'INT');
      $entityId = $input->get('entityId', 0, 'INT');
      $childEntityId = $input->get('childEntityId', 0, 'INT');
      $layoutType = $input->get('layout_type', '', 'STRING');
      $fieldMask = $input->get('fieldMask', '', 'STRING');
      //var_dump($layoutType);
      $entity = new os_cckEntity($db);
      $entity->load($entityId);
      
      $field = new os_cckEntityField($db);
      $field->load($fieldId);
      
      if($layoutType == 'instance' || $layoutType == 'search'){
          $query = "SELECT lid FROM #__os_cck_layout WHERE fk_eid='$entityId' AND type='add_instance'";
          
          $db->setQuery($query);
          $entity_layouts = $db->loadObjectList();
          
          $childEntityFieldName = '';
          if(!empty($entity_layouts)){
              foreach ($entity_layouts as $layout_id){
                  $layout = new os_cckLayout($db);
                  $layout->load($layout_id->lid);
                  $layout_params = unserialize($layout->params);
                  
                  if(isset($layout_params['child_entities']) && is_array($layout_params['child_entities']) 
                          && !empty($layout_params['child_entities'])){
                      
                      foreach ($layout_params['child_entities'] as $child_entity){
                          if($child_entity->data_field_name . '_'.$fieldId == $fieldMask){
                              $childEntityFieldName = $child_entity->entity_alias;
                          }
                     }
                  }
              }
          }
          //$childEntityFieldsSelectList = JHTML::_('select.genericlist', $childEntityFieldsOptions, 'child_entity_fields_' . $childEntityId, '', 'value', 'text', 0);
          //var_dump($entity_layouts); exit;
      }
      
      $name = $childEntityFieldName . ' - ' . $field->field_name;
      //var_dump($name);
      echo $name;
  }

  static function addFieldMaskForSqlWhereLayoutOptionByInParentChildLayoutAjax(){
      global $db, $input;
      $lid = $input->get("lid", '', "STRING");
      $child_lid = $input->get("key",'',"STRING");

      $layout = new os_cckLayout($db);
      $layout->load($lid);
      
      $child_layout = new os_cckLayout($db);
      $child_layout->load($child_lid);
      $child_entity_id = $child_layout->fk_eid;
      
      $layout->custom_field_mask_list = get_custom_mask_list($child_entity_id);
      
      $original_select = '<div class="original_select">
            <br>
            SELECT DISTINCT c_p_ch.fid_child, c_p_ch.fid_parent FROM #__os_cck_entity_instance AS ei <br>
            LEFT JOIN #__os_cck_child_parent_connect as c_p_ch <br>ON (c_p_ch.fid_child = ei.eiid OR c_p_ch.fid_parent = ei.eiid) <br>
            LEFT JOIN #__os_cck_content_instances_price AS price ON price.fk_eiid=ei.eiid <br>
            LEFT JOIN `#__os_cck_content_entity_$child_entity_id` as instance <br> ON instance.`fk_eiid` = ei.eiid <br>
            WHERE ei.published="1" <br>
            AND ei.approved="1" <br>
            AND ei.fk_eid="$child_entity_id" <br>
            AND (c_p_ch.fid_child="$parent_instance_id" OR c_p_ch.fid_parent="$parent_instance_id") 
            <span class="your_sql_where">{Your "Sql Where" expression}</span>
        </div>';
        //$layout_params = unserialize($layout->params);
      ob_start();
          require getLayoutPathCCK::getAdminLayoutViewPath('com_os_cck', 'modal_snippets', 'field-sql-show-modal');
          $html = ob_get_contents();
      ob_end_clean();

      $response = array('html' => $html);
      echo json_encode($response);
  }
}
