<?php

namespace Framework\Utils;

/**
* 
*/
class Upload 
{
	define('UPLOAD_DIR', __DIR__ . '/../../web/assets/img/avatar/');

	public static function upload($file, $destination_folder) {

		


		if (empty($_FILES[$file])) {
			
			return false;
		}

		if ($_FILES[$file]["error"] !== UPLOAD_ERR_OK) {
			
			return false;
		}

		$name = self::setFileName($_FILES[$file]["name"]);

		// preserve file from temporary directory
		$success = move_uploaded_file($_FILES[$file]["tmp_name"], UPLOAD_DIR . $name);

		if (!$success) { 

			return false;
		}

		// set proper permissions on the new file
		chmod(UPLOAD_DIR . $name, 0644);

		return true;
	}

	public static function setFileName($file) {
		// ensure a safe filename
		$name = preg_replace("/[^A-Z0-9._-]/i", "_", $file);
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
		$fileType = exif_imagetype($file); // $_FILES[$file]["tmp_name"]
		$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);

		if (!in_array($fileType, $allowed)) {
    		return false;
    	}

    	return true;
	}
}

