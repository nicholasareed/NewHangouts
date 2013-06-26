<?php 
include('widgets/Template.php');

$template = new Template;
$template->assign('first-name', $profile_data['first_name']);
$template->assign('last-name', $profile_data['last_name']);
$template->assign('username', $profile_data['username']);
$template->assign('email', $profile_data['email']);
$template->assign('password', $profile_data['password']);
$template->assign('timestamp', date("F j, Y, g:i a", $profile_data['timestamp']));  
$template->assign('theme', $profile_data['theme']);
$template->assign('type', $profile_data['type']);
$template->assign('profile', $profile_data['profile']);
$template->assign('bio', $profile_data['bio']);
$template->render('template-profile.php');
 ?>
