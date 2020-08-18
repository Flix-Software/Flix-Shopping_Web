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
 
?>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function(){ 
    if(!document.getElementById('instance').value){
      document.getElementById('instance').parentNode.parentNode.style.display = 'none';
    }
  }, false);
</script>
<?php
JHTML::_('behavior.modal', 'a.modal-button');
$doc = JFactory::getDocument();
$doc->addScript(JURI::root().'/components/com_os_cck/assets/js/functions.js');
$doc->addStyleSheet(JURI::root().'/components/com_os_cck/assets/css/admin_style.css');

class JFormFieldParentchildLayout extends JFormField{   

  protected function getInput(){
    $db = JFactory::getDBO();
    $menuId = 0;
    if(JRequest::getVar('id') != '') {
      $db->setQuery("SELECT `params` FROM `#__menu` WHERE `id` = ".JRequest::getVar('id'));
      $params = json_decode($db->loadResult());
    }
    
    $link = JRoute::_('index.php?option=com_os_cck&task=manage_layout_modal&layout_type=parent_child&tmpl=component');
    $rel="{handler: 'iframe', size: {x: 900, y: 550}}";
    $lid = (isset($params->parent_child_layout) && !empty($params->parent_child_layout))? $params->parent_child_layout : '';
    $html = '<input id="selected_layout" type="text" name="'.$this->name.'" value="'.$lid.'" readonly>';
    $html .= '<div class="fixedform">'.
                '<a class="btn modal-button" href="'.$link.'" rel="'.$rel.'">'.
                  'Select layout'.
                '</a>'.
              '</div>';
    return $html;
  }
}

class JFormFieldInstance extends JFormField{

  protected function getInput(){
    $db = JFactory::getDBO();
    $menuId = 0;
    if(JRequest::getVar('id') != '') {
        $db->setQuery("SELECT `params` FROM `#__menu` WHERE `id` = ".JRequest::getVar('id'));
        $params = json_decode($db->loadResult());
    }
    $selected_entity = $eiid = '';
    if(isset($params->parent_child_layout) && !empty($params->parent_child_layout)){
      $selected_entity = $db->loadResult($db->setQuery("SELECT tt.eid FROM `#__os_cck_layout` AS cl "
                                                            . "\n LEFT JOIN #__os_cck_entity AS tt ON cl.fk_eid = tt.eid "
                                                            . "\n WHERE cl.lid=".$params->parent_child_layout));
      $eiid = $params->instance;
    }
    $ceid = ($selected_entity)? '&fk_eid='.$selected_entity : '';
    $link = JRoute::_('index.php?option=com_os_cck&task=show_instance_modal'.$ceid.'&tmpl=component');
    $rel="{handler: 'iframe', size: {x: 900, y: 550}}";
    $html = '<input id="instance" type="text" name="'.$this->name.'" value="'.$eiid.'" readonly>';
    $html .= '<div class="fixedform">'.
                '<a id="changeLink" class="btn modal-button" href="'.$link.'" rel="'.$rel.'">'.
                  'Select instance'.
                '</a>'.
              '</div>';
    return $html;
  }
}
