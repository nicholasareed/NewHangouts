<?php require('includes/overall/headers/header.php'); ?>
<?php 
session_start();
mysql_query("UPDATE `users` SET `online` = 0 WHERE `user_id` = $session_user_id");
if (isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
}
header('Location: index.php');
?><script>window.location.replace("index.php");</script><?
exit();
 ?>
 <?php require('includes/overall/footers/footer.php'); ?>