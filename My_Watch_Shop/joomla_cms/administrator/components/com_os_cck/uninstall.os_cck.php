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



function com_uninstall()
{

    $db = JFactory::getDBO();
    $os_cck_configuration = $GLOBALS['os_cck_configuration'] = JComponentHelper::getParams('com_os_cck');
    $conf = JFactory::getConfig();
    if($os_cck_configuration->get('save_database','0'))return;
    $query = "SHOW TABLES";
    $db->setQuery($query);
    $tables = (version_compare(JVERSION, "3.0.0", "lt")) ? $db->loadResultArray() : $db->loadColumn();
    $os_tables = array();

    foreach ($tables as $table) {
        if (preg_match("/^" . $conf->get('dbprefix') . "os_cck.*$/", $table)) {
            $os_tables[] = $table;
        }
    }

    if (count($os_tables) > 0) {
        $query = "DROP TABLE " . implode(", ", $os_tables);
        $db->setQuery($query);
        $db->query();
    }

    echo "Uninstalled! ";
}

?>

