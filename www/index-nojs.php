<?php 
    if ( !isset( $broken1 ) ) { 
        $broken = 0; 
        if ( filemtime("../ipcamera1.jpg") < (time()-5*60) )  {
            $broken1 = 1; 
        }
    } 
    if ( !isset( $broken2 ) ) { 
        $broken2 = 0; 
        if ( filemtime("../ipcamera2.jpg") < (time()-5*60) )  {
            $broken2 = 1; 
        }
    }
    if ( !isset( $broken3 ) ) { 
        $broken3 = 0; 
        if ( filemtime("../ipcamera3.jpg") < (time()-5*60) )  {
            $broken3 = 1; 
        }
    } 
    if ( !isset( $broken4 ) ) { 
        $broken4 = 0; 
        if ( filemtime("../ipcamera4.jpg")<(time()-5*60) ) {
            $broken4 = 1; 
        } 
    }
    if ( !isset( $broken5 ) ) { 
        $broken5 = 0; 
        if ( filemtime("../ipcamera5.jpg")<(time()-5*60) ) {
            $broken5 = 1; 
        } 
    }
?>
<?php 
    header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT"); 
?>
<HTML><HEAD><META HTTP-EQUIV=REFRESH CONTENT="<?php if ( $broken && $broken1 && $bw_broken && $broken3 && $uvc_broken) echo "300"; else echo "60"; ?>;URL=./index-nojs.php"><TITLE>UCC Webcams</TITLE>
<!-- CSS from Planet to give consistant look and feel -->
<link rel="stylesheet" href="http://planet.ucc.asn.au/planet.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://webcam.ucc.asn.au/webcam-overrides.css" type="text/css" media="screen" />
<link rel="icon" type="image/png" href="http://planet.ucc.asn.au/icon.png" />
<link rel="SHORTCUT ICON" type="image/png" href="http://planet.ucc.asn.au/icon.png" />
<style>
.camera {
	margin: 4px;
	/*padding: 20px;*/
	margin-left: auto;
	margin-right: auto;
	display: inline-block;
	font-size: 0;
}
.header {
	background: none;
}
</style>
</HEAD>
<BODY BGCOLOR=white>
<div class="header">
<img alt="Planet UCC" id="pucc_logo"
     src="//www.ucc.asn.au/images/ucc_logo.gif" />
<div id="globalnav-wrapper">
 <ul id="portal-globalnav">
  <li id="portaltab-index_html" class="plain">
   <a href="http://www.ucc.asn.au">Home</a>
  </li>
  <li id="portaltab-aboutucc" class="plain">
   <a href="http://www.ucc.asn.au/aboutucc/">About Us</a>
  </li>

  <li id="portaltab-infobase" class="plain">
   <a href="http://www.ucc.asn.au/infobase/">Information</a>
  </li>
  <li id="portaltab-services" class="plain">
   <a href="http://www.ucc.asn.au/services/">Services</a>
  </li>
  <li id="portaltab-events" class="plain">
   <a href="http://www.ucc.asn.au/infobase/events/">Events</a>

  </li>
  <li id="portaltab-planetucc">
   <a href="http://planet.ucc.asn.au/">Planet UCC</a>
  </li>
  </li>
  <li id="portaltab-planetucc" class="plain">
   <a href="http://wiki.ucc.asn.au/">Wiki</a>
  </li>  
 </ul>
</div>
</div>
<div class="items">
 <h1 id=header>UCC Webcams</h1>
  <div class="navMenu">
    <a href="http://www.ucc.asn.au/cgi-bin/webcam.py">Archive</a>
    <a href="http://webcam.ucc.asn.au/clubroom-schematic.png">Map</a>
    <a href="index.html" title="Javascript Webcam Page">Web2 Version</a>
  </div>
<div class=camSection>
<!--<P>Welcome to the UCC webcam page.
 We have one colour camera running off our wireless gateway called flying, one colour camera running from our music machine called maroon, another colour camera running off a PowerMac 7600/200 known as novorossiisk, and a black-and-white camera running off a Quadra 660/AV known as kormoran.</p> -->
