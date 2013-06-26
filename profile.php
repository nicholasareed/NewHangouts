<?php include('includes/overall/headers/header.php'); ?>
<?php 
if (isset($_GET['username']) == true and empty($_GET['username']) == false) {
	$username 	= $_GET['username'];
	$user_id 	= user_id_from_username($username);
	if (user_exists($username) == true) {
		$profile_data	= user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'type', 'theme', 'timestamp', 'profile', 'badges', 'bio', 'active');
 		?>
		<?php include('profile-template.php'); ?>
		<?php 
	} else{
		echo alert_message('That user doesn\'t exist', 'info');
	}

} else {
	header('Location: index.php');
	exit();
}
 ?>
<?php include('includes/overall/footers/footer.php'); ?>