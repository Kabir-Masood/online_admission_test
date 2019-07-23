<?php
if (!empty($_GET['file'])) {
 	$filename = basename($_GET['file']);
 	$filepath = '../sampleFile/' . $filename;

 	if (!empty($filename) && file_exists($filepath)) {
 		//Define headers
 		header("Cache-Control: public");
 		header("Content-Description: File Transfer");
 		header("Content-Disposition: attachment; filename=$filename");
 		header("Content-Type: application/zip");
 		header("Content-Transfer-Emcoding: binary");

 		readfile($filepath);
 		exit;
 	}
 	else {
 		echo "Sorry, the file does not exist.";
 	}
 } 
?>