<?php
	$camera = 'nocamera';
	if (isset($_GET['camera']))
		$camera=$_GET['camera'];
	$imagelocation="../../";
	$file = $imagelocation.strtolower($camera).".jpg";
	//echo $file;
	header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");
	if (!is_readable($file)) {
		$file="nocamera.jpg";
	}
	header("Content-Type: image/jpeg");
	header("Content-Length: ".filesize($file));
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", filectime($file))." GMT");
	$fp = fopen($file, 'rb');
	fpassthru($fp);
	fclose($fp);
?>
