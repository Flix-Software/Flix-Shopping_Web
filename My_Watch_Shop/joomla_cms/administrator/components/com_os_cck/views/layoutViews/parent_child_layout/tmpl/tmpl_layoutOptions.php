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
$gtree = get_group_children_tree_cck();
$show_type_selected = (isset($layout_params['views']['show_type_request_layout'][$key][0]))?
                    $layout_params['views']['show_type_request_layout'][$key][0] : '1';
$button_name = (isset($layout_params['views']['show_request_layout_button_name'][$key]))?
                    $layout_params['views']['show_request_layout_button_name'][$key][0] : '';
$access_selected = (isset($layout_params['views']['show_request_layout'][$key]))?
                    $layout_params['views']['show_request_layout'][$key][0] : '1';
$fld_name_show = '';
if(isset($layout_params['views']['show_request_layout_name'][$key][0])){
    $fld_name_show = ' checked="true" ';
}
$fld_alias = (isset($layout_params['views']['show_request_layout_alias'][$key])) ? $layout_params['views']['show_request_layout_alias'][$key][0] : '';
$type_show = array();
$type_show[]  = JHTML::_('select.option','1','Form');
$type_show[]  = JHTML::_('select.option','2','Button with dropdown form');
$type_show[]  = JHTML::_('select.option','3','Button with redirect');



$db = JFactory::getDbo();
$currentLayout = new os_cckLayout($db);
$currentLayout->load($key);

$field_php_show = (isset($layout_params['views']['request_layout_php_show'][$key][0])) ? $layout_params['views']['request_layout_php_show'][$key][0] : '';
$field_sql_show = (isset($layout_params['views']['request_layout_sql_show'][$key][0])) ? $layout_params['views']['request_layout_sql_show'][$key][0] : '';

$test = array();
$test[]  = JHTML::_('select.option','1','On');
$test[]  = JHTML::_('select.option','0','Off');
$instance_grid = (isset($layout_params['views']['instance_grid'])) ? $layout_params['views']['instance_grid'] : '0';
$layout_instance_grid = JHTML::_('select.genericlist',$test, 'vi_instance_grid',
                                            'size="1" class="inputbox" ', 'value', 'text', $instance_grid);

$test = array();
$test[]  = JHTML::_('select.option','auto','auto');
$test[]  = JHTML::_('select.option','custom','custom');

$auto_custom = (isset($layout_params['views']['auto_custom'])) ? $layout_params['views']['auto_custom'] : '0';
$layout_auto_custom = JHTML::_('select.genericlist',$test, 'vi_auto_custom',
                                            'size="1" class="inputbox" ', 'value', 'text', $auto_custom);

$space_between = (isset($layout_params['views']['space_between'])) ? $layout_params['views']['space_between'] : '0';
$layout_space_between = "<input type='number' min='0' name='vi_space_between' value='".$space_between."'>";

$lay_min_width = (isset($layout_params['views']['lay_min_width'])) ? $layout_params['views']['lay_min_width'] : '200';
$layout_lay_min_width = "<input type='number' min='0' name='vi_lay_min_width' value='".$lay_min_width."'>";

$test = array();
$test[]  = JHTML::_('select.option','1','1');
$test[]  = JHTML::_('select.option','2','2');
$test[]  = JHTML::_('select.option','3','3');
$test[]  = JHTML::_('select.option','4','4');
$test[]  = JHTML::_('select.option','5','5');
$test[]  = JHTML::_('select.option','6','6');
$test[]  = JHTML::_('select.option','7','7');
$test[]  = JHTML::_('select.option','8','8');
$count_inst_columns = (isset($layout_params['views']['count_inst_columns'])) ? $layout_params['views']['count_inst_columns'] : '4';
$layout_count_inst_columns = JHTML::_('select.genericlist',$test, 'vi_count_inst_columns',
                                            'size="1" class="inputbox" ', 'value', 'text', $count_inst_columns);
//resolutions

$resolition_one = (isset($layout_params['views']['resolition_one'])) ? $layout_params['views']['resolition_one'] : '5';
$layout_resolition_one = JHTML::_('select.genericlist',$test, 'vi_resolition_one',
                                            'size="1" class="inputbox" ', 'value', 'text', $resolition_one);

$resolition_two = (isset($layout_params['views']['resolition_two'])) ? $layout_params['views']['resolition_two'] : '4';
$layout_resolition_two = JHTML::_('select.genericlist',$test, 'vi_resolition_two',
                                            'size="1" class="inputbox" ', 'value', 'text', $resolition_two);

$resolition_three = (isset($layout_params['views']['resolition_three'])) ? $layout_params['views']['resolition_three'] : '3';
$layout_resolition_three = JHTML::_('select.genericlist',$test, 'vi_resolition_three',
                                            'size="1" class="inputbox" ', 'value', 'text', $resolition_three);

