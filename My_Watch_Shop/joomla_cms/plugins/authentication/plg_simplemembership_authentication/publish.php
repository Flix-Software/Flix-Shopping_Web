<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 *
 * @package simpleMembership
 * @copyright Andrey Kvasnevskiy-OrdaSoft(akbet@mail.ru); Anton Getman(ljanton@mail.ru);
 * Homepage: http://www.ordasoft.com
 * @version: 5.0.0 FREE
 * @license GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007; see LICENSE.txt
 *
 */

/**
 * Script file for the plg_system_example plugin    
 */
class PlgAuthenticationplg_simplemembership_authenticationInstallerScript{

  /**
   * Method to run after the plugin install, update, or discover_update actions have completed.
   *
   * @return void
   */
  function postflight($type,$parent){
    // Get a database connector object
        $db = JFactory::getDbo();
    
        try
        {
            // Enable plugin by default
            $q = $db->getQuery(true);
     
            $q->update('#__extensions');
            $q->set(array('enabled = 1', 'ordering = 9999'));
            $q->where("element = 'plg_simplemembership_authentication'");
            $q->where("type = 'plugin'", 'AND');
            $q->where("folder = 'authentication'", 'AND');
     
            $db->setQuery($q);
     
            method_exists($db, 'execute') ? $db->execute() : $db->query();
        }
        catch (Exception $e)
        {
           throw $e;
        }
  }
} 
