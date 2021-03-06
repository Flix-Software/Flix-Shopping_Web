<?php

/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 */


namespace Civi\Api4\Action\CustomValue;

/**
 * Given a set of records, will appropriately update the database.
 */
class Replace extends \Civi\Api4\Generic\BasicReplaceAction {
  use \Civi\Api4\Generic\Traits\CustomValueActionTrait;

}