$resolition_four = (isset($layout_params['views']['resolition_four'])) ? $layout_params['views']['resolition_four'] : '2';
$layout_resolition_four = JHTML::_('select.genericlist',$test, 'vi_resolition_four',
                                            'size="1" class="inputbox" ', 'value', 'text', $resolition_four);
//resolutions


?>
<div id="options-field-<?php echo $key?>">
    <?php if($currentLayout->type != 'instance'){ ?>
        <div>
            <label><?php echo JText::_("COM_OS_CCK_LABEL_BUTTON_NAME")?></label>
            <input type="text" name="vi_show_request_layout_button_name[<?php echo $key ?>][]" value="<?php echo $button_name?>">
        </div>
    <?php } ?>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label>
        <input type="checkbox" data-field-name="<?php echo $key?>" name="vi_show_request_layout_name[<?php echo $key ?>][]" <?php echo $fld_name_show?>>
    </div>
    <div class="category-options">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_ALIAS")?></label>
        <input type="text" size="4" name="vi_show_request_layout_alias[<?php echo $key ?>][]"  value="<?php echo $fld_alias?>" >
    </div>


    <h3><?php echo JText::_("COM_OS_CCK_LAYOUT_COUNT_INST_GRID") ?></h3>
    <div class="main-fields-content">

       <!-- main one -->
      <div class="category-options g_instance_grid">
        <label><?php echo JText::_('COM_OS_CCK_LAYOUT_COUNT_INST_GRID'); ?></label>
        <?php  echo $layout_instance_grid;?>
      </div>
      <!-- main one -->

       <!-- main two -->
      <div class="category-options g_auto_custom">
       <label><?php echo JText::_('COM_OS_CCK_LAYOUT_CALCULATION_TYPE'); ?></label>
        <?php  echo $layout_auto_custom;?>
      </div>
      <!-- main two -->
      <div class="g_auto">
        <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_COUNT_INST_COLUNMS'); ?></label>
          <?php  echo $layout_count_inst_columns;?>
        </div>

        <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_MIN_WIDTH'); ?></label>
          <?php  echo $layout_lay_min_width;?>
        </div>

        <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_SPACE_BETWEEN'); ?></label>
          <?php  echo $layout_space_between;?>
        </div>
      </div>

      <div class="category-options g_custom">
        <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_RESOLUTION_ONE'); ?></label>
          <span><?php  echo $layout_resolition_one;?></span>
        </div>

        <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_RESOLUTION_TWO'); ?></label>
          <?php  echo $layout_resolition_two;?>
        </div>

        <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_RESOLUTION_THREE'); ?></label>
          <?php  echo $layout_resolition_three;?>
        </div>

         <div class="category-options">
          <label><?php echo JText::_('COM_OS_CCK_LAYOUT_RESOLUTION_FOUR'); ?></label>
          <?php  echo $layout_resolition_four;?>
        </div>
      </div>

    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SQL_SHOW")?> <i title="<?php echo JText::_("COM_OS_CCK_LABEL_SQL_SHOW_DESC")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input id="add-field-mask-sql-show" class="new-mask" type="button" aria-invalid="false" value="select +field">
        <span class="editor-button">Editor</span>
        <textarea class="sql-show-editor" rows="5" cols="30" name="vi_request_layout_sql_show[<?php echo $key ?>][]"><?php echo $field_sql_show?></textarea>
    </div>
    <?php if($cck_entity_configuration[$layout->fk_eid]['check_access_fields'] == '1'){ ?>
    <div>
        <label>Show to:</label>
        <?php echo JHTML::_('select.genericlist', $gtree, "vi_show_request_layout[".$key."][]", 'multiple="true"','value', 'text',$access_selected)?>
    </div>
    <?php }else{ ?>
        <input type="hidden" name="vi_show_request_layout[<?php echo $key; ?>][]" value="">
    <?php } ?>
    <?php if($currentLayout->type != 'instance'){ ?>
        <div>
            <label>Show type</label>
            <?php echo JHTML::_('select.genericlist', $type_show, "vi_show_type_request_layout[".$key."][]", '','value', 'text',$show_type_selected)?>
        </div>
    <?php } ?>
</div>


<script type="text/javascript">
    function grid_panel(){
      jQuerOs('.g_auto, .g_custom, .g_auto_custom').hide();
      if(jQuerOs('.g_instance_grid select').val() == 1){
        jQuerOs('.g_auto, .g_custom, .g_auto_custom').show();

        if(jQuerOs('.g_auto_custom select').val() == 'auto'){
          jQuerOs('.g_auto').show()
          jQuerOs('.g_custom').hide()
        }else{
          jQuerOs('.g_custom').show()
          jQuerOs('.g_auto').hide()
        }
      }  
      return;
    }

    grid_panel();
      
    jQuerOs('.g_instance_grid select, .g_auto_custom select').change(function(event) {
      grid_panel();
    });

</script>