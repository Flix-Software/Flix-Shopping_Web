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

class AdminViewBuy_request{
  static function showBuyRequestInstances($option, & $rows_item, & $clist,
                                & $publist, & $search, & $pageNav, & $sort_arr, $show_fields,$entity_list)
  {
      global $doc, $user, $app, $session,$db;
      $html = "<div class='os_cck_caption' ><img src='./components/com_os_cck/images/os_cck_logo.png' alt ='Config' />" . JText::_('COM_OS_CCK_ADMIN_LABLE_ORDER') . "</div>";
      $app = JFactory::getApplication();
      $app->JComponentTitle = $html;
      $onclick = "Joomla.checkAll(this);";
      ?>
      <form action="index.php" method="post" name="adminForm" id="adminForm">
        <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist filters">
          <tr>
            <td>
             <div class="search_block">
              <input type="text" placeholder="<?php echo JText::_('COM_OS_CCK_SHOW_SEARCH'); ?>" name="search" value="<?php echo $search; ?>" class="inputbox"
                   onChange="document.adminForm.submit();"/>
              <button type="submit" class="cck_search_button" title="" data-original-title="Search"><span class="icon-search"></span></button>
              </div>
            </td>
            <td>
              <?php echo $publist; ?>
            </td>
            <td>
              <?php echo $clist; ?>
            </td>
            <td>
              <?php echo $entity_list; ?>
            </td>
            <?php if (version_compare(JVERSION, "3.0.0", "ge")) { ?>
              <td>
                <div class="btn-group pull-right hidden-phone">
                  <label for="limit"
                         class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC'); ?></label>
                  <?php echo $pageNav->getLimitBox(); ?>
                </div>
              </td>
            <?php } ?>
          </tr>
        </table>
        <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
          <tr>
            <th width="3%" align="center">
                <input type="checkbox" name="toggle" value="" onClick="<?php echo $onclick; ?>"/>
            </th>
            <th align="center" class="title" width="3%" nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_LABEL_INSTANCE_ID'), 'inst_id', $sort_arr,JRequest::getVar('task'));?></th>
            <?php
            foreach($show_fields as $value){
              foreach($value as $field){
                ?>
                <th align="left" class="title" width="10%"
                  nowrap="nowrap"><?php echo HTML_os_cck::sort_head($field->field_name, $field->db_field_name, $sort_arr,JRequest::getVar('task'));?></th>
                <?php
              }
            }
            ?>
            <th align="left" class="title" width="15%"
              nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_BUY_DATE'), 'created', $sort_arr,JRequest::getVar('task'));?></th>
            <th align="left" class="title" width="75%"
                nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_REQUEST_ENTITY'), 'created', $sort_arr,JRequest::getVar('task'));?></th>
          </tr>
          <?php
            $item_session = JFactory::getSession();
            $item_session->set('sorting_direction', $sort_arr['sorting_direction']);
            for ($i = 0, $n = count($rows_item); $i < $n; $i++) {
              $row = & $rows_item[$i];
              ?>
              <tr class="row<?php echo $i % 2; ?> <?php echo $row->notreaded?'not-readed':''?>">
                <td width="3%" align="center">
                  <?php if ($row->checked_out && $row->checked_out != $user->id) { ?>
                    &nbsp;
                  <?php
                  } else {
                    echo JHTML::_('grid.id',$i, $row->eiid, ($row->checked_out && $row->checked_out != $user->id), 'eiid');
                  }
                  ?>
                </td>
                <td align="center"><a href="#edit_buy_request_instance"
                       onClick="return listItemTask('cb<?php echo $i; ?>','edit_buy_request_instance')">
                        <?php echo $row->eiid; ?></a></td>
    <!-- **************************************************************** -->
                <?php
                  foreach($show_fields as $key => $value){
                    foreach($value as $field){
                      $html = '';
                      if($row->fk_eid != $key){
                        echo'<td></td>';
                        continue;
                      }
                      if($field->field_type == 'categoryfield'){
                        echo "<td align='left'>$row->category</td>";
                        continue;
                      }
                      ?>
                      <td align="left">
                        <?php
                        $entityInstance = new os_cckEntityInstance($db);
                        $entityInstance->load($row->eiid);
                        $value = $entityInstance->getFieldValue($field);
                          ?>
                          <div style="float:left; margin-right:15px";>
                              <span class="col_box" style="display:block;
                              <?php echo ($field->field_type=='imagefield'
                                          && isset($field->options['width'])
                                          && isset($field->options['height']))? 'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':'';?>">
                                  <?php
                                      ob_start();
                                        require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                                        $html .= ob_get_contents();
                                      ob_end_clean();
                                      echo $html;
                                  ?>
                              </span>
                          </div>
                      </td>
                      <?php
                    }
                  }
                ?>
                <td align="left"><?php echo $row->created; ?></td>
                <td align="left"><?php echo $row->entity; ?></td>
            </tr>
          <?php
          }//end for
          ?>
          <tr>
            <td colspan="13"><?php echo $pageNav->getListFooter(); ?></td>
          </tr>
        </table>
        <input type="hidden" name="option" value="<?php echo $option; ?>"/>
        <input type="hidden" name="task" value="show_buy_request_instances"/>
        <input type="hidden" name="boxchecked" value="0"/>
      </form>

  <?php
  }

