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

class AdminViewCoupons{
    public static function showCoupons($option, & $rows_item, & $publist, & $search, & $pageNav, & $sort_arr, $entity_list, & $userslist, $entities_array){
        global $doc, $user, $app, $session, $db, $os_cck_configuration;
        
        $html = "<div class='os_cck_caption' ><img src='./components/com_os_cck/images/os_cck_logo.png' alt ='Config' />" . JText::_('COM_OS_CCK_SHOW') . "</div>";
        $app = JFactory::getApplication();
        $app->JComponentTitle = $html;
        $onclick = "Joomla.checkAll(this);";
        ?>

          <form action="index.php" method="post" name="adminForm" id="adminForm">
            <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist  instances_list coupons_list filters">
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
                  <?php echo $userslist; ?>
                </td>
                <td>
                  <?php echo $entity_list; ?>
                </td>
                <td>
                  <div class="btn-group pull-right hidden-phone">
                    <label for="limit"
                           class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC'); ?></label>
                    <?php echo $pageNav->getLimitBox(); ?>
                  </div>
                </td>
              </tr>
            </table>
            <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
              <tr>
                <th width="3%" align="center">
                    <input type="checkbox" name="toggle" value="" onClick="<?php echo $onclick; ?>"/>
                </th>
                <th align="center" class="title" width="5%" nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_LABEL_INSTANCE_ID'), 'coup_id', $sort_arr, 'coupons');?></th>
                
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_LABEL_COUPON'), 'coupon_name', $sort_arr, 'coupons');?></th>
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_VALUE');?></th>
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_LABEL_COUPON_DATE_START'), 'coupon_date_start', $sort_arr, 'coupons');?></th>
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo HTML_os_cck::sort_head(JText::_('COM_OS_CCK_LABEL_COUPON_DATE_FINISH'), 'coupon_date_finish', $sort_arr, 'coupons');?></th>
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_USED_NUMBER');?></th>
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_MAX_USES');?></th>
                <th align="left" class="title" width="7%"
                    nowrap="nowrap"><?php echo JText::_('COM_OS_CCK_LABEL_ENTITY');?></th>
                
                <th align="left" class="title" width="5%"
                    nowrap="nowrap"><?php echo JText::_('COM_OS_CCK_LABEL_PUBLIC'); ?></th>
                
              </tr>
              <?php
                $session->set('sorting_direction', $sort_arr['sorting_direction']);
                for ($i = 0, $n = count($rows_item); $i < $n; $i++) {
                  $row = & $rows_item[$i];
                  ?>
                  <tr class="row<?php echo $i % 2; ?>">
                    <td width="3%" align="center">
                      <?php
                        echo JHTML::_('grid.id',$i, $row->coup_id, false, 'coup_id');
                      ?>
                      
                    </td>
                    <td align="center"><a href="?option=com_os_cck&task=edit_coupon&coup_id[]=<?php echo $row->coup_id?>">
                            <?php echo $row->coup_id; ?></a></td>
                    <td align="left"><a href="?option=com_os_cck&task=edit_coupon&coup_id[]=<?php echo $row->coup_id?>">
                            <?php echo $row->name; ?></a></td>
                    <td align="left"><?php 
                    
                    if($row->type == 'percent'){
                        echo $row->value . '%';
                    }else{
                        $currency = cck_getCurrency($os_cck_configuration);
                        echo calculatedCurrency('',$row->value, $currency[0]['sign'])[0];
                    } ?></td>
                    
                    <td align="left"><?php echo $row->date_start; ?></td>
                    <td align="left"><?php echo $row->date_finish; ?></td>
                    
                    <td align="left"><?php echo $row->used_number; ?></td>
                    <td align="left"><?php echo $row->max_uses; ?></td>
                    
                    <td align="left"><?php 
                    $enteties = explode(',', $row->entities);
                    $enteties = array_diff($enteties, array(''));
                    //var_dump($enteties);
                    if(!empty($enteties)){
                        $z=0;
                        foreach($enteties as $entity){
                            if(count($enteties)-1 == $z){
                                if($entity != '-1'){
                                    echo $entities_array[$entity]->text;
                                }else{
                                    echo JText::_('COM_OS_CCK_LABEL_ALL_ENTETIES');
                                }
                            }else{
                                if($entity != '-1'){
                                    echo $entities_array[$entity]->text . ', ';
                                }else{
                                    echo JText::_('COM_OS_CCK_LABEL_ALL_ENTETIES') . ', ';
                                }
                            }
                            $z++;
                        }
                    }else{
                        echo JText::_('COM_OS_CCK_LABEL_ALL_ENTETIES');
                    }
                    //echo $row->entity; ?></td>
                    
                    <?php
                    $task = $row->published ? 'unpublish_coupon' : 'publish_coupon';
                    $alt = $row->published ? 'Unpublish' : 'Publish';
                    $img = $row->published ? 'tick.png' : 'publish_x.png';
//                    $task1 = $row->approved ? 'unapprove_instances' : 'approve_instances';
//                    $alt1 = $row->approved ? 'Unapproved' : 'Approved';
//                    $img1 = $row->approved ? 'tick.png' : 'publish_x.png';
                    $img = "components/com_os_cck/images/{$img}";
                    //$img1 = "components/com_os_cck/images/{$img1}";
                    ?>
                    <td width="5%" align="center">
                    <?php if (JFactory::getUser()->authorise('publish_coupons', 'com_os_cck')): ?>
                        <a href="javascript: void(0);"
                           onClick="return listItemTask('cb<?php echo $i; ?>','<?php echo $task; ?>','adminForm')">
                    <?php endif; ?>
                            <img src="<?php echo $img; ?>" width="12" height="12" border="0"
                                 alt="<?php echo $alt; ?>"/>
                    <?php if (JFactory::getUser()->authorise('publish_coupon', 'com_os_cck')): ?>
                        </a>
                    <?php endif; ?>
                    </td>


                </tr>
              <?php
              }//end for
              ?>
              <tr>
                <td colspan="13"><?php echo $pageNav->getListFooter(); ?></td>
              </tr>
            </table>
            <input type="hidden" name="option" value="<?php echo $option; ?>"/>
            <input type="hidden" name="task" value="coupons"/>
            <input type="hidden" name="boxchecked" value="0"/>
          </form>

      <?php
    }
    
