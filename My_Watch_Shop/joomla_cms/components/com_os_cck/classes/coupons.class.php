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

class os_cckCoupons extends JTable
{
    var $coup_id = null;
    var $name = null;
    var $type = null;
    var $creation_date = null;
    var $date_start = null;
    var $date_finish = null;
    var $value = null;
    var $used_number = null;
    var $max_uses = null;
    var $entities = null;
    var $user_group_ids = null;
    var $category_ids = null;
    var $publish = null;
    
    /**
     * @param database - A database connector object
     */
    function __construct(&$db){
      parent::__construct('#__os_cck_coupons', 'coup_id', $db);
    }
}