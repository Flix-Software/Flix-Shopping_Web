<?php

/**
 * @package     Sven.Bluege
 * @subpackage  com_eventgallery
 *
 * @copyright   Copyright (C) 2005 - 2019 Sven Bluege All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php  echo  $this->loadSnippet('cart'); ?>

<div>
	<?php echo JText::_('COM_EVENTGALLERY_EVENT_NOACCESS')?>
</div>

<?php echo $this->loadSnippet('footer_disclaimer'); ?>