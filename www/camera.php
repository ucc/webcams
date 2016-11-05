<?php
	$camera = 'nocamera';
	if (isset($_GET['camera']))
		$camera=$_GET['camera'];
	$imagelocation="../";
	$file = $imagelocation.strtolower($camera).".jpg";
	$statusfile = $imagelocation.strtolower($camera).".status";
	//echo $file;
	header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");
	if (!is_readable($file)) {
		$file="nocamera.jpg";
	}
	if (file_exists($statusfile))
		usleep(250000);
	header("Content-Type: image/jpeg");
	header("Content-Length: ".filesize($file));
	$fps = stat($file);
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", $fps[9])." GMT");
	$fp = fopen($file, 'rb');
	fpassthru($fp);
	fclose($fp);
?>