  static function editBuyRequestInstance($option, & $entityInstance, & $str_list, $price_fields, $parent_price_fields){
    global $os_cck_configuration,$user, $app, $session, $db;
    
    $html = "<div class='os_cck_caption' ><img src='./components/com_os_cck/images/os_cck_logo.png' alt ='Config' />" . JText::_('COM_OS_CCK_ADMIN_LABLE_ORDER') . "</div>";
    $app = JFactory::getApplication();
    $app->JComponentTitle = $html;
    $doc = JFactory::getDocument();
    $doc->addStyleSheet(JURI::root()."components/com_os_cck/assets/css/jquerOs-ui.min.css");
    $doc->addStyleSheet(JURI::root()."components/com_os_cck/assets/css/admin_style.css");
    
    $doc->addScript(JUri::root().'components/com_os_cck/assets/js/jquery.raty.js');
    //$doc->addScript(JURI::root()."components/com_os_cck/assets/js/base_64.js","text/javascript",true);
    $doc->addScript(JURI::root()."components/com_os_cck/assets/js/jquerOs-ui.min.js","text/javascript",true);
    
    $doc->addStyleSheet( JUri::root().'/components/com_os_cck/assets/lightbox/css/lightbox.css');
    $doc->addScriptDeclaration('jQuerOs=jQuerOs.noConflict();');
    $doc->addScript(JURI::root() . '/components/com_os_cck/assets/lightbox/js/lightbox-2.6.min.js');
    $key = 'key='.$os_cck_configuration->get("google_map_key",'');
    $doc->addScript('//maps.googleapis.com/maps/api/js?'.$key);
    
    if(empty($str_list['parent_instance'])){
      $div_id = 'parent_instance';
    }else{
      $div_id = 'child_instance';
      foreach ($price_fields as $price_field){
          
          $instance = new os_cckEntityInstance($db);
          $instance->load($price_field[0]->fk_eiid);
          if($instance->meta_title == ''){
              $layout = new os_cckLayout($db);
              $lid = $layout->getDefaultLayout($instance->fk_eid, 'instance');

              $sql = "SELECT params FROM #__os_cck_layout
                           \nWHERE lid =".intval($lid);

              $db->setQuery($sql);
              $params = $db->loadResult();
              $params = unserialize($params);

              //get all fields
              $sql =  "SHOW columns FROM #__os_cck_content_entity_" . $instance->fk_eid;
              //var_dump($sql); exit;
              $db->setQuery($sql);
              $cols = $db->loadColumn();


              //search Title field if exists
              for($k=0;$k<count($cols);$k++){
                if(isset($params['fields'][$cols[$k].'_title_field']) && $params['fields'][$cols[$k].'_title_field'] == 1){
                    $title_field = $cols[$k];
                }
              }

              if(!empty($title_field)){

                $sql = "SELECT fk_eiid AS id, ".$title_field." AS title_field FROM #__os_cck_content_entity_".$instance->fk_eid."

                         \nWHERE fk_eiid=".intval($instance->eiid);
                $db->setQuery($sql);
                $row = $db->loadObject();

                if(isset($row) && $row) {
                  $instance->meta_title = $row->title_field;
                }
              }

          }
          
          echo '<div class="single_product"><div class="product_title">'.$instance->meta_title.'</div>';
          $price_detail_html = '<div class="price_detail">';
          $calculated_price = 0;
          $quantity = 1;
          foreach ($price_field as $single_field){
              $field = new os_cckEntityField($db);
              $field->load($single_field->fk_fid); 
              
              if($single_field->price_type == 'base_price'){
                    if($single_field->quantity == 0) $single_field->quantity =1;
                    $calculated_currency = calculatedCurrency($instance, ($single_field->price_value * $single_field->quantity));
                    $not_quantity_calculated_currency = calculatedCurrency($instance, $single_field->price_value);
                    $tmp_price_quant = ($single_field->quantity>1) ? '(' . $not_quantity_calculated_currency[1] . ' x ' . $single_field->quantity . ')' : '';
                    if($single_field->quantity>1) {$quantity = $single_field->quantity;}
                    $price_detail_html .= '<div class="bace_price">' . $field->field_name . ' ' . $calculated_currency[0] . ' ' . $tmp_price_quant . '</div>';
                    $calculated_price = $calculated_price + ($single_field->price_value * $single_field->quantity);
              }elseif($single_field->price_type == 'val+' && $single_field->price_value != '0.00'){
                    $calculated_currency = calculatedCurrency($instance, ($single_field->price_value * $quantity));
                    $not_quantity_calculated_currency = calculatedCurrency($instance, $single_field->price_value);
                    $price_name = $field->field_name . ': ' . $single_field->price_name;
                    $tmp_price_quant = ($quantity>1) ? '(' . $not_quantity_calculated_currency[1] . ' x ' . $quantity . ')' : '';
                    $price_detail_html .= '<div class="val+">'.$price_name.' +' . $calculated_currency[0] . ' ' . $tmp_price_quant . '</div>';
                    $calculated_price = $calculated_price + ($single_field->price_value * $quantity);
                }else if($single_field->price_type == 'val-' && $single_field->price_value != '0.00'){
                    $calculated_currency = calculatedCurrency($instance, ($single_field->price_value * $quantity));
                    $price_name = $field->field_name . ': ' . $single_field->price_name;
                    $not_quantity_calculated_currency = calculatedCurrency($entityInstance, $field->value);
                    $tmp_price_quant = ($quantity>1) ? '(' . $not_quantity_calculated_currency[1] . ' x ' . $quantity . ')' : '';
                    $price_detail_html .= '<div class="val-">'.$price_name.' -' . $calculated_currency[0] . ' ' . $tmp_price_quant . '</div>';
                    $calculated_price = $calculated_price - ($single_field->price_value * $quantity);
                }else if($single_field->price_type == 'percent+' && $single_field->price_value != '0.00'){
                    $calculated_currency = calculatedCurrency($instance, ($single_field->price_value * $quantity));
                    $calculate_value = calculatedCurrency($instance, round($calculated_price/100 * $single_field->price_value, 2));
                    $price_name = $field->field_name . ': ' . $single_field->price_name;
                    $price_detail_html .= '<div class="percent+">' . $price_name . ' +' . $calculate_value[0] . ' ('. $single_field->price_value . ' %)</div>';
                    $calculated_price = $calculated_price + (round($calculated_price/100 * $single_field->price_value, 2));
                }else if($single_field->price_type == 'percent-' && $single_field->price_value != '0.00'){
                    $price_name = $field->field_name . ': ' . $single_field->price_name;
                    $calculated_currency = calculatedCurrency($instance, ($single_field->price_value * $quantity));
                    $calculate_value = calculatedCurrency($instance, round($calculated_price/100 * $single_field->price_value, 2));
                    $price_detail_html .= '<div class="percent-">' . $price_name . ' -' . $calculate_value[0] . ' ('. $single_field->price_value . ' %)</div>';
                    $calculated_price = $calculated_price - (round($calculated_price/100 * $single_field->price_value, 2));
                }
              
              
              //var_dump($single_field);
          }
          echo $price_detail_html . '</div>';
          echo '<div>Total cost of goods: ' . calculatedCurrency($instance, $calculated_price)[0] . '</div></div><br>';
      }
      echo '<span class="buy-total-price">';
      echo 'Total Price: '.$entityInstance->instance_price.' '.$entityInstance->instance_currency;
      echo '</span>';
    }?>
    <div id="<?php echo $div_id; ?>">
      <?php
      $layout_params = $str_list['layout_params'];
      $layout = $str_list['layout'];
      $bootstrap_version = $session->get( 'bootstrap','2');
      $layout->layout_html = $layout->getLayoutHtml($bootstrap_version);
      $layout_html = urldecode($layout->layout_html);
      $field_from_params = $layout_params["fields"];
      $fields_list = $str_list['extra_fields_list'];

      //add child selects to layout
      $addChildSelectToLayout = addChildSelectToLayout($fields_list, $entityInstance, $layout_params, $layout_html, $layout);
      $layout_html = $addChildSelectToLayout['layout_html'];
      $layout_params = $addChildSelectToLayout['layout_params'];
      $parent = $addChildSelectToLayout['select_parent'];
      $layout->params = serialize($layout_params);
      //add child selects to layout
      
      $child_entities = (isset($layout_params['child_entities'])) ? $layout_params['child_entities'] : '';
    
      for ($i = 0, $nnn = count($str_list['extra_fields_list']); $i < $nnn; $i++) {
        $html='';
        $field = $str_list['extra_fields_list'][$i];
        $field_styling = get_field_styles($field, $layout);
        $layout_params['field_styling'] = $field_styling;
        $custom_class = isset($layout_params['fields'][$field->db_field_name.'_custom_class'])?$layout_params['fields'][$field->db_field_name.'_custom_class']:'';
        //get tag
        $shell_tag = isset($layout_params['fields']['field_tag_'.$field->db_field_name])?$layout_params['fields']['field_tag_'.$field->db_field_name]:'div';
        //end

         if(strpos($layout_html,"{|f-cck_mail|}")){
          $layout_html = str_replace("{|f-cck_mail|}",'', $layout_html);
          //continue;
        }

        $layout_html = str_ireplace(array('Button Send','MAIL'),'', $layout_html);

        if(strpos($layout_html,"{|f-".$field->fid."|}")){
          //check access
          $value = $entityInstance->getFieldValue($field);
          if(stripos($field->field_type, 'pricefield') == 0 && is_array($parent_price_fields)){
              foreach($parent_price_fields as $price_field){
                  if($field->fid == $price_field->fk_fid){
                    $value = $price_field;
                    //var_dump($value); exit;
                  }
              }
          }
          if($field->field_type == 'rating_field' && isset($layout_params['fields'][$field->db_field_name.'_average'])
              && $layout_params['fields'][$field->db_field_name.'_average'] == 'on'){
            $value = get_average_rating($field, $layout, $entityInstance);
          }
          if(empty($value)){
            $layout_html = str_replace("{|f-".$field->fid."|}", '', $layout_html);
            continue;
          }
          if(isset($layout_params['fields']['access_'.$field->db_field_name])
              && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
            $user = JFactory::getUser();
            if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $field->fk_eid, 'fields')){
              $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
              continue;
            }else{
              $layout_html = str_replace($field->db_field_name.'-label-hidden', $html, $layout_html);
            }
          }
          if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
              $layout_params['fields']['showName_'.$field->db_field_name] == 'on' ){
            $layout_html = str_replace($field->db_field_name.'-label-hidden', $html, $layout_html);
          }
          //i don't sure but maybe it is empty field check
          if (is_array($value) && isset($value[0]->data) && $value[0]->data == '' && $field->field_type != 'locationfield'
              && $field->field_type != 'audiofield' && $field->field_type != 'videofield'
              && $field->field_type != 'text_single_checkbox_onoff') {
            $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
            continue;
          }
          if ($field->field_type == 'datetime_popup' && $value[0]->data == '0000-00-00 00:00:00') {
            $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
            continue;
          }
          //if ($field->field_type == 'locationfield' && !$value[0]->{$field->db_field_name . "_address"}) {
          if ($field->field_type == 'locationfield') {
            $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
            continue;
          }
          ////end
          if(isset($layout_params['fields'][$field->db_field_name]['options'])){
            $field->options = $layout_params['fields'][$field->db_field_name]['options'];
          }

