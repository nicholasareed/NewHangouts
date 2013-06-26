<?php 
function get_users() {
	$users = mysql_query("SELECT * FROM `users`");
	

}

function change_profile_image($user_id, $file_temp_location, $file_extn){
	global $session_user_id;
	$file_name = substr(md5(time()), 0, 10);
	$file_name .= uniqid();
	$file_extn = '.'.$file_extn;
	$file_path = 'images/profile/';
	$file_path .= $file_name;
	$file_path .= $file_extn;
	move_uploaded_file($file_temp_location, $file_path);
	mysql_query("UPDATE `users` SET `profile` = '".$file_path."' where `user_id` = ".$user_id);

}

function activate($email, $email_code) {
	$email 		= mysql_real_escape_string($email);
	$email_code 	= mysql_real_escape_string($email_code);

	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' and `email_code` = '$email_code' and `active` = 0"), 0) == 1) {
		mysql_query("UPDATE `users` WHERE `active` = 1 WHERE `email` = '$email'");
		return true;
	} else {
		return false;
	}

	if (empty($errors)) {
		output_errors($errors);
	} else{
		header('Location: activate.php?success');
		exit();
	}
}


function recover($mode, $email) {
	$mode		= clean($mode);
	$email 		= clean($email);

	$user_data	= user_data(user_id_from_email($email), 'user_id', 'first_name', 'username');

	if ($mode == 'username') {
		$username_recovery_message = "Hello, ".$user_data['first_name'].". Your username is: ".$user_data['username'];
		email($email, 'Username Recovery', $username_recovery_message);
	} else if ($mode == 'password'){
		$generated_password = MakeUniqueAlpha($length=15);
		change_password($user_data['user_id'], $generated_password);
		$password_recovery_message = "Hello, ".$user_data['first_name'].". Your temporary password is: ".$generated_password."<br> Once you sign in again, you can change your password to what it originally was";
		email($email, 'Password Recovery', $password_recovery_message);
	}
}


function update_user($update_data){
	global $session_user_id;
	array_walk($update_data, 'clean_array');
	foreach ($update_data as $field => $data) {
		$update[]	= "`".$field."` = '".$data."'";
	}
	// echo implode(',', $update);
	mysql_query("UPDATE `users` SET ".implode(', ', $update)." WHERE `user_id` = $session_user_id") or die(mysql_error());
}


function change_password($user_id, $password){
	$user_id 	= (int)$user_id;
	$password 	= encrypt($password);

	mysql_query("UPDATE `users`SET `password` = '$password' WHERE `user_id` = $user_id");
}

function register($register_data){
	array_walk($register_data, 'clean_array');
	// We need to know the fields we want to insert in, and their data. The register data array
	// contains these. The keys are the fields and the values are the data
	$fields	= '`'.implode('`, `', array_keys($register_data)).'`';
	$data 	= "'".implode("', '", $register_data)."'";
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	$message = "Hello, ".$register_user['first_name']."\n\n You will need to activate your account with the link below \n\n <a href='http://ashwin.tk/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']."'>Click here</a>\n\n ";
	email($register_data['email'], 'Activate your Hangouts account', $message);

}

function email_exists($email){
	// Clean the data
	$email	= clean($email);
	// Select the count of the user id from the users given the username
	$query		= mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
	// If we find a result (i.e: a user exists), return true; if not, return false
	if (mysql_result($query, 0) == 1) {
		return true;
	} else{
		return false;
	}
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1 and `type` > 1"), 0);
}

function user_data($user_id){
	$data 		= array();
	$user_id 	= (int)$user_id;

	$func_num_args	= func_num_args();
	$func_get_args	= func_get_args();

	if ($func_num_args > 1) {
		unset($func_get_args[0]);

		$fields 		= '`'.implode('`, `', $func_get_args).'`';
		$data 		= mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}


}

function signed_in(){
	if (isset($_SESSION['user_id'])) {
		return true;
	} else{
		return false;
	}
}

function logged_in(){
	if (isset($_SESSION['user_id'])) {
		return true;
	} else{
		return false;
	}
}

function user_exists($username){
	// Clean the data
	$username	= clean($username);
	// Select the count of the user id from the users given the username
	$query		= mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
	// If we find a result (i.e: a user exists), return true; if not, return false
	if (mysql_result($query, 0) == 1) {
		return true;
	} else{
		return false;
	}
}
function user_banned($username){
	// Clean the data
	$username	= clean($username);
	// Select the count of the user id from the users given the username
	// If we find a result (i.e: a user exists), return true; if not, return false
	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `type` = 0"), 0) == 1) {
		return true;
	} else{
		return false;
	}
}


function user_active($username){
	// Clean the data
	$username	= clean($username);
	// Select the count of the user id from the users given the username
	// If we find a result (i.e: a user exists), return true; if not, return false
	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"), 0) == 1) {
		return true;
	} else{
		return false;
	}
}

function user_id_from_username($username){
	$username 	= clean($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
}

function user_id_from_email($email){
	$email 	= clean($email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"), 0, 'user_id');
}


function login($username, $password){
	$user_id = user_id_from_username($username);

	$username 	= clean($username);
	$password 	= encrypt($password);

	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' and `password` = '$password'"),0) == 1) {
		return $user_id;
	} else{
		return false;
	}
}
 ?>