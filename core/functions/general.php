<?php 
function grab_users() {
	$query = mysql_query("SELECT * FROM `users`");
	while ($user = mysql_fetch_assoc($query)) {
		echo '<div class="btn-group">
  <a class="btn btn-primary" href="http://localhost/Hangouts/'.$user['username'].'"><i class="icon-user icon-white"></i>'.$user['username'].'</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
  <ul class="dropdown-menu">
    
  </ul>
</div>';
	}
}

function censor($uncensored_string) {
		$badwords = array('goddamn', 'fuck', 'hell', 'damn', 'shit', 'bullshit');
		$goodwords = array('gosh darn', '', 'heck', 'darned', 'crap', 'BS');
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
	$clean_string = htmlentities(mysql_real_escape_string(trim(stripslashes($string))));
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