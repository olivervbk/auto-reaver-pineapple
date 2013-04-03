<html>
	<head>
		<title>Pineapple File Browser</title>
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<link rel="stylesheet" type="text/css" href="/includes/styles.css" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<?php include("/pineapple/includes/navbar.php"); ?><br />
		<div class="sidepanelLeft">
			<div class="sidepanelTitle">Status</div>
			<div class="sidepanelContent">
				<table>
				<tr><td>Wash</td><td><font color="lime"><b>running</b></font>.</td><td>(2123)</td></tr>
				<tr><td>Reaver</td><td><font color="red"><b>stopped</b></font>.</td><td>()</td></tr>
				</table>
				<br>
				
				<b>Action:</b><br>
				<a href="">[Scan]|[Stop scan]</a><br>
				<a href="">[Auto mode]|[Stop auto mode]</a><br>
				<br>
				
				<b>Config:</b><br>
				<a href="">[Edit config]</a><br>
				<a href="">[Configure]</a><br>
				<a href="">[Clean]</a><br>
				<br>
				
			</div>
		</div>
		<div class="content">
			<div class="contentTitle">Instructions</div>
			<div class="contentContent">
				<ul>
				<li><b>Edit config</b> to set options</b></li>
				<li>Press <b>Configure</b> to check wifi. Will stop hostapd.</li>
				<li><b>Scan</b> to start scan and select AP from <b>Found APs</b> or</li>
				<li><b>Auto mode</b> for non-interactive execution.</li>
				<li><b>Clean</b> to undo changes and remove temporary files.</li>
				</ul>
			</div>
		</div>
		<br>
		<div class="content">
			<div class="contentTitle">Output</div>
			<div class="contentContent">
			<pre>
(output is empty)
			</pre>
			</div>
		</div>
		<div class="sidepanelRight">
			<div class="sidepanelTitle">Info</div>
			<div class="sidepanelContent">
				<b>Found&nbsp;Access&nbsp;Points:</b><br>
				<table>	
				<tr><th>BSSID</th><th>CH</th><th>RSSI</th><th>ESSID</th></tr>
				<tr><td><a href="">00:11:22:33:44:55</a></td><td>3</td><td>-40</td><td>"Teste"</td></tr>
				<tr><td><a href="">C0:FF:EE:00:00:11</a></td><td>12</td><td>-89</td><td>"DLINK_WIRELESS"</td></tr>
				</table>
				<br>
				
				<b>Cracked:</b><br>
				(empty)<br>
				<br>
				
				<b>Whitelisted</b>&nbsp;<a href="">[edit]</a><b>:</b><br>
				<ul>
				<li>00:11:22:33:44:55</li>
				</ul>
				
			</div>
		</div>
	</body>
</html>