<!-- colour from John West? What about BW? -->
<p>UCC webcams running off <a href="http://www.ucc.gu.uwa.edu.au/machines/">Camwhore</a></p>
<div class="camera">
<?php if ( $broken1 ): ?>
<P><FONT COLOR='fushia'><EM>The colour webcam is currently off-line<br>(but here is <a href='http://www.ucc.asn.au/cgi-bin/webcam.py'>the archive</a>).</EM></FONT></P>
<P><FONT SIZE='-1'>This message was last updated at <?php echo date( "g:i A D d M Y", filemtime("../webcam.jpg") ); ?>.</FONT></P>
<?php else: ?>
<A HREF="ipcamera1.php"><IMG SRC="ipcamera1.php"></A>
<?php endif; ?>
</div>
<div class="camera">
<?php if ( $broken2 ): ?>
<P><FONT COLOR='fushia'><EM>The second colour webcam is currently off-line<br>(but here is <a href='http://www.ucc.asn.au/cgi-bin/webcam.py'>the archive</a>).</EM></FONT></P>
<P><FONT SIZE='-1'>This message was last updated at <?php echo date( "g:i A D d M Y", filemtime("../webcam1.jpg") ); ?>.</FONT></P>
<?php else: ?>
<A HREF="ipcamera2.php"><IMG SRC="ipcamera2.php"></A>
<?php endif; ?>
</div>
<div class="camera">
<?php if ( $broken3 ): ?>
<P><FONT COLOR='fushia'><EM>The third colour webcam is currently off-line<br>(but here is <a href='http://www.ucc.asn.au/cgi-bin/webcam.py'>today's archive</a>).</EM></FONT></P>
<P><FONT SIZE='-1'>This message was last updated at <?php echo date( "g:i A D d M Y", filemtime("../webcam3.jpg") ); ?>.</FONT></P>
<?php else: ?>
<A HREF="ipcamera3.php"><IMG SRC="ipcamera3.php"></A>
<?php endif; ?>
</div>
<div class="camera">
<?php if ( $broken4 ): ?>
<P><FONT COLOR='fushia'><EM>This webcam is currently off-line<br>(but here is <a href='http://www.ucc.asn.au/cgi-bin/webcam.py'>today's archive</a>).</EM></FONT></P>
<P><FONT SIZE='-1'>This message was last updated at <?php echo date( "g:i A D d M Y", filemtime("../bw-webcam.jpg") ); ?>.</FONT></P>
<?php else: ?>
<A HREF="ipcamera4.php"><IMG SRC="ipcamera4.php"></A>
<?php endif; ?>
</div>
<div class="camera">
<?php if ( $broken5 ): ?>
<P><FONT COLOR='fushia'><EM>This webcam is currently off-line<br>(but here is <a href='http://www.ucc.asn.au/cgi-bin/webcam.py'>today's archive</a>).</EM></FONT></P>
<P><FONT SIZE='-1'>This message was last updated at <?php echo date( "g:i A D d M Y", filemtime("../bw-webcam.jpg") ); ?>.</FONT></P>
<?php else: ?>
<A HREF="ipcamera5.php"><IMG SRC="ipcamera5.php"></A>
<?php endif; ?>
</div>
</div>
<div class="footer">
  <p>Copyright 1993-2011, The University Computer Club Inc.
  &lt;<a href="mailto:webmasters@ucc">webmasters@ucc</a>&gt;<br />
  Written to be <a href="http://www.w3c.org/">specifications compliant</a>.
  </p>
  <p class="logos" style="text-align: center;">
    <a href="http://www.ucc.asn.au">
    <img style="padding-bottom:1ex;" src="http://www.ucc.asn.au/images/ucc-sun-logo-black.png" alt="UCC" title="University Computer Club" />
    </a>
    <img alt="Hacking Life" title="Hacking Life" style="padding-bottom:1ex;" src="http://www.ucc.asn.au/images/glider.png" />
    <a href="http://www.gu.uwa.edu.au">
    <img alt="Guide of Undergraduates" title="UWA Guild of Undergraduates" style="padding-bottom:1ex;" src="http://www.ucc.asn.au/images/guild/spot2001-blue.png" />
    </a>
    <a href="http://www.uwa.edu.au">
    <img alt="University of Western Australia" title="University of Western Australia" src="http://www.ucc.asn.au/images/uwa_crest.png" />
    </a>
  </p>
</div>
</BODY>
</HTML>
