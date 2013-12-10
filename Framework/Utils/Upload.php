<?php

namespace Framework\Utils;

define("UPLOAD_DIR", "./web/assets/img/avatars/");
/**
* 
*/
class Upload 
{
	

	public static function upload($file) {

		if (!isset($file["name"]) || $file["error"] !== UPLOAD_ERR_OK || !self::verifyFileType($file["tmp_name"])){
			
			return false;
		}

		$name = self::setFileName($file["name"]);

		// preserve file from temporary directory
		$success = move_uploaded_file($file["tmp_name"], UPLOAD_DIR . $name);

		if (!$success) { 

			return false;
		}

		// set proper permissions on the new file
		chmod(UPLOAD_DIR . $name, 0644);

		return $name;
	}

	public static function setFileName($file) {
		// ensure a safe filename
		$name = strtr($file,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
		$name = preg_replace("/[^A-Z0-9._-]/i", "_", $name);
		// don't overwrite an existing file
		$i = 0;
		$parts = pathinfo($name);
		while (file_exists(UPLOAD_DIR . $name)) {
			$i++;
			$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
		}

		return $name;
	}

	public static function verifyFileType($file) {
		// verify the file is a GIF, JPEG, or PNG

		$fileType = exif_imagetype($file); // $file["tmp_name"]
		$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);

		if (!in_array($fileType, $allowed)) {
    		return false;
    	}

    	return true;
	}
}

