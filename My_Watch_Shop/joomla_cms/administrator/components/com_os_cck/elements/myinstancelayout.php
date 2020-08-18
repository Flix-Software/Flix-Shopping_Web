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

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root().'/components/com_os_cck/assets/css/admin_style.css');

class JFormFieldMyinstancelayout extends JFormField{

  protected function getInput(){
    $db = JFactory::getDBO();
    if(JRequest::getVar('id') != '') {
      $menu = new JTableMenu($db);
      $menu->load(JRequest::getVar('id'));
      $params = new JRegistry;
      $params->loadString($menu->params);
    }
    
    $query = "SELECT ce.eid AS id, ce.name AS title FROM #__os_cck_entity AS ce WHERE published='1' ";
    $db->setQuery($query);
    $entities = $db->loadObjectList();
    $list = array();
    foreach ($entities as $entity) {
      $list[]  = JHTML::_('select.option',$entity->id,$entity->title);
    }
    return JHTML::_('select.genericlist', $list,'jform[params][entity_list][]','class="inputbox" multiple="true"','value','text', $params->get('entity_list',''));
  }
}
