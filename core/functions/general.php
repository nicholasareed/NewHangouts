<?php 
function avg(){
 	$count = func_num_args();
 	$args = func_get_args();
 	return (array_sum($args) / $count);
}


function online_users() {
	$query = mysql_query("SELECT `username`, `first_name`, `last_name` FROM `users` WHERE `online` = 1");
	$num_online = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `online` = 1");
	if (mysql_result($num_online, 0) > 1) {
		echo '<ul class="online_users">';
			while ($user = mysql_fetch_assoc($query)) {
				if ($user['username'] == $user_data['username']) {
					echo "";
				} else {
					// $chatlink = '<li><a href="javascript:void(0)" onclick=" ';
					// $chatlink.= "javascript:chatWith('".$user['username']."')";
					// $chatlink.= '"';
					// $chatlink .= ">Chat with ".$user['first_name']."</a></li>'";
					// // echo str_replace('\'', '\\\'', $chatlink);
					// // <a href="javascript:void(0)" onclick="javascript:chatWith('janedoe')">Chat With Jane Doe</a>
					// // <li><a href="javascript:void(0)" onclick="javascript:chatWith("ashwin")">Chat With Ashwin</a></a></li>
					// echo $chatlink;
				}
			}
		echo "</ul>";
	} else {
		echo "Hm...It looks like there are no other users that seem to be online";
	}
	
	
}


function grab_users() {
	$query = mysql_query("SELECT * FROM `users`");
	while ($user = mysql_fetch_assoc($query)) {
		$promote = $user['type'] + 1 ;
		echo '<div class="span4">
		<div class="btn-group">
  <a class="btn btn-primary" href="http://localhost/Hangouts/'.$user['username'].'">'.$user['username'].'</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
  <ul class="dropdown-menu">
   <li>'.$user['username'].' is a level '.$user['type'].'</li>
   <li class="divider"></li>
   <li><a href="admin.php?promote_to=0&name='.$user['username'].'"><span class="icon-ban-circle"></span>Pro/Demote to level 0</a></li>
   <li><a href="admin.php?promote_to=1&name='.$user['username'].'"><span class="icon-eye-close"></span>Pro/Demote to level 1</a></li>
   <li><a href="admin.php?promote_to=2&name='.$user['username'].'"><span class="icon-user"></span>Pro/Demote to level 2</a></li>
   <li><a href="admin.php?promote_to=3&name='.$user['username'].'"><span class="icon-eye-open"></span>Pro/Demote to level 3</a></li>
   <li><a href="admin.php?promote_to=4&name='.$user['username'].'"><span class="icon-globe"></span>Pro/Demote to level 4</a></li>
  </ul>
</div></div><br><br>';
	}
}

function grab_users2() {
	$query = mysql_query("SELECT * FROM `users`");
	while ($user = mysql_fetch_assoc($query)) {
		echo "<option value=".$user['username'].">".$user['username']."</option>";		
	}
}


function censor($uncensored_string) {
		$badwords = array('goddamn', 'fuck', 'hell', 'damn', 'shit');
		$goodwords = array('gosh darn', '', 'heck', 'darned', 'crap');
		$censored_string = str_replace($badwords, $goodwords, $uncensored_string);
		return $censored_string;
	
}


function add_stylesheet($location) {
	echo '<link rel="stylesheet" type="text/css" href="'.$location.'">';
}

function mail_users($subject, $body) {
	$query = mysql_query("SELECT `email`, `first_name` FROM `users` WHERE `allow_email` = 1");
	while ($row = mysql_fetch_assoc($query) != false) {
		email($row['email'], $subject, "Hello, ". $row['first_name'].".<br> This message was sent to you via Hangouts:<br>".$body);
	}
}

function MakeUniqueAlpha($length=16) {
           $salt       = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
           $len        = strlen($salt);
           $makepass   = '';
           mt_srand(10000000*(double)microtime());
           for ($i = 0; $i < $length; $i++) {
               $makepass .= $salt[mt_rand(0,$len - 1)];
           }
       return $makepass;
}

function email($to, $subject, $body){
	$headers = "From: hello@thehangouts";
	$headers .= "\r\n" .'X-Mailer: PHP/' . phpversion();
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($to, $subject, $body, $headers);
}

function admin_protect() {
	global $user_data;
	if ($user_data['type'] < 4) {
		header('Location: index.php');
		echo alert_message('Nice try, but you are not an administrator.', 'error');
		exit();
	}
}


function signed_in_redirect_backup(){
	if (signed_in() == true) {
		echo alert_message("You're already signed in, there's no need to use this page",'info');
		exit();
	}
}

function signed_in_redirect(){
	if (signed_in() == true) {
		header('Location: index.php');
		exit();
	}
}

function protect_page_backup(){
	if (signed_in() == false) {		
	$message 	= 'You can\'t use this page. <a href="sign-in.php">Sign In</a> or <a href="sign-up.php">Sign Up</a> ?';
	echo alert_message($message, 'error');
	exit();
	}
}

function protect_page(){
	if (signed_in() == false){
		echo "<script>window.location.replace('protect-page.php');</script>";
		header('Location: protect-page.php');
		exit();
	}
}

function alert_message($message, $message_type){
	$message 	= '<div class="alert alert-'.$message_type.'"><a href="#" class="close" data-dismiss="alert">&times;</a> '.$message.'</div>';
	return $message;
}

function clean_array(&$item){
	$item	= clean($item);
}

function debug_array($array){
	echo "<br>"."<pre>";
	print_r($array);
	echo "</pre>"."<br>";
}

function output_errors($errors){
	$output 	= array();
	foreach ($errors as $error) {
		echo '
		<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> '.$error.' </div>';
	}

}

// This file contains all general functions
function clean($string){
	// Clean the string with different sanitizing functions
	$clean_string = mysql_real_escape_string(stripslashes($string));
	// Return the cleansed string
	return $clean_string;
}

function encrypt($password){
	// Multi-encryption on the string
	$secure_password = md5(md5(md5(sha1(md5(sha1(md5(sha1(md5($password)))))))));
	// Return the secured password
	return $secure_password;
}

function retrieve_project_details(){
	// Pull in the JSON Object from the file
	$json_array = file_get_contents('info.json');
	// Decode it into PHP 
	$project_details = json_decode($json_array, true);
	// Return the array back for usage later
	return $project_details;
}

function hyphenate($string){
	 $hyphenated_string =	preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   	return $hyphenated_string;
}

 ?>