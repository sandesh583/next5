<?php 
// Functions.php
/**
 * search for term against $key value in array and return matched keys and values
 *
 * @param string/integer searchTerm   $searchTerm  look for value in the passed array
 * @param array $lookupArray passed array to search into
 * @param string $key search Key in the passed array
 * 
 * @return matched keys with values
 */ 
function getInfo($searchTerm,$lookupArray,$key){
	$array_key = array_search($searchTerm, array_column($lookupArray, $key));
	return ( $array_key > -1  ? $lookupArray[$array_key] : false );
}


/**
 * convert date time in minutes or hr 
 *
 * @param dateTime $raceTime $race_time end date & time of a race
 * @param timeNow $timeNow current server time (Brisbane Time zone applied) 
 * 
 * @return array 
 * @return calculated time in hr / min and if the time is hr/min
 */ 
function timeLeft($raceTime,$timeNow){
	$time_left = ($raceTime-$timeNow)/60;
	if ($time_left > 60) {
		$time_left = $time_left/60;
		$hrmm = "hr";
	} else $hrmm = "min";

	return array(round(abs($time_left),2), $hrmm);
}


?>