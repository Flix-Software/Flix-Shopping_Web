<?php 

/**
 * @package     Sven.Bluege
 * @subpackage  com_eventgallery
 *
 * @copyright   Copyright (C) 2005 - 2019 Sven Bluege All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');


?>

<form action="<?php echo JRoute::_('index.php?option=com_eventgallery&view=gdpr'); ?>"
      method="post" name="adminForm" id="adminForm">
    <div class="row">
        <?php if (version_compare(JVERSION, '4.0', '<' ) == 1): ?>
	        <div id="j-sidebar-container" class="col-md-2">
	            <?php echo $this->sidebar; ?>
	        </div>
	        <div id="j-main-container" class="col-md-12">
    	<?php ELSE: ?>
        	<div class="col-md-12">
    	<?php ENDIF;?>

            <p>
                <?php echo JText::_('COM_EVENTGALLERY_GDPR_DESC'); ?>
            </p>

            <p>
                <input type="text" name="email" placeholder="<?php echo JText::_('COM_EVENTGALLERY_GDPR_EMAIL_PLACEHOLDER'); ?>"><br>
                <input type="submit" class="btn">
            </p>
        </div>
    </div>
    <?php echo JHtml::_('form.token'); ?>
    <input type="hidden" name="task" value="gdpr.export" />
</form>