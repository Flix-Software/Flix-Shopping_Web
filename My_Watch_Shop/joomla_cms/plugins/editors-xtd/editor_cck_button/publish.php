<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/
/**
 * Script file for the plg_system_example plugin    
 */
class plgEditorsXtdEditor_cck_buttonInstallerScript{
  /**
   * Method to run after the plugin install, update, or discover_update actions have completed.
   *
   * @return void
   */
  public function postflight($route, $adapter) {
    // Get a database connector object
        $db = JFactory::getDbo();
    
        try
        {
            // Enable plugin by default
            $q = $db->getQuery(true);
     
            $q->update('#__extensions');
            $q->set(array('enabled = 1', 'ordering = 9999'));
            $q->where("element = 'editor_cck_button'");
            $q->where("type = 'plugin'", 'AND');
            $q->where("folder = 'editors-xtd'", 'AND');
            $db->setQuery($q);
            method_exists($db, 'execute') ? $db->execute() : $db->query();
        }
        catch (Exception $e)
        {
           throw $e;
        }
  }
} 


