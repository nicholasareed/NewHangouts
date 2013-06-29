<?php

function request_friend($data) {
	array_walk($data, 'clean_array');
	// We need to know the fields we want to insert in, and their data. The instashare data array
	// contains these. The keys are the fields and the values are the data
	$fields	= '`'.implode('`, `', array_keys($data)).'`';
	$data 	= "'".implode("', '", $data)."'";
	mysql_query("INSERT INTO `friend_requests` ($fields) VALUES ($data)");
}

function num_notifications($username) {
	$query = mysql_query("SELECT COUNT(`id`) FROM `notifications` WHERE `for` = '$username'");
	$result = mysql_result($query, 0);
	return $result;
}

function grab_notifications($username) {
	$notifications = mysql_query("SELECT * FROM `notifications` WHERE `for` = '$username'");	
	echo mysql_result($notifications, 0);
	
}

// Debate functions

function like_debate($id, $side) {
	// Find current like for the side they back
	if (isset($_SESSION["debate".$id])) {
		return "You already voted on this";
	} else {
		if ($side == "side2") {
			$query = mysql_query("SELECT `likes2` FROM `debates` WHERE `id` = $id");
			$result = mysql_result($query, 0);
		}

		if ($side == "side1") {
			$query = mysql_query("SELECT `likes1` FROM `debates` WHERE `id` = $id");
			$result = mysql_result($query, 0);
		}
		$update_likes = $result + 1;
		$session_keyword = "debate".$id;
		$_SESSION[$session_keyword] = "voted";
		if ($side == "side1") {
			mysql_query("UPDATE `debates` SET `likes1` = $update_likes WHERE `id` = $id");
		}

		if ($side == "side2") {
			mysql_query("UPDATE `debates` SET `likes2` = $update_likes WHERE `id` = $id");	
		}
	}
}


function output_debates() {
	$debates = mysql_query("SELECT * FROM `debates`");
	while ($debate = mysql_fetch_assoc($debates)) {
		echo '<div class="span6">
		<form action="debates.php" method="post">
			<div class="well debate">
				<div class="side1">
					'.$debate['side1'].': '.$debate['likes1'].'
				</div><hr>
				<div class="side2">
					'.$debate['side2'].': '.$debate['likes2'].'
				</div><hr>
				I support  
				<select name="'.$debate['id'].'">
					<option value="side1">'.$debate['side1'].'</option>
					<option value="side2">'.$debate['side2'].'</option>
				</select>
				<button type="submit" class="btn btn-primary">Support!</button>
			</div>
		</form>
		</div>';
	}
}


function start_debate($data) {
	array_walk($data, 'clean_array');
	// We need to know the fields we want to insert in, and their data. The instashare data array
	// contains these. The keys are the fields and the values are the data
	$fields	= '`'.implode('`, `', array_keys($data)).'`';
	$data 	= "'".implode("', '", $data)."'";
	mysql_query("INSERT INTO `debates` ($fields) VALUES ($data)");
}
// Inbox Functions
// inbox - find num/ of messages
// mark as read - archiving messages
// output - showing messages

function inbox($username) {
	$query = mysql_query("SELECT COUNT(`id`) FROM `messages` WHERE `to` = '$username' and `deleted` = 0 and `read` = 0");
	$result = mysql_result($query, 0);
	return $result;
}

function mark_as_read($id) {
	$id 	= (int)$id;
	mysql_query("UPDATE `messages` SET `read` = 1 WHERE `id` = $id");
}

function output_messages($username) {
	$messages = mysql_query("SELECT * FROM `messages` WHERE `to` = '$username' and `deleted` = 0 and `read` = 0");
	$inbox = inbox($username);
	if ($inbox == 0) {
		echo "<center>You have no new messages. Enjoy your day :) </center>";
	} else {
	echo '
		<form method="post" action="inbox.php?read">
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
		<td><input type="checkbox" name="read[]" value="'.$message['id'].'"</td>
		<!-- <td>'.$message['id'].'</td> -->
		<td>'.$message['subject'].'</td>
		<td>'.$message['from'].'</td>
		<td>'.$message['message'].'</td>
		</tr>';
	}
	echo '</tbody></table><button type="submit" class="btn btn-primary">Mark as Read</button></form>';
}
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

// InstaShare functions: 
// instashare - for sending messages
// like_post - for thumb-upping posts
// output_instashared - show all messsages


function instashare($instashare_data) {
	array_walk($instashare_data, 'clean_array');
	// We need to know the fields we want to insert in, and their data. The instashare data array
	// contains these. The keys are the fields and the values are the data
	$fields	= '`'.implode('`, `', array_keys($instashare_data)).'`';
	$data 	= "'".implode("', '", $instashare_data)."'";
	// echo "INSERT INTO `public-posts` ($fields) VALUES ($data)";
	mysql_query("INSERT INTO `public-posts` ($fields) VALUES ($data)");
}

function like_post($id) {
	if (isset($_SESSION["like".$id])) {
		return "You already liked on this";
	} else {
		$query = mysql_query("SELECT `likes` FROM `public-posts` WHERE `id` = $id");
		$result = mysql_result($query, 0);
		$update_likes = $result + 1;
		$session_keyword = "like".$id;
		$_SESSION[$session_keyword] = "voted";
		mysql_query("UPDATE `public-posts` SET `likes` = $update_likes WHERE `id` = $id");
	}
}


function output_instashared() {
	$query = mysql_query("SELECT * FROM `public-posts` ORDER BY `timestamp` DESC");
	echo '<div class="messages">';
	while ($instashare_data = mysql_fetch_assoc($query)) {
		$id = $instashare_data['id'];
			$instashare_data['timestamp'] = date("D M d g:i",$instashare_data['timestamp']);
			echo '
			<div class="span6">
				<div class="well message">
					<a>'.$instashare_data['name'].'</a><br>
					<small>'.$instashare_data['timestamp'].'</small><br>
					<div class="instamessage">'.$instashare_data['message'].'</div>
					<div class="other"><hr>
						<!-- <button type="button" class="btn btn-primary" data-toggle="button">Like this post</button> -->
						<div class="btn-group">
							<a class="btn btn-primary btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><span class="icon-thumbs-up"></span><a href="like.php?id='.$instashare_data['id'].'">Like this post</a></li>
							</ul>
						</div>
						Likes: '.$instashare_data['likes'].'
					</div>
					<hr>
				</div>
			</div>
			';
		}
		echo '</div>';
// End of the func
}

 ?>