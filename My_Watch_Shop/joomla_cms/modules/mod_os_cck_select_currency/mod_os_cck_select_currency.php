    <?php
    defined( '_JEXEC' ) or die( 'Restricted access' );
    /**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/
    if(!defined('DS')){
        define('DS', DIRECTORY_SEPARATOR  );
    }
    
    require_once ( JPATH_BASE .DS.'components'.DS.'com_os_cck'.DS.'os_cck.php' );
    require_once ( JPATH_BASE .DS.'components'.DS.'com_os_cck'.DS.'functions.php' );
    
    $os_cck_configuration = JComponentHelper::getParams('com_os_cck');
    $paypal_currency = cck_getCurrency($os_cck_configuration);
    $currencyOpt = array();
    foreach ($paypal_currency as $carrencyArr) {
      $currencyOpt[] = JHTML::_('select.option', $carrencyArr['sign'], $carrencyArr['signAlias'], "value", "text");
    }
    //$currency = (isset($entityInstance->instance_currency) && !empty($entityInstance->instance_currency))?$entityInstance->instance_currency : '';
    $session = JFactory::getSession();
    
    $currency = $session->get('currency', '');
    $currencySelect = JHTML::_('select.genericlist', $currencyOpt, "instance_currency", 'class="cck-currency" style="width: auto !important;" onchange="javascript:change_currency();"', 'value', 'text', $currency);
    
    echo '<div class="module_select_currency">';
    echo $currencySelect;
    echo '</div>';
 
    
    /** ensure this file is being included by a parent file */

    ?>


<script type="text/javascript">
    function change_currency(){
        var currency = jQuerOs('#instance_currency').val();
        
        jQuerOs.ajax({
            dataType: "json",
            type: 'POST',
            url: 'index.php?option=com_os_cck&format=raw',
            data: {
                task: "changeCurrency",
                currency: currency,
            },
            success: function(data){ 
                location.reload();
            }

        });
    }
</script>
