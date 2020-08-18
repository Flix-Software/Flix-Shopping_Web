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


class AdminImportExport
{

	
	static function import() {
		
		$database = JFactory::getDbo();

		$step = JRequest::getInt('step',1);

		if($step === 1){

			AdminViewImportExport::import();

		}elseif($step === 2){
	
			if($_FILES['importData']['type'] != 'application/zip')
			{
				$data['error'] = 'Incorrect file format';
				AdminViewImportExport::import($step,$data);
			}else{



			$extractPathFiles = JPATH_COMPONENT_SITE.'/files';
			$extractPathImages = JPATH_ROOT.'/images';
			$extractPathGalleryZip = JPATH_COMPONENT_SITE.'/files/gallery.zip';

			$rand = rand(1,1000);

			rename(JPATH_COMPONENT_SITE.'/files', JPATH_COMPONENT_SITE.'/files_backup_'.$rand);

			$zip = new ZipArchive;
			
		 	$extract = $zip->open($_FILES['importData']['tmp_name']);
			if ($extract === TRUE) {
			 
			    $zip->extractTo($extractPathFiles);
				
			} 

			$extractZip = $zip->open($extractPathGalleryZip);
			$numFiles = $zip->numFiles;
			if ($extractZip === TRUE) {
			 	
			 	for ($i=0; $i<$numFiles; $i++) {
    				$gallery_folder_name = str_replace(DIRECTORY_SEPARATOR, '', $zip->statIndex($i)['name']);

    				if(is_dir(JPATH_ROOT.'/images/'.$gallery_folder_name))
    				{
    					rename(JPATH_ROOT.'/images/'.$gallery_folder_name, JPATH_ROOT.'/images/'.$gallery_folder_name.'_backup_'.$rand);
    				}
				}
		
			    $zip->extractTo($extractPathImages);
				
			}
			
			
			if(!file_exists($extractPathFiles.'/sqlcck.sql'))
			{
				$step = 2;
				$data['error'] = "SQL file is missing";
				AdminViewImportExport::import($step,$data);
				return;
			}

			$query = 'SHOW tables';
			$database->setQuery($query);
			$result = $database->loadColumn();
			$prefix = $database->getPrefix();
			
			foreach($result as $table)
			{
				if(preg_match('/^' . $prefix . 'os_cck/', $table))
				{	
					$count = 1;
					$table = str_replace('$prefix', '', $table, $count);

					$query = "RENAME table " . $table . " TO backup_".date("Y_m_d_H_i_s")."_".$table;

					$database->setQuery($query);
					$result = $database->execute();
					if($result)
					{
						continue;
					}else{
						$data['error'] = "Rename error";
					}
				}
			}


			$sqlPath = JPATH_COMPONENT_SITE.'/files/sqlcck.sql';
			$sqlContent = file_get_contents($sqlPath);
			$sqlContent = $database->splitSql($sqlContent);

			foreach($sqlContent as $query)
			{
				$database->setQuery($query);
				$result = $database->execute();
				if($result)
				{
					continue;
				}else{
					$data['error'] = "Add error";
				}
			}

			if(file_exists($extractPathFiles.'/sqlcck.sql')) unlink($extractPathFiles.'/sqlcck.sql');
			if(file_exists($extractPathFiles.'/gallery.zip')) unlink($extractPathFiles.'/gallery.zip');

			//open xml file
			$xml = @simplexml_load_file(JURI::base() . "components/com_os_cck/os_cck.xml");
                        if($xml){
                            //determine the version in xml file
                            $cckV = (string)$xml->version;
                            //determine the version in db
                            $query = "SELECT current_vers FROM #__os_cck_version";
                            $database->setQuery($query);
                            $dbV = $database->loadResult();
                            $update_dir = JPATH_ADMINISTRATOR . "/components/com_os_cck/sql/updates/mysql/";
                            
                            $files = scandir($update_dir);

                            if(version_compare($dbV, $cckV, '<')){
                                foreach($files as $file){
                                    if (version_compare($dbV, $file, '<')){
                                        $file_path = $update_dir . $file;
                                        $update_file = file_get_contents($file_path);
                                        $database->setQuery($update_file);
                                        $database->execute();
                                    }
                                }
                                $query = "UPDATE #__os_cck_version SET current_vers='" . $cckV . "'";
                                $database->setQuery($query);
                                $database->execute();
                            }    
                            
                        }
			AdminViewImportExport::import($step,$data);
			}

		}
		
	}

}
