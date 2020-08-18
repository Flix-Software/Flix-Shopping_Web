<?php
/**
* @package   BaForms
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;
 
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
class JFormFieldForms extends JFormFieldList
{
    protected $type = 'Forms';

 
    protected function getOptions() 
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('id, title')
                ->from('#__forms');
        $db->setQuery($query);
        $messages = $db->loadObjectList();
        $options = array();
        if ($messages)
        {
            foreach($messages as $message) 
            {
                $options[] = JHtml::_('select.option', $message->id, $message->title);
            }
        }

        $options = array_merge(parent::getOptions(), $options);
 
        return $options;
    }
}