          // $global_settings = unserialize($field->global_settings);
          // if(isset($global_settings['title_field']) && $global_settings['title_field']){
          //   if(isset($value[0]->data) && !empty($value[0]->data))$title = $value[0]->data;
          //   else $title = $entityInstance->eiid;
          //   $layout_params['title'] = $title;
          // }
          $image_css = ($field->field_type=='imagefield' && isset($field->options['width'])
                        && isset($field->options['height']))?
                        'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':
                        '';
          $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
          $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';

  $html .='<'.$shell_tag.$width_heigth.' class="col_box '.$custom_class.'">';
              $layout_params['instance_currency'] = $entityInstance->instance_currency;
              ob_start();
                require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                $html .= ob_get_contents();
              ob_end_clean();
  $html .='</'.$shell_tag.'>';
        }
        $layout_html = str_replace('data-label-styling', 'style',  $layout_html);
        $layout_html = str_replace("{|f-".$field->fid."|}", $html, $layout_html);
      }
      
      if(isset($child_entities) && is_array($child_entities) && !empty($child_entities)){
          foreach($child_entities as $temp_child_entity){
              if(strpos($layout_html,"{|".$temp_child_entity->data_field_name."|}")){
                  
                  $child_instance_id = getChildInstance($temp_child_entity, $entityInstance->eiid);
                  $child_instance = new os_cckEntityInstance($db);
                  $child_instance->load($child_instance_id);
                  
                  $field = new os_cckEntityField($db);
                  $field->load($temp_child_entity->childEntityFields);
                  $field_styling = get_field_styles($temp_child_entity->data_field_name, $layout);
                  $offset_animation = get_field_offset_animation($temp_child_entity->data_field_name, $layout);
                  $custom_class = get_field_custom_class($temp_child_entity->data_field_name, $layout);
                  //var_dump($offset_animation);
                  //var_dump($field_styling);
                  $value = $child_instance->getFieldValue($field);

                  $field->db_field_name = $temp_child_entity->data_field_name;
                  $html = '';
                  if($field->field_type == 'rating_field' && isset($layout_params['fields'][$field->db_field_name.'_average'])
                      && $layout_params['fields'][$field->db_field_name.'_average'] == 'on'){
                      $value = get_average_rating($field, $layout, $entityInstance);

                      if(isset($layout_params['fields']['display_'.$field->db_field_name]) && $layout_params['fields']['display_'.$field->db_field_name] == 'stars'){
                          $value[0]->data = round($value[0]->data) / 2;
                      }elseif(isset($layout_params['fields']['display_'.$field->db_field_name]) && $layout_params['fields']['display_'.$field->db_field_name] == 'nuber'){
                          $value[0]->data = round($value[0]->data, 1);
                      }else{
                          $value[0]->data = round($value[0]->data) / 2;
                      }


                  }

                  if(isset($layout_params['fields'][$field->db_field_name]['options']['strlen']) &&
                    $layout_params['fields'][$field->db_field_name]['options']['strlen'])
                  {
                    $field->len = $layout_params['fields'][$field->db_field_name]['options']['strlen'];
                  }
                  
                  if($value != '' && isset($field->len) && strlen($value[0]->data) > $field->len)
                  {
                      $value[0]->data = substr($value[0]->data,0,$field->len);
                  }

                  $field->published = true;
                  

                  if($field->field_type == 'datetime_popup' && $value[0]->data == '0000-00-00 00:00:00'){
                      $datetimevalue = false;
                  }else{
                      $datetimevalue = true;
                  }

                  if(empty($value) || $value == '' || !$field->published || !$datetimevalue){
                    $layout_html = str_replace("{|".$field->db_field_name."|}", '<span class="delete_empty_child_entity"></span>', $layout_html);
                    continue;
                  }

                  if(isset($layout_params['fields']['access_'.$field->db_field_name])
                      && $layout_params['fields']['access_'.$field->db_field_name] != '1'){
                    $user = JFactory::getUser();
                    if(!checkAccess_cck($layout_params['fields']['access_'.$field->db_field_name], $user->groups, $field->fk_eid, 'fields')){
                      $layout_html = str_replace("{|".$field->db_field_name."|}", $html, $layout_html);
                      continue;
                    }
                  }

                  if(isset($layout_params['fields'][$field->db_field_name]['options'])){
                    $field->options = $layout_params['fields'][$field->db_field_name]['options'];
                  }

                  if(isset($layout_params['fields'][$field->db_field_name.'_title_field']) 
                      && $layout_params['fields'][$field->db_field_name.'_title_field']){
                    if(isset($value[0]->data) && !empty($value[0]->data))$title = $value[0]->data;
                    else $title = $entityInstance->eiid;
                    $layout_params['title'] = $title;
                  }

                  $image_css = ($field->field_type=='imagefield' && isset($field->options['width'])
                                && isset($field->options['height']) && $value[0]->data != '')?
                                'width:'.$field->options['width'].'px; height:'.$field->options['height'].'px;':
                                '';
                  if($field->field_type=='imagefield'){
                      $width_heigth = (isset($field->options['width']) && $value[0]->data != '') ? ' width="' . $field->options['width'] . 'px" ' : '';
                      $width_heigth .= (isset($field->options['height']) && $value[0]->data != '') ? ' height="' . $field->options['height'] . 'px" ' : '';
                  } else{
                      $width_heigth = (isset($field->options['width'])) ? ' width="' . $field->options['width'] . 'px" ' : '';
                      $width_heigth .= (isset($field->options['height'])) ? ' height="' . $field->options['height'] . 'px" ' : '';
                  }
                  //$field_styling = substr_replace($field_styling, ' display:block;'.$image_css.'"', strlen($field_styling)-1, strlen($field_styling));
                  if($field->field_type == 'text_single_checkbox_onoff' && $value[0]->data == 0){

                  }else{
                    $field_styling = substr_replace($field_styling, ' display:block;"', strlen($field_styling)-1, strlen($field_styling));
                  }
                  $a_styling = $field_styling;

                  //for calendar schedule view
                  if(isset($category_params['calendar_layout_params']['fields']['calendar_view_calendar_table'])
                    && $category_params['calendar_layout_params']['fields']['calendar_view_calendar_table'] == 'schedule'){

                    $layout_params['views']['link_field'] = 
                              (isset($category_params['calendar_layout_params']['fields']['calendar_table_link_field'])) ? 
                              $category_params['calendar_layout_params']['fields']['calendar_table_link_field'] : 
                              array();
                  }
                  if($field->field_type == 'text_select_list') $shell_tag = 'span';
    
                  $html .='<'.$shell_tag.$width_heigth.' '.$field_styling.' class="col_box '.$custom_class. ' ' .$field->db_field_name . '"' . $offset_animation . '>';
//                        if(isset($layout_params['views']['link_field'])
//                            && (array_search ( $field->fid , $layout_params['views']['link_field']) > 0
//                            || array_search ( $field->fid , $layout_params['views']['link_field']) === 0)){
//                          if(isset($layout_params['fields'][$field->db_field_name . '_instance_layout'])
//                            && $layout_params['fields'][$field->db_field_name . '_instance_layout'] != '-1'){
//                          $modId = (isset($moduleId)) ? '&moduleId=' . $moduleId : '';
//                          
//
//                          $layout_for_link = new os_cckLayout($db);
//                          $layout_for_link->load($layout_params['fields'][$field->db_field_name . '_instance_layout']);
//                          //var_dump($layout_for_link->type);
//                          $cat_id = (isset($category->cid))?'&amp;catid='.$category->cid : '&amp;catid=0';
//                          $link = 'index.php?option=com_os_cck&amp;view='.$layout_for_link->type.'&amp;eiid[]='
//                          . $child_instance_id .'&amp;lid='.$layout_params['fields'][$field->db_field_name . '_instance_layout']
//                          . $cat_id . '&amp;Itemid=' . $Itemid . $modId;
//
//                          ob_start();
//                            $html .= "<a href='".JRoute::_($link)."'>";
//                            require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
//                            $html .= ob_get_contents();
//                            $html.="</a>";
//                          ob_end_clean();
//                        }else{
                          $layout_params['instance_currency'] = $entityInstance->instance_currency;
                          ob_start();
                            require getSiteShowFiledViewPath('com_os_cck', $field->field_type);
                            $html .= ob_get_contents();
                          ob_end_clean();
                        //}


                  $html .='</'.$shell_tag.'>';
                  //var_dump($value);
                  $layout_html = str_replace("{|".$temp_child_entity->data_field_name."|}", $html, $layout_html);
              }
              
          }
      }

      //start render custom code
      $layout_params['custom_fields'] = unserialize($layout->custom_fields);
      if(count($layout_params['custom_fields'])){

        foreach ($layout_params['custom_fields'] as $cust_key => $custom_field) {
          if(strpos($layout_html,"{|f-custom_code_field_".$cust_key."|}")){
            //check access
            if(isset($custom_field['custom_code_field_'.$cust_key.'_access'])
                && $custom_field['custom_code_field_'.$cust_key.'_access'] != '1'){
              $user = JFactory::getUser();
              if(!checkAccess_cck($custom_field['custom_code_field_'.$cust_key.'_access'], $user->groups, $layout->fk_eid, 'fields')){
                $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", '', $layout_html);
                continue;
              }
            }
            // $dispatcher = JDispatcher::getInstance();
            // JPluginHelper::importPlugin('content');
             $plug_row = new stdClass();
             $plug_row->text = $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
            // $dispatcher->trigger('onContentPrepare', array('com_os_cck', &$plug_row, &$plug_params, 0));
            //$custom_field['custom_code_field_'.$cust_key.'_custom_code'] = $plug_row->text;
            //if below fn works , that this is add_instance view
            $code_type = $custom_field['custom_code_field_'.$cust_key.'_custom_code_type'];
            if($code_type == 'SCRIPT'){
              $custom_code = '<script type="text/javascript">';
              $custom_code .= $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
              $custom_code .= '</script>';
              $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_code, $layout_html);
            }elseif($code_type == 'PHP'){
              $func_result = replaceMaskCustomCodePHP($entityInstance,$plug_row->text, $layout_params, $layout_html, $layout);
              $custom_field['custom_code_field_'.$cust_key.'_custom_code'] = $func_result['custom_code_str'];
              extract($func_result['variables_arr']);
              ob_start();
              $custom_code = eval($custom_field['custom_code_field_'.$cust_key.'_custom_code']);
              $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", ob_get_contents(), $layout_html);
              ob_end_clean();
            }elseif($code_type == 'CSS'){
              $custom_css = '<style>'.$custom_field['custom_code_field_'.$cust_key.'_custom_code'].'</style>';
              $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_css, $layout_html);
            }else{
              $custom_code = $custom_field['custom_code_field_'.$cust_key.'_custom_code'];
              $layout_html = str_replace("{|f-custom_code_field_".$cust_key."|}", $custom_code, $layout_html);
            }
          }
        }
      }

      $layout_html = str_replace("{|l-".$layout->lid."|}", '', $layout_html);
      $layout_html = str_replace("{|f-cck_send_button|}", '', $layout_html);
      echo $layout_html;
      ?>
    </div>

    <?php
    ?><hr><?php
    if(!empty($str_list['parent_instance'])){
        if(is_array($str_list['parent_instance'])){
            foreach($str_list['parent_instance'] as $key => $parente_instance){
                AdminBuy_request::editBuyRequestInstance($option, $parente_instance[0]->fk_eiid, $price_fields[$key]);
            }
        }else{
            AdminBuy_request::editBuyRequestInstance($option, $str_list['parent_instance']);
        }
    }
    ?><script type="text/javascript">
  jQuerOs("*[class*='hide-field-name-'] , .delete-field, .delete-row, .delete-layout").remove();
  
  jQuerOs("div[class *='cck-row-'], div[id *='cck_col-']").each(function(index, el) {
    jQuerOs(el).attr("style",jQuerOs(el).data("block-styling"));
  });

// jQuerOs("span.cck-help-string").remove()

jQuerOs(function () {
  jQuerOs('[data-toggle="tooltip"]').tooltip()
})

</script><?php
  }

}