    static function editCoupon($coupon){
        global $app;
        $html = "<div class='os_cck_caption' ><img src='./components/com_os_cck/images/os_cck_logo.png' alt ='Config' />" . JText::_('COM_OS_CCK_SHOW') . "</div>";
        $app = JFactory::getApplication();
        $app->JComponentTitle = $html;
        
        ?>
        <script language="javascript" type="text/javascript">
            Joomla.submitbutton = function (pressbutton) {
                var form = document.adminForm;
                if (pressbutton == "coupons") {
                    submitform(pressbutton);
                    return true;
                }
                submitform(pressbutton);
                
            }
        </script>
        <form action="index.php" method="post" name="adminForm" id="adminForm">
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON'); ?></label>
                <input type="text" name="name" class="coupon_name" value="<?php echo $coupon->name; ?>">
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_TYPE'); ?></label>
                <?php echo $coupon->_coupon_type_input; ?>
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_VALUE'); ?></label>
                <input type="number" name="value" class="coupone_value" value="<?php echo $coupon->value; ?>">
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_DATE_START'); ?></label>
                <?php echo JHtml::calendar($coupon->date_start, 'date_start', 'date_start'); ?>
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_DATE_FINISH'); ?></label>
                <?php echo JHtml::calendar($coupon->date_finish, 'date_finish', 'date_finish'); ?>
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_MAX_USES'); ?></label>
                <input type="number" name="max_uses" class="coupone_max_uses" value="<?php echo $coupon->max_uses; ?>">
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_ENTITIES'); ?></label>
                <?php echo $coupon->_entities_input; ?>
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_USER_GROUPS'); ?></label>
                <?php echo $coupon->_coupon_user_groups_input; ?>
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_COUPON_CATEGORIES'); ?></label>
                <?php echo $coupon->_coupon_categories; ?>
            </div>
            
            <div>
                <label><?php echo JText::_('COM_OS_CCK_LABEL_PUBLIC'); ?></label>
                <?php echo $coupon->_coupon_publish_input;?>
            </div>
            
            <input type="hidden" name="option" value="com_os_cck"/>
            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="coup_id" value="<?php echo $coupon->coup_id; ?>"/>

        </form>

        <?php
        
    }
}
