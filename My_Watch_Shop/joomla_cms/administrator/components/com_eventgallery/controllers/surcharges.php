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

require_once('methods.php');
class EventgalleryControllerSurcharges extends EventgalleryControllerMethods
{
    protected $model_name = 'Surcharge';
    protected $default_view = 'surcharges';
}