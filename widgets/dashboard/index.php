<?php 
include('Template.php');

$template = new Template;
$template->assign('first-name', '$user_first_name');
$template->render('myTemplate.html');
 ?>