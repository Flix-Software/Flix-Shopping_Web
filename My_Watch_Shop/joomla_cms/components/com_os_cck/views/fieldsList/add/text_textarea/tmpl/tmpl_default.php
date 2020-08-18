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
if(isset($layout_params['fields']['showName_'.$field->db_field_name]) &&
  $layout_params['fields']['showName_'.$field->db_field_name] == 'on'){
  $layout_html = str_replace($field->db_field_name.'-label-hidden', '', $layout_html);
}
$offset_animation = get_field_offset_animation($field, $layout);
$fName = $field->db_field_name;

$icon_alias_prefix = (isset($field_from_params[$fName.'_add_icon_alias_prefix'])) ? $field_from_params[$fName.'_add_icon_alias_prefix'] : '';
if($icon_alias_prefix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_prefix_hidden', 'fa '.$icon_alias_prefix, $layout_html);
}
$icon_alias_suffix = (isset($field_from_params[$fName.'_add_icon_alias_suffix'])) ? $field_from_params[$fName.'_add_icon_alias_suffix'] : '';
if($icon_alias_suffix != ''){
    $layout_html = str_replace($field->db_field_name.'_label_icon_suffix_hidden', 'fa '.$icon_alias_suffix, $layout_html);
}

$class='';
$required = '';
if(isset($field_from_params[$fName.'_required']) && $field_from_params[$fName.'_required']=='on')
    $required = ' required ';
if(!$field_from_params[$fName.'_editor_field']){
    $class = 'editor-area '; ?>
  <span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <textarea <?php echo $layout_params['field_styling']?> 
                placeholder="<?php echo $field_from_params[$fName.'_placeholder']?>" 
                class="<?php echo $class.$layout_params['custom_class'].$required . $field->db_field_name?> text_area" 
                <?php echo $offset_animation; ?>
                type="text" 
                name="fi_<?php echo $field->db_field_name?>"><?php echo $value?></textarea>
                </span>
<?php
}
else{
    
    //var_dump($editor);?>
<span <?php if(isset($layout_params['fields']['description_'.$fName]) && $layout_params['fields']['description_'.$fName]=='on' && !empty($layout_params['fields'][$fName.'_tooltip']))
        {?>
rel="tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $layout_params['fields'][$fName.'_tooltip'];?>"
    <?php } ?> >
    <div class="<?php echo $layout_params['custom_class']; ?>" <?php echo $offset_animation; ?> >
        <?php
        $editor = JFactory::getConfig()->get('editor');
        
        if($editor != 'none'){
            $editor = JEditor::getInstance($editor);
            echo $editor->display( "fi_" . $field->db_field_name, $value, '400', '350', '5', '5');
        }else{
            
        ?>
        <textarea <?php echo $layout_params['field_styling']?> 
                placeholder="<?php echo $field_from_params[$fName.'_placeholder']?>" 
                class="editor-area <?php echo $layout_params['custom_class'].$required . $field->db_field_name?> text_area" 
                <?php echo $offset_animation; ?>
                type="text" 
                name="fi_<?php echo $field->db_field_name?>"><?php echo $value?></textarea>
                
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '.editor-area',
                height: 300,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor',
                  'searchreplace visualblocks fullscreen',
                  'insertdatetime table contextmenu paste'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            });
        </script>
        <?php } ?>
    </div>
</span>
    <?php
}