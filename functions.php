<?php

global $CMD="./scripts/control.sh";

function cmd($cmdString){
	$output=array();
	$retcode=0;
	exec("$CMD $cmdString", &$output, &$retcode);
	if (count($output) > 1){
		$output_text=join($output,"\n");
	}else{
		$output_text=$output[0];
	}
	return $output_text;
}

function listDetectedNetworks(){
	$output=array();
	exec("$CMD get_wash", &$output);
	for ($i=0;$i<count($output);$i++){
		$entry=split($output[$i],' ');
		$bssid=$entry[0];
		$channel=$entry[1];
		$rssi=$entry[2];
		$essid="";
		for($j=3;$j<count($entry);$j++){
			$essid+= $entry[$j]+" ";
		}
		$essid = trim($essid);

		echo "<tr><td><a href='action.php?do=crack&bssid=$bssid&channel=$channel'</a>$bssid</td><td>$channel</td><td>$rssi</td><td>\"$essid\"</td></tr>\n";
	}
}


function showControlMenu(){
 	echo "<table>\n";

	echo "<tr><td>Wash</td><td><font color='";
	$wash_status=cmd("check_wash");
	if ( $wash_status == ""){
		echo "red'><b>stopped</b></font>.</td><td>(";
	}else{
		echo "lime'><b>running</b></font>.</td><td>(".$wash_status;
	}
	echo ")</td></tr>\n";

	echo "<tr><td>Reaver</td><td><font color='";
	$reaver_status=cmd("check_reaver");
	if ( $reaver_status == ""){
		echo "red'><b>stopped</b></font>.</td><td>(";
	}else{
		echo "lime'><b>running</b></font>.</td><td>(".$reaver_status;
	}
	echo ")</td></tr>\n";

	echo "</table><br>\n";

	echo "<b>Action:</b><br>\n";
	if ($wash_status == ""){
	 	echo "<a href='action.php?do=start_scan'>[Scan]</a><br>\n";         
	}else{
	 	echo "<a href='action.php?do=stop_scan'>[Stop scan]</a><br>\n";         
	}
	if ($reaver_status == ""){
	 	echo "<a href='action.php?do=start_auto'>[Auto mode]</a><br>\n";         
	}else{
	 	echo "<a href='action.php?do=stop_reaver'>[Stop reaver]</a><br>\n";         
	}
?>
<br>
<b>Config:</b><br>
<a href="">[Edit config]</a><br>
<a href="action.php?do=configure">[Configure]</a><br>
<a href="action.php?do=clean">[Clean]</a><br>
<br>
<?php
}

function showInfoMenu() {
	echo "<b>Found&nbsp;Access&nbsp;Points:</b><br>\n";
	echo "<table>\n<tr><th>BSSID</th><th>CH</th><th>RSSI</th><th>ESSID</th></tr>\n";
	listDetectedNetworks();
	echo "</table><br>\n";
	
	echo "<b>Cracked:</b><br>\n";
	echo "(empty)<br>\n";
	echo "<br>\n";

	echo "<b>Whitelisted</b>&nbsp;<a href=''>[edit]</a><b>:</b><br>\n";
	echo "<ul>\n";
	echo "<li>00:11:22:33:44:55</li>\n";
	echo "</ul>\n";
}


?>
