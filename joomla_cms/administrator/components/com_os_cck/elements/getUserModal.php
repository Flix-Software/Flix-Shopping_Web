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

class os_cckFieldUser extends JFormFieldUser
{
    public function getHtmlInput($value){
        
        $this->name = 'fk_userid';
        $this->value = $value;
        $html = $this->getInput();
        return $html;
    }
}

