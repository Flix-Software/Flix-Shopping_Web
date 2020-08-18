<?php

defined('_JEXEC') or die;

/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/

class com_os_cckInstallerScript {

    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) {
        // $parent is the class calling this method
        $db = JFactory::getDBO();
        $params = new JRegistry;
        //$params->set("by_time","0");
        $params->set("rent_type","0");
        $params->set("crop_image","0");
        $params->set("save_database","1");
        $params->set("google_map_key","");
        $params->set("paypal_currency","USD=1;");
        $params->set("currency_position","1");
        $params->set("use_paypal","0");
        $params->set("use_2checkout","0");

        $query = "SELECT * FROM `#__os_cck_version`";
        $db->setQuery($query);
        $isEmpty = $db->loadResult();
        if(!$isEmpty){
            $current_vers = (string)$parent->manifest->version;
            $query = "INSERT INTO `#__os_cck_version` VALUES (null,'".$current_vers."','no previous')";
            $db->setQuery($query);
            $db->query();
        }else{
            self::updateVersion($parent);
        }
        
        $query = "UPDATE #__extensions SET params='".$params->toString()."' WHERE element='com_os_cck'";
        $db->setQuery($query);
        $db->query();
    }

    /**
     * method to uninstall the component
     *
     * @return void
     */
    function uninstall($parent) {
        // $parent is the class calling this method
        require_once(JPATH_SITE . "/administrator/components/com_os_cck/uninstall.os_cck.php");
        com_uninstall();
    }

    /**
     * method to update the component
     *
     * @return void
     */
    function update($parent) {
        // $parent is the class calling this method
        self::updateVersion($parent);
        //self::updateContentTable();
        var_dump($parent);
        
    }

    static function updateVersion($parent){

        $db = JFactory::getDBO();
        $xml = simplexml_load_file(JPATH_ADMINISTRATOR .'/components/com_os_cck/os_cck.xml');
        $current_vers = (string)$parent->manifest->version;
        $last_vers = (string)$xml->version;

        if(!$last_vers || $last_vers == ''){
            $query = "SELECT current_vers FROM `#__os_cck_version`";
            $db->setQuery($query);
            $last_vers = $db->loadResult();
        }

        $query = "SELECT current_vers FROM `#__os_cck_version`";
        $db->setQuery($query);
        $result = $db->loadResult();
        if($result){
            $query = "SELECT last_vers FROM #__os_cck_version ";
            $db->setQuery($query);
            $last_versions = $db->loadResult();

            $query = "UPDATE #__os_cck_version SET current_vers = '".$current_vers."', last_vers='".$last_versions." - ".$last_vers."'";
            $db->setQuery($query);
            $db->query();
        }else{
            $query = "INSERT INTO `#__os_cck_version` VALUES (null,'".$current_vers."','".$last_vers."')";
            $db->setQuery($query);
            $db->query();
        }
        
        $query = "SELECT * FROM #__os_cck_entity_instance LIMIT 1";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        $query_array[] = "ALTER TABLE `#__os_cck_entity_instance` ADD `access` VARCHAR(64) NOT NULL AFTER `featured_shows`";
            $query_array[] = "ALTER TABLE `#__os_cck_entity_instance` ADD `meta_title` VARCHAR(256) NOT NULL AFTER `access`";
            $query_array[] = "ALTER TABLE `#__os_cck_entity_instance` ADD `meta_description` VARCHAR(256) NOT NULL AFTER `meta_title`";
            $query_array[] = "ALTER TABLE `#__os_cck_entity_instance` ADD `meta_keywords` VARCHAR(256) NOT NULL AFTER `meta_description`";
            $query_array[] = "ALTER TABLE `#__os_cck_entity_instance` ADD `meta_robots` TINYINT(2) NOT NULL DEFAULT '0' AFTER `meta_keywords`";
        if(!isset($result[0]->access)){
            foreach($query_array as $query){
                $db->setQuery($query);
                $result = $db->query();
            }
        }elseif(!isset($result[0]->meta_title)){
            foreach($query_array as $key => $query){
                if($key>0){
                    $db->setQuery($query);
                    $result = $db->query();
                }
            }
        }
    }


    
