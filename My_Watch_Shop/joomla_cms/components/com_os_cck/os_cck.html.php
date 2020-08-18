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

// require_once($mosConfig_absolute_path . "/components/com_os_cck/os_cck.php");
// require_once($mosConfig_absolute_path . "/administrator/components/com_os_cck/menubar_ext.php");

class HTML_os_cck{   

  static function showBuyRequestThanks($backLink, $selected_payment_systems, $instance, $calculated_price){
    ?>
      <span class="message"><?php echo JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS");?></span>
      <?php 
          
      if($selected_payment_systems != ''){
          $price = $calculated_price;
        echo '<br/> Total Price: '.$price.' '.$instance->instance_currency . '<br/><br/>';
        //echo '<br/> Buy Now On PayPal <br/><br/>';
        
        echo HTML_os_cck :: getSaleForm($instance, $selected_payment_systems);
      }else{
         ?>
        <form action="<?php echo $backLink?>" method="post">
          <button type="submit">Ok</button>
        </form>
        <?php
      }
      ?>
  
    <?php
  }

  static function showRentRequestThanks($backLink, $selected_payment_systems, $instance){
    ?>
      <span class="message"><?php echo JText::_("COM_OS_CCK_LABEL_REQUEST_THANKS");?></span>
      <?php 
      if($selected_payment_systems != '' && $instance->instance_price != 0){
        echo '<br/> Total Price: '.$instance->instance_price.' '.$instance->instance_currency . '<br/><br/>';
        //echo '<br/> Pay Now On PayPal <br/><br/>';
        echo HTML_os_cck :: getSaleForm($instance, $selected_payment_systems);
      }else{
        ?>
        <form action="<?php echo $backLink?>" method="post">
          <button type="submit">Ok</button>
        </form>
        <?php
      }
      ?>
     
    <?php
  }

  static function getSaleForm($instance, $selected_payment_systems){
      $dispatcher = JDispatcher::getInstance();
      
      foreach ($selected_payment_systems as $plugin_name){
          $plugin = JPluginHelper::importPlugin( 'payment',$plugin_name);
          if(isset($instance->title) && !empty($instance->title))$title = $instance->title;
          else $title = $instance->eiid;
          $price = round($instance->instance_price, 2);
          $data = array('vtitle' => $title,'instId'=>$instance->eiid, 'price' => $price, 'currency_code' => $instance->instance_currency);
          if($plugin_name == 'paypal'){
            $html = $dispatcher->trigger('getHTMLPayPal', array($data));
          }elseif ($plugin_name == '2checkout') {
            $html = $dispatcher->trigger('getHTML2Checkout', array($data));        
          }
          echo $html[0];
      }
  }
//if($plugin_name == 'paypal'){
//        $html = $dispatcher->trigger('getHTMLPayPal', array($data));
//      }elseif ($plugin_name == '2checkout') {
//        $html = $dispatcher->trigger('getHTML2Checkout', array($data));        
//      }
  ///////////////////////////////////////////////////////////
  function showRssCategories(&$categories, &$catid){
    global $hide_js, $Itemid, $acl;
    global $limit, $total, $limitstart, $paginations, $mainframe;
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<!-- generator="Solution Catalogue FeedCreator 1.0" -->' . "\n";
    echo '<?xml-stylesheet href="" type="text/css"?>' . "\n";
    echo '<?xml-stylesheet href="" type="text/xsl"?>' . "\n";
    echo '<rss version="2.0">' . "\n";
    echo "    <channel>\n";
    if ($catid === 0) {
      echo "<title>" . JUri::root() . " - OS_CCK</title>\n";
      echo "<description>OS_CCK</description>\n";
    } else {
      echo "<title>" . JUri::root() . " - OS_CCK - " . $categories[0]->ctitle . "</title>\n";
      echo "<description>OS_CCK </description>\n";
    }
    echo "<link>" . JUri::root() . "</link>\n";
    echo "<lastBuildDate>" . date("Y-m-d H:i:s") . "</lastBuildDate>\n";
    echo "<generator>OS_CCK 1.0</generator>\n";
    for ($i = 0; $i < count($categories); $i++) {
      $category = $categories[$i];
      echo "<item>";
      echo "<title>" . $category->title . "</title>" . "\n";
      echo "<link>" . JUri::root() . "/index.php?option=com_os_cck&amp;task=view&amp;id=" 
            . $category->id . "&amp;catid=" . $category->catid . "&amp;Itemid=" . $Itemid . "</link>" . "\n";
      echo "<description><![CDATA[";
      echo "<price><b>Price : </b>" . $category->price . "</price>";
      echo "<br><published>" . "<b>Publication date: </b>" . $category->date . "</published><br />";
      if ($category->image == "") {
        $image = JUri::root() . '/components/com_os_cck/images/no-img_eng.gif';
      } else if (substr($category->image, 0, 4) == "http") {
        $image = $category->image;
      } else {
        $image = JUri::root() . '/components/com_os_cck/photos/' . $category->image;
      }
      echo '<br><img src="' . $image . '" />';
      echo $category->description;
      echo "<a href='" . $category->edok_link . "'> Attached file </a><br /><br /><br /><br />";
      echo "]]></description>\n";
      echo "</item>\n";
    }
    ?>
    </channel>
    </rss>
    <?php
    exit;
  }

}
