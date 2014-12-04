function windowOnload()
{
	updateTime();
	setInterval("updateTime()", 15000);
}

function updateWebcam (webcamid, webcamurl)
{
	var date = new Date ();
	var fullwebcamurl = webcamurl + "&t" + date.getTime ();
	var img = document.getElementById(webcamid);

	// get an XML HTTP Request object
	var req = false;
	try
	{
		req = new XMLHttpRequest ();
	}
	catch (e)
	{
		try
		{
			req = new ActiveXObject ("Microsoft.XMLHTTP");
		}
		catch (e)
		{
		}
	}

	if (req)
	{
		req.onreadystatechange = function ()
		{
			if (req.readyState == 4)
			{
				if (req.status == 200 || req.status == 304)
				{
					var imgdate = new Date (Date.parse (req.getResponseHeader ("Last-Modified")));
					var servdate = new Date (Date.parse (req.getResponseHeader ("Date")));
					if (Math.abs (imgdate.getTime () - servdate.getTime ()) > 1000 * 60 * 3)
					{
						console.log("Out Of Sync");
						console.log("imgdate: " + imgdate);
						console.log("servdate: " + servdate);
						// this image is out of date
						img.classList.add('offline');
					}
					else
					{
						//console.log("In Sync");
						img.classList.remove('offline');
					}
				}
			}
			
		};

		req.open ("HEAD", fullwebcamurl, true);
		req.send ("");
	}
	// set the image
	//img.src = "http://www.ucc.asn.au/~webcam/" + fullwebcamurl;
	img.src = fullwebcamurl;
}

function updateTime()
{
	var date = new Date ();
	updateWebcam ("ipcamera1", "camera.php?camera=ipcamera1");
	updateWebcam ("ipcamera2", "camera.php?camera=ipcamera2");
	updateWebcam ("ipcamera3", "camera.php?camera=ipcamera3");
	updateWebcam ("ipcamera4", "camera.php?camera=ipcamera4");
	updateWebcam ("ipcamera5", "camera.php?camera=ipcamera5");
	updateWebcam ("ipcamera6", "camera.php?camera=ipcamera6");
}