//    static function updateContentTable(){
//      //We use the Engine InnoDB for the os_cck_content_entity table to avoid an error with more than 64 keys.
//      $db = JFactory::getDBO();
//      $query_tables = "SHOW TABLE STATUS WHERE name LIKE '%os_cck_content_entity%' AND Engine='MyISAM'";
//      
//      $db->setQuery($query_tables);
//      $tables = $db->loadObjectList();
//      $sql = '';
//      if(!empty($tables)){
//          foreach ($tables as $table){
//              $sql = " ALTER TABLE " . $table->Name . " ENGINE=INNODB";
//              $db->setQuery($sql);
//              $db->query();
//          }
//      }
//    }
    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
    function preflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)

        $db = JFactory::getDBO();
        $db->setQuery("DELETE FROM #__update_sites WHERE name = 'CCK`s Update'");
        $db->query();
        
        if ( $type == 'update' ) {
            $component_path = JPath::clean(JPATH_SITE . '/administrator/components/com_os_cck/entities_conf');
            if (is_dir($component_path) && ($component_layouts = JFolder::files($component_path, '^[^-]*\.php$', false, true))) {
                foreach ($component_layouts as $i => $file) {
                    require_once($file);
                    $file_name = explode('.', $file);
                    $pos = strripos($file_name[1], '_');
                    $entity_id = substr($file_name[1], $pos+1);
                    $GLOBALS['cck_entity_configuration_old'][$entity_id] = ${"cck_entity_configuration_$entity_id"};
                }
            }
        }

    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        global $cck_entity_configuration_old;
        require_once (JPATH_SITE . '/administrator/components/com_os_cck/adminphp/admin.entity.php');
        require_once (JPATH_SITE . '/administrator/components/com_os_cck/entities_conf/admin.entity_setting_default.class.conf.php');
        $database = JFactory::getDBO();

        $table_prefix = $database->getPrefix();
        $tableList = $database->getTableList();

        $ccklibr = '';
        if (array_search($table_prefix . 'os_cck_entity', $tableList)) {
            $database->setQuery("SELECT * FROM #__os_cck_entity");
            $ccklibr = $database->loadResult();
        }
        
        if(!empty($ccklibr)){
            $database->setQuery("SELECT * FROM #__os_cck_entity");
            $enteties = $database->loadObjectList();
            //entities configurations
            if($type='update'){
                foreach($enteties as $entity){
                    if(isset($cck_entity_configuration_old[$entity->eid])){
                        $cck_entity_configuration = array_replace_recursive($cck_entity_configuration_default, $cck_entity_configuration_old[$entity->eid]);
                    }else{
                        $cck_entity_configuration = $cck_entity_configuration_default;
                    }
                    AdminEntity::setEntitySettings($cck_entity_configuration, $entity);
                }
            }
            //entities configurations
            
            return;
        }


        $extractPathFiles = JPATH_SITE.'/components/com_os_cck/files';
        $extractPathImages = JPATH_SITE.'/images';
        $extractPathGalleryZip = JPATH_SITE.'/components/com_os_cck/files/gallery.zip';

        $zip = new ZipArchive;
        
        $extract = $zip->open(JPATH_SITE . "/administrator/components/com_os_cck/exports/sample_data.zip");
        if ($extract === TRUE) {
         
            $zip->extractTo($extractPathFiles);
            
        } 

        $extractZip = $zip->open($extractPathGalleryZip);
        $numFiles = $zip->numFiles;
        if ($extractZip === TRUE) {
            
            for ($i=0; $i<$numFiles; $i++) {
                $gallery_folder_name = str_replace(DIRECTORY_SEPARATOR, '', $zip->statIndex($i)['name']);
            }
    
            $zip->extractTo($extractPathImages);
            
        }

        $sqlPath = JPATH_SITE.'/components/com_os_cck/files/sqlcck.sql';
        $sqlContent = file_get_contents($sqlPath);
        $sqlContent = $database->splitSql($sqlContent);

        foreach($sqlContent as $query)
        {
            $database->setQuery($query);
            $result = $database->execute();
        }

        if(file_exists($extractPathFiles.'/sqlcck.sql')) unlink($extractPathFiles.'/sqlcck.sql');
        if(file_exists($extractPathFiles.'/gallery.zip')) unlink($extractPathFiles.'/gallery.zip');
        
        $database->setQuery("SELECT * FROM #__os_cck_entity");
        $ccklibr = $database->loadObjectList();
        AdminEntity::setEntitySettings($cck_entity_configuration_default, $ccklibr[0]);
        //sample data

        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        require_once(JPATH_SITE . "/administrator/components/com_os_cck/install.os_cck.php");
        com_install2();
    }

}
