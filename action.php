<?php

require("functions.php");

$output_title="(empty)";
$output_text="";
if (isset($_GET['do'])){
	$action=$_GET['do'];

	$output_title="(".$action.")";

	if ($action == "configure"){
        	$output_text=cmd("configure");

	}elseif($action == "start_scan"){
		$output_text=cmd("start_wash");

	}elseif($action == "stop_scan"){
		$output_text=cmd("stop_wash");

	}elseif($action == "start_auto"){
		$output_text="NOT IMPLEMENTED...";

	}elseif($action == "stop_reaver"){
		$output_text=cmd("stop_reaver");

	}elseif($action == "crack"){
		$bssid=$_GET['bssid'];
		$channel=$_GET['channel'];
		$output_text=cmd("start_reaver $bssid $channel");

	}else{
		$output_title="(Action unknown)";
	}
}

?>
<form id="msg" action="index.php" method="POST">
<input type="hidden" name="output_title" value="<?php echo base64_encode($output_title);?>">
<input type="hidden" name="output_text" value="<?php echo base64_encode($output_text);?>">
<center><input type="submit" value="CONTINUE"></center>
</form>
<script type="text/javascript">document.forms["msg"].submit()</script>

