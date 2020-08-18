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


$fName = $field->db_field_name;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$fParams['type'] = isset($layout_params['fields']['search_'.$fName])?$layout_params['fields']['search_'.$fName]:'';

if($fParams['type'] == '2'){?>
    <tr>
        <td class="search_description">
            <input type="checkbox" value="on" name='os_cck_search_<?php echo $fName?>' checked="checked" >
        </td>
    <tr>
    <?php
    return;
}
if($fParams['type'] == '3'){ ?>
    <tr>
        <td class="search_description">
            <input type="hidden" name='os_cck_search_<?php echo $fName?>' value="on" >
        </td>
    <tr>
    <?php
    return;
}

//var_dump($layout); exit;
$prices = getPricesForSearch($layout->fk_eid);


//$query = "SELECT ent.".$fName." FROM #__os_cck_content_entity_".$field->fk_eid." as ent"
//          ."\n LEFT JOIN #__os_cck_entity_instance inst ON inst.eiid = ent.fk_eiid"
//          ."\n LEFT JOIN #__os_cck_layout as lay ON lay.lid = inst.fk_lid WHERE lay.type ='add_instance'";
//$db->setQuery($query);
//$prices = $db->loadColumn();

$os_cck_configuration = JComponentHelper::getParams('com_os_cck');
$paypal_currency = cck_getCurrency($os_cck_configuration);
$entityInstance->instance_currency = $paypal_currency[0]['sign'];
rsort($prices,SORT_NUMERIC);
$max_number = ceil($prices[0]);
$currency_max_number = calculatedCurrency($entityInstance, $max_number);
$currency_max_number = ceil($currency_max_number[1]);

//var_dump($paypal_currency);

if(JRequest::getVar('os_cck_search_'.$field->db_field_name . '_to', '') != ''){
    $max_value = JRequest::getVar('os_cck_search_'.$field->db_field_name . '_to');
}else{
    $max_value = $currency_max_number;
}



if(!$max_number){?>
    <tr>
        <td class="search_description">
            <input type="hidden" name='os_cck_search_<?php echo $fName?>' value="on" >
        </td>
    <tr>
    <?php
    return;
}

$min_number = $prices[count($prices)-1];
if(!$min_number)$min_number = '0';
$min_number = floor($min_number);
$currency_min_number = calculatedCurrency($entityInstance, $min_number);
$currency_min_number = floor($currency_min_number[1]);
if(JRequest::getVar('os_cck_search_'.$field->db_field_name . '_from', '') != ''){
    $min_value = JRequest::getVar('os_cck_search_'.$field->db_field_name . '_from');
}else{
    $min_value = $currency_min_number;
}

$i = $layout->lid;

?>
<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
<tr>
    <td>
        <div <?php echo $field_styling?> class="<?php echo $custom_class.$i?> <?php echo $offset_animation; ?> col_box_1">
            <div class="pricefrom_2">
                <?php echo JText::_("COM_OS_CCK_SEARCH_NAMBER_FROM")?>
                <input type="text" id="os_cck_search_<?php echo $fName.$i?>_from" name="os_cck_search_<?php echo $fName?>_from" value="<?php echo $min_value?>" />
                <br>
                <?php echo JText::_("COM_OS_CCK_SEARCH_NAMBER_To")?>
                <input type="text" id="os_cck_search_<?php echo $fName.$i?>_to" name="os_cck_search_<?php echo $fName?>_to" style="margin-left: 16px;" value="<?php echo $max_value?>"/>
            </div>
            <div id="slider_os_cck_search_<?php echo $fName.$i?>" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"></div>
        </div>
    </td>
</tr>
</span>
<script type="text/javascript">


    jQuerOs(function() {

        jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider({
            min: <?php echo (int) $currency_min_number;?>,
            max: <?php echo (int) $currency_max_number;?>,
            values: [<?php echo (int) $min_value;?>,<?php echo (int) $max_value;?>],
            range: true,
            stop: function(event, ui) {
                jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").val(jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider("values",0));
                jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").val(jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider("values",1));
            },
            slide: function(event, ui){
                jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").val(jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider("values",0));
                jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").val(jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider("values",1));
            }
        });

        jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").change(function(){

            var value1=jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").val();
            var value2=jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").val();

            if(parseInt(value1) > parseInt(value2))
                {
                    value1 = value2;
                    jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").val(value1);
                }

            if(parseInt(value1)<(<?php echo (int) $currency_min_number;?>))
                {
                    jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").val(<?php echo (int) $currency_min_number;?>);
                }

            jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider("values",0,value1);
        });

        jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").change(function(){
            var value1=jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_from").val();
            var value2=jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").val();

            if (value2 > '<?php echo $currency_max_number?>') {
                value2 = '<?php echo $currency_max_number?>';
                jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").val('<?php echo $currency_max_number?>')
            }

            if(parseInt(value1) > parseInt(value2)){
                value2 = value1;
                jQuerOs("input#os_cck_search_<?php echo $fName.$i?>_to").val(value2);
            }

          jQuerOs("#slider_os_cck_search_<?php echo $fName.$i?>").slider("values",1,value2);
      });
    });
</script>