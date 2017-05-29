<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
		<title><?= $title ?></title>
		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>

<?php 
//Set Default time to Brisbane assuming there is no time difference 
date_default_timezone_set('Australia/Brisbane');
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

function timeLeft($race_time,$time_now){

	$time_left = ($race_time-$time_now)/60;
	if ($time_left > 60) {
		$time_left = $time_left/60;
		$hrmm = "hr";
	} else $hrmm = "m";
	return array(round(abs($time_left),2), $hrmm);
}



$json_data = file_get_contents("data.json"); //Get Json content
$race_info = json_decode($json_data, true); //Decode Json Data into array

/** Check if Json is valid **/
if ($race_info  === null && json_last_error() !== JSON_ERROR_NONE) {
	echo '<div class="alert alert-danger">Invalid Json Data!</div>';
	return false;	
}


//set race variables
$races = $race_info['races'];
$locations = $race_info['meetings'];
$race_types = $race_info['types'];
$racers = $race_info['racers'];


?>