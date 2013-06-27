<?php 
include('widgets/Template.php');

$template = new Template;
$template->assign('first-name', $user_data['first_name']);
$template->assign('last-name', $user_data['last_name']);
$template->assign('username', $user_data['username']);
$template->assign('email', $user_data['email']);
$template->assign('password', $user_data['password']);
$template->assign('timestamp', date("F j, Y, g:i a", $user_data['timestamp']));  
$template->assign('theme', $user_data['theme']);
$template->assign('type', $user_data['type']);
$template->assign('profile', $user_data['profile']);
$template->assign('id', $session_user_id);
$template->assign('inbox', inbox($user_data['username']));
$template->render('widgets/cp.php');
 ?>
