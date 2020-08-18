<?php
defined('_JEXEC') or die('Restricted access');

/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/

JHTML::_('behavior.modal', 'a.modal-button');
$doc = JFactory::getDocument();
$doc->addScript(JURI::root().'/components/com_os_cck/assets/js/functions.js');
$doc->addStyleSheet(JURI::root().'/components/com_os_cck/assets/css/admin_style.css');
 
class JFormField2CheckoutStatus extends JFormField{
  protected function getInput(){
    $db = JFactory::getDBO();
    $query = "SELECT name,enabled FROM #__extensions WHERE element='2checkout'";
    $db->setQuery($query);
    $status = $db->loadObjectList();
    if(!isset($status[0])){
      $status = '<b style="color:red;">Plugin not install !</b>';
    }else if($status[0]->enabled == 0){
      $status = '<b style="color:red;">Plugin not enable !</b>';
    }else{
      $status = '<b style="color:green;">Enabled [ '.$status[0]->name.' ]</b>';
    }
    return $status;
  }
}