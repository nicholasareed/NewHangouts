<?php 
$themes = array('Amelia', 'Bootstrap', 'Cerulean', 'Cosmo', 'Nightwing', 'Flatly', 'Journal', 'Readable', 'Simplex', 'Slate', 'Spacelab', 'Spruce', 'Superhero', 'United');
date_default_timezone_set('America/Los_Angeles');
session_start();
// // // This file links to all core functionality so that each page can be connected to the core 
require('database/connect.php');
require('functions/number-to-word.php');
require('functions/resize-class.php');
require('functions/general.php');
require('functions/users.php');
require('functions/apps.php');
// // // If the user is signed in, we want to grab all their data
if (signed_in() == true) {
	$session_user_id 	= $_SESSION['user_id'];
	$user_data 		= user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email', 'type', 'theme', 'timestamp', 'allow_email', 'profile', 'active', 'bio', 'status');
	$_SESSION['username'] = $user_data['username'];
	if (user_active($user_data['username']) == false) {
// 		// If the current user is in-active while being signed in (i.e: an admin or moderator has disabled their account) we want to sign them out
		session_destroy();
// 		// Destroy their session (artificial signing-out)
// 		// header('Location: sign-out.php');
		// Exit the script and move to a different location
		header('Location: index.php');
		exit();
	}
}


$errors = array();
 ?>