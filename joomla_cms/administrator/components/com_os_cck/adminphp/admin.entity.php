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

class AdminEntity
{


    static function publishEntities($publish, $option)
    {
        global $db, $user,$app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $post = JRequest::get('post');
        if (array_key_exists('eid', $post)) {
            $eid = $post['eid'];
        } else "Please select some entity";


        if (!is_array($eid) || count($eid) < 1) {
            $action = $publish ? 'publish' : 'unpublish';
            echo "<script> alert('Select an item to " . addslashes($action) . "'); window.history.go(-1);</script>\n";
            exit;
        }

        $eid = implode(',', $eid);

        $db->setQuery("UPDATE #__os_cck_entity SET published='$publish'" .
        "\nWHERE eid IN ($eid) ");
        if (!$db->query()) {
            echo "<script> alert('" . addslashes($db->getErrorMsg()) . "'); window.history.go(-1); </script>\n";
            exit ();
        }

        $app->redirect("index.php?option=com_os_cck&task=manage_entities");

    }


    static function showEntities($option){
        global $db, $app, $jConf;
        $limit = $app->getUserStateFromRequest("viewlistlimit", 'limit', $jConf->get("list_limit",10));
        $limitstart = $app->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0);

        $query = "select count(*) from #__os_cck_entity ;";
        $db->setQuery($query);
        $total = $db->loadResult();

        $pageNav = new JPagination($total, $limitstart, $limit);

        $query = "select * from #__os_cck_entity order by name  LIMIT $pageNav->limitstart,$pageNav->limit;";
        $db->setQuery($query);
        $extraentity_list = $db->loadObjectList();

        AdminViewEntity :: showEntities($option, $extraentity_list, $pageNav);
    }


    static function editEntity($option, $name)
    {
        global $db, $doc;
        $doc->addStyleSheet("https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css");
        $entity = new os_cckEntity($db);

        $post = JRequest::get('post');
        $eid = 0;
        if(isset($post['eid'])){
            $eid = $post['eid'];
        }
        $fields = array();
        $entity->load($eid[0]);

        AdminViewEntity :: editEntity($option, $entity);
    }


    static function saveEntity($option)
    {
        global $db, $user, $app;
        if(!cck_checkReferer()){
            JError::raiseWarning(0, JText::_("COM_OS_CCK_ERROR_REFERER_SECURITY"));
            return;
        }
        $post = JRequest::get('post');
        $entity_name = $post['name'];
        if (os_cckEntity::is_entity_name_exist($entity_name) && $post['eid'] == "") {
            echo "<script> alert('Entity with this name alredy exist'); window.history.go(-1); </script>\n";
            exit ();
        }
        $entity = new os_cckEntity($db);

        $data = $post;
        $data['asset_id'] = 0;
        $data['fk_userid'] = $user->id;
        $data['published'] = 1;
        $data['approved'] = 1;
        $data['created'] = date("Y-m-d H:i:s");
        $data['changed'] = date("Y-m-d H:i:s");
        $data['checked_out'] = 0;
        $data['checked_out_time'] = 0;

        
        if (!$entity->bind($data)) {
            echo "<script> alert('" . addslashes(JError::getError()->getMessage()) . "'); window.history.go(-1); </script>\n";
            exit ();
        }

        if (!$entity->store()) {
            echo "<script> alert('" . addslashes($db->getErrorMsg()) . "'); window.history.go(-1); </script>\n";
            exit ();
        }
        
        self::setEntitySettings($data, $entity);
        
        if (!$entity->checkin()) {
            echo "<script> alert('" . addslashes(JError::getError()->getMessage()) . "'); window.history.go(-1); </script>\n";
            exit ();
        }

        $app->redirect('index.php?option=com_os_cck&task=manage_entities', 'Entity successfuly saved');

    }

    static function deleteEntity($option)
    {
        global $db,$app;
        $post = JRequest::get('post');
        if (array_key_exists('eid', $post)) {
            $eids = $post['eid'];
            foreach ($eids as $entity) {
                $row = new os_cckEntity($db);
                $row->load($entity);

                //check if exists binding layout or instance 
                $query = "SELECT count(ceid) FROM #__os_cck_content_entity_".$row->eid;
                $db->setQuery($query);
                $content_entity_count = $db->loadResult();
                
                $query = "SELECT count(cid) FROM #__os_cck_categories WHERE fk_eid = '".$row->eid."'";
                $db->setQuery($query);
                $category_count = $db->loadResult();

                $query = "SELECT count(lid) FROM #__os_cck_layout WHERE fk_eid = '".$row->eid."'";
                $db->setQuery($query);
                $layout_count = $db->loadResult();

                if($content_entity_count > 0){
                     echo "<script> alert('Please remove all content related with this entity'); window.history.go(-1); </script>\n";
                    exit();
                }
                
                if($category_count > 0){
                     echo "<script> alert('Please remove or unbind all categories related with this entity'); window.history.go(-1); </script>\n";
                    exit();
                }

                if($layout_count > 0){
                    echo "<script> alert('Please remove all layouts related with this entity'); window.history.go(-1); </script>\n";
                    exit();
                }
              
                if (!$row->delete()) {
                    echo "<script> alert('" . addslashes($row->getError()) . "'); window.history.go(-1); </script>\n";
                    exit();
                }
            }
        }
        $app->redirect('index.php?option=com_os_cck&task=manage_entities', JText::_("COM_OS_CCK_LABEL_ENTITY_DELETED"));
    }


    static function cancelEditEntity()
    {
        global $db, $app;

        $row = new os_cckEntity($db);
        $row->bind($_POST);
        $row->checkin();
        $app->redirect('index.php?option=com_os_cck&task=manage_entities');
    }
    
    static function setEntitySettings($data, $entity){
        // Prepare settings
        // Using single quotes is easier because you don't have to escape them. For every setting, add a line.
        $settings = "<?php\n";
        //var_dump($data['check_access_instances']); exit;
        $settings .= "// Do not edit this file. Generated by admin script.\n";
        $settings .= "// CCK Entity Configuration file\n";
        $settings .= "// General Informations \n";
        $settings .= "\$cck_entity_configuration_$entity->eid['check_access_instances']='" .
                $data['check_access_instances'] . "';\n";
        $settings .= "\$cck_entity_configuration_$entity->eid['check_access_fields']='" .
                $data['check_access_fields'] . "';\n";
        $settings .= "\$cck_entity_configuration_$entity->eid['check_access_categories']='" .
                $data['check_access_categories'] . "';\n";
        $settings .= "\$cck_entity_configuration_$entity->eid['max_product_download']='" .
                $data['max_product_download'] . "';\n";
        $settings .= "\$cck_entity_configuration_$entity->eid['days_for_product_download']='" .
                $data['days_for_product_download'] . "';\n";
        foreach ($data['max_items'] as $key => $value){
            $settings .= "\$cck_entity_configuration_$entity->eid['max_items'][$key]='" .
                $value . "';\n";
        }
        
        $settings .= "?>";
        
        // Write out new initialization file
        //if (file_exists("./components/com_os_cck/entities_conf/admin.entity_id_$entity->eid.class.conf.php")) {
            $fd = fopen("./components/com_os_cck/entities_conf/admin.entity_id_$entity->eid.class.conf.php", "w")
                or die("Cannot create configuration file.");
        //}
        fwrite($fd, $settings);
        fclose($fd);
    }

}
