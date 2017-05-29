<?php
$title = "Next 5 | Home";
include_once('header.php');

//Sorting Races according to respective EndTime in Ascending Order
foreach ($races as $raceKey => $raceVal) {
	$time[$raceKey] = $raceVal['endDate'];
}
array_multisort($time, SORT_ASC, $races);

?>


	<body>
		<div class="header">
			<div class="pull-left">
				<h1> NEXT 5 </h1>
			</div>
		</div>
		<div class="content">
			<table class="table table-condesend table-hover">
				<thead>
					<th>Race Name</th> 
					<th>Type</th>
					<th>Meeting</th>
					<th>TTG</th>
					<th>End Date</th>
				</thead>
				<tbody>
					<?php
					$race_content = "";
					$count = 0;
					$time_now = strtotime("now");
					
					foreach ($races as $key => $race) {
						$race_time = strtotime($race['endDate']);
						if ($race_time > $time_now) {
							$locationInfo = getInfo($race['meetingID'],$locations,'id');
							$type = getInfo($race['typeID'],$race_types,'id');
							$tr_class = $count >= 5 ? "hidden" : ""; //Hide if more than 5
							list($time_left,$hrmm) = timeLeft($race['endDate'],$time_now);
							$date = new DateTime($race['endDate']);
							$end_date = $date->format('d-m-Y H:i');
							$time_left = ($race_time-$time_now)/60;
							if ($time_left > 60) {
								$time_left = $time_left/60;
								$hrmm = "hr";
							} else $hrmm = "min";
							$time_left = round(abs($time_left),2);
							$race_content .= '<tr id="race'. $race["id"] .'" class="'. $tr_class .'">';
							$race_content .=  '<td><a href="race.php?raceID='.$race["id"].'">'. $race['raceName'] .'</a></td>';
							$race_content .=  '<td>'. $type['typeName'] .'</td>';
							$race_content .=  '<td>'. $locationInfo['location'] .'</td>';
							$race_content .=  '<td><span class="ttg '.$hrmm .'" data-parentid="race'. $race["id"] .'" data-timeleft="'.$time_left.'">'. $time_left .'</span>'.$hrmm .'</td>';
							$race_content .= '<td>'. $end_date .'</td>';
							
							foreach ($val['racers'] as $racerKey => $racerId) {
								$racerKey = array_search($racer_id, array_column($racers, 'id'));
								$racer = getInfo($racer_id,$racers,'id');
							}
							$race_content .= '</tr>';
							$count++;
						}
					}
					echo $race_content;
					?>
				</tbody>
			</table>
		</div>
		
		<?php include_once('footer.php'); ?>
		
		
	</body>
</html>