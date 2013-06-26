<?php 
function output_messages($username) {
	$messages = mysql_query("SELECT * FROM `messages` WHERE `to` = '$username' and `deleted` = 0");
	echo '
		<table class="table table-hover">
		<thead>
			<th></th>
			<!-- <th>ID #</th> -->
			<th>Subject</th>
			<th>From</th>
			<th>Message</th>
		</thead>
		<tbody>
		';
	while ($message = mysql_fetch_assoc($messages)) {
		echo '<tr>
		<td><input type="checkbox" name="'.$message['id'].'"></td>
		<!-- <td>'.$message['id'].'</td> -->
		<td>'.$message['subject'].'</td>
		<td>'.$message['from'].'</td>
		<td>'.$message['message'].'</td>
		<td></td>
		</tr>';
	}
	echo '</tbody></table>';
}

function new_convo($data) {
	array_walk($data, 'clean_array');
	// We need to know the fields we want to insert in, and their data. The instashare data array
	// contains these. The keys are the fields and the values are the data
	$fields	= '`'.implode('`, `', array_keys($data)).'`';
	$data 	= "'".implode("', '", $data)."'";
	// echo "INSERT INTO `messages` ($fields) VALUES ($data)";
	mysql_query("INSERT INTO `messages` ($fields) VALUES ($data)");
}

function instashare($instashare_data) {
	array_walk($instashare_data, 'clean_array');
	// We need to know the fields we want to insert in, and their data. The instashare data array
	// contains these. The keys are the fields and the values are the data
	$fields	= '`'.implode('`, `', array_keys($instashare_data)).'`';
	$data 	= "'".implode("', '", $instashare_data)."'";
	// echo "INSERT INTO `public-posts` ($fields) VALUES ($data)";
	mysql_query("INSERT INTO `public-posts` ($fields) VALUES ($data)");
}

function output_instashared() {
	$query = mysql_query("SELECT * FROM `public-posts` ORDER BY `timestamp` DESC");
	echo '<div class="messages">';
	while ($instashare_data = mysql_fetch_assoc($query)) {
		$instashare_data['timestamp'] = date('jS',$instashare_data['timestamp']);
		echo '
		<div class="span6">
			<div class="well message">
				<a>'.$instashare_data['name'].'</a><br>
				<small>'.$instashare_data['timestamp'].'</small><br>
				<div class="instamessage">'.$instashare_data['message'].'</div>
			</div>
		</div>
		';
	}
	echo '</div>';
}

 ?>