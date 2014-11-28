<?php
	$file="./webcam3.jpg";
	if ( (integer)($QUERY_STRING) ):
		$WEBCAM = "/home/ucc/devenish/webcam1/archives/today";
		$file = "$WEBCAM/webcam3.jpg.".(integer)($QUERY_STRING);
	endif;
	header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");
	if ( is_readable( $file ) ) {
		header("Content-Type: image/jpeg");
		header("Content-Length: ".filesize($file));
		header("Last-Modified: ".gmdate("D, d M Y H:i:s", filectime($file))." GMT"); # NB. use PHP's 'date' function, not 'strftime' as we do NOT want to be locale-specific
		passthru("cat $file");
	}
	else {
		header("HTTP/1.0 404 Not found or not accessible");
		# 2001: Apache is nice enough to form an HTML body for us.
		# 2002: someone broke the above-mentioned feature, so now we do it ourselves:
		echo "<html><head><title>404 Not Found</title></head><body>Image $QUERY_STRING could not be found in today's archive.</body></html>";
	}
?>
