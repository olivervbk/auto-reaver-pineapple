<?php
require("functions.php");

$output_title="(Output is empty)";
$output_text="";
if(isset($_POST["output_title"])){
	$output_title=base64_decode($_POST["output_title"]);
	$output_text=base64_decode($_POST["output_text"]);
}

?>
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
<?php showControlMenu();?>
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
<?php
echo $output_title."\n";
echo $output_text;
?>
			</pre>
			</div>
		</div>
		<div class="sidepanelRight">
			<div class="sidepanelTitle">Info</div>
			<div class="sidepanelContent">
<?php showInfoMenu();?>
			</div>
		</div>
	</body>
</html>
