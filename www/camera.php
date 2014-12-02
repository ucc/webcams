<?php
	$camera = ($_GET['camera']?$_GET['camera']:'nocamera');
	$imagelocation="../";
	$file = $imagelocation.strtolower($camera).".jpg";
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
