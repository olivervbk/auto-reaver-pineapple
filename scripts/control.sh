#!/bin/bash

. config
if [[ $? -ne 0 ]]; then
	echo "Config error!"
	exit 255
fi

opt="$1"

if [[ "$opt" == "check_interface" ]]; then
	if [[ -z "$(iwconfig $INTERFACE 2>&1 | grep Monitor)" ]]; then
		echo "Interface $INTERFACE not available"
		exit 2;
	fi
fi

if [[ "$opt" == "check_install" ]]; then
	version=$(reaver -h 2>&1 | grep "Reaver" | cut -d' ' -f2)
	if [[ "$version" != "$SUPPORTED_REAVER_VERSION" ]]; then
		echo "Unsupported version!"
		exit 3;
	fi
fi

if [[ "$opt" == "start_wash" ]]; then
	#TODO:check pid and remove	

	wash -i $INTERFACE -o $WASH_OUTPUT &>$WASH_LOG &
	wash_pid=$!
	
	echo $wash_pid
	echo $wash_pid > $WASH_PID
fi
	
if [[ "$opt" == "check_wash" ]]; then
	#TODO: format output
	#TODO: check if running
	#TODO: check log?
	
	tail -n+3 $WASH_OUTPUT
fi

if [[ "$opt" == "stop_wash" ]]; then
	wash_pid="$(cat $WASH_PID)"
	
	error=$(kill "$wash_pid")
	code=$?
	
	if [[ $code -ne 0 ]]; then
		echo $error
		exit $code
	fi
	echo > $WASH_PID
fi

if [[ "$opt" == "start_reaver" ]]; then
	if [[ $# -ne 5 ]]; then
		echo "$opt <bssid> <channel>"
		exit 1;
	fi
	bssid="$2"
	channel="$3" #optional?
	
	#TODO:check pid and remove	
	
	reaver -i $INTERFACE -b $bssid -c  $channel -o $REAVER_OUTPUT $REAVER_OPTS &>$REAVER_LOG &
	reaver_pid=$?
	
	echo $reaver_pid
	echo $reaver_pid > $REAVER_PID
fi

if [[ "$opt" == "check_reaver" ]]; then
	if [[ $# -ne 2 ]]; then
		echo "$opt <reaver-output-file>"
		exit 1;
	fi
	output="$2"
	
	result=$(grep "$output"	"Pin cracked in")
	if [[ "$result" ]]; then
		# TODO format output
		grep -A3 "$output" "Pin cracked in" | grep "[+]"
	else
		# TODO check for errors...
		echo "should check for errors..."
	fi
fi

if [[ "$opt" == "stop_reaver" ]]; then
	reaver_pid="$(cat $REAVER_PID)"
	
	error=$(kill "$reaver_pid")
	code=$?
	
	if [[ $code -ne 0 ]]; then
		echo $error
		exit $code
	fi
	echo > $REAVER_PID
fi

#TODO: manage whitelist
#TODO: manage result 


