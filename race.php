<?php
$title = "Race Information";
include_once('header.php');

//Check if Race ID is valid
if(isset($_GET['raceID']) && !empty($_GET['raceID']) && is_numeric($_GET['raceID']) && getInfo($_GET['raceID'],$races,'id') !== false) {
	$race_info = getInfo($_GET['raceID'],$races,'id');
} else {
	echo '<div class="alert alert-danger">Invalid Race ID</div>';
	exit;
}

$location_info = getInfo($race_info['meetingID'],$locations,'id');
$type = getInfo($race_info['typeID'],$race_types,'id');

$date = new DateTime($race_info['endDate']);
$end_date = $date->format('d-m-Y H:i');

?>


	<body>
		<div class="header">
			<div class="pull-left">
				<h1> <?= $race_info['raceName'] ?> </h1>
				<p> <label> Location: </label> <?= $location_info['location'] .', '. $location_info['state'] ?> </p>
				<p> <label> Type: </label> <?= $type['typeName'] ?> </p>
				<p>	<label> End Date: </label> <?= $end_date; ?> </p>
				
				
			</div>
			<div class="pull-right">
				<a href="index.php" class="btn btn-primary btn-sm">Back to Race List </a>
			</div>
			
		</div>
		<div class="content">
			<table class="table table-condesend table-hover">
				<thead>
					<th>No. </th>
					<th>Racers</th> 
					<th>Comment</th>
					
				</thead>
				<tbody>
					<?php
					$race_content = "";
					$count = 1;
										
							foreach ($race_info['racers'] as $racer_id) {
								$race_content .= "<tr>";
								$racer_info = getInfo($racer_id,$racers,'id');
								$race_content .= '<td>'. $count .'</td>';
								$race_content .= '<td>'. $racer_info['racerName']. '</td>';
								$race_content .= '<td>'. $racer_info['comments']. '</td>';
								$race_content .= '</tr>';
								$count++;
							}
							
							
						
					
					echo $race_content;
					?>
				</tbody>
			</table>
		</div>
			
		<?php include_once('footer.php'); ?>
		
		
	</body>
</html>