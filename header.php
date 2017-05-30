<?php //header.php ?>
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

// Require Functions.php
require_once('functions.php');

//Get Json content
$json_data = file_get_contents("data.json"); 
//Decode Json Data into array
$race_info = json_decode($json_data, true); 
//Check if Json is valid 
if ($race_info  === null && json_last_error() !== JSON_ERROR_NONE) {
	echo '<div class="alert alert-danger">Invalid Json Data!</div>';
	exit;	
}

//set common variables
$races = $race_info['races'];
$locations = $race_info['meetings'];
$race_types = $race_info['types'];
$racers = $race_info['racers'];
$time_now = strtotime("now");

?>