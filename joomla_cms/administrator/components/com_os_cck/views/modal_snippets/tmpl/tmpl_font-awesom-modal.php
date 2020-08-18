<?php
if (!defined('_VALID_MOS') && !defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');

$icon_array = file_get_contents(JPATH_SITE.'/components/com_os_cck/assets/bootstrap/fonts/icons_array.txt');
$icon_array = unserialize($icon_array);
/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/
?>
<!-- CustomCode field Modal -->
<div class="modal fade" id="font-awesom-modal" tabindex="-1" role="dialog" aria-labelledby="font-awesom-modal-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="font-awesom-modal-Label"><?php echo JText::_("COM_OS_CCK_LABEL_SELECT_ICON_MODAL")?></h4>
      </div>
      <div class="modal-body">
          <input class="btn btn-danger" type="button" icon_class="" onclick="javascript:add_font_awesome_icon(this);" value="Delete icon"></input>
        <div class="font_awesom_icons_wraper">
        <?php
            foreach($icon_array as $brands => $icons){
                echo '<div class="font_awesom_icons_brand"><div class="font_awesom_icons_brand_label"><h2>'. ucfirst(str_replace('-', ' ', $brands)).'</h2></div>';
                foreach($icons as $icon){
                    echo '<span class="font_awesom_icon fa fa-'.$icon.'" icon_class="fa-'.$icon.'" onclick="javascript:add_font_awesome_icon(this);"></span>';
                }
                echo '</div>';
            }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- CustomCode field Modal -->