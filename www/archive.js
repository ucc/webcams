var d;
var months = new Array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
var days = new Array ("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");

function windowOnload()
{
	// set the initial date from the server
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
				d = new Date (Date.parse (req.getResponseHeader ("Date")));
	
				if (location.hash.length > 0)
				{
					d.setTime (location.hash.substring(1, location.hash.length));
				}
				else
				{
					d.setMinutes(d.getMinutes() - 1);
				}
				setupPage();
				setDate();
                        }

                };

		var timestamp = new Date ();
                req.open ("HEAD", "index.html?" + timestamp.getTime (), true);
                req.send ("");
        }
}

function setDateNow()
{
	// get a new date from the server
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
				d = new Date (Date.parse (req.getResponseHeader ("Date")));
	
				d.setMinutes(d.getMinutes() - 1);
				setDate();
				alignSelects();
                        }

                };

		var timestamp = new Date ();
                req.open ("HEAD", "index.html?" + timestamp.getTime (), true);
                req.send ("");
        }
}

function setupPage()
{
	var form;
	var i;

	document.getElementById("nav-dayname").firstChild.data = days[d.getDay()];
	form = document.getElementById("nav-day");
	for (i = 0; i < 31; i++)
	{
		form[i] = new Option(i+1,i+1,(d.getDate() == i+1));
	}
	form = document.getElementById("nav-month");
	for (i = 0; i < 12; i++)
	{
		form[i] = new Option(months[i],i,(d.getMonth() == i));
	}
	form = document.getElementById("nav-year");
	for (i = 2003; i < d.getFullYear() + 1; i++)
	{
		form[i-2003] = new Option(i,i,(d.getFullYear() == i));
	}
	form = document.getElementById("nav-hour");
	for (i = 0; i < 24; i++)
	{
		form[i] = new Option(zPad(i.toString()),i,(d.getHours() == i));
	}
	form = document.getElementById("nav-minute");
	for (i = 0; i < 60; i++)
	{
		form[i] = new Option(zPad(i.toString()),i,(d.getMinutes() == i));
	}
}

function alignSelects()
{
	var form;
	var i;
	
	form = document.getElementById("nav-day");
	for (i = 0; i < 31; i++)
	{
		if (d.getDate() == i+1)
		{
			form[i].selected = true;
		}
		else
		{
			form[i].selected = false;
		}
	}
	form = document.getElementById("nav-month");
	for (i = 0; i < 12; i++)
	{
		if (d.getMonth() == i)
		{
			form[i].selected = true;
		}
		else
		{
			form[i].selected = false;
		}
	}
	form = document.getElementById("nav-year");
	for (i = 2003; i < d.getFullYear() + 1; i++)
	{
		if (d.getFullYear() == i)
		{
			form[i-2003].selected = true;
		}
		else
		{
			form[i-2003].selected = false;
		}
	}
	form = document.getElementById("nav-hour");
	for (i = 0; i < 24; i++)
	{
		if (d.getHours() == i)
		{
			form[i].selected = true;
		}
		else
		{
			form[i].selected = false;
		}
	}
	form = document.getElementById("nav-minute");
	for (i = 0; i < 60; i++)
	{
		if (d.getMinutes() == i)
		{
			form[i].selected = true;
		}
		else
		{
			form[i].selected = false;
		}
	}
}

function navDate()
{
	d.setDate(document.getElementById("nav-day").value);
	d.setMonth(document.getElementById("nav-month").value);
	d.setFullYear(document.getElementById("nav-year").value);
	d.setHours(document.getElementById("nav-hour").value);
	d.setMinutes(document.getElementById("nav-minute").value);

	setDate();
}

function zPad(str)
{
	if (str.length == 1)
	{
		str = "0" + str;
	}
	return str;
}

function setAlt (img, text)
{
	var lines = img.alt.split ("\n");
	if (lines.length > 0)
	{
		img.alt = lines[0] + "\n" + text;
	}
	else
	{
		img.alt += "\n" + text;
	}
}

function updateWebcam (webcamid, webcamurl)
{
		var div = document.getElementById (webcamid);
        var img = div.getElementsByTagName('img')[0];

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
					//img.parentNode.style.backgroundColor = "transparent";
					div.style.display = 'inline';
					//setAlt (img, "");
                                }
				else
				{
					div.style.display = 'none';
					//img.parentNode.style.backgroundColor = "darkred";
					//setAlt (img, "(status " + req.status + ")");
				}
                        }

                };

                req.open ("HEAD", webcamurl, true);
                req.send ("");
        }

        // set the image
        img.setAttribute ("src",webcamurl);
}


function setDate()
{
	window.location.hash = d.getTime();
	//document.getElementById("timeremaining").firstChild.data = "loading...";

	var timeString = days[d.getDay()]+" "+d.getDate()+" "+months[d.getMonth()]+" "+d.getFullYear()+", "+zPad(d.getHours().toString())+":"+zPad(d.getMinutes().toString());
	document.title = "UCC Webcams @ "+timeString;
	document.getElementById("header").firstChild.data = "UCC Webcams @ "+timeString;
	document.getElementById("timeindex").firstChild.data = d.getTime();
	document.getElementById("timeindex").href = "#"+d.getTime();

	document.getElementById("nav-dayname").firstChild.data = days[d.getDay()];

	var image = d.getFullYear()+zPad((d.getMonth()+1).toString())+"/"+zPad(d.getDate().toString())+"/"+zPad(d.getHours().toString())+"/"+zPad(d.getMinutes().toString())+".jpg";
	updateWebcam ("webcam1", "/archive/colour/" + image);
	//updateWebcam ("webcam1-datetime", "/archive/colour/" + image);
	updateWebcam ("webcam2", "/archive/colour1/" + image);
	updateWebcam ("webcam3", "/archive/colour3/" + image);
	updateWebcam ("webcam4", "/archive/bw/" + image);
	updateWebcam ("uvc1", "/archive/uvc1/" + image);
	updateWebcam ("ipcamera1", "/archive/ipcamera1/" + image);
	updateWebcam ("ipcamera2", "/archive/ipcamera2/" + image);
	updateWebcam ("ipcamera3", "/archive/ipcamera3/" + image);
	updateWebcam ("ipcamera4", "/archive/ipcamera4/" + image);
	updateWebcam ("ipcamera5", "/archive/ipcamera5/" + image);
	updateWebcam ("ipcamera6", "/archive/ipcamera6/" + image);
	//setTimeout("clearText()",1000);
}

function setMinutes(mins)
{
	d.setMinutes(d.getMinutes() + mins);
	setDate();
	alignSelects();
}

function setHours(hours)
{
	d.setHours(d.getHours() + hours);
	setDate();
	alignSelects();
}

function setDays(days)
{
	d.setDate(d.getDate() + days);
	setDate();
	alignSelects();
}

function clearText()
{
	document.getElementById("timeremaining").firstChild.data = "";
